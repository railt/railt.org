<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Common;

use Renderer\RendererInterface;

interface ProvidesContent
{
    /**
     * @return BaseContent
     */
    public function getContent(): BaseContent;

    /**
     * @param RendererInterface $renderer
     */
    public function render(RendererInterface $renderer): void;
}
