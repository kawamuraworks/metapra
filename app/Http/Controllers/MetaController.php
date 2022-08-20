<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for($i=0; $i<count($request->img_content_); $i++) {
            $a[] = $request->img_content_[$i] . ';';
        }
        // データの作成
        $keywords = [
            [
                // 'SourceFile' => 'C:\Users\dialo\OneDrive\デスクトップ\テスト\1.jpg',
                'SourceFile' => 'C:\xampp\htdocs\works\tagidea\public\works\work1\1.jpg',
                'IPTC:Caption-Abstract' => 'IPTCキャプション今日',
                'IPTC:Keywords' => (string)$a[0].(string)$a[1],
                // 'IPTC:Keywords' => 'IPTC;IPTCキーワード;IPTC確認;IPTC今日;',
                'Title' => $request->title,
                // 'Title' => 'タイトル今日',
                'Description' => 'C:\Users\dialo\OneDrive\デスクトップ\テスト\1.jpg',
            ],
        ];

        // カラムの作成
        $head = ['SourceFile', 'IPTC:Caption-Abstract', 'IPTC:Keywords', 'Title', 'Description'];

        // 書き込み用ファイルを開く
        $f = fopen('tag2.csv', 'w');
        if ($f) {
            // カラムの書き込み。csvは「UTF-8」で書き込む
            mb_convert_variables('UTF-8', 'UTF-8', $head);
            fputcsv($f, $head);
            // データの書き込み
            foreach ($keywords as $keyword) {
                mb_convert_variables('UTF-8', 'UTF-8', $keyword);
                fputcsv($f, $keyword);
            }
        }
        // ファイルを閉じる
        fclose($f);

        // HTTPヘッダ
        header("Content-Type: application/octet-stream");
        header('Content-Length: ' . filesize('tag2.csv'));
        header('Content-Disposition: attachment; filename=tag2.csv');
        readfile('tag2.csv');

        // $path = 'C:\Users\dialo\OneDrive\デスクトップ\テスト\1.jpg';
        // exec('C:\xampp\htdocs\works\tagidea\resources\exiftool.exe -F -sep ";" -overwrite_original -csv="C:\xampp\htdocs\works\tagidea\public\tag2.csv" -codedcharacterset=utf8 -charset iptc=latin2 ' . $path);

        // 【完成】work1の画像書き換え
        $path = 'C:\xampp\htdocs\works\tagidea\public\works\work1\1.jpg';
        exec('C:\xampp\htdocs\works\tagidea\resources\exiftool.exe -F -sep ";" -overwrite_original -csv="C:\xampp\htdocs\works\tagidea\public\tag2.csv" -codedcharacterset=utf8 -charset iptc=latin2 ' . $path);

        // Storage::delete('public/' . 'tag2.csv');
        Storage::disk('public')->delete('public\tag2.csv');

        // return redirect()->route('admin.create')->with('message', '投稿を作成しました')->response()->download($path)->deleteFileAfterSend(true);
        return redirect()->route('admin.create')->with('message', '投稿を作成しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function show(Meta $meta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function edit(Meta $meta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meta $meta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meta $meta)
    {
        //
    }
}
