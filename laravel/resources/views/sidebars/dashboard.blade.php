            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/Dashboard">
                    <div class="sidebar-brand-text mx-3">ASIC Dashboard</div>
                </a>

                <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-home"></i>
                    <span>Acceuil</span>
                </a>
            </li>

            <hr class="sidebar-divider my-1">

            @if (Request::path() ==='Dashboard')
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/Dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord </span>
                </a>
            </li>
        @else
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/Dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>

        @endif

                    <hr class="sidebar-divider mb-2">
   <!-- Divider -->
                    <!-- Heading -->
                    {{-- <div class="sidebar-heading">
                        Utilisateurs
                    </div> --}}

                    @if (auth()->user()->role === 'SuperAdmin')
                        @if (Request::path() === 'list')
                            <li class="nav-item active">
                                <a class="nav-link" href="/list">
                                    @if ($pendingUsers >0)
                                        <span class="badge badge-danger mr-5 badge-counter">{{$pendingUsers}}</span>
                                    @endif
                                    <i class="fas fa-user-circle fa-sm "></i>
                                    <span>Liste d'utilisateurs</span>
                                </a>

                            </li>

                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/list">
                                    @if ($pendingUsers >0)
                                        <span class="badge badge-danger mr-5 badge-counter">{{$pendingUsers}}</span>
                                    @endif
                                    <i class="fas fa-user-circle fa-sm "></i>
                                    <span>Liste d'utilisateurs</span>
                                </a>
                            </li>
                        @endif
                    @endif


                    <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link {{Request::path() == "dash"? "":"collapsed"}}" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-images fa-sm "></i>
                            <span>Images</span>
                        </a>
                        <div id="collapseUtilities" class="collapse {{Request::path() == "dash"? "show":""}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Gestion des Images</h6>
                                <a class="collapse-item font-weight-bold {{Request::path() == "dash"? "text-primary":""}}" href="/dash">Ajouter </a>
                                <a class="collapse-item font-weight-bold" href="/Collections">Liste</a>
                            </div>
                        </div>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">
            </ul>
            <!-- End of Sidebar -->
