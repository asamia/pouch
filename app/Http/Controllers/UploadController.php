<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class UploadController extends Controller
{
     
    
    
    public function store(Request $request)
    {
        $item = new Item;
        
        if($request->image) {
        //元のファイル名を拡張子とともに取得する
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        //元ファイル名のみ取得
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //拡張子の取得
        $extension = $request->file('image')->getClientOriginalExtension();
        //新しいファイル名をつける(時刻をいれる)
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        //pathに代入する
        $path = $request->file('image')->storeAs('public/uploads', $filenameToStore);
        }
    
         //pathをviewに渡す
        return view('imageupload.upload', [
            'path' => $path,
          
        ]);
    
    }
        
        
}
