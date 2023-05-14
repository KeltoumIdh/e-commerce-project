<!-- la menu de la  page d'acceuil -->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2 ">
  <div class="container">
    <a class="navbar-brand " href="{{Url('/')}}">KS-BIKE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{Url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('category')}}">Category</a>
        </li>
        
      
      </ul>
    </div>
  </div>
</nav>