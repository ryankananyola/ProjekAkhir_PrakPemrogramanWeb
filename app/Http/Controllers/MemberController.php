<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function profile($id, $token){
        // mengembalikan dashboard bagian profile
        $leng = Str::length($token);
        // echo 'id = '.$id.'token = '.$token." pnjng=".$leng.'<br>';



        // filter tokens by user
        if($leng == 40){
            $user = User::findOrFail($id);

            return view("home", [
                'user' => $user,
                'auth' => $user->admined,
                'paginator' => 'profile',
                'token' => $token
            ]);
        }else{
            return redirect('/');
        }

    }
    public function penjualan($id, $token){
        // mengembalikan dashboard bagian profile
        $leng = Str::length($token);
        // echo 'id = '.$id.'token = '.$token." pnjng=".$leng.'<br>';

        // filter tokens by user
        if($leng == 40){
            $user = User::findOrFail($id);
            // echo " user = ".$user->name;
            // dd($user);

            return view("home", [
                'user' => $user,
                'auth' => $user->admined,
                'paginator' => 'penjualan',
                'token' => $token
            ]);
        }else{
            return redirect('/');
        }

    }
    public function pembelian($id, $token){
        // mengembalikan dashboard bagian profile
        $leng = Str::length($token);
        // echo 'id = '.$id.'token = '.$token." pnjng=".$leng.'<br>';

        // filter tokens by user
        if($leng == 40){
            $user = User::findOrFail($id);

            return view("home", [
                'user' => $user,
                'auth' => $user->admined,
                'paginator' => 'pembelian',
                'token' => $token
            ]);
        }else{
            return redirect('/');
        }
    }

    public function addJualan(Request $req){

        // $transaksi = $req->except('_token');

        $transaksi = new Transaction;
        $transaksi->type_game = $req->type_game;
        $transaksi->price = $req->price;
        $transaksi->akun_info = $req->akun_info;
        $transaksi->seller_id = $req->seller_id;

        // var_dump($req->img);
        // var_dump($req->file('img'));

        $fileName = time().$req->file('img')->getClientOriginalName();
        $path = $req->file('img')->storeAs('images', $fileName, 'public');
        $transaksi['img'] = '/storage/'.$path;
        $transaksi->save();
        // Transaction::create($transaksi);
        // dd($transaksi);
        // $transaksi->save();

        return redirect('dashboard');
    }

    public function delJualan($id){


        $tran = Transaction::where('id', $id)->first();

        if($tran->buyyer_id != null){
            session()->put('errorHapusMsg', 'Maaf katalog yang ingin anda hapus memiliki calonPembeli');
        }else{
            // dd($tran);
            Storage::delete($tran->img);
            $alamat = str_replace('/storage', 'public', $tran->img);
            unlink(storage_path('app/'.$alamat));

            DB::table('transactions')->where('id', '=', $id)->delete();
        }

        return redirect('dashboard');
    }


    public function updateJualan(Request $req){

        // dd($req->id);


        $tran = Transaction::where('id', $req->id)->first();
        // dd($tran);
        $transaksi = new Transaction;
        $transaksi->type_game = $req->type_game;
        $transaksi->price = $req->price;
        $transaksi->akun_info = $req->akun_info;
        $transaksi->seller_id = $req->seller_id;
        $transaksi['img'] = $req->img_tmp;

        if($req->img == null){
            // dd("okoko");
        }

        // dd($req->img_tmp);
        if ($req->img == null){
            // tidak perlu ganti gambar

        }else{
            // perlu ganti gambar
            Storage::delete($tran->img);
            $alamat = str_replace('/storage', 'public', $tran->img);
            unlink(storage_path('app/'.$alamat));

            $fileName = time().$req->file('img')->getClientOriginalName();
            $path = $req->file('img')->storeAs('images', $fileName, 'public');
            $transaksi['img'] = '/storage/'.$path;
        }

        DB::table('transactions')->where('id', '=', $req->id)->update([
            'type_game' => $req->type_game,
            'price' => $req->price,
            'akun_info' => $req->akun_info,
            'img' => $transaksi['img']
        ]);

        return redirect('dashboard');
    }

    public function ambilTran($userid, $tranid){
        DB::table('transactions')->where('id', '=', $tranid)->update([
            'buyyer_id' => $userid
        ]);
        return redirect('dashboard');
    }

    public function handle($userid, $tranid){
        DB::table('transactions')->where('id', '=', $tranid)->update([
            'admin_id' => $userid
        ]);
        return redirect('dashboard');
    }

    public function verified($tranid){
        DB::table('transactions')->where('id', '=', $tranid)->update([
            'verified' => 1
        ]);
        return redirect('dashboard');
    }
    public function payyed($tranid){
        DB::table('transactions')->where('id', '=', $tranid)->update([
            'payyed' => 1
        ]);
        return redirect('dashboard');
    }

    public function kirimAkun(Request $req){
        DB::table('transactions')->where('id', '=', $req->idTran)->update([
            'akun' => $req->akun
        ]);
        return redirect('dashboard');
    }

    public function akhiri($idTran){
        DB::table('transactions')->where('id', '=', $idTran)->update([
            'send_buyyer' => 1,
        ]);
        return redirect('dashboard');
    }

    public function selesaiSeller(Request $req, $idTran){
        DB::table('transactions')->where('id', '=', $idTran)->update([
            'send_buyyer' => 1,
            'admin_msg' => $req->admin_msg
        ]);
        return redirect('dashboard');
    }

    public function pesan_pembeli(Request $req){
        // dd($req);
        DB::table('transactions')->where('id', '=', $req->idTran)->update([
            'buyyer_msg' => $req->buyyer_msg
        ]);
        return redirect('dashboard');
    }

    public function selesaikan($tranid){
        DB::table('transactions')->where('id', '=', $tranid)->update([
            'send_seller' => 1
        ]);
        return redirect('dashboard');
    }

    public function hapusTran($id){


        $tran = Transaction::where('id', $id)->first();

        // dd($tran);
        Storage::delete($tran->img);
        $alamat = str_replace('/storage', 'public', $tran->img);
        unlink(storage_path('app/'.$alamat));

        DB::table('transactions')->where('id', '=', $id)->delete();

        return redirect('dashboard');
    }


}
