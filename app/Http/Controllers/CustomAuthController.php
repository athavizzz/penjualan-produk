<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\Models\Product;

class CustomAuthController extends Controller
{
    public function home()
    {
        return view('login')->with('success', 'Anda Berhasil Login');
    } 

    public function index()
    {
        return view('login');
    }  


    public function produk()
    {
        return view('produk');
    }
    
    public function penjualan()
    {
        return view('penjualan');
    }  

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->with('success', 'Signed in!');
        }
   
        return redirect('/login')->with('success', 'Login details are not valid!');
    }
       
    public function signupsave(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
            
        $data = $request->all();
        $check = $this->create($data);
          
        return redirect("dashboard")->with('success', 'Anda Berhasil Login');
    }
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => FacadesHash::make($data['password'])
      ]);
    }    
     
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect('/login')->with('success', 'Anda Berhasil Login');
    }
     
    public function signOut() {
        FacadesSession::flush();
        Auth::logout();
   
        return redirect('login');
    }
}
