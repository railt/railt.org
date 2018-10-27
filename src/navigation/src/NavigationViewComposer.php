<?php
/**
 * This file is part of serafimarts.ru package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Navigation;

use Illuminate\View\View;

/**
 * Class NavigationViewComposer
 */
class NavigationViewComposer
{
    /**
     * @var NavigationMatcher
     */
    private $matcher;

    /**
     * NavComposer constructor.
     * @param NavigationMatcher $matcher
     */
    public function __construct(NavigationMatcher $matcher)
    {
        $this->matcher = $matcher;
    }

    /**
     * @param View $view
     */
    public function compose(View $view): void
    {
        $view->with('nav', $this->matcher);
    }
}
