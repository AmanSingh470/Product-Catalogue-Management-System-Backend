<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                      => $this->id,
            'title'                   => $this->title,
            'description'             => $this->description,
            'category'                => $this->category->name,
            'segment'                 => $this->segment->name,
            'segment_id'              => $this->segment_id,
            'division'                => $this->division->name,
            'company'                 => $this->company->name,
            'company_contact_person'  => $this->companyContactPerson->only('name', 'email', 'function'),
            'main_advantages'         => $this->mainAdvantage->pluck('title', 'description'),
            'key_facts'               => $this->keyFact->pluck('description'),
            'intellectual_properties' => $this->intellectualProperty->pluck('description'),
            'applications'            => $this->application->pluck('description'),
            'status'                  => $this->status,
            'media'                   => [
                'image' => $this->productMedia
                    ->where('media_type', 'image')
                    ->pluck('media_url')
                    ->values(),

                'video' => $this->productMedia
                    ->where('media_type', 'video')
                    ->pluck('media_url')
                    ->values(),

                'file'  => $this->productMedia
                    ->where('media_type', 'file')
                    ->pluck('media_url')
                    ->values(),
            ],
            'updated_at'              => $this->updated_at?->format('d M Y, h:i A')];
    }
}
