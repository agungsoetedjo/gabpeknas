<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DPDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dpd_cabang')->insert([
            ["kode_provinsi" => "11", "kab_kota" => "Banda Aceh", "alamat" => "Jl. Tgk. Chik Ditiro No. 101", "nama_ketua" => "Yusri MJ", "nama_sekretaris" => "Sukri Ibrahim", "nama_bendahara" => "Agus Munawar, ST"],
            ["kode_provinsi" => "12", "kab_kota" => "Medan", "alamat" => "Jl. Pelangi No. 26 Teladan", "nama_ketua" => "Ir. Arnold Togi Panggabean", "nama_sekretaris" => "Khalikul Bahri, ST", "nama_bendahara" => "Jhon Charles Manurung, ST"],
            ["kode_provinsi" => "13", "kab_kota" => "Padang", "alamat" => "Jl. Pemuda Dalam No 11B, RT 01/01 Kel. Olo, Kec. Padang Barat", "nama_ketua" => "Ir. Suparman, SH. M.Si. MH.", "nama_sekretaris" => "Astinarti, SH. ", "nama_bendahara" => "Drs. Yurnalis Anas, MM. "],
            ["kode_provinsi" => "14", "kab_kota" => "Pekanbaru", "alamat" => "Jl. Parit Indah/Datuk Setia Maharaja Kompleks SMK Manajemen Penerbangan Blok B-2 Tangkerang Selatan - Bukit Raya", "nama_ketua" => "Edwin Syarif, S.Si", "nama_sekretaris" => "Jhon Mainier, S. Si", "nama_bendahara" => "Edison Siahaan, MBA"],
            ["kode_provinsi" => "21", "kab_kota" => "Kota Batam", "alamat" => "Ruko Green Land Blok F 2 No. 7 (Belakang Sekolah Global Asia)", "nama_ketua" => "Rional Putra, SH. MH.", "nama_sekretaris" => "Arief Kurniawan, SH, S.Kom.", "nama_bendahara" => "Greg Sembiring, SH."],
            ["kode_provinsi" => "15", "kab_kota" => "Jambi", "alamat" => "Jl. Guru Muchtar RT.008 Kel. Jelutung", "nama_ketua" => "ABDUL GAFUR, SE.", "nama_sekretaris" => "ADI MARZUKI.", "nama_bendahara" => "NONA WIDYA ASTUTI."],
            ["kode_provinsi" => "16", "kab_kota" => "Palembang", "alamat" => "Jl. Perintis Kemerdekaan No. 779", "nama_ketua" => "H. Iskandar Syamwell, SE", "nama_sekretaris" => "H. Ferdi Ali Gafur, SP. ST", "nama_bendahara" => "Kasman"],
            ["kode_provinsi" => "19", "kab_kota" => "Pangkal Pinang", "alamat" => "Jl. KH. Hasan Basri Sulaiman, Ruko No. 8, Kel. Batin Tikal - Kec. Taman Sari", "nama_ketua" => "Drs. H. Asmawie Asmad, BE. M.Sc", "nama_sekretaris" => "Marta Diansyah, ST.", "nama_bendahara" => "Solihin, SH"],
            ["kode_provinsi" => "17", "kab_kota" => "Tanah Patah", "alamat" => "REMOX BUILDING Lt. 2 Jl. Sutoyo No. 33", "nama_ketua" => "Drs. Tantawi Dali, MM", "nama_sekretaris" => "Zainal Arifin, S.Sos", "nama_bendahara" => "Fera Salmasari, SE"],
            ["kode_provinsi" => "18", "kab_kota" => "Bandar Lampung", "alamat" => "Jl. Gatot Subroto Gg. Merawan No. 6 Pahoman (Depan TK Pembina)", "nama_ketua" => "Topan Napitupulu, Bsc", "nama_sekretaris" => "Rahmad Roni, S. Sos", "nama_bendahara" => "Ardo Adam Saputra, SE"],
            ["kode_provinsi" => "36", "kab_kota" => "Serang", "alamat" => "Komplek Pasir Indah Jl. Apel  Blok D/113 Kaligandu", "nama_ketua" => "H. TB. Dede Sutardi Bioel", "nama_sekretaris" => "H. Yayat Hasrat Triana, SH", "nama_bendahara" => "E. Humaeroh."],
            ["kode_provinsi" => "31", "kab_kota" => "Jakarta Timur", "alamat" => "Jl. Pemuda No. 130, Lt. 3      ", "nama_ketua" => "Mulyadi Guntur Aritonang", "nama_sekretaris" => "Yanes Hutajulu", "nama_bendahara" => "Jimmy Amos Panusunan Hutahuruk"],
            ["kode_provinsi" => "32", "kab_kota" => "Bandung", "alamat" => "Komplek Surapati Core F8, Jln. PHH. MUSTOPA No. 39 Kel. Pasirlayung, Kec. Cibeunying Kidul", "nama_ketua" => "Amri.", "nama_sekretaris" => "Dede Juanda. ", "nama_bendahara" => "Lina Marlina."],
            ["kode_provinsi" => "33", "kab_kota" => "Semarang", "alamat" => "Jl. Jatingaleh 1 No. 53   RT. 07/03 Kel. Ngesrep - Banyumanik", "nama_ketua" => "H. Purwito", "nama_sekretaris" => "Harry Swandana", "nama_bendahara" => "H. Mundakir"],
            ["kode_provinsi" => "34", "kab_kota" => "D.I. Yogyakarta", "alamat" => "Jl. Wiyoro Lor No. 26, Banguntapan - Bantul", "nama_ketua" => "Banar Ponijo", "nama_sekretaris" => "Dimas S.E.W. Sumunar, S.Kep. Ns", "nama_bendahara" => "Pawita Lestari, A.Md. TL"],
            ["kode_provinsi" => "35", "kab_kota" => "Surabaya", "alamat" => "Jl. Gayung Sari Barat III No. 50 ", "nama_ketua" => "H. R. Ali Badri Zaini", "nama_sekretaris" => "Ir. H. Suhariono", "nama_bendahara" => "RH. Imam Royani"],
            ["kode_provinsi" => "52", "kab_kota" => "Lombok Tengah", "alamat" => "Jl. Sukarno Hatta No. 31 (depan quick chicken) Kauman Praya ", "nama_ketua" => "Ir. Lalu Satriawardi, MM", "nama_sekretaris" => "Ir. Arief Syafrudi, MT", "nama_bendahara" => "Baiq Intan Aryaning, SE"],
            ["kode_provinsi" => "53", "kab_kota" => "Kupang", "alamat" => "Jl. Frans Seda No. 33 (depan POLRESTA - Walikota) ", "nama_ketua" => "Bobby Hartono Tantoyo, SH", "nama_sekretaris" => "Manuel Octavianus", "nama_bendahara" => "Enggelina H. Saubaki"],
            ["kode_provinsi" => "65", "kab_kota" => "Tarakan", "alamat" => "Jl. Cendawan Beringin 1, RT.09 No.52 Kel. Selumit Pantai", "nama_ketua" => "Jalaluddin A. Rahman", "nama_sekretaris" => "Husni Mubarak.", "nama_bendahara" => "H. Anshar"],
            ["kode_provinsi" => "61", "kab_kota" => "Pontianak", "alamat" => "Jl. Abdurrahman Saleh Komp. Taman Permata Indah Blok A.3 Lt II", "nama_ketua" => "H. Maspoero Hady Nuryanto.", "nama_sekretaris" => "Ir. Restu Gunawan", "nama_bendahara" => "Nanang Setiabudi, S. Sos."],
            ["kode_provinsi" => "64", "kab_kota" => "Samarinda", "alamat" => "Jl. A. Yani II No.10A, RT. 03", "nama_ketua" => "Jalalluddin AR.", "nama_sekretaris" => "Ir. Agus Purwanto", "nama_bendahara" => "Hj. Raodah"],
            ["kode_provinsi" => "71", "kab_kota" => "Manado", "alamat" => "Jl. Ringroad Citraland Miracle Walk 302/07. Kel. Bumi Nyiur", "nama_ketua" => "Nunung Tangi.", "nama_sekretaris" => "Jimmy H. Senduk.", "nama_bendahara" => "Irwan Hawan, SE. MA."],
            ["kode_provinsi" => "76", "kab_kota" => "Mamuju", "alamat" => "Jl. Sukarno Hatta No. 27 E", "nama_ketua" => "Ir. HR. Muhammad Yamin. ", "nama_sekretaris" => "Syahiluddin, S.Pd. ", "nama_bendahara" => "M. Said."],
            ["kode_provinsi" => "73", "kab_kota" => "Makassar", "alamat" => "Komp. Permata Hijau Permai Blok J No. 34 A Lt.1 Jln. Hertasning Baru, Kel. Kassi-Kassi, Kec. Rappocini", "nama_ketua" => "Ir. Rahman Lado.", "nama_sekretaris" => "Arman, SE.Ak.", "nama_bendahara" => "Andi Sutradiana Faisal, SE."],
            ["kode_provinsi" => "75", "kab_kota" => "Gorontalo", "alamat" => "Jl. Prof. HB. Jassin No. 501 Palubala - Kec. Kota Tengah", "nama_ketua" => "Djaber Tangoi.", "nama_sekretaris" => "Irwan Rasjid, A.Md.", "nama_bendahara" => "Erni Talib, SE."],
            ["kode_provinsi" => "81", "kab_kota" => "Ambon", "alamat" => "Jl. A. Y. Patty No. 87", "nama_ketua" => "Amir G. Latuconsina.", "nama_sekretaris" => "Thommy Latumahina, ST.", "nama_bendahara" => "Yanni Tjowasi."],
            ["kode_provinsi" => "82", "kab_kota" => "Maluku Utara", "alamat" => "Jl. Cempaka No. 631  RT. 013/004  Kel. Maliaro (Depan RSUD Ternate Tengah)", "nama_ketua" => "Drs. Gamaludin A. Gafur", "nama_sekretaris" => "Adnan J. Hirto", "nama_bendahara" => "M. Yani Achmad"],
            ["kode_provinsi" => "91", "kab_kota" => "Manokwari", "alamat" => "Jl. Trikora Wosi, RT. 003 / 001, Belakang Hotel Valdos ", "nama_ketua" => "Eed Junaedi, SH. MM.", "nama_sekretaris" => "Ir. Didik Sumaryono.", "nama_bendahara" => "Andri Eka Edyani."],
            ["kode_provinsi" => "94", "kab_kota" => "Jayapura", "alamat" => "Jln Amphibi Komp. Wajib Senyum, RT.004, RW.008", "nama_ketua" => "Yonater Karoba", "nama_sekretaris" => "Pdt. Diben Elaby, S.Th.", "nama_bendahara" => "Arief Effendi"],
        ]);
    }
}
