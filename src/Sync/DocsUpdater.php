<?php

declare(strict_types=1);

namespace App\Sync;

use App\Entity\Documentation;
use App\Repository\DocumentationRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Highlight\Highlighter;
use Illuminate\Support\Str;
use League\CommonMark\MarkdownConverterInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class DocsUpdater extends Updater
{
    /**
     * @var MarkdownConverterInterface
     */
    private MarkdownConverterInterface $md;

    /**
     * @var Highlighter
     */
    private Highlighter $hl;

    /**
     * @param DocumentationRepository $docs
     * @param EntityManager $em
     * @param MarkdownConverterInterface $md
     * @param Highlighter $hl
     */
    public function __construct(
        EntityManager $em,
        DocumentationRepository $docs,
        MarkdownConverterInterface $md,
        Highlighter $hl
    ) {
        parent::__construct($em, $docs);
        $this->md = $md;
        $this->hl = $hl;
    }

    /**
     * @param string $directory
     * @param OutputInterface $out
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function update(string $directory, OutputInterface $out): void
    {
        foreach ($this->files($directory) as $file) {
            $path = \str_replace(['.md', '\\'], ['', '/'], $file->getRelativePathname());
            $content = $this->md->convertToHtml($file->getContents());

            $info = $this->analyze($content);

            $docs = new Documentation($info['title'], $path, $this->process($content));

            $this->em->persist($docs);
        }

        $this->em->flush();
    }

    /**
     * @param string $directory
     * @return iterable<SplFileInfo>
     */
    private function files(string $directory): iterable
    {
        return (new Finder())
            ->files()
            ->in($directory)
            ->name('*.md')
        ;
    }

    /**
     * @param string $html
     * @return array {title: string}
     */
    private function analyze(string $html): array
    {
        \preg_match('/<h1>(.+?)<\/h1>/isum', $html, $matches);

        return [
            'title' => $matches[1] ?? 'Unknown',
        ];
    }

    /**
     * @param string $html
     * @return string
     * @throws \Exception
     */
    private function process(string $html): string
    {
        $html = \preg_replace_callback('/<h(\d)>(.+?)<\/h\d>/isum', static function (array $m) {
            [, $level, $title] = $m;

            return \vsprintf('
                <h%d><a href="#%s" id="%2$s" class="documentation-anchor"></a>%s</h%1$d>
            ', [
                $level,
                Str::slug(\trim($title)),
                \trim($title),
            ]);
        }, $html);

        $html = \preg_replace_callback('/<pre><code class="language-(.+?)">(.+?)<\/code><\/pre>/isum',
            function (array $m) {
                [, $lang, $content] = $m;
                $content = \html_entity_decode($content);

                $result = $this->hl->highlight($lang, $content);

                return '<pre><code data-lang="' . $result->language . '">' . $result->value . '</code></pre>';
            }, $html);

        return $html;
    }
}
