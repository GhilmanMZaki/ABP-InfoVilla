
@foreach ($villa as $row)
  
  <div class="col-4 mb-4 border-gray-800 shadow-md">
    <div class="card p-2" style="width: 22rem">
      <!-- Revisi dengan crop -->
      <img src="{{url('/storage/images/'.$row->image)}}" alt="villa" width="335" height="250" style="object-fit: cover">
      <div class="card-body">
        <h4>{{ $row->namaVilla }}</h4>
        <p>{{ $row->lokasi }}</p>
      </div>
      <div class="card-fasilitas ms-xl-3">
        <h4>{{ $row->harga }} / Malam</h4>
        <!-- Revisi mengeluarkan nilai rating dari database -->
        <p><i class="bi bi-star-fill"></i> {{ number_format(($row->rating),2, '.','') }}</p>
        <span>
          <form action="/villa/{{ $row->id }}">
            @csrf
            <input class="form-control me-1" type="hidden"
            name="id" aria-label="id" value="{{ $row->id }}" >
            <button class="btn btn-success btn-sm" type="submit">Details</button>
            <a href=  "https://www.google.com/search?q=pesan+{{ $row->namaVilla }}" class="btn btn-danger btn-sm">Pesan</a>
        </form>
        </span>
      </div>
      
    </div>
  </div>
  @endforeach
