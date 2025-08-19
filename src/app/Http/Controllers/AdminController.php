<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::paginate(7); // ← 7件ずつページネーション

        return view('admin', [
            'categories' => $categories,
            'contacts' => $contacts,
        ]);
    }
}
