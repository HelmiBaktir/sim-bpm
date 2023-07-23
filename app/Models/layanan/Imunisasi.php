<?php

namespace App\Models\layanan;

use App\Models\lampiran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Imunisasi extends Model
{
    use HasFactory;
    protected $table = 'layanan_imunisasi';
    public $timestamps = false;

    public function lampiran(){
        return $this->hasMany(lampiran::class,'no_registrasi_pasien','id_pasien_bayi');
    }

}
