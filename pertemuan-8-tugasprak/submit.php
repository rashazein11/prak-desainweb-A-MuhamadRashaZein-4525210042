<?php
// Validasi ulang di server: validasi browser bisa dilewati (DevTools, curl, Postman).
$errors = [];
$nama   = trim($_POST['nama'] ?? '');
$nim    = trim($_POST['nim'] ?? '');
$email  = trim($_POST['email'] ?? '');
$jenis  = $_POST['jenis_peserta'] ?? '';
$minat  = $_POST['minat'] ?? [];
$prodi  = $_POST['program_studi'] ?? '';
$alasan = trim($_POST['alasan'] ?? '');

$prodiValid = ['informatika', 'sistem-informasi', 'mesin', 'elektro', 'sipil'];
$minatValid = ['web', 'uiux', 'ai', 'data'];

if (mb_strlen($nama) < 3 || mb_strlen($nama) > 50) $errors[] = 'Nama harus 3-50 karakter.';
if (!preg_match('/^[0-9]{10}$/', $nim)) $errors[] = 'NIM harus tepat 10 digit angka.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Format email tidak valid.';
if (!in_array($jenis, ['mahasiswa', 'umum'], true)) $errors[] = 'Jenis peserta tidak valid.';
if (!is_array($minat) || array_diff($minat, $minatValid)) $errors[] = 'Pilihan topik tidak valid.';
if (!in_array($prodi, $prodiValid, true)) $errors[] = 'Program studi tidak valid.';
if (mb_strlen($alasan) < 20 || mb_strlen($alasan) > 300) $errors[] = 'Alasan harus 20-300 karakter.';

// File: cek error upload, ukuran, dan MIME asli (bukan sekadar ekstensi/accept).
$f = $_FILES['cv'] ?? null;
if (!$f || $f['error'] !== UPLOAD_ERR_OK) {
    $errors[] = 'CV wajib diunggah.';
} else {
    if ($f['size'] > 2 * 1024 * 1024) $errors[] = 'Ukuran CV maksimal 2 MB.';
    if ((new finfo(FILEINFO_MIME_TYPE))->file($f['tmp_name']) !== 'application/pdf') $errors[] = 'CV harus berupa file PDF.';
}

if (!$errors) {
    // shortcut: nama file acak, tanpa database; ganti dengan penyimpanan DB bila dipakai sungguhan.
    @mkdir(__DIR__ . '/uploads', 0755, true);
    move_uploaded_file($f['tmp_name'], __DIR__ . '/uploads/' . bin2hex(random_bytes(8)) . '.pdf');
}
$h = fn($s) => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Hasil Registrasi</title><link rel="stylesheet" href="style.css"></head>
<body><main>
<?php if ($errors): ?>
  <h1 class="err">Registrasi gagal</h1>
  <ul><?php foreach ($errors as $e) echo '<li>' . $h($e) . '</li>'; ?></ul>
  <p><a href="index.html">Kembali ke form</a></p>
<?php else: ?>
  <h1 class="ok">Registrasi berhasil</h1>
  <p>Terima kasih, <?= $h($nama) ?> (<?= $h($nim) ?>). Data Anda sudah kami terima.</p>
<?php endif; ?>
</main></body></html>
