<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'segment_id',
        'divison_id',
        'company_id',
        'contact_person_id',
        'main_advantages',
        'key_facts',
        'applications',
        'status'
    ];

    protected $casts = [
        'category_id' => 'integer',
        'segment_id' => 'integer',
        'divison_id' => 'integer',
        'company_id' => 'integer',
        'contact_person_id' => 'integer',
    ];

    protected $attributes = [
        'status' => 'active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }

    public function divison()
    {
        return $this->belongsTo(Divison::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function contactPerson()
    {
        return $this->belongsTo(CompanyContactPerson::class, 'contact_person_id');
    }
}