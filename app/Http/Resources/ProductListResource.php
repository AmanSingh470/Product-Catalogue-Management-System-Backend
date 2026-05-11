<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                     => $this->id,
            'title'                  => $this->title,
            'segment'                => $this->segment->name,
            'division'               => $this->division->name,
            'company'                => $this->company->name,
            'thumbnail'              => $this->productMedia->where('media_type', 'image')->pluck('media_url')->first(),
        ];
    }
}