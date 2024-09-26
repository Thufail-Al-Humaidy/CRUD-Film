<?php
require "function.php";

$films = getdata("films");
$jadwals = getdata("jadwals");
$tikets = getdata("tikets");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film List, Jadwal Tayang, & Tiket</title>
    <link rel="stylesheet" href="src/output.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body>
    <!-- tombol create -->
    <div class="container mx-auto mt-10 flex gap-5 items-center justify-between">
        <button class="btn">
            <a href="createfilm.php">Tambah Film</a>
        </button>
        <button class="btn">
            <a href="createjadwal.php">Tambah Jadwal</a>
        </button>
        <button class="btn">
            <a href="createtiket.php">Tambah Tiket</a>
        </button>
    </div>
    <!-- Film List Section -->
    <section>
        <div class="container mx-auto mt-10">
            <div class="flex justify-between">
                <h1>Film List</h1>
            </div>

            <div class="film-list">
                <?= $no = 1; ?>
                <?php foreach ($films as $film) : ?>
                    <div class="film-item">
                        <img src="img/<?= $film['image'] ?>.png" alt="Poster">
                        <div class="film-info">
                            <h2><?= $film['judul'] ?></h2>
                            <p><?= $no ?></p>
                            <p>Genre: <?= $film['genre'] ?></p>
                            <p>Durasi: <?= $film['durasi'] ?></p>
                            <p>Sutradara: <?= $film['sutradara'] ?></p>
                        </div>
                        <div class="ml-auto space-x-2">
                            <a href="edit.php?id=<?= $film['id'] ?>" class="btn">Edit</a>
                            <!-- <a href="alledit.php?id=<?= $film['id'] ?>&type=film" class="btn">Edit</a> -->
                            <a href="delete.php?id=<?= $film['id'] ?>&type=film" onclick="return confirm('Yakin nih?')" class="btn btn-red">Delete</a>
                        </div>
                    </div>
                    <?= $no++ ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Jadwal Tayang Section -->
    <section>
        <div class="container mx-auto mt-10">
            <h1>Jadwal Tayang</h1>
            <div class="timeline">
                <?php foreach ($jadwals as $jadwal) : ?>
                    <div class="timeline-item">
                        <h2><?= $jadwal['film'] ?></h2>
                        <img src="img/<?= $jadwal['image'] ?>.png" alt="Poster">
                        <p>Tanggal: <?= $jadwal['tanggal'] ?></p>
                        <p>Lokasi: <?= $jadwal['lokasi'] ?></p>
                        <div class="mt-2 space-x-2">
                            <a href="editjadwal.php?id=<?= $jadwal['id'] ?>" class="btn">Edit</a>
                            <!-- <a href="alledit.php?id=<?= $jadwal['id'] ?>&type=jadwal" class="btn">Edit</a> -->
                            <a href="delete.php?id=<?= $jadwal['id'] ?>&type=jadwal" onclick="return confirm('Yakin nih?')" class="btn btn-red">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Tiket Film Section -->
    <section>
        <div class="container mx-auto mt-10">
            <h1>Tiket Film</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($tikets as $tiket) : ?>
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="img/<?= $tiket['image'] ?>.png" alt="Poster">
                                <div class="p-4">
                                    <h2><?= $tiket['film'] ?></h2>
                                    <p>Harga: Rp<?= $tiket['harga'] ?></p>
                                    <p>Jumlah Tiket: <?= $tiket['jumlahtiket'] ?></p>
                                </div>
                            </div>
                            <div class="flip-card-back">
                                <h2>Informasi Tiket</h2>
                                <p>Pesan sekarang untuk mendapatkan tiket!</p>
                                <a href="#" class="btn mt-4">Pesan Sekarang☝️☝️☝️</a>
                                <a href="edittiket.php?id=<?= $tiket['id'] ?>" class="btn mt-2">Edit Tiket</a>
                                <!-- <a href="alledit.php?id=<?= $tiket['id'] ?>&type=tiket" class="btn mt-2">Edit Tiket</a> -->
                                <a href="delete.php?id=<?= $tiket['id'] ?>&type=tiket" onclick="return confirm('Yakin nih?')" class="btn btn-red mt-2">Delete</a>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <div class="mb-10"></div>
</body>

</html>