<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Services;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Session\Session;

/**
 * Class Language
 */
class Language
{
    private const LANGUAGE_SESSION_KEY = 'lang';

    /**
     * @var Session
     */
    private $session;

    /**
     * @var Repository
     */
    private $config;

    /**
     * @var array
     */
    private $allowed = [
        'ru' => 'Русский',
        'en' => 'English'
    ];

    /**
     * Language constructor.
     * @param Session $session
     * @param Repository $config
     */
    public function __construct(Session $session, Repository $config)
    {
        $this->session = $session;
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->allowed;
    }

    /**
     * @param string $lang
     * @return bool
     */
    public function isAllowed(string $lang): bool
    {
        $keys = \array_keys($this->allowed);

        return \in_array($lang, $keys, true);
    }

    /**
     * @param string $lang
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function set(string $lang)
    {
        if (!$this->isAllowed($lang)) {
            throw new \InvalidArgumentException('Invalid language identifier "' . $lang . '"');
        }

        $this->session->put(self::LANGUAGE_SESSION_KEY, $lang);

        return $this;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->session->get(self::LANGUAGE_SESSION_KEY, $this->config->get('app.locale'));
    }
}
