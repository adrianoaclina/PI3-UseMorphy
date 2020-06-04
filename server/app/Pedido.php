<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['user_id', 'total', 'status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function produtos(){
        return $this->belongsToMany(Produto::class);
    }
}
