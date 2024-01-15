<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

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
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell_1', 'tell_2', 'tell_3', 'address', 'building', 'category_id', 'detail']);
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
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);

        return redirect('/thanks');
    }

    public function fix(Request $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell_1', 'tell_2', 'tell_3', 'address', 'building', 'category_id', 'detail']);

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

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/admin');
    }

    public function search(Request $request)
    {
        $keyword = $request->only(['keyword']);
        $gender = $request->only(['gender']);
        $category_id = $request->only(['category_id']);
        $created_at = $request->only(['created_at']);

        $contacts = Contact::with('category')->KeywordSearch($request->keyword)
                                            ->GenderSearch($request->gender)
                                            ->CategorySearch($request->category_id)
                                            ->DateSearch($request->created_at)
                                            ->paginate(10);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories','keyword', 'gender', 'category_id', 'created_at'));
    }
}
