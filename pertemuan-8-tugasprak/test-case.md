# Test Case Validasi — Form Registrasi Event (Praktikum 8)

Pengujian validasi browser dijalankan sungguhan di Chromium (Playwright) pada `index.html`.
Pengujian validasi server (kolom terakhir) belum dijalankan karena `submit.php` perlu dites di PHP lokal (XAMPP/Laragon).

| No | Field | Input Uji | Hasil yang Diharapkan | Hasil Aktual (browser) | Perlu cek di server? |
|----|-------|-----------|-----------------------|------------------------|----------------------|
| 1 | Nama | (kosong) | Form ditolak, pesan "wajib diisi" | Form ditolak: *Please fill out this field* | Ya |
| 2 | Nama | `Al` (2 karakter) | Ditolak, minimal 3 karakter | Ditolak: *Please lengthen this text to 3 characters or more* | Ya |
| 3 | NIM | `12345#` | Ditolak, tidak sesuai pola | Ditolak: *Please match the requested format* | Ya |
| 4 | NIM | `123456789A` | Ditolak, tidak sesuai pola | Ditolak: *Please match the requested format* | Ya |
| 5 | Email | `aca@` | Ditolak, format email salah | Ditolak: *Please enter a part following '@'* | Ya |
| 6 | Jenis Peserta | (tidak dipilih) | Ditolak, harus pilih satu | Ditolak: *Please select one of these options* | Ya |
| 7 | Program Studi | `-- Pilih Program Studi --` | Ditolak, harus pilih opsi valid | Ditolak: *Please select an item in the list* | Ya |
| 8 | Alasan | `Mau ikut` (8 karakter) | Ditolak, minimal 20 karakter | Ditolak: *Please lengthen this text to 20 characters or more* | Ya |
| 9 | CV | (belum ada file) | Ditolak, file wajib | Ditolak: *Please select a file* | Ya |
| 10 | CV | `bukan.txt` (file teks) | Ditolak, harus PDF | **Lolos** — `accept=".pdf"` hanya filter di jendela pilih file, tidak memblokir | **Wajib** (cek MIME asli di server) |
| 11 | Nama | Ketik 60 karakter | Dibatasi maksimal 50 | 50 karakter tersimpan, sisanya terpotong | Ya |

## Validasi yang tetap wajib di server

Validasi browser hanya kenyamanan pengguna. Siapa pun bisa melewatinya lewat DevTools, curl, atau Postman, jadi semua aturan harus diulang di `submit.php`:

- **Semua atribut HTML5** (`required`, `minlength`, `maxlength`, `pattern`, tipe email): data yang masuk bisa dikirim langsung ke server tanpa lewat form.
- **Radio, select, checkbox**: nilai bisa diubah menjadi sesuatu di luar opsi. Server mencocokkan dengan daftar nilai yang diizinkan.
- **Upload file**: ini yang paling penting. `accept` bisa dilewati (lihat test case 10), jadi server wajib cek ukuran, error upload, dan tipe MIME asli file, lalu menyimpan dengan nama acak.
- **Output**: data pengguna di-escape (`htmlspecialchars`) agar tidak jadi celah XSS.
