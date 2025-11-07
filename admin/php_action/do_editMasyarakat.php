<?php

if (isset($_POST['editMasyarakat'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];

        $query = mysqli_query($connect, "UPDATE masyarakat SET 
        nama = '$nama',
        username = '$username',
        password = MD5('$password'),
        telp = '$telp'
        WHERE nik = '$nik'") OR DIE (mysqli_error($connect));
        if ($query == TRUE){
            echo '<script> alert ("Data berhasil diubah");
            window.location.href="masyarakat.php";</script>'; exit
        ;
    }
        else {
            echo '<script> alert ("Error!");
            window.location.href="masyarakat.php";</script>';
}
}

?>