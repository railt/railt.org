<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repositories;

use Doctrine\Common\Persistence\ObjectRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use RDS\Hydrogen\Hydrogen;

/**
 * Interface ArticleRepository
 * @mixin Hydrogen
 * @method LengthAwarePaginator paginate(int $take = 10, int $page = 0)
 */
interface ArticleRepository extends ObjectRepository
{

}
