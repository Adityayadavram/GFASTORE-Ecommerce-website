<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{   
    use HasFactory;

    use HasFactory;

    protected $fillable = ['user_id','product_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    // protected $fillable = ['user_id', 'product_id', 'quantity'];

    // public function product()
    // {
    //     return $this->belongsTo(Products::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
