@extends('layout.master')
@section('master')
    <div class="container my-lg-4">
        <div class="row">
            <div class="col-12">
                <h1>Data Villa</h1>
                @if (session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Villa
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Villa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/dashboard/villa/store" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="colFormLabel" name="namaVilla"
                                                placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Lokasi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="colFormLabel" name="lokasi"
                                                placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="row mb-xl-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                name="deskripsi" rows="3"></textarea required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="colFormLabel" class="col-sm-2 col-form-label">Harga</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="colFormLabel" name="harga" placeholder="" required>
                          </div>
                        </div>

                        <div class="row-sm-10">
                          <label for="formFile" class="form-label">Upload Foto Villa</label>
                          <input class="form-control" type="file" name="image" id="formFile" required>
                        </div>

                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
              <!-- Tabel data villa -->
              <table class="table mb-5 bg-light">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Villa</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Hapus</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($villa as $row)
    <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <td>{{ $row->namaVilla }}</td>
                    <td>{{ $row->lokasi }}</td>
                    <td><p style="white-space:pre">{{ substr($row->deskripsi, 0, 100) }}...</br><a href="/villa/{{ $row->id }}">Read More</a></p></td>
                    <td>{{ $row->harga }}</td>
                    <!-- Revisi mengeluarkan nilai rating dari database -->
                    <td>{{ number_format($row->rating, 2, '.', '') }}</td>
                    <td><a href="/dashboard/villa/delete/ {{ $row->id }}" class="btn btn-danger">Hapus</a></td>
                  </tr>
    @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
@endsection
