<?php

if(isset($_POST['submit'])){
        $nik = $_POST['nik'];
        $namalengkap = $_POST['namalengkap'];
        $kelamin = $_POST['jeniskelamin'];
        $userid = $_POST['id'];

        $tempatlahir = $_POST['tempatlahir'];
        $tgllahir = $_POST['tgllahir'];
        $alamat = $_POST['alamat'];
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $kecamatan = $_POST['kecamatan'];
        $kelurahan = $_POST['kelurahan'];

        $agama = $_POST['agama'];
        $telepon = $_POST['telepon'];

        $ayahnik = $_POST['ayahnik'];
        $ayahnama = $_POST['ayahnama'];
        $ayahpendidikan = $_POST['ayahpendidikan'];
        $ayahpekerjaan = $_POST['ayahpekerjaan'];
        $ayahpenghasilan = $_POST['ayahpenghasilan'];
        $ayahtelepon = $_POST['ayahtelepon'];

        $ibunik = $_POST['ibunik'];
        $ibunama = $_POST['ibunama'];
        $ibupendidikan = $_POST['ibupendidikan'];
        $ibupekerjaan = $_POST['ibupekerjaan'];
        $ibupenghasilan = $_POST['ibupenghasilan'];
        $ibutelepon = $_POST['ibutelepon'];

        $walinik = $_POST['walinik'];
        $walinama = $_POST['walinama'];
        $walipekerjaan = $_POST['walipekerjaan'];
        $walitelepon = $_POST['walitelepon'];

        $foto = 'foto_'.$nisn;

        //perihal gambar
        $nama_file_foto = $_FILES['foto']['name'];

        $ext1 = pathinfo($nama_file_foto, PATHINFO_EXTENSION);

        $ukuran_file_foto = $_FILES['foto']['size'];

        $ukurantotal = $ukuran_file_foto + $ukuran_file_idpn + $ukuran_file_iblkg;
        $tipe_file = $_FILES['foto']['type'];
        $tmp_file = $_FILES['foto']['tmp_name'];

        $path_foto = "images/foto/".$foto.'.'.$ext1;


        if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
          if($ukurantotal <= 1600000){ 
            $upload = move_uploaded_file($tmp_file,$path_foto);

            if($upload){ 
            
                $submitdata = mysqli_query($conn,"insert into userdata (userid, nik, namalengkap, jeniskelamin, tempatlahir, tanggallahir, alamat, provinsi, kabupaten, kecamatan, kelurahan, agama, telepon, ayahnik, ayahnama, ayahpendidikan, ayahpekerjaan, ayahpenghasilan, ayahtelepon, ibunik, ibunama, ibupendidikan, ibupekerjaan, ibupenghasilan, ibutelepon, walinik, walinama, walipekerjaan, walitelepon, foto) 
                values('$userid','$nik','$namalengkap','$kelamin','$tempatlahir','$tgllahir','$alamat','$provinsi','$kota','$kecamatan','$kelurahan','$agama','$telepon','$ayahnik','$ayahnama','$ayahpendidikan','$ayahpekerjaan','$ayahpenghasilan','$ayahtelepon','$ibunik','$ibunama','$ibupendidikan','$ibupekerjaan','$ibupenghasilan','$ibutelepon','$walinik','$walinama','$walipekerjaan','$walitelepon','$path_foto')");
                
              if($submitdata){ 

                //berhasil bikin
                echo " <div class='alert alert-success'>
                        Berhasil submit data.
                    </div>
                    <meta http-equiv='refresh' content='2; url= daftar.php'/>  ";  

              }else{

                echo "<div class='alert alert-warning'>
                        Gagal submit data. Silakan coba lagi nanti.
                    </div>
                    <meta http-equiv='refresh' content='3; url= daftar.php'/> ";
                }
            }else{
              // Jika gambar gagal diupload, Lakukan :
              echo "Sorry, there's a problem while uploading the file.";
              echo "<br><meta http-equiv='refresh' content='5; URL=daftar.php'> You will be redirected to the form in 5 seconds";
            }
          }else{
            // Jika ukuran file lebih dari 1MB, lakukan :
            echo "Sorry, the file size is not allowed to more than 1,5mb";
            echo "<br><meta http-equiv='refresh' content='5; URL=daftar.php'> You will be redirected to the form in 5 seconds";
          }
        }else{
          // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
          echo "Sorry, the image format should be JPG/PNG.";
          echo "<br><meta http-equiv='refresh' content='5; URL=daftar.php'> You will be redirected to the form in 5 seconds";
        }

    };




    //kalau update
    if(isset($_POST['update'])){
      $id = $_POST['id'];
      $alamat = $_POST['alamat'];
      $telepon = $_POST['telepon'];
      $ayahpendidikan = $_POST['ayahpendidikan'];
        $ayahpekerjaan = $_POST['ayahpekerjaan'];
        $ayahpenghasilan = $_POST['ayahpenghasilan'];
        $ayahtelepon = $_POST['ayahtelepon'];
      $ibupendidikan = $_POST['ibupendidikan'];
        $ibupekerjaan = $_POST['ibupekerjaan'];
        $ibupenghasilan = $_POST['ibupenghasilan'];
        $ibutelepon = $_POST['ibutelepon'];

      $walinik = $_POST['walinik'];
        $walinama = $_POST['walinama'];
        $walipekerjaan = $_POST['walipekerjaan'];
        $walitelepon = $_POST['walitelepon'];

    $update = mysqli_query($conn,"update userdata
    set alamat='$alamat', telepon='$telepon', ayahpendidikan='$ayahpendidikan', ayahpenghasilan='$ayahpenghasilan', ayahpekerjaan='$ayahpekerjaan',
    ayahtelepon='$ayahtelepon', ibupendidikan='$ibupendidikan', ibupekerjaan='$ibupekerjaan', ibupenghasilan='$ibupenghasilan', ibutelepon='$ibutelepon',
    walinik='$walinik', walinama='$walinama', walipekerjaan='$walipekerjaan', walitelepon='$walitelepon' where userid='$id'");

    if($update){ 

      //berhasil bikin
      echo " <div class='alert alert-success'>
              Berhasil submit data.
          </div>
          <meta http-equiv='refresh' content='1; url= mydata.php'/>  ";  

    }else{

      echo "<div class='alert alert-warning'>
              Gagal submit data. Silakan coba lagi nanti.
          </div>
          <meta http-equiv='refresh' content='3; url= mydata.php'/> ";
      }

    };



    
//get timezone jkt
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d"); //now

    //kalau konfirmasi
    if(isset($_POST['ok'])){
      $id = $_POST['id'];
      $updateaja = mysqli_query($conn,"update userdata set status='Verified', tglkonfirmasi='$today' where userid='$id'");

      if($updateaja){
        //berhasil bikin
          echo " <div class='alert alert-success'>
          Berhasil submit data.
      </div>
      <meta http-equiv='refresh' content='1; url= mydata.php'/>  ";  
      } else {
        echo "<div class='alert alert-warning'>
              Gagal submit data. Silakan coba lagi nanti.
          </div>
          <meta http-equiv='refresh' content='3; url= mydata.php'/> ";
      }
    };

?>