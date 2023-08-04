<?php

namespace App\Http\Controllers\master;

use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\PDF;
use Shuchkin\SimpleXLSX;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\master\PasienDewasa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\master\SuamiPasienDewasa;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\Facade as PDF;



class PasienDewasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $pasien = PasienDewasa::where('status_hapus', 0)->get();
        $noreg = PasienDewasa::generateNoRegister();
        // dd($pasien); 
        return view('master.pasien.dewasa.index', compact(['pasien', 'noreg']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        try {
            DB::beginTransaction();
            // Insert Pasien Dewasa
            $tgl_buku_kia = $request->input('cboBukuKIA') == 'punya' ? $tgl_buku_kia = date('Y-m-d', strtotime($request->input('tglKIA'))) : NULL;
            $tgl_lhr_ayah = $request->input('chkTgl') == 'on' ? $tgl_lhr_ayah = date('Y-m-d', strtotime($request->input('0000-00-00'))) : $tgl_lhr_ayah = date('Y-m-d', strtotime($request->input('txtTanggalLahirayah')));
            $pasienDewasa = new PasienDewasa();
            $pasienDewasa->no_regis = $request->input('txtNoregis');
            $pasienDewasa->nama = $request->input('txtNamaibu');
            $pasienDewasa->tanggal_lahir = date('Y-m-d', strtotime($request->input('txtTanggalLahiribu')));
            $pasienDewasa->agama = $request->input('txtAgamaibu');
            $pasienDewasa->alamat = $request->input('txtAlamatibu');
            $pasienDewasa->telp = $request->input('txtPhoneibu');
            $pasienDewasa->kelurahan = $request->input('txtKelurahanibu');
            $pasienDewasa->pekerjaan = $request->input('txtPekerjaanibu');
            $pasienDewasa->pendidikan = $request->input('txtPendidikanibu');
            $pasienDewasa->buku_kia = $request->input('cboBukuKIA');
            $pasienDewasa->tgl_buku_kia = $tgl_buku_kia;
            $pasienDewasa->status_hapus = 0;
            $pasienDewasa->created_at = date('Y-m-d H:i:s');
            $pasienDewasa->save();
            // Insert Suami Pasien Dewasa
            $arr_riwayat_kawin = $request->input('riwayat_kawin');
            foreach ($arr_riwayat_kawin as $key => $value) {
                $arrValue = explode(';', $value);
                $suami_pasien_dewasa = new SuamiPasienDewasa();
                $suami_pasien_dewasa->nama = $request->input('txtNamaayah');
                $suami_pasien_dewasa->tanggal_lahir = $tgl_lhr_ayah;
                $suami_pasien_dewasa->agama = $request->input('txtAgamaayah');
                $suami_pasien_dewasa->alamat = $request->input('txtAlamatayah');
                $suami_pasien_dewasa->telp = $request->input('txtPhoneayah');
                $suami_pasien_dewasa->kelurahan = $request->input('txtKelurahanayah');
                $suami_pasien_dewasa->pekerjaan = $request->input('txtPekerjaanayah');
                $suami_pasien_dewasa->pendidikan = $request->input('txtPendidikanayah');
                $suami_pasien_dewasa->nikah_ke = $arrValue[0];
                $suami_pasien_dewasa->lama_nikah = $arrValue[1];
                $suami_pasien_dewasa->sebab_pisah = $arrValue[2];
                $suami_pasien_dewasa->sebab_meninggal = $arrValue[3];
                $suami_pasien_dewasa->no_regis_pasien_dewasa = $request->input('txtNoregis');
                $suami_pasien_dewasa->created_at = date('Y-m-d H:i:s');
                $suami_pasien_dewasa->save();
            }
            DB::commit();
            return redirect()->back()->with(['message' => 'Pasien Dewasa Berhasil Disimpan.']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with(['danger_message' => 'Pasien Dewasa Gagal Disimpan.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PasienDewasa  $pasienDewasa
     * @return \Illuminate\Http\Response
     */

    public function show(PasienDewasa $pasienDewasa)
    {
        return view('master.pasien.dewasa.detail', compact(['pasienDewasa']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PasienDewasa  $pasienDewasa
     * @return \Illuminate\Http\Response
     */

    public function edit($pasienDewasa)
    {
        $pasienDewasa = PasienDewasa::with('suamiPasienDewasa')->find($pasienDewasa);

        // dd($pasienDewasa);
        echo json_encode($pasienDewasa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PasienDewasa  $pasienDewasa
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, PasienDewasa $pasienDewasa)
    {
        DB::beginTransaction();
        try {
            $tgl_buku_kia = NULL;
            if ($request->input("cboBukuKIAEdit") == "punya") {
                $tgl_buku_kia = date("Y-m-d", strtotime($request->input("tglKIAEdit")));
            }

            $tgl_lhr_ayah = "";
            if ($request->input("chkTglEdit") == "on") {
                $tgl_lhr_ayah = date("Y-m-d", strtotime("0000-00-00"));
            } else {
                $tgl_lhr_ayah = date("Y-m-d", strtotime($request->input("txtTanggalLahirayahEdit")));
            }
            // Update Pasien Dewasa
            $noreg = $pasienDewasa->no_regis;
            $pasienDewasa->nama = $request->input("txtNamaibuEdit");
            $pasienDewasa->tanggal_lahir = date("Y-m-d", strtotime($request->input("txtTanggalLahiribuEdit")));
            $pasienDewasa->agama = $request->input("txtAgamaibuEdit");
            $pasienDewasa->alamat = $request->input("txtAlamatibuEdit");
            $pasienDewasa->telp = $request->input("txtPhoneibuEdit");
            $pasienDewasa->kelurahan = $request->input("txtKelurahanibuEdit");
            $pasienDewasa->pekerjaan = $request->input("txtPekerjaanibuEdit");
            $pasienDewasa->pendidikan = $request->input("txtPendidikanibuEdit");
            $pasienDewasa->buku_kia = $request->input("cboBukuKIAEdit");
            $pasienDewasa->tgl_buku_kia = $tgl_buku_kia;
            $pasienDewasa->updated_at = date("Y-m-d H:i:s");
            $pasienDewasa->save();
            // Update Suami Pasien 
            $suamiPasien = SuamiPasienDewasa::where('no_regis_pasien_dewasa', $noreg)->first();
            $suamiPasien->nama = $request->input("txtNamaayahEdit");
            $suamiPasien->tanggal_lahir = $tgl_lhr_ayah;
            $suamiPasien->agama = $request->input("txtAgamaayahEdit");
            $suamiPasien->alamat = $request->input("txtAlamatayahEdit");
            $suamiPasien->telp = $request->input("txtPhoneayahEdit");
            $suamiPasien->kelurahan = $request->input("txtKelurahanayahEdit");
            $suamiPasien->pekerjaan = $request->input("txtPekerjaanayahEdit");
            $suamiPasien->pendidikan = $request->input("txtPendidikanayahEdit");
            $suamiPasien->updated_at = date("Y-m-d H:i:s");
            $suamiPasien->save();
            DB::commit();
            return redirect()->back()->with(['message' => 'Pasien Dewasa Berhasil Diubah.']);

        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->with(['danger_message' => 'Pasien Dewasa Gagal Diubah.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PasienDewasa  $pasienDewasa
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $pasienDewasa)
    {
        try {
            // dd($request);
            if ($request->jenis_hapus == 'all') {
                $id = $request->input('txtDeleteAll');
                $arrId = explode(",", $id);
                foreach ($arrId as $key => $value) {
                    $pasienDewasa = PasienDewasa::find($value);
                    $pasienDewasa->status_hapus = 1;
                    $pasienDewasa->updated_at = date("Y-m-d H:i:s");
                    $pasienDewasa->save();
                }

                return redirect()->back()->with(['message' => count($arrId).' Pasien Dewasa berhasil dihapus.']);
            } else {
                $pasienDewasa = PasienDewasa::find($pasienDewasa);
                $pasienDewasa->status_hapus = 1;
                $pasienDewasa->updated_at = date("Y-m-d H:i:s");
                $pasienDewasa->save();
                return redirect()->back()->with(['message' => 'Pasien Dewasa Berhasil Dihapus.']);
            }
        } catch (\Throwable $e) {
            return redirect()->back()->with(['danger_message' => 'Pasien Dewasa Gagal Dihapus.']);
        }
    }

    public function cetakKartu($id){
        $data = PasienDewasa::where('status_hapus', '=', 0)->find($id);
        $options = new Options();
        $options->setChroot('');
        $options->set('isPhpEnabled', true);
        $options->set('defaultPaperSize', 'custom');
        $options->set('defaultPaperWidth', 'auto'); // Set the width of the card to auto
        $options->set('defaultPaperHeight', 'auto'); 
       
        $dompdf = new Dompdf();
        $customPaper = array(0,0,325,500);
        $dompdf->setPaper($customPaper, 'landscape');
        $dompdf->setOptions($options);
        $dompdf->getCanvas();
        $dompdf->loadHtml(View::make('master.pasien.dewasa.cetak.kartu', compact('data') )->render());
        $dompdf->render();

        $title = 'kartu';
        return $dompdf->stream($title, ['Attachment' => false]);
    }

    public function pasien_dewasa_import(Request $request)
    {
        if ($xlsx = SimpleXLSX::parse(request()->file('input-file-now'))) {
            $identifier = $request->input('txtIdentifier');
            foreach ($xlsx->rows() as $key => $item) {
                // Tanpa Header
                if ($key > 0) {
                    $arrBukuKia = ['belum', 'punya'];
                    if($identifier == 'ibu'){
                        $noreg = PasienDewasa::generateNoRegister();
                        $pasien_dewasa_no_reg = DB::table('pasien_dewasa')->where('no_regis', $noreg)->get();
                        if(count($pasien_dewasa_no_reg) > 0 || $item[1] == "" || $item[2] == "" || $item[3] == "" || $item[4] == "" || $item[5] == "" || $item[6] == "" || $item[7] == "" || $item[8] == "" || $item[9] == "" || !in_array(strtolower($item[9]), $arrBukuKia)){
                            return redirect()->back()->with(['danger_message'=>'Data pasien dewasa gagal disimpan.']);
                        }
                        else{
                            $tgl_buku_kia = NULL;
                            if( $item[9] == 'punya'){
                                $tgl_buku_kia = date("Y-m-d", strtotime($item[10]));
                            }
                            $new_pasien_dewasa = new PasienDewasa();
                            $new_pasien_dewasa->no_regis = $noreg;
                            $new_pasien_dewasa->nama = $item[1];
                            $new_pasien_dewasa->tanggal_lahir = date("Y-m-d", strtotime($item[2]));
                            $new_pasien_dewasa->agama = $item[3];
                            $new_pasien_dewasa->alamat = $item[4];
                            $new_pasien_dewasa->telp = $item[5];
                            $new_pasien_dewasa->kelurahan = $item[6];
                            $new_pasien_dewasa->pekerjaan = $item[7];
                            $new_pasien_dewasa->pendidikan = $item[8];
                            $new_pasien_dewasa->buku_kia = $item[9];
                            $new_pasien_dewasa->tgl_buku_kia = $tgl_buku_kia;
                            $new_pasien_dewasa->status_hapus = 0;
                            $new_pasien_dewasa->save();                 
                        }
                    }
                    else{
                        $data_pasien_dewasa = PasienDewasa::where('no_regis', $item[12])->where('status_hapus', '<>', 1)->get();
            
                        if(count($data_pasien_dewasa) <= 0 || $item[0] == "" || $item[1] == "" || $item[2] == "" || $item[3] == "" || $item[4] == "" || $item[5] == "" || $item[6] == "" || $item[7] == "" || $item[8] == "" || $item[9] == "" || $item[12] == ""){
                            return redirect()->back()->with(['danger_message'=>'Data riwayat nikah gagal disimpan.']);
                        }
                        else{
                            $new_suami_pasien_dewasa = new SuamiPasienDewasa();
                            $new_suami_pasien_dewasa->nama = $item[0];
                            $new_suami_pasien_dewasa->tanggal_lahir = date("Y-m-d", strtotime($item[1]));
                            $new_suami_pasien_dewasa->agama = $item[2];
                            $new_suami_pasien_dewasa->alamat = $item[3];
                            $new_suami_pasien_dewasa->telp = $item[4];
                            $new_suami_pasien_dewasa->kelurahan = $item[5];
                            $new_suami_pasien_dewasa->pekerjaan = $item[6];
                            $new_suami_pasien_dewasa->pendidikan = $item[7];
                            $new_suami_pasien_dewasa->nikah_ke = $item[8];
                            $new_suami_pasien_dewasa->lama_nikah = $item[9];
                            $new_suami_pasien_dewasa->sebab_pisah = $item[10];
                            $new_suami_pasien_dewasa->sebab_meninggal = $item[11];
                            $new_suami_pasien_dewasa->no_regis_pasien_dewasa = $item[12];
                            $new_suami_pasien_dewasa->save();
                                    
                        }
                    }
                    
                }
                # code...
            }
            return redirect()->back()->with(['message'=>'Data Pasien berhasil disimpan.']);
        } else {
            return redirect()->back()->with(['danger_message'=>'Data Pasien kosong.']);
            // echo SimpleXLSX::parseError();
        }
    }


}
