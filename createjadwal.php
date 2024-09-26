<?php
require "function.php";

if (isset($_POST["submit"])) {
    insertData("JADWALS",$_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Tayang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-300">
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold text-green-400 mb-8 text-center animate-pulse">Tambahkan Jadwal Tayang</h1>
        <form action="" method="post" class="space-y-6 max-w-md mx-auto p-8 bg-gray-800 rounded-lg shadow-lg animate-fade-in">
            <div class="relative">
                <label for="film" class="block text-green-400 mb-2">Judul Film</label>
                <input type="text" name="film" id="film" required class="w-full p-3 bg-gray-700 rounded-lg focus:ring-2 focus:ring-green-500 transition-transform transform focus:scale-105">
            </div>
            <div class="relative">
                <label for="image" class="block text-green-400 mb-2">Image</label>
                <input type="text" name="image" id="image" required class="w-full p-3 bg-gray-700 rounded-lg focus:ring-2 focus:ring-green-500 transition-transform transform focus:scale-105">
            </div>
            <div class="relative">
                <label for="tanggal" class="block text-green-400 mb-2">Tanggal</label>
                <input type="datetime" name="tanggal" id="tanggal" required class="w-full p-3 bg-gray-700 rounded-lg focus:ring-2 focus:ring-green-500 transition-transform transform focus:scale-105">
            </div>
            <div class="relative">
                <label for="lokasi" class="block text-green-400 mb-2">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" required class="w-full p-3 bg-gray-700 rounded-lg focus:ring-2 focus:ring-green-500 transition-transform transform focus:scale-105">
            </div>
            <button type="submit" name="submit" class="w-full py-3 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-500 transition-transform transform hover:scale-105">
                Submit
            </button>
        </form>
    </div>

    <script>
        // Animasi Fade In
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.animate-fade-in').classList.add('opacity-0');
            setTimeout(() => {
                document.querySelector('.animate-fade-in').classList.add('transition-opacity', 'opacity-100');
            }, 200);
        });
    </script>
</body>

</html>