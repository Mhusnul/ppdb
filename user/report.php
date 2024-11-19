<?php
include('../dbconnect.php');
$u = $_GET['u'];
$cekdulu = mysqli_query($conn,"select * from userdata where userdataid='$u'");
    $ambil = mysqli_fetch_array($cekdulu);
    


?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CETAK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/stylekop.css">
    <script>
        window.print();
    </script>
</head>
<body>

    <section class="content">
        <div class="page">
            <div class="kop-surat">
                <div class="kop">

                    <img src="../assets/img/logo.png " style="background-size: cover; background-position: center; background-repeat: no-repeat; margin-right: 30 px ; height: 73px; width: 73px;"  alt="logo">
                    <div class="surat" >
                        <h1 class="w">SEKOLAH DASAR NEGRI CIJAMBU </h1>
                        <H1 class="w">KOTA SUKABUMI</H1>
                        <p class="e ">Jl. Cikiray No. 277 Ds. Sukasari Kec. Cisaat <br>Kab. Sukabumi 43152, Sukasari, Kec. Cisaat, Kab. Sukabumi Prov. Jawa Barat 
                        </p>
                        <hr width="100%">
                        <br>
                        <br>

                        <table class="tabel-cetak" border="0">
                            <h1 class="w">FORMULIR PENDAFTARAN</h1>
                            <br>
                            <br>
                            <label><b>Data Peserta</b></label>
                            <tr>
                            <br>
                            <td><img src="<?php echo $ambil['foto']?>" width="50%"></td>  
                            </tr>           
                            <br>      
                            <tr>
                                <td>NIK</td>
                                <td> : <?php echo $ambil['nik']?> </td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td> : <?php echo $ambil['namalengkap']?> </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td> : <?php echo $ambil['jeniskelamin']?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td> : <?php echo $ambil['tanggallahir']?></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td> : <?php echo $ambil['tempatlahir']?> </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td> : <?php echo $ambil['alamat']?></td>
                            </tr>
                            <tr>
                                <td>Agama</td>

                                <td> : <?php echo $ambil['agama']?></td>
                            </tr>
                            <tr>
                                <td>Telpon</td>
                                <td> : <?php echo $ambil['telepon']?></td>
                            </tr>
                            

                        </table>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <tr>
                            <p style="text-align: right;">Sukabumi,...,........,....</p>
                            <br>
                            <p style="text-align: right;">Orang tua/wali</p>
                            <br>
                            <br>
                            <br>
                            <p style="text-align: right;">(....................)</p>
                            </tr>
                            <br>
                            <br>
                            <tr>
                                <td><b>Catatan :</b></td> <br>
                                <td><b>1. Mengumpulkan fotocopy akta kelahiran ( 1 Lembar)</b></td> <br>
                                <td><b>2. Mengumpulkan Foto Copy KK (1 Lembar)</b></td> <br>
                                <td><b>3. Foto Copy KTP Orang tua</b></td><br>
                                <td><b>4. Foto Copy KIP, PKH ( jika ada )</b></td> <br>
                                <td><b>5. Ijazah Tk (jika ada)</b></td>
                            </tr>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>