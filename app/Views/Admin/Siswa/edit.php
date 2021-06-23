<?= $this->extend('Templates/app') ?>

<?= $this->section('content') ?>
<section class="text-gray-400 bg-gray-900 body-font">
    <div class="container px-5 py-32 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Form Siswa</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Form ubah kelas</p>
        </div>
        <form id="form_admin_siswa" method="post">
            <?= csrf_field() ?>
            <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:px-0 items-end sm:space-x-4 sm:space-y-0 space-y-4">
                <div class="relative sm:mb-0 flex-grow w-full">
                    <label for="nama" class="leading-7 text-sm text-gray-400">Nama Siswa</label>
                    <input type="text" id="nama" name="nama" value="<?= $siswa->nama ?>" class="<?php if (session('errors.nama')) : ?> border-red-500<?php endif ?> w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900 focus:bg-transparent text-base outline-none text-gray-100 px-2 transition-colors duration-200 ease-in-out">
                    <div class="text-sm font-bold text-red-500 mt-1 validation" id="error_nama">
                        <?= session('errors.nama') ?>
                    </div>
                </div>
                <div class="relative sm:mb-0 flex-grow w-full">
                    <label for="id_kelas" class="leading-7 text-sm text-gray-400">Kelas</label>
                    <select name="id_kelas" id="id_kelas" class="<?php if (session('errors.id_kelas')) : ?>border-red-500 <?php endif ?> w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900 focus:bg-transparent text-base outline-none text-gray-100 py-1 px-2 transition-colors duration-200 ease-in-out">
                    </select>
                    <div class="text-sm font-bold text-red-500 mt-1 validation" id="error_id_kelas">
                        <?= session('errors.id_kelas') ?>
                    </div>
                </div>
            </div>
            <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:px-0 items-end sm:space-x-4 sm:space-y-0 space-y-4 mt-4">
                <a href="<?= route_to('admin.siswa.index') ?>" class="text-indigo-400 items-center md:mb-2 lg:mb-0">Kembali</a>
                <button class="text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded text-sm">Submit</button>
            </div>
        </form>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('#id_kelas').select2({
            ajax: {
                url: '<?= route_to('admin.siswa.select') ?>',
                processResults: function(data) {
                    $.map(data.kelas, function(obj) {
                        // console.log(obj);
                        obj.text = obj.nama; // replace name with the property used for the text
                        return obj;
                    });
                    console.log(data);
                    return {
                        results: data.kelas
                    };
                }
            },
        })

        // Fetch the preselected item, and add to the control
        let kelasSelect = $('#id_kelas');
        $.ajax({
            type: 'GET',
            url: `<?= route_to('admin.siswa.show', $siswa->id) ?>`,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(function(data) {
            // create the option and append to Select2
            let option = new Option(data.nama_kelas, data.id_kelas, true, true);
            kelasSelect.append(option).trigger('change');

            // manually trigger the `select2:select` event
            kelasSelect.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });
        });

        $('#form_admin_siswa').submit(function(event) {
            event.preventDefault()
            let formData = new FormData(this)
            let object = {};
            formData.forEach((value, key) => object[key] = value);
            let json = JSON.stringify(object);
            $.ajax({
                url: '<?= route_to('admin.siswa.update', $siswa->id) ?>',
                type: 'POST',
                data: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                contentType: false,
                processData: false,
                success: function(params) {
                    console.log(params)
                    if (params.status) {
                        Swal.fire({
                            title: 'Data Siswa',
                            text: `${params.message}`,
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '<?= route_to('admin.siswa.index') ?>'
                            }
                        })
                    } else {
                        Object.entries(params.errors).forEach(([key, value]) => {
                            $(`#error_${key}`).html(value)
                            $(`#${key}`).addClass('border-red-500')
                        })
                        Swal.fire({
                            title: 'Data Siswa',
                            html: `${params.message}`,
                            icon: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        })
                    }
                },
                error: function(error) {
                    console.error(error)
                }
            })
        })
    })
</script>
<?= $this->endSection();
