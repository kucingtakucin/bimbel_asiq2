<?= $this->extend('Templates/app') ?>

<?= $this->section('content') ?>
<section class="text-gray-400 bg-gray-900 body-font">
    <div class="container px-5 py-32 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Form Tambah Data Mentor</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn
                asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man
                bun deep.</p>
        </div>
        <form id="form_admin_guru" method="post">
            <?= csrf_field() ?>
            <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:px-0 items-end sm:space-x-4 sm:space-y-0 space-y-4">
                <div class="relative sm:mb-0 flex-grow w-full">
                    <label for="nama" class="leading-7 text-sm text-gray-400">Nama Mentor</label>
                    <input type="text" id="nama" name="nama" class="w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900 focus:bg-transparent text-base outline-none text-gray-100 px-2 transition-colors duration-200 ease-in-out">
                    <div class="text-sm font-bold text-red-500 mt-1 validation" id="error_nama"></div>
                </div>
            </div>
            <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:px-0 items-end sm:space-x-4 sm:space-y-0 space-y-4 mt-4">
                <a href="<?= route_to('admin.guru.index') ?>" class="text-indigo-400 items-center md:mb-2 lg:mb-0">Kembali</a>
                <button class="text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded text-sm">Submit</button>
            </div>
        </form>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('#id_guru').select2({
            ajax: {
                url: '<?= route_to('admin.guru.select') ?>',
                processResults: function(data) {
                    $.map(data.guru, function(obj) {
                        // console.log(obj);
                        obj.text = obj.nama; // replace name with the property used for the text
                        return obj;
                    });
                    console.log(data);
                    return {
                        results: data.guru
                    };
                }
            },
        })

        $('#form_admin_guru').submit(function(event) {
            event.preventDefault()
            let formData = new FormData(this)

            $.ajax({
                url: '<?= route_to('admin.guru.create') ?>',
                type: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: formData,
                contentType: false,
                processData: false,
                success: function(params) {
                    console.log(params)
                    if (params.status) {
                        Swal.fire({
                            title: 'Data Mentor',
                            text: `${params.message}`,
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '<?= route_to('admin.guru.index') ?>'
                            }
                        })
                    } else {
                        Object.entries(params.errors).forEach(([key, value]) => {
                            $(`#error_${key}`).html(value)
                            $(`#${key}`).addClass('border-red-500')
                        })
                        Swal.fire({
                            title: 'Data Mentor',
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
