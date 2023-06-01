@extends('Home.layout')

@section("content")

<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
    .section-title h2 span {
        color: #3601c6;
    }

    .section-title h2 {
        margin: 15px 0 0 0;
        font-size: 32px;
        font-weight: 700;
        color: #5f5950;
    }

    .section-title {
        text-align: center;
        padding-bottom: 30px;
    }

    section {
        padding: 60px 0;
        margin-top: -10rem;
    }

    .section-title p {
        font-weight: bold;
        margin: 15px auto 0px;
        color: red;
        font-size: 13px;
    }

    .book-a-table .php-email-form {
        width: 100%;
        box-shadow: rgba(0, 0, 0, 0.12) 0px 0px 24px 0px;
        padding: 30px;
        background: rgb(255, 255, 255);
    }

    form {
        display: block;
        margin-top: 0em;
    }

    .section-title p {
        width: 50%;
    }
    }

    .contact .info-wrap {
        box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--bs-gutter-y));
        margin-right: calc(-0.5 * var(--bs-gutter-x));
        margin-left: calc(-0.5 * var(--bs-gutter-x));
    }

    .book-a-table .php-email-form .form-group {
        padding-bottom: 8px;
    }

    .book-a-table .php-email-form input {
        height: 44px;
    }

    .book-a-table .php-email-form input,
    .book-a-table .php-email-form textarea {
        box-shadow: none;
        font-size: 14px;
        border-radius: 0px;
    }

    .book-a-table .php-email-form .validate {
        display: none;
        color: red;
        font-weight: 400;
        font-size: 13px;
        margin: 0px 0px 15px;
    }

    .mt-3 {
        margin-top: 1rem !important;
    }

    .mb-3 {
        margin-bottom: 1rem !important;
    }

    .book-a-table .php-email-form .loading {
        display: none;
        text-align: center;
        background: rgb(255, 255, 255);
        padding: 15px;
    }

    .book-a-table .php-email-form textarea {
        padding: 10px 12px;
    }

    textarea.form-control {
        min-height: calc(1.5em + 0.75rem + 2px);
    }

    .book-a-table .php-email-form .error-message {
        display: none;
        color: rgb(255, 255, 255);
        text-align: left;
        font-weight: 600;
        background: rgb(237, 60, 13);
        padding: 15px;
    }

    .book-a-table .php-email-form .sent-message {
        display: none;
        color: rgb(255, 255, 255);
        text-align: center;
        font-weight: 600;
        background: rgb(24, 210, 110);
        padding: 15px;
    }

    .text-center {
        text-align: center !important;
    }

    .book-a-table .php-email-form button[type="submit"] {
        color: rgb(255, 255, 255);
        background: #3601c6;
        border-width: 0px;
        border-style: initial;
        border-color: initial;
        border-image: initial;
        padding: 10px 24px;
        transition: all 0.4s ease 0s;
        border-radius: 50px;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
        margin: 0px;
    }

    [type="button"]:not(:disabled),
    [type="reset"]:not(:disabled),
    [type="submit"]:not(:disabled),
    button:not(:disabled) {
        cursor: pointer;
    }

</style>


<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px; background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)), url({{ asset('assets/img/carousel-bg.jpg') }}) center center no-repeat;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">Demander une prestation</h1>
        </div>
    </div>
</div>
</div>

<!-- Debut du formulaire-->


<section id="book-a-table" class="book-a-table">
    <div class="container">
        <div class="section-title">
            <div class="form-group ">
                <!--AFFICHER LE MESSAGE DE SUCCESS-->
                @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <h5 class="text-center text-uppercase">{{ $message }}</p>
                </div>
                @endif

                @if($message = Session::get('error'))
                <div class="alert alert-danger">
                    <h5 class="text-center">{{ $message }}</h5>
                </div>
                @endif<br><br>

                <!--AFFICHER LE MESSAGE D_ERROR-->
                @if($errors->any())
                <div class="alert alert-danger">
                    <p>Oups</p> Il y a eu des problèmes avec votre entrée.<br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!--EN ERROR-->
            </div>

            <h2>VEUILLEZ REMPLIR <span>LE FORMULAIRE</span></h2>
            <p>
                NB: Les champs marqués par une étoile sont obligatoires .
            </p>
        </div>
        <form action="{{ route('store.prestation') }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data" id="regForm">
            @csrf

            <div class="row">

                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                    <label for="">Prestation demandée </label>
                    <select id="inputState" class="form-select" name="prestation_demande">
                        <option selected>--Choisissez la prestation souhaitée--</option>
                        <option>test</option>
                    </select>
                </div>
                @error('prestation_demande')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                    <label for="">Mode de travail </label>
                    <select id="inputState" class="form-select" name="mode_travail">
                        <option selected>--Choisissez un mode de travail--</option>
                        <option>----</option>
                    </select>
                </div>
                @error('mode_travail')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-lg-4 col-md-6 form-group mt-3">
                    <label for="">Salaire proposé </label> <code><span style="color:red">*</code>
                    <input type="text" name="salaire_propose" class="form-control" id="ville" placeholder="Salaire proposé" required>
                </div>
                @error('salaire_propose')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-lg-4 col-md-6 form-group mt-3">
                    <label for="">Age du prestataire : </label>
                    <select id="inputState" class="form-select" name="age_prestataire">
                        <option selected>--Choisissez un champ--</option>
                        <option>test</option>
                    </select>
                </div>
                @error('age_prestataire')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-lg-4 col-md-6 form-group mt-3">
                    <label for="specificite_id">Ethnie: </label>
                    <select id="inputState" class="form-select" name="ethnie">
                        <option selected>--Choisissez un champ--</option>
                        <option>test</option>
                    </select>
                </div>

                @error('ethnie')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-lg-4 col-md-6 form-group mt-3">
                    <label for="">Date d'exécution de la prestation: </label>
                    <input type="date" class="form-control" name="date_execution_demande" id="date_execution_demande" placeholder="Précisez la date">
                </div>
                @error('date_execution_demande')
                <span class="text-danger">{{ $message }}</span>
                @enderror


                {{-- <div class="col-lg-4 col-md-6 form-group mt-3">
                    <label for="">Date de l'appel: </label>
                    <input type="date" class="form-control" name="date_appel" id="date_appel" placeholder="Précisez la date">
                </div>
                @error('date_appel')
                <span class="text-danger">{{ $message }}</span>
                @enderror --}}



                <div class="form-group mt-3">
                    <label for="description_detaillee">Observation</label>
                    <textarea class="form-control" name="observation" rows="5" placeholder="Veuillez saisir une observation"></textarea>
                </div>
                @error('observation')
                <span class="text-danger">{{ $message }}</span>
                @enderror


            </div>


            <div class="text-center"><button type="submit">Envoyer la demande</button></div>
        </form>
    </div><br><br>
</section>


<!--Fin du formulaire-->




@endsection
