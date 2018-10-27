<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\Document;
use App\Entity\Repositories\DocumentRepository as Documents;
use App\Entity\Repositories\LanguageRepository as Languages;
use App\Entity\Repositories\MenuRepository as Menus;
use App\Entity\Repositories\MenuRepository;
use Doctrine\ORM\EntityManagerInterface;
use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Sync\DocsLoader;
use Sync\MenuLoader;
use Sync\Repository\GitHubRepository;

/**
 * Class TestCommand
 */
class TestCommand extends Command
{
    /**
     * @var string
     */
    protected $name = 'test';

    /**
     * @param MenuRepository $repository
     */
    public function handle(MenuRepository $repository): void
    {
        // Hydrogen
        $repository->query
            ->with('children')
            ->with('parent')
            ->with('language')
            ->with('document')
            ->get();
    }
}
