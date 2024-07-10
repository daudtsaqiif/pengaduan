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
                    <li class="breadcrumb-item active">Adukan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">PENGADUAN!!</h3>
        </div>
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="form-group">
                    <label for="#pengaduan">Deskripsi Pelanggaran</label>
                    <input type="text" name="pengaduan" class="form-control" id="pengaduan"
                        placeholder="Deskipsikan pengaduan">
                    <div class="form-group">
                        <label for="#level">Tingkat Pelanggaran</label>
                        <select class="form-control select2" style="width: 100%;" id="level" name="level">
                            <option value="Ringan">Ringan</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Berat">Berat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="#category">Category Pelanggaran</label>
                    <select class="form-control select2" style="width: 100%;" id="category" name="category_id">
                        @foreach ($category as $row )
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <hr>

<form action="{{ route('user.category') }}" method="post">
    @csrf
    @method('POST')
    <div class="card-body">
        <div class="form-group">
            <label for="#name">category</label>
            <input type="text" name="name" class="form-control" id="name"
                placeholder="Deskipsikan pengaduan">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

    <hr>

    @foreach ($pengajuan as $item)
        <!-- Timelime example  -->
        <div class="row">
            <div class="col-md-12">
                <!-- The time line -->
                <div class="timeline">
                    <!-- timeline time label -->
                    <div class="time-label">
                        <span class="bg-red">{{ $item->created_at->format('d' . '-' . 'F' . '-' . 'Y') }}</span>
                    </div>
                    <div>
                        <i class="fas fa-user bg-green"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header text-primary font-weight-bold">Anonymous</h3>
                            <p class="m-2"><span class="font-weight-bold">Deskripsi Pengaduan:</span>
                                {{ $item->pengajuan }} </p>
                            <p class="m-2"><span class="font-weight-bold">Tingkat Pengaduan:</span>
                                @if ($item->level == 'Ringan')
                                    <span class="badge bg-info"><i class='bx bx-info-circle'></i> Ringan</span>
                                @elseif ($item->level == 'Sedang')
                                    <span class="badge bg-warning"><i class='bx bx-info-circle'></i> Sedang</span>
                                @else
                                <span class="badge bg-danger"><i class='bx bx-info-circle'></i> Berat</span>
                                @endif
                            </p>
                            <p class="m-2"><span class="font-weight-bold">Category Pengaduan:</span>
                                {{ $item->category->name }} </p>
                            <p class="m-2"><span class="font-weight-bold">Has Seen:</span>
                                @if ($item->status == false)
                                    Hasn't Seen ❌
                                @else
                                    Have Seen ✅
                                @endif
                            </p>
                            <p class="m-2 pb-3"><span class="font-weight-bold">reply:</span> {{ $item->reply }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
    @endforeach
@endsection
