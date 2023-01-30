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

    @if ($message = Session::get('succes'))
    <div class="alert alert-succes">
        <ul>
            <li>{{$message}}</li>
        </ul>
    </div>
@endif


    <!-- START FORM -->


    <form action='/dashboard/rent' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="/dashboard/user-list" class="btn btn-warning mb-5">
                << Kembali</a>


                   <div class="mb-3 row">
                        <select name="user_id" class="form-select" aria-label="Default select example">
                            <option selected>Username</option>
                            @foreach ($user as $item)
                            <option value="{{ $item->id }}">{{ $item->username }}</option>
                                @endforeach
                            </select>
                        </div>


                    <div class="mb-3 row">
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            <option selected>Laptop</option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->code }}</option>
                                @endforeach
                            </select>
                        </div>

                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </div>
                </div>
            </form>
    <!-- AKHIR FORM -->
@endsection
