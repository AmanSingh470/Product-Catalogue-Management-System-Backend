<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    protected $table = 'segments';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}