
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Program Kasir Sederhana</title>
</head>
<body>

    <h2>Program Kasir Sederhana</h2>

    <form method="POST">

        <label>Nama Barang:</label><br>
        <input type="text" name="barang" required>

        <br><br>

        <label>Harga Barang:</label><br>
        <input type="number" name="harga" min="0" step="0.01" required>

        <br><br>

        <label>Jumlah:</label><br>
        <input type="number" name="jumlah" min="1" step="1" required>

        <br><br>

        <button type="submit">Hitung</button>

    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $barang = trim($_POST["barang"] ?? "");
        $hargaInput = $_POST["harga"] ?? "";
        $jumlahInput = $_POST["jumlah"] ?? "";

        if (
            $barang === "" ||
            !is_numeric($hargaInput) ||
            !ctype_digit((string)$jumlahInput) ||
            (float)$hargaInput < 0 ||
            (int)$jumlahInput < 1
        ) {
            $error = "Periksa kembali nama barang, harga, dan jumlah.";
        } else {
            $harga = (float)$hargaInput;
            $jumlah = (int)$jumlahInput;
            $subtotal = $harga * $jumlah;
        }
    }
    ?>

    <?php
    if (isset($error)) {
        echo "<p>" . htmlspecialchars($error) . "</p>";
    } elseif (isset($subtotal)) {
        echo "<h3>Ringkasan Transaksi</h3>";
        echo "Barang: " . htmlspecialchars($barang) . "<br>";
        echo "Harga: Rp" . number_format($harga, 0, ",", ".") . "<br>";
        echo "Jumlah: " . $jumlah . "<br>";
        echo "Subtotal: Rp" . number_format($subtotal, 0, ",", ".");
    }
    ?>

</body>
</html>
