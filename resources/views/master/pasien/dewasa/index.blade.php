@extends('layouts.adminlte')
<!-- plugin css -->
@section('plugin_css')
<link rel="stylesheet" href="{{asset('dropify/dist/css/dropify.min.css')}}">
@endsection
<!-- css -->
@section('add_css')
  /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }

    select.invalid {
      background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
      display: none;
    }

    .tab2 {
      display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none; 
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }

    .step2 {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none; 
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
      opacity: 1;
    }

    .step2.active {
      opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #4CAF50;
    }

    .step2.finish {
      background-color: #4CAF50;
    }
@endsection
<!-- content -->
@section('content')

<!-- modal Delete -->
<div class="modal fade" id="modalHapus" role="dialog" aria-labelledby="favoritesModalLabel"> 
  <div class="modal-dialog" role="document"> 
    <div class="modal-content" style="border-radius: 17px;"> 
      <div class="modal-header" style="background-color: #e61919; border-radius:17px 17px 0px 0px;"> 
        <h4 style="color:white;">Hapus Data Pasien Dewasa</h4> 
        <button type="button" class="close" 
        data-dismiss="modal" 
        aria-label="Close"> 
        <span aria-hidden="true">&times;</span></button> 
      </div> 
      <div class="modal-body"> 
        <FORM id="FormDeleteSingle" method="post" action="<?php echo URL::to('/pasien_dewasaDelete')?>"> 
          @method('delete')
          <div class="form-group"> 
            Apakah anda yakin ingin menghapus data pasien bernama <b><span id="nametext"></span></b> ?
          </div> 
          <div class="form-group"> 
            <input type="hidden" name="_token" value="{!!csrf_token()!!}"> 
            <input type="hidden" name="txtIDDel" id="txtIDDel"></input>
            <input type="hidden" name='jenis_hapus' value="single">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Tutup</button>
            <button class="btn btn-danger">Hapus</button> 
          </div> 
        </FORM> 
      </div> 
    </div> 
  </div> 
</div>
<!-- tutup modal Delete -->

<!-- modal Delete All-->
<div class="modal fade" id="modalHapusSemua" role="dialog" aria-labelledby="favoritesModalLabel"> 
  <div class="modal-dialog" role="document"> 
    <div class="modal-content" style="border-radius: 17px;"> 
      <div class="modal-header" style="background-color: #e61919; border-radius:17px 17px 0px 0px;"> 
        <h4 style="color:white;">Hapus Data Pasien Dewasa</h4> 
        <button type="button" class="close" 
        data-dismiss="modal" 
        aria-label="Close"> 
        <span aria-hidden="true">&times;</span></button> 
      </div> 
      <div class="modal-body"> 
        <FORM id="FormDeleteAll" method="post"> 
          @method('delete')
          <div class="form-group"> 
            <span id="textdel"></span>
          </div> 
          <div class="form-group" id="field_input"> 
            <input type="hidden" name="_token" value="{!!csrf_token()!!}"> 
            <input type="hidden" name="txtDeleteAll" id="txtDeleteAll">
            <input type="hidden" name='jenis_hapus' value="all">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Tutup</button>
            <button class="btn btn-danger" id="btnConfirmHapus">Hapus</button> 
          </div> 
        </FORM> 
      </div> 
    </div> 
  </div> 
</div>
<!-- tutup modal Delete All-->

<!-- modal Add -->
<div class="modal fade" id="modalAdd" role="dialog" 
aria-labelledby="favoritesModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content" style="border-radius: 17px;">
    <div class="modal-header" style="background-color: #e61919; border-radius:17px 17px 0px 0px;">
      <h4 style="color:white;">Tambah Data Pasien Dewasa</h4>
      <button type="button" class="close" 
      data-dismiss="modal" 
      aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <form id="regForm" method="POST" action="{{ route('pasien-dewasa.store') }}">
          <!-- One "tab" for each step in the form: -->
          <div class="tab"><b>IDENTITAS IBU:</b>
            <p><input type="text" class="form-control" id="txtNoregis" name="txtNoregis" placeholder="Nama..." oninput="this.className = 'form-control'" required readonly value="<?php echo $noreg; ?>"></p>
            <p><input type="text" class="form-control" id="txtNamaibu" name="txtNamaibu" placeholder="Nama..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>
                  <input type="text" class="form-control datepicker" id="txtTanggalLahiribu" name="txtTanggalLahiribu" placeholder="Tanggal Lahir..." onchange="this.className = 'form-control datepicker'" autocomplete="off">
                </div>
              </div>
            </p>
            <p>
              <div class="form-group">
                <select class="form-control" id="txtAgamaibu" name="txtAgamaibu" autocomplete="off" oninput="this.className = 'form-control'">
                  <option selected disabled value="">Agama...</option>
                  <option value="atheis">Atheis</option>
                  <option value="budha">Budha</option>
                  <option value="hindu">Hindu</option>
                  <option value="islam">Islam</option>
                  <option value="kristen">Kristen</option>
                </select>
              </div>
            </p>
            <p><input type="text" class="form-control" id="txtAlamatibu" name="txtAlamatibu" placeholder="Alamat..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="number" class="form-control" id="txtPhoneibu" name="txtPhoneibu" placeholder="No. Telp..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="text" class="form-control" id="txtKelurahanibu" name="txtKelurahanibu" placeholder="Kelurahan..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="text" class="form-control" autocomplete="off" id="txtPekerjaanibu" name="txtPekerjaanibu" placeholder="Pekerjaan..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="text" class="form-control" id="txtPendidikanibu" name="txtPendidikanibu" placeholder="Pendidikan..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p>
              <div class="form-group">
                <select class="form-control" onchange="changeKIA(this, 'add')" id="cboBukuKIA" name="cboBukuKIA">
                  <option selected disabled value="">Buku KIA</option>
                  <option value="punya">Punya</option>
                  <option value="belum">Belum Punya</option>
                </select>
              </div>
            </p>
            <p>
              <div class="form-group" id="divKIA" style="display: none;">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>
                  <input type="text" class="form-control datepicker" onchange="this.className = 'form-control datepicker'" id="tglKIA" name="tglKIA" placeholder="Diberi tanggal..." autocomplete="off">
                </div>
              </div>
            </p>
          </div>

          <div class="tab"><b>IDENTITAS AYAH:</b>
            <p><input type="text" class="form-control" id="txtNamaayah" name="txtNamaayah" placeholder="Nama..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control datepicker" id="txtTanggalLahirayah" name="txtTanggalLahirayah" placeholder="Tanggal Lahir..." onchange="this.className = 'form-control datepicker'" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <input type="checkbox" name="chkTgl" id="chkTgl" onchange="check(1)"></input>
                <label for="chkTgl">Lupa</label>    
              </div>              
            </div>
            <p>
            </p>
            <p>
              <div class="form-group">
                <select class="form-control" id="txtAgamaayah" name="txtAgamaayah" oninput="this.className = 'form-control'">
                  <option selected disabled value="">Agama...</option>
                  <option value="atheis">Atheis</option>
                  <option value="budha">Budha</option>
                  <option value="hindu">Hindu</option>
                  <option value="islam">Islam</option>
                  <option value="kristen">Kristen</option>
                </select>
              </div>
            </p>
            <p><input type="text" class="form-control" id="txtAlamatayah" name="txtAlamatayah" placeholder="Alamat..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="number" class="form-control" id="txtPhoneayah" name="txtPhoneayah" placeholder="No. Telp..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="text" class="form-control" id="txtKelurahanayah" name="txtKelurahanayah" placeholder="Kelurahan..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="text" class="form-control" id="txtPekerjaanayah" name="txtPekerjaanayah" placeholder="Pekerjaan..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="text" class="form-control" id="txtPendidikanayah" name="txtPendidikanayah" placeholder="Pendidikan..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
          </div>

          <div class="tab"><b>RIWAYAT PERKAWINAN:</b>
            <p><input type="number" class="form-control" min="0" id="txtKawinke" name="txtKawinke" placeholder="Perkawinan ke..." oninput="this.className = 'form-control'" style="text-align: right;" autocomplete="off" required></p>
            <div class="row">
              <div class="col-sm"><input type="number" class="form-control" min="0" id="txtLamaKawin" name="txtLamaKawin" placeholder="Lama Kawin (Tahun)..." oninput="this.className = 'form-control'" style="text-align: right;" autocomplete="off" required></div>
              <div class="col-sm"><input type="number" class="form-control" min="0" id="txtLamaKawinBulan" name="txtLamaKawinBulan" placeholder="Lama Kawin (Bulan)..." oninput="this.className = 'form-control'" style="text-align: right;" autocomplete="off" required></div>              
            </div>
            <p>
              <div class="form-group">
                <select class="form-control" id="cboSebabPisah" name="cboSebabPisah" oninput="changeSebabPisah(this, 'add');">
                  <option selected disabled value="">Sebab Pisah...</option>
                  <option value="masih">Masih Berjalan</option>
                  <option value="cerai">Cerai</option>
                  <option value="meninggal">Meninggal</option>
                </select>
              </div>
            </p>
            <p><input type="text" class="form-control" id="txtSebabmeninggal" name="txtSebabmeninggal" placeholder="Sebab Meninggal..." oninput="this.className = 'form-control'" autocomplete="off" required style="display: none;"></p>
            <p><input type="button" id="btnTambah" class="btn btn-primary" onclick="tambah_tabel(1)" value="Tambah ke Tabel"></input></p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tabel Riwayat Perkawinan</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-striped" id="tabelDataRiwayatKawin">
                      <tr id="tambahDataObat">
                        <th>Kawin Ke</th>
                        <th>Lama Kawin</th>
                        <th>Sebab Pisah</th>
                        <th>Sebab Meninggal</th>
                        <th></th>
                      </tr>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div><!-- /.row -->

            <div id="field_input_riwayat_kawin">
              
            </div>            
          </div>

          <div style="overflow:auto;">
            <div style="float:right;">
              <input type="hidden" name="_token" value="{!!csrf_token()!!}">
              <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Sebelumnya</button>
              <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
            </div>
          </div>

          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
          </div>

        </form>
    </div>
  </div>
</div>
</div>
<!-- tutup modal Add -->

<!-- modal Edit -->
<div class="modal fade" id="modalEdit" role="dialog" 
aria-labelledby="favoritesModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content" style="border-radius: 17px;">
    <div class="modal-header" style="background-color: #e61919; border-radius:17px 17px 0px 0px;">
      <h4 style="color:white;">Edit Data Pasien Dewasa</h4>
      <button type="button" class="close" 
      data-dismiss="modal" 
      aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <form id="regForm2" method="POST">
          @method('put')
          <!-- One "tab" for each step in the form: -->
          <div class="tab2"><b>IDENTITAS IBU:</b>
          <p><input type="text" class="form-control" id="txtNoregisEdit" name="txtNoregisEdit" placeholder="No Regis..." oninput="this.className = 'form-control'" required readonly></p>
            <p><input type="text" class="form-control" id="txtNamaibuEdit" name="txtNamaibuEdit" placeholder="Nama..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>
                  <input type="text" class="form-control datepicker" id="txtTanggalLahiribuEdit" name="txtTanggalLahiribuEdit" placeholder="Tanggal Lahir..." onchange="this.className = 'form-control datepicker'" autocomplete="off">
                </div>
              </div>
            </p>
            <p>
              <div class="form-group">
                <select class="form-control" id="txtAgamaibuEdit" name="txtAgamaibuEdit" oninput="this.className = 'form-control'">
                  <option selected disabled value="">Agama...</option>
                  <option value="atheis">Atheis</option>
                  <option value="budha">Budha</option>
                  <option value="hindu">Hindu</option>
                  <option value="islam">Islam</option>
                  <option value="kristen">Kristen</option>
                </select>
              </div>
            </p>
            <p><input type="text" class="form-control" id="txtAlamatibuEdit" name="txtAlamatibuEdit" placeholder="Alamat..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="number" class="form-control" id="txtPhoneibuEdit" name="txtPhoneibuEdit" placeholder="No. Telp..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="text" class="form-control" id="txtKelurahanibuEdit" name="txtKelurahanibuEdit" placeholder="Kelurahan..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="text" class="form-control" id="txtPekerjaanibuEdit" name="txtPekerjaanibuEdit" placeholder="Pekerjaan..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="text" class="form-control" id="txtPendidikanibuEdit" name="txtPendidikanibuEdit" placeholder="Pendidikan..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p>
              <div class="form-group">
                <select class="form-control" onchange="changeKIA(this, 'edit')" id="cboBukuKIAEdit" name="cboBukuKIAEdit">
                  <option selected disabled value="">Buku KIA</option>
                  <option value="punya">Punya</option>
                  <option value="belum">Belum Punya</option>
                </select>
              </div>
            </p>
            <p>
              <div class="form-group" id="divKIAEdit" style="display: none;">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>
                  <input type="text" class="form-control datepicker" onchange="this.className = 'form-control datepicker'" id="tglKIAEdit" name="tglKIAEdit" placeholder="Diberi tanggal..." autocomplete="off">
                </div>
              </div>
            </p>
          </div>

          <div class="tab2"><b>IDENTITAS AYAH:</b>
            <p><input type="text" class="form-control" id="txtNamaayahEdit" name="txtNamaayahEdit" placeholder="Nama..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control datepicker" id="txtTanggalLahirayahEdit" name="txtTanggalLahirayahEdit" placeholder="Tanggal Lahir..." onchange="this.className = 'form-control datepicker'" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <input type="checkbox" name="chkTglEdit" id="chkTglEdit" onchange="check(2)"></input>
                <label for="chkTglEdit">Lupa</label>    
              </div>              
            </div>
            <p>
              <div class="form-group">
                <select class="form-control" id="txtAgamaayahEdit" name="txtAgamaayahEdit" oninput="this.className = 'form-control'">
                  <option selected disabled value="">Agama...</option>
                  <option value="atheis">Atheis</option>
                  <option value="budha">Budha</option>
                  <option value="hindu">Hindu</option>
                  <option value="islam">Islam</option>
                  <option value="kristen">Kristen</option>
                </select>
              </div>
            </p>
            <p><input type="text" class="form-control" id="txtAlamatayahEdit" name="txtAlamatayahEdit" placeholder="Alamat..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="number" class="form-control" id="txtPhoneayahEdit" name="txtPhoneayahEdit" placeholder="No. Telp..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="text" class="form-control" autocomplete="off" id="txtKelurahanayahEdit" name="txtKelurahanayahEdit" placeholder="Kelurahan..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="text" class="form-control" id="txtPekerjaanayahEdit" name="txtPekerjaanayahEdit" placeholder="Pekerjaan..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
            <p><input type="text" class="form-control" id="txtPendidikanayahEdit" name="txtPendidikanayahEdit" placeholder="Pendidikan..." oninput="this.className = 'form-control'" autocomplete="off" required></p>
          </div>

          <div style="overflow:auto;">
            <div style="float:right;">
              <input type="hidden" name="_token" value="{!!csrf_token()!!}">
              <input type="hidden" id="txtIDEdit" name="txtIDEdit"></input>
              <button type="button" class="btn btn-primary" id="prevBtn2" onclick="nextPrev2(-1)">Sebelumnya</button>
              <button type="button" class="btn btn-primary" id="nextBtn2" onclick="nextPrev2(1)">Selanjutnya</button>
            </div>
          </div>

          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:40px;">
            <span class="step2"></span>
            <span class="step2"></span>
          </div>

        </form>
    </div>
  </div>
</div>
</div>
<!-- tutup modal Edit -->

<!-- modal Import-->
<div class="modal fade" id="modalImport" role="dialog" aria-labelledby="favoritesModalLabel"> 
  <div class="modal-dialog" role="document"> 
    <div class="modal-content" style="border-radius: 17px;"> 
      <div class="modal-header" style="background-color: #e61919; border-radius:17px 17px 0px 0px;"> 
        <h4 style="color:white;">Import Data Pasien Dewasa</h4> 
        <button type="button" class="close" 
        data-dismiss="modal" 
        aria-label="Close"> 
        <span aria-hidden="true">&times;</span></button> 
      </div> 
      <div class="modal-body"> 
        <div class="callout callout-warning">
          <h4><i class="fa fa-warning"></i> Note:</h4>
          Import data ibu terlebih dahulu, setelah itu import data suami. <BR>
          Gunakan template yang sudah disediakan pada link di bawah ini
        </div>
        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Tabs</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Import Data Ibu</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Import Data Suami</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <H5>Import Data Ibu</H5>
                    <FORM method="post" action="{{ url('/pasien-dewasa-import') }}" enctype="multipart/form-data"> 
                      <div class="form-group">
                        <input type="file" id="input-file-now" name="input-file-now" class="dropify" data-show-remove="true" data-allowed-file-extensions="xlsx" data-height="300"/>
                      </div> 
                      <div class="form-group" id="field_input"> 
                        <input type="hidden" id="txtIdentifier" name="txtIdentifier" value="ibu"></input>
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}"> 
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Tutup</button> 
                        <button class="btn btn-danger" id="btnImport">Import</button> 
                      </div>
                      <div class="form-group"> 
                        Gunakan file dengan format .xlsx. Download template <a href="{{ asset('template_excel/template_pasien_dewasa.xlsx') }}">disini</a>
                      </div> 
                    </FORM> 
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <H5>Import Data Suami</H5>
                    <FORM method="post" action="{{ url('/pasien-dewasa-import') }}" enctype="multipart/form-data"> 
                      <div class="form-group">
                        <input type="file" id="input-file-now" name="input-file-now" class="dropify" data-show-remove="true" data-allowed-file-extensions="xlsx" data-height="300"/>
                      </div> 
                      <div class="form-group" id="field_input"> 
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                        <input type="hidden" id="txtIdentifier" name="txtIdentifier" value="ayah"></input>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Tutup</button> 
                        <button class="btn btn-danger" id="btnImport">Import</button> 
                      </div>
                      <div class="form-group"> 
                        Gunakan file dengan format .xlsx. Download template <a href="{{ asset('template_excel/template_suami_pasien_dewasa_riwayat_kawin.xlsx') }}">disini</a>
                      </div> 
                    </FORM> 
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->
      </div> 
    </div> 
  </div> 
</div>
<!-- tutup modal Import-->

<br>
<div class="container-fluid">
  <!-- NOTIFIKASI -->
  @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fa fa-check"></i> Alert!</h5>
      {{ session('message') }}
    </div>
  @endif

  @if (session()->has('danger_message'))
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fa fa-close"></i> Alert!</h5>
      {{ session('danger_message') }}
    </div>
  @endif
  <!-- END NOTIFIKASI -->

  <div class="row mb-2">
    <div class="col-sm-6">
      <h3>Master Pasien Dewasa</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Master Pasien Dewasa</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-1 col-4">
              <button type="button" class="btn btn-block btn-primary btn-sm" id="btnAdd" data-toggle="modal" 
              data-target="#modalAdd"><i class="fa fa-plus-circle nav-icon"></i> Tambah</button>
            </div>
            <div class="col-lg-1 col-4">
              <button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal" 
              data-target="#modalHapusSemua" onclick="opendeleteallmodal();"><i class="fa fa-times-circle nav-icon"></i> Hapus</button>
            </div>
            <div class="col-lg-2 col-4" title="Hapus">
              <button type="button" class="btn btn-block btn-info btn-sm" data-toggle="modal" 
              data-target="#modalImport"><i class="fa fa-upload nav-icon"></i> Import Excel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12 col-md-6">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">
                        #
                      </th>
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">
                        No
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 20%; text-align: center;">
                        Nomor Registrasi
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 20%; text-align: center;">
                        Nama Ibu
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 20%; text-align: center;">
                        Nama Suami
                      </th>
                      <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 20%; text-align: center;">
                        Alamat
                      </th> -->
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10%; text-align: center;">
                        No . Telp
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 30%; text-align: center;">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pasien as $key => $value) 
                    <tr>
                      <td>
                        <label>
                          <input type="checkbox" class="flat-red" id="{{$value->no_regis}}" name="chkDel" value="<?php echo $value['id']; ?>">
                        </label>
                      </td>
                      <td style="text-align: center;">{{($key+1)}}</td>
                      <td>{{$value->no_regis}}</td>
                      <td>{{$value->nama}}</td>
                      <td>{{ count($value->suamiPasienDewasa) > 0 ? $value->suamiPasienDewasa[0]->nama : 'Tidak Ada Suami' }}</td>
                      <!-- <td>{{$value['alamat_ibu']}}</td> -->
                      <td>{{$value->telp}}</td>
                      <td>
                            <div class="form-group">
                              <div>
                                <a href="{{ route('pasien-dewasa.show',$value->no_regis) }}" class="btn btn-info" title="Detail" style="width: 40px;"><i class="fa fa-info"></i></a>

                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalEdit" title="Edit" id="<?php echo 'edit'.$key; ?>" onclick="openeditmodal('{{ $value->no_regis }}');"><i class="fa fa-edit"></i></button>

                                <a href="{{ route('pasien-dewasa.cetak.kartu',['id'=>$value->no_regis]) }}"><button type="button" class="btn btn-warning" title="tambah kartu"><i class="fa fa-print"></i></button></a>

                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapus" title="Hapus" onclick="opendeletemodal('{{ $value->no_regis }}','{{ $value->nama }}')"><i class="fa fa-times"></i></button>
                              </div>
                            </div>
                      </td>
                </tr>
                @endforeach
              </tbody>
            </table></div></div></div>
          </div>

        </div>
      </div>
    </div>

  </div>
  @endsection
  <!-- plugin js -->
  @section('plugin_js')

  @endsection

  <!-- add js -->
  @section('add_js')
  <script type="text/javascript">
    var counter = 1;
    var dataRiwayatKawin = [];
    function tambah_tabel(tipe){
      var valid_process = true;
      var kawin_ke =  $('#txtKawinke').val();
      var lama_kawin_tahun =  $('#txtLamaKawin').val();
      var lama_kawin_bulan =  $('#txtLamaKawinBulan').val();
      var lama_kawin = lama_kawin_tahun +" Tahun " + lama_kawin_bulan + " Bulan";
      var sebab_pisah =  $('#cboSebabPisah option:selected').text();
      var sebab_meninggal =  "";

      if(kawin_ke == ""){
        document.getElementById("txtKawinke").className += " invalid";
        valid_process = false;
      }

      if(lama_kawin_tahun == "" && lama_kawin_bulan == ""){
        document.getElementById("txtLamaKawin").className += " invalid";
        document.getElementById("txtLamaKawinBulan").className += " invalid";
        valid_process = false;
      }
      else{
        
        if(lama_kawin_bulan == ""){
          lama_kawin = lama_kawin_tahun + " Tahun";
        }
        else if(lama_kawin_tahun == ""){
          lama_kawin = lama_kawin_bulan + " Bulan";
        }
        document.getElementById("txtLamaKawin").className = "form-control";
        document.getElementById("txtLamaKawinBulan").className = "form-control";
      }

      if(sebab_pisah == "Sebab Pisah..."){
        document.getElementById("cboSebabPisah").className += " invalid";
        valid_process = false;
      }
      else if(sebab_pisah == 'Masih Berjalan'){
        sebab_pisah = "-";
        sebab_meninggal = "";
      }
      else if(sebab_pisah == 'Meninggal'){
        sebab_meninggal = $('#txtSebabmeninggal').val();
      }
      else{
        sebab_meninggal = "";
      }
      
      if(valid_process == true){
        if(tipe == 1){
          var newTextBoxDiv = $(document.createElement('tr')).attr("id", 'trdata'+ counter);
          
          newTextBoxDiv.after().html(
            '<td>'+kawin_ke+'</td>'+
            '<td>'+lama_kawin+'</td>'+
            '<td>'+sebab_pisah+'</td>'+
            '<td>'+sebab_meninggal+'</td>'+
            '<td><span class="btn btn-danger" onclick="kurang_tabel('+counter+','+tipe+')">X</span></td>');

          newTextBoxDiv.appendTo("#tabelDataRiwayatKawin");

          var save_variable = kawin_ke+";"+lama_kawin+";"+sebab_pisah+";"+sebab_meninggal;

          // CREATE HIDDEN ELEMENT FOR SAVE ID'S CHOOSE
          var input = document.createElement("input");
          input.setAttribute('type', 'hidden');
          input.setAttribute('id', 'tbl'+counter);
          input.setAttribute('name', 'riwayat_kawin[]');
          input.setAttribute('value', save_variable);

          var parent = document.getElementById("field_input_riwayat_kawin");
          parent.appendChild(input);
        }
        else{
          var newTextBoxDiv = $(document.createElement('tr')).attr("id", 'trdataedit'+ counter);
          
          newTextBoxDiv.after().html(
            '<td>'+kawin_ke+'</td>'+
            '<td>'+lama_kawin+'</td>'+
            '<td>'+sebab_pisah+'</td>'+
            '<td>'+sebab_meninggal+'</td>'+
            '<td><span class="btn btn-danger" onclick="kurang_tabel('+counter+','+tipe+')">X</span></td>');

          newTextBoxDiv.appendTo("#bodyriwayatkawinedit");

          var save_variable = kawin_ke+";"+lama_kawin+";"+sebab_pisah+";"+sebab_meninggal;

          // CREATE HIDDEN ELEMENT FOR SAVE ID'S CHOOSE
          var input = document.createElement("input");
          input.setAttribute('type', 'hidden');
          input.setAttribute('id', 'tbl_edit'+counter);
          input.setAttribute('name', 'riwayat_kawin_edit[]');
          input.setAttribute('value', save_variable);

          var parent = document.getElementById("field_input_riwayat_kawin_edit");
          parent.appendChild(input);
        }

        counter++;        
      }

      
    }

    function kurang_tabel(id, tipe){
      if(counter==1){
        alert("No more textbox to remove");
        return false;
      }   

      counter--;

      if(tipe == 1){
        $("#trdata" + id).remove();
        
        var parent = document.getElementById("field_input_riwayat_kawin");
        var element = document.getElementById('tbl'+id);
        parent.removeChild(element);
      }
      else{
        $("#trdataedit" + id).remove();
        
        var parent = document.getElementById("field_input_riwayat_kawin_edit");
        var element = document.getElementById('tbl_edit'+id);
        parent.removeChild(element);
      }

    }
  </script>

  <script type="text/javascript">
    var btnAdd = document.getElementById('btnAdd');

    btnAdd.onclick = function() {
      modalAdd.style.display = "block";
    }

    function openeditmodal(id){
        let action = "{{ route('pasien-dewasa.update', ':id') }}".replace(':id', id)
        $('#regForm2').attr('action',action)
        var url =  "{{ route('pasien-dewasa.edit',':noregis') }}".replace(':noregis', id);
        $.ajax({
          type:"GET",
          url:url,
          data:{pasien_id:id},
          success:function(data){
              var resp = $.parseJSON(data);
             
              document.getElementById('txtNoregisEdit').value = resp.no_regis;
              document.getElementById('txtNamaibuEdit').value = resp.nama;
              document.getElementById('txtTanggalLahiribuEdit').value = resp.tanggal_lahir;
              document.getElementById('txtAgamaibuEdit').value = resp.agama;
              document.getElementById('txtAlamatibuEdit').value = resp.alamat;
              document.getElementById('txtPhoneibuEdit').value = resp.telp;
              document.getElementById('txtKelurahanibuEdit').value = resp.kelurahan;
              document.getElementById('txtPekerjaanibuEdit').value = resp.pekerjaan;
              document.getElementById('txtPendidikanibuEdit').value = resp.pendidikan;
              document.getElementById('cboBukuKIAEdit').value = resp.buku_kia;

              if(resp.buku_kia == "punya"){
                document.getElementById('divKIAEdit').style.display = "block";
                document.getElementById('tglKIAEdit').value = resp.tgl_buku_kia;
              }
              else{
                document.getElementById('divKIAEdit').style.display = "none";
                document.getElementById('tglKIAEdit').value = "";
              }
              
              document.getElementById('txtNamaayahEdit').value = resp.suami_pasien_dewasa[0].nama;
              if(resp.tgl_lahir_ayah == ""){
                document.getElementById('txtTanggalLahirayahEdit').value = "";
                document.getElementById('chkTglEdit').checked = true;
              }
              else{
                document.getElementById('txtTanggalLahirayahEdit').value = resp.tanggal_lahir;
                document.getElementById('chkTglEdit').checked = false;
              }
              document.getElementById('txtAgamaayahEdit').value = resp.suami_pasien_dewasa[0].agama;
              document.getElementById('txtAlamatayahEdit').value = resp.suami_pasien_dewasa[0].alamat;
              document.getElementById('txtPhoneayahEdit').value = resp.suami_pasien_dewasa[0].telp;
              document.getElementById('txtKelurahanayahEdit').value = resp.suami_pasien_dewasa[0].kelurahan;
              document.getElementById('txtPekerjaanayahEdit').value = resp.suami_pasien_dewasa[0].pekerjaan;
              document.getElementById('txtPendidikanayahEdit').value = resp.suami_pasien_dewasa[0].pendidikan;
          }
        });

    }

    function opendeletemodal(id, nama){
        let action = "{{ route('pasien-dewasa.destroy', ':id') }}".replace(':id', id)
        $('#FormDeleteSingle').attr('action',action)
        document.getElementById('nametext').innerHTML = nama;
        document.getElementById('txtIDDel').value = id;
    }

    function opendeleteallmodal(){
        let action = "{{ route('pasien-dewasa.destroy', 1) }}"
        $('#FormDeleteAll').attr('action',action)
        var arrTerpilih = new Array();
        $("input:checkbox[name='chkDel']:checked").each(function(){
          arrTerpilih.push($(this).attr('id'));
          
        });
        if(arrTerpilih.length>0)
        {
          console.log(arrTerpilih);
          document.getElementById('txtDeleteAll').value = arrTerpilih;
          document.getElementById("textdel").innerHTML = "Apakah anda yakin ingin menghapus data pasien yang telah dipilih?";
          document.getElementById("btnConfirmHapus").style.visibility = "visible";
        }
        else
        {
          document.getElementById("textdel").innerHTML = "Tidak ada data pasien yang dipilih";
          document.getElementById("btnConfirmHapus").style.visibility = "hidden";
        }

        // $ischecked = false;
        // for(var i = 0; i < document.getElementsByName('chkDel[]').length; i++){
        //   if(document.getElementById('checkbox'+i).checked){
        //     $ischecked = true;
        //   }
        // }

        // if($ischecked){
        //   document.getElementById("textdel").innerHTML = "Apakah anda yakin ingin menghapus data pasien yang telah dipilih?";
        //   document.getElementById("btnConfirmHapus").style.visibility = "visible";
        // }
        // else{
        //   document.getElementById("textdel").innerHTML = "Tidak ada data pasien yang dipilih";
        //   document.getElementById("btnConfirmHapus").style.visibility = "hidden";
        // }
    }

    // FOR DELETE CHECKED
    // var arrTerpilih = new Array();
    // $('input').on('ifChecked', function(event){
    //   // CREATE HIDDEN ELEMENT FOR SAVE ID'S CHOOSE
    //   var input = document.createElement("input");
    //   input.setAttribute('type', 'hidden');
    //   input.setAttribute('id', 'del'+$(this).val());
    //   input.setAttribute('name', 'txtDeleteAll[]');
    //   input.setAttribute('value', $(this).val());

    //   var parent = document.getElementById("field_input");
    //   parent.appendChild(input);
    // });

    // $('input').on('ifUnchecked', function(event){
    //   var parent = document.getElementById("field_input");
    //   var element = document.getElementById('del'+$(this).val());
    //   parent.removeChild(element);
    // });
    // ============ DELETE CHECKED END
  </script>

  <!-- SCRIPT PENGECEKAN FORM ADD DAN EDIT -->
  <script>
    // =========================== Modal Add
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form ...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      // ... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Selanjutnya";
      }
      // ... and run a function that displays the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form... :
      if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("regForm").submit();
        window.loading_screen = window.pleaseWait({
          logo: '{{ asset("logo-sima-small.png") }}',
          backgroundColor: 'white',
          loadingHtml: '<div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div'
        });
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      z = x[currentTab].getElementsByTagName("select");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // check active input tag
        if(document.getElementById("divKIA").style.display != "none"){
          if(y[i].id == "tglKIA" && y[i].id != "txtKawinke"  && y[i].id != "txtLamaKawin" && y[i].id != "txtLamaKawinBulan"){
            // console.log("1");
            // If a field is empty...
            if (y[i].value == "") {
              // add an "invalid" class to the field:
              y[i].className += " invalid";
              // and set the current valid status to false:
              valid = false;
            }
          }
        }

        if(document.getElementById("txtSebabmeninggal").style.display != "none"){
          if(y[i].id == "tglKIA"  && y[i].id != "txtKawinke" && y[i].id == "txtSebabmeninggal"  && y[i].id != "txtLamaKawin" && y[i].id != "txtLamaKawinBulan"){
            // console.log("2");
            // If a field is empty...
            if (y[i].value == "") {
              // add an "invalid" class to the field:
              y[i].className += " invalid";
              // and set the current valid status to false:
              valid = false;
            }
          }
        }

        if(!document.getElementById("chkTgl").checked){
          if(y[i].id == "txtTanggalLahirayah"){
            // console.log("2");
            // If a field is empty...
            if (y[i].value == "") {
              // add an "invalid" class to the field:
              y[i].className += " invalid";
              // and set the current valid status to false:
              valid = false;
            }
          }
        }

        if(y[i].id != "tglKIA" && y[i].id != "txtSebabmeninggal" && y[i].id != "txtLamaKawin" && y[i].id != "txtLamaKawinBulan" && y[i].id != "txtKawinke" && y[i].id != "txtTanggalLahirayah"){
          console.log(y[i].id);
          // If a field is empty...
          if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
          }
        }
      }

      // CEK TABLE RIWAYAT PERKAWINAN
      if(currentTab == 2){
        if(counter < 2){
          alert("Harap mengisi riwayat perkawinan");
          valid = false;
        }
      }

      for (m = 0; m < z.length; m++) {
        if(z[m].id != "cboSebabPisah"){
          // If a field is empty...
          if (z[m].value == "") {
            // add an "invalid" class to the field:
            z[m].className += " invalid";
            // and set the current valid status to false:
            valid = false;
          }
        }
      }

      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class to the current step:
      x[n].className += " active";
    }
    // ============================ End Modal Add

    // ============================ Modal Edit
    var currentTab2 = 0;
    showTab2(currentTab2);
    function showTab2(n) {
      // This function will display the specified tab of the form ...
      var x = document.getElementsByClassName("tab2");
      x[n].style.display = "block";
      // ... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn2").style.display = "none";
      } else {
        document.getElementById("prevBtn2").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn2").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn2").innerHTML = "Selanjutnya";
      }
      // ... and run a function that displays the correct step indicator:
      fixStepIndicator2(n)
    }

    function nextPrev2(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab2");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm2()) return false;
      // Hide the current tab:
      x[currentTab2].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab2 = currentTab2 + n;
      // if you have reached the end of the form... :
      if (currentTab2 >= x.length) {
        //...the form gets submitted:
        document.getElementById("regForm2").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab2(currentTab2);
    }

    function validateForm2() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab2");
      y = x[currentTab2].getElementsByTagName("input");
      z = x[currentTab2].getElementsByTagName("select");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // check active input tag
        if(document.getElementById("divKIAEdit").style.display != "none"){
          if(y[i].id == "tglKIAEdit"){
            // If a field is empty...
            if (y[i].value == "") {
              // add an "invalid" class to the field:
              y[i].className += " invalid";
              // and set the current valid status to false:
              valid = false;
            }
          }
        }

        if(!document.getElementById("chkTglEdit").checked){
          if(y[i].id == "txtTanggalLahirayahEdit"){
            // console.log("2");
            // If a field is empty...
            if (y[i].value == "") {
              // add an "invalid" class to the field:
              y[i].className += " invalid";
              // and set the current valid status to false:
              valid = false;
            }
          }
        }

        if(y[i].id != "tglKIAEdit" && y[i].id != "txtTanggalLahirayahEdit"){
          // If a field is empty...
          if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
          }
        }
      }


      for (m = 0; m < z.length; m++) {
        // If a field is empty...
        if (z[m].value == "") {
          // add an "invalid" class to the field:
          z[m].className += " invalid";
          // and set the current valid status to false:
          valid = false;
        }
      }

      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step2")[currentTab2].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator2(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step2");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class to the current step:
      x[n].className += " active";
    }
    // ============================ End Modal Edit
    function changeKIA(element, tipe){
      element.className = 'form-control';
      if(element.value == "punya"){
        if(tipe == 'add'){
          document.getElementById("divKIA").style.display = "block";
        }
        else{
          document.getElementById("divKIAEdit").style.display = "block";
        }
      }
      else{
        if(tipe == 'add'){
          document.getElementById("divKIA").style.display = "none";
        }
        else{
          document.getElementById("divKIAEdit").style.display = "none";
        }
      }
    }

    function changeSebabPisah(element, tipe){
      element.className = 'form-control';
      if(element.value == "meninggal"){
        if(tipe == 'add'){
          document.getElementById("txtSebabmeninggal").style.display = "block";
        }
        else{
          document.getElementById("txtSebabmeninggalEdit").style.display = "block";
        }
      }
      else{
        if(tipe == 'add'){
          document.getElementById("txtSebabmeninggal").style.display = "none";
        }
        else{
          document.getElementById("txtSebabmeninggalEdit").style.display = "none";
        }
      }
    }

    function check(id)
    {
      if(id == 1){
        if(document.getElementById("chkTgl").checked){
          document.getElementById("txtTanggalLahirayah").className = "form-control datepicker";
          document.getElementById("txtTanggalLahirayah").value = "";
        }
      }
      else{
        if(document.getElementById("chkTglEdit").checked){
          document.getElementById("txtTanggalLahirayahEdit").className = "form-control datepicker";
          document.getElementById("txtTanggalLahirayahEdit").value = "";
        }
      }
    }
  </script>

  <script src="{{asset('dropify/dist/js/dropify.min.js')}}"></script>
  <script>

    $(document).ready(function(){
      // Basic
      $('.dropify').dropify();

      // Translated
      $('.dropify-fr').dropify({
        messages: {
          default: 'Glissez-déposez un fichier ici ou cliquez',
          replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
          remove:  'Supprimer',
          error:   'Désolé, le fichier trop volumineux'
        }
      });

      // Used events
      var drEvent = $('#input-file-events').dropify();

      drEvent.on('dropify.beforeClear', function(event, element){
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
      });

      drEvent.on('dropify.afterClear', function(event, element){
        alert('File deleted');
      });

      drEvent.on('dropify.errors', function(event, element){
        console.log('Has Errors');
      });

      var drDestroy = $('#input-file-to-destroy').dropify();
      drDestroy = drDestroy.data('dropify')
      $('#toggleDropify').on('click', function(e){
        e.preventDefault();
        if (drDestroy.isDropified()) {
          drDestroy.destroy();
        } else {
          drDestroy.init();
        }
      })
    });
  </script>
  @endsection