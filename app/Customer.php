<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'id_customer';  
    protected $table ='customer';
    protected $fillable = ['nama_team', 'no_hp', 'keterangan'];
}
