<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use RDS\Hydrogen\Query;

/**
 * Class DoctrineProvider
 */
final class DoctrineServiceProvider extends ServiceProvider
{
    /**
     * @param Repository $config
     * @param EntityManagerInterface $em
     */
    public function boot(Repository $config, EntityManagerInterface $em): void
    {
        $this->bootRepositoryBindings($config, $em);

        $this->bootPagination();
    }

    /**
     * @return void
     */
    private function bootPagination(): void
    {
        Query::macro('paginate', function (int $take = 10, int $page = 1) {
            /** @var Query $this */

            $count = $this->clone()->count();
            $items = $this->skip((\max(1, $page) - 1) * $take)->take($take)->get();

            return new LengthAwarePaginator($items, $count, $take, $page, [
                'path' => Paginator::resolveCurrentPath()
            ]);
        });
    }

    /**
     * @param Repository $config
     * @param EntityManagerInterface $em
     */
    private function bootRepositoryBindings(Repository $config, EntityManagerInterface $em): void
    {
        $repositories = (array)$config->get('repositories', []);

        foreach ($repositories as $original => $aliases) {
            $repository = $em->getRepository($original);

            foreach ($aliases as $alias) {
                $this->app->instance($alias, $repository);
            }
        }
    }
}
