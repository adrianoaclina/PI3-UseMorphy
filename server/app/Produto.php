<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [ 'nome',
                            'descricao',
                            'imagem',
                            'preco',
                            'desconto',
                            'estoque',
                            'categoria_id'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
