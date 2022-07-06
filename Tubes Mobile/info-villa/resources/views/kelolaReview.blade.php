@extends('layout.adminReview')
@section('adminReview')
    <div class="container my-lg-4">
        <div class="row">
            <div class="col-12">
                <h1>Data Review</h1>
                <table class="table bg-light">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Villa</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Review</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($review as $row)
                            <tr>
                                <th scope="row">{{ $row->id }}</th>
                                <td>{{ $row->villa->namaVilla }}</td>
                                <td>{{ $row->user->username }}</td>
                                <td>{{ $row->review }}</td>
                                <td>{{ $row->rating }}</td>
                                <td>{{ $row->image }}</td>
                                <td><a href="/dashboard/review/delete/{{ $row->id }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
