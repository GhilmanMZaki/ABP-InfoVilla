
@foreach ($villa as $row)
  <div class="col-4 mb-4">
    <div class="card p-2" style="width: 22rem">
      <img src="{{url('/storage/images/'.$row->image)}}" alt="villa" width="335" height="250">
      <div class="card-body">
        <h4>{{ $row->namaVilla }}</h4>
        <p>{{ $row->lokasi }}</p>
      </div>
      <div class="card-fasilitas ms-xl-3">
        <h4>{{ $row->harga }} / Malam</h4>
        <p><i class="bi bi-star-fill"></i> 0.0</p>
      </div>
    </div>
  </div>
  @endforeach
