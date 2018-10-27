<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entity\Language;
use App\Entity\Menu;
use App\Entity\Repositories\DocumentRepository;
use App\Entity\Repositories\MenuRepository;
use Highlight\Highlighter;
use Illuminate\Contracts\View\View;
use Railt\Io\File;
use Railt\SDL\Compiler;
use Railt\SDL\Schema\CompilerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class DocsController
 */
class DocsController extends Controller
{
    /**
     * @var DocumentRepository
     */
    private $docs;

    /**
     * @var MenuRepository
     */
    private $menu;

    /**
     * DocsController constructor.
     * @param DocumentRepository $docs
     * @param MenuRepository $menu
     */
    public function __construct(DocumentRepository $docs, MenuRepository $menu)
    {
        $this->docs = $docs;
        $this->menu = $menu;
    }

    /**
     * @param Language $language
     * @return View
     * @throws \LogicException
     */
    public function index(Language $language): View
    {
        return \view('page.docs', [
            'menu'     => $this->menu->getRootItems($language),
            'document' => $this->docs->findByLanguageAndUrn($language, Menu::ROOT_MENU_ITEM),
        ]);
    }

    /**
     * @param Language $language
     * @param string $page
     * @return View
     * @throws \LogicException
     */
    public function show(Language $language, string $page): View
    {
        $document = $this->docs->findByLanguageAndUrn($language, $page);

        if ($document === null) {
            throw new NotFoundHttpException('Documentation page not found');
        }

        return \view('page.docs', [
            'menu'     => $this->menu->getRootItems($language),
            'document' => $document,
        ]);
    }

    /**
     * @param string $code
     * @param Highlighter $hl
     * @return array
     */
    public function execute(string $code, Highlighter $hl): array
    {
        $result = [];
        $errors = [];

        try {
            $document = (new Compiler())->compile(File::fromSources($code, 'Request'));

            foreach ($document->getDirectives() as $type) {
                $result[] = $hl->highlight('json', \json_encode($type, \JSON_PRETTY_PRINT))->value;
            }

            foreach ($document->getDefinitions() as $type) {
                $result[] = $hl->highlight('json', \json_encode($type, \JSON_PRETTY_PRINT))->value;
            }
        } catch (\Throwable $error) {
            $errors[] = [
                'message' => $error->getMessage(),
                'line'    => $error->getLine(),
            ];
        }

        return [
            'version' => '1.2-dev',
            'result'  => $result,
            'errors'  => $errors,
        ];
    }
}
