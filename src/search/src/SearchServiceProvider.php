<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Search;

use App\Entity\Repositories\DocumentRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class SearchServiceProvider
 */
class SearchServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->app->singleton(SearchInterface::class, function () {
            return new Search(
                $this->app->make(DocumentRepository::class)
            );
        });
    }
}
