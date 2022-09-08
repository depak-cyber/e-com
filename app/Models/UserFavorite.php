<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    use HasFactory;

    protected $table='user_favorites';

    public function user_favorites(){
        return $this->belongsTo(Users::class);
    }
    public function product_favorites(){
        return $this->belongsTo(Product::class);
    }
}
