<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TodoList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function Login()
    {
        return view('frontend/login/index');
    }

    public function Auth(Request $request)
    {
        $request->flashOnly('email' , 'remember');

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended(route('home.Index'));
        } else {
            return back()->with('error', 'Lütfen bilgilerinizi doğru girin...');
        }
    }

    public function Register()
    {
        return view('frontend/login/register');
    }

    public function UserCreate(Request $request) {
        $request->flashOnly('lastname' , 'email');

        $request->validate([
            'lastname' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|same:password_confirmed'
        ]);

        $insert = User::insert([
            'name' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if ($insert) {
            return redirect(route('user.Login'))->with('success', 'Kayıt olma işlemi başarılı');
        }

        return back()->with('error', 'İşlem Başarısız');
    }

    public function logout()
    {
        $role = Auth::user()->role;
        Auth::logout();
        if ($role == 1) {
            return redirect(route('user.Login'))->with('success', 'Güvenli Çıkış Başarılı!');
        }
        else {
            return redirect(route('admin.Login'))->with('success', 'Güvenli Çıkış Başarılı!');
        }

    }

    public function index()
    {
        $search = isset($_POST['search']) ? $_POST['search'] : null;

        if ( isset($search) ) {
            $data['todo'] = TodoList::where('user_id' , Auth::user()->id)->where('status' , '1')->where('name','like','%'. $search .'%')->orderBy('id')->paginate(10);
        }
        else {
            $data['todo'] = TodoList::where('user_id' , Auth::user()->id)->where('status' , '1')->paginate(10);

            if (!count($data['todo'])) {
                return redirect(route('home.Create'));
            }
        }

        return view('frontend/home/index' , compact('data'));
    }

    public function Add()
    {
        return view('frontend/home/add');
    }

    public function Create(Request $request)
    {
        $request->flashOnly('todoName');


        $request->validate([
            'todoName' => 'required|max:100|string',
        ]);

        $insert = TodoList::insert([
            'name' => $request->todoName,
            'user_id' => Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if ($insert) {
            return redirect(route('home.Index'))->with('success', 'İşlem Başarılı');
        }

        return back()->with('error', 'İşlem Başarısız');
    }

    public function Edit($id)
    {
        $getTodo = TodoList::where('id' , $id)->first();
        return view('frontend/home/edit' , compact('getTodo'));
    }

    public function Update(Request $request , $id)
    {
        $request->flashOnly('todoName');


        $request->validate([
            'todoName' => 'required|max:100|string',
        ]);

        $update = TodoList::where('id' , $id)->update([
            'name' => $request->todoName
        ]);

        if ($update) {
            return redirect(route('home.Index'))->with('success', 'İşlem Başarılı');
        }

        return back()->with('error', 'İşlem Başarısız');
    }

    public function Deactive($id)
    {
        $getTodo = TodoList::where('id' , $id)->first();

        if ($getTodo) {
            $update = TodoList::where('id' , $id)->update([
                'status' => '0'
            ]);

            if ($update) {
                return redirect(route('home.Index'))->with('success', 'Listen Başarıyla Güncellendi');
            }
            return back()->with('error', 'İşlem Başarısız');
        }

        return back()->with('error', 'İşlem Başarısız');
    }

    public function Deactives() {
        $data['todo'] = TodoList::where('user_id' , Auth::user()->id)->where('status' , '0')->get();
        return view('frontend/home/deactives' , compact('data'));
    }

    public function Active($id)
    {
        $getTodo = TodoList::where('id' , $id)->first();

        if ($getTodo) {
            $update = TodoList::where('id' , $id)->update([
                'status' => '1'
            ]);

            if ($update) {
                return redirect(route('home.Index'))->with('success', 'Listen Başarıyla Güncellendi');
            }
            return back()->with('error', 'İşlem Başarısız');
        }

        return back()->with('error', 'İşlem Başarısız');
    }

    public function Delete($id)
    {
        $getTodo = TodoList::where('id' , $id)->first();

        if ($getTodo) {
            $delete = TodoList::where('id' , $id)->delete();

            if ($delete) {
                return back()->with('success', 'Listen Başarıyla Güncellendi');
            }
            return back()->with('error', 'İşlem Başarısız');
        }

        return back()->with('error', 'İşlem Başarısız');
    }
}
