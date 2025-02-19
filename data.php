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