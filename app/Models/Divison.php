<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divison extends Model
{
    protected $table = 'divisons';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}