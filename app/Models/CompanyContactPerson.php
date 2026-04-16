<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyContactPerson extends Model
{
    protected $table = 'company_contact_persons';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}