<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css"  />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi HTML ke SQL</title>
    
</head>
<body>
    <div style="text-align: center;">
        <h1>Form Pendataan Siswa</h1>
    </div>

    <!-- Form untuk Tambah/Update Data -->
    <div>
        <form action="connect.php" method="post" style="display: flex; flex-direction: column; gap: 6px;">
            <input type="text" id="Nama" name="Nama" required placeholder="Masukkan Nama">
            <input type="text" id="Kelas" name="Kelas" required placeholder="Masukkan Kelas">
            <input type="text" id="NIM" name="NIM" required  placeholder="Masukkan NIM" minlength="11" maxlength="11">
            <input type="submit" value="submit">
        </form>
    </div>

    <!-- Tabel Data -->
    <div>
        <table>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>NIM</th>
                <th>Action</th>
            </tr>
            <?php
            // Koneksi ke database
            $conn = new mysqli("localhost", "root", "", "db_siswa");
            if ($conn->connect_error) {
                die("Connection Failed: " . $conn->connect_error);
            }

            // Ambil data dari database
            $ambildata = $conn->query("SELECT * FROM siswa");
            while ($tampil = $ambildata->fetch_assoc()) {
                echo "
                <tr onclick='fillForm(" . json_encode($tampil) . ")'>
                    <td>" . $tampil['Nama'] . "</td>
                    <td>" . $tampil['Kelas'] . "</td>
                    <td>" . $tampil['NIM'] . "</td>
                    <td>
                    <button class=button-3>Delete</button>
                    </td>
                </tr>
                ";
            }

            $conn->close();
            ?>
        </table>
    </div>

    <script>
        // Fungsi untuk mengisi form dengan data dari baris tabel
        function fillForm(data) {
            document.getElementById("Nama").value = data.Nama;
            document.getElementById("Kelas").value = data.Kelas;
            document.getElementById("NIM").value = data.NIM; // NIM sebagai primary key, tidak bisa diubah
        }
    </script>
</body>
</html>
