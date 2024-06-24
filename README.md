# 🛍️ Project Akhir Back-End "Sistem Manajemen Toko Online"
- Nama : Fajar Bintara Putra
- NIM  : 220040267
- Kelas  : UG224
- Matkul : Back-End Web Development

## 💡Brainstorming

## 📜 Gambaran Singkat
project sederhana ini merupakan sebuah sistem berbasis web yang memungkinkan pengelolaan data user, produk, transaksi dan stok untuk sebuah toko online. Sistem ini dibangun menggunakan PHP dan MySQL, dengan struktur MVC (Model-View-Controller) yang terorganisir dengan baik. 

## ☰ Fitur "Sistem Manajemen Online Shop"

### API Produk

- GET /api/products
   - Deskripsi: Mengambil daftar produk.
   - Respon: Biasanya mengembalikan array objek produk JSON, termasuk detail seperti ID produk, nama, deskripsi, harga, dan jumlah stok.

- POST /api/products
   - Deskripsi: Membuat produk baru.
   - Badan Permintaan: Mengharapkan objek JSON dengan detail produk seperti nama, deskripsi, harga, dan jumlah stok awal.
   - Respon: Mengembalikan objek produk yang dibuat, sering kali menyertakan ID produk baru yang ditetapkan oleh database.
  
- PUT /api/products
   - Deskripsi: Memperbarui produk yang sudah ada.
   - Badan Permintaan: Mengharapkan objek JSON dengan detail produk yang diperbarui. ID produk harus disertakan untuk menentukan produk mana yang akan diperbarui.
   - Respon: Mengembalikan objek produk yang diperbarui.

- DELETE /api/products
   - Deskripsi: Menghapus produk.
   - Parameter Permintaan: Biasanya memerlukan ID produk untuk menentukan produk mana yang akan dihapus.
   - Respon: Mengembalikan pesan konfirmasi yang menunjukkan produk telah dihapus.

### API Stok

- GET /api/stocks
   - Deskripsi: Mengambil daftar entri stok, mungkin termasuk data historis.
   - Respon: Biasanya mengembalikan array objek stok JSON, termasuk detail seperti ID stok, ID produk, kuantitas, dan stempel waktu.

- POST /api/stocks
   - Deskripsi: Membuat entri stok baru, biasanya untuk menambah atau menyesuaikan level stok.
   - Badan Permintaan: Mengharapkan objek JSON dengan detail stok seperti ID produk, kuantitas, dan mungkin stempel waktu.
   - Respon: Mengembalikan objek stok yang dibuat, termasuk ID stok.

- PUT /api/stocks
   - Deskripsi: Memperbarui entri stok yang ada.
   - Badan Permintaan: Mengharapkan objek JSON dengan detail stok yang diperbarui. ID stok harus disertakan untuk menentukan entri stok mana yang akan diperbarui.
   - Respon: Mengembalikan objek stok yang diperbarui.

- DELETE /api/stocks
   - Deskripsi: Menghapus entri stok.
   - Parameter Permintaan: Biasanya memerlukan ID stok untuk menentukan entri stok mana yang akan dihapus.
   - Respon: Mengembalikan pesan konfirmasi yang menunjukkan entri stok telah dihapus.

### API Transaksi

- GET /api/transactions
   - Deskripsi: Mengambil daftar transaksi.
   - Respon: Biasanya mengembalikan array objek transaksi JSON, termasuk detail seperti ID transaksi, ID produk, ID pengguna, kuantitas, harga total, dan stempel waktu.

- POST /api/transactions
   - Deskripsi: Membuat transaksi baru.
   - Badan Permintaan: Mengharapkan objek JSON dengan detail transaksi seperti ID produk, ID pengguna, kuantitas, dan harga total.
   - Respon: Mengembalikan objek transaksi yang dibuat, termasuk ID transaksi.

- PUT /api/transactions
   - Deskripsi: Memperbarui transaksi yang ada.
   - Badan Permintaan: Mengharapkan objek JSON dengan detail transaksi yang diperbarui. ID transaksi harus disertakan untuk menentukan transaksi mana yang akan diperbarui.
   - Respon: Mengembalikan objek transaksi yang diperbarui.

- DELETE /api/transactions
   - Deskripsi: Menghapus transaksi.
   - Parameter Permintaan: Biasanya memerlukan ID transaksi untuk menentukan transaksi mana yang akan dihapus.
   - Respon: Mengembalikan pesan konfirmasi yang menunjukkan transaksi telah dihapus.

### API Pengguna

- GET /api/transactions
   - Deskripsi: Mengambil daftar pengguna.
   - Respon: Biasanya mengembalikan array objek pengguna JSON, termasuk detail seperti ID pengguna, nama, email, dan peran.
  
- POST /api/transactions
   - Deskripsi: Membuat pengguna baru.
   - Badan Permintaan: Mengharapkan objek JSON dengan detail pengguna seperti nama, email, kata sandi, dan peran.
   - Respon: Mengembalikan objek pengguna yang dibuat, termasuk ID pengguna.
  
- PUT /api/transactions 
   - Deskripsi: Memperbarui pengguna yang sudah ada.
   - Badan Permintaan: Mengharapkan objek JSON dengan detail pengguna yang diperbarui. ID pengguna harus disertakan untuk menentukan pengguna mana yang akan diperbarui.
   - Respon: Mengembalikan objek pengguna yang diperbarui.
  
- DELETE /api/transactions
   - Deskripsi: Menghapus pengguna.
   - Parameter Permintaan: Biasanya memerlukan ID pengguna untuk menentukan pengguna mana yang akan dihapus.
   - Respon: Mengembalikan pesan konfirmasi yang menunjukkan pengguna telah dihapus.


## 🏗️ Gambaran Tech Stack yang digunakan

![alt text](<assets/Screenshot 2024-05-14 100607.png>)

### Penjelasan

Penjelasan singkat mengenai Tech Stack yang digunakan:

- **Apache**: Apache adalah server web open-source yang populer dan digunakan secara luas untuk menghosting aplikasi web. Apache akan digunakan untuk melayani permintaan HTTP dari klien (browser web) dan mentransfer
              respons yang sesuai. 
- **Rest API**: Rest API adalah arsitektur gaya arsitektur pemrograman antarmuka yang mendefinisikan seperangkat aturan untuk pertukaran data antara aplikasi web. Rest API akan digunakan 
                untuk mengekspos fungsionalitas sistem manajemen inventaris toko online kepada klien, seperti menambahkan produk baru, mengedit informasi produk, dan melihat daftar transaksi. 
- **PHP**: PHP adalah bahasa pemrograman skrip sisi server yang populer dan digunakan secara luas untuk mengembangkan aplikasi web dinamis. PHP akan digunakan untuk menulis kode backend 
           sistem manajemen inventaris toko online, termasuk logika bisnis, akses database, dan komunikasi dengan Rest API. 
- **MySQL**: MySQL adalah sistem manajemen basis data relasional open-source yang populer dan digunakan secara luas untuk menyimpan data aplikasi web. MySQL akan digunakan untuk menyimpan 
             data sistem manajemen inventaris toko online, seperti informasi produk, stok, dan transaksi.
   
## 🗃️ ERD

![alt text](<assets/Screenshot 2024-06-24 143951.png>)

Dengan ERD ini, hubungan antar tabel dalam sistem manajemen Toko Online sederhana dapat dipahami dengan jelas.

- **Product**
  - `product_id (PK)`
  - `name`
  - `descriptionr`
  - `price`
  - `category`
  - `current_stock`
- **Stock**
  - `stock_id(PK)`
  - `product_id(PK)`
  - `quantity`
  - `date`
  - `[user]`
  - `change_type`
  - `product_id` REFERENCES `product(product_id)`
- **Transaction**
  - `Transaction_id(PK)`
  - `customer_name`
  - `date`
  - `product_id`
  - `quantity`
  - `total_price`
  - `product_id` REFERENCES `products(product_id)`
- **User**
  - `user_id (PK)`
  - `username`
  - `full_name`
  - `email`
  - `password`
  - `created_at`

Relasi antar tabel-tabel dalam desain database diatas:

One-to-many relationship between product and stock: Setiap produk dapat memiliki beberapa catatan perubahan stok.
One-to-many relationship between product and transaction: Setiap produk dapat menjadi bagian dari beberapa transaksi.
(Potential) One-to-many relationship between user and stock: Setiap pengguna dapat membuat beberapa perubahan stok (jika kolom pengguna direferensikan dengan benar ke user_id).

## ⚙️ Struktur Proyek
```sh
/UAS_Back-End_Online-Shop
├── app.php
├── db_onlineShop.sql
├── .env
├── .htaccess
├── config/
│   ├── database.php
│   └── table.php
├── controllers/
│   ├── ProductsController.php
│   ├── StocksController.php
│   └── TransactionsController.php
├── middleware/
│   └── Router.php
├── models/
│   ├── ProductsModel.php
│   ├── StocksModel.php
│   └── TransactionsModel.php
└── services/
    ├── ProductsService.php
    ├── StocksService.php
    └── TransactionsService.php
```

### Penjelasan
Berikut adalah deskripsi singkat dari setiap file dan direktori:

1. **.env**:
   - Berisi konfigurasi lingkungan seperti detail koneksi database.

2. **db_kasir.sql**:
   - File SQL yang berisi skrip untuk membuat database dan tabel yang diperlukan.
     
3. **.htaccess**:
   - Mengatur URL rewrite untuk mengarahkan semua permintaan ke `app.php`.

4. **app.php**:
   - File utama untuk mengatur rute dan menghubungkan dengan controller yang sesuai.

5. **config/**:
   - `database.php`: Kelas `Database` untuk mengatur koneksi ke database menggunakan PDO.
   - `table.php`: Mengandung array yang memetakan nama tabel di database.

6. **controllers/**:
   - `MembersController.php`: Mengatur operasi CRUD untuk members.
   - `ProductsController.php`: Mengatur operasi CRUD untuk produk.
   - `SalesController.php`: Mengatur operasi CRD untuk penjualan.

7. **middleware/**:
   - `Router.php`: Kelas `Router` untuk mengatur rute dan menghubungkan dengan action yang sesuai.

8. **models/**:
   - `MembersModel.php`: Model untuk operasi database terkait members.
   - `ProductsModel.php`: Model untuk operasi database terkait produk.
   - `SalesModel.php`: Model untuk operasi database terkait penjualan.

9. **services/**:
   - `MembersService.php`: Layanan untuk operasi logika bisnis terkait members.
   - `ProductsService.php`: Layanan untuk operasi logika bisnis terkait produk.
   - `SalesService.php`: Layanan untuk operasi logika bisnis terkait penjualan.


## 📝 Petunjuk Penggunaan
Langkah-langkah untuk menginstal proyek ini secara lokal:

## 🔧 Instalasi

1. Clone repositori ini:
    ```sh
    git clone https://github.com/username/toko-serba-ada.git
    ```
    
2. **Membuka Proyek di Editor Terpilih:**
  - Gunakan IDE favorit Anda, seperti Visual Studio Code, untuk membuka folder proyek.
  - Pastikan Anda memiliki semua ekstensi dan plugin yang diperlukan untuk pengembangan proyek terpasang.
  - Akses file-file proyek dan mulai proses pengembangan dan pengujian.
    
3. **Persiapkan Server Web Lokal:**
  - Pastikan XAMPP terinstal dan diaktifkan di komputer Anda.
  - Jalankan XAMPP dan verifikasi bahwa layanan Apache dan MySQL aktif.
  - Tunggu hingga server web lokal dan database MySQL siap digunakan.
    
4. **Import Database untuk sistem aplikasi kasir sederhana:**
  - Buka phpMyAdmin, alat bantu web untuk mengelola database MySQL.
  - Pilih database yang ingin Anda gunakan atau buat database baru dengan nama yang sesuai.
  - Impor file `db_kasir.sql` ke dalam database yang dipilih.
  - Alternatively, jalankan query SQL dari file `db_kasir.sql` untuk membuat database dan tabel yang diperlukan secara manual.
  - Pastikan proses import database berhasil dan semua tabel dan data telah termuat dengan benar.

5. **Buat file `.env` di direktori root proyek dan tambahkan konfigurasi database Anda:**
    ```sh
    DB_HOST=localhost
    DB_NAME=kasir
    DB_USERNAME=admin
    DB_PASSWORD=admin123
    ```

6. **Siapkan Postman untuk Menguji API:**
   Unduh Postman dari situs resminya [klik disini](https://www.postman.com/downloads/).



## 🔍 Refleksi Diri terhadap Proyek Pengembangan Aplikasi Kasir Sederhana

Dalam proses pengembangan aplikasi kasir sederhana ini, terdapat beberapa tantangan dan kesulitan yang saya hadapi, serta berbagai strategi yang saya gunakan untuk mengatasinya.

### Tantangan dan Kesulitan

1. **Desain Arsitektur dan Pemisahan Tanggung Jawab**
   - **Tantangan**: Merancang struktur proyek yang modular dan mudah dikelola membutuhkan banyak pertimbangan, terutama dalam hal pemisahan tanggung jawab antar komponen (controller, model, service).
   - **Cara Mengatasi**: Saya memutuskan untuk menerapkan pola arsitektur MVC (Model-View-Controller) yang jelas dan terstruktur. Ini membantu menjaga agar setiap komponen memiliki tanggung jawab spesifik dan meminimalkan keterikatan antara bagian-bagian yang berbeda dari kode.

2. **Pengelolaan Koneksi Database**
   - **Tantangan**: Mengatur koneksi database yang aman dan efisien merupakan tantangan, terutama dalam hal mengelola konfigurasi dan koneksi ulang.
   - **Cara Mengatasi**: Saya menggunakan file `.env` untuk menyimpan konfigurasi lingkungan secara aman. Selain itu, saya merancang kelas `Database` dengan metode `getConnection()` yang memastikan hanya satu koneksi yang aktif pada satu waktu, yang membantu mengurangi beban pada server database.

3. **Penulisan Ulang URL dengan `.htaccess`**
   - **Tantangan**: Mengkonfigurasi penulisan ulang URL untuk mengarahkan semua permintaan melalui satu titik masuk (`app.php`) tidaklah mudah, terutama dalam menangani berbagai skenario permintaan.
   - **Cara Mengatasi**: Saya mempelajari dokumentasi `.htaccess` dan melakukan beberapa percobaan hingga menemukan aturan yang tepat untuk mengarahkan semua permintaan ke `app.php` tanpa mengganggu akses ke file dan direktori statis.

4. **Validasi dan Sanitasi Input**
   - **Tantangan**: Menangani validasi dan sanitasi input pengguna untuk mencegah SQL injection dan serangan XSS merupakan aspek kritis dalam pengembangan aplikasi web.
   - **Cara Mengatasi**: Saya menggunakan PDO dengan prepared statements untuk menghindari SQL injection. Selain itu, saya menambahkan lapisan validasi di tingkat service untuk memastikan bahwa semua input yang diterima sesuai dengan kriteria yang diharapkan sebelum diteruskan ke model.

5. **Pengujian dan Debugging**
   - **Tantangan**: Mengidentifikasi dan memperbaiki bug, serta memastikan bahwa semua fungsionalitas bekerja sebagaimana mestinya, merupakan proses yang memakan waktu dan menantang.
   - **Cara Mengatasi**: Saya menerapkan pengujian unit pada metode-metode kunci di service dan model. Selain itu, saya menggunakan alat debugging PHP dan menambahkan log pada titik-titik penting dalam aplikasi untuk memudahkan identifikasi masalah.

6. **Performance dan Scalability**
   - **Tantangan**: Memastikan aplikasi berjalan efisien dan dapat diskalakan untuk menangani jumlah pengguna yang banyak.
   - **Cara Mengatasi**: Saya merancang aplikasi dengan prinsip-prinsip terbaik dalam pengelolaan resource, seperti menggunakan koneksi database yang efisien dan mengoptimalkan query SQL. Selain itu, saya mempertimbangkan penggunaan caching untuk mengurangi beban pada database.

### Pembelajaran dan Pengembangan Diri

Selama proses pengembangan ini, saya banyak belajar tentang pentingnya perencanaan yang matang dan desain arsitektur yang baik. Saya juga menyadari bahwa pengelolaan konfigurasi lingkungan dan keamanan aplikasi merupakan aspek yang sangat penting yang tidak boleh diabaikan. Selain itu, saya mendapatkan pengalaman berharga dalam menggunakan berbagai alat dan teknik untuk pengujian dan debugging, yang sangat membantu dalam memastikan kualitas dan stabilitas aplikasi.

Ke depannya, saya berharap dapat menerapkan pengalaman dan pengetahuan yang saya peroleh dari proyek ini untuk proyek-proyek lainnya, serta terus mengembangkan keterampilan saya dalam pengembangan aplikasi web yang lebih kompleks dan canggih.


*Fajar Bintara*
