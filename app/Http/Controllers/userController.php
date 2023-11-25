<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Users;
use App\Models\Kategori;
use App\Models\Product;
use App\Models\Promo;
use App\Models\trans;
use App\Models\Rate;
class userController extends Controller
{
    //
    public function Home(){
        return view("home");
    }
    public function HomeUser(){
        return view("user.home-user");
    }
    public function Logout()
    {
        session()->forget('login');
        return redirect("/");
    }
    public function Login()
    {
        return view("login");
    }
    public function admin()
    {
        if(Session::Has('datas')){
            $param['datas'] = Session::get('datas');
        }
        else{
            $data = DB::select("select * from product");
            $param['datas'] = $data;
        }
        return view("admin.admin-home",$param);
    }
    public function Laporan()
    {
        $param['datas'] = DB::select("select * from transaksi");
        return view("admin.admin-laporan",$param);
    }
    public function Register()
    {
        return view("register");
    }
    public function Tambah()
    {
        return view("admin.admin-tambahproduk");
    }
    public function UserList()
    {
        if(Session::Has('datas')){
            $param['datas'] = Session::get('datas');
        }
        else{
            $data = DB::select("select * from users");
            $param['datas'] = $data;
        }
        return view("admin.admin-listuser",$param);
    }
    public function OrderList()
    {
        if(Session::Has('datas')){
            $param['datas'] = Session::get('datas');
        }
        else{
            $data = DB::select("select * from transaksi");
            $param['datas'] = $data;
        }
        return view("admin.admin-pesanan",$param);
    }
    public function Promo()
    {
        if(Session::Has('datas')){
            $param['datas'] = Session::get('datas');
        }
        else{
            $data = DB::select("select * from promo");
            $param['datas'] = $data;
        }
        return view("admin.admin-promo",$param);
    }
    public function Detail($id)
    {
        $param['ids'] = $id;
        return view('user.pembayaran-user',$param);
    }

    public function History()
    {
        return view('user.history-user');
        //echo $id[0]->id;
    }

    public function Plogin(Request $req)
    {
        if($req->input('username') == "admin" && $req->input('pass') == "admin"){
            return redirect("/admin/Home");
            //echo($req->input("username"));
        }
        else {
            $data = DB::select("select * from users");
            foreach ($data as $key ) {
                if(($key->Email == $req->username || $key->Username == $req->username)&& $req->pass == $key->Password  ){
                    if($key->Status == 1){
                        $users = $key->Username;
                        //echo $users;
                        session()->put('login',$users);
                        return redirect('/Home');
                    }else{
                        return redirect("/login")->with("Ban",'User Di Banned');;
                    }
                }
            }

        }
    }
    public function Pregister(Request $req)
    {
        //echo($req->Fname);
        if($req->validate([
            "Fname"=>["required"],
            "username"=>["required"],
            "email"=>["required"],
            "pass"=>["required","min:8"],
            "pass_confirmation"=>["required"],
            "ttl"=>["required"]

        ])){
            $nama = $req->Fname;
            $username = $req->username;
            $email = $req->email;
            $pass = $req->pass;
            $stat = 1;
            $ttl = $req->ttl;
            //echo($nama."-".$username."-".$email."-".$pass);
            $new = new Users();
            //$new->add($nama,$username,$email,$pass,$stat);
            $new->Nama = $nama;
            $new->Username = $username;
            $new->Email = $email;
            $new->Password = $pass;
            $new->Status = $stat;
            $new->ttl = $ttl;
            $new->save();
            return redirect("/login");
        }
    }
    public function TambahKategori(Request $req)
    {
        //echo($req->NamaKategori);
        $nama = $req->NamaKategori;
        $gambar = $req->Logo;
        $namagambar = $gambar->getClientOriginalName();
        //echo($namagambar);
        $addpro = new Kategori();
        $addpro->add($nama,$gambar,$namagambar);
        return redirect("/admin/Home");
    }
    public function PTambah(Request $req)
    {
        //echo($req->Kategori);
        $nama = $req->Nama_Barang;
        $harga = $req->Harga;
        $Kategori = $req->Kategori;
        $addproduct = new Product();
        $addproduct->add($Kategori,$nama,$harga);
        return redirect("/admin/TambahProduct");
    }
    public function Update(Request $req)
    {
        $id = $req->id;
        //echo $id;
        $nama = $req->NamaKategori;
        $gambar = $req->Logo;
        $namagambar = $gambar->getClientOriginalName();
        DB::table('product')->where('id', $id)->update([
        'Nama'=>$nama,
        'Gambar'=>$namagambar
        ]);
        $gambar->move("Product",$namagambar);
        return redirect('/admin/Home');
    }
    public function Hapus($id)
    {
        //echo $id;
        DB::table('product')->where('id', $id)->delete();
        return redirect("/admin/Home");
    }
    public function HapusProduct($id)
    {
        //echo $id;
        DB::table('gproduct')->where('id', $id)->delete();
        return redirect("/admin/Home");
    }
    public function GUpdate(Request $req)
    {
        //echo $req->id;
        $id = $req->id;
        $nama = $req->Nama;
        $Harga = $req->Harga;
        DB::table('gproduct')->where('id', $id)->update([
            'Nama'=>$nama,
            'Harga'=>$Harga
        ]);
        return redirect('/admin/Home');
    }
    public function Ban($id)
    {
        //echo $id;
        DB::table('users')->where('id', $id)->update([
            'Status'=>0
        ]);
        return redirect("/admin/Users");
    }
    public function Unban($id)
    {
        //echo $id;
        DB::table('users')->where('id', $id)->update([
            'Status'=>1
        ]);
        return redirect("/admin/Users");
    }
    public function TambahPromo(Request $req)
    {
        $nama = $req->Nama;
        $Potongan = $req->Potongan;
        $des = $req->Deskripsi;
        $awal = $req->TGL_Awal;
        $akhir = $req->TGL_END;
        //echo $des;
        $AddPromo = new Promo();
        $AddPromo->Add($nama,$Potongan,$des,$awal,$akhir);
        return redirect("/admin/Promo");
    }
    public function HapusPromo($id)
    {
        //echo $id;
        DB::table('promo')->where('id', $id)->delete();
        return redirect("/admin/Promo");
    }
    public function EditPromo(Request $req)
    {
        //echo $req->ID;
        DB::table('Promo')->where('id', $req->ID)->update([
            'Nama' => $req->Nama,
            'Potongan' => $req->Potongan,
            'Deskripsi' => $req->Deskripsi
        ]);
        return redirect("/admin/Promo");
    }
    public function Pesan(Request $req)
    {
        if(!Session::has('login')){
            return redirect("/login")->with("errors",'Login Terlebih Dahulu');
        }
        else{
            $id = explode("-",$req->Product);
            $bank = $req->bank;
            $IDGame = $req->ID;
            $server = $req->Server;
            $idGame = $IDGame.'('.$server.')';
            $tgl = date_format(date_create('now'),'Ymd');
            $datatrans = DB::select("select * from transaksi");
            $temp = count($datatrans)+1;
            if($temp < 10){
                $temps = $tgl."00".$temp;
            }
            else if($temp >= 10){
                $temps = $tgl."0".$temp;
            }
            else if($temp > 99){
                $temps = $tgl.$temp;
            }
            $users = session()->get("login");
            $user = DB::select("select * from users where Username = '$users'");
            $namapro = DB::select("select * from gproduct where id = '$id[0]'");
            //echo $idGame;
            //echo $id[0];
            //echo $namapro[0]->Nama;
            $t = $req->bank;
            $idusers =$user[0]->id;
            $namaprod = $namapro[0]->Nama;
            $harga =$req->tot;
            //echo $t;
            $new = new trans();
            $new->add($temps,$idusers,$idGame,$namaprod,$harga,$t);
            //echo $user[0]->id;
            //echo $temps;
            //echo $bank;
            if($t == 'BCA'){
                return back()->with("status","731055269");
            }
            else if ($t == 'BNI'){
                return back()->with("status","0238526667");
            }
            else if($t == "BRI"){
                return back()->with("status","034 102 000 754 304");
            }
        }
    }
    public function Kirim(Request $req)
    {
        $id = $req->ID;
        //echo $req->ID;
        $gambar = $req->Bukti_Transaksi;
        $namagambar = $gambar->getClientOriginalName();
        DB::table('transaksi')->where('ID', $id)->update([
            'Bukti_Transaksi' => $namagambar,
            'Status'=> 1
        ]);
        $gambar->move("BuktiTransaksi",$namagambar);
        return redirect("/user/History");
    }
    public function Up($id)
    {
        //echo $id;
        DB::table('transaksi')->where('ID', $id)->update([
            'Status' => 2,
        ]);
        return redirect("/admin/Order");
    }
    public function Rate(Request $req)
    {
        //echo $req->rate;
        $Nilai = $req->rate;
        $FK = $req->FK_ID;
        //echo $FK;
        $new = new Rate();
        $new->add($Nilai,$FK);
        return redirect("/user/History");
    }
    public function Spro(Request $req)
    {
        //echo $req->search;
        $t = $req->search;
       //echo $t;
       $data = DB::table('product')
       ->where('Nama','like',"%".$t."%")->get();
       //echo json_encode($data);
       return redirect("/admin/Home")->with('datas',$data);
    }
    public function SUsers(Request $req)
    {
        //echo $req->search;
        $t = $req->search;
        $data =DB::table('users')
        ->where('Nama','like',"%".$t."%")->get();
        return redirect("/admin/Users")->with('datas',$data);
    }
    public function Spesanan(Request $req)
    {
        $t = $req->search;
        $data =DB::table('transaksi')
        ->where('ID','=',$t)->get();
        //echo json_encode($data);
        return redirect("/admin/Order")->with('datas',$data);
    }
    public function Spromo(Request $req)
    {
        $t = $req->search;
        $data =DB::table('promo')
        ->where('Nama','like',"%".$t."%")->get();
        return redirect("/admin/Promo")->with('datas',$data);

    }

    public function Pusertransaksi() {
        return view("usertransaksi");
    }

    public function Psukses(Request $req){

        $namaFolderPhoto = ""; $namaFilePhoto = "";
        foreach ($req->file("bukti_transaksi") as $photo) {
            $namaFilePhoto  = time().".".$photo->getClientOriginalExtension();
            $namaFolderPhoto = "photo/";

            $photo->storeAs($namaFolderPhoto,$namaFilePhoto, 'public');
        }


        $new = new trans();
        $new->ID_User = $req->ID_User;
        $new->Nama_product = $req->nama_product;
        $new->Harga = $req->Harga;
        $new->Bukti_Transaksi =$namaFilePhoto;
        $new->save();
        return redirect()->back();


    }
}
