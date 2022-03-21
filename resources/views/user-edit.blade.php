@extends('layouts.master')
@section('link')
<li class="menu-header">Paket</li>
<li ><a class="nav-link" href="{{route ('dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
<li class="menu-header">Content</li>
@if (auth()->user()->role=="admin") 
<li class="active"><a class="nav-link" href="{{route ('tampil-outlet')}}"><i class="fas fa-home"></i> <span>Outlet</span></a></li>
<li ><a class="nav-link" href="{{route ('tampil-paket')}}"><i class="fas fa-box"></i> <span>Paket Laundry</span></a></li>
@endif
<li ><a class="nav-link" href="{{route ('tampil-member')}}"><i class="fas fa-user"></i> <span>Member</span></a></li>
<li ><a class="nav-link" href="{{route ('tampil-transaksi')}}"><i class="fas fa-file-invoice-dollar"></i> <span>Transaksi</span></a></li>
@if (auth()->user()->role=="admin") 
<li ><a class="nav-link" href="{{route ('tampil-user')}}"><i class="fas fa-user-tie"></i> <span>Data Pengurus</span></a></li>
@endif
@stop
@section('content')
  <!-- Main Content -->
                  <div class="container-fluid py-4">
                  <div class="section-body">
                    <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                              <div class="card">
                                <div class="card-header">
                                  <h4>Tambah Data User</h4>
                                </div>
                      <form action="{{route('update-user',Auth()->user()->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card-body">
                      <div class="form-group col-md-6 col-12">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name"
                        @if (old('name'))
                        value="{{old('name')}}" 
                        @else
                        value="{{$user->name}}" 
                        @endif
                        >

                        <label 
                            @error('name') 
                            class="text-danger"
                            @enderror>
                            @error('name')
                            {{$message}}
                            @enderror
                          </label>

                      </div>

                     
                    <div class="row">
                      <div class="form-group col-md-6 col-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email"
                         @if (old('email'))
                        value="{{old('email')}}" 
                        @else
                        value="{{$user->email}}" 
                        @endif
                        >

                        <label 
                            @error('email') 
                            class="text-danger"
                            @enderror>
                            @error('email')
                            {{$message}}
                            @enderror
                          </label>

                      </div>
                      
                      <div class="form-group col-md-6 col-6">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="opsional" name="password" value="{{old('password')}}">
                      </div>
                      </div>
                      <div class="row">
                      <div class="form-group col-md-5 col-12">
                        <label>Role</label>
                        <input type="text" class="form-control" name="role"
                        @if (old('role'))
                        value="{{old('role')}}" 
                        @else
                        value="{{$user->role}}" 
                        @endif
                        disabled>
                      </div>
                      <div class="form-group col-md-5 col-12">
                        {{-- <label>Role</label> --}}
                        <input type="text" class="form-control" name="role"
                        @if (old('role'))
                        value="{{old('role')}}" 
                        @else
                        value="{{$user->role}}" 
                        @endif
                        hidden>
                        
                      </div>
                    </div>
                    
                      <button class="btn btn-success bnt-gradient" type="submit">Simpan</button>
                      <a href="{{route('tampil-user')}}" class="btn btn-danger btn-gradient">Back</a>
                    
                      </div>
                    </form>
                    
                  </div>
                </div>
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

@endpush