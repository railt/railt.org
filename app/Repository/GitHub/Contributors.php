<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\GitHub;

use App\Entity\Contributor;
use App\Repository\ContributorsRepository;

/**
 * Class Contributors
 */
class Contributors extends GitHubRepository implements ContributorsRepository
{
    /**
     *
     */
    private const DEFAULT_REPOSITORY_USER = 'railt';

    /**
     * @param int $id
     * @return Contributor|null|object
     * @throws \LogicException
     */
    public function findOneByGitHubId(int $id): ?Contributor
    {
        return $this->query->where('gitHubId', $id)->first();
    }

    /**
     * @return iterable
     */
    protected function getData(): iterable
    {
        $items = [];

        foreach ($this->loadRepositories() as $repo) {
            foreach ($this->loadContributors($repo['name']) as $data) {
                if (\array_key_exists($data['id'], $items)) {
                    $items[$data['id']]['contributions'] += $data['contributions'] ?? 0;
                    continue;
                }

                $items[$data['id']] = [
                    'github_id'     => $data['id'],
                    'login'         => $data['login'] ?? '',
                    'url'           => $data['html_url'] ?? $data['url'] ?? '',
                    'avatar'        => $data['avatar_url'] ?? $data['avatar'] ?? '',
                    'contributions' => $data['contributions'] ?? 0,
                ];
            }
        }

        yield from \array_values($items);
    }

    /**
     * @return iterable
     */
    private function loadRepositories(): iterable
    {
        return $this->github->organization()->repositories(self::DEFAULT_REPOSITORY_USER);
    }

    /**
     * @param string $repo
     * @return iterable
     */
    private function loadContributors(string $repo): iterable
    {
        yield from $this->github->repository()->contributors(self::DEFAULT_REPOSITORY_USER, $repo);

        foreach ($this->loadIssues($repo) as $issue) {
            yield $issue['user'];
            yield from $issue['assignees'];

            foreach ($this->loadIssueComments($repo, $issue['number']) as $comment) {
                yield $comment['user'];
            }
        }
    }

    /**
     * @param string $repo
     * @return array
     */
    private function loadIssues(string $repo): iterable
    {
        return $this->github->issues()->all(self::DEFAULT_REPOSITORY_USER, $repo);
    }

    /**
     * @param string $repo
     * @param int $issueId
     * @return iterable
     */
    private function loadIssueComments(string $repo, int $issueId): iterable
    {
        return $this->github->issues()->comments()->all(self::DEFAULT_REPOSITORY_USER, $repo, $issueId);
    }
}
