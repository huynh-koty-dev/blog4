<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    // public function getUser($email){
    //     $data = DB::table('users')->where('email',$email);
    //     return $data;
    // }
}
