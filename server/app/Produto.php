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
    public function hasTag($tagId){
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function precoDesconto(){
        return $this->fMoney($this->preco * (1-$this->desconto/100));
    }
    public function preco(){
        return $this->fMoney($this->preco);
    }
    public function fMoney($value){
        return 'R$'.number_format($value, 2);
    }
}
