# Katalog Sepeda Motor - Bootstrap

| | |
|---|---|
| **Nama** | Muhamad Rasha Zein |
| **NPM** | 4525210042 |
| **Program Studi** | Teknik Informatika |
| **Mata Kuliah** | Desain Web |
| **Pertemuan** | 9 - Bootstrap |
| **Tema** | Katalog Sepeda Motor |

## Deskripsi
Halaman web katalog sepeda motor yang dibuat dengan Bootstrap 5.3.8 (via CDN).
Halaman responsif: tampilan menyesuaikan ukuran layar (HP, tablet, desktop).

## Struktur Folder
```
pertemuan-9/
└── tugas-katalog-sepeda-motor/
    ├── README.md
    ├── index.html
    ├── css/
    │   └── style.css
    ├── images/
    │   ├── produk-1.jpg
    │   ├── produk-2.jpg
    │   ├── produk-3.jpg
    │   └── produk-4.jpg
    └── dokumentasi/
        └── README.txt
```

## Isi `index.html`
1. **Head** - meta charset, meta viewport (responsif), judul halaman, link Bootstrap CSS (CDN) dan `css/style.css`.
2. **Header** - judul "Katalog Sepeda Motor" dan nama pembuat (`bg-primary text-white py-4`).
3. **Grid Produk** - 4 kartu motor (Honda Beat, Yamaha NMAX, Honda Vario 160, Yamaha Aerox).
   Tiap kartu berisi gambar, judul, deskripsi singkat, dan tombol "Lihat Detail".
   Kolom memakai `col-12 col-md-6 col-lg-3`: 1 kolom di HP, 2 kolom di tablet, 4 kolom di desktop.
4. **Informasi Ringkas** - 3 kartu: Total Motor, Motor Tersedia, Stok Habis.
5. **Tabel Sepeda Motor** - kolom No., Kode, Nama Motor, Tipe, Kapasitas Mesin, Status, Aksi (5 data motor).
   Status memakai badge, aksi memakai tombol Detail.
6. **Footer** - hak cipta (`bg-dark text-white`).
7. **Script** - Bootstrap JavaScript (CDN).

## Isi `css/style.css`
- `body` - warna latar abu-abu muda (`#f8f9fa`) dan tinggi minimal satu layar.
- `.card` - tanpa border dan ada efek transisi halus.
- `.card-img-top` - tinggi gambar 200px dengan `object-fit: cover` agar gambar tidak gepeng.
- `.card:hover` - kartu naik sedikit (`translateY(-5px)`) saat disorot kursor.
- `table th, table td` - teks tidak turun baris (`nowrap`).

## Class Bootstrap yang Dipakai
- **Layout**: `container`, `row`, `col-12`, `col-md-6`, `col-lg-3`, `g-3`, `g-4`
- **Breakpoint**: `md` (tablet), `lg` (desktop)
- **Utility**: `bg-primary`, `bg-dark`, `text-white`, `text-secondary`, `text-success`, `text-warning`, `py-4`, `my-5`, `mb-0`, `text-md-end`, `align-items-center`
- **Komponen**: `card`, `card-body`, `card-header`, `card-img-top`, `btn`, `btn-primary`, `btn-sm`, `badge`
- **Tabel**: `table`, `table-striped`, `table-hover`, `table-responsive`, `table-dark`, `align-middle`

## Cara Menjalankan
Buka `index.html` di browser. Butuh koneksi internet karena Bootstrap diambil dari CDN.

## Catatan
Gambar di folder `images/` masih berupa placeholder. Data motor, stok, dan jumlahnya adalah contoh.
