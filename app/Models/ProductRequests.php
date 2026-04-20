<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductRequests extends Model
{
    use HasFactory;
    protected $table = 'product_requests';
    protected $fillable = [
        'title',
        'category_id',
        'company_id',
        'division_id',
        'segment_id',
        'description',
    ];
    public function cateogry()
    {
        return $this->hasOne(Cateogry::class);
    }
    public function company()
    {
        return $this->hasOne(Company::class);
    }
    public function division()
    {
        return $this->hasOne(Division::class);
    }
    public function segment()
    {
        return $this->hasOne(Segment::class);
    }
}