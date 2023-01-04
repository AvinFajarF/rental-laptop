@extends('dashboard.layouts.main')
@section('content')



    @if ($message = Session::get('success'))
        <div class="alert alert-danger">
            <ul>
                <li>{{$message}}</li>
            </ul>
        </div>
    @endif

    @if ($message = Session::get('tambah'))
    <div class="alert alert-success">
        <ul>
            <li>{{$message}}</li>
        </ul>
    </div>
@endif

    <form action="" method="post">
        @csrf
        @method('POST')
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
            <a href="/dashboard/user-add" type="submit" class="btn btn-success me-md-2">Tambah</a>
        </div>

    </form>


    <table class="table mt-3">
        <thead>
            <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">username</th>
                <th scope="col">phone</th>
                <th scope="col">adderss</th>
                <th scope="col">kelas</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                @if ($item->role_id != 1)
                    <tr>
                        <th scope="row">{{ $loop->index }}</th>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->NoHp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td><a href="/detail/{{ $item->slug }}" class="btn btn-primary">Detail</a>
                            <form action="/dashboard/user-list/delete/{{$item->slug}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>




@endsection
