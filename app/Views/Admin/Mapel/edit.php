<?= $this->extend('Templates/app') ?>

<?= $this->section('content') ?>
<section class="text-gray-400 bg-gray-900 body-font">
    <div class="container px-5 py-32 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Form Ubah Data Mapel</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Ubah Data Mapel</p>
        </div>
        <form id="form_admin_mapel" method="post">
            <?= csrf_field() ?>
            <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:px-0 items-end sm:space-x-4 sm:space-y-0 space-y-4">
                <div class="relative sm:mb-0 flex-grow w-full">
                    <label for="nama" class="leading-7 text-sm text-gray-400">Mapel</label>
                    <input type="text" id="nama" name="nama" value="<?= $mapel->nama ?>" class="<?php if (session('errors.nama')) : ?>border-red-500<?php endif ?> w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900 focus:bg-transparent text-base outline-none text-gray-100 px-2 transition-colors duration-200 ease-in-out">
                    <div class="text-sm font-bold text-red-500 mt-1" id="error_nama">
                        <?= session('errors.nama') ?>
                    </div>
                </div>
            </div>
            <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:px-0 items-end sm:space-x-4 sm:space-y-0 space-y-4 mt-4">
                <a href="<?= route_to('admin.mapel.index') ?>" class="text-indigo-400 items-center md:mb-2 lg:mb-0">Kembali</a>
                <button class="text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded text-sm">Submit</button>
            </div>
        </form>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('#id_mapel').select2({
            ajax: {
                url: '<?= route_to('admin.mapel.select') ?>',
                processResults: function(data) {
                    $.map(data.mapel, function(obj) {
                        obj.text = obj.nama; // replace name with the property used for the text
                        return obj;
                    });
                    console.log(data);
                    return {
                        results: data.mapel
                    };
                }
            },
        })

        // Fetch the preselected item, and add to the control
        let mapelSelect = $('#id_mapel');
        $.ajax({
            type: 'GET',
            url: `<?= route_to('admin.mapel.show', $mapel->id) ?>`,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(function(data) {
            // create the option and append to Select2
            let option = new Option(data.nama_mapel, data.id_mapel, true, true);
            mapelSelect.append(option).trigger('change');

            // manually trigger the `select2:select` event
            mapelSelect.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });
        });

        $('#form_admin_mapel').submit(function(event) {
            event.preventDefault()
            let formData = new FormData(this)
            let object = {};
            formData.forEach((value, key) => object[key] = value);
            let json = JSON.stringify(object);
            $.ajax({
                url: '<?= route_to('admin.mapel.update', $mapel->id) ?>',
                type: 'POST',
                data: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
                contentType: false,
                processData: false,
                success: function(params) {
                    if (params.status) {
                        Swal.fire({
                            title: 'Mapel',
                            text: `${params.message}`,
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '<?= route_to('admin.mapel.index') ?>'
                            }
                        })
                    } else {
                        Object.entries(params.errors).forEach(([key, value]) => {
                            $(`#error_${key}`).html(value)
                            $(`#${key}`).addClass('border-red-500')
                        })
                        Swal.fire({
                            title: 'Mapel',
                            html: `${params.message}`,
                            icon: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        })

                    }
                },
                error: function(params) {
                    console.error(params)
                }
            })
        })
    })
</script>
<?= $this->endSection();
