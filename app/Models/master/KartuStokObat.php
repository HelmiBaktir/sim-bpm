<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\master\Obat;


class KartuStokObat extends Model
{
    use HasFactory;
    protected $table = 'kartu_stok_obat';
    public $timestamps = false;



    public function Obat(){
        return $this->hasMany(Obat::class, 'id','obat_id');
        
    }
}
