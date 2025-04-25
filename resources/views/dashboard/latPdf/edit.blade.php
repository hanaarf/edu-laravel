@extends('template.index')

@section('title', 'Edit Materi Video')

@section('style')
<link rel="stylesheet" href="{{ asset('web/mycss/dailog.css') }}" />
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<style>
    .ck-editor__editable_inline {
        height: 300px;
    }
</style>
@endsection

@section('main')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Edit Materi</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Form</a></li>
                    <li class="breadcrumb-item active"><a href="#">Edit Materi</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Materi Video</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('latihan_pdf.update', $latihan_pdf->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group col-lg-12">
                                    <label>Pertanyaan</label>
                                    <textarea name="pertanyaan" id="editor">{{ $latihan_pdf->pertanyaan }}</textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Opsi A</label>
                                        <input type="text" class="form-control" name="opsi_a" value="{{ $latihan_pdf->opsi_a }}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Opsi B</label>
                                        <input type="text" class="form-control" name="opsi_b" value="{{ $latihan_pdf->opsi_b }}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Opsi C</label>
                                        <input type="text" class="form-control" name="opsi_c" value="{{ $latihan_pdf->opsi_c }}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Opsi D</label>
                                        <input type="text" class="form-control" name="opsi_d" value="{{ $latihan_pdf->opsi_d }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Jawaban Benar</label>
                                    <select name="jawaban" class="form-control" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="A" {{ $latihan_pdf->jawaban == 'A' ? 'selected' : '' }}>Opsi A</option>
                                        <option value="B" {{ $latihan_pdf->jawaban == 'B' ? 'selected' : '' }}>Opsi B</option>
                                        <option value="C" {{ $latihan_pdf->jawaban == 'C' ? 'selected' : '' }}>Opsi C</option>
                                        <option value="D" {{ $latihan_pdf->jawaban == 'D' ? 'selected' : '' }}>Opsi D</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-12 mt-3">
                                    <label for="xp">Nilai XP</label>
                                    <input type="number" name="xp[]" class="form-control" value="{{ $latihan_video->xp }} placeholder="Masukkan nilai XP" required>
                                </div> 

                                <button type="submit" class="btn btn-primary mt-4">Update Materi</button>
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
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: "{{ route('latihan.upload-ck') }}?&_token={{ csrf_token() }}"
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
