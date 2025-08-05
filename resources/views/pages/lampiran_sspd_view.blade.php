<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Belajar HTML #01</title>
    </head>
    <body>
        <?php
        if($lampiran == 0){
            echo "<p style='text-align: center; '> Tidak ada file lampiran </p>";
            echo '<p style="text-align: center; "><button onclick="window.close()">Tutup </button></p>';
        }else {
        ?>
            <iframe src="{{ url('uploads/transaksi') }}/{{ $lampiran }}" width="780" height="700"></iframe>
        <?php } ?>
    </body>
</html>