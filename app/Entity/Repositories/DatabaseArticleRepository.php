<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repositories;

use Doctrine\ORM\EntityRepository;
use RDS\Hydrogen\Hydrogen;

/**
 * Class DatabaseArticleRepository
 */
class DatabaseArticleRepository extends EntityRepository implements ArticleRepository
{
    use Hydrogen;
}
