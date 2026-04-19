<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilterProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'all' => collect($this->all)->map(function ($division) {
                return [
                    'id' => $division->id,
                    'name' => $division->name,
                    'description' => $division->description,
                    'image' => $division->divisionMedia ? $division->divisionMedia->image : null,
                ];
            }),
            'categories'     => $this->categories,
            'segments'       => $this->segments,
            'divisions'      => $this->divisions,
            'companies'      => $this->companies,
            'contactPersons' => $this->contactPersons
        ];
    }
}