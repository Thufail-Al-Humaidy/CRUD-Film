<?php
require "function.php";

$id = $_GET["id"];
$type = $_GET["type"];

// Panggil fungsi delete
$notif = deleteData($type, $id);

// notif kalo dah keapus
if ($notif > 0) {
    echo "
    <script>
    alert('Data berhasil dihapus 😉');
    document.location.href = 'index.php';
    </script>";
} else {
    echo "
    <script>
    alert('Data gagal dihapus 😫');
    document.location.href = 'index.php';
    </script>";
}
