<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Espace Administrateur Rapidos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href=" {{ asset('images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href=" {{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href=" {{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href=" {{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">

        <!-- Left Sidebar/Navbar Start -->
        @include('Administrateur/layout/navbar')
        @include('Administrateur/layout/sidebar')
        <!-- Left Sidebar/Navbar End -->

        <!-- Start right Content here -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Ajouter Nouveau</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Ajouter Nouveau Client</h4>
                                    <form action="{{ route('client.store') }}" method="POST">
                                        @csrf
                                        <div class="row mb-4">
                                            <label for="nom" class="col-form-label col-lg-2">Nom de
                                                client</label>
                                            <div class="col-lg-10">
                                                <input id="nom" name="nom" type="text"
                                                    class="form-control" placeholder="Entrer le nom">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="prenom" class="col-form-label col-lg-2">Prénom de
                                                client</label>
                                            <div class="col-lg-10">
                                                <input id="prenom" name="prenom" type="text"
                                                    class="form-control" placeholder="Entrer le prenom">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-form-label col-lg-2">E-mail de client</label>
                                            <div class="col-lg-10">
                                                <input id="adresseE" name="adresseE" type="email"
                                                    class="form-control" placeholder="Entrer l'e-mail">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="telephone" class="col-form-label col-lg-2">Numéro de téléphone
                                                de client</label>
                                            <div class="col-lg-10">
                                                <input id="telephone" name="telephone" type="numeric"
                                                    class="form-control" placeholder="Entrer le numéro téléphone">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="col-form-label col-lg-2">Ville de client</label>
                                            <div class="col-lg-10">
                                                <input id="ville" name="ville" type="text"
                                                    class="form-control" placeholder="Entrer la ville">
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-lg-10">
                                                <button type="submit" class="btn btn-primary">Ajouter compte
                                                    client</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>

            @include('Administrateur/layout/footer')
</body>
</html>