<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\GraphQL\Controllers;

use App\Entity\Documentation;
use DebugBar\DebugBar;
use Railt\Http\InputInterface;
use App\Entity\Repository\ProvidesDocumentation;

/**
 * Class DocumentationController
 */
class DocumentationController
{
    /**
     * @param InputInterface $input
     * @param ProvidesDocumentation $docs
     * @return Documentation|null
     */
    public function findByUrn(InputInterface $input, ProvidesDocumentation $docs): ?Documentation
    {
        return $docs->findByUrn($input->get('path'));
    }
}
