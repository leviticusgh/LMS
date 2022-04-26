<nav class="navbar navbar-expand navbar-dark static-top" style="background: rgb(5, 77, 68);">

<a class="navbar-brand mr-1" href="" style="color: rgb(211, 209, 207);">Welcome <?php echo $user; ?> <span class="fas fa-user-circle fa-fw"></span></a>

<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
  <i class="fas fa-bars"></i>
</button>

<ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
  <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog fa-spin fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#logoutModal" data-target="#logoutModal" data-toggle="modal">Logout</a>
          </div>
        </li>
</ul>

</nav>
