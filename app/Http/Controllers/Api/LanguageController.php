<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Entity\Language;
use App\Repository\LanguagesRepository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Collection;
use Railt\Routing\Contracts\InputInterface;

/**
 * Class LanguageController
 */
class LanguageController
{
    /**
     * @var LanguagesRepository
     */
    private $repository;

    /**
     * @var Container
     */
    private $container;

    /**
     * LanguageController constructor.
     * @param LanguagesRepository $repository
     */
    public function __construct(LanguagesRepository $repository, Container $container)
    {
        $this->repository = $repository;
        $this->container = $container;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->repository->findAll()->map(function (Language $language): array {
            return [
                'code'  => $language->getCode(),
                'title' => $language->getTitle(),
            ];
        });
    }

    /**
     * @param InputInterface $input
     * @return array
     */
    public function resolve(InputInterface $input): array
    {
        if ($input->has('language')) {
            $lang = $this->repository->findOneByCode($input->get('language'));

            if ($lang) {
                $this->container->instance(Language::class, $lang);
            }
        }

        return [];
    }
}
