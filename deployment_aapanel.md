# Panduan Deployment Web ke aaPanel (Apache & PHP 8.4)

Panduan ini berisi langkah-langkah lengkap untuk men-_deploy_ website (berbasis Laravel & Vue/Inertia) ke _server_ yang menggunakan **aaPanel**, **Apache**, **PHP 8.4**, dan **MySQL**, dengan mengambil sumber kode dari repositori GitHub.

Tautan repositori: `https://github.com/abietechno/smkn8surabaya.git`

## 1. Persiapan di aaPanel

1. Login ke dashboard aaPanel Anda.
2. Pastikan Anda sudah menginstal aplikasi berikut melalui menu **App Store**:
   - Web Server: **Apache**
   - Database: **MySQL** (versi 5.7+ atau 8.x)
   - PHP: **PHP 8.4**
   - Process Manager: **PM2 Manager** (Opsional, tapi jika Anda perlu _build asset Node.js_ di server, Anda butuh Node.js dari PM2 manager, atau install nodejs secara manual via terminal).
3. Jika belum menginstal ekstensi PHP yang diperlukan Laravel (seperti `fileinfo`, `zip`, `exif`, dll), masuk ke menu **App Store** -> **PHP 8.4** -> **Settings** -> **Install extensions**.

## 2. Membuat Database

1. Buka menu **Databases**.
2. Klik tombol **Add database**.
3. Isi informasi berikut:
   - **DB Name**: `smkn8_db` (atau nama lain)
   - **Username**: `smkn8_user`
   - **Password**: (Generate atau buat *password* yang kuat)
   - **Access**: `Local server`
4. Klik **Submit** dan catat kredensial ini baik-baik.

## 3. Menambahkan Website (Virtual Host)

1. Buka menu **Website**.
2. Klik tombol **Add site**.
3. Isi form sebagai berikut:
   - **Domain**: Masukkan nama domain Anda (contoh: `smkn8surabaya.sch.id` atau `beta.smkn8surabaya.sch.id`).
   - **Description**: Domain Utama
   - **Document Root**: *Biarkan default (biasanya `/www/wwwroot/domainanda`), kita akan menyetel document root spesifik di tahap akhir.*
   - **FTP**: Not created
   - **Database**: Not created (karena sudah dibuat di tahap 2)
   - **PHP Version**: Pilih **PHP-84**
4. Klik **Submit**.

## 4. Mengambil Source Code (Git Pull) via Terminal

1. Buka menu **Terminal** di aaPanel (atau gunakan SSH dari PC Anda ke server).
2. Pindah ke direktori website yang baru saja dibuat. Gantinkan `domainanda.com` dengan nama folder yang terbuat:
   ```bash
   cd /www/wwwroot/domainanda.com
   ```
3. Kosongkan bawaan _default file_ (biasanya ada `index.html` dan `404.html`) untuk menghindari konflik:
   ```bash
   rm -rf *
   rm -rf .htaccess
   rm -rf .user.ini
   ```
4. Tarik _source code_ dari GitHub (-b main untuk *branch* `main`):
   ```bash
   git init
   git remote add origin https://github.com/abietechno/smkn8surabaya.git
   git pull origin main
   ```
   *(Catatan: Jika repositori Anda *private*, Anda harus men-_setup_ SSH Key aaPanel ke GitHub atau menggunakan format HTTPS dengan Personal Access Token).*

## 5. Konfigurasi Environment Server

1. Salin `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
2. Anda bisa mengubah `.env` ini melalui Terminal (`nano .env`) atau melalui fungsi **Files** di File Manager aaPanel. Ganti konfigurasi URL dan Database:
   ```env
   APP_NAME="SMKN 8 Surabaya"
   APP_ENV=production
   APP_KEY= # (nanti di-generate otomatis di langkah composer)
   APP_DEBUG=false
   APP_URL=https://domainanda.com # Sesuaikan dengan domain Anda

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=smkn8_db # Nama database dari tahap 2
   DB_USERNAME=smkn8_user # User database dari tahap 2
   DB_PASSWORD=password_yang_kuat # Password dari database tahap 2
   ```

## 6. Install Dependensi (Composer & NPM)

Jalankan perintah berikut di Terminal (pastikan masih di dalam direktori `domainanda.com`):

1. **Install Vendor PHP**:
   ```bash
   composer install --optimize-autoloader --no-dev
   ```
2. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```
3. **Migrate dan Seed Database** (Jika Anda ingin database beserta _dummy data_ langsung masuk):
   ```bash
   php artisan migrate:fresh --seed --force
   ```
   *(Catatan: flag `--force` wajib di *production*)*
4. **Link Storage** (Supaya gambar galeri, profil, dll bisa diakses publik):
   ```bash
   php artisan storage:link
   ```
5. **Install Node.js Packages & Build Assets**:
   *(Jika Node/NPM belum ada di server, *build* di *localhost* Anda (`npm run build`), lalu *commit folder public/build & manifest* ke *git* baru di *pull* di server).*
   Jika di *server* **punya** NodeJS:
   ```bash
   npm install
   npm run build
   ```

## 7. Optimasi Cache Laravel

Agar *website* berjalan kencang:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 8. Mengatur Document Root (Wajib untuk Laravel) & Permissions

1. Di Terminal, atur hak akses *folder* supaya aaPanel/Apache punya akses tulis pada folder vital:
   ```bash
   chown -R www:www /www/wwwroot/smkn8surabaya.abietech.com
   chmod -R 775 /www/wwwroot/domainanda.com/storage
   chmod -R 775 /www/wwwroot/domainanda.com/bootstrap/cache
   ```
2. Kembali ke dashboard aaPanel, masuk ke menu **Website**.
3. Klik pada nama domain *website* Anda, masuk ke tab **Site directory**.
4. Di bagian **Running directory (Run directory)**, ubah *dropdown* pilihan tersebut menjadi `/public`.
   *(Ini mencegah file `.env` bocor dan menetapkan titik masuk Laravel di `/public/index.php`)*.
5. **(Penting - Cegah Error `open_basedir`)**: Di tab *Site directory* yang sama, **hapus centang/hilangkan ceklis** pada opsi **Anti-XSS attack (Cross-domain/Cross-site/open_basedir)**.
   *(Jika opsi ini dibiarkan menyala, PHP hanya boleh membaca file di dalam folder `/public` dan akan error saat `index.php` mencoba memuat file `../vendor/autoload.php` atau `../storage/`).*
6. Klik **Save**.

## 9. Penyesuaian Apache (URL Rewrite / .htaccess)

Di tab pengaturan Website (masih pada _domain_ yang sama), jika di Laravel rute tidak jalan secara mulus di Apache, buka tab **URL rewrite**.
Pilih opsi **laravel** pada _dropdown_ dan simpan. 

Ini akan otomatis menulis *rule*:
```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```
Simpan pengaturan ini.

## 10. Konfigurasi Sertifikat SSL (Opsional tapi Disarankan)

1. Di tab pengaturan Website, masuk ke **SSL**.
2. Pilih sub-tab **Let's Encrypt**.
3. Centang domain Anda dan klik **Apply**.
4. Jika berhasil, centang fitur pojok kanan atas **Force HTTPS** agar *traffic HTTP* di-*redirect* otomatis.

---

### Selesai! 🎉
Silakan coba akses domain Anda di peramban (browser). Website beserta panel *admin*-nya kini seharusnya sudah aktif *(live)*. Jika _asset CSS/JS_ masih ada yang *error/404*, pastikan langkah *NPM Run Build* (Tahap 6 No. 5) dan *Running Directory* ke `/public` (Tahap 8 No. 4) telah diterapkan dengan benar.
