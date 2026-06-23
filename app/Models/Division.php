<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Division extends Model
{
    use HasFactory;
    protected $table = 'divisions';

    protected $fillable = [
        'name',
        'description'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function divisionMedia()
    {
        return $this->hasOne(DivisionMedia::class);
    }
}