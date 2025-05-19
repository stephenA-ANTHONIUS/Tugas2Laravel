@extends('layout.main')
@section('title', 'Mahasiswa')

@section('content')
<!--begin::Row-->
<div class="row">
        <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">List Mahasiswa</h3>
            <div class="card-tools">
                <button
                type="button"
                class="btn btn-tool"
                data-lte-toggle="card-collapse"
                title="Collapse"
                >
                <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                </button>
                <button
                type="button"
                class="btn btn-tool"
                data-lte-toggle="card-remove"
                title="Remove"
                >
                <i class="bi bi-x-lg"></i>
                </button>
            </div>
            </div>
            <div class="card-body">
                <a href="{{ route ('mahasiswa.create')}}" class="btn btn-primary">Tambah Mahasiswa</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $item)
                            <tr>
                                <td>{{ $item->npm }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->prodi->nama }}</td>
                                <td>{{ $item->foto }}</td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
                
        </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">Footer</div> -->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        </div>
    </div>
    <!--end::Row-->

@endsection