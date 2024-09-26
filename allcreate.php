<?php
require "function.php";

if (isset($_POST["submit_film"])) {
    insertData("FILMS", $_POST);
} elseif (isset($_POST["submit_jadwal"])) {
    insertData("JADWALS", $_POST);
} elseif (isset($_POST["submit_tiket"])) {
    insertData("TIKETS", $_POST);
}

// Cek jenis form yang disubmit
if (isset($_POST["submit_film"])) {
    $table = "FILMS";
    $successMessage = "Data film berhasil ditambahkan";
    $errorMessage = "Gagal menambahkan data film";
} elseif (isset($_POST["submit_jadwal"])) {
    $table = "JADWALS";
    $successMessage = "Data jadwal berhasil ditambahkan";
    $errorMessage = "Gagal menambahkan data jadwal";
} elseif (isset($_POST["submit_tiket"])) {
    $table = "TIKETS";
    $successMessage = "Data tiket berhasil ditambahkan";
    $errorMessage = "Gagal menambahkan data tiket";
}

// Jika table sudah di-set, lanjutkan insert data
if (isset($table)) {
    if (insertData($table, $_POST)) {
        echo "
        <script>
            alert('$successMessage');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('$errorMessage');
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
    <title>Create Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for smooth transitions and interactive elements */
        .form-input:focus {
            outline: none;
            border-color: #38bdf8;
            box-shadow: 0 0 10px rgba(56, 189, 248, 0.5);
        }

        .btn-tab:hover {
            background-color: #38bdf8;
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
        }

        .btn-submit:hover {
            background-color: #16a34a;
            box-shadow: 0 4px 20px rgba(22, 163, 74, 0.5);
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white min-h-screen flex items-center justify-center">
    <div class="container bg-gray-800 p-10 rounded-xl shadow-2xl w-full max-w-lg">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 mb-8 text-center">
            Tambah Data
        </h1>

        <!-- Navigasi antara form -->
        <div class="flex justify-center mb-8 space-x-4">
            <button onclick="showForm('film')" class="btn-tab py-2 px-6 rounded-lg text-white bg-gray-700 <?= $form === 'film' ? 'bg-gradient-to-r from-green-400 to-blue-500' : ''; ?>">
                Film
            </button>
            <button onclick="showForm('jadwal')" class="btn-tab py-2 px-6 rounded-lg text-white bg-gray-700 <?= $form === 'jadwal' ? 'bg-gradient-to-r from-green-400 to-blue-500' : ''; ?>">
                Jadwal
            </button>
            <button onclick="showForm('tiket')" class="btn-tab py-2 px-6 rounded-lg text-white bg-gray-700 <?= $form === 'tiket' ? 'bg-gradient-to-r from-green-400 to-blue-500' : ''; ?>">
                Tiket
            </button>
        </div>

        <!-- Form Tambah Film -->
        <form id="form_film" method="post" class="<?= $form === 'film' ? 'block' : 'hidden'; ?>">
            <div class="mb-6">
                <label for="judul" class="block text-sm font-medium text-gray-300">Judul Film</label>
                <input type="text" name="judul" id="judul" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div class="mb-6">
                <label for="genre" class="block text-sm font-medium text-gray-300">Genre Film</label>
                <input type="text" name="genre" id="genre" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div class="mb-6">
                <label for="durasi" class="block text-sm font-medium text-gray-300">Durasi Film</label>
                <input type="text" name="durasi" id="durasi" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div class="mb-6">
                <label for="sutradara" class="block text-sm font-medium text-gray-300">Sutradara</label>
                <input type="text" name="sutradara" id="sutradara" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-300">Gambar Film</label>
                <input type="text" name="image" id="image" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div>
                <button type="submit" name="submit_film" class="btn-submit w-full py-3 px-6 rounded-lg bg-gradient-to-r from-green-400 to-blue-500 text-white text-lg font-semibold shadow-lg hover:shadow-2xl transition-all">
                    Simpan Film
                </button>
            </div>
        </form>

        <!-- Form Tambah Jadwal -->
        <form id="form_jadwal" method="post" class="<?= $form === 'jadwal' ? 'block' : 'hidden'; ?>">
            <div class="mb-6">
                <label for="film" class="block text-sm font-medium text-gray-300">Judul Film</label>
                <input type="text" name="film" id="film" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-300">Gambar</label>
                <input type="text" name="image" id="image" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div class="mb-6">
                <label for="tanggal" class="block text-sm font-medium text-gray-300">Tanggal Tayang</label>
                <input type="datetime-local" name="tanggal" id="tanggal" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div class="mb-6">
                <label for="lokasi" class="block text-sm font-medium text-gray-300">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div>
                <button type="submit" name="submit_jadwal" class="btn-submit w-full py-3 px-6 rounded-lg bg-gradient-to-r from-green-400 to-blue-500 text-white text-lg font-semibold shadow-lg hover:shadow-2xl transition-all">
                    Simpan Jadwal
                </button>
            </div>
        </form>

        <!-- Form Tambah Tiket -->
        <form id="form_tiket" method="post" class="<?= $form === 'tiket' ? 'block' : 'hidden'; ?>">
            <div class="mb-6">
                <label for="film" class="block text-sm font-medium text-gray-300">Judul Film</label>
                <input type="text" name="film" id="film" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div class="mb-6">
                <label for="harga" class="block text-sm font-medium text-gray-300">Harga Tiket</label>
                <input type="text" name="harga" id="harga" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div class="mb-6">
                <label for="jumlahtiket" class="block text-sm font-medium text-gray-300">Jumlah Tiket</label>
                <input type="text" name="jumlahtiket" id="jumlahtiket" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div class="mb-6">
                <label for="lokasi" class="block text-sm font-medium text-gray-300">Lokasi</label>
                <input type="text" name="lokasi" id="studio" required class="form-input mt-2 block w-full p-3 bg-gray-900 text-white rounded-lg border-2 border-gray-600">
            </div>
            <div>
                <button type="submit" name="submit_tiket" class="btn-submit w-full py-3 px-6 rounded-lg bg-gradient-to-r from-green-400 to-blue-500 text-white text-lg font-semibold shadow-lg hover:shadow-2xl transition-all">
                    Simpan Tiket
                </button>
            </div>
        </form>
    </div>

    <script>
        function showForm(form) {
            document.getElementById('form_film').style.display = 'none';
            document.getElementById('form_jadwal').style.display = 'none';
            document.getElementById('form_tiket').style.display = 'none';

            if (form === 'film') {
                document.getElementById('form_film').style.display = 'block';
            } else if (form === 'jadwal') {
                document.getElementById('form_jadwal').style.display = 'block';
            } else if (form === 'tiket') {
                document.getElementById('form_tiket').style.display = 'block';
            }
        }
    </script>
</body>

</html>