<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table   = "gproduct";
    public $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = ['id',"FkPro",'Nama',"Harga"];
    public function add($fk,$nama,$harga)
    {
        $new = new Product();
        $new->FkPro = $fk;
        $new->Nama = $nama;
        $new->Harga = $harga;
        $new->save();
    }
}
