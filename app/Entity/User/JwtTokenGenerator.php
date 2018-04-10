<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\User;

use App\Entity\User;
use Carbon\Carbon;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Token;
use Lcobucci\JWT\ValidationData;

/**
 * Class JwtTokenGenerator
 */
class JwtTokenGenerator implements FindableByToken, ProvidesToken
{
    private const SIG_USER = 'uid';

    /**
     * @var array|string[]
     */
    private $store = [];

    /**
     * @return Signer
     */
    private function getSigner(): Signer
    {
        return new Sha256();
    }

    /**
     * @param User $user
     * @return string
     * @throws \BadMethodCallException
     */
    public function token(User $user): string
    {
        if (! \array_key_exists($user->getId(), $this->store)) {
            $token = (new Builder())
                ->setIssuer(\config('app.url'))
                ->setAudience(\config('app.url'))
                ->setIssuedAt(Carbon::now()->timestamp)
                ->setNotBefore(Carbon::now()->subMinute()->timestamp)
                ->setExpiration(Carbon::now()->addDay()->timestamp)
                ->set(self::SIG_USER, $user->getId())
                ->sign($this->getSigner(), \config('app.key'))
                ->getToken();

            $this->store[$user->getId()] = $token;
        }

        return (string)$this->store[$user->getId()];
    }

    /**
     * @return ValidationData
     */
    private function validation(): ValidationData
    {
        $data = new ValidationData();

        $data->setIssuer(\config('app.url'));
        $data->setAudience(\config('app.url'));
        $data->setCurrentTime(Carbon::now()->timestamp);

        return $data;
    }

    /**
     * @param string $token
     * @return Token
     * @throws \BadMethodCallException
     * @throws \InvalidArgumentException
     */
    private function extract(string $token): Token
    {
        $info = (new Parser())->parse($token);

        if (! $info->validate($this->validation())) {
            throw new \InvalidArgumentException('Token validation failed');
        }

        if (! $info->verify($this->getSigner(), \config('app.key'))) {
            throw new \InvalidArgumentException('Token verification failed');
        }

        return $info;
    }

    /**
     * @param FindableById $users
     * @param string $token
     * @return User|null
     * @throws \InvalidArgumentException
     * @throws \BadMethodCallException
     * @throws \OutOfBoundsException
     */
    public function getUser(FindableById $users, string $token): ?User
    {
        $uid = (int)$this->extract($token)->getClaim(self::SIG_USER);

        return $users->findById($uid);
    }
}
