<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    public $table   = "promo";
    public $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = ['id','Nama','Potongan','Deskripsi','TGL_Start','TGL_END'];
    public function Add($nama,$potongan,$des,$awal,$akhir)
    {
        $new = new Promo();
        $new->Nama = $nama;
        $new->Potongan = $potongan;
        $new->Deskripsi = $des;
        $new->TGL_Start =$awal;
        $new->TGL_END = $akhir;
        $new->save();
    }
}
