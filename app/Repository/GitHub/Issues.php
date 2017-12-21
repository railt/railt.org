<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\GitHub;

use App\Entity\Issue;
use App\Repository\IssuesRepository;
use Carbon\Carbon;

/**
 * Class Issues
 */
class Issues extends GitHubRepository implements IssuesRepository
{
    /**
     *
     */
    private const DEFAULT_REPOSITORY_USER = 'railt';

    /**
     * @param string $url
     * @return Issue|null
     */
    public function findOneByUrl(string $url): ?Issue
    {
        return $this->findAll()->first(function (Issue $issue) use ($url): bool {
            return $issue->getUrl() === $url;
        });
    }

    /**
     * @return iterable
     */
    protected function getData(): iterable
    {
        $issues = $this->github->organization()
            ->issues(self::DEFAULT_REPOSITORY_USER, [
                'filter'    => 'all',
                'state'     => 'open',
                'sort'      => 'updated',
                'direction' => 'desc',
            ]);

        foreach ($issues as $data) {
            yield [
                'number'     => $data['number'],
                'title'      => $data['title'],
                'author'     => Issue\Author::fromArray($data['user'])->toJson(),
                'url'        => $data['html_url'],
                'labels'     => \collect((array)$data['labels'])->map->name->toArray(),
                'created_at' => Carbon::parse($data['created_at']),
                'updated_at' => Carbon::parse($data['updated_at']),
            ];
        }
    }
}
