@extends('template.index')

@section('title', 'detail video')

@section('style')
<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

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
                    <div class="card-header">
                        <h4 class="card-title">Detail Video</h4>
                    </div>
                    <div class="card-body">
                        <h5><strong>Judul:</strong> {{ $materi_video->judul }}</h5>
                        <p><strong>Deskripsi:</strong> {{ $materi_video->deskripsi }}</p>
                        
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $materi_video->youtube_url }}" allowfullscreen></iframe>
                        </div>
                        <p><strong>Link YouTube:</strong> <a href="{{ $materi_video->youtube_url }}" target="_blank">{{ $materi_video->youtube_url }}</a></p>
        
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>


@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
@endsection
