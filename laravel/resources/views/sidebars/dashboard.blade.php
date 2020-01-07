            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-text mx-3">ASIC Dashboard</div>
                </a>
                
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                    @if (Request::path() ==='Dashboard')
                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item active">
                            <a class="nav-link" href="/Dashboard">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard </span>
                            </a>
                        </li>
                    @else
                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link" href="/Dashboard">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        
                    @endif
                
                    
                    
                    <!-- Divider -->
                    <hr class="sidebar-divider mb-1">
                    
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
                        <a class="nav-link {{Request::path() == "photo"? "":"collapsed"}}" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-images fa-sm "></i>
                            <span>Images</span>
                        </a>
                        <div id="collapseUtilities" class="collapse {{Request::path() == "photo"? "show":""}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Gestion des Images</h6>
                                <a class="collapse-item font-weight-bold {{Request::path() == "photo"? "text-primary":""}}" href="/photo">Ajouter</a>
                                <a class="collapse-item font-weight-bold" href="utilities-border.html">Suprimer</a>
                                <a class="collapse-item font-weight-bold" href="utilities-border.html">Modifier</a>
                            </div>
                        </div>
                    </li>
                    
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Addons
                    </div>
                    
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Pages</span>
                        </a>
                        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Login Screens:</h6>
                                <a class="collapse-item" href="login.html">Login</a>
                                <a class="collapse-item" href="register.html">Register</a>
                                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                                <div class="collapse-divider"></div>
                                <h6 class="collapse-header">Other Pages:</h6>
                                <a class="collapse-item" href="404.html">404 Page</a>
                                <a class="collapse-item" href="blank.html">Blank Page</a>
                            </div>
                        </div>
                    </li>
                    
                    <!-- Nav Item - Charts -->
                    <li class="nav-item">
                        <a class="nav-link" href="charts.html">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Charts</span></a>
                        </li>
                        
                        <!-- Nav Item - Tables -->
                        <li class="nav-item">
                            <a class="nav-link" href="tables.html">
                                <i class="fas fa-fw fa-table"></i>
                                <span>Tables</span></a>
                            </li>
                            
                            <!-- Divider -->
                            <hr class="sidebar-divider d-none d-md-block">
                            
                            <!-- Sidebar Toggler (Sidebar) -->
                            <div class="text-center d-none d-md-inline">
                                <button class="rounded-circle border-0" id="sidebarToggle"></button>
                            </div>
                            
            </ul>
            <!-- End of Sidebar -->
