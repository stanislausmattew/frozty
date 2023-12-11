<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trans extends Model
{
    use HasFactory;
    public $table   = "transaksi";
    public $primaryKey = "id";
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = ['ID','ID_User','ID_GAME','Nama_Product','Harga','Bukti_Transaksi','Status'];
    public function Add($ID,$ID_User,$ID_Game,$Nama_Pro,$harga)
    {
        $new = new trans();
        $new->ID = $ID;
        $new->ID_User = $ID_User;
        $new->ID_GAME = $ID_Game;
        $new->Nama_Product =$Nama_Pro;
        $new->Harga = $harga;
        $new->Status = 0;
        $new->save();
    }
}
