<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo-sima.png') }}">

    <title>SIM BPS</title>
     <style>
       #content{
            font-size: 14px;
            /* float: left; */
            float: none;

        }
        /* .header {
            height:100px;
            width:100%;
            font-size: 12px;
        }
        .kolom1 {
            height:100px;
            width:20%;
            float:left;
        }
        .kolom2 {
            height:100px;
            width:60%;
            float:left;
            margin-left: -5%;   
        }
        .kolom3 {
            height:100px;
            width:20%;
            float:right;     
        } */
        table {
        width: 100%;
        /* margin: 0 auto; */
        text-align: center;
    }
    td {
        padding: auto;
    }
    </style>
</head>
<body id="app-layout">
    <div class="header">
        <table style="text-align:center;">
            <tr>
                {{-- Img 1 --}}
                <td>
                    <ul style=" padding: 0;">
                        <img src="{{ public_path('ic_img/ibi.png') }}" height="70" width="70">
                    </ul>
                </td>
                {{-- text --}}
                <td width="100%">
                    <ul>
                        <h1 style="margin-bottom: 2px">BIDAN PRAKTEK MANDIRI <br>Lita Anggraeni, A.Md.Keb</h1>
                        
                        <font size="5">NO SIPB: 503.446/110/SIPB/436.7.2/2017 <br>Jl. Gunung Anyar Jaya I no 4, Surabaya</font>
                    </ul>
                </td>
                {{-- Img 2 --}}
                <td style=" padding: 0;">
                    <ul>
                        <img src="{{public_path('ic_img/bidan_delima.jpg')}}" height="70" width="70">
                    </ul>
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <div id="content">
        <h2 style="text-align: center; text-decoration: underline; font-weight: bold;">RUJUKAN</h2>
        <br>
        <div style="text-align:right; margin-right: 9%">
            Surabaya, <?php echo date('d M Y'); ?>&nbsp;
            <BR>

            Kepada Yth.  &nbsp;&nbsp;&nbsp;&nbsp;: {{$data['kepada']}} <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
            <BR>
            {{$data['kepadaRs']}}
        </div>

        <br>
        <div style="margin-left: 10%">
            <br>
            <div style="text-align: left">
                <div style="text-align: left">
                    &nbsp;&nbsp;&nbsp;&nbsp;Dengan hormat,
                </div>
                <BR>
                <div style="text-align: left">
                    Mohon pertolongan selanjutnya pada :
                </div>
                <br>
                <div style="text-align: left">
                    &nbsp;&nbsp;&nbsp;&nbsp;Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$data['nama']}}
                </div>
                <div style="text-align: left">
                    &nbsp;&nbsp;&nbsp;&nbsp;Umur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$data['umur']}} Tahun
                </div>
                <div style="text-align: left">
                    &nbsp;&nbsp;&nbsp;&nbsp;Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$data['alamat']}}

            </div>
            <br>
            <div style="text-align: left">
                <div style="text-align: left">
                    <p style="font-weight: bold;">Anamnese &nbsp;&nbsp;&nbsp;:</p>
                </div>
                <div style="text-align: left">
                    anamnesenya adalah {{$data['anamnese']}}
                </div>
                <br>
                <div style="text-align: left">
                    <p style="font-weight: bold;">Tindakan/Pemeriksaan &nbsp;&nbsp;&nbsp;:</p>
                </div>
                <div style="text-align: left">
                    Tindakan yang dilakukan adalah {{$data['tindakan']}}
                </div>
                <br>
                <div style="text-align: left">
                    <p style="font-weight: bold;">Perkiraan Diagnosa &nbsp;&nbsp;&nbsp;:</p>
                </div>
                <div style="text-align: left">
                    Perkiraan diagnosanya adalah {{$data['diagnosa']}}
                </div>
            </div>
            <BR>
            <div style="text-align: left">
                <div style="text-align: left">
                    &nbsp;&nbsp;&nbsp;&nbsp;Demikian, atas bantuannya diucapkan terima kasih.
                </div>
            </div>
        </div>
        <BR><BR>
        <div style="text-align: right;">
            <div style="margin-right: 16%">
        </div>
        <div style="text-align:right; margin-right: 9%">
            Surabaya, <?php echo date('d M Y'); ?>
        </div>
        <div style="text-align: right;">
            <div style="margin-right: 15%">
                Bidan
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div style="margin-right: 5%">
                Dsk. P. Lita Anggraeni, A.Md.Keb
            </div>
        </div>
        
    </div>
</body>
</html>
