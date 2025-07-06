<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
      return view('index');
    }

    public function confirm(Request $request)
    {
      $tel = $request->input('tel1') . '-' . $request->input('tel2') . '-' . $request->input('tel3');

      $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category', 'detail']);
      $contact['tel'] = $tel;

      return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
      $tel = $request->input('tel1') . '-' . $request->input('tel2') . '-' . $request->input('tel3');

      $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category', 'detail']);

      $contact['tel'] = $tel;

      Contact::create($contact);

      return redirect('/thanks');


    }

}