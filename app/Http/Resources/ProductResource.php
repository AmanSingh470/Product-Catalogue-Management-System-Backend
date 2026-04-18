<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category->name,
            'segment' => $this->segment->name,
            'division' => $this->division->name,
            'company' => $this->company->name,
            'company_contact_person' => $this->companyContactPerson->name,
            'main_advantages' => $this->main_advantages,
            'key_facts' => $this->key_facts,
            'applications' => $this->applications,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}