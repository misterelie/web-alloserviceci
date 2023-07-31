@extends('layouts.base-front')
@section('content')



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
        <form action="{{ url('store/devis')}}" method="post" 
        role="form" class="php-email-form" enctype="multipart/form-data" id="regForm">
            @csrf

            <div class="row">
                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                    <label for=""><span style="color: red">*</span> Nom :</label>
                    <input type="text" name="nom" class="form-control  @error('nom') is-invalid @enderror" id="nom" placeholder="Saisissez votre nom ">
                    @error('nom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                    <label for=""> <span style="color: red">*</span> Prénom(s) :</label>
                    <input type="text" name="prenoms" class="form-control  @error('prenoms') is-invalid @enderror" id="prenoms" 
                    placeholder="Saisissez votre prénom">
                    @error('prenoms')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3">
                    <label for=""><span style="color: red">*</span> Téléphone :</label>
                    <input type="tel" name="telephone" class="form-control @error('telephone') is-invalid @enderror" id="telephone" placeholder="Saisissez votre numéro de téléphone">
                    @error('telephone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                    <label for=""> Email :</label>
                    <input type="email" name="email" class="form-control" id="email" 
                    placeholder="Saisissez votre email">
                </div>
              
                <div class="col-lg-4 col-md-6 form-group mt-3">
                    <label for="ville_id"><span style="color: red">*</span> Sélectionnez la ville : </label>
                    <select name="ville_id" id="ville_id" class="form-select form-select-lg mb-3
                @error('ville_id') is-invalid @enderror">
                <option value="">-- Sélectionnez une option --- </option>
                @if (!is_null($villes))
                    @foreach ($villes as $city)
                        <option value="{{ $city->id }}"
                            {{ !is_null(old('libelle')) ? 'selected' : '' }}>
                            {{ Str::ucfirst($city->libelle) }}
                        </option>
                    @endforeach
                @endif
                </select>
                    @error('libelle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-4 col-md-6 form-group mt-3">
                    <label for=""><span style="color: red">*</span> Sélectionnez le mode de prestation : </label>
                    <select name="mode_id" id="mode_id" class="@error('mode_id') is-invalid @enderror form-select form-select-lg mb-3">
                        <option value="">--- Sélectionnez une option ---</option>
                        @if (!is_null($modes))
                            @foreach ($modes as $mode)
                                <option value="{{ $mode->id }}"
                                    {{ !is_null(old('modes')) ? 'selected' : '' }}>
                                    {{ Str::ucfirst($mode->mode) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('mode_id')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-4 col-md-6 form-group mt-0">
                    <label for="specificite_id"><span style="color: red">*</span> Sélectionnez la prestation concernée: </label>
                    <div id="ajaxRoot">
                        <select name="prestation_id" id="" 
                        class="form-control form-select form-select-lg mb-3">
                            <option value="" ></option>
                        </select>
                     
                    </div>
                </div>

                {{-- <div class="col-lg-4 col-md-6 form-group mt-3">
                    <label for=""><span style="color: red">*</span> Sélectionnez la prestation : </label>
                    <select name="prestation_id" id="prestation_id" class="@error('prestation_id') is-invalid @enderror form-select form-select-lg mb-3">
                        <option value="">--- Sélectionnez une option ---</option>
                        @if (!is_null($prestations))
                            @foreach ($prestations as $prestation)
                                <option value="{{ $prestation->id }}"
                                    {{ !is_null(old('prestation_id')) ? 'selected' : '' }}>
                                    {{ Str::ucfirst($prestation->libelle) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('prestation_id')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}

                <div class="col-lg-4 col-md-6 form-group mt-0">
                    <label for="libelle"><span style="color: red">*</span> Sélectionnez la commune: </label>
                    <div id="getCommune">
                        <select class="form-control make commune_id @error('commune_id') is-invalid @enderror" name="commune_id">
                            <option label=""></option>
                         </select>
                        @error('commune_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
             
               
                <div class="col-lg-4 col-md-6 form-group">
                    <label for=""><span style="color: red">*</span> Quartier :</label>
                    <input type="text" name="quartier" 
                    class="form-control form-control-lg @error('quartier') is-invalid @enderror" id="quartier" 
                    placeholder="Saisissez votre quartier !">
                    @error('quartier')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="col-lg-6 col-md-6 form-group mt-md-0">
                    <label for=""><span style="color: red">*</span> Date d'exécution :</label>
                    <input type="date" name="date_execution" class="form-control  @error('date_execution') is-invalid @enderror" id="date_execution">
                    @error('date_execution')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="col-lg-6 col-md-6 form-group mt-md-0">
                    <label for=""> <span style="color: red">*</span>Heure exécution :</label>
                    <input type="time" name="heure_execution" class="form-control  @error('heure_execution') is-invalid @enderror" id="heure_execution">
                    @error('heure_execution')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group mt-3">
                    <label for="besoin">Plus d'information</label>
                    <textarea class="form-control @error('description_devis') is-invalid @enderror" name="description_devis" rows="5" 
                    placeholder="Donnez-nous plus d'information"></textarea>
                    @error('description_devis')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="text-center"><button type="submit">Envoyer la demande</button></div>
        </form>
    </div><br><br>
</section>
<!--Fin duformulaire-->
@yield('js')
@endsection

