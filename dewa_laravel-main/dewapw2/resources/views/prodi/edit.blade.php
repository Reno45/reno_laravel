@extends('layout.main')
@section('title', 'Edit Prodi')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Prodi</h4>
                    <p class="card-description">
                        Formulir Edit Prodi
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route('prodi.update', $prodi->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Prodi</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Prodi" value="{{$prodi->nama}}">
                            <br>
                            <label for="fakulitas">Nama Fakultas</label>
                            <select name="fakulitas_id" class="form-control">
                                <option selected>Pilih</option>
                                @foreach ($fakulitas as $item)
                                    <option value="{{ $item->id }}" {{$itme_id == $prodi->$fakulitas_id ? 'selected' : null }} > {{ $item->nama }}></option>
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
