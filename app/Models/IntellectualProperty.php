<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IntellectualProperty extends Model
{
    use HasFactory;

    protected $table = 'intellectual_properties';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}