<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    
    /**
     * @var string[]
     */
    protected $fillable = ['seller_name'];
}

