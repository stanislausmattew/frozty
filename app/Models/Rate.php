<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    public $table   = "rate";
    public $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = ['id','Nilai','FK_ID_Transaksi'];
    public function add($nilai,$fk)
    {
        $new = new Rate();
        $new->Nilai = $nilai;
        $new->FK_ID_Transaksi = $fk;
        $new->Save();
    }
}

