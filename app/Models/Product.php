<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function companyContactPerson()
    {
        return $this->belongsTo(CompanyContactPerson::class, 'contact_person_id');
    }

    public function productMedia()
    {
        return $this->hasMany(ProductMedia::class, 'product_id');
    }
    public function intellectualProperty()
    {
        return $this->hasMany(IntellectualProperty::class, 'product_id');
    }
    public function keyFact()
    {
        return $this->hasMany(KeyFact::class, 'product_id');
    }
    public function mainAdvantage()
    {
        return $this->hasMany(MainAdvantage::class, 'product_id');
    }
    public function application()
    {
        return $this->hasMany(Application::class, 'product_id');
    }
}