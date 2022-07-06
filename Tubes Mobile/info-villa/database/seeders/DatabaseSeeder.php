<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Villa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'ghilman.zaki1@gmail.com',
            'password' => bcrypt('admin123'),
            'isAdmin' => true,
            'asal' => "",
            'image' => ""
        ]);

        User::create([

            'name' => 'Ghilman Muhammad Zaki',
            'username' => 'ghilmanzaki',
            'email' => 'ghilman.zaki@gmail.com',
            'password' => bcrypt('password'),
            'isAdmin' => false,
            'asal' => "",
            'image' => ""
        ]);

        Villa::create([
            'namaVilla' => 'Villa Parahyangan',
            'lokasi' => 'Bandung',
            'deskripsi' => 'Villa Parahyangan',
            'harga' => '2.000.000',
            'image' => 'https://firebasestorage.googleapis.com/v0/b/infovilla-cba1c.appspot.com/o/villa-hira-pangalengan.png?alt=media&token=270732ee-0308-4477-9117-ac1dcb43e64f'
        ]);

        Villa::create([
            'namaVilla' => 'Villa Griya Nena 1',
            'lokasi' => 'Bogor',
            'deskripsi' => 'Nama Villa: Villa Griya Nena 1
            Lokasi: Jl Taman Safari no 10 desa Kongsi Rt.01/Rw. 07 Cisarua, Bogor
            View: Gunung Gede dan Hutan Cemara
            Luas Tanah: 2400 m2
            Luas Bangunan: 200 m2
            Jumlah Lantai: 1
            Kamar Tidur: 4
            Kamar Mandi: 4 semua dengan water heater
            Maks Jumlah Penghuni: Max. 15 orang
            Details Ruangan:
            Ruang tamu
            Ruang keluarga
            Ruang makan
            Dapur ada dua, 1 dapur bersih di dalam dan 1 dapur kotor di dekat taman
            4 kamar
            4 kamar mandi
            Semua kamar mandi dengan water heater
            Kondisi Villa: Villa baru selesai di bangun Feb 2017. Semua fasilitas bersifat private, tidak ada yang sharing dengan villa lain
            Fasilitas Villa:
            Fasilitas dalam rumah
            LCD tv and karaoke
            Free wifi dan tv kabel
            10 extra bed -free
            Susu sapi segar di pagi hari
            Early check in 09.00 (jika tdk ada tamu sebelumnya) dan late check out 16.00 ( jika tdk ada tamu berikut)
            Peralatan memasak
            Kompor gas dan rice cooker
            Kulkas, dispenser dan free Aqua galon
            Panci, wajan, piring, sendok, garpu
            Fasilitas outing dan olahraga
            Halaman (2400 m) bisa utk outbound
            Kolam renang dua buah :
            Kolam renang dewasa
            Kolam renang anak2
            Lapangan futsal
            Mini camping ground (5 tenda)
            Play ground
            Ayunan
            Gazebo
            Perosotan
            Taman kering dan Area bbq, peralatan bbq dgn arangnya free
            Fasilitas Umum: Tidak ada fasilitas umun, semua adalah fasilitas pribadi (private)
            Fasilitas Sekitar: Tempat wisata terdekat:
            Taman safari 350 m
            Gunung mas (paralayang) 2 km
            Air terjun cilember 1 km
            Pesona Alam 200 m
            Aktivitas:
            Outbond
            Gathering baik keluarga maupun kantor
            Reuni
            Arisan
            Akses ke Lokasi: Dari jalan raya Puncak, masuk dari jalan yang sama untuk ke Taman Safari
            Info Tambahan: Utk menjamin kesehatan tamu, diberlakukan new normal protocol dgn pemnyemprotam disinfektam scr berkala, fasilitas cuci tangan di dlm dan luar rumah, alat pengecekan suhu sbl masuk, senua staff wajib memakai masker
            Harga Sewa:
            Harga normal (bukan high season)
            Jumat – minggu: Rp 3.5 juta/malam
            Senin- kamis : Rp 3 juta/malam
            Diluar harga liburan natal, tahun baru dan lebaran. Krn ada pengurangan jumlah tamu, maka akan diberikan discount
            Hubungi:
            Contact: Ceyla 0822 1195 0868
            Video link : https://youtu.be/T6yZfAHWHu8
            Website : http://griyanena.com/',
            'harga' => '3.000.000',
            'image' => 'https://firebasestorage.googleapis.com/v0/b/infovilla-cba1c.appspot.com/o/villa-griya-nena-1.jpg?alt=media&token=42b388f1-62d7-42cf-b588-f195a8100e28'
        ]);

        Villa::create([
            'namaVilla' => 'Villa Nabilla 99',
            'lokasi' => 'Bogor',
            'deskripsi' => 'Nama Villa: Villa Nabilla 99
            Lokasi: Jl. Taman Safari RT 1/7 Cibeurem, Cisarua, Bogor
            View: Ke At Taawun Puncak dan Gunung Salak
            Luas Tanah: 850 m2
            Luas Bangunan: 220 m2
            Jumlah Lantai: 2 lantai
            Kamar Tidur: 5 kamar tidur
            Kamar Mandi: 5 kamar mandi
            Kondisi Villa: Rapi dan terawat
            Fasilitas Villa: Karaoke, Wi-Fi, TV Parabola, dapur lengkap, free extra bed 10, susu murni 2 liter, tempat pembakaran plus arang, dll
            Fasilitas Umum: Kolam renang, lapangan luas, dekat atm, ke pasar hanya 1.5 km, dekat masjid, ke Ttaman Safari 1 km, ke Seruni 100 m, ke Pesona Alam 70 m, dll
            Aktivitas: Bisa BBQ, futsal di depan villa, karaoke, berenang, dll
            Akses ke Lokasi: Hanya 100 meter dari jalan Taman Safari jalan masuk dua mobil
            Info Tambahan: Apabila lebih dari 50 orang ada yang 6 kamar dan 11 kamar bisa paket Rp 180.000 per orangnya sudah termasuk makan 3x dan snack 1x, menu menyusul
            Harga Sewa:
            Weekend Rp 4 juta per malam
            Weekday Rp 2.5 juta per malam
            Hubungi: 081398881999 (pemilik)
            WhatsApp: 081398881999
            E-mail: Villakamivilla999@gmail.com',
            'harga' => '2.500.000',
            'image' => 'https://firebasestorage.googleapis.com/v0/b/infovilla-cba1c.appspot.com/o/villa-nabilla-99.jpg?alt=media&token=f8adae75-45fd-4a89-8a0c-3bd3414a7107'
        ]);
        Villa::create([
            'namaVilla' => 'Villa Omega',
            'lokasi' => 'Lembang',
            'deskripsi' => 'Nama Villa: Villa Omega
            Lokasi: Jl. Kolonel Masturi No.151 Lembang
            View: Tangkuban Parahu
            Luas Tanah: 350 m2
            Luas Bangunan: 250 m2
            Jumlah Lantai: 2
            Kamar Tidur: 3
            Kamar Mandi: 3
            Kamar Tidur Pembantu: 1
            Kamar Mandi Pembantu: 1
            Maks Jumlah Penghuni: 16 orang
            Details Ruangan: Bangunan depan ruang tamu yang dilengkapi dengan Stage Unique,
            dan di atasnya “Private Bedroom” ruang tidur di bawah atap dengan teras
            di atas yang bisa melihat keindahan Gunung Tangkuban Perahu dan kamar mandi. Ruang makan + kitchen dengan design “Modern Cafe” menghadap ke halaman, lengkap dengan peralatan makan dan dapur, menghubungkan bangunan belakang modern “Family Meeting Room” dengan design “LOFT” di atasnya sebagai ruang tidur utama dan unique bathroom.
            Kondisi Villa: Sangat bersih dan terawat, unique & artistic.
            Fasilitas Villa:
            Peralatan dapur; kompor standing, kulkas, dispenser, BBQ.
            Peralatan makan; komplet untuk 20 orang
            Indovision entertainment
            Free Wifi
            Waterheater
            Extra matras (jika diperlukan)
            Green garden
            Camping tent for kids (jika diperlukan)
            Fish pond (kolam ikan)
            Fasilitas Umum: Modern Cafe Kitchen Area, Multi purpose family room, Gasebo/Tent di teras atas
            Fasilitas Sekitar: Alfamart Minimarket (persis kanan di sebelah vila), Farmhouse (persis disebelah kiri vila), Kampung Legok (5 menit), Sapu Lidi (5 menit), Kampung Daun (10 menit), Kampung Gajah (10 menit), Imah Seniman (10 menint), Kota Lembang (20 menit)
            Aktivitas: Family meeting, gathering, inhouse training, retreat, anniversary, dll
            Akses ke Lokasi: Jl Setiabudi Bandung menuju arah Lembang, setelah Universitas Pendidikan Indonesia (UPI) belok ke kiri Jl Sersan Bajuri lurus terus melalui kampung gajah, kampung daun ketemu pertigaan Jl. Kolonel Masturi kira-kira 500 meter di sebelah kanan jalan Alfamart “Lembang Asri”, vila persis di sebelah Alfamart di main road Jl. Kolonel Masturi No. 151
            Info Tambahan: –
            Harga Sewa:
            Weekday: Rp 3.000.000/malam
            Weekend: Rp 3.500.000/malam
            Libur Nasional, Lebaran, Natal, Tahun Baru: Rp 4.000.000/malam
            Hubungi: Robertus – 08112261964
            WhatsApp: 08112261964
            E-mail: rdwiriawan@yahoo.com',
            'harga' => '3.000.000',
            'image' => 'https://firebasestorage.googleapis.com/v0/b/infovilla-cba1c.appspot.com/o/villa-omega.jpg?alt=media&token=47cf5c3d-1f40-40f1-a41d-da5ba97d7aa1'
        ]);

        Villa::create([
            'namaVilla' => 'Villa Amethyst JB-3',
            'lokasi' => 'Bandung Barat',
            'deskripsi' => 'Nama Villa: Amethyst JB-3
            Lokasi: Jl. Komplek Villa Trinty JB-3, Kec. Parongpong, Kabupaten Bandung Barat, Jawa Barat
            View: View Alam
            Luas Tanah: 350
            Luas Bangunan: 200
            Jumlah Lantai: 2
            Kamar Tidur: 4
            Kamar Mandi: 3
            Maks Jumlah Penghuni: 15
            Details Ruangan:
            Ruang Keluarga
            Ruang Makan 
            Dapur
            4 Kamar Tidur
            3 Kamar Mandi
            Taman
            Carport
            Kondisi Villa: Kondisi masih baru, bersih, rapih dan lengkap dengan fasilitas yang tersedia di villa
            Fasilitas Villa:
            4 Kamar Mandi
            3 Kamar Mandi
            Ruang Keluarga
            Ruang Tamu
            Dapur
            Ruang Makan
            Balkon
            Taman Pribadi
            Private Pool
            Kids Pool
            Hot Tub
            Karoke Set
            Carport
            4 Extra Bed
            AC
            Wifi
            TV Cable
            Water Heater
            Kompor,Kulkas,Rice Cooker
            Alat Masak+Alat Makan
            Dispenser+Air Mineral
            BBQ Set
            Fasilitas Umum: –
            Fasilitas Sekitar: –
            Aktivitas: –
            Akses Lokasi: Kompleks Villa Triniti, Jl Sersan Bajuri 15mnt terminal ledeng, satu kompleks dengan kampung daun dan gedung putih
            Info Tambahan: Villa Amethyst JB-3 merupakan salah satu unit terbaik dari Villa Amethyst Lembang,terletak di lingkungan kompleks Villa Triniti yang asri dengan udara yang sejuk membuat liburan keluarga lebih berkesan,lokasi Villa juga sangat dekat dengan tempat wisata di daerah lembang seperti:
            Jendela Alam :5  mnt ( 1,7 km)
            Dusun Bambu:21 mnt (7,0 km)
            Lembang Park & Zoo :12 mnt (3,7 km)
            Harga Sewa:
            Weekday : Rp.3,000,000
            Weekend : Rp.4,000,000
            Hubungi: 081329026388
            Whatsapp: 081329026388',
            'harga' => '3.000.000',
            'image' => 'https://firebasestorage.googleapis.com/v0/b/infovilla-cba1c.appspot.com/o/villa-amethyst-jb-3.jpg?alt=media&token=27c23610-263b-457e-8a24-5e12bd580e7b'
        ]);
    }
}
