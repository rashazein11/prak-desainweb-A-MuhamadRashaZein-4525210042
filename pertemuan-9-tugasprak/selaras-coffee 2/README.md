# Website One Page – Selaras Coffee

Tugas Individu Desain Web (Bootstrap 5)

| | |
|---|---|
| Nama | Muhamad Rasha Zein |
| NPM | 4525210042 |
| Program Studi | Teknik Informatika, Universitas Pancasila |
| Dosen | Ari Wibowo, S.Kom., M.Kom., C. Pro |
| Studi kasus | UMKM Selaras Coffee |
| Framework | Bootstrap 5.3.8 (lewat CDN) |

---

## 1. Deskripsi Singkat

Website ini adalah halaman tunggal (one page) untuk UMKM kopi bernama Selaras Coffee. Halaman menampilkan informasi usaha, tiga produk kopi, promo, detail produk lewat modal, dan form kontak.

Bootstrap digunakan untuk layout dan komponen responsif. CSS kustom menambahkan identitas visual berupa warna kopi dan krem, font judul, serta efek hover pada card.

## 2. Struktur Folder

```text
selaras-coffee/
├── index.html                   -> seluruh isi halaman
├── README.md                    -> dokumentasi proyek
├── css/
│   └── style.css                -> custom CSS (branding dan tampilan)
└── dokumentasi/
    ├── ringkasan.md             -> ringkasan tugas
    ├── img/                     -> gambar produk yang digunakan di halaman
    │   ├── es-kopi-selaras.png
    │   ├── kopi-gayo.png
    │   └── robusta-temanggung.png
    └── screenshot/              -> bukti tampilan desktop dan mobile
        ├── 1-desktop.png
        ├── 2-mobile.png
        ├── 3-desktop-modal.png
        └── 4-mobile-menu.png
```

## 3. Cara Menjalankan

1. Buka folder proyek.
2. Buka `index.html` di browser, atau jalankan server lokal dari folder proyek:

   ```bash
   python3 -m http.server 8000
   ```

3. Jika menggunakan server lokal, buka <http://localhost:8000>.
4. Pastikan komputer terhubung ke internet karena Bootstrap dan font dimuat dari CDN.

## 4. Komponen yang Dipakai (Sesuai Ketentuan Tugas)

| No | Komponen | Letak di `index.html` | Class Bootstrap utama |
|---|---|---|---|
| 1 | Navbar responsif | `<nav>` paling atas | `navbar navbar-expand-lg fixed-top`, `navbar-toggler`, `collapse navbar-collapse` |
| 2 | Hero section | `<header id="beranda">` | `d-flex align-items-center`, `display-3`, `lead`, `btn btn-lg` |
| 3 | Tiga card produk | section `#produk` | `card h-100 shadow-sm`, `card-body`, `card-title`, `card-text`, `badge` |
| 4 | Alert promo | Di atas section produk | `alert alert-warning alert-dismissible fade show` |
| 5 | Modal detail | Setelah section kontak, satu modal per produk | `modal fade`, `modal-dialog-centered`, `modal-content` |
| 6 | Form kontak | section `#kontak` | `form-control`, `form-label`, `mb-3` |
| 7 | Footer | Bagian paling bawah halaman | `bg-kopi text-white text-center py-4` |
| 8 | Custom CSS | `css/style.css` | variabel warna, font, hover card, hero |

## 5. Penjelasan Kode per Bagian

### 5.1 Bagian `<head>`

- `<meta name="viewport" ...>` membuat halaman menyesuaikan lebar layar HP agar breakpoint Bootstrap bekerja dengan benar.
- `<link ... bootstrap.min.css>` memuat CSS Bootstrap 5.3.8 dari CDN.
- `<link ... Playfair Display>` memuat font untuk judul.
- `<link rel="stylesheet" href="css/style.css">` dipasang setelah Bootstrap supaya aturan CSS kustom dapat menimpa aturan bawaan jika diperlukan.

### 5.2 Navbar responsif

- `navbar-expand-lg`: menu tampil mendatar di layar besar (992px ke atas), dan berubah menjadi tombol hamburger di layar lebih kecil.
- `fixed-top`: navbar menempel di bagian atas layar saat halaman di-scroll.
- Tombol hamburger memakai `data-bs-toggle="collapse"` dan `data-bs-target="#menuNav"` untuk membuka atau menutup elemen dengan id `menuNav`.
- Link menu memakai anchor seperti `href="#produk"` untuk berpindah ke bagian halaman yang dituju.

### 5.3 Hero section

- `.hero` menggunakan `min-height: 100vh` agar memenuhi tinggi layar dan `d-flex align-items-center` untuk menempatkan isi secara vertikal di tengah.
- `text-center text-lg-start` membuat teks rata tengah pada layar kecil dan rata kiri pada layar besar.
- Tombol “Lihat Produk” memakai kelas kustom `btn-krem`, sedangkan “Hubungi Kami” memakai `btn-outline-light` dari Bootstrap.

### 5.4 Alert promo

- `alert-warning` memberi warna peringatan/promo.
- `alert-dismissible` bersama tombol `btn-close` dan `data-bs-dismiss="alert"` membuat alert dapat ditutup pengunjung.
- `fade show` memberikan efek transisi saat alert ditutup.

### 5.5 Card produk dan gambar

Produk ditampilkan dalam grid Bootstrap:

```html
<div class="row g-4">
  <div class="col-12 col-md-6 col-lg-4">
    <!-- card produk -->
  </div>
</div>
```

- `row g-4` membuat baris grid dengan jarak antar kolom.
- `col-12 col-md-6 col-lg-4` mengatur jumlah kolom: satu card per baris di HP, dua di tablet, dan tiga di desktop.
- `h-100` pada card menyamakan tinggi card.
- `d-flex flex-column` pada `card-body` dan `mt-auto` pada tombol membuat tombol berada di dasar card meskipun panjang deskripsi berbeda.
- `badge text-bg-success` dan `text-bg-warning` menampilkan label “Terlaris” dan “Promo”.
- Gambar produk menggunakan file dari `dokumentasi/img/` dan kelas `card-img-top`.
- Di `css/style.css`, `.card-img-top` memiliki tinggi 160px dan `object-fit: cover` agar gambar terpotong rapi tanpa berubah proporsi.

Contoh penggunaan gambar:

```html
<img src="dokumentasi/img/kopi-gayo.png"
     class="card-img-top"
     alt="Kopi Arabika Gayo">
```

Path gambar dibuat relatif terhadap `index.html`, sehingga aset tetap terbaca saat proyek dibuka dari foldernya atau dijalankan di server lokal.

### 5.6 Modal detail produk

Ada tiga modal dengan id masing-masing: `modalArabika`, `modalSusu`, dan `modalRobusta`.

Tombol “Lihat Detail” membuka modal berdasarkan atribut:

- `data-bs-toggle="modal"` menandakan aksi untuk membuka modal.
- `data-bs-target="#modalArabika"` menentukan modal yang dibuka.

Di dalam modal, `data-bs-dismiss="modal"` menutup modal. Class `modal-dialog-centered` menempatkan modal di tengah layar. Atribut `aria-labelledby` menghubungkan modal dengan judulnya untuk membantu aksesibilitas.

### 5.7 Form kontak

- Form berisi kolom nama (`type="text"`), email (`type="email"`), dan pesan (`textarea`).
- Atribut `required` mencegah pengiriman saat kolom kosong, sedangkan `type="email"` meminta browser memeriksa format email.
- `<label for="nama">` terhubung dengan input yang memiliki `id="nama"`, sehingga label dapat diklik dan lebih mudah digunakan.
- `action="#kontak" method="get"` hanya mengarahkan kembali ke bagian kontak. Form ini belum mengirim data ke server; pengiriman ke email atau database memerlukan backend.

### 5.8 Footer

Footer memakai warna yang sama dengan navbar melalui kelas `bg-kopi`. Isinya mencakup alamat, email, dan hak cipta.

### 5.9 Script Bootstrap

```html
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
```

JavaScript Bootstrap menjalankan hamburger navbar, tombol penutup alert, dan modal. Proyek ini tidak menambahkan JavaScript kustom.

## 6. Penjelasan Custom CSS (`css/style.css`)

| Bagian | Fungsi |
|---|---|
| `:root { --kopi, --kopi-terang, --krem }` | Variabel warna branding yang digunakan ulang agar warna mudah disesuaikan. |
| `body { background-color }` | Memberi latar krem muda. |
| `html { scroll-behavior: smooth }` | Membuat perpindahan antarbagian terasa halus. |
| `.judul` | Mengatur font Playfair Display dan warna cokelat pada judul. |
| `.bg-kopi`, `.bg-krem` | Kelas warna kustom untuk navbar, footer, tombol, dan section Tentang. |
| `.btn-kopi`, `.btn-krem` | Mengatur warna tombol brand beserta warna saat hover. |
| `.hero` | Mengatur tinggi hero, ruang untuk navbar fixed, dan latar gradasi. |
| `section { scroll-margin-top: 70px }` | Memberi jarak saat navigasi agar judul section tidak tertutup navbar. |
| `.card` dan `.card:hover` | Menghilangkan border dan memberi efek card sedikit terangkat saat kursor berada di atasnya. |
| `.card-img-top` | Menyamakan tinggi gambar produk dan memotongnya dengan rapi menggunakan `object-fit: cover`. |

## 7. Masalah yang Ditemukan dan Solusinya

| Masalah | Penyebab | Solusi |
|---|---|---|
| Judul section tertutup navbar saat menu diklik | Navbar `fixed-top` menutupi bagian atas halaman | `scroll-margin-top: 70px` pada section dan `padding-top` pada hero |
| Tinggi card tidak sama sehingga grid berantakan | Panjang deskripsi produk berbeda | `h-100` pada card, serta `d-flex flex-column` dan `mt-auto` agar tombol rata di bawah |
| Form bisa dikirim dalam keadaan kosong | Belum ada validasi kolom | Atribut `required` dan `type="email"` untuk validasi bawaan HTML5 |
| Gambar perlu mengikuti struktur folder terbaru | Gambar produk disimpan di `dokumentasi/img/` | Setiap gambar memakai path relatif `dokumentasi/img/nama-file.png` dari `index.html` |

## 8. Bukti yang Dikumpulkan

- Source code: folder proyek ini.
- Screenshot desktop dan mobile: `dokumentasi/screenshot/`.
- Ringkasan tugas: `dokumentasi/ringkasan.md`.
- Pembagian peran: tugas individu, sehingga seluruh pekerjaan dikerjakan sendiri.
