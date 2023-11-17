<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    public $table   = "product";
    public $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = ['id','Nama',"Gambar"];
    public function add($nama,$gambar,$gambars)
    {
        $new = new Kategori();
        $new->Nama = $nama;
        $new->Gambar = $gambars;
        $gambar->move("Product",$gambars);
        $new->save();
    }
}

