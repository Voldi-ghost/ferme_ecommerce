<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <title>@yield('title')</title>
</head>

<body>
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a href="" class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white">Ma ferme</a>
        <div id="navbarSearch" class="navbar-search w-100 collapse"> <input
                class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary" style="height: 100vh;">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5> <button type="button"
                            class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                            aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-2 active"
                                    aria-current="page" href="#"> <i
                                        class="bi bi-house-fill d-flex align-items-center"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-2 active"
                                    aria-current="page" href="#"> <i
                                        class="bi bi-person-fill d-flex align-items-center"></i> Users
                                </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-2" href="{{ route('admin.categories.index') }}"> <i
                                        class="bi bi-folder d-flex align-items-center"></i> Categories
                                </a> </li>
                            <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-2" href="{{ route('admin.produits.index') }}"> <i
                                        class="bi bi-box d-flex align-items-center"></i> Produits
                                </a> </li>
                            <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-2" href="#"> <i
                                        class="bi bi-table d-flex align-items-center"></i> Commandes
                                </a> </li>
                        </ul>
                    </div>
                </div>
            </div>

             <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            
             </main>
        </div>
    </div>

</body>

</html>
