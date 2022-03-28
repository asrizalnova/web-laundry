@extends('layouts.master')
@section('link')
<li class="menu-header">Dashboard</li>
<li ><a class="nav-link" href="{{route ('dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
<li class="menu-header">Content</li>
@if (auth()->user()->role=="admin") 
<li ><a class="nav-link" href="{{route ('tampil-outlet')}}"><i class="fas fa-home"></i> <span>Outlet</span></a></li>
<li ><a class="nav-link" href="{{route ('tampil-paket')}}"><i class="fas fa-box"></i> <span>Paket Laundry</span></a></li>
@endif
@if (auth()->user()->role != "owner") 
<li ><a class="nav-link" href="{{route ('tampil-member')}}"><i class="fas fa-user"></i> <span>Member</span></a></li>
@endif
<li class="active"><a class="nav-link" href="{{route ('tampil-transaksi')}}"><i class="fas fa-file-invoice-dollar"></i> <span>Transaksi</span></a></li>
@if (auth()->user()->role=="admin") 
<li ><a class="nav-link" href="{{route ('tampil-user')}}"><i class="fas fa-user-tie"></i> <span>Data Pengurus</span></a></li>
@endif
@stop
@section('content')
    <div class="section-body">
      <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                      <div class="card">
                        <div class="card-header">
                          <h4>Detail Transaksi</h4>
                        </div>
                        <div class="card">

                          <table class="table">
                            <tr>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Outlet</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Nama Member</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Jenis Paket</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Berat</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Total harga</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Tanggal Transaksi</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Batas Waktu</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Tanggal Bayar</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Status</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Pembayaran</th>
                            </tr>
                            
                            
                            <tr>
                              {{-- <td class="align-middle text-center text-sm">{{$detail->firstItem()+$no}}</td> --}}
                              @foreach ($outlet as $outlets)
                              <td class="align-middle text-center text-sm">{{$outlets->nama}}</td>
                              @endforeach
                              @foreach ($member as $members)
                              <td class="align-middle text-center text-sm">{{$members->nama_member}}</td>
                              @endforeach
                              @foreach ($paket as $pakets)
                              <td class="align-middle text-center text-sm">{{$pakets->nama_paket}}</td>
                              @endforeach
                              <td class="align-middle text-center text-sm">{{$transaksi->qty}} Kg</td>
                              <td class="align-middle text-center text-sm">Rp. {{$detail->subtotal}}</td>
                              <td class="align-middle text-center text-sm">{{$transaksi->tgl}}</td>
                              <td class="align-middle text-center text-sm">{{$transaksi->batas_waktu}}</td>
                              <td class="align-middle text-center text-sm">{{$transaksi->tgl_bayar}}</td>
                              <td class="align-middle text-center text-sm">{{$transaksi->status}}</td>
                              <td class="align-middle text-center text-sm">{{$transaksi->dibayar}}</td>
                            </tr>
                            
                            {{-- <td>{{$data->nama}}</td>
                    <td>{{$data->nama_member}}</td>
                    <td>{{$data->tgl}}</td>
                    <td>{{$data->batas_waktu}}</td>
                    <td>{{$data->tgl_bayar}}</td>
                    <td>{{$data->status}}</td>
                    <td>{{$data->dibayar}}</td> --}}

                          </table>

                        </div>
                        <div class="card-footer text-left">
                          <a href="{{route('tampil-transaksi')}}" class="btn btn-danger btn-gradient">Back</a>
                          <a href="{{route('laporan',$transaksi->id )}}" target="_blank" class="btn btn-success btn-gradient">Generate Laporan</a>
                        </div>

                      </div>                
                  </div>
                        </form>
            </div>
         </div>

    </div>
@stop



@push('scripts')

@endpush