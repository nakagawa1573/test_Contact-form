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
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
        $contact['tell'] = $request->input(trim('tell_1')) . $request->input(trim('tell_2')) . $request-> input(trim('tell_3'));
        $category = Category::find($request->category_id)->only(['content']);
        
        return redirect('/confirm')->with(compact('contact', 'category'));
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

    // サンクスページ
    public function thanks()
    {
        return view('thanks');
    }

    // アドミンページ
    public function admin()
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(3);


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

        $contacts = Contact::with('category')->KeywordSearch($request->keyword)
                                            ->GenderSearch($request->gender)
                                            ->CategorySearch($request->category_id)
                                            ->DateSearch($request->created_at)
                                            ->paginate(3);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories','keyword',));
    }
}
