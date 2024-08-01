@extends('layouts.parent')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#  ">Home</a></li>
                        <li class="breadcrumb-item active">Cek Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @foreach ($requestCategory as $cate)
    <div class="alert alert-info alert-dismissible">
        <form action="{{ route('admin.category.destroy', $cate->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="close" >&times;</button>
        </form>
        <h5><i class="icon fas fa-info"></i> New Category!</h5>
        <form action="{{ route('admin.category.update', $cate->id) }}" method="post">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label>{{ $cate->name }}</label>
                </div> 
                <button type="submit" class="btn btn-success"><i class="icon fas fa-check"></i></button>
        </form>
    </div>
    @endforeach

    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="card-body">
            <div class="form-group">
                <label for="#name">Add Category</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="New Category">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
    </form>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Category</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        <form action="{{ route('admin.category.destroy', $row->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class='bx bx-trash'></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
