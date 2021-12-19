<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TodoList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('backend/login/index');
    }

    public function Auth(Request $request)
    {
        $request->flashOnly('email', 'remember');

        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 2], $remember)) {
            return redirect()->intended(route('admin.Index'));
        } else {
            return back()->with('error', 'Lütfen bilgilerinizi doğru girin...');
        }
    }

    public function index()
    {
        $data['users'] = User::where('role', '1')->paginate(10);
        return view('backend/home/index', compact('data'));
    }

    public function todoList($id)
    {
        $data['user'] = User::where('id', $id)->first();
        $data['todo'] = TodoList::where('user_id', $id)->paginate(10);
        return view('backend/home/list', compact('data'));
    }
}
