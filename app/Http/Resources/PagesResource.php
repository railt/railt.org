<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Resources;

use App\Entity\Page;
use Illuminate\Http\Resources\Json\Resource;

/**
 * Class DocumentsResource
 * @property-read Page $resource
 */
class PagesResource extends Resource
{
    /**
     * DocumentsResource constructor.
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        parent::__construct($page);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     * @throws \InvalidArgumentException
     */
    public function toArray($request): array
    {
        $route = \route('api.page', [
            'lang' => $this->resource->getDocument()->getLanguage()->getCode(),
            'path' => $this->resource->getSlug(),
        ]);

        return [
            'id'        => $this->resource->getId(),
            'route'     => $route,
            'title'     => $this->resource->getTitle(),
            'content'   => $this->resource->getContent()->getRendered(),
            'createdAt' => $this->resource->getCreated()->toRfc3339String(),
            'updatedAt' => \optional($this->resource->getUpdated())->toRfc3339String(),
        ];
    }
}

