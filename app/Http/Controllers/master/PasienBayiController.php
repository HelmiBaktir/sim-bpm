<?php

namespace App\Http\Controllers\master;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Shuchkin\SimpleXLSX;
use Illuminate\Http\Request;
use App\Models\master\PasienBayi;
use App\Models\master\PasienDewasa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class PasienBayiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pasienBayi = PasienBayi::where('status_hapus', '=', 0)->orderBy('id', 'desc')->get();
        return view('master.pasien.bayi.index', compact('pasienBayi'));
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
        $nama = $request->txtNama;
        $tgl_lahir = date("Y-m-d", strtotime($request->dtpTanggalLahir));
        $bbl = $request->txtBBL;
        $cara_persalinan = $request->cbxCaraPersalinan;
        $alamat = $request->txtAlamat;
        $nama_ayah = $request->txtNamaAyah;
        $nama_ibu = $request->txtNamaIbu;
        $telp = $request->txtTelp;
        $kelurahan = $request->txtKelurahan;
        $asal_wilayah = $request->txtAsalWilayah;
        $kelamin = $request->cbxKelamin;

        $validation = new PasienBayi();
        $validation = $validation->validator($request->all(), 'tambah');
        if ($validation->fails()) {
            return redirect()->back()->with(['notif_gagal' => 'Data pasien gagal disimpan.']);
        } else {
            $new = new PasienBayi();
            $new->nama = $nama;
            $new->kelamin = $kelamin;
            $new->tanggal_lahir = $tgl_lahir;
            $new->bbl = $bbl;
            $new->cara_persalinan = $cara_persalinan;
            $new->kelurahan = $kelurahan;
            $new->asal_wilayah = $asal_wilayah;
            $new->alamat = $alamat;
            $new->nama_ayah = $nama_ayah;
            $new->nama_ibu = $nama_ibu;
            $new->telp = $telp;
            $new->status_hapus = 0;
            $new->users_id = Auth::user()->id;
            $new->save();
            return redirect()->back()->with('notif_berhasil', 'Pasien Bayi berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PasienBayi  $pasienBayi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $id_bayi = $request->input('bayi_id');
        
        $bayi = PasienBayi::find($id);
      
        echo json_encode($bayi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PasienBayi  $pasienBayi
     * @return \Illuminate\Http\Response
     */
    public function edit(PasienBayi $pasienBayi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PasienBayi  $pasienBayi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PasienBayi $pasienBayi)
    {
        //
        $updated_by = Auth::user()->id;
        $updated_at = Carbon::now();

        $validation = new PasienBayi();
        $validation = $validation->validator($request->all(), 'edit');
        if ($validation->fails()) {
            return redirect()->back()->with(['notif_gagal' => 'Data pasien gagal dirubah.']);
        } else {
            // $id = $request->input('txtIdEdit');
            $pasienBayi->nama = $request->input('txtNamaEdit');
            $pasienBayi->tanggal_lahir = date("Y-m-d", strtotime($request->input('txtTTLEdit')));
            $pasienBayi->bbl = $request->input('txtBBLEdit');
            $pasienBayi->cara_persalinan = $request->input('cbxCaraPersalinanEdit');
            $pasienBayi->kelurahan = $request->input('txtKelurahanEdit');
            $pasienBayi->asal_wilayah = $request->input('txtAsalWilayahEdit');
            $pasienBayi->alamat = $request->input('txtAlamatEdit');
            $pasienBayi->nama_ayah = $request->input('txtNamaAyahEdit');
            $pasienBayi->nama_ibu = $request->input('txtNamaIbuEdit');
            $pasienBayi->telp = $request->input('txtTelpEdit');
            $pasienBayi->save();

            return redirect()->back()->with(['notif_berhasil' => 'Data pasien berhasil dirubah.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PasienBayi  $pasienBayi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $pasienBayi)
    {
        //
        try {
            // dd($request);
            if ($request->jenis_hapus == 'all') {
                $id = $request->input('txtIdHapusTerpilih');
                $arrId = explode(",", $id);
                foreach ($arrId as $key => $value) {
                    $pasienBayi = PasienBayi::find($value);
                    $pasienBayi->status_hapus = 1;
                    $pasienBayi->updated_at = date("Y-m-d H:i:s");
                    $pasienBayi->save();
                }

                return redirect()->back()->with(['notif_berhasil' => count($arrId).' Pasien Dewasa berhasil dihapus.']);
            } else {
                $pasienBayi = PasienBayi::find($pasienBayi);
                $pasienBayi->status_hapus = 1;
                $pasienBayi->updated_at = date("Y-m-d H:i:s");
                $pasienBayi->save();
                return redirect()->back()->with(['notif_berhasil' => 'Pasien Dewasa Berhasil Dihapus.']);
            }
        } catch (\Throwable $e) {
            return redirect()->back()->with(['notif_gagal' => 'Pasien Dewasa Gagal Dihapus.']);
        }

    }

    public function exportTemplate()
    {
        Excel::create('template_pasien_bayi', function ($excel) {
            // Set the title
            $excel->setTitle('Template Data Master Pasien Bayi');
            $excel->sheet('sheet1', function ($sheet) {
                $data = array(
                    array('id', 'nama', 'kelamin', 'tanggal_lahir', 'bbl', 'cara_persalinan', 'kelurahan', 'asal_wilayah', 'alamat', 'nama_ayah', 'nama_ibu', 'telp', 'Cara persalinan 0=Normal, 1=Caesar'),
                    array('1', 'Zohri', 'L', '1997-01-01', '3.2', '0', 'Rungkut', 'Surabaya', 'Jl. Kertajaya Indah Timur IX No. 1 Surabaya', 'Suparto', 'Harini', '087761525167', 'Jenis Kelamin L=Laki-laki P=Perempuan'),
                    array('2', 'Mc Gregor', 'P', '1997-05-12', '3.3', '1', 'Gunungsari', 'Sidoarjo', 'Jl. Margomulyo Timur No. 19 Surabaya', 'Mahmud A', 'Surti Mahmudah', '087666789124'),
                );
                $sheet->fromArray($data, null, 'A1', false, false);
                $sheet->cells('A1:L1', function ($cells) {
                    $cells->setBackground('#AAAAFF');
                });
            });
        })->download('xlsx');
    }

    public function importKaryawan(Request $request)
    {
        if ($request->hasFile('input-file-now')) {
            $path = $request->file('input-file-now')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $created_by = Auth::user()->id;
                    $created_at = Carbon::now();
                    $updated_by = Auth::user()->id;
                    $updated_at = Carbon::now();

                    $new = new PasienBayi();
                    $new->nama = $value->nama;
                    $new->kelamin = $value->kelamin;
                    $new->tanggal_lahir = date("Y-m-d", strtotime($value->tanggal_lahir));
                    $new->bbl = $value->bbl;
                    $new->cara_persalinan = $value->cara_persalinan;
                    $new->kelurahan = $value->kelurahan;
                    $new->asal_wilayah = $value->asal_wilayah;
                    $new->alamat = $value->alamat;
                    $new->nama_ayah = $value->nama_ayah;
                    $new->nama_ibu = $value->nama_ibu;
                    $new->telp = $value->telp;
                    $new->status_hapus = 0;
                    $new->created_at = $created_at;
                    $new->updated_at = $updated_at;
                    $new->save();

                    $id = $new->id;

                    // Update
                    // $new->no_registrasi = 'AB' . Carbon::now()->format('Ymd') . $id;
                    // $new->updated_at = Carbon::now();
                    // $new->updated_by = Auth::user()->id;
                    // $new->save();
                }

                return redirect()->back()->with(['notif_berhasil' => 'Data pasien bayi berhasil disimpan']);
            } else {
                return redirect()->back()->with(['notif_gagal' => 'Data import kosong']);
            }
        }
    }

    // public function cetakKartu($id)
    // {
    //     $bayi = PasienBayi::find($id)->where('status_hapus',0)->get();

    //     $pdf = Pdf::loadView(
    //         'master.cetak_kartu', 
    //         [
    //             'bayi' => $bayi
    //         ]
    //     );
    //     return $pdf->stream('kartu.pdf');
    // }
    public function cetakKartu($id){
        $bayi = PasienBayi::where('id', '=', $id)->get();
        $options = new Options();
        $options->setChroot('');
        $options->set('isPhpEnabled', true);
        $options->set('defaultPaperSize', 'custom');
        $options->set('defaultPaperWidth', 'auto'); 
        $options->set('defaultPaperHeight', 'auto'); 
        
        $dompdf = new Dompdf();
        $customPaper = array(0,0,310,500);
        $dompdf->setPaper($customPaper, 'landscape');
        $dompdf->setOptions($options);
        $dompdf->getCanvas();
        $dompdf->loadHtml(View::make('master.pasien.bayi.cetak.kartu', compact('bayi') )->render());
        $dompdf->render();

        $title = 'kartu';
        return $dompdf->stream($title, ['Attachment' => false]);
    }

    public function bayi_import(Request $request)
    {
        if ($xlsx = SimpleXLSX::parse(request()->file('input-file-now'))) {
            foreach ($xlsx->rows() as $key => $item) {
                // Tanpa Header
                if ($key > 0) {
                    // dd($xlsx->rows());
                    $created_by = Auth::user()->id;
                    $created_at = Carbon::now();
                    $updated_by = Auth::user()->id;
                    $updated_at = Carbon::now();

                    $new = new PasienBayi();
                    $new->nama = $item[1];
                    $new->kelamin = $item[2];
                    $new->tanggal_lahir = date("Y-m-d", strtotime($item[3]));
                    $new->bbl = $item[4];;
                    $new->cara_persalinan = $item[5];
                    $new->kelurahan = $item[6];
                    $new->asal_wilayah = $item[7];
                    $new->alamat = $item[8];
                    $new->nama_ayah = $item[9];
                    $new->nama_ibu = $item[10];
                    $new->telp = $item[11];
                    $new->status_hapus = 0;
                    $new->created_at = $created_at;
                    $new->updated_at = $updated_at;
                    $new->users_id = Auth::user()->id;
                    $new->save();
                    
                }
                # code...
            }
            return redirect()->back()->with(['message'=>'Data Obat berhasil disimpan.']);
        } else {
            return redirect()->back()->with(['danger_message'=>'Data obat kosong.']);
            // echo SimpleXLSX::parseError();
        }
    }

}
