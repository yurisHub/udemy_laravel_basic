<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// MVCモデルの記述方法2
use App\Models\Test;

// クエリビルダ
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    // view('tests.test'); 
    public function index(){

        dd('test');

        // Eloquent(エロクアントのコレクション)
        $values = Test::all();

        // 件数を取得(単なる数字)
        $count = Test::count();

        // idを指定したらそのモデルのインスタンスを取得
        $first = Test::findOrFail(1);

        // text列がbbbのものだけを指定（取得はしていない状態）
        // ->get()をつけるとエロクアントのコレクションになる
        $whereBBB = Test::where('text', '=', 'bbb')->get();


        // クエリビルダ
        $queryBuilder = DB::table('tests')->where('text', '=', 'bbb')
        ->select('id', 'text')
        ->get(); // コレクション型で帰ってくる（エロクアントと微妙に引っ張ってくる場所が違う）
        // ->first(); // コレクションでなく単なる値が帰ってくる


        dd($values, $count, $first, $whereBBB, $queryBuilder);

        //compact関数でview側に変数を渡すと楽
        return view('tests.test', compact('values'));
    }
}
