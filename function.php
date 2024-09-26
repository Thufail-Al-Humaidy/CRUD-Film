<?php

use LDAP\Result;

$server = "localhost";
$user = "root";
$pass = "";
$database = "mgmt_film";

// Inisialisasi koneksi
$conn = mysqli_connect($server, $user, $pass, $database);

// pengecekan koneksi
if (!$conn) {
    echo "Gagal terhubung ke database: " . mysqli_connect_error();
}
// fungsi untuk mengambil data

function getdata($table)
{
    global $conn;
    $table = mysqli_query($conn, "SELECT * FROM $table");
    $rows = [];
    while ($row = mysqli_fetch_assoc($table)) {
        $rows[] = $row;
    }
    return $rows;
}
// function buat nambahin data
function insertData($table, $data)
{
    global $conn;

    // insertdata film
    if ($table == "FILMS") {
        $judul = $data["judul"];
        $genre = $data["genre"];
        $durasi = $data["durasi"];
        $sutradara = $data["sutradara"];
        $image = $data["image"];
        $table = "INSERT INTO FILMS VALUES (null, '$judul', '$genre', '$durasi', '$sutradara','$image')";
    } elseif ($table == "JADWALS") {
        $image = $data["image"];
        $film = $data["film"];
        $tanggal = $data["tanggal"];
        $lokasi = $data["lokasi"];
        $table = "INSERT INTO JADWALS VALUE (null, '$image', '$film', '$tanggal', '$lokasi')";
    } elseif ($table == "TIKETS") {
        $image = $data['image'];
        $film = $data['film'];
        $harga = $data['harga'];
        $jumlahtiket = $data['jumlahtiket'];
        $table = "INSERT INTO TIKETS VALUE (null, '$image', '$film', '$harga', '$jumlahtiket')";
    }

    mysqli_query($conn, $table);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
        alert ('yeey😁 data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
        alert ('yaah data gagal ditambahkan');
        document.location.href = 'index.php';
        </script>";
    }
}
// function buat nampilin data
function showData($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// function buat edit data
function updateData($table, $data, $id)
{
    global $conn;
    // $query ="";
    if ($table == "FILMS") {
        $judul = $data["judul"];
        $genre = $data["genre"];
        $durasi = $data["durasi"];
        $sutradara = $data["sutradara"];
        $image = $data["image"];
        $query = "UPDATE FILMS SET judul = '$judul', genre = '$genre', durasi = '$durasi', sutradara = '$sutradara', image = '$image' WHERE id = $id";
    } elseif ($table == "JADWALS") {
        $image = $data["image"];
        $film = $data["film"];
        $tanggal = $data["tanggal"];
        $lokasi = $data["lokasi"];
        $query = "UPDATE JADWALS SET image = '$image', film = '$film', tanggal = '$tanggal', lokasi = '$lokasi' WHERE id = $id";
    } elseif ($table == "TIKETS") {
        $image = $data["image"];
        $film = $data["film"];
        $harga = $data["harga"];
        $jumlahtiket = $data["jumlahtiket"];
        $query = "UPDATE TIKETS SET image = '$image', film = '$film', harga = '$harga', jumlahtiket = '$jumlahtiket' WHERE id = $id";
    }
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// function buat apus data
function deleteData($type, $id)
{
    global $conn;
    $table = "";

    // jenis data yang mau diapus
    if ($type == "film") {
        $table = "films";
    } elseif ($type == "jadwal") {
        $table = "jadwals";
    } elseif ($type == "tiket") {
        $table = "tikets";
    } else {
        return false;
    }

    // query buat apus data
    $query = "DELETE FROM $table WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



// function insertDataFilms($data)
// {
//     global $conn;
//     $judul = $data["judul"];
//     $genre = $data["genre"];
//     $durasi = $data["durasi"];
//     $sutradara = $data["sutradara"];
//     $image = $data["image"];

//     $query = "INSERT INTO FILMS VALUES (null, '$judul', '$genre', '$durasi', '$sutradara','$image')";

//     mysqli_query($conn, $query);

//     if (mysqli_affected_rows($conn) > 0) {
//         echo "<script> alert('data berhasil ditambahkan')</script>";
//     } else {
//         echo "<script> alert ('data gagal ditambahkan')</script>";
//     }
// }
// fungsi untuk edit data
// function showDataFilms($id)
// {
//     global $conn;
//     $query = "SELECT * FROM FILMS WHERE id = $id";
//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     return $rows;
// }
// function updateDataFilms($data, $id)
// {
//     global $conn;
//     $judul = $data["judul"];
//     $genre = $data["genre"];
//     $durasi = $data["durasi"];
//     $sutradara = $data["sutradara"];
//     $image = $data["image"];

//     $query = "UPDATE FILMS SET judul = '$judul', genre = '$genre', durasi = '$durasi', sutradara = '$sutradara', image = '$image' WHERE id = $id";

//     mysqli_query($conn, $query);
//     return mysqli_affected_rows($conn);
// }

// fungsi jadwal tayang
// function insertJadwalTayang($datatayang)
// {
//     global $conn;
//     $image = $datatayang["image"];
//     $film = $datatayang["film"];
//     $tanggal = $datatayang["tanggal"];
//     $lokasi = $datatayang["lokasi"];

//     $query = "INSERT INTO JADWALS VALUE (null, '$image', '$film', '$tanggal', '$lokasi')";
//     mysqli_query($conn, $query);

//     if (mysqli_affected_rows($conn) > 0) {
//         echo "<script>alert ('data berasil di tambahkan')</script>";
//     } else {
//         echo "<script>alert ('data gagal di tambahkan')</script>";
//     }
// }

// fungsi edit data jadwa
// function showDataJadwal($id)
// {
//     global $conn;
//     $query = "SELECT * FROM JADWALS WHERE id = $id";
//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     return $rows;
// }

// function updateJadwalTayang($datatayang, $id)
// {
//     global $conn;
//     $image = $datatayang["image"];
//     $film = $datatayang["film"];
//     $tanggal = $datatayang["tanggal"];
//     $lokasi = $datatayang["lokasi"];

//     $query = "UPDATE JADWALS SET image = '$image', film = '$film', tanggal = '$tanggal', lokasi = '$lokasi' WHERE id = $id";

//     mysqli_query($conn, $query);
//     return mysqli_affected_rows($conn);
// }

// fungsi data tiket
// function insertDataTiket($datatiket)
// {
//     global $conn;
//     $image = $datatiket['image'];
//     $film = $datatiket['film'];
//     $harga = $datatiket['harga'];
//     $jumlahtiket = $datatiket['jumlahtiket'];

//     $query = "INSERT INTO TIKETS VALUE (null, '$image', '$film', '$harga', '$jumlahtiket')";
//     mysqli_query($conn, $query);

//     if (mysqli_affected_rows($conn) > 0) {
//         echo "<script>alert('yeyyyy😉 tiket berhasil ditambahkan')</script>";
//     } else {
//         echo "<script>alert('yahhh😫 tiket gagal ditambahkan')</script>";
//     }
// }
// fungsi data tiket
// function showDataTiket($id)
// {
//     global $conn;
//     $query = "SELECT * FROM TIKETS WHERE id = $id";
//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     return $rows;
// }
// function updateTiket($datatiket, $id)
// {
//     global $conn;
//     $image = $datatiket["image"];
//     $film = $datatiket["film"];
//     $harga = $datatiket["harga"];
//     $jumlahtiket = $datatiket["jumlahtiket"];

//     $query = "UPDATE TIKETS SET image = '$image', film = '$film', harga = '$harga', jumlahtiket = '$jumlahtiket' WHERE id = $id";

//     mysqli_query($conn, $query);
//     return mysqli_affected_rows($conn);
// }
