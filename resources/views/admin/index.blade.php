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
                        <li class="breadcrumb-item active">Cek Pengaduan</li>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $pengaduan }}</h3>

                        <p>Jumlah Pengaduan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $ringan }}</h3>

                        <p>Masalah Ringan</p>
                    </div>
                    <div class="icon">
                        <i class='bx bxs-user-x'></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $sedang }}</h3>

                        <p>Masalah Sedang</p>
                    </div>
                    <div class="icon">
                        <i class='bx bxs-user-x'></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $berat }}</h3>

                        <p>Masalah Berat</p>
                    </div>
                    <div class="icon">
                        <i class='bx bxs-user-x'></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    @foreach ($pengajuan as $item)
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
                                {{ $item->pengaduan }} </p>
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
                            <p class="m-2"><span class="font-weight-bold">Reply:</span> {{ $item->reply }}</p>
                            <p class="m-2"><span class="font-weight-bold">Has Seen:</span>
                                @if ($item->status == false)
                                    Hasn't Seen ❌
                                @else
                                    Have Seen ✅
                                @endif
                            </p>

                            <form action="{{ route('admin.reply', $item->id) }}" method="post" class="m-2">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label for="#reply">Reply</label>
                                    <textarea name="reply" id="reply"></textarea>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-info">reply</button>
                                </div>
                            </form>
                            <div class="row m-2 p-2">
                                <form action="{{ route('admin.status', $item->id) }}" method="post" class="m-1">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success"><i class='bx bx-check-square'></i>
                                        Have
                                        Seen</button>
                                </form>
                                <form action="{{ route('admin.delete', $item->id) }}" method="post" class="m-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class='bx bx-trash'></i>
                                        Delete</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endforeach
@endsection
