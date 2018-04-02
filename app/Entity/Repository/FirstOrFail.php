<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repository;

use Serafim\Hydrogen\Query;
use Serafim\Hydrogen\Query\Builder;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Trait FindOrError
 */
trait FirstOrFail
{
    /**
     * @param Builder $query
     * @return mixed
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    protected function firstOrFail(Builder $query)
    {
        $result = $query->first();

        if ($result === null) {
            throw new NotFoundHttpException('Entity not found');
        }

        return $result;
    }
}
