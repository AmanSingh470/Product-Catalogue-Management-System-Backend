<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KeyFact extends Model
{
    use HasFactory;

    protected $table = 'key_facts';
    protected $fillable = [
        'product_id',
        'description',
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}