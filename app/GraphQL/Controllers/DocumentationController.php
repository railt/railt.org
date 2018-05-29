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
use App\Entity\Language;
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
     * @param Language $current
     * @return Documentation|null
     * @throws \BadMethodCallException
     */
    public function findByUrn(InputInterface $input, Language $current): ?Documentation
    {
        $language = $this->docs->withLanguage($current)
            ->findByUrn((string)$input->get('path'));

        return $language ?? $this->docs->findByUrn((string)$input->get('path'));
    }
}
