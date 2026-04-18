<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyContactPerson extends Model
{
    use HasFactory;
    protected $table = 'company_contact_persons';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}