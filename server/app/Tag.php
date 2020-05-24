<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['nome'];

    public function produtos()
    {
        return $this->belongsToMany(Product::class);
    }
}
