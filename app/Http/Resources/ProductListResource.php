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
            'image_url'              => $this->productMedia->first()?->image,
        ];
    }
}