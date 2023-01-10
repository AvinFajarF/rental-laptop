@extends('dashboard.layouts.main')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- START FORM -->
    <form action='/dashboard/rent' method='post'>
        @csrf
        @method('post')

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="/dashboard/user-list" class="btn btn-warning mb-5">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='username'
                                value="{{ Session::get('username') }}" id="username">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <<select class="form-select" aria-label="Default select example">
                            <option selected>Laptop</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->code }}</option>
                            @endforeach
                            </select>
                    </div>
                    {{-- <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label">kelas</label>
                <div class="col-sm-10">
                    <input type="text"  value="{{Session::get('kelas')}}" class="form-control" name='kelas' id="kelas">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="NoHp" class="col-sm-2 col-form-label">NoHp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='NoHp'  value="{{Session::get('NoHp')}}" id="NoHp">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="{{Session::get('alamat')}}" name='alamat' id="alamat">
                </div>
            </div> --}}
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </div>
    </form>
    </div>
    <!-- AKHIR FORM -->
@endsection
