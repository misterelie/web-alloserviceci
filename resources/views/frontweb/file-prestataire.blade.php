@extends('layouts.master')

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


<section>
    <div class="container-fluid">
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
                <p>Oups</p> Il y a eu des problèmes avec vos entrées.<br><br>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!--EN ERROR-->
        
        <form action="{{ route('save.devenirprestataire') }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data" id="regForm">
            @csrf
            <div class="tab">
                <h2 class="text-center">INFORMATIONS <span>PERSONNELLES</span></h2>
                <h5 class="text-center">
                    <code>
                        NB: Les champs marqués par une étoile sont obligatoires .
                    </code><br>
                </h5>
        
                <div class="row">
                    <div class="col-lg-4 col-md-6 form-group  mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Nom : </label>
                        <p><input type="text" id="form1Example2"
                                class="form-control form-control-lg @error('nom') is-invalid @enderror" name="nom"
                                placeholder="Ex: Kouadio"/>
                            @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </p>
                    </div>
                <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Prénoms : </label>
                        <p><input type="text" id="form1Example2" 
                            class="form-control form-control-lg @error('prenoms') is-invalid @enderror" name="prenoms" 
                            placeholder="Ex: test alloservice"/>
                    @error('prenoms')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </p>
                </div>
                   
                <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                    <label for=""><span style="color: red">*</span> Civilité : </label>
                    <select class="@error('civilite') is-invalid @enderror form-select form-select-lg mb-3" name="civilite" required>
                        <option selected>Choisir votre civilité</option>
                        <option value="Mlle">Mademoiselle</option>
                        <option value="M">Monsieur</option>
                        <option value="Mme">Madame</option>
                    </select>
                    @error('civilite')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                    <label for=""><span style="color: red">*</span> Date de naissance : </label>
                    <input type="text" class="@error('date_naiss') is-invalid @enderror form-control form-control-lg" 
                       name="date_naiss" id="date_appel" placeholder="Ex: 10/10/1990">
                </div>
                @error('date_naiss')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        
                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0" style="color: #1b9c1e">
                    <label for=""><span style="color: red">*</span> Situation matrimoniale : </label>
                    <select class="@error('situation_matri') is-invalid @enderror form-select form-select-lg mb-3"
                        name="situation_matri" required>
                        <option>Situation matrimoniale</option>
                        <option>Célibataire</option>
                        <option>Marié(e)</option>
                        <option>Veuve</option>
                        <option>Divorcée</option>
                    </select>
                    @error('situation_matri')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for="">Nombre d'enfant : </label>
                            <p>
                                <input type="text" class="form-control form-control-lg" name="nbre_enfant" id="nbre_enfant" 
                                placeholder="Ex: 0">
                            </p>
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Téléphone 1 : </label>
                        <p>
                            <input type="tel"
                                class="form-control form-control-lg @error('telephone1') is-invalid @enderror"
                                name="telephone1" id="telephone1" placeholder="Ex: 0143592128">
                            @error('telephone1')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </p>
                    </div>
                   
                    <div class="col-lg-4 col-md-6 form-group" style="color: #1b9c1e">
                        <label for="">Téléphone 2 : </label>
                        <p>
                            <input type="tel" class="form-control form-control-lg" name="telephone2" id="telephone1" placeholder="Ex: 0143592128">
                        </p>
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for="">Whatsapp : </label>
                        <p><input type="number" class="form-control form-control-lg" name="whatsapp" id="whatsapp"
                                placeholder="Ex:0143592128">
                        </p>
                    </div>
            
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for="">Adresse Email : </label>
                        <p><input type="email" class="form-control form-control-lg"
                                name="email" id="email" placeholder="Ex: alloservice@gmail.com">
                        </p>
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Ethnie : </label>
                        <select class="@error('ethnie_id') is-invalid @enderror form-select form-select-lg mb-3" name="ethnie_id" required>
                            <option>Choisissez votre ethnie</option>
                            @if(!is_null($ethnies))
                                @foreach($ethnies as $ethnie)
                                    <option value="{{ $ethnie->id }}"
                                        {{ !is_null(old('ethnie')) ? 'selected' : '' }}>
                                        {{ Str::ucfirst($ethnie->ethnie) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('ethnie_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Commune : </label>
                        <select class="@error('commune_id') is-invalid @enderror form-select form-select-lg mb-3"
                            name="commune_id" required>
                            <option selected>Choisissez votre commune</option>
                            @if(!is_null($communes))
                                @foreach($communes as $comm)
                                    <option value="{{ $comm->id }}">
                                        {{ !is_null(old('commune')) ? 'selected' : '' }}
                                        {{ Str::ucfirst($comm->commune) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    @error('commune_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for="">Quartier : </label>
                        <p><input type="text" class="form-control form-control-lg"
                                name="quartier" id="quartier" placeholder="Ce champ n'est pas obligatoire">
                        </p>
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label class="form-label" for=""><span style="color: red">*</span> Charger une photo :
                            <input class="form-control form-control-lg
                            @error('photo') is-invalid @enderror" type="file" name="photo" placeholder=".form-control-lg">
                            @error('photo')
                            <span class=" text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
        
            </div>
        
            <div class="tab">
                <h2 class="text-center">INFORMATIONS <span>PROFESSIONNELLES</span></h2>
                <h5 class="text-center">
                    <code>
        
                        NB: Les champs marqués par une étoile sont obligatoires .
                    </code><br/>
                </h5>
                <div class="row">
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Domaine d'activité : </label>
                        <select class="@error('prestation_id') is-invalid @enderror form-select form-select-lg mb-3" name="prestation_id" required>
                            <option selected>Choisissez le domaine</option>
                            @if (!is_null($prestations))
                            @foreach ($prestations as $prestation)
                                <option value="{{ $prestation->id }}"
                                    {{ $prestation->id == $recup_pres->id ? 'selected' : ''}}>
                                    {{ Str::ucfirst($prestation->libelle) }}
                                </option>
                            @endforeach
                       @endif
                        </select>
                        @error('prestation_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Année(s) d'expérience : </label>
                        <select class="form-select form-select-lg mb-3 @error('anne_experience') is-invalid @enderror" name="annee_experience" required>
                            <option selected>Année d'expérience</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                        </select>
                        @error('annee_experience')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Prétention salariale : </label>
                        <p><input type="text" class="form-control form-control-lg @error('pretention_salariale') is-invalid @enderror"
                                name="pretention_salairiale" id="pretention_salairiale" placeholder="Précisez votre salaire">
                            @error('pretention_salairiale')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </p>
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for="">Zone d'intervention : </label>
                        <select class="form-select form-select-lg mb-3"
                            name="zone">
                            <option selected>Choisissez votre zone</option>
                            @if(!is_null($communes))
                                @foreach($communes as $comm)
                                    <option value="{{ $comm->id }}">
                                        {{ !is_null(old('commune')) ? 'selected' : '' }}
                                        {{ Str::ucfirst($comm->commune) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                   
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for="">Personne à contacter :
                        <p><input type="text"
                                class="form-control form-control-lg"
                                name="contact_urgence" placeholder="Ex: Kouassi 0558259632">
                        </p>
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for="">Votre Référence : </label>
                        <p><input type="text" class="form-control form-control-lg"
                                name="reference" id="reference" placeholder="Ex: Chez la fammille Aka">
                        </p>
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for="">Contact de votre référence: </label>
                        <p><input type="tel" class="form-control form-control-lg" name="contact_reference"
                                id="contact_reference" placeholder="Ex: 0102556389"></p>
                    </div>
                   
                    <div class="col-lg-4 col-md-6 form-group mt-md-0 mb-3" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Alphabétisation: </label>
                        <select class="@error('alphabet_id') is-invalid @enderror form-select form-select-lg" name="alphabet_id" required>
                            <option selected>Choisissez</option>
                            @if(!is_null($alphabets))
                                @foreach($alphabets as $alphabet)
                                    <option value="{{ $alphabet->id }}">
                                        {{ !is_null(old('alphabet_id')) ? 'selected' : '' }}
                                        {{ Str::ucfirst($alphabet->alphabet) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('alphabet_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Dernier diplôme : </label>
                        <select class="@error('diplome_id') is-invalid @enderror form-select form-select-lg mb-3" name="diplome_id">
                            <option selected>Choisissez le diplome</option>
                            @if(!is_null($diplomes))
                                @foreach($diplomes as $diplome)
                                    <option value="{{ $diplome->id }}">
                                        {{ !is_null(old('diplome_id')) ? 'selected' : '' }}
                                        {{ Str::ucfirst($diplome->diplome) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('diplome_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        
            <div class="tab">
                <h2 class="text-center">AUTRES <span>INFORMATIONS</span></h2>
                <h5 class="text-center">
                    <code>
                        NB: Les champs marqués par une étoile sont obligatoires .
                    </code> <br />
                </h5>
                <div class="row">
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Mode de travail: </label>
                        <select class="@error('mode_id') is-invalid @enderror form-select form-select-lg mb-3" name="mode_id" required>
                            <option selected>Choisissez le mode</option>
                            @if(!is_null($modes))
                                @foreach($modes as $mode)
                                    <option value="{{ $mode->id }}">
                                        {{ !is_null(old('mode_id')) ? 'selected' : '' }}
                                        {{ Str::ucfirst($mode->mode) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('mode_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Disponibilité : </label>
                        <select class="@error('dispo_id') is-invalid @enderror form-select form-select-lg mb-3" name="dispo_id">
                            <option>Choisissez votre Disponibilité</option>
                            @if(!is_null($dispos))
                                @foreach($dispos as $dispo)
                                    <option value="{{ $dispo->id }}">
                                        {{ !is_null(old('dispo_id')) ? 'selected' : '' }}
                                        {{ Str::ucfirst($dispo->dispo) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('dispo_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Nature de la pièce : </label>
                        <select class="form-select form-select-lg mb-3 
                            @error('piece_id') is-invalid @enderror" aria-label=".form-select-lg example"
                                    name="piece_id">
                            <option selected>Nature de la pièce</option>
                            @if(!is_null($pieces))
                                @foreach($pieces as $piece)
                                    <option value="{{ $piece->id }}">
                                        {{ !is_null(old('piece_id')) ? 'selected' : '' }}
                                        {{ Str::ucfirst($piece->piece) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('piece_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Numéro de la pièce : </label>
                        <p>
                            <input class="@error('numero_piece') is-invalid @enderror form-control form-control-lg" type="text" name="numero_piece"
                                placeholder="Numéro de la pièce">
                        </p>
                    </div>
                    @error('numero_piece')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for="">Rencontre avec Allô Service ? : </label>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="canal_id">
                            <option selected>--Sélectionner un champ</option>
                            @if(!is_null($canals))
                                @foreach($canals as $canal)
                                    <option value="{{ $canal->id }}">
                                        {{ !is_null(old('canal_id')) ? 'selected' : '' }}
                                        {{ Str::ucfirst($canal->canal) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for="">Copie de la pièce: </label>
                        <p><input type="file" class="form-control form-control-lg" name="copy_piece" placeholder="">
                        </p>
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label class="form-label" for="">Copie du dernier diplôme: </label>
                        <p><input class="form-control form-control-lg" id="formFileLg" name="copy_last_diplome" type="file">
                        </p>
                    </div>
        
                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for="">Avez-vous un catalogue de réalisation ? </label>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                            name="catalogue_realisa">
                            <option selected>Choisissez</option>
                            <option value="oui">Oui</option>
                            <option value="non">Nom</option>
                        </select>
                    </div>
        
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example3">Observation</label>
                        <textarea class="form-control form-control-lg" id="form4Example3" rows="4" name="avis">
                                </textarea>
                    </div>
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

    </div>
   
</section>

@endsection
@yield('js')
