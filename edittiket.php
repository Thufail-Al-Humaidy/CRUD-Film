<?php
require "function.php";
$table = "TIKETS";
$id = $_GET["id"];
$tiket = showData($table, $id);

if (isset($_POST["submit"])) {
    $data = $_POST;
    if (updateData($table, $data, $id) > 0) {
        echo "
        <script>
        alert ('yeey😁 tiket berhasil diubah');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
        alert ('yaah😫 tiket gagal diubah');
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
    <title>Edit Data Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .form-input {
            border-color: #4a5568;
            /* Slightly lighter border for better contrast */
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-input:focus {
            border-color: #68d391;
            /* Bright green border */
            outline: none;
            box-shadow: 0 0 0 3px rgba(72, 187, 120, 0.4);
            /* Enhanced shadow on focus */
        }

        .btn-submit {
            background-color: #68d391;
            /* Vibrant green background */
            color: white;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #48bb78;
            /* Darker green on hover */
            transform: translateY(-2px);
            /* Slight lift on hover */
        }

        .btn-submit:active {
            transform: translateY(0);
            /* Remove lift effect on click */
        }
    </style>
</head>

<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">
    <div class="container bg-gray-800 p-10 rounded-xl shadow-2xl w-full max-w-md transition-all duration-300 transform hover:scale-105">
        <h1 class="text-4xl font-extrabold text-green-400 mb-6 text-center">Edit Data Tiket</h1>
        <form action="" method="post">
            <div class="mb-6">
                <label for="film" class="block text-sm font-medium text-gray-300">Nama Film</label>
                <input type="text" name="film" id="film" value="<?= $tiket[0]['film'] ?>" class="form-input mt-2 block w-full px-4 py-3 rounded-lg text-green-500 bg-gray-700 border border-gray-600 transition-all duration-300">
            </div>
            <div class="mb-6">
                <label for="harga" class="block text-sm font-medium text-gray-300">Harga Tiket</label>
                <input type="text" name="harga" id="harga" value="<?= $tiket[0]['harga'] ?>" class="form-input mt-2 block w-full px-4 py-3 rounded-lg text-green-500 bg-gray-700 border border-gray-600 transition-all duration-300">
            </div>
            <div class="mb-6">
                <label for="jumlahtiket" class="block text-sm font-medium text-gray-300">Jumlah Tiket</label>
                <input type="text" name="jumlahtiket" id="jumlahtiket" value="<?= $tiket[0]['jumlahtiket'] ?>" class="form-input mt-2 block w-full px-4 py-3 rounded-lg text-green-500 bg-gray-700 border border-gray-600 transition-all duration-300">
            </div>
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-300">URL Gambar</label>
                <input type="text" name="image" id="image" value="<?= $tiket[0]['image'] ?>" class="form-input mt-2 block w-full px-4 py-3 rounded-lg text-green-500 bg-gray-700 border border-gray-600 transition-all duration-300">
            </div>
            <div class="mt-8">
                <button type="submit" name="submit" class="btn-submit w-full py-3 px-5 rounded-lg text-center font-bold text-lg transition-all duration-300">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>

</html>