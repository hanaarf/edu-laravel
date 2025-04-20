@extends('template.index')

@section('title', 'tambah materi video')

@section('style')
<link rel="stylesheet" href="{{ asset('web/mycss/dailog.css') }}" />
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<style type="text/css">
    .ck-editor__editable_inline {
        height: 300px;
    }

</style>
@endsection

@section('main')
<div class="content-body">
    <div class="container-fluid">
        <!-- Add Project -->
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Project</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="text-black font-w500">Project Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Deadline</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Client Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary">CREATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Element</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form materi video</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('latihan_video.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div id="soal-form-container">
                                    <!-- Form pertama untuk jenjang, kelas, dan materi -->
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="jenjang" class="form-label">Jenjang</label>
                                            <select name="jenjang_id" id="jenjang" class="form-control">
                                                <option value="">-- Pilih Jenjang --</option>
                                                @foreach($jenjangs as $jenjang)
                                                    <option value="{{ $jenjang->id }}">{{ $jenjang->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label for="kelas" class="form-label">Kelas</label>
                                            <select name="kelas_id" id="kelas" class="form-control">
                                                <option value="">-- Pilih Kelas --</option>
                                                {{-- Nanti akan diisi lewat AJAX --}}
                                            </select>
                                        </div>
                            
                                        <div class="form-group col-md-4">
                                            <label for="materi" class="form-label">Materi Video</label>
                                            <select name="materi_video_id" id="materi" class="form-control">
                                                <option value="">-- Pilih Materi --</option>
                                            </select>
                                        </div>
                                    </div>
                            
                                    <!-- Soal 1 -->
                                    <div class="form-row soal" id="soal-1">
                                        <div class="form-group col-lg-12">
                                            <label for="judul" class="form-label">Pertanyaan</label>
                                            <textarea id="editor" name="pertanyaan[]" class="mt-2 editor"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Opsi A</label>
                                            <input type="text" name="opsi_a[]" class="form-control" required>
                                        </div>
                            
                                        <div class="mb-3">
                                            <label>Opsi B</label>
                                            <input type="text" name="opsi_b[]" class="form-control" required>
                                        </div>
                            
                                        <div class="mb-3">
                                            <label>Opsi C</label>
                                            <input type="text" name="opsi_c[]" class="form-control" required>
                                        </div>
                            
                                        <div class="mb-3">
                                            <label>Opsi D</label>
                                            <input type="text" name="opsi_d[]" class="form-control" required>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Jawaban Benar</label>
                                            <select name="jawaban[]" class="form-control" required>
                                                <option value="">-- Pilih Jawaban Benar --</option>
                                                <option value="A">Opsi A</option>
                                                <option value="B">Opsi B</option>
                                                <option value="C">Opsi C</option>
                                                <option value="D">Opsi D</option>
                                            </select>
                                        </div>
                                    </div>
                            
                                    <!-- Button untuk tambah soal -->
                                    <button type="button" id="add-soal" class="btn btn-rounded btn-outline-primary mt-4 mb-2">+ Soal</button>
                            
                                </div>
                            
                                <button type="submit" class="btn btn-primary mt-5">Kirim soal</button>
                            </form>  
                            <template id="soal-template">
                                <div class="form-row soal">
                                    <div class="form-group col-lg-12">
                                        <label for="judul" class="form-label">Pertanyaan</label>
                                        <textarea name="pertanyaan[]" class="mt-2 editor"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label>Opsi A</label>
                                        <input type="text" name="opsi_a[]" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Opsi B</label>
                                        <input type="text" name="opsi_b[]" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Opsi C</label>
                                        <input type="text" name="opsi_c[]" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Opsi D</label>
                                        <input type="text" name="opsi_d[]" class="form-control" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Jawaban Benar</label>
                                        <select name="jawaban[]" class="form-control" required>
                                            <option value="">-- Pilih Jawaban Benar --</option>
                                            <option value="A">Opsi A</option>
                                            <option value="B">Opsi B</option>
                                            <option value="C">Opsi C</option>
                                            <option value="D">Opsi D</option>
                                        </select>
                                    </div>
                                </div>
                            </template>
                                                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/dashboard/contact.js') }}"></script>

{{-- nambah soal --}}
<script>
   let soalCount = 1;

document.getElementById('add-soal').addEventListener('click', function () {
    soalCount++;

    const template = document.getElementById('soal-template');
    const clone = template.content.cloneNode(true);

    const textarea = clone.querySelector('textarea');
    const uniqueId = `editor-${soalCount}`;
    textarea.id = uniqueId;

    // Append ke form
    document.getElementById('soal-form-container').appendChild(clone);

    // Inisialisasi CKEditor di textarea baru
    ClassicEditor
        .create(document.querySelector(`#${uniqueId}`), {
            ckfinder: {
                uploadUrl: "{{ route('latihan.upload-ck') }}?&_token={{ csrf_token() }}",
            }
        })
        .catch(error => {
            console.error(error);
        });
});

</script>

{{-- milih jenjang,kelas --}}
<script>
    document.getElementById('jenjang').addEventListener('change', function () {
        const jenjangId = this.value;

        // Menambahkan prefix 'A' pada URL
        fetch(`/get-kelas/${jenjangId}`)
            .then(response => response.json())
            .then(data => {
                const kelasSelect = document.getElementById('kelas');
                kelasSelect.innerHTML = '<option value="">-- Pilih Kelas --</option>';

                // Menambahkan kelas berdasarkan data yang diterima
                data.forEach(kelas => {
                    const option = document.createElement('option');
                    option.value = kelas.id;
                    option.text = kelas.nama;
                    kelasSelect.appendChild(option);
                });
            })
            .catch(error => console.log('Error:', error)); // Menangani error
    });
</script>

{{-- upload ck --}}
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: "{{ route('latihan.upload-ck') }}?&_token={{ csrf_token() }}",
            }
        })
        .catch(error => {
            console.error(error);
        });

</script>

{{-- ubah img ckeditor --}}
<script>
    function previewNewImage(event) {
        const input = event.target; // Input file element
        const currentImage = document.getElementById('currentImage'); // Current image element

        // Jika ada file yang dipilih
        if (input.files && input.files[0]) {
            const reader = new FileReader(); // Membuat FileReader

            // Saat file selesai dibaca
            reader.onload = function (e) {
                currentImage.src = e.target.result; // Ubah sumber gambar ke file yang diunggah
            };

            reader.readAsDataURL(input.files[0]); // Membaca file sebagai URL data
        }
    }

</script>

{{-- ambil materi --}}
<script>
    document.getElementById('kelas').addEventListener('change', function () {
        const kelasId = this.value;

        fetch(`/get-materi/${kelasId}`)
            .then(response => response.json())
            .then(data => {
                const materiSelect = document.getElementById('materi');
                materiSelect.innerHTML = '<option value="">-- Pilih Materi --</option>';

                data.forEach(materi => {
                    const option = document.createElement('option');
                    option.value = materi.id;
                    option.text = materi.judul; // Sesuaikan dengan kolom di db
                    materiSelect.appendChild(option);
                });
            })
            .catch(error => console.log('Error:', error));
    });
</script>

@endsection
