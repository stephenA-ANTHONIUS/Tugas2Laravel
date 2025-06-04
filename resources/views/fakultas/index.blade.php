@extends('layout.main')
@section('title', 'Fakultas')

@section('content')
<!--begin::Row-->
<div class="row">
        <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">List Fakultas</h3>
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
                @can('create', App\Models\Fakultas::class)
                <a href="{{ route ('fakultas.create')}}" class="btn btn-primary">Tambah Fakultas</a>
                @endcan
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>Nama Fakultas</th>
                            <th>Singkatan</th>
                            <th>Dekan</th>
                            <th>Wakil Dekan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fakultas as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->singkatan }}</td>
                                <td>{{ $item->dekan }}</td>
                                <td>{{ $item->wakil_dekan }}</td>

                                <td>
                                    <a href="{{ route('fakultas.show', $item->id) }}" class="btn btn-info">Show</a>
                                    @can('update', $item)
                                    <a href="{{ route('fakultas.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    @endcan
                                    @can('delete', $item)
                                    <form action="{{ route('fakultas.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger show_confirm" data-lte-toggle="tooltip" title="Delete" data-nama="{{$item->nama}}">Delete</button>
                                    </form>
                                    @endcan
                                </td>
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