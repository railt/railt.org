<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repositories;

use App\Entity\Document;
use App\Entity\Language;
use Doctrine\ORM\EntityRepository;
use RDS\Hydrogen\Hydrogen;
use RDS\Hydrogen\Query;
use Search\DocumentResult;
use Search\SearchInterface;

/**
 * Class DatabaseDocumentRepository
 */
class DatabaseDocumentRepository extends EntityRepository implements
    DocumentRepository,
    SearchInterface
{
    use Hydrogen;

    /**
     * @param Language $language
     * @param string $query
     * @param int $results
     * @return iterable
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function search(Language $language, string $query, int $results): iterable
    {
        $like = \sprintf('%%%s%%', $query);

        $result = $this->query->where('language', $language)
            ->like('title', $like)
            ->or->like('navigation.value', $like)
            ->limit($results)
            ->get();

        /** @var Document $item */
        foreach ($result as $item) {
            yield new DocumentResult($query, $item);
        }
    }

    /**
     * @param Language $language
     * @return Query|$this
     * @throws \InvalidArgumentException
     */
    public function whereLanguage(Language $language): Query
    {
        return $this->query->where('language', $language);
    }

    /**
     * @param string $urn
     * @return Query|$this
     * @throws \InvalidArgumentException
     */
    public function whereUrn(string $urn): Query
    {
        return $this->query->where('urn.value', $urn);
    }

    /**
     * @param Language $lang
     * @param string $urn
     * @return Document|null
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function findByLanguageAndUrn(Language $lang, string $urn): ?Document
    {
        return $this->query->whereLanguage($lang)->whereUrn($urn)->first();
    }

    /**
     * @param string $urn
     * @return Document|null
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function findByUrn(string $urn): ?Document
    {
        return $this->query->whereUrn($urn)->first();
    }
}
