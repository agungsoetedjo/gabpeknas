<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'question' => 'Apa itu GABPEKNAS ?',
                'answer' => 'GABPEKNAS (Gabungan Perusahaan Konstruksi Nasional) adalah Asosiasi Perusahaan Kontraktor Nasional yang berdiri sejak tahun 2001 di Jakarta Timur. Saat ini anggota GABPEKNAS sebanyak 19.739 perusahaan kontraktor, terdiri dari golongan kecil, menengah dan besar yang tersebar di seluruh Indonesia.',
            ],
            [
                'question' => 'Bagaimana cara bergabung dengan GABPEKNAS ?',
                'answer' => 'Anda dapat bergabung dengan mengisi formulir pendaftaran keanggotaan melalui situs resmi GABPEKNAS dan melengkapi dokumen yang dibutuhkan.',
            ],
            [
                'question' => 'Apa manfaat menjadi anggota GABPEKNAS ?',
                'answer' => 'Sebagai anggota, Anda akan mendapatkan akses ke pelatihan, sertifikasi, serta jaringan bisnis antar pelaku jasa konstruksi.',
            ],
            [
                'question' => 'Apakah GABPEKNAS menyediakan layanan sertifikasi?',
                'answer' => 'Ya, GABPEKNAS bekerja sama dengan lembaga sertifikasi yaitu LSBU PSAT (Panca Satya Jayatama Nusantara) untuk memfasilitasi proses sertifikasi bagi anggotanya sesuai ketentuan perundangan.',
            ],
            [
                'question' => 'Bagaimana proses permohonan layanan di GABPEKNAS ?',
                'answer' => 'Permohonan dapat dilakukan secara online melalui platform resmi GABPEKNAS. Setelah pengajuan, Anda akan dihubungi oleh tim untuk proses verifikasi dan tindak lanjut.',
            ],
        ];

        foreach ($data as $item) {
            Faq::create($item);
        }
    }
}
