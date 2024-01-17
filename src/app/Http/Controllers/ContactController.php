<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

use function PHPUnit\Framework\isNull;

class ContactController extends Controller
{
    // contactページ
    public function index()
    {
        $categories = Category::all();

        return view('contact', compact('categories'));
    }

    public function check(ContactRequest $request)
    {
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell_1',
            'tell_2',
            'tell_3',
            'address',
            'building',
            'category_id',
            'detail'
        ]);
        $category = Category::find($request->category_id)->only(['content']);
        session()->put($contact);
        session()->put($category);

        return redirect('/confirm');
    }

    //confirmページ
    public function confirm()
    {
        return view('confirm');
    }

    public function store(Request $request)
    {
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell',
            'address',
            'building',
            'category_id',
            'detail'
        ]);
        Contact::create($contact);

        return redirect('/thanks');
    }

    public function fix(Request $request)
    {
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell_1',
            'tell_2',
            'tell_3',
            'address',
            'building',
            'category_id',
            'detail'
        ]);

        return redirect('/')->with(compact('contact'));
    }

    // サンクスページ
    public function thanks()
    {
        return view('thanks');
    }

    // アドミンページ
    public function admin()
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(10);


        return view('admin', compact('contacts', 'categories'));
    }
    // 削除機能
    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/admin');
    }
    // 検索機能
    public function search(Request $request)
    {
        $keyword = $request->only(['keyword']);
        $gender = $request->only(['gender']);
        $category_id = $request->only(['category_id']);
        $created_at = $request->only(['created_at']);

        $contacts = Contact::with('category')
            ->KeywordSearch($request->keyword)
            ->GenderSearch($request->gender)
            ->CategorySearch($request->category_id)
            ->DateSearch($request->created_at)
            ->paginate(10);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories', 'keyword', 'gender', 'category_id', 'created_at'));
    }
    
    //CSVダウンロード機能
    public function download(Request $request)
    {
        // コールバック関数内でCSVの生成を行う
        $callback = function () use ($request) {
            $contacts = Contact::with('category')
                ->KeywordSearch($request->keyword)
                ->GenderSearch($request->gender)
                ->CategorySearch($request->category_id)
                ->DateSearch($request->created_at)
                ->get();

            // CSVを生成するストリームを開く
            $stream = fopen('php://output', 'w');
            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');

            // CSVのヘッダーを書き込む
            fputcsv($stream, [
                'ID',
                'お名前',
                '性別',
                'メールアドレス',
                '電話番号',
                '住所',
                '建物名',
                'お問い合わせの種類',
                'お問い合わせ内容'
            ]);

            // 各行のデータをCSVに書き込む
            foreach ($contacts as $contact) {
                $name = $contact->last_name . $contact->first_name;
                if ($contact->gender == 1) {
                    $gender = '男性';
                } elseif ($contact->gender == 2) {
                    $gender = '女性';
                } else {
                    $gender = 'その他';
                }

                fputcsv($stream,   [
                    $contact->id,
                    $name,
                    $gender,
                    $contact->email,
                    $contact->tell,
                    $contact->address,
                    $contact->building,
                    $contact->category->content,
                    $contact->detail,
                    $contact->created_at->format('Y-m-d'),
                ]);
            }
            // ストリームを閉じる
            fclose($stream);
        };

        // ファイル名の生成
        $filename = sprintf('contacts_%s.csv', date('Ymd'));

        //HTTPレスポンスヘッダーを設定
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0",
        );

        return response()->streamDownload($callback, $filename, $headers);
    }
}
