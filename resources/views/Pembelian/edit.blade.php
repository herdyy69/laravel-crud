@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Pembelian
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Pembelian.update', $Pembelian->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control  @error('nama_pembeli') is-invalid @enderror"
                                    name="nama_pembeli" value="{{ $Pembelian->nama_pembeli }}">
                                @error('nama_pembeli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">tanggal_pembelian</label>
                                <input type="text" class="form-control  @error('tanggal_pembelian') is-invalid @enderror"
                                    name="tanggal_pembelian" value="{{ $Pembelian->tanggal_pembelian }}">
                                @error('tanggal_pembelian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">nama_barang</label>
                                <input type="text" class="form-control  @error('nama_barang') is-invalid @enderror"
                                    name="nama_barang" value="{{ $Pembelian->nama_barang }}">
                                @error('nama_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">harga_satuan</label>
                                <input type="text" class="form-control  @error('harga_satuan') is-invalid @enderror"
                                    name="harga_satuan" value="{{ $Pembelian->harga_satuan }}">
                                @error('harga_satuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">jumlah_barang</label>
                                <input type="text" class="form-control  @error('jumlah_barang') is-invalid @enderror"
                                    name="jumlah_barang" value="{{ $Pembelian->jumlah_barang }}">
                                @error('jumlah_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection