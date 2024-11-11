<div class="topbar-custom">
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
            <li>
                <button class="button-toggle-menu nav-link">
                    <i data-feather="menu" class="noti-icon"></i>
                </button>
            </li>
           
        </ul>
        <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
               
                    <span class="pro-user-name ms-1">
                        <?php echo $_SESSION["nombre"]; ?> <i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                   
                    <!-- item-->
                    <a href="pages-profile.html" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                        <span>My Account</span>
                    </a>                  

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="<?php echo $url; ?>modulos/salir.php" class="dropdown-item notify-item">
                        <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                        <span>Salir</span>
                    </a>

                </div>
            </li>

        </ul>
    </div>

</div>

</div>