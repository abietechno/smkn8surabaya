<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Profil Sekolah',
                'slug' => 'profil',
                'is_active' => true,
                'content' => '
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Sejarah Singkat SMKN 8 Surabaya</h2>
                    <p class="mb-4 text-gray-600 leading-relaxed">SMK Negeri 8 Surabaya merupakan salah satu sekolah kejuruan terkemuka di Jawa Timur yang didirikan pada tahun 1978. Pada awalnya, sekolah ini fokus pada bidang pariwisata dan kerumah-tanggaan. Seiring berjalannya waktu dan perkembangan teknologi, SMKN 8 bertransformasi menjadi pusat pendidikan vokasi yang berkarakter, mengedepankan inovasi, dan siap menjawab tantangan industri kreatif maupun teknologi modern.</p>
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2670&auto=format&fit=crop" class="w-full h-64 object-cover rounded-xl mb-6 shadow-sm" alt="Gedung Sekolah">
                    
                    <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Visi</h3>
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded mb-6 text-gray-700 italic">"Terwujudnya Lulusan yang Beriman, Bertaqwa, Berkarakter, Kompeten di Bidangnya, Berjiwa Wirausaha, dan Berwawasan Lingkungan serta Mampu Bersaing di Era Globalisasi."</div>

                    <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Misi</h3>
                    <ul class="list-disc pl-5 mb-6 text-gray-600 space-y-2">
                        <li>Meningkatkan keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa.</li>
                        <li>Mengembangkan sikap profesional dan kompetensi peserta didik sesuai dengan bidang keahliannya.</li>
                        <li>Membekali peserta didik dengan keterampilan kewirausahaan (entrepreneurship).</li>
                        <li>Menjalin kemitraan yang kuat dengan Dunia Usaha dan Dunia Industri (DUDI).</li>
                        <li>Mewujudkan lingkungan sekolah yang bersih, hijau, dan kondusif untuk belajar (Adiwiyata).</li>
                    </ul>
                '
            ],
            [
                'title' => 'Identitas Sekolah',
                'slug' => 'identitas',
                'is_active' => true,
                'content' => '
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Identitas Lengkap Sekolah</h2>
                    <div class="overflow-x-auto bg-white rounded-lg shadow-sm border border-gray-100">
                        <table class="w-full text-left border-collapse">
                            <tbody>
                                <tr class="border-b"><th class="py-3 px-4 bg-gray-50 w-1/3 text-gray-700">Nama Sekolah</th><td class="py-3 px-4 text-gray-600">SMK Negeri 8 Surabaya</td></tr>
                                <tr class="border-b"><th class="py-3 px-4 bg-gray-50 text-gray-700">NPSN</th><td class="py-3 px-4 text-gray-600">205322xx (Contoh)</td></tr>
                                <tr class="border-b"><th class="py-3 px-4 bg-gray-50 text-gray-700">Status Sekolah</th><td class="py-3 px-4 text-gray-600">Negeri</td></tr>
                                <tr class="border-b"><th class="py-3 px-4 bg-gray-50 text-gray-700">Akreditasi</th><td class="py-3 px-4 font-bold text-green-600">A (Unggul)</td></tr>
                                <tr class="border-b"><th class="py-3 px-4 bg-gray-50 text-gray-700">SK Pendirian Sekolah</th><td class="py-3 px-4 text-gray-600">No. 123/Kep/1978</td></tr>
                                <tr class="border-b"><th class="py-3 px-4 bg-gray-50 text-gray-700">Kepala Sekolah</th><td class="py-3 px-4 text-gray-600">Bpk. Ahmad Hidayat Ali, M.Pd</td></tr>
                                <tr class="border-b"><th class="py-3 px-4 bg-gray-50 text-gray-700">Alamat Lengkap</th><td class="py-3 px-4 text-gray-600">Jl. Kamboja No.18, Surabaya, Jawa Timur, Kode Pos: 60272</td></tr>
                                <tr><th class="py-3 px-4 bg-gray-50 text-gray-700">Nomor Telepon</th><td class="py-3 px-4 text-gray-600">(031) 8291431</td></tr>
                            </tbody>
                        </table>
                    </div>
                '
            ],
            [
                'title' => 'Fasilitas Unggulan',
                'slug' => 'fasilitas-unggulan',
                'is_active' => true,
                'content' => '
                    <p class="text-lg text-gray-600 mb-8 max-w-3xl">Kami menyadari bahwa kompetensi yang baik dihasilkan dari fasilitas praktik yang memadai. SMKN 8 Surabaya terus berupaya memfasilitasi setiap unit kerja dengan alat standar industri.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div class="bg-gray-50 rounded-xl overflow-hidden border border-gray-100">
                            <img src="https://images.unsplash.com/photo-1581092921461-eab62e97a780?q=80&w=2670&auto=format&fit=crop" alt="Lab Komputer" class="w-full h-48 object-cover">
                            <div class="p-5">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Laboratorium Komputer & RPL</h3>
                                <p class="text-gray-600 text-sm">Dilengkapi dengan iMac dan PC High-end Spesifikasi Render Industri, digunakan untuk jurusan Rekayasa Perangkat Lunak dan Multimedia.</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-xl overflow-hidden border border-gray-100">
                            <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=2669&auto=format&fit=crop" alt="Bengkel Otomotif" class="w-full h-48 object-cover">
                            <div class="p-5">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Bengkel Praktik Industri</h3>
                                <p class="text-gray-600 text-sm">Bekerjasama langsung dengan brand ternama, menghadirkan workshop yang mensimulasikan lingkungan industri secara realistis.</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-xl overflow-hidden border border-gray-100">
                            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=2670&auto=format&fit=crop" alt="Perpustakaan Digital" class="w-full h-48 object-cover">
                            <div class="p-5">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Perpustakaan Digital</h3>
                                <p class="text-gray-600 text-sm">Ribuan koleksi E-Book, E-Journal, dan buku fisik yang nyaman untuk menunjang literasi siswa.</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-xl overflow-hidden border border-gray-100">
                            <img src="https://images.unsplash.com/photo-1519451121118-2e86d0801826?q=80&w=2670&auto=format&fit=crop" alt="Lapangan Olahraga" class="w-full h-48 object-cover">
                            <div class="p-5">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Pusat Olahraga & Kesenian</h3>
                                <p class="text-gray-600 text-sm">Fasilitas bagi siswa untuk mengembangkan bakat Non-akademik di bidang Basket, Voli, Tari, dan lainnya.</p>
                            </div>
                        </div>
                    </div>
                '
            ],
            [
                'title' => 'Kontak Kami',
                'slug' => 'kontak',
                'is_active' => true,
                'content' => '
                    <div class="text-center mb-10">
                        <p class="text-lg text-gray-600">Silakan hubungi kami untuk informasi terkait Pendaftaran Siswa Baru (PPDB), Kemitraan Industri, atau pertanyaan lainnya. Anda juga dapat mengunjungi langsung sekolah kami pada jam kerja.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                        <div class="bg-blue-50 p-6 rounded-xl text-center border border-blue-100">
                            <div class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-1">Telepon</h4>
                            <p class="text-gray-600">(031) 8291431</p>
                            <p class="text-sm text-gray-500 mt-2">Senin - Jumat, 08:00 - 15:00 WIB</p>
                        </div>
                        <div class="bg-blue-50 p-6 rounded-xl text-center border border-blue-100">
                            <div class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-1">Email Resmi</h4>
                            <p class="text-gray-600">info@smkn8surabaya.sch.id</p>
                            <p class="text-sm text-gray-500 mt-2">Kami merespons 1x24 Jam kerja</p>
                        </div>
                        <div class="bg-blue-50 p-6 rounded-xl text-center border border-blue-100">
                            <div class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-1">Alamat</h4>
                            <p class="text-gray-600">Jl. Kamboja No.18, Surabaya</p>
                            <p class="text-sm text-gray-500 mt-2">Jawa Timur, Indonesia</p>
                        </div>
                    </div>
                '
            ],
            [
                'title' => 'Unit Kerja',
                'slug' => 'unit-kerja',
                'is_active' => true,
                'content' => '
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Struktur dan Unit Kerja</h2>
                    <p class="text-lg text-gray-600 mb-8">Untuk mendukung kelancaran operasional dan pelayanan prima, SMKN 8 Surabaya membagi tugas dan fungsi ke dalam beberapa unit kerja profesional.</p>
                    
                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                            <h3 class="text-xl font-bold text-blue-600 mb-2">1. Unit Hubungan Industri (Hubin) & Bursa Kerja Khusus (BKK)</h3>
                            <p class="text-gray-600">Bertanggung jawab membangun kemitraan strategis dengan perusahaan dan dunia industri untuk penyelarasan kurikulum, sinkronisasi kompetensi, pelaksanaan Praktik Kerja Lapangan (PKL), serta penyaluran lulusan ke dunia kerja.</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                            <h3 class="text-xl font-bold text-blue-600 mb-2">2. Unit Kurikulum</h3>
                            <p class="text-gray-600">Mengelola sistem pembelajaran, penyusunan jadwal pelajaran, pengawasan pelaksanaan PBM (Proses Belajar Mengajar), dan evaluasi ketuntasan belajar siswa agar selalu *up-to-date* dengan kebutuhan zaman.</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                            <h3 class="text-xl font-bold text-blue-600 mb-2">3. Unit Kesiswaan</h3>
                            <p class="text-gray-600">Membina karakter siswa, memfasilitasi kegiatan ekstrakurikuler, menegakkan kedisiplinan (tata tertib), serta mengembangkan kepemimpinan siswa melalui organisasi sekolah (OSIS, Pramuka, dll).</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                            <h3 class="text-xl font-bold text-blue-600 mb-2">4. Unit Sarana dan Prasarana</h3>
                            <p class="text-gray-600">Mengelola aset sekolah, merencanakan pengadaan barang, serta melakukan pemeliharaan rutin laboratorium, bengkel praktik, perpustakaan, dan segala fasilitas penunjang belajar.</p>
                        </div>
                    </div>
                '
            ],
            [
                'title' => 'Informasi Publik & Akademik',
                'slug' => 'informasi',
                'is_active' => true,
                'content' => '
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Pusat Informasi</h2>
                    <p class="text-lg text-gray-600 mb-8 max-w-2xl">Dapatkan informasi terbaru mengenai kalender akademik, tata tertib, aturan sekolah, dan pengumuman-pengumuman penting lainnya.</p>
                    
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded-lg mb-8">
                        <h4 class="font-bold text-blue-800 text-lg mb-2">Jadwal Pengambilan Raport Semester Ganjil 2024/2025</h4>
                        <p class="text-blue-700 mb-4">Pengambilan raport akan dilaksanakan pada tanggal 20 Desember 2024 pukul 08.00 WIB s/d Selesai, bertempat di aula utama sekolah.</p>
                        <a href="#" class="inline-block px-4 py-2 bg-blue-600 text-white rounded text-sm hover:bg-blue-700 transition">Baca Selengkapnya -></a>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-800 mt-8 mb-4">Brosur & Panduan</h3>
                    <ul class="list-disc pl-5 mb-6 text-gray-600 space-y-2">
                        <li><a href="#" class="text-primary hover:underline font-medium">Buku Panduan Tata Tertib Siswa (PDF)</a></li>
                        <li><a href="#" class="text-primary hover:underline font-medium">Kalender Akademik 2024/2025 (PDF)</a></li>
                        <li><a href="#" class="text-primary hover:underline font-medium">Prosedur Pengajuan Beasiswa (PDF)</a></li>
                    </ul>
                '
            ],
            [
                'title' => 'Info Kelulusan Siswa',
                'slug' => 'kelulusan',
                'is_active' => true,
                'content' => '
                    <div class="text-center py-12 px-4 max-w-3xl mx-auto">
                        <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Pengumuman Kelulusan</h2>
                        <p class="text-lg text-gray-600 mb-8">Portal ini digunakan untuk mengecek status kelulusan siswa kelas XII yang telah mengikuti serangkaian Ujian Sekolah dan Uji Kompetensi Keahlian.</p>
                        
                        <div class="bg-yellow-50 border border-yellow-200 p-6 rounded-xl mb-8 text-left">
                            <h4 class="font-bold text-yellow-800 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                Perhatian Saat Pengumuman
                            </h4>
                            <p class="text-yellow-700 text-sm">Siswa dilarang keras melakukan aksi konvoi di jalan raya, mencoret-coret seragam, maupun tindakan mengganggu ketertiban umum lainnya. Pelanggaran atas imbauan ini akan diberikan sanksi tegas hingga penundaan penyerahan ijazah.</p>
                        </div>
                        
                        <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100 max-w-md mx-auto">
                            <h3 class="text-xl font-bold text-gray-800 mb-6">Cek Status Anda</h3>
                            <form>
                                <div class="mb-4 text-left">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">NISN Siswa</label>
                                    <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Masukkan 10 digit NISN">
                                    <p class="text-xs text-gray-500 mt-1">*Fitur ini akan diaktifkan pada tanggal penetapan kelulusan.</p>
                                </div>
                                <button type="button" class="w-full bg-primary hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors cursor-not-allowed opacity-70">
                                    Cek Kelulusan
                                </button>
                            </form>
                        </div>
                    </div>
                '
            ],
            [
                'title' => 'Pendaftaran Siswa Baru (PSB) / PPDB 2025',
                'slug' => 'psb-2025',
                'is_active' => true,
                'content' => '
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Penerimaan Peserta Didik Baru (PPDB) Tahun 2025</h2>
                    
                    <div class="bg-blue-600 text-white p-8 rounded-2xl mb-10 text-center shadow-lg relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                        <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                        <h3 class="text-2xl font-bold mb-4 relative z-10">Pendaftaran Akan Segera Dibuka!</h3>
                        <p class="text-blue-100 text-lg mb-6 relative z-10 max-w-2xl mx-auto">Mari bergabung dan menjadi bagian dari generasi berprestasi dan siap kerja bersama SMKN 8 Surabaya. Persiapkan diri Anda dari sekarang.</p>
                        <div class="inline-flex space-x-4 relative z-10">
                            <button class="bg-white text-blue-600 font-bold py-3 px-8 rounded-full hover:bg-gray-100 transition shadow-md">Daftar Sekarang</button>
                            <button class="bg-blue-500 border border-blue-400 text-white font-bold py-3 px-8 rounded-full hover:bg-blue-400 transition">Brosur PPDB</button>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-12">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">Jalur Pendaftaran</h3>
                            <ul class="space-y-4 text-gray-600 mt-6">
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold mr-4">1</div>
                                    <div>
                                        <h4 class="font-bold text-gray-800 text-lg">Jalur Prestasi</h4>
                                        <p class="text-sm">Ditujukan bagi calon siswa yang memiliki sertifikat kejuaraan Akademik maupun Non-Akademik min. tingkat Kabupaten/Kota.</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold mr-4">2</div>
                                    <div>
                                        <h4 class="font-bold text-gray-800 text-lg">Jalur Afirmasi & Inklusi</h4>
                                        <p class="text-sm">Bagi calon siswa dari keluarga tidak mampu yang terdaftar di sistem pemerintah pusat (KIP/PKH).</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold mr-4">3</div>
                                    <div>
                                        <h4 class="font-bold text-gray-800 text-lg">Jalur Zonasi</h4>
                                        <p class="text-sm">Memberikan prioritas jarak domisili terdekat dengan lingkungan sekolah (dibuktikan dengan Kartu Keluarga).</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold mr-4">4</div>
                                    <div>
                                        <h4 class="font-bold text-gray-800 text-lg">Jalur Prestasi Nilai Rapor</h4>
                                        <p class="text-sm">Seleksi murni berdasarkan akumulasi nilai rapor SMP/sederajat semester 1 hingga 5.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Kompetensi Keahlian (Jurusan)</h3>
                            <p class="text-gray-600 mb-6">Berikut adalah prodi yang dapat Anda pilih:</p>
                            <div class="space-y-3">
                                <div class="p-3 bg-white border rounded shadow-sm flex items-center">
                                    <svg class="w-6 h-6 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                                    <span class="font-medium text-gray-700">Rekayasa Perangkat Lunak (RPL)</span>
                                </div>
                                <div class="p-3 bg-white border rounded shadow-sm flex items-center">
                                    <svg class="w-6 h-6 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    <span class="font-medium text-gray-700">Desain Komunikasi Visual (DKV)</span>
                                </div>
                                <div class="p-3 bg-white border rounded shadow-sm flex items-center">
                                    <svg class="w-6 h-6 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                    <span class="font-medium text-gray-700">Teknik Komputer & Jaringan (TKJ)</span>
                                </div>
                                <div class="p-3 bg-white border rounded shadow-sm flex items-center">
                                    <svg class="w-6 h-6 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    <span class="font-medium text-gray-700">Otomatisasi & Tata Kelola Perkantoran (OTKP)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                '
            ],
        ];

        foreach ($pages as $p) {
            \App\Models\Page::updateOrCreate(
                ['slug' => $p['slug']],
                [
                    'title' => $p['title'],
                    'is_active' => $p['is_active'],
                    'content' => $p['content']
                ]
            );
        }
    }
}
