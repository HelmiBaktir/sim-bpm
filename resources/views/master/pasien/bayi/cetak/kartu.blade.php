<!DOCTYPE html>
<html>
<head>
 <title>Kartu Nama</title>
 <style type="text/css">
  /* body {
   font-family: Arial;
  }
  td {
   padding: 10px;
  }
  table {
   margin: auto;
   margin-top: 90px;
   border: 2px solid white;
   padding: 10px;
  } */
  body {
   font-family: Arial;
   margin: 2px;
    padding: 2px;
  }
  td {
   padding-top: 10px;
   padding-bottom: 10px;
  }
  table {
    margin: 2px;
    padding: 2px;
   margin: auto;

  }


 </style>
</head>
<body>
 <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr bgcolor="#DCDCDC">
        <td colspan="3" align="center"><img style="margin-top:-10px;" width="100%" height="130" src="{{ public_path('ic_img/header_kartu_fix.png') }}"></td>
    </tr>
  <tr bgcolor="#DCDCDC">
   <td style="padding-left: 10px">Nama Lengkap</td>
   <td colspan="2">: {{ $bayi[0]->nama }}</td>
  </tr>
  <tr bgcolor="#DCDCDC">
   <td style="padding-left: 10px">Tgl. Bergabung</td>
   <td colspan="2">: {{ date("d-m-Y",strtotime($bayi[0]->created_at)) }}</td>
  </tr>
  <tr bgcolor="#DCDCDC">
   <td></td>
   <td></td>
   <td></td>
  </tr>
  <tr>
   <td colspan="3" align="center"><img style="margin-top:-10px;" width="100%" height="40" src="{{  public_path('ic_img/footer_kartu.png') }}"></td>
  </tr>
 </table> 

</body>
</html>