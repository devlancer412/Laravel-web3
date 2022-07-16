<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BcLogin extends Model
{
    protected $table='bc_login';
    use HasFactory;
    public function updateQuery($tbl,$value,$name)
    {
        DB::table($tbl)->where('pc_username',$name)->update($value);
    }
}
