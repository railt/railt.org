<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\Domain\Shared\ValueObjectInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class Content implements ValueObjectInterface
{
    #[ORM\Column(name: 'source', type: 'text', nullable: false, options: ['default' => ''])]
    protected string $source;

    #[ORM\Column(name: 'rendered', type: 'text', nullable: true)]
    protected ?string $rendered = null;

    public function __construct(string|\Stringable $content = '', string|\Stringable|null $html = null)
    {
        $this->update($content, $html);
    }

    public function render(string|\Stringable $html): void
    {
        $this->rendered = (string)$html;
    }

    public function update(string|\Stringable $content, string|\Stringable|null $html = null): void
    {
        $this->rendered = $html === null ? $html : (string)$html;
        $this->source = (string)$content;
    }

    public function same(ValueObjectInterface $object): bool
    {
        return $object === $this
            || ($object instanceof static && $object->source === $this->source);
    }

    /**
     * Clears the html content of the content.
     */
    public function clear(): void
    {
        $this->rendered = null;
    }

    /**
     * Returns {@see true} if there is no original content
     * and {@see false} otherwise.
     */
    public function isEmpty(): bool
    {
        return \trim($this->source) === '';
    }

    /**
     * Returns {@see true} if the content contains html content
     * and {@see false} otherwise.
     */
    public function isRendered(): bool
    {
        return $this->rendered !== null;
    }

    public function getContent(): string
    {
        return $this->rendered ?: $this->source ?? '';
    }

    public function getRawContent(): string
    {
        return $this->source ?? '';
    }

    public function getRenderedContent(): string
    {
        return $this->rendered ?? '';
    }

    /**
     * Converts the content to a string based on the state of the content.
     */
    public function __toString(): string
    {
        return $this->rendered ?: $this->source ?? '';
    }
}
