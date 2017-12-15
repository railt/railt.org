<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Issue;

use App\Entity\Contributor;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Class Author
 */
final class Author extends Contributor implements
    Jsonable,
    Arrayable,
    \JsonSerializable
{
    /**
     * Author constructor.
     * @param int $gitHubId
     * @param string $login
     * @param string $url
     * @param string $avatar
     */
    public function __construct(int $gitHubId, string $login, string $url, string $avatar)
    {
        parent::__construct($gitHubId, $login, $url, $avatar);
        $this->touch()->bootTimestamps();
    }

    /**
     * @return string
     */
    public function jsonSerialize(): string
    {
        return $this->toJson();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'     => $this->getGitHubId(),
            'url'    => $this->getUrl(),
            'login'  => $this->getLogin(),
            'avatar' => $this->getAvatar(),
        ];
    }

    /**
     * @param int $options
     * @return string
     */
    public function toJson($options = 0): string
    {
        return \json_encode($this->toArray(), $options);
    }
}
