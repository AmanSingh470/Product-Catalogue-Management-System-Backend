<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductMedia extends Model
{
    use HasFactory;
    protected $table = 'product_media';

    protected $fillable = [
        'product_id',
        'media_type',
        'media_url',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}