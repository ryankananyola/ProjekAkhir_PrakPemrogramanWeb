<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

// entuk seko session
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('login');
    }

    public function goToDashboard(){
        // var_dump()
        if(session()->has('userid')){
            $user = User::where('id', session('userid'))->first();
            $transaksiMarket = Transaction::all();
            $allUser = User::all();
            // dd($user);

            if(!session()->has('paginator')){
                session()->put('paginator', 'penjualan');
            }
            // dd(session('admined'));

            if (session('admined') == 1){
                // ke halaman admin
                $transaksis = Transaction::where('admin_id', $user->id)->get();

                return view('adminboard', [
                    'user' => $user,
                    'allUser' => $allUser,
                    'market' => $transaksiMarket,
                    'transaksis' => $transaksis
                ]);
            }else{
                // ke halaman user
                $transaksis = Transaction::where('seller_id', $user->id)->get();

                return view('dashboard', [
                    'user' => $user,
                    'allUser' => $allUser,
                    'market' => $transaksiMarket,
                    'transaksis' => $transaksis
                ]);
            }
        }else{
            return redirect('login');
        }

    }

    public function registration(Request $request){
        // dd($request->all());

        if ($request->password == $request->confirm_password){
            $users = User::all();
            $sama = false;
            foreach ($users as $key => $value) {
                if($value->email == $request->email){
                    $sama = true;
                    session()->put('regist_msg', "Email tersebut sudah digunakan, silakan coba lagi");
                    session()->put('regist', $request->except("_token"));
                }
            }
            if(!$sama){
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->nowa = $request->nowa;
                $user->nik = $request->nik;
                $user->password = $request->password;
                $user->admined = 0;
                $user->save();
                return redirect('login');
            }else{
                return redirect('regist');
            }

        }else{
            // dd("pw = ".$request->password." psw=" .$request->confirm_password);
            session()->put('regist_msg', "Password anda belum cocok");
            return redirect('regist');
        }
    }

    public function loginStart(Request $request){
        // dd($request->_token);
        $users = User::all();
        $user;
        $ketemu = false;

        foreach ($users as $key => $value) {
            if ($request->email == $value->email){
                if ($request->password == $value->password){
                    $ketemu = true;
                    $user = $value;
                    // dd('userid = ', $user->id, "email = ", $user->email);
                    session()->put('userid', $user->id);
                    session()->put('admined', $user->admined);
                    break;
                }
            }
        }

        if ($ketemu){
            return redirect('dashboard');
            $transaksis = Transaction::where('seller_id', $user->id)->get();

            // return view("dashboard", [
            //     'user' => $user,
            //     'auth' => $user->admined,
            //     'paginator' => 'profile',
            //     'token' => $request->_token,
            //     'transaksis' => $transaksis
            // ]);
        }else{
            session()->put('login_msg', "Maaf email atau password anda keliru!");
            return redirect('login');
            return view('login', [
                'pesan' => "Maaf email atau password anda keliru!"
            ]);
        }
    }
}
