<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Pemrograman Berbasis Web II</title>
    
    <style>
      
        body
        {
            font-family: 'Times New Roman', Times, serif;
            background-image: url('1353155.jpeg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #00cccc;
        }
        .container
        {
            display: flex;
            justify-content: space-between;
            width: 80%;
            margin: 100px auto;
            
        }
        form 
        {
            width: 45%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.9);
        }
        label 
        {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"] 
        {
            width: 96%;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        button[type="submit"] 
        {
            width: 100%;
            height: 40px;
            background-color: #333333;
            color: #ff0099;
            padding: 10px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        button[type="submit"]:hover 
        {
            background-color: #ff66ff;
        }
        .result 
        {
            width: 45%;
            background-color: #cccc99;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #660000;
        }
    </style>
</head>
<body>
        <video controls autoplay loop width="600" height="240">
            <source src="shiroko.mp4" type="video/mp4">
        </video>
    <div class="container">
    <!-- Ini adalah form yang nantinya input harga totalnya akan di ambil 
     untuk melakukan perhitungan jika mempunyai member maka akan mendapatkan diskon
     jauh lebih besar -->

        <form action="" method="post">
         <label for="totalBelanja"><b>Total Belanja :</b></label>
         <input type="number" id="totalBelanja" name="totalBelanja" required>
         <label for="Mbr"><b>Masukkan kode unik (Khusus Member)</b></label>
         <input type="text" id="member" name="member">
         <button type="submit" name="submit"><b>Hitung</b></button>
        </form>

<?php
function member($totalBelanja, $member)
{
    if ($member){
    if ($totalBelanja >= 500000) 
    {
      $diskon = 20; //Jika total belanja di atas 500.000 akan mendapatkan discond 10% + 10% = 20%
    } 
    else if ($totalBelanja >= 300000) 
    {
      $diskon = 15; //Jika total belanja di atas 300.000 sampai 500.000 akan mendapatkan discound 10% + 5% = 15%
    } 
    else 
    {
      $diskon = 10; // hanya diskon member dengan total belanja di bawah 300.000 akan mendapatkan 10%
    }
  }
  else 
  {
    // Bukan member
    if ($totalBelanja >= 500000) 
    {
      $diskon = 10; // untuk yang bukan member mendapatkan discond 10% dengan total belanja 500.000
    } 
    else 
    {
      $diskon = 0; //total belanja di bawah 500.000 maka tidak mendapatkan diskon
    }
  }
  return $diskon;
}
//Rumus untuk menghitung total belanja setelah diskon untuk mendapatkan hasil akhir
function Total($totalBelanja, $diskon) 
{
    $totalBayar = $totalBelanja - ($totalBelanja * $diskon / 100);
    return $totalBayar;
}
// Melakukan pengambilan data input dari form untuk di kelolah perhitunggannya
if (isset($_POST['submit'])) 
{
    $totalBelanja = $_POST['totalBelanja']; // mengambil nilai total belanja dari form
    $member = $_POST['member']; // mengambil nilai member dari input form

    $diskon = member($totalBelanja, $member); // menentukan discond yang akan di gunakan
        // melakukan perhitungan dengan function
    $totalBayar = Total($totalBelanja, $diskon);
    
    ?>
    <!-- Untuk menampilkan hasil perhitungan-->
    <div class="result">
         <h2>Hasil Perhitungan</h2>
         <!-- fungsi number_format digunakan untuk memformatnya dalam tampilan uang Rupiah yang menambahakan . dan , -->
         <p>Total Belanja : Rp <?php echo number_format($totalBelanja, 2, ',', '.'); ?></p>
         <p>Diskon : <?php echo $diskon; ?>%</p>
         <!-- fungsi number_format digunakan untuk memformatnya dalam tampilan uang Rupiah yang menambahakan . dan , -->
         <p>Total Bayar: Rp <?php echo number_format($totalBayar, 2, ',', '.'); ?></p>
    </div>
    <?php
    //Nama : Muhreza Baidhowi
    //Kelas : 3p41
    //Nim : 23.240.0001
}
?>
        
</body>
</html>