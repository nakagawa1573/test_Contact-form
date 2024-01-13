<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    // contactページ
    public function contact()
    {
        $categories = Category::all();

        return view('contact', compact('categories'));
    }

    public function store(ContactRequest $request)
    {
        $user = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
        $user['tell'] = $request->input(trim('tell_1')) . $request->input(trim('tell_2')) . $request-> input(trim('tell_3'));
        Contact::create($user);
        
        return redirect('/confirm')->with('user');
    }

    public function confirm()
    {
        return view('confirm');
    }

    public function thanks()
    {
        return view('thanks');
    }
}
