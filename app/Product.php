<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','image', 'price', 'discount', 'stock', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function fMoney($value){
        return 'R$'.number_format($value,2);
    }
    public function price(){
        return $this->fMoney($this->price);
    }
    public function discountPrice(){
        return $this->fMoney($this->price * (1-$this->discount/100));
    }
}
