@extends('template.index')

@section('title', 'data ulasan')

@section('style')
<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
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
                   
                    <div class="card-body">
                        {{-- @if (Session::get('Sukses'))

                        <div class="alert alert-success alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                            <strong>Success!</strong> {{ Session::get('Sukses') }}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                        class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        @endif --}}
                        @if (Session::get('Delete'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('Delete') }}
                            <button class="close" type="button" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th width="5%">No</th>
                                        <th>Name</th>
                                        <th>Ulasan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ulasan as $row)
                                    <tr>
                                        <td>
                                            @if($row->image)
                                            <img src="{{ asset('storage/' . $row->image) }}" alt="" width="35"
                                                height="35" class="rounded-circle">
                                            @else
                                            <img class="rounded-circle" width="35"
                                                src="https://ui-avatars.com/api/?name={{ urlencode($row->user->name) }}"
                                                alt="s">
                                            @endif
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->deskripsi }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" onclick="detailUlasan({{ $row->id }})"
                                                    class="btn btn-primary shadow btn-xs sharp mr-1">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a href="#" onclick="confirmDelete({{ $row->id }})"
                                                    class="btn btn-danger shadow btn-xs sharp">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="delete-form-{{ $row->id }}" action="{{ route('data_ulasan.destroy', $row->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>                                                
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $ulasanJS = $ulasan->map(function($item) {
        return [
            'id' => $item->id ?? 'Tidak ada id',
            'nama' => $item->user->name ?? 'Tidak ada nama',
            'email' => $item->user->email ?? 'Tidak ada email',
            'deskripsi' => $item->deskripsi ?? 'Tidak ada ulasan',
        ];
    });
@endphp

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'yakin apus?',
            text: "gabisa balik lagi lohh!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'iyakk!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }

    const dataUlasan = @json($ulasanJS);

    function detailUlasan(id) {
        const ulasan = dataUlasan.find(item => item.id === id);

        if (ulasan) {
            Swal.fire({
                title: "<h2 style='font-size: 24px;'>Detail Ulasan</h2>",
                html: `
                    <div style="
                        margin: 0 auto;
                        padding: 15px;
                        border: 1px solid #ccc;
                        border-radius: 8px;
                        background-color: #f9f9f9;
                        width: fit-content;
                        max-width: 90%;
                        text-align: left;
                        font-size: 16px;
                        line-height: 1.5;
                    ">
                        <p><strong>Nama:</strong> ${ulasan.nama}</p>
                        <p><strong>Email:</strong> ${ulasan.email}</p>
                        <p><strong>Ulasan:</strong> ${ulasan.deskripsi}</p>
                    </div>
                `,
                confirmButtonText: "Tutup"
            });
        } else {
            Swal.fire("Data tidak ditemukan!", "", "error");
        }
    }
</script>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
@endsection