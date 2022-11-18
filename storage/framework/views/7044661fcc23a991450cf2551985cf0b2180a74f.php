<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <link href="<?php echo e(asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">
    
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>
<body id="page-top">

        <nav>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>
                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.index')): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.index')); ?>">
                                        Administración
                                    </a>
                                <?php endif; ?>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>

                            <div>

                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    

    <?php echo $__env->yieldContent('css'); ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php if(Auth::check()): ?>
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion d-print-none" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="sidebar-brand-text">Sistema Alerta</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider mb-0">

                <!-- Nav Item - Pages Collapse Menu -->
                <?php if(Auth::user()->role == 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Paciente"
                            aria-expanded="true" aria-controls="Paciente">
                            <i class="fas fa-fw fa-user"></i>
                            <span>Paciente</span>
                        </a>
                        <div id="Paciente" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Acciones:</h6>
                                <a class="collapse-item" href="/dashboard/crear-paciente">Crear paciente</a>
                                <a class="collapse-item" href="/dashboard/pacientes">Lista de pacientes</a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(Auth::user()->role == 'admin'): ?>
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Enfermero"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-hands"></i>
                            <span>Enfermero</span>
                        </a>
                        <div id="Enfermero" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Acciones:</h6>
                                <a class="collapse-item" href="/dashboard/crear-enfermero">Crear enfermero</a>
                                <a class="collapse-item" href="/dashboard/enfermeros">Lista de enfermeros</a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Llamados"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-bell"></i>
                            <span>Llamados</span>
                        </a>
                        <div id="Llamados" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Acciones:</h6>
                                <a class="collapse-item" href="/escuchar-llamados">Escuchar llamados</a>
                                <?php if(Auth::user()->role == 'admin'): ?>
                                    <a class="collapse-item" href="/dashboard/llamados">Lista de llamados</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>

                <?php if(Auth::user()->role == 'admin'): ?>
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Áreas"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-home"></i>
                            <span>Áreas</span>
                        </a>
                        <div id="Áreas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Acciones:</h6>
                                <a class="collapse-item" href="/dashboard/crear-area">Crear área</a>
                                <a class="collapse-item" href="/dashboard/areas">Lista de áreas</a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(Auth::user()->role == 'admin'): ?>
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Usuarios"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-users"></i>
                            <span>Usuarios</span>
                        </a>
                        <div id="Usuarios" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Acciones:</h6>
                                <a class="collapse-item" href="/dashboard/crear-usuario">Crear usuario</a>
                                <a class="collapse-item" href="/dashboard/usuarios">Lista de usuarios</a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(Auth::user()->role == 'admin'): ?>
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="/como-usar"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-question"></i>
                            <span>Ayuda</span>
                        </a>
                    </li>
                <?php endif; ?>

                
            </ul>
        <?php endif; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php if(Auth::check()): ?>
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Alerts -->
                            <!-- <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 12, 2019</div>
                                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 7, 2019</div>
                                            $290.29 has been deposited into your account!
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 2, 2019</div>
                                            Spending Alert: We've noticed unusually high spending for your account.
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li> -->


                            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

                            <div id="navbarSupportedContent" class="ml-0 ml-sm-auto">
                                <ul class="ml-auto navbar-nav text-center">
                                        <?php if(Auth::check()): ?>
                                            <li class="active nav-item">
                                                <a class="nav-link text-dark" href="/dashboard">
                                                    <button class="btn btn-primary">
                                                        <i class="fa fa-user mr-md-1"></i>
                                                        <span class="d-none d-md-inline">
                                                            Administrar
                                                        </span>
                                                    </button>
                                                </a>
                                            <li class="active nav-item">
                                                <a class="nav-link" href="/logout">
                                                    <button class="btn btn-danger text-white">
                                                        <i class="fas fa-sign-out-alt mr-md-1"></i>
                                                        <span class="d-none d-md-inline">
                                                            Cerrar sesión
                                                        </span>
                                                    </button>
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li class="active nav-item">
                                                <a class="nav-link text-dark" href="/login">
                                                    <button class="btn btn-primary">
                                                        Ingresar
                                                    </button>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                </ul>
                            </div>

                        </ul>

                    </nav>
                <?php endif; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php echo $__env->yieldContent('content'); ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>EEST N°2 Olavarria - 7°2 Info. - 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
    <?php echo $__env->yieldContent('js'); ?>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>"></script>

</body>

</html><?php /**PATH C:\Users\Desktop\Desktop\code\resources\views/layouts/app.blade.php ENDPATH**/ ?>