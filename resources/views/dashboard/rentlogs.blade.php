@extends('dashboard.layouts.main')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">nama</th>
        <th scope="col">category</th>
        <th scope="col">Rent Date</th>
        <th scope="col">Retrun Date</th>
        <th scope="col">jumlah di pinjam</th>
        <th scope="col">status</th>
      </tr>
    </thead>

    {{Session::get('tester')}}

    @foreach ($rentlogs as $item)
    <tbody>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->user->username}}</td>
        <td>{{$item->category->name}}</td>
        <td>{{$item->rent_date}}</td>
        <td>{{$item->return_date}}</td>
        <td>{{$item->peminjam}}</td>
        <td>{{$item->status}}</td>

    </tbody>
    @endforeach
  </table>

@endsection
