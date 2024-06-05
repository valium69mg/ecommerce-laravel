<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProducts extends Model
{
    use HasFactory;
    protected $fillable = [
        "userid",
        "product_id",
        "quantity",
    ];
}
