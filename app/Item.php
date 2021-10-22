<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'content', 'purchase_date', 'expiration_date',
        'image'
        ];
    
    
   // アイテムを登録するユーザ　（アイテムとの関係を定義○一対多)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
