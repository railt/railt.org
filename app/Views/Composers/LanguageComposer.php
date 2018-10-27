<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Views\Composers;

use App\Entity\Language;
use App\Entity\Repositories\LanguageRepository;
use Illuminate\Contracts\View\View;

/**
 * Class LanguageComposer
 */
class LanguageComposer
{
    /**
     * @var LanguageRepository
     */
    private $repository;

    /**
     * @var Language
     */
    private $language;

    /**
     * @var Language[]|null
     */
    private $languages;

    /**
     * LanguageComposer constructor.
     * @param LanguageRepository $languages
     * @param Language $language
     */
    public function __construct(LanguageRepository $languages, Language $language)
    {
        $this->repository = $languages;
        $this->language = $language;
    }

    /**
     * @return iterable
     * @throws \LogicException
     */
    private function getLanguages(): iterable
    {
        if ($this->languages === null) {
            $this->languages = $this->repository->query->get();
        }

        return $this->languages;
    }

    /**
     * @param View $view
     * @throws \LogicException
     */
    public function compose(View $view): void
    {
        $view->with('language', $this->language);
        $view->with('languages', $this->getLanguages());
    }
}
