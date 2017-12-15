<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\GitHub;

use App\Entity\Renderers\Renderer;
use Github\Client;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\EntityManagerInterface as Em;
use Serafim\Hydrogen\Repository\MemoryRepository;

/**
 * Class GitHubRepository
 */
abstract class GitHubRepository extends MemoryRepository
{
    /**
     * @var Client
     */
    protected $github;

    /**
     * @var Renderer
     */
    protected $renderer;

    /**
     * GitHubRepository constructor.
     * @param Renderer $renderer
     * @param Client $github
     * @param Em $em
     * @param ClassMetadata $meta
     */
    public function __construct(Em $em, Client $github, Renderer $renderer, ClassMetadata $meta)
    {
        $this->github = $github;
        $this->renderer = $renderer;

        parent::__construct($em, $meta);
    }

    /**
     * @return iterable
     */
    protected function getData(): iterable
    {
        return [];
    }
}
