<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Language;

use App\Entity\Language;

/**
 * Class Reader
 */
class Reader
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var FindableByName
     */
    private $languages;

    /**
     * @var array
     */
    private static $identity = [];

    /**
     * @param FindableByName $languages
     * @param \SplFileInfo $file
     * @return Reader
     */
    public static function fromSplFileInfo(FindableByName $languages, \SplFileInfo $file): Reader
    {
        $pathInfo = \pathinfo($file->getBasename('.md'));

        $name = (string)($pathInfo[\PATHINFO_EXTENSION] ?? \config('app.locale'));

        return new static($languages, $name);
    }

    /**
     * @return void
     */
    public static function flush(): void
    {
        self::$identity = [];
    }

    /**
     * Reader constructor.
     * @param FindableByName $languages
     * @param string $name
     */
    public function __construct(FindableByName $languages, string $name)
    {
        $this->name = $name;
        $this->languages = $languages;
    }

    /**
     * @return Language
     */
    public function toLanguage(): Language
    {
        $name = $this->name;

        if (! \array_key_exists($name, self::$identity)) {
            self::$identity[$name] = $this->languages->findByName($name) ??
                new Language($name, $name);
        }

        return self::$identity[$name];
    }
}
