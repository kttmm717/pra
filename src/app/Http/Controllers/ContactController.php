<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::with('category');
        $categories = Category::all();
        return view('index', compact('contacts', 'categories'));
    }
    public function confirm(ContactRequest $request) {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1', 'tel2', 'tel3',  'address', 'building', 'category_id', 'detail']);
        $category = Category::find($request->category_id);
        return view('confirm', compact('contact', 'category'));
    }
    public function thanks(Request $request) {
        if($request->input('back') == 'back') {
            return redirect('/')->withInput();
        }

        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel',  'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }
    public function search(Request $request) {
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->Paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }
    public function delete(Request $request) {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }
}
