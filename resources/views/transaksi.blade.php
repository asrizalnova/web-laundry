@extends('layouts.master')
@section('navigasi')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-black" href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item text-sm text-black active" aria-current="page">Transaksi</li>
  </ol>
  <h6 class="font-weight-bolder text-dark mb-0">Data Transaksi</h6>
</nav>
@stop
@section('content')
<div class="section-header">

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="container-fluid py-4">
                {{-- message simpan data --}}
                @if (session('message-simpan'))
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    {{(session('message-simpan'))}}
                  </div>
                </div>
                @endif
                {{-- message update data --}}
                @if (session('message-update'))
                <div class="alert alert-info alert-dismissible show fade">
                  <div class="alert-body">
                    {{(session('message-update'))}}
                  </div>
                </div>
                @endif
                {{-- message hapus data --}}
                @if (session('message-hapus'))
                <div class="alert alert-warning alert-dismissible show fade">
                  <div class="alert-body">
                    {{(session('message-hapus'))}}
                  </div>
                </div>
                </div>
                @endif
                <div class="container-fluid py-4">
                  <div class="row">
                    <div class="col-12">
                      <div class="card mb-4">
                        <div class="card-header pb-0">
                          <center>
                            <h4>Data Transaksi</h4>
                          </center>
                          @if (auth()->user()->role !="owner") 
                          <a href="{{route ('tambah-transaksi')}}" class="btn btn-icon icon-left btn-success btn-gradient"><i class="far fa-edit"></i> Tambah Data</a>
                          @endif
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                          <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">No.</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">Outlet</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Nama Member</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Tanggal Transaksi</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Aksi</th>
                                  <th class="text-secondary opacity-10"></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($transaksi as $no => $data) 
                                <tr>
                                  <td class="align-middle text-center text-sm">
                                    <p class="text-s font-weight-bold mb-0">{{$i=$no+1, $i++}}</p>
                                  </td>
                                  <td class="text-center">
                                    <span class="badge badge-sm bg-gradient-info">{{$data->nama}}</span>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">{{$data->nama_member}}</p>
                                  </td>
                                  <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$data->tgl}}</span>
                                  </td>
                                  <td class="align-middle text-center">
                                    <a href=" {{route('tampil-detail',$data->id_transaksi)}}" class="btn btn-icon btn-warning btn-gradientp" ><i class="fas fa-eye"></i><a>
                                      @if (auth()->user()->role != "owner") 
                                    <a href="{{route('edit-transaksi',$data->id)}}" class="btn btn-icon btn-success"><i class="far fa-edit"></i></a>
                                    <a href= "#"data-id="{{$data->id}}" class="btn btn-icon btn-danger hapus"><i class="fas fa-times">
                                     <form action="{{route('hapus-transaksi',$data->id)}}" id="hapus{{$data->id}}"method="POST"> 
                                        @csrf
                                        @method('delete')
                                    </form>
                                  </i>
                                  </a>
                                  @endif
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

    </div>
@stop

@push('scripts')
<script src="../node_modules/sweetalert/dist/sweetalert.min.js"></script>
@endpush
@push('after-scripts')
<script>
$(".hapus").click(function(hapus) {
  id = hapus.target.dataset.id;
  swal({
      title: 'Hapus data?',
      text: 'Data yang dihapus tidak bisa dikembalikan!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      // swal('Poof! Your imaginary file has been deleted!', {
      //   icon: 'success',
      // });
      $(`#hapus${id}`).submit();
      } else {
      // swal('Your imaginary file is safe!');
      }
    });
});
</script>
@endpush