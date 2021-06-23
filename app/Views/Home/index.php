<?= $this->extend('Templates/app') ?>

<?= $this->section('content') ?>
<section class="text-gray-400 bg-gray-900 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 md:mb-0 mb-10">
            <img class="object-cover object-center rounded" alt="hero" src="https://cdn.asiatatler.com/asiatatler/i/hk/2020/08/04170326-online-course-platforms_cover_2000x1510.jpg">
        </div>
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Bimbingan Belajar ASIQ!
            </h1>
            <p class="mb-8 leading-relaxed">Selamat datang di bimbingan belajar ter-asik sepanjang masa! Pengen makin pinter biar kaya Maudy Ayunda, yuk jangan tunda belajar mu dimanapun dan kapanpun hanya dengan mengikuti course di bimbel ini!</p>
            <!-- <div class="flex justify-center">
                <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Register</button>
                <button class="ml-4 inline-flex text-gray-400 bg-gray-800 border-0 py-2 px-6 focus:outline-none hover:bg-gray-700 hover:text-white rounded text-lg">Login</button>
            </div> -->
        </div>
    </div>
</section>
<?= $this->endSection();
