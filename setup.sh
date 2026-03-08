#!/bin/bash

echo "Memulai proses Setup dan Perbaikan Website SMKN 8 Surabaya..."
echo "==========================================================="

echo -e "\n1. Membersihkan sisa-sisa Cache (Ini akan memperbaiki error 404 Livewire / Admin)"
php artisan optimize:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

echo -e "\n2. Mengatur ulang Symlink Storage (Agar foto galeri bisa diakses)"
php artisan storage:link

echo -e "\n3. Melakukan sinkronisasi Database & Memasukkan Konten Dummy Lengkap"
echo "Mohon tunggu, proses ini akan membuat tabel dan menyuntikkan menu, halaman, fasilitas, guru, ekskul, galeri, dan pengaturan."
php artisan migrate:fresh --seed --force

echo -e "\n==========================================================="
echo "Setup selesai 100%! Website siap digunakan tanpa error."
echo -e "\nKredensial Login Administrator:"
echo "Email    : admin@smkn8surabaya.sch.id"
echo "Password : password"
echo -e "\nSilakan cek website Anda sekarang! Jangan lupa hard refresh (Ctrl+F5) di browser."
