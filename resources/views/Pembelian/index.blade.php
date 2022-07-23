@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Pembelian
                        <a href="{{ route('Pembelian.create') }}" class="btn btn-sm btn-primary" style="float: right">
                            Tambah Data
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nama pembeli</th>
                                        <th>tanggal_pembelian</th>
                                        <th>nama_barang</th>
                                        <th>harga_satuan</th>
                                        <th>jumlah_barang</th>
                                        <th>total_harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($Pembelian as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_pembeli }}</td>
                                            <td>{{ date('d M Y', strtotime($data->tanggal_pembelian)) }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            <td>{{ $data->harga_satuan }}</td>
                                            <td>{{ $data->jumlah_barang }}</td>
                                            <td>Rp. {{ number_format($data->total_harga,0,'.','.')  }}</td>
                                            <td>
                                                <form action="{{ route('Pembelian.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('Pembelian.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        Edit
                                                    </a> |
                                                    <a href="{{ route('Pembelian.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        Show
                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Apakah Anda Yakin?')">Delete
                                                    </button>
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
        </div>
    </div>
@endsection