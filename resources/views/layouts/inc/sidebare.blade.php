<div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="{{url('/')}}" class="simple-text logo-normal">
        KS-BIKE
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }}  ">
          <a class="nav-link" href="./dashboard">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('categories') ? 'active':'' }}">
          <a class="nav-link" href="{{ url('categories') }}">
            <i class="material-icons">content_paste</i>
            <p>Categories</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('add-category') ? 'active':'' }}">
          <a class="nav-link" href="{{url ('add-category') }}">
            <i class="material-icons">content_paste</i>
            <p>Ajouter Categorie</p>
          </a>
        </li>
         <li class="nav-item {{ Request::is('products') ? 'active':'' }}">
          <a class="nav-link" href="./products">
            <i class="material-icons">library_books</i>
            <p>Produits</p>
          </a>
        </li>
         <li class="nav-item {{ Request::is('add-product') ? 'active':'' }}">
          <a class="nav-link" href="./add-product">
            <i class="material-icons">library_books</i>
            <p>Ajouter Produit</p>
          </a>
        </li>

        <li class="nav-item  {{ Request::is('orders') ? 'active':'' }}">
          <a class="nav-link" href="./orders">
            <i class="material-icons">bubble_chart</i>
            <p>Commandes</p>
          </a>
        </li>
        <li class="nav-item  {{ Request::is('users') ? 'active':'' }}">
          <a class="nav-link" href="./users">
            <i class="material-icons">person</i>
            <p>Users</p>
          </a>
        </li>
        <li class="nav-item  {{ Request::is('clients') ? 'active':'' }}">
          <a class="nav-link" href="./clients">
            <i class="material-icons">person</i>
            <p>Clients</p>
          </a>
        </li>
        {{--
        <li class="nav-item ">
          <a class="nav-link" href="./notifications.html">
            <i class="material-icons">notifications</i>
            <p>Notifications</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="./rtl.html">
            <i class="material-icons">language</i>
            <p>RTL Support</p>
          </a>
        </li>
        <li class="nav-item active-pro ">
          <a class="nav-link" href="./upgrade.html">
            <i class="material-icons">unarchive</i>
            <p>Upgrade to PRO</p>
          </a>
        </li> --}}
      </ul>
    </div>
  </div>
