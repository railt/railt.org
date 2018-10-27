<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Common\Identifiable;
use App\Entity\Common\Identifier;
use App\Entity\Common\Timestampable;
use App\Entity\Common\Timestamps;

/**
 * Class UserAuthentication
 */
class UserAuthentication implements
    Identifiable,
    Timestampable
{
    use Identifier;
    use Timestamps;

    /**
     * @var User
     */
    protected $user;

    /**
     * UserAuthentication constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;

        $this->actualize();
    }
}
