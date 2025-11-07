<?php

if (isset($_POST['editPetugas'])) {
    $id_petugas = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];

        $query = mysqli_query($connect, "UPDATE petugas SET 
        nama_petugas = '$nama_petugas',
        username = '$username',
        password = MD5('$password'),
        telp = '$telp',
        level = '$level'
        WHERE id_petugas = '$id_petugas'") OR DIE (mysqli_error($connect));
        if ($query == TRUE){
            echo '<script> alert ("Data berhasil diubah");
            window.location.href="petugas.php";</script>'; exit
        ;
    }
        else {
            echo '<script> alert ("Error!");
            window.location.href="petugas.php";</script>';
}
}

?>