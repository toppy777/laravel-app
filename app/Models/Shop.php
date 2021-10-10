<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    public $hidden = ['created_at', 'updated_at'];

    public function items() {
        $this->hasMany(Item::class);
    }
}
