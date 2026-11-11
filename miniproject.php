
<?php
$data = null;
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");

    // Validasi data
    if ($nama === "") {
        $error[] = "Nama wajib diisi.";
    }

    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    }

    if ($prodi === "") {
        $error[] = "Program studi wajib diisi.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    if (
        !ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 ||
        (int)$semesterInput > 14
    ) {
        $error[] = "Semester harus berupa angka 1-14.";
    }

    // Jika semua valid
    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Data Mahasiswa</title>
</head>
<body>

    <h2>Formulir Data Mahasiswa</h2>

    <form method="POST">

        <label>Nama Mahasiswa:</label><br>
        <input type="text" name="nama" required>
        <br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" required>
        <br><br>

        <label>Program Studi:</label><br>
        <input type="text" name="prodi" required>
        <br><br>

        <label>Semester:</label><br>
        <input type="number" name="semester"
               min="1" max="14" required>
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required>
        <br><br>

        <button type="submit">Kirim Data</button>
        <button type="reset">Reset</button>

    </form>

    <?php if ($error): ?>

        <h3>Terjadi Kesalahan:</h3>

        <?php foreach ($error as $pesan): ?>
            <p>
                <?php echo htmlspecialchars($pesan); ?>
            </p>
        <?php endforeach; ?>

    <?php elseif ($data): ?>

        <h3>Data Mahasiswa Berhasil Diterima</h3>

        Nama: <?php echo htmlspecialchars($data["nama"]); ?><br>
        NIM: <?php echo htmlspecialchars($data["nim"]); ?><br>
        Program Studi: <?php echo htmlspecialchars($data["prodi"]); ?><br>
        Semester: <?php echo $data["semester"]; ?><br>
        Email: <?php echo htmlspecialchars($data["email"]); ?>

    <?php endif; ?>

</body>
</html>
