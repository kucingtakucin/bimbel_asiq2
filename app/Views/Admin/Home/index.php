<?= $this->extend('Templates/app') ?>

<?= $this->section('content') ?>
<section class="text-gray-400 body-font bg-gray-900">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h2 class="text-xs text-indigo-400 tracking-widest font-medium title-font mb-1">Bimbingan Belajar</h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">ASIQ!</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Bimbel terpercaya dan ter-asik!</p>
        </div>
        <div class="flex flex-wrap">
            <div class="xl:w-1/3 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-800">
                <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">Mentor</h2>
                <p class="leading-relaxed text-base mb-4">Mentor ganteng dan cantik yang merupakan pahlawan tanpa tanda jasa. </p>
                <a href="<?= route_to('admin.guru.index') ?>" class="text-indigo-400 inline-flex items-center">Learn More
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <div class="xl:w-1/3 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-800">
                <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">Siswa</h2>
                <p class="leading-relaxed text-base mb-4">Adik-adik bimbel yang cakep-cakep abiezt dan tentunya pinter semua, karena mereka rajin belajar dimanpun dan kapanpun.</p>
                <a href="<?= route_to('admin.siswa.index') ?>" class="text-indigo-400 inline-flex items-center">Learn More
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <div class="xl:w-1/3 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-800">
                <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">Mapel</h2>
                <p class="leading-relaxed text-base mb-4">Mata pelajaran apa aja sih yang ada di bimbel ini.</p>
                <a href="<?= route_to('admin.mapel.index') ?>" class="text-indigo-400 inline-flex items-center">Learn More
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection();
