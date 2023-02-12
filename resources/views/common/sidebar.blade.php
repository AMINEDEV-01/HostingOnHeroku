<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
        <img class="img-profile rounded-circle"
                    src="{{asset('admin/img/logo-504x300_0_anef.jpg')}}" width="80px;">
        </div>
        <div class="sidebar-brand-text mx-3">Eaux et Forets</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span></a>
    </li>


    
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
       


        <!--  -->

        <!-- Heading -->
        <div class="sidebar-heading">
            Foret
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown7777"
                aria-expanded="true" aria-controls="taTpDropDown7777">
                <i class="fa fa-fw fa-tree" aria-hidden="true"></i>
                <span>Foret</span>
            </a>
            <div id="taTpDropDown7777" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Foret:</h6>
                    <a class="collapse-item" href="{{ route('forets.index') }}">Liste</a>
                    <a class="collapse-item" href="{{ route('forets.create') }}">Ajouter un nouveau</a>
                    <a class="collapse-item" href="{{ route('forets.import') }}">Importer des données</a>
                </div>
            </div>
        </li>
        
<!--  -->
        

        @hasrole('Admin')
        <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestion
            </div>
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown"
                    aria-expanded="true" aria-controls="taTpDropDown">
                    <i class="fas fa-user-alt"></i>
                    <span>Gestion des utilisateurs</span>
                </a>
                <div id="taTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion des utilisateurs:</h6>
                        <a class="collapse-item" href="{{ route('users.index') }}">Liste</a>
                        <a class="collapse-item" href="{{ route('users.create') }}">Ajouter un nouveau</a>
                        <a class="collapse-item" href="{{ route('users.import') }}">Importer des données</a>
                    </div>
                </div>
            </li>
    
    <!-- Divider -->
    
    @endhasrole
   



    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Se déconnecter</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    


</ul>