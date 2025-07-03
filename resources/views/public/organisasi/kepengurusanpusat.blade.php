<x-layouts.public>
    <x-breadcrumb :breadcrumbs="['Home', 'Kepengurusan Pusat']" />
    <section>
        <div class="mx-auto max-w-8xl px-5 pt-2 pb-8 md:px-10 md:pt-4 md:pb-10">
            <h2 class="text-center text-3xl font-bold text-gray-700">Kepengurusan Pusat</h2>
            <div class="flex flex-col p-8 rounded-xl space-y-10">
                <p class="text-justify text-gray-500">
                    Susunan Dewan Pimpinan Pusat Gabungan Perusahaan Kontraktor Nasional (GABPEKNAS) merupakan representasi dari komitmen kami dalam memajukan industri jasa konstruksi nasional. Kepengurusan ini terdiri dari para profesional berpengalaman yang berperan aktif dalam membina anggota, menjalin kemitraan strategis, serta memastikan pelaksanaan fungsi organisasi sesuai dengan visi dan misi asosiasi.
                </p>
                <div class="space-y-10">
                    <div class="flex justify-center">
                        <div class="w-full max-w-xs bg-white dark:bg-gray-700 rounded-xl shadow-md p-4 text-center hover:shadow-lg transition-all duration-300 ease-in-out">
                            <div class="aspect-square overflow-hidden rounded-md">
                                <img src="{{ asset('ketum_dpp_tua_pangaribuan.jpg') }}" class="w-full h-full object-cover" />
                            </div>
                            <h3 class="font-bold text-dark mt-4">KETUA UMUM</h3>
                            <p class="text-gray-800">TUA PANGARIBUAN</p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-center gap-6">
                        <div class="w-full max-w-xs bg-white dark:bg-gray-700 rounded-xl shadow-md p-4 text-center mx-auto hover:shadow-lg transition-all duration-300 ease-in-out">
                            <div class="aspect-square overflow-hidden rounded-md">
                                <img src="{{ asset('bendum_dpp_muhamad_noviar.jpg') }}" class="w-full h-full object-cover" />
                            </div>
                            <h3 class="font-bold text-dark mt-4">BENDAHARA UMUM</h3>
                            <p class="text-gray-800">MUHAMAD NOVIAR</p>
                        </div>
                        <div class="w-full max-w-xs bg-white dark:bg-gray-700 rounded-xl shadow-md p-4 text-center mx-auto hover:shadow-lg transition-all duration-300 ease-in-out">
                            <div class="aspect-square overflow-hidden rounded-md">
                                <img src="{{ asset('sekum_dpp_mulyadi_guntur.jpg') }}" class="w-full h-full object-cover" />
                            </div>
                            <h3 class="font-bold text-dark mt-4">SEKRETARIS JENDERAL</h3>
                            <p class="text-gray-800">MULYADI GUNTUR</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer />
</x-layouts.public>
