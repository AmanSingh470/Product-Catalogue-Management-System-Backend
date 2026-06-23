<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyContactPerson extends Model
{
    use HasFactory;
    protected $table = 'company_contact_persons';

    protected $fillable = [
        'name',
        'email',
        'function',
        'company_id'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
