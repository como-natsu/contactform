<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use\App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
      $categories = Category::all();
      return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
      $tel = $request->input('tel1') . '-' . $request->input('tel2') . '-' . $request->input('tel3');

      $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);
      $contact['tel'] = $tel;

      $category = Category::find($contact['category_id']);
      $category_name = $category ? $category->content : '';

      return view('confirm', compact('contact', 'category_name'));
    }

    public function store(ContactRequest $request)
    {
      if($request->input('back') == 'back') {
        return redirect('/')
                    ->withInput();
      }

      $tel = $request->input('tel1') . '-' . $request->input('tel2') . '-' . $request->input('tel3');

      $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);

      $contact['tel'] = $tel;

      Contact::create($contact);

      return view('thanks');

    }

}

