<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{
    /**
     * 一覧表示処理
     *
     * 
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) { //認証済みの場合
        //認証済みユーザを取得
        $user = \Auth::user();
        // ユーザのアイテム一覧を作成日時の昇順で取得
        $items = $user->items()->orderBy('created_at', 'asc')->paginate(10);
        
        $data = [
                'user' => $user,
                'items' => $items,
                
            ];
        }
        
        // 一覧表示
        return view('items.index', $data);
    }

    /**
     * 新規登録画面表示処理
     *
     *
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
     * 
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
            'purchase_date' => 'required',
            'expiration_date' => 'required',
            'image' => ['file','mimes:jpeg,png,jpg']
        ]);
            
        
        // 認証済みユーザーの新規アイテムをDBに保存
        $request->user()->items()->create([ 
        'content'=> $request->content,
        'purchase_date' => $request->purchase_date,
        'expiration_date' => $request->expiration_date,
        'image' => $request->image,
        ]);
        
        
        
         // 一覧ページへリダイレクトさせる
        return redirect('/index');
        
    }

    

    /**
     * 取得表示処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // アイテムを取得
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

        // 一覧ページへリダイレクトさせる
        return redirect('/index');
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
        
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $item->user_id) {
            $item->delete();
        }

       // 一覧ページへリダイレクトさせる
        return redirect('/index');
    }
}
