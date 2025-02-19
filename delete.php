<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $NIM = $_POST["NIM"];

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "db_siswa");
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Hapus data berdasarkan NIM
    $stmt = $conn->prepare("DELETE FROM siswa WHERE NIM = ?");
    $stmt->bind_param("s", $NIM);

    if ($stmt->execute()) {
        echo "success"; // Respon jika berhasil
    } else {
        echo "error: " . $stmt->error; // Respon jika gagal
    }

    $stmt->close();
    $conn->close();
}
?>
