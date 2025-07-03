<x-layouts.public>
    <x-breadcrumb :breadcrumbs="['Home', 'Tentang Kami']" />
    <section id="sejarah">
        <div class="mx-auto max-w-8xl px-5 pt-2 pb-8 md:px-10 md:pt-4 md:pb-10">
            <h2 class="text-center text-3xl font-bold text-gray-700">Sejarah</h2>
            <div class="flex flex-col p-8 rounded-xl space-y-10">
                <div class="grid lg:grid-cols-2 gap-6">
                    <div class="lg:col-span-2 space-y-6 text-gray-500 text-justify">
                        <div class="flex flex-col md:flex-row">
                            <img src="{{ asset('images/gabpeknas-ori.png') }}"
                                class="h-28 w-24 md:mr-4 object-cover rounded-md" alt="logo">

                            <div class="mt-4 md:mt-0">
                                <p>GABPEKNAS adalah Asosiasi Pengusaha Kontraktor Nasional yang berdiri sejak tahun 2001
                                    di Jakarta Timur. Saat ini anggota GABPEKNAS sebanyak 19.739 perusahaan
                                    kontraktor, terdiri dari golongan kecil, menengah dan besar yang terbesar di seluruh
                                    Indonesia. Sebagai Asosiasi Jasa konstruksi, GABPEKNAS menyelenggarakan
                                    program-program pendidikan dan pelatihan bagi anggota serta memberikan berbagai
                                    informasi terkini tentang produk, teknologi konstruksi dan peluang pasar untuk
                                    anggotanya. </p>
                            </div>
                        </div>

                        <div class="space-y-4 text-gray-500">
                            <p >Adapun perjuangan GABPEKNAS sebagai berikut:</p>
                            <div>
                                <p class="font-semibold text-gray-700 mb-1">Era MUNAS Pita Giri 2001</p>
                                <p>GABPEKNAS meletakkan dasar organisasi demokrasi dengan mengedepankan kepentingan
                                    anggota di seluruh Indonesia, dan membackup penuh LPJK di bawah kepemimpinan
                                    Ir. Agus Kartasasmita, dari rongrongan LJKI (LPJK tandingan).</p>
                            </div>

                            <div>
                                <p class="font-semibold text-gray-700 mb-1">Era Pasca MUNAS Hotel Borobudur Jakarta 2007
                                </p>
                                <p>Era menata GABPEKNAS melalui konsolidasi organisasi sehingga menjadikan organisasi
                                    terbesar ke-2 di Indonesia.</p>
                            </div>

                            <div>
                                <p class="font-semibold text-gray-700 mb-1">Era MUNAS Hotel Safari Garden Cisarua 2012
                                </p>
                                <p>Adalah masa masa pahit didalam konsolidasi Organisasi, karena LPJK menjadi dua, satu
                                    pihak LPJK yang mengayomi GABPEKNAS di bawah Undang-undang Nomor 18 Tahun 1999 hasil
                                    konvensi, satu pihak lagi LPJK bentukan Kementerian Pekerjaan Umum, sehingga
                                    GABPEKNAS kehilangan anggota sebanyak 75%.</p>
                            </div>

                            <div>
                                <p class="font-semibold text-gray-700 mb-1">MUNAS 2017 Hotel Grand Cempaka, Jakarta</p>
                                <p>Alhamdulillah atas izin Tuhan Yang Maha Kuasa, GABPEKNAS memasuki babak baru dimana
                                    Pemerintah Bapak Joko Widodo - Jusuf Kalla melalui Kementerian Pekerjaan Umum dan
                                    Perumahan Rakyat Republik Indonesia menyatukan kembali LPJK dan, alhamdulillah
                                    GABPEKNAS menjadi Kelompok Unsur LPJK melalui Surat Keputusan yang diterbitkan oleh
                                    Kementerian Pekerjaan Umum dan Perumahan Rakyat Republik Indonesia. </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="visi-misi" class="grid md:grid-cols-2 gap-8">
                    <div class="border-2 py-4 px-4 rounded-lg space-y-2 bg-white dark:bg-gray-900">
                        <div class="bg-red-500 text-white font-semibold text-center w-20 rounded">Visi</div>
                        <p class="text-gray-500 text-justify">
                            Terciptanya usaha jasa konstruksi GABPEKNAS yang modern, profesional dan berkualitas untuk
                            kesejahteraaan masyarakat dan bangsa Indonesia.
                        </p>
                    </div>

                    <div class="border-2 py-4 px-4 rounded-lg space-y-2 bg-white dark:bg-gray-900">
                        <div class="bg-blue-500 text-white font-semibold text-center w-20 rounded">Misi</div>
                        <p class="text-gray-500 text-justify">
                            Membangun kemandirian yang bersinergi pengusaha-pengusaha nasional di bidang usaha jasa konstruksi dalam satu iklim usaha yang menjunjung tinggi kode etik melalui peningkatan penguasaan ilmu pengetahuan dan teknologi, peningkatan kualitas sumber daya manusia dan pengembangan jaringan usaha.
                        </p>
                    </div>
                </div>

                <div id="kode-etik" class="pt-6 space-y-4">
                    <h2 class="text-xl font-semibold text-gray-700 border-b-2 pb-2">KODE ETIK GABPEKNAS "PANCA SATYA"
                    </h2>
                    <ul class="space-y-2 text-gray-500 list-decimal list-inside">
                        <li class="border-b border-gray-200 pb-2 mb-2">
                            Mentaati semua Perundang-undangan dan Peraturan yang berlaku dalam Negara Kesatuan Republik
                            Indonesia yang berkaitan dengan usaha jasa konstruksi.
                        </li>
                        <li class="border-b border-gray-200 pb-2 mb-2">
                            Berperan aktif dalam proses pembangunan nasional yang berkelanjutan.
                        </li>
                        <li class="border-b border-gray-200 pb-2 mb-2">
                            Menghormati dan bertanggung jawab terhadap kesepakatan kerja dengan pengguna jasa.
                        </li>
                        <li class="border-b border-gray-200 pb-2 mb-2">
                            Melakukan persaingan yang sehat dan menjauhkan diri dari prektek - praktek tidak terpuji
                            dalam
                            melakukan kegiatan usaha jasa konstruksi.
                        </li>
                        <li class="border-b border-gray-200 pb-2 mb-2">
                            Tidak menyalahgunakan kedudukan, wewenamg dan kepercayaan yang diterima dari pengguna jasa
                            konstruksi serta mendahulukan pelaksanaan tugas dan tanggung jawab dari pada haknya.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <x-footer></x-footer>
</x-layouts.public>