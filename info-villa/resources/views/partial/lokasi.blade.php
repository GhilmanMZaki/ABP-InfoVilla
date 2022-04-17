<!-- Semua Lokasi -->
@foreach ($lokasi->unique('lokasi') as $row)
<div class="col-2 mx-5 my-lg-3 ">
    <div class="lokasi pb-1 d-flex justify-content-center align-content-center">
      <a href="/?search={{ $row->lokasi }}" class="text-dark text-center text-decoration-none"><h4>{{ $row->lokasi }}</h4></a>
    </div>
  </div>
@endforeach  
  