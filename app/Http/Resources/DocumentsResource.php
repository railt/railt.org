<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Resources;

use App\Entity\Document;
use Illuminate\Http\Resources\Json\Resource;
use Serafim\Hydrogen\Collection;

/**
 * Class DocumentsResource
 * @property-read Document $resource
 */
class DocumentsResource extends Resource
{
    /**
     * DocumentsResource constructor.
     * @param Document $document
     */
    public function __construct(Document $document)
    {
        parent::__construct($document);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'        => $this->resource->getId(),
            'language'  => [
                'code'  => $this->resource->getLanguage()->getCode(),
                'title' => $this->resource->getLanguage()->getTitle(),
            ],
            'pages'     => Collection::make($this->resource->getPages())
                ->filter->isBasicPage()
                ->mapInto(PagesResource::class),
            'createdAt' => $this->resource->getCreated()->toRfc3339String(),
            'updatedAt' => \optional($this->resource->getUpdated())->toRfc3339String(),
        ];
    }
}
