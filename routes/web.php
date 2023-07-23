<?php


use App\Models\Klinik;
use App\Models\Imunisasi;
use App\Models\layanan\IbuHamil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\layanan\KbController;
use App\Http\Controllers\master\ObatController;
use App\Http\Controllers\PengingatObatController;
use App\Http\Controllers\layanan\KlinikController;
use App\Http\Controllers\master\KaryawanController;
use App\Http\Controllers\layanan\IbuHamilController;
use App\Http\Controllers\layanan\ImunisasiController;
use App\Http\Controllers\master\PasienBayiController;
use App\Http\Controllers\PengingatImunisasiController;
use App\Http\Controllers\master\JenisLayananController;
use App\Http\Controllers\master\PasienDewasaController;
use App\Http\Controllers\master\KepalaPuskesmasController;
use App\Http\Controllers\master\SuamiPasienDewasaController;
use App\Models\ImunisasiObat;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware(['auth'])->group(function () {
	Route::resource('/', HomeController::class);
	Route::resource('/home', HomeController::class);
	Route::get('/hitung_notif', [HomeController::class,'hitungPengingat']);
	Route::get('/donut', [HomeController::class,'hitungPerbandinganPendapatan']);
	Route::get('/chart', [HomeController::class,'totalPerHari']);

	// ================================================= LAYANAN KB
	Route::resource('/layanan-kb', KbController::class);  
	Route::get('/layanan-kb/buat-kartu/{id}', [KbController::class,'buatKartu']);
	Route::post('/layanan-kb/buat-kartu', [KbController::class,'buatKartuStore']); 
	Route::get('/layanan-kb/tambah-history-kb/{id}', [KbController::class,'indexTambahHistoryKb']); 
	Route::post('/layanan-kb/store-tambah-history', [KbController::class,'kbInsertTambahHistory']); 
	Route::post('/layanan-kb/getHargaLayanan', [KbController::class,'getHargaLayanan']); 
	Route::post('/layanan-kb/cekStokObat', [KbController::class,'cekStokObat']); 
	Route::post('/layanan-kb/cekStokObat2', [KbController::class,'cekStokObat2']);
	Route::post('/layanan-kb/importLampiran', [KbController::class,'storeImportObservasi']);

	// ================================================= LAYANAN IMUNISASI
	Route::resource('/layanan-imunisasi', ImunisasiController::class);
	Route::post('/layanan-imunisasi-history', [ImunisasiController::class,'indexHistoryTambah']);
	Route::post('/layanan-imunisasi-history-store', [ImunisasiController::class,'storeHistory']);
	Route::post('/layanan-imunisasi/cek-stok-obat', [ImunisasiController::class,'cek_stok_obat']);
	Route::get('/layanan-imunisasi/tambah-kartu/{id}', [ImunisasiController::class,'indexTambahKartu']);
	Route::post('/layanan-imunisasi/tambah-kartu', [ImunisasiController::class,'tambahPasienKartu']);
	Route::post('/layanan-imunisasi/rechedule', [ImunisasiController::class,'reschedule']);
	Route::post('/layanan-imunisasi/importLampiran', [ImunisasiController::class,'storeImportObservasi']);

	// Route::post('/bayi_imunisasi_konfirmasi', 'layanan\imunisasiController@konfirmasiJadwal');
	// Route::get('/bayi_imunisasi_edit/{id}', 'layanan\imunisasiController@indexEdit');
	// Route::post('/imunisasi_simpan_history', 'layanan\imunisasiController@simpanHistory');
	// Route::post('/imunisasi_cek_stok_obat', 'layanan\imunisasiController@cek_stok_obat'); 
	

	// Pengingat
	// ================================================= PENGINGAT IMUNISASI
	Route::get('/p_imunisasi_hari_ini', [PengingatImunisasiController::class,'indexHariIni']);
	Route::get('/p_imunisasi_terlewati', [PengingatImunisasiController::class,'indexTerlewati']);
	Route::get('/p_imunisasi_akan_datang', [PengingatImunisasiController::class,'indexAkanDatang']);
	Route::post('/send-whatsapp-message', [PengingatImunisasiController::class, 'sendWhatsAppMessage']);
	Route::post('/p_ke_history_tambah', [PengingatImunisasiController::class,'indexHistoryTambah']);
	Route::get('/imunisasi_hitung_pengingat', [PengingatImunisasiController::class,'hitungPengingat']);
	Route::get('/hitung_total_notif', [PengingatImunisasiController::class,'hitungTotalNotif']);

	// ================================================= PENGINGAT OBAT
	Route::get('/p_obat_expired', [PengingatObatController::class,'indexExpired']);
	Route::get('/p_obat_stok', [PengingatObatController::class,'indexStok']);
	Route::get('/obat_hitung_pengingat', [PengingatObatController::class,'hitungPengingat']);


	// Bayi
	Route::resource('/pasien-bayi', PasienBayiController::class);
	Route::get('/pasien-bayi/cetak-kartu/{id}', [PasienBayiController::class,'cetakKartu']); 
	Route::post('/bayi-import', [PasienBayiController::class,'bayi_import']);
	// Dewasa
	Route::resource('/pasien-dewasa', PasienDewasaController::class);
	Route::get('/pasien-dewasa/cetak-kartu/{id}', [PasienDewasaController::class, 'cetakKartu'])->name('pasien-dewasa.cetak.kartu');
	Route::post('/pasien-dewasa-import', [PasienDewasaController::class,'pasien_dewasa_import']);


	// Suami Pasien Dewasa
	Route::resource('/suami-pasien-dewasa', SuamiPasienDewasaController::class);
	// Obat
	Route::resource('/obat', ObatController::class);
	Route::post('/obat-import', [ObatController::class,'obat_import']);
	
	// Kepala Puskesmas
	Route::resource('/kepala-puskesmas', KepalaPuskesmasController::class);
	// Layanan
	Route::resource('/jenis-layanan', JenisLayananController::class);

	// Karyawan
	Route::resource('/karyawan', KaryawanController::class);

	// Layanan Page Ibu Hamil
	Route::resource('/layanan-ibu-hamil', IbuHamilController::class);
	Route::post('/layanan-ibu-hamil-cek-obat', [IbuHamilController::class, 'ibu_hamil_cek_stok_obat'])->name('ibu.hamil.cek.stok.obat');
	Route::get('/layananIbuHamilDetail/detailKartu/{id}', [IbuHamilController::class, 'detailLayanan'])->name('detail.layanan');

	Route::get('/layanan-ibu-hamil/detail-tambah/{id}', [IbuHamilController::class, 'detailTambah']); 
	Route::post('/layanan-ibu-hamil/get-riwayat-hamil', [IbuHamilController::class, 'get_riwayat_hamil']);
	Route::post('/layanan-ibu-hamil-tambah-history-hamil', [IbuHamilController::class, 'tambahHistoryHamil'])->name('tambah.history.hamil');

	Route::get('/createKunjunganIbuHamil/{id}', [IbuHamilController::class, 'createKunjunganIbuHamil']); 
	Route::post('/layanan-ibu-hamil-tambah-kunjungan-ibu-hamil', [IbuHamilController::class, 'tambahKunjunganHamil'])->name('tambah.kunjungan.hamil');
	
	Route::get('/layanan-ibu-hamil-cetak-surat-lahir/{id}', [IbuHamilController::class, 'cetak_surat_lahir'])->name('cetak.surat.lahir');


	Route::get('/layanan-ibu-hamil-tambah-history-persalinan/{id}', [IbuHamilController::class, 'create_history_persalinan'])->name('tambah.history.persalinan');
	Route::post('/layanan-ibu-hamil-store-history-persalinan', [IbuHamilController::class, 'store_history_persalinan'])->name('store.history.persalinan');

	Route::get('/layanan-ibu-hamil-detail-persalinan', [IbuHamilController::class, 'history_persalinan'])->name('history.persalinan');
	Route::get('/layanan-ibu-hamil-detail-tambah-nifas', [IbuHamilController::class, 'detailTambahNifas'])->name('detail.tambah.nifas');
	Route::get('/layanan-ibu-hamil-detail-tambah-nifas/{id}',[IbuHamilController::class, 'detailTambahNifas']); 
	Route::post('/layanan-ibu-hamil-detail-store-nifas', [IbuHamilController::class,'StoreNifas']);

	// KSPR
	Route::get('/layanan-ibu-hamil-kspr/{id}',[IbuHamilController::class,'indexKspr']);
	Route::post('/layanan-ibu-hamil-kspr', [IbuHamilController::class,'storeKspr']);

	// Penapisan
	Route::get('/layanan-ibu-hamil-penapisan/{id}', [IbuHamilController::class,'indexPenapisan']);
	Route::post('/layanan-ibu-hamil-penapisan', [IbuHamilController::class,'storePenapisan']);

	// Observasi
	Route::get('/layanan-ibu-hamil-observasi/{id}', [IbuHamilController::class,'indexObservasi']);
	Route::post('/layanan-ibu-hamil-observasi', [IbuHamilController::class,'storeObservasi']);
	Route::get('/layanan-ibu-hamil-observasi-kala/{idkartuobservasi}', [IbuHamilController::class,'indexObservasiKala']);
	Route::post('/layanan-ibu-hamil-observasi-kala', [IbuHamilController::class,'storeObservasiKala']);

	// Route::post('/ibu_hamil/importObservasi', 'layanan\ibuHamilController@storeImportObservasi');
	// Route::get('/ibuHamilObservasi/{id}', 'layanan\ibuHamilController@indexObservasi');
	// Route::get('/observasiKala/{idkartuobservasi}', 'layanan\ibuHamilController@indexObservasiKala');
	// Route::post('/observasiKala/storeObservasi', 'layanan\ibuHamilController@storeObservasiKala');


	// Layanan Page Klinik
	Route::resource('/layanan-klinik', KlinikController::class);
	Route::post('/layanan-klinik-cek-stok_obat', [KlinikController::class, 'klinik_cek_stok_obat'])->name('klinik.cek.stok.obat');
	Route::get('/klinik-detail-tambah', [KlinikController::class, 'detailTambah']);
	// Route::post('/layanan-klinik-cek-stok_obat', [KlinikController::class, 'klinik_cek_stok_obat'])->name('klinik.cek.stok.obat');
	// History
	Route::post('/klinik-simpan-histori', [KlinikController::class, 'klinik_simpan_history'])->name('klinik.simpan.history');
	Route::post('/klinik-tambah-pasien-histori', [KlinikController::class, 'tambah_pasien_history'])->name('klinik.tambah.pasien.history');
	Route::post('/klinik-tambah-pasien-bayi-history', [KlinikController::class,'tambah_pasien_bayi_history'])->name('klinik.tambah.pasien.bayi.history'); 


	Route::post('/klinikSuratKetSakit', [KlinikController::class, 'cetakSuratKetSakit']); 
	Route::post('/klinikSuratRujukan', [KlinikController::class, 'cetakSuratRujukan']);



	// ================================================= MASTER LAPORAN
	Route::get('/laporan_keuangan', [LaporanController::class,'indexLaporanKeuangan']); 
	Route::get('/laporan_keuangan/filterDate', [LaporanController::class,'indexLaporanKeuanganFilter']);
	Route::post('/laporan_keuangan/print', [LaporanController::class,'printLaporanKeuangan']);

	Route::get('/laporan_kunjungan_ibu_Hamil', [LaporanController::class,'indexLaporanKunjunganIbuHamil']); 
	Route::post('/laporan_kunjungan_ibu_Hamil/print', [LaporanController::class,'printLaporanKunjunganIbuHamil']); 

	Route::get('/laporan_kunjungan_persalinan', [LaporanController::class,'indexLaporanKunjunganPersalinan']); 
	Route::post('/laporan_kunjungan_persalinan/print', [LaporanController::class,'printLaporanKunjunganPersalinan']); 

	Route::get('/laporan_kunjungan_kb', [LaporanController::class,'indexLaporanKunjunganKB']); 
	//Route::post('/laporan_kunjungan_kb/print', 'laporan\laporanController@printLaporanKunjunganKB');

	Route::get('/laporan_hasil_imunisasi', [LaporanController::class,'indexLaporanKeuangan']); 
	Route::get('/laporan_imunisasi', [LaporanController::class,'indexLaporanImunisasi']); 
	Route::post('/laporan_imunisasi/print', [LaporanController::class,'printLaporanImunisasi']);
	Route::post('/laporan_kunjungan_kb/print', [LaporanController::class,'printLaporanKunjunganKB']);


});
