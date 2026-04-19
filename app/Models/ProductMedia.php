<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductMedia extends Model
{
    use HasFactory;
    protected $table = 'product_media';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}