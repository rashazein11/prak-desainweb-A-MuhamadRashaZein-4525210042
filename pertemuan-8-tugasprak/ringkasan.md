# Ringkasan Praktikum 8

Pada praktikum ini saya membuat form registrasi event seminar yang berisi radio button (jenis peserta), checkbox (topik minat), select (program studi), textarea (alasan mengikuti kegiatan), dan upload file CV berformat PDF. Form memakai lima aturan validasi HTML5, yaitu required, minlength, maxlength, pattern untuk NIM 10 digit, dan tipe email. Tampilan saya buat responsif sehingga tetap nyaman dibuka di desktop maupun mobile.

Masalah yang saya temui muncul saat pengujian. Atribut accept=".pdf" ternyata tidak memblokir file lain, jadi file teks tetap lolos di browser. Checkbox juga tidak bisa diwajibkan minimal satu pilihan hanya dengan HTML, sehingga saya jadikan opsional. Selain itu, minlength hanya bekerja setelah pengguna mengetik langsung di kolomnya.

Solusinya, saya menambahkan validasi ulang di server lewat submit.php. Server memeriksa panjang teks, pola NIM, format email, kecocokan nilai radio, select, dan checkbox dengan daftar yang diizinkan, serta ukuran dan tipe MIME asli file upload. Saya juga menyimpan file dengan nama acak dan meng-escape output. Dari sebelas skenario uji, sepuluh ditolak browser sesuai harapan, dan satu skenario file non-PDF lolos sehingga membuktikan bahwa validasi server tetap wajib.

Catatan peran: tugas ini individu, jadi seluruh pekerjaan saya kerjakan sendiri.
