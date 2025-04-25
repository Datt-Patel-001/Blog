<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name','city_id','cuisine_type'];

    public function dishes() {
        return $this->hasMany(Dish::class);
    }
}
