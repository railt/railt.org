<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use App\Repository;
use Illuminate\Container\Container;
use Doctrine\Common\Annotations\Reader;
use Doctrine\ORM\Mapping\ClassMetadata;
use Illuminate\Support\ServiceProvider;
use Doctrine\ORM\EntityManagerInterface;
use App\Mapping\Repository as Annotation;
use Doctrine\Common\Persistence\Mapping\ClassMetadata as ClassMetadataInterface;

/**
 * Class RepositoriesServiceProvider
 */
class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    private $repositories = [
        Repository\ComponentsRepository::class,
        Repository\DocsRepository::class,
        Repository\LanguagesRepository::class,
        Repository\PagesRepository::class,
        Repository\ReleasesRepository::class,
        Repository\SourcesRepository::class,
        Repository\IssuesRepository::class,
        Repository\ContributorsRepository::class,
    ];

    /**
     * @param EntityManagerInterface $em
     * @param Reader $reader
     * @return void
     * @throws \LogicException
     */
    public function boot(EntityManagerInterface $em, Reader $reader): void
    {
        foreach ($this->repositories as $repository) {
            $reflection = new \ReflectionClass($repository);

            /** @var Annotation $annotation */
            $annotation = $reader->getClassAnnotation($reflection, Annotation::class);

            $this->registerRepository($em, $repository, $annotation);
        }
    }

    /**
     * @param EntityManagerInterface $em
     * @param string $interface
     * @param Annotation|null $annotation
     * @return void
     * @throws \LogicException
     */
    private function registerRepository(EntityManagerInterface $em, string $interface, ?Annotation $annotation): void
    {
        if ($annotation === null) {
            $error = \sprintf('%s must provide an %s annotation', $interface, Annotation::class);
            throw new \LogicException($error);
        }

        foreach ($annotation->getClasses() as $repository) {
            $this->app->singleton($repository, function () use ($em, $annotation, $repository) {
                $meta = $em->getClassMetadata($annotation->entity);

                /** @var Container $container */
                $container = clone $this->app;
                $container->instance(ClassMetadata::class, $meta);
                $container->instance(ClassMetadataInterface::class, $meta);

                return $container->build($repository);
            });
        }

        $this->app->alias($annotation->getDefaultClass(), $interface);
    }
}
