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
use Railt\Http\InputInterface;

/**
 * Class DocumentationController
 */
class DocumentationController
{
    /**
     * @var Documentation\FindableByUrn
     */
    private $docs;

    /**
     * DocumentationController constructor.
     * @param Documentation\FindableByUrn $docs
     */
    public function __construct(Documentation\FindableByUrn $docs)
    {
        $this->docs = $docs;
    }

    /**
     * @param InputInterface $input
     * @return Documentation|null
     */
    public function findByUrn(InputInterface $input): ?Documentation
    {
        return $this->docs->findByUrn((string)$input->get('path'));
    }
}
