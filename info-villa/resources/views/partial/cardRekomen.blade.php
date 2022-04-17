
@foreach ($villa as $row)
  
  <div class="col-4 mb-4 border-gray-800 shadow-md">
    <div class="card p-2" style="width: 22rem">
      <img src="{{url('/storage/images/'.$row->image)}}" alt="villa" width="335" height="250">
      <div class="card-body">
        <h4>{{ $row->namaVilla }}</h4>
        <p>{{ $row->lokasi }}</p>
      </div>
      <div class="card-fasilitas ms-xl-3">
        <h4>{{ $row->harga }} / Malam</h4>
        <p><i class="bi bi-star-fill"></i> 0.0</p>
        <form action="/villa/{{ $row->id }}">
          @csrf
          <input class="form-control me-1" type="hidden"
          name="id" aria-label="id" value="{{ $row->id }}" >
          <button class="btn btn-success btn-sm" type="submit">Details</button>
      </form>
      </div>
      
    </div>
  </div>
  @endforeach
