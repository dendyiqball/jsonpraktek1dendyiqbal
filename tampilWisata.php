<!DOCTYPE html>
<html>
<head>
    <title>Data Wisata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .judul {
            background-color: yellow;
            padding: 10px;
            font-weight: bold;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="judul">Hasil decode data JSON diatas tampilkan ke dalam bentuk HTML Tabel seperti berikut:</div>

<?php
// Koneksi ke database
$connect = mysqli_connect("localhost", "root", "", "json");

// Cek koneksi
if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari tabel wisata
$sql = "SELECT * FROM wisata";
$result = mysqli_query($connect, $sql);

// Buat array untuk data JSON
$json_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
}

// Tampilkan dalam bentuk HTML Tabel
echo "<table>";
echo "<tr><th>KOTA</th><th>LANDMARK</th><th>TARIF</th></tr>";

foreach ($json_array as $data) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($data['kota']) . "</td>";
    echo "<td>" . htmlspecialchars($data['landmark']) . "</td>";
    echo "<td>" . htmlspecialchars($data['tarif']) . "</td>";
    echo "</tr>";
}

echo "</table>";

// Tutup koneksi
mysqli_close($connect);
?>

</body>
</html>
