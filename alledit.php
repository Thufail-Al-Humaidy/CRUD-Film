<?php
require "function.php";

// Ambil ID dan tipe dari URL
$id = $_GET["id"];
$type = $_GET["type"];

// Tentukan tabel berdasarkan tipe
if ($type == "film") {
    $table = "FILMS"; // Tabel untuk film
} elseif ($type == "jadwal") {
    $table = "JADWALS"; // Tabel untuk jadwal
} elseif ($type == "tiket") {
    $table = "TIKETS"; // Tabel untuk tiket
}

// Ambil data dari tabel yang sesuai berdasarkan ID
$data = showData($table, $id);

// Proses jika form disubmit
if (isset($_POST["submit"])) {
    $postData = $_POST;

    // Gunakan fungsi umum untuk update data
    if (updateData($table, $postData, $id) > 0) {
        echo "<script>
        alert('yey😉😉 Data $type berhasil diubah!');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('yahh😫😫 Data $type gagal diubah!');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4 py-10">
        <div class="bg-gray-800 p-8 rounded-lg shadow-md max-w-lg w-full mx-auto">
            <h1 class="text-2xl font-bold text-green-500 text-center mb-6">Edit Data <?= ucfirst($type) ?></h1>
            <form action="" method="post" class="space-y-5">
                <?php if ($type == "film"): ?>
                    <div>
                        <label for="judul" class="block text-sm font-semibold text-green-400">Judul Film</label>
                        <input type="text" value="<?= $data[0]['judul'] ?>" name="judul" id="judul" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label for="genre" class="block text-sm font-semibold text-green-400">Genre Film</label>
                        <input type="text" value="<?= $data[0]['genre'] ?>" name="genre" id="genre" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label for="durasi" class="block text-sm font-semibold text-green-400">Durasi Film</label>
                        <input type="text" value="<?= $data[0]['durasi'] ?>" name="durasi" id="durasi" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label for="sutradara" class="block text-sm font-semibold text-green-400">Sutradara</label>
                        <input type="text" value="<?= $data[0]['sutradara'] ?>" name="sutradara" id="sutradara" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label for="image" class="block text-sm font-semibold text-green-400">Image</label>
                        <input type="text" value="<?= $data[0]['image'] ?>" name="image" id="image" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                <?php elseif ($type == "jadwal"): ?>
                    <div>
                        <label for="film" class="block text-sm font-semibold text-green-400">Judul Film</label>
                        <input type="text" value="<?= $data[0]['film'] ?>" name="film" id="film" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label for="tanggal" class="block text-sm font-semibold text-green-400">Tanggal Tayang</label>
                        <input type="text" value="<?= $data[0]['tanggal'] ?>" name="tanggal" id="tanggal" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label for="lokasi" class="block text-sm font-semibold text-green-400">Lokasi</label>
                        <input type="text" value="<?= $data[0]['lokasi'] ?>" name="lokasi" id="lokasi" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label for="image" class="block text-sm font-semibold text-green-400">Image</label>
                        <input type="text" value="<?= $data[0]['image'] ?>" name="image" id="image" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                <?php elseif ($type == "tiket"): ?>
                    <div>
                        <label for="film" class="block text-sm font-semibold text-green-400">Judul Film</label>
                        <input type="text" value="<?= $data[0]['film'] ?>" name="film" id="film" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label for="harga" class="block text-sm font-semibold text-green-400">Harga Tiket</label>
                        <input type="text" value="<?= $data[0]['harga'] ?>" name="harga" id="harga" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label for="jumlahtiket" class="block text-sm font-semibold text-green-400">Jumlah Tiket</label>
                        <input type="text" value="<?= $data[0]['jumlahtiket'] ?>" name="jumlahtiket" id="jumlahtiket" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label for="image" class="block text-sm font-semibold text-green-400">Image</label>
                        <input type="text" value="<?= $data[0]['image'] ?>" name="image" id="image" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                    </div>
                <?php endif; ?>
                <div class="text-center">
                    <button type="submit" name="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition-colors duration-300">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>