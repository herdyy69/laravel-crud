@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        DATA WALI
                        <a href="{{ route('wali.create') }}" class="btn btn-sm btn-outline-primary">TAMBAH DATA</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <th>NO</th>
                                <th>NAMA WALI</th>
                                <th>FOTO</th>
                                <th>NAMA SISWA</th>
                                <th>AKSI</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($wali as $data)
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>
                                        <img src="{{ $data->image() }}" alt="" style="width:100px; height: 100px;">
                                    </td>
                                    <td>{{ $data->siswa->nama }}</td>
                                    <td>
                                        <form action="{{ route('wali.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('wali.edit', $data->id) }}" class="btn btn-sm btn-online-success">EDIT</a>
                                        <a href="{{ route('wali.show', $data->id) }}" class="btn btn-sm btn-online-success">SHOW</a>
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('apakah anda yakin')">DELETE</button>
                                    </form>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection