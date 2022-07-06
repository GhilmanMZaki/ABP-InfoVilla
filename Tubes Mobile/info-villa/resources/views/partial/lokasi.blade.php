<!-- Semua Lokasi -->
@foreach ($lokasi->unique('lokasi') as $row)
    <div class="col-2 mx-5 my-lg-3 ">
        <div class="lokasi pb-1 d-flex justify-content-center align-content-center">
            <form class="d-flex" action="/">
                @csrf
                <input class="form-control me-2" name="lokasi" type="search" placeholder="Cari Villa" aria-label="Search"
                    value="{{ $row->lokasi }}" hidden>
                <button class="btn" type="submit">
                    <h4>{{ $row->lokasi }}</h4>
                </button>
            </form>
        </div>
    </div>
@endforeach
