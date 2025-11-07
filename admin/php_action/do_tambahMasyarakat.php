<?php

if (isset($_POST['tambahMasyarakat'])) {
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $telp = $_POST['telp'];

  if ($password === $confirm_password) {
    $checkusername = mysqli_query($connect, "SELECT username FROM masyarakat WHERE username='$username' ");
    $checknik = mysqli_query($connect, "SELECT nik FROM masyarakat WHERE nik='$nik' ");
    if (mysqli_num_rows($checkusername) > 0) {
      echo "<script>window.alert('Username sudah ada mohon coba lagi');
      window.location.href='masyarakat.php';</script>";
    } else if (mysqli_num_rows($checknik) > 0) {
      echo "<script>window.alert('nik sudah sudah terdaftar');
      window.location.href='masyarakat.php';</script>";
    } else {
      $result = mysqli_query($connect, "INSERT INTO Masyarakat (nik, nama, username, password, telp) VALUES('$nik', '$nama', '$username', MD5('$password'), '$telp')");
      echo "<script>window.alert('Data berhasil ditambahkan');
      window.location.href='masyarakat.php';</script>";
    }
  } else {
    echo '<script>alert ("Password tidak cocok")</script>';
  }
}
