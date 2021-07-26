<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $primaryKey = 'id_lapangan';
    protected $table ='lapangan';
    protected $fillable = ['nama_lapangan', 'keterangan'];
}
