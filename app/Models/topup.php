<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topup extends Model
{
    use HasFactory;
    public $table   = "top_up";
    public $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = ['id','tanggaltop_up','Status','Nominal','Bukti','id_user'];
    public function add($status,$nominal,$id_user)
    {
        $new = new topup();
        $new->Status = $status;
        $new->Nominal = $nominal;
        $new->id_user= $id_user;
        $new->save();
    }
}
