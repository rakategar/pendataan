<?php
    $Nama = $_POST["Nama"];
    $Kelas = $_POST["Kelas"];
    $NIM = $_POST["NIM"]; // Primary Key

    // Connect to database
    $conn = new mysqli("localhost", "root", "", "db_siswa");
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Cek apakah NIM sudah ada di database
    $cekNIM = $conn->query("SELECT * FROM siswa WHERE NIM = '$NIM'");
    if ($cekNIM->num_rows > 0) {
        // Jika NIM ada, lakukan update
        $stmt = $conn->prepare("UPDATE siswa SET Nama = ?, Kelas = ? WHERE NIM = ?");
        $stmt->bind_param("sss", $Nama, $Kelas, $NIM);
    } else {
        // Jika NIM tidak ada, lakukan insert
        $stmt = $conn->prepare("INSERT INTO siswa (Nama, Kelas, NIM) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $Nama, $Kelas, $NIM);
    }

    // Eksekusi query
    if ($stmt->execute()) {
        header("Location: index.php"); // Refresh halaman setelah submit
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
?>
