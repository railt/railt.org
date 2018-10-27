<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

/**
 * Class Urn
 */
class Urn
{
    /**
     * @var string
     */
    private const PATH_DELIMITER = '/';

    /**
     * @var string
     */
    protected $value;

    /**
     * Urn constructor.
     * @param string $urn
     */
    public function __construct(string $urn = '')
    {
        $this->value = $urn;
    }

    /**
     * @param string $value
     * @return Urn
     */
    public function update(string $value): Urn
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return Urn|null
     */
    public function getParent(): ?Urn
    {
        $chunks = $this->getChunks();

        \array_pop($chunks);

        return \count($chunks) ? static::fromChunks($chunks) : null;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return \array_last($this->getChunks());
    }

    /**
     * @return iterable|string[]
     */
    public function getChunks(): iterable
    {
        return \explode(self::PATH_DELIMITER, $this->value);
    }

    /**
     * @param array $chunks
     * @return Urn
     */
    public static function fromChunks(array $chunks): Urn
    {
        return new static(\implode(self::PATH_DELIMITER, $chunks));
    }

    /**
     * @return bool
     */
    public function isRoot(): bool
    {
        return ! $this->hasParent();
    }

    /**
     * @return bool
     */
    public function hasParent(): bool
    {
        return \substr_count($this->value, self::PATH_DELIMITER) > 0;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param Urn $urn
     * @return int
     */
    public function compare(Urn $urn): int
    {
        return \substr_count($this->getValue(), self::PATH_DELIMITER) <=>
            \substr_count($urn->getValue(), self::PATH_DELIMITER);
    }
}
