<?php
require "function.php";
$table = "FILMS";
$id = $_GET["id"];
$film = showData($table, $id);


if (isset($_POST["submit"])) {
    $data = $_POST;
    if (updateData($table, $data, $id) > 0) {
        echo "
        <script>
        alert ('yeey😁 data berhasil diubah');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
        alert ('yaah😫 data gagal diubah');
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
    <title>Tambah Data Film</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4 py-10">
        <div class="bg-gray-800 p-8 rounded-lg shadow-md max-w-lg w-full mx-auto">
            <h1 class="text-2xl font-bold text-green-500 text-center mb-6">Tambah Data Film</h1>
            <form action="" method="post" class="space-y-5">
                <div>
                    <label for="judul" class="block text-sm font-semibold text-green-400">Judul Film</label>
                    <input type="text" value="<?= $film[0]['judul'] ?>" name="judul" id="judul" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                </div>
                <div>
                    <label for="genre" class="block text-sm font-semibold text-green-400">Genre Film</label>
                    <input type="text" value="<?= $film[0]['genre'] ?>" name="genre" id="genre" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                </div>
                <div>
                    <label for="durasi" class="block text-sm font-semibold text-green-400">Durasi Film</label>
                    <input type="text" value="<?= $film[0]['durasi'] ?>" name="durasi" id="durasi" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                </div>
                <div>
                    <label for="sutradara" class="block text-sm font-semibold text-green-400">Sutradara</label>
                    <input type="text" value="<?= $film[0]['sutradara'] ?>" name="sutradara" id="sutradara" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                </div>
                <div>
                    <label for="image" class="block text-sm font-semibold text-green-400">Image</label>
                    <input type="text" value="<?= $film[0]['image'] ?>" name="image" id="image" class="w-full mt-1 p-2 bg-gray-700 text-green-400 border border-green-500 rounded-md focus:ring focus:ring-green-500 outline-none">
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition-colors duration-300">
                        Kirim Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>