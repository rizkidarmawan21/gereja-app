@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Event</h1>
        <a href="{{ route('event.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Buat Event Baru
        </a>
    </div>



    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100" collspancing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Thumbnail</th>
                            <th>Judul Event</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th>Wilayah & Kouta</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">
                                <img src="{{ $item->thumbnail ? url('storage/'.$item->thumbnail) :  url('frondend/images/default_event.jpg') }}"
                                    width="130" alt="">
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('H:i:s',$item->start_time)->format('g:i A') }} - {{
                                \Carbon\Carbon::createFromFormat('H:i:s',$item->end_time)->format('g:i A') }}</td>
                            <td>{{ \Carbon\Carbon::create($item->start_date)->format('l, n F Y') }} <br /> s/d {{
                                \Carbon\Carbon::create($item->end_date)->format('n F Y') }}</td>
                            <td>
                                <table class="table table-bordered">
                                    <?php $total=0 ?>
                                    @foreach($item->capacities as $data_capacity)
                                       <tr>
                                        <td>{{ $data_capacity->region }}</td>
                                        <td>{{ $data_capacity->kouta }}</td>
                                        <?php $total +=$data_capacity->kouta ?>
                                       </tr>
                                    @endforeach
                                    <tr class="text-center">
                                        <td colspan="2">Total = {{ $total }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <a href="{{ route('event.edit', $item->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('event.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection