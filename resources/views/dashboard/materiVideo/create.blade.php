@extends('template.index')

@section('title', 'tambah materi video')

@section('style')

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
                            <form action="{{ route('materi_video.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" name="judul" id="judul" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="link" class="form-label">YouTube Link</label>
                                        <input type="url" name="youtube_url" id="link" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jenjang" class="form-label">Jenjang</label>
                                        <select name="jenjang_id" id="jenjang" class="form-control">
                                            <option value="">-- Pilih Jenjang --</option>
                                            @foreach($jenjangs as $jenjang)
                                                <option value="{{ $jenjang->id }}">{{ $jenjang->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <select name="kelas_id" id="kelas" class="form-control">
                                            <option value="">-- Pilih Kelas --</option>
                                            {{-- Nanti akan diisi lewat AJAX --}}
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-lg-12">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" name="deskripsi" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
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

<script>
    document.getElementById('jenjang').addEventListener('change', function () {
        const jenjangId = this.value;

        // Menambahkan prefix 'A' pada URL
        fetch(`/A/get-kelas/${jenjangId}`)
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

@endsection
