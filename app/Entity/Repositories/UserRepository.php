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
use RDS\Hydrogen\Hydrogen;

/**
 * Interface UserRepository
 * @mixin Hydrogen
 */
interface UserRepository extends
    ObjectRepository,
    UserRepository\FindableByLogin,
    UserRepository\FindableByEmail,
    UserRepository\CreatableFromSocialite
{

}
