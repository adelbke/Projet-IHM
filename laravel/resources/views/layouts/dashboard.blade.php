<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - @stack('title')</title>
    
    <link rel="stylesheet" href="/css/app.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    @stack('css')
</head>
<body>
    
    <div id="app">
        
        <div id="wrapper">

            @include('sidebars.dashboard')
					
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                
                <!-- Main Content -->
                <div id="content">
                    @include('navbars.dashboard')
                    @yield('content')
                </div>
                <!-- End of Main Content -->
                
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2019</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
                
            </div>
            <!-- End of Content Wrapper -->
        </div>
        
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Prêts à partir ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Sélectionnez "se déconnecter" si vous êtes prêts à vous déconnecter</div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                        {{-- <a class="btn btn-danger" href="/logout">Se déconnecter</a> --}}
                        <form class="" action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-link border-danger shadow text-gray-900">logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @stack('js')
    <script src="/js/app.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>