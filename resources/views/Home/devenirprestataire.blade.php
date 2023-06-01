@extends('Home.layout')

@section('content')

<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
    .tab h2 span {
        color: #3601c6;
    }

    .tab h2 {
        margin: 15px 0 0 0;
        font-size: 32px;
        font-weight: 700;
        color: #5f5950;
    }

    .tab h2 {
        text-align: left;
        padding-bottom: 30px;
    }

    tab {
        padding: 60px 0;
    }

    .tab code {
        text-align: center;
        padding-bottom: 30px;
        font-weight: bold;
        margin: 15px auto 0px;
        color: red;
        font-size: 13px;
    }



    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    }

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        margin-top: -5rem;
        width: 70%;
        min-width: 300px;
    }

    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: none;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--bs-gutter-y));
        margin-right: calc(-0.5 * var(--bs-gutter-x));
        margin-left: calc(-0.5 * var(--bs-gutter-x));
    }

    button {
        background-color: #04AA6D;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #04AA6D;
    }

</style>

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px; background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)), url({{ asset('assets/img/carousel-bg.jpg') }}) center center no-repeat;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">Devenez prestataire</h1>
        </div>
    </div>
</div>
</div>
<!-- Navbar End -->





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

<!--AFFICHER LE MESSAGE ERROR-->
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


<form action="{{ route('store.devenir') }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data" id="regForm">
    @csrf
    <div class="tab">
        <h2 class="text-center">INFORMATIONS <span>PERSONNELLES</span></h2>
        <h5 class="text-center">
            <code>

                NB: Les champs marqués par une étoile sont obligatoires .
            </code> <br /><br />
        </h5>

        <div class="row">
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                <label for="">Nom : </label> <code><span style="color:red">*</code>
                <p><input placeholder="Nom" oninput="this.className = ''" name="nom"></p>
            </div>
            @error('nom')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                <label for="">Prénom(s) : </label> <code><span style="color:red">*</code>
                <p><input placeholder="Prénom" oninput="this.className = ''" name="prenom"></p>
            </div>
            @error('prenom')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Civilité : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="civilite">
                    <option selected>Choisir votre Civilité</option>
                    <option value="célibataire">Célibataire</option>
                    <option value="Marié">Marié</option>
                    <option value="Divorcé">Divorcé</option>
                </select>

            </div>
            @error('civilite')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">

                <label for="">Date de naissance : </label> <code><span style="color:red">*</code>
                <input type="date" class="form-control" name="date_naissance" id="date_appel" placeholder="Précisez la date">
            </div>
            @error('date_naissance')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Situation matrimoniale : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="situation_matri">
                    <option selected>Situation matrimoniale</option>
                    <option>----</option>
                </select>

            </div>
            @error('situation_matri')
            <span class="text-danger">{{ $message }}</span>
            @enderror



            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">

                <label for="">Nombre d'enfant : </label>
                <p><input type="text" placeholder="Nombre d'enfant" oninput="this.className = ''" name="nombre_enfant"></p>
            </div>
            @error('nombre_enfant')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">

                <label for="">Téléphone 1 : </label> <code><span style="color:red">*</code>
                <p><input placeholder="Téléphone 1" oninput="this.className = ''" name="contact1"></p>
            </div>
            @error('contact1')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">

                <label for="">Téléphone 2 : </label>
                <p><input type=" text" placeholder="Téléphone 2" oninput="this.className = ''" name="contact2"></p>
            </div>

            @error('contact2')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">

                <label for="">Whatsapp : </label>
                <p><input placeholder="Whatsapp" oninput="this.className = ''" name="whatsapp"></p>
            </div>

            @error('whatsapp')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">

                <label for="">Adresse mail : </label>
                <p><input placeholder="E-mail" oninput="this.className = ''" name="adresse"></p>
            </div>

            @error('adresse')
            <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Ethnie : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="ethnie">
                    <option selected>Choisir votre ethnie</option>
                    <option>----</option>
                </select>

            </div>

            @error('ethnie')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Commune : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="commune">
                    <option selected>Choisir votre commune</option>
                    <option>----</option>
                </select>

            </div>

            @error('commune')
            <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Quartier : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="quartier">
                    <option selected>Choisir votre Quartier</option>
                    <option>----</option>
                </select>

            </div>

            @error('quartier')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">


                <label for="">Charger une photo : </label> <code><span style="color:red">*</code>
                <p><input type="file" oninput="this.className = ''" name="photo" placeholder=""></p>
            </div>

            @error('photo')
            <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>

    </div>

    <div class="tab">
        <h2 class="text-center">INFORMATIONS <span>PROFESSIONNELLES</span></h2>

        <h5 class="text-center">
            <code>

                NB: Les champs marqués par une étoile sont obligatoires .
            </code> <br /><br />
        </h5>
        <div class="row">

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Activité : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="activite">
                    <option selected>Activité</option>
                    <option>----</option>
                </select>

            </div>

            @error('activite')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Année d'expérience : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="anne_experience">
                    <option selected>Année d'expérience</option>
                    <option>----</option>
                </select>

            </div>

            @error('anne_experience')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Prétention salariale : </label> <code><span style="color:red">*</code>
                <p><input placeholder="Prétention salariale" oninput="this.className = ''" name="pretention_salariale"></p>

            </div>

            @error('pretention_salariale')
            <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Zone d'intervention: </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="zone_intervention">
                    <option selected>Zone d'intervention</option>
                    <option>----</option>
                </select>

            </div>

            @error('zone_intervention')
            <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Personne à contacter : </label> <code><span style="color:red">*</code>
                <p><input placeholder="Personne à contacter en cas d'urgence" oninput="this.className = ''" name="personne_contacter"></p>

            </div>

            @error('personne_contacter')
            <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Référence : </label> <code><span style="color:red">*</code>
                <p><input placeholder="Référence" oninput="this.className = ''" name="reference"></p>

            </div>

            @error('reference')
            <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">

                <label for="">Référence contact: </label> <code><span style="color:red">*</code>
                <p><input placeholder="Référence contact" oninput="this.className = ''" name="reference_contact"></p>

            </div>

            @error('reference_contact')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Alphabétisation : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="alphabetisation">
                    <option selected>--Je ne sai ni lire ni écrire--</option>
                    <option>----</option>
                </select>

            </div>

            @error('alphabetisation')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Dernier diplôme : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="dernier_diplome">
                    <option selected>--Attestation de formation--</option>
                    <option>----</option>
                </select>

            </div>

            @error('dernier_diplome')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>






    <div class="tab">
        <h2 class="text-center">AUTRES <span>INFORMATIONS</span></h2>
        <h5 class="text-center">
            <code>

                NB: Les champs marqués par une étoile sont obligatoires .
            </code> <br /><br />
        </h5>



        <div class="row">

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Mode de travail : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="mode_travail">
                    <option selected>Mode de travail</option>
                    <option>----</option>
                </select>

            </div>

            @error('mode_travail')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Disponibilité : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="disponibilite">
                    <option selected>Votre Disponibilité</option>
                    <option>----</option>
                </select>

            </div>

            @error('disponibilite')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Nature de la pièce : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="nature_piece">
                    <option selected>Nature de la pièce</option>
                    <option>----</option>
                </select>

            </div>

            @error('nature_piece')
            <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Numéro de la pièce : </label> <code><span style="color:red">*</code>
                <p><input placeholder="Numéro de la pièce" oninput="this.className = ''" name="numero_piece"></p>
            </div>
            @error('numero_piece')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Rencontre avec Allô Service ? : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="rencontre_allo_service">
                    <option selected>--Sélectionner un champ--</option>
                    <option>----</option>
                </select>

            </div>

            @error('rencontre_allo_service')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Date de l'appel : </label> <code><span style="color:red">*</code>
                <input type="date" class="form-control" name="date_appel" id="date_appel" placeholder="Précisez la date">

            </div>

            @error('date_appel')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Copie de la pièce </label> <code><span style="color:red">*</code>
                <p><input type="file" oninput="this.className = ''" name="copie_piece" placeholder=""></p>

            </div>

            @error('copie_piece')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Copie du dernier diplôme: </label> <code><span style="color:red">*</code>
                <p><input type="file" oninput="this.className = ''" name="copie_diplome" placeholder=""></p>

            </div>

            @error('copie_diplome')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-4 mt-md-0">
                <label for="">Chatalogue de réalisation: </label> <code><span style="color:red">*</code>
                <p><input type="file" oninput="this.className = ''" name="catalogue" placeholder=""></p>

            </div>

            @error('catalogue')
            <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example3">Observation</label>
                <textarea class="form-control" id="form4Example3" rows="4" name="observation"></textarea>
            </div>
            @error('observation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


    </div>


    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Retour</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
        </div>
    </div>

    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>

@endsection
@yield('js')
