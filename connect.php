<?php
    $Nama = $_POST["Nama"];
    $Kelas = $_POST["Kelas"];
    $NIM = $_POST["NIM"];

    // Connect to database
    $conn = new mysqli("localhost", "root", "", "db_siswa");
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO siswa (Nama, Kelas, NIM) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $Nama, $Kelas, $NIM);

        if ($stmt->execute()) {
            echo "Data berhasil disimpan ke database!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
?>
