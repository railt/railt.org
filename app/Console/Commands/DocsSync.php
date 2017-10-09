<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Document;
use App\Services\Language;
use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

/**
 * Class DocsSync
 */
class DocsSync extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'docs:sync';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @param Language $language
     * @param GitHubManager $manager
     * @return mixed
     * @throws \Github\Exception\InvalidArgumentException
     * @throws \Github\Exception\ErrorException
     */
    public function handle(Language $language, GitHubManager $manager)
    {
        foreach ($language->all() as $lang => $title) {
            foreach ($this->files($manager, $lang) as $file) {
                $document = $this->find($file['sha']);

                $document->lang = $lang;
                $document->uri = $this->formatUri($lang, $file['path']);
                $document->content_original = $this->getBody($manager, $file['path']);

                $document->save();
            }
        }
    }

    /**
     * @param string $lang
     * @param string $path
     * @return string
     */
    private function formatUri(string $lang, string $path): string
    {
        $path = Str::replaceFirst($lang . '/', '', $path);
        $path = Str::replaceLast('.md', '', $path);

        return $path;
    }

    /**
     * @param GitHubManager $manager
     * @param string $path
     * @return string
     * @throws \Github\Exception\ErrorException
     * @throws \Github\Exception\InvalidArgumentException
     */
    private function getBody(GitHubManager $manager, string $path): string
    {
        return $manager->repo()
            ->contents()
            ->download('railt', 'docs', $path);
    }

    /**
     * @param string $sha
     * @return Document
     */
    private function find(string $sha): Document
    {
        return Document::firstOrNew([
            'hash' => $sha
        ]);
    }

    /**
     * @param GitHubManager $manager
     * @param string $language
     * @return \Traversable
     */
    private function files(GitHubManager $manager, string $language): \Traversable
    {
        $files = $manager->repo()
            ->contents()
            ->show('railt', 'docs', $language);

        foreach ($files as $file) {
            if ($file['type'] === 'dir') {
                yield from $this->files($manager, $file['path']);
            } else {
                yield $file;
            }
        }
    }
}
