<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DivisionMedia extends Model
{
    use HasFactory;
    protected $table = 'division_media';

    public function divisionMedia()
    {
        return $this->belongsTo(Product::class);
    }
}