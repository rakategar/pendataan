<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>koneksi html ke sql</title>
    <style>
        div{
            margin: 24px;
        }
        label, h1{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }  
    </style>
</head>
<body>
    <div style=" text-align: center;">
        <h1>Form Pendataan Siswa</h1>
    </div>
    <div >
        <form action="connect.php" method="post" style="display: flex; flex-direction: column; gap: 6px;" >
            <label for="Nama">Nama Siswa</label>
            <input type="text" id="Nama" name="Nama">
            <label for="Kelas">Kelas</label>
            <input type="text" id="Kelas" name="Kelas">
            <label for="NIM">NIM</label>
            <input type="text" id="NIM" name="NIM">
            <input type="submit" name="" id="" value="submit">
        </form>
    </div>
    <div>
        <table>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>NIM</th>
            </tr>
            <?php
            include "connect.php";
            $no = 1;
            $ambildata = mysqli_query($connect, "SELECT * FROM siswa");
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "
                <tr>
                    <td>$no</td>
                    <td>$tampil[Nama]</td>
                    <td>$tampil[Kelas]</td>
                    <td>$tampil[NIM]</td>
                </tr>
                ";
                $no++;
            };
            ?>
            
        </table>
    </div>
    
   
    
</body>
</html>