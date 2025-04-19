@extends('template.index')

@section('title', 'edit video')

@section('style')

@endsection

@section('main')
<div class="content-body">
    <div class="container-fluid">
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
                        <h4 class="card-title">Form edit video</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('materi_video.update', $materi_video) }}" method="post"
                                enctype="multipart/form-data" data-parsley-validate>
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" name="judul" value="{{ $materi_video->judul }}" id="judul"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="link" class="form-label">YouTube Link</label>
                                        <input type="url" name="youtube_url"
                                            value="{{ $materi_video->youtube_url }}" id="link" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jenjang" class="form-label">Jenjang</label>
                                        <select name="jenjang_id" id="jenjang" class="form-control">
                                            @foreach($jenjangs as $jenjang)
                                                <option value="{{ $jenjang->id }}" {{ $materi_video->jenjang_id == $jenjang->id ? 'selected' : '' }}>
                                                    {{ $jenjang->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <select name="kelas_id" id="kelas" class="form-control">
                                            @foreach($kelas as $k)
                                                <option value="{{ $k->id }}" {{ $materi_video->kelas_id == $k->id ? 'selected' : '' }}>
                                                    {{ $k->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-lg-12">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" value="{{ $materi_video->deskripsi }}" name="deskripsi"
                                            class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
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

@section('script')
<script src="{{ asset('js/dashboard/contact.js') }}"></script>
<script>
    // Mendapatkan elemen-elemen DOM
    const jenjangSelect = document.getElementById('jenjang');
    const kelasSelect = document.getElementById('kelas');

    // Menyimpan data kelas yang sudah ada
    const kelasData = @json($kelas);  // Pastikan $kelas berisi data yang sudah difilter sesuai dengan jenjang

    // Fungsi untuk memperbarui pilihan kelas berdasarkan jenjang
    function updateKelasOptions() {
        // Ambil jenjang yang dipilih
        const jenjangId = jenjangSelect.value;
        
        // Kosongkan opsi kelas
        kelasSelect.innerHTML = '';

        // Filter kelas sesuai dengan jenjang yang dipilih
        const filteredKelas = kelasData.filter(kelas => kelas.jenjang_id == jenjangId);

        // Menambahkan opsi kelas yang sesuai
        filteredKelas.forEach(kelas => {
            const option = document.createElement('option');
            option.value = kelas.id;
            option.textContent = kelas.nama;

            // Jika kelas yang dipilih adalah kelas yang sudah ada, tambahkan selected
            if (kelas.id == "{{ $materi_video->kelas_id }}") {
                option.selected = true;
            }

            kelasSelect.appendChild(option);
        });
    }

    // Panggil fungsi updateKelasOptions ketika halaman pertama kali dimuat
    document.addEventListener('DOMContentLoaded', updateKelasOptions);

    // Menambahkan event listener untuk perubahan jenjang
    jenjangSelect.addEventListener('change', updateKelasOptions);
</script>
@endsection

@endsection
