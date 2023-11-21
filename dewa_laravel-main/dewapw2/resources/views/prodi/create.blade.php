@extends('layout.main')
@section('title', 'Tambah Prodi')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Prodi</h4>
                    <p class="card-description">
                        Formulir tambah Prodi
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route('prodi.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Prodi</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Prodi">
                            <br>
                            <label for="fakulitas">Nama Fakultas</label>
                            <select name="fakulitas_id" class="form-control">
                                <option selected>Pilih</option>
                                @foreach ($fakulitas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}></option>
                                @endforeach
                            </select>
                            @error('fakulitas_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="{{ url('prodi') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
