<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{

        public function index()
    {
        return view('admin');
    }

        public function search (Request $request)
    {
        $keyword = $request->input('keyword');

        $query = User::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%");
        }

        $users = $query->get();

        return view('admin', compact('users', 'keyword'));
    }
}
