<?php
use App\Http\Controllers\userController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.admin-tambahproduk');
// });

Route::get("/", [userController::class,"Home"]);
Route::get("/Home", [userController::class,"HomeUser"]);
Route::get("/login",[userController::class,"Login"]);
Route::get("/register",[userController::class,"Register"]);

Route::get("/usertransaksi",[userController::class,"Pusertransaksi"]);
Route::post("/usertransaksi",[userController::class,"Psukses"]);


Route::get("/topup",[userController::class,"Pmengtopup"]);
Route::post("/topup",[userController::class,"Ptopup"]);

Route::get("/item",[userController::class,"Pmengitem"]);
Route::post("/item",[userController::class,"Pitem"]);


Route::get("/admin/Home",[userController::class,"admin"]);
Route::get("/logout",[userController::class,"Logout"]);
Route::get("/admin/TambahProduct",[userController::class,"Tambah"]);
Route::get("/admin/Users",[userController::class,"UserList"]);
Route::get("/admin/Order",[userController::class,"OrderList"]);
Route::get("/admin/Historyusr",[userController::class,"HistoryUserList"]);
Route::get("/Hapus/Kategori/{id}",[userController::class,"Hapus"]);
Route::get("/Hapus/Product/{id}",[userController::class,"HapusProduct"]);
Route::get("/Edit/Product/{id}",[userController::class,"EditProduct"]);

Route::get("/Unban/{id}",[userController::class,"Unban"]);
Route::get("/Ban/{id}",[userController::class,"Ban"]);
Route::get("/Hapus/Promo/{id}",[userController::class,"HapusPromo"]);
Route::get("/Game/{id}",[userController::class,"Detail"]);
Route::get("/user/History",[userController::class,"History"]);
Route::get("/user/Game",[userController::class,"GameUser"]);
Route::get("/user/Promo",[userController::class,"promouser"]);

Route::get("/user/Item",[userController::class,"item"]);


Route::get("/admin/Promo",[userController::class,"Promo"]);
Route::get("/Update/{id}",[userController::class,"Up"]);
Route::get("/admin/Laporan",[userController::class,"Laporan"]);
Route::post("/login",[userController::class,"PLogin"]);
Route::post("/register",[userController::class,"Pregister"]);
Route::post("/Tambah_Kategori",[userController::class,"TambahKategori"]);
Route::post("/admin/TambahGProduct",[userController::class,"PTambah"]);
Route::post("/product/Update",[userController::class,"Update"]);
Route::post("/gproduct/Update",[userController::class,"GUpdate"]);

Route::post("/Tambah/Promo",[userController::class,"TambahPromo"]);


Route::post("/Edit/Promo",[userController::class,"EditPromo"]);

Route::post("/Pesan",[userController::class,"Pesan"]);

Route::post("/SEND",[userController::class,"Kirim"]);
Route::post("/Rating",[userController::class,"Rate"]);
Route::post("/Search/Product",[userController::class,"Spro"]);
Route::post("/Search/Users",[userController::class,"SUsers"]);
Route::post("/Search/Pesanan",[userController::class,"Spesanan"]);
Route::post("/Search/Promo",[userController::class,"Spromo"]);

//BARU
Route::get('adminlogin', [UserController::class,'showLogin']);
Route::post('adminlogin', [UserController::class,'loginAdmin']);

Route::get('/adminakun', [AdminController::class,'showAkun']);

Route::get('/adminproduk', [AdminController::class,'viewProduct']);
Route::post('adminproduk',[AdminController::class,'tambahProduk']);

Route::get("/Aktif/{id}",[AdminController::class,'Aktif']);
Route::get("/Hapus/{id}",[AdminController::class,'Hapus']);

Route::get('adminorder', [AdminController::class,'viewOrder']);
Route::get("/updateOrder/{id}",[AdminController::class,'updateOrder']);

Route::get('adminlaporan', [AdminController::class, 'viewTransaksi']);

Route::get('adminpromo', [AdminController::class, 'viewPromo']);
Route::post('adminpromo', [AdminController::class,'tambahPromo']);
Route::get("/hapusPromo/{id}",[AdminController::class,'hapusPromo']);

Route::get("/Unban/{id}",[AdminController::class,'Unban']);
Route::get("/Ban/{id}",[AdminController::class,'Ban']);
Route::get('index', [AdminController::class,'showIndex']);
Route::get('adminLogout', [AdminController::class, 'adminLogout']);

Route::get("admincreate",[AdminController::class,'showCreate']);
Route::post("admincreate",[AdminController::class,'register']);
