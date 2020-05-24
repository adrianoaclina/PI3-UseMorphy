<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $fillable = ['user_id'];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function produtos(){
        return $this->belongsToMany(Produto::class);
    }
}
