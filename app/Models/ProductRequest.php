<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    use HasFactory;
    protected $table    = 'product_requests';
    protected $fillable = [
        'title',
        'category_id',
        'company_id',
        'division_id',
        'segment_id',
        'description',
    ];
    public function category()
    {
        return $this->hasOne(Category::class);
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
