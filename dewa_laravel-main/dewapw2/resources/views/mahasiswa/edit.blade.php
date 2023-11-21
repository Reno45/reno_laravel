@extends('layout.main')
@section('title', 'Edit mahasiswa')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Mahasiswa</h4>
                    <p class="card-description">
                        Formulir Edit Mahasiswa
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="npm">NPM</label>
                            <input type="text" class="form-control" name="npm" placeholder="Nomor Pokok Mahasiswa"
                                value="{{ $mahasiswa->npm }}">
                            {{-- value="{{ old('npm') }} --}}
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa"
                                value="{{ $mahasiswa->nama }}">
                            <label for="tmpt_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tmpt_lahir" placeholder="Tempat Lahir"
                                value="{{ $mahasiswa->tmpt_lahir }}">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir"
                                value="{{ $mahasiswa->tgl_lahir }}">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" placeholder="Foto">
                            <br>
                            <label for="prodi">Nama Prodi</label>
                            <select name="prodi_id" class="form-control">
                                <option selected>Pilih</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->id }}" @if (old('prodi_id', $mahasiswa->prodi_id) == $item['id']) selected @endif>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('npm')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                            @error('nama')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                            @error('tmpt_lahir')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                            @error('tgl_lahir')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                            @error('foto')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                            @error('prodi_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="{{ url('mahasiswa') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
