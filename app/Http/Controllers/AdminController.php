<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function register(Request $req)
    {
        $nama = $req->nama;
        $username = $req->username;
        $email = $req->email;
        $tanggallahir = $req->tanggallahir;
        $password = $req ->password;
        $status = 3;
        $saldo = 0;

        DB::table('users')->insert([
            'Nama' => $nama,
            'Username' => $username,
            'Email' => $email,
            'password' => $password,
            'Status' => $status,
            'ttl' => $tanggallahir,
            'Saldo' => $saldo
        ]);
        return redirect('admincreate')->with('msg', 'Berhasil mendaftar!');
    }

    public function tambahProduk(Request $req){

        //nama, gambar
        $nama = $req->nama;
        $gambar = $req->gambar;

        DB::table('product')->insert([
            'Nama' => $nama,
            'Gambar' => $gambar,
            'Status' => 1
        ]);
        return redirect ('adminproduk')->with('msg', 'Berhasil Menambahkan Produk!');
    }

    public function tambahPromo (Request $req){
        //nama promo, potongan promo, deskripsipromo, tanggalawal, tanggalakhir

        $namapromo = $req->namapromo;
        $potonganpromo = $req->potonganpromo;
        $deskripsipromo = $req->deskripsipromo;
        $tanggalawal = $req->tanggalawal;
        $tanggalakhir = $req->tanggalakhir;

        DB::table('promo')->insert([
            'Nama' => $namapromo,
            'Potongan' => $potonganpromo,
            'Deskripsi' => $deskripsipromo,
            'TGL_Start' => $tanggalawal,
            'TGL_END' =>$tanggalakhir
        ]);
        return redirect ('adminpromo')->with('msg', 'Berhasil Menambahkan Promo!');
    }

    public function viewCreate()
    {
        $userLoggedIn = Session::get('userLoggedIn');

        if (Session::get('userLoggedIn')){
            return view ('admincreate',[
                'userLoggedIn' => $userLoggedIn
            ]);
        }
        else{
            return redirect("/adminlogin");
        }
    }

    public function viewProduct(){
        $userLoggedIn = Session::get('userLoggedIn');
        $listproduct = DB::select("select * from product");

        if (Session::get('userLoggedIn')){
            return view ('adminproduk',[
                'userLoggedIn' => $userLoggedIn,
                'listproduct' => $listproduct
            ]);
        }
        else{
            return redirect("/adminlogin");
        }
    }

    public function viewOrder(){
        $userLoggedIn = Session::get('userLoggedIn');
        $listtransaksi = DB::select("select * from transaksi");

        if (Session::get('userLoggedIn')){
            return view ('adminorder',[
                'userLoggedIn' => $userLoggedIn,
                'listtransaksi' => $listtransaksi
            ]);
        }
        else{
            return redirect("/adminlogin");
        }
    }

    public function viewPromo(){
        $userLoggedIn = Session::get('userLoggedIn');
        $listpromo = DB::select("select * from promo");

        if (Session::get('userLoggedIn')){
            return view ('adminpromo',[
                'userLoggedIn' => $userLoggedIn,
                'listpromo' => $listpromo
            ]);
        }
        else{
            return redirect("/adminlogin");
        }
    }

    public function viewTransaksi(){
        $userLoggedIn = Session::get('userLoggedIn');
        $listtransaksi = DB::select("select * from transaksi");

        if (Session::get('userLoggedIn')){
            return view ('adminlaporan',[
                'userLoggedIn' => $userLoggedIn,
                'listtransaksi' => $listtransaksi
            ]);
        }
        else{
            return redirect("/adminlogin");
        }
    }


    public function showIndex(){
        $userLoggedIn = Session::get('userLoggedIn');
        $listUser = DB::select("select * from users where status < 2");

        return view('index', [
            'listUser' => $listUser,
            'userLoggedIn' => $userLoggedIn
        ]);
    }

    public function showAkun(){
        $userLoggedIn = Session::get('userLoggedIn');

        if (Session::get('userLoggedIn')){
            return view ('adminakun',[
                'userLoggedIn' => $userLoggedIn
            ]);
        }
        else{
            return redirect("/adminlogin");
        }
    }

    public function showCreate(){
        $userLoggedIn = Session::get('userLoggedIn');

        if (Session::get('userLoggedIn')){
            return view ('admincreate',[
                'userLoggedIn' => $userLoggedIn
            ]);
        }
        else{
            return redirect("/adminlogin");
        }
    }

    public function updateAkun(Request $req, $id){
        //VALIDASI
        //name, username, email
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required'
        ];
        $message = [
            "required" => " Harap diisi"
        ];
        $req -> validate ($rules, $message);

        return view("jokowi");
    }

    public function Ban($id)
    {
        //echo $id;
        DB::table('users')->where('id', $id)->update([
            'Status'=>0
        ]);
        return redirect("index");
    }

    public function updateOrder($id){

        $cekStatus = DB::table('transaksi')->where('id', $id)->value('Status');
        if($cekStatus == 0){
            DB::table('transaksi')->where('id', $id)->update([
                'Status' => 1
            ]);
            return redirect('adminorder');
        }
        else if($cekStatus == 1){
            DB::table('transaksi')->where('id', $id)->update([
                'Status' => 2
            ]);
            return redirect('adminorder');
        }
    }

    public function Hapus($id){
        DB::table('product')->where('id', $id)->update([
            'Status'=>0
        ]);
        return redirect("adminproduk");
    }

    public function hapusPromo($id){
        DB::table('promo')->where('id', $id)->delete();

        return redirect("adminpromo");
    }

    public function Aktif($id){
        DB::table('product')->where('id', $id)->update([
            'Status'=>1
        ]);
        return redirect("adminproduk");
    }

    public function Unban($id)
    {
        //echo $id;
        DB::table('users')->where('id', $id)->update([
            'Status'=>1
        ]);
        return redirect("index");
    }
}
