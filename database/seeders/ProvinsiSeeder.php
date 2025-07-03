<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinsi')->insert([
            ['kode' => '11','nama' => 'Aceh','nama_singkat' => 'Aceh','nama_lain' => 'Aceh','kode_provinsi_lama' => '1','aktif' => '1'],
            ['kode' => '12','nama' => 'Sumatera Utara','nama_singkat' => 'Sumut','nama_lain' => 'Sumatera Utara','kode_provinsi_lama' => '2','aktif' => '1'],
            ['kode' => '13','nama' => 'Sumatera Barat','nama_singkat' => 'Sumbar','nama_lain' => 'Sumatera Barat','kode_provinsi_lama' => '3','aktif' => '1'],
            ['kode' => '14','nama' => 'Riau','nama_singkat' => 'Riau','nama_lain' => 'Riau','kode_provinsi_lama' => '4','aktif' => '1'],
            ['kode' => '15','nama' => 'Jambi','nama_singkat' => 'Jambi','nama_lain' => 'Jambi','kode_provinsi_lama' => '5','aktif' => '1'],
            ['kode' => '16','nama' => 'Sumatera Selatan','nama_singkat' => 'Sumsel','nama_lain' => 'Sumatera Selatan','kode_provinsi_lama' => '6','aktif' => '1'],
            ['kode' => '17','nama' => 'Bengkulu','nama_singkat' => 'Bengkulu','nama_lain' => 'Bengkulu','kode_provinsi_lama' => '7','aktif' => '1'],
            ['kode' => '18','nama' => 'Lampung','nama_singkat' => 'Lampung','nama_lain' => 'Lampung','kode_provinsi_lama' => '8','aktif' => '1'],
            ['kode' => '19','nama' => 'Kepulauan Bangka Belitung','nama_singkat' => 'Babel','nama_lain' => 'Kepulauan Bangka Belitung','kode_provinsi_lama' => '30','aktif' => '1'],
            ['kode' => '21','nama' => 'Kepulauan Riau','nama_singkat' => 'Kepri','nama_lain' => 'Kepulauan Riau','kode_provinsi_lama' => '31','aktif' => '1'],
            ['kode' => '31','nama' => 'DKI Jakarta','nama_singkat' => 'Jakarta','nama_lain' => 'Jakarta','kode_provinsi_lama' => '9','aktif' => '1'],
            ['kode' => '32','nama' => 'Jawa Barat','nama_singkat' => 'Jabar','nama_lain' => 'Jawa Barat','kode_provinsi_lama' => '10','aktif' => '1'],
            ['kode' => '33','nama' => 'Jawa Tengah','nama_singkat' => 'Jateng','nama_lain' => 'Jawa Tengah','kode_provinsi_lama' => '11','aktif' => '1'],
            ['kode' => '34','nama' => 'DI Yogyakarta','nama_singkat' => 'Yogya','nama_lain' => 'Yogyakarta','kode_provinsi_lama' => '12','aktif' => '1'],
            ['kode' => '35','nama' => 'Jawa Timur','nama_singkat' => 'Jatim','nama_lain' => 'Jawa Timur','kode_provinsi_lama' => '13','aktif' => '1'],
            ['kode' => '36','nama' => 'Banten','nama_singkat' => 'Banten','nama_lain' => 'Banten','kode_provinsi_lama' => '28','aktif' => '1'],
            ['kode' => '51','nama' => 'Bali','nama_singkat' => 'Bali','nama_lain' => 'Bali','kode_provinsi_lama' => '22','aktif' => '1'],
            ['kode' => '52','nama' => 'Nusa Tenggara Barat','nama_singkat' => 'NTB','nama_lain' => 'Nusa Tenggara Barat','kode_provinsi_lama' => '23','aktif' => '1'],
            ['kode' => '53','nama' => 'Nusa Tenggara Timur','nama_singkat' => 'NTT','nama_lain' => 'Nusa Tenggara Timur','kode_provinsi_lama' => '24','aktif' => '1'],
            ['kode' => '61','nama' => 'Kalimantan Barat','nama_singkat' => 'Kalbar','nama_lain' => 'Kalimantan Barat','kode_provinsi_lama' => '14','aktif' => '1'],
            ['kode' => '62','nama' => 'Kalimantan Tengah','nama_singkat' => 'Kaltim','nama_lain' => 'Kalimantan Tengah','kode_provinsi_lama' => '15','aktif' => '1'],
            ['kode' => '63','nama' => 'Kalimantan Selatan','nama_singkat' => 'Kalsel','nama_lain' => 'Kalimantan Selatan','kode_provinsi_lama' => '16','aktif' => '1'],
            ['kode' => '64','nama' => 'Kalimantan Timur','nama_singkat' => 'Kaltim','nama_lain' => 'Kalimantan Timur','kode_provinsi_lama' => '17','aktif' => '1'],
            ['kode' => '65','nama' => 'Kalimantan Utara','nama_singkat' => 'Kalut','nama_lain' => 'Kalimantan Utara','kode_provinsi_lama' => '34','aktif' => '1'],
            ['kode' => '71','nama' => 'Sulawesi Utara','nama_singkat' => 'Sulut','nama_lain' => 'Sulawesi Utara','kode_provinsi_lama' => '18','aktif' => '1'],
            ['kode' => '72','nama' => 'Sulawesi Tengah','nama_singkat' => 'Sulteng','nama_lain' => 'Sulawesi Tengah','kode_provinsi_lama' => '19','aktif' => '1'],
            ['kode' => '73','nama' => 'Sulawesi Selatan','nama_singkat' => 'Sulsel','nama_lain' => 'Sulawesi Selatan','kode_provinsi_lama' => '20','aktif' => '1'],
            ['kode' => '74','nama' => 'Sulawesi Tenggara','nama_singkat' => 'Sulteng','nama_lain' => 'Sulawesi Tenggara','kode_provinsi_lama' => '21','aktif' => '1'],
            ['kode' => '75','nama' => 'Gorontalo','nama_singkat' => 'Gorontalo','nama_lain' => 'Gorontalo','kode_provinsi_lama' => '29','aktif' => '1'],
            ['kode' => '76','nama' => 'Sulawesi Barat','nama_singkat' => 'Sulbar','nama_lain' => 'Sulawesi Barat','kode_provinsi_lama' => '33','aktif' => '1'],
            ['kode' => '81','nama' => 'Maluku','nama_singkat' => 'Maluku','nama_lain' => 'Maluku','kode_provinsi_lama' => '25','aktif' => '1'],
            ['kode' => '82','nama' => 'Maluku Utara','nama_singkat' => 'Malut','nama_lain' => 'Maluku Utara','kode_provinsi_lama' => '27','aktif' => '1'],
            ['kode' => '91','nama' => 'Papua Barat','nama_singkat' => 'Pabar','nama_lain' => 'Papua Barat','kode_provinsi_lama' => '32','aktif' => '1'],
            ['kode' => '92','nama' => 'Papua Tengah','nama_singkat' => 'Pateng','nama_lain' => 'Papua Tengah','kode_provinsi_lama' => '94','aktif' => '1'],
            ['kode' => '93','nama' => 'Papua Selatan','nama_singkat' => 'Pasel','nama_lain' => 'Papua Selatan','kode_provinsi_lama' => '93','aktif' => '1'],
            ['kode' => '94','nama' => 'Papua','nama_singkat' => 'Papua','nama_lain' => 'Papua','kode_provinsi_lama' => '26','aktif' => '1'],
            ['kode' => '95','nama' => 'Papua Pegunungan','nama_singkat' => 'Papeg','nama_lain' => 'Papua Pegunungan','kode_provinsi_lama' => '95','aktif' => '1'],
            ['kode' => '96','nama' => 'Papua Barat Daya','nama_singkat' => 'Padaya','nama_lain' => 'Papua Barat Daya','kode_provinsi_lama' => '96','aktif' => '1'],
        ]);
    }
}
