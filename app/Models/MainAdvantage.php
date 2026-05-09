<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainAdvantage extends Model
{
    use HasFactory;

    protected $table = 'main_advantages';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}