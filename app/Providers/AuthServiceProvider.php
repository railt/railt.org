<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use App\Entity\User\AuthProvider;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * Class AuthServiceProvider
 */
final class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \ReflectionException
     */
    public function boot(): void
    {
        $this->registerPolicies();

        $this->authProvider(
            $this->app->make(Factory::class),
            $this->app->make(ManagerRegistry::class),
            $this->app->make(Hasher::class)
        );
    }

    /**
     * @param AuthManager $auth
     * @param ManagerRegistry $registry
     * @param Hasher $hash
     * @throws \ReflectionException
     * @throws \InvalidArgumentException
     */
    private function authProvider(AuthManager $auth, ManagerRegistry $registry, Hasher $hash): void
    {
        $auth->provider('railt', function (Container $app, array $config) use ($registry, $hash) {
            /** @var string $entity */
            $entity = $config['model'] ?? '';

            /** @var EntityManagerInterface $em */
            $em = $registry->getManagerForClass($entity);

            if (! $em) {
                throw new \InvalidArgumentException("No EntityManager is set-up for {$entity}");
            }

            return new AuthProvider($hash, $em, $entity);
        });
    }
}
