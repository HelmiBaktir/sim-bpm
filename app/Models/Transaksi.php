<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\layanan\Imunisasi;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
    
    public function imunisasi(){
        return $this->belongsTo(Imunisasi::class,'id_layanan','id');
    }

}
