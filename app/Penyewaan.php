<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    protected $primaryKey = 'id_sewa';
    protected $table ='penyewaan';
    protected $fillable = ['tanggal_sewa', 'id_customer', 'id_lapangan', 'jam_mulai', 'jam_selesai', 'harga', 'uang_muka', 'uang_sisa', 'keterangan'];

    public function sewa(){
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function lapangan(){
        return $this->belongsTo(Lapangan::class, 'id_lapangan');
    }
}
