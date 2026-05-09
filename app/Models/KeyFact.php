<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KeyFact extends Model
{
    use HasFactory;

    protected $table = 'key_facts';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}