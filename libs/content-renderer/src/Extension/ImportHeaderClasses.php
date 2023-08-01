<?php

declare(strict_types=1);

namespace Local\ContentRenderer\Extension;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Inline\Text;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Symfony\Component\String\Slugger\SluggerInterface;

final class ImportHeaderClasses implements ExtensionInterface
{
    /**
     * @var non-empty-string
     */
    private const PCRE_CLASS_SUFFIX = '/\{\h*\.([\w\d\-_]+)\h*\}/isum';

    public function __construct(
        private readonly SluggerInterface $slugger = new AsciiSlugger(),
    ) {
    }

    /**
     * @param EnvironmentBuilderInterface $environment
     * @return void
     */
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(DocumentParsedEvent::class, $this, -50);
    }

    /**
     * @param DocumentParsedEvent $e
     * @return void
     */
    public function __invoke(DocumentParsedEvent $e): void
    {
        $document = $e->getDocument();

        foreach ($document->children() as $heading) {
            if ($heading instanceof Heading) {
                $suffix = $heading->lastChild();

                if ($suffix instanceof Text) {
                    /**
                     * Collect header class list.
                     *
                     * @var array<non-empty-string> $classes
                     */
                    $classes = \explode(' ', $heading->data->get('attributes/class', ''));
                    $classes = \array_filter($classes);

                    $callback = static function (array $matches) use (&$classes): string {
                        $classes[] = $matches[1];

                        return '';
                    };

                    // Remove "{.class-name}" content and collect removed classes
                    $content = $suffix->getLiteral();
                    $content = @\preg_replace_callback(self::PCRE_CLASS_SUFFIX, $callback, $content)
                        ?: $content;
                    $suffix->setLiteral($content);

                    // Update class list
                    $heading->data->set('attributes/class', \implode(' ', $classes));


                    // Prepend link
                    $slug = (string)$this->slugger->slug($content);

                    $link = new Link('#' . $slug);
                    $link->data->set('attributes/class', 'documentation-anchor');
                    $link->data->set('attributes/id', $slug);

                    $heading->prependChild($link);
                }
            }
        }
    }
}
