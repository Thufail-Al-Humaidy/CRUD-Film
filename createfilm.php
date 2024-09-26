<?php
require "function.php";

if (isset($_POST["submit"])) {
    insertData("FILMS",$_POST);
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

<body class="bg-gradient-to-r from-gray-900 via-gray-800 to-black text-white min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4 py-10">
        <div class="bg-gray-800/80 p-10 rounded-xl shadow-xl max-w-lg w-full mx-auto backdrop-blur-md">
            <h1 class="text-3xl font-extrabold text-green-400 text-center mb-8">Tambah Data Film</h1>
            <form action="" method="post" class="space-y-6">
                <div>
                    <label for="judul" class="block text-sm font-semibold text-green-300">Judul Film</label>
                    <input type="text" name="judul" id="judul" placeholder="Masukkan judul film" class="w-full mt-2 p-3 bg-gray-700 text-green-400 border border-green-500 rounded-lg focus:ring-2 focus:ring-green-500 outline-none transition-all duration-300">
                </div>
                <div>
                    <label for="genre" class="block text-sm font-semibold text-green-300">Genre Film</label>
                    <input type="text" name="genre" id="genre" placeholder="Masukkan genre film" class="w-full mt-2 p-3 bg-gray-700 text-green-400 border border-green-500 rounded-lg focus:ring-2 focus:ring-green-500 outline-none transition-all duration-300">
                </div>
                <div>
                    <label for="durasi" class="block text-sm font-semibold text-green-300">Durasi Film</label>
                    <input type="text" name="durasi" id="durasi" placeholder="Masukkan durasi film (ex: 120 menit)" class="w-full mt-2 p-3 bg-gray-700 text-green-400 border border-green-500 rounded-lg focus:ring-2 focus:ring-green-500 outline-none transition-all duration-300">
                </div>
                <div>
                    <label for="sutradara" class="block text-sm font-semibold text-green-300">Sutradara</label>
                    <input type="text" name="sutradara" id="sutradara" placeholder="Masukkan nama sutradara" class="w-full mt-2 p-3 bg-gray-700 text-green-400 border border-green-500 rounded-lg focus:ring-2 focus:ring-green-500 outline-none transition-all duration-300">
                </div>
                <div>
                    <label for="image" class="block text-sm font-semibold text-green-300">Image</label>
                    <input type="text" name="image" id="image" placeholder="Masukkan URL gambar" class="w-full mt-2 p-3 bg-gray-700 text-green-400 border border-green-500 rounded-lg focus:ring-2 focus:ring-green-500 outline-none transition-all duration-300">
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="bg-gradient-to-r from-green-400 to-green-500 text-white py-2 px-6 rounded-lg shadow-lg hover:from-green-500 hover:to-green-600 transition-transform transform hover:scale-105 duration-300">
                        Kirim Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>