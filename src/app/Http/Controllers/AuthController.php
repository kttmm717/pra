<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    public function admin(Request $request) {
        $contacts = Contact::with('category')->Paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }
}
