<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entity\Repositories\ArticleRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Class BlogController
 */
class BlogController extends Controller
{
    /**
     * @var ArticleRepository
     */
    private $articles;

    /**
     * BlogController constructor.
     * @param ArticleRepository $articles
     */
    public function __construct(ArticleRepository $articles)
    {
        $this->articles = $articles;
    }

    /**
     * @param Request $request
     * @return View
     * @throws \LogicException
     */
    public function index(Request $request): View
    {
        return \view('page.blog', [
            'articles' => $this->articles->query()
                ->paginate(10, (int)$request->get('page', 1))
        ]);
    }
}
