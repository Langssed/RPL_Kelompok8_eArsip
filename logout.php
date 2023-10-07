<?php
    session_start();
    unset($_SESSION['id_user']);
    unset($_SESSION['username']);

    session_destroy();
    echo "<script>
            alert('Anda telah keluar dari halaman admin')
            document.location='index.php';
        </script>";
?>