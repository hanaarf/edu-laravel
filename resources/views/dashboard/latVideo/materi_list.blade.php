@extends('template.index')
@section('main')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>{{ Auth::user()->name }}</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Daftar Materi</h4>
                        <a href="{{ route('latihan_video.create') }}" class="btn btn-rounded btn-outline-primary">
                            + Materi Soal
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="">
                            @forelse($materiVideos as $materi)
                                <a href="{{ route('latihan_video.soalByMateri', $materi->id) }}"
                                   class="btn btn-primary mb-2">
                                    {{ $materi->judul }}
                                </a>
                            @empty
                                <div class="alert alert-warning w-100">Tidak ada materi untuk kelas ini.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection