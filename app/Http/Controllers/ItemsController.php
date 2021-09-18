<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemsController extends Controller
{
    /**
     * 一覧表示処理
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // アイテム一覧を取得
        $items = Item::all();

        // 一覧表示
        return view('items.index', [
            'items' => $items,
        ]);
    }

    /**
     * 新規登録画面表示処理
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $item = new Item;

        // 作成ビューを表示
        return view('items.create', [
            'item' => $item,
        ]);
    }

    /**
     * 新規登録処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
            'purchase_date' => 'required',
            'expiration_date' => 'required'
        ]);
        
        $item = new Item;
        
        // 新規アイテムを保存
        $item->content = $request->content;
        $item->purchase_date = $request->purchase_date;
        $item->expiration_date = $request->expiration_date;
        $item->save();
        
        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * 取得表示処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // idの値でアイテムを検索して取得
         //レコードが存在しない時は404エラーを出す
        $item = Item::findOrFail($id);

        // アイテム詳細で表示
        return view('items.show', [
            'item' => $item,
        ]);
    }

    /**
     * 更新画面表示処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値でアイテムを検索して取得
        $item = Item::findOrFail($id);

        // 編集画面で表示
        return view('items.edit', [
            'item' => $item,
        ]);
    }

    /**
     * 更新処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
            'purchase_date' => 'required',
            'expiration_date' => 'required'
        ]);
        
        // idの値でアイテムを検索して取得
        $item = Item::findOrFail($id);
        // アイテム更新
        $item->content = $request->content;
        $item->purchase_date = $request->purchase_date;
        $item->expiration_date = $request->expiration_date;
        $item->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * 削除処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値でアイテムを検索して取得
        $item = Item::findOrFail($id);
        // メッセージを削除
        $item->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
