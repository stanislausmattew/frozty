<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    public $table   = "users";
    public $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = ['id','Nama','Username','Email','Password','Status','ttl'];
    public function add($nama,$username,$email,$pass,$stat,$ttl)
    {
        $new = new user();
        $new->Nama = $nama;
        $new->Username = $username;
        $new->Email = $email;
        $new->Password = $pass;
        $new->Status =$stat;
        $new->ttl =$ttl;
        $new->save();
    }
}
