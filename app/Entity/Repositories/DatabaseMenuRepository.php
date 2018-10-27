<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repositories;

use App\Entity\Language;
use App\Entity\Menu;
use Doctrine\ORM\EntityRepository;
use RDS\Hydrogen\Hydrogen;
use RDS\Hydrogen\Query;

/**
 * Class DatabaseMenuRepository
 */
class DatabaseMenuRepository extends EntityRepository implements MenuRepository
{
    use Hydrogen {
        Hydrogen::query as hydrogen;
    }

    /**
     * @return Query
     * @throws \LogicException
     */
    public function query(): Query
    {
        return $this->hydrogen()->asc('orderId');
    }

    /**
     * @param Language $language
     * @return iterable|Menu[]
     * @throws \LogicException
     */
    public function getRootItems(Language $language): iterable
    {
        return $this->query
            ->leftJoin('document')
            ->whereLanguage($language)
            ->whereNull('parent')
            ->where('urn.value', '<>', Menu::ROOT_MENU_ITEM)
            ->collect();
    }

    /**
     * @param string $urn
     * @return Query
     * @throws \InvalidArgumentException
     */
    public function whereUrn(string $urn): Query
    {
        return $this->query->where('urn.value', $urn);
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
     * @param Language $lang
     * @param string $urn
     * @return Menu|null
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function findByLanguageAndUrn(Language $lang, string $urn): ?Menu
    {
        return $this->query->whereLanguage($lang)->whereUrn($urn)->first();
    }

    /**
     * @param string $urn
     * @return Menu|null
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function findByUrn(string $urn): ?Menu
    {
        return $this->query->whereUrn($urn)->first();
    }
}
