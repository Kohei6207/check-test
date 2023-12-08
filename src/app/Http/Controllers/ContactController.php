<?php

namespace App\Http\Controllers;

use App\Models\Author;
// 通常のリクエストインスタンスの読み込み
use Illuminate\Http\Request;

//フォームリクエストを読み込んでバリデーションを行う
use App\Http\Requests\ContactRequest;



class ContactController extends Controller
{
    public function create(){
        return view('index');
    }

    public function confirm(ContactRequest $request){
        $contact = $request->only(['last-name', 'first-name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);

       // $contact['gender'] = ($request->input('gender') == 1) ? '男性' : '女性';

        $request->session()->put('contact', $contact);

        return view('confirm', ['contact' => $contact]);
    }
    public function edit(Request $request)
    {
        $contact = $request->session()->get('contact');
        if (!$contact) {
            return redirect()->route('contacts.create');
        }
        return redirect()->route('contacts.create')->withInput($contact);
    }

    public function store(Request $request)
    {
        $contact = $request->session()->get('contact');
        if (!$contact){
            return redirect()->route('contacts.create');
        }

        $contact['full-name'] = $contact['last-name'] . $contact['first-name'];
        unset($contact['last-name'], $contact['first-name']);

        Author::create($contact);

        $request->session()->forget('contact');

        return view('thanks');
    }

    public function stock(Request $request)
    {

        // 各入力データを取得
        $fullName = $request->input('full-name');
        $gender = $request->input('gender');
        $firstDate = $request->input('first_date');
        $lastDate = $request->input('last_date');
        $email = $request->input('email');

        // クエリを組み立てて検索
        $contactsQuery = Author::query()
            ->where(function ($query) use ($fullName){
                $query->where('full-name', 'like', '%' .$fullName . '%');
            })
            ->where(function ($query) use ($gender){
                if ($gender ==1) {
                    $query->where('gender', 1);
                } elseif ($gender ==2) {
                    $query->where('gender', 2);
                }
            })

            ->where(function ($query) use ($firstDate, $lastDate) {
                if ($firstDate && $lastDate) {
                    $query->whereBetween('created_at', [$firstDate, $lastDate]);
                }
            })
            ->where(function ($query) use ($email) {
                $query->where('email', 'like', '%' . $email . '%');
            });


        //どんな値が渡されているかを表示させるために使用
        //dd($contacts->toSql(), $contacts->getBindings());

        $contacts = $contactsQuery->get();

        // ページネーションを適用
        $contacts = $contactsQuery->paginate(5);
        $totalContacts = $contacts->total();

        // ページネーションの設定
        // $authors = Author::paginate(5);

        return view('admin.stock', ['contacts' => $contacts, 'totalContacts' => $totalContacts]);
    }

    public function delete($id){
        $contact = Author::find($id);

        if($contact){
            $contact->delete();
            return redirect()->back()->with('success', 'データを削除しました。');
        } else {
            return redirect()->back()->with('error', 'データが見つかりませんでした。');
        }
    }
}

