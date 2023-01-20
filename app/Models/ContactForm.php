<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',      
        'email',       
        'url',
        'gender',
        'age',
        'contact',     
        ];

    public function scopeSearch($query, $search){

        if($search !== null){
            $search_split = mb_convert_kana($search, 's'); // 全角スペースを半角
            $search_split2 = preg_split('/[\s]+/', $search_split); //空白で区切る、配列になる
            
            foreach( $search_split2 as $value ){
                $query->where('name', 'like', '%' .$value. '%');
            } 
            // whereがキーワードの数分繰り返される。
            // Laravelではwhereが複数続くとand検索と認識される
            }
        return $query;
    }
}
