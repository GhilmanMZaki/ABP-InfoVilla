 <!--Kolom Search -->
 <div class="container-fluid p-xl-5 shadow p-3" id="search">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-6 md-auto py-3 bg-dark">
                 <form class="d-flex" action="/">
                     @csrf
                     <input class="form-control me-2" name="search" type="search" placeholder="Cari Villa"
                         aria-label="Search">
                     <button class="btn btn-success w-25" type="submit">Search <i class="bi bi-search"></i></button>
                 </form>
             </div>
         </div>
     </div>
 </div>
