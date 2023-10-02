
@extends('layouts.admin')

@section('content')

<style>
    p{
        color:red;
    }
</style>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 text-uppercase">Gestion des demandes de devis</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Devis</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success text-center">
                        <p>{{ $message }}</p>
                    </div>
                 @endif
    
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        <strong>Oups !</strong> Oups ! Il y a eu des problèmes avec votre entrée..<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Devis</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i></i>Les demandeurs</button>
                                           
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Rechercher ici...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="fw-bold">Codes devis</th>
                                                <th class="sort" data-sort="customer_name">Nom & Prénom(s)</th>
                                                <th class="sort" data-sort="customer_name">Téléphones</th>
                                                <th class="sort" data-sort="customer_ethnie">Type prestations</th>
                                                <th class="sort" data-sort="customer_ethnie">Modes</th>
                                                <th class="sort" data-sort="email">
                                                    Date.enregistr
                                                </th>
                                                <th class="sort" data-sort="action" 
                                                style="max-width: 260px !important">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null($devis))
                                            @foreach($devis as $devi)
                                            <tr>
                                                <th scope="row" class="fw-bolder">
                                                    {{ $devi->code }}
                                                </th>
                                                <td class="customer_name">{{ $devi->nom }} {{ $devi->prenoms }}</td>
                                                {{-- <td class="customer_prenoms">{{ $devi->prenoms }}</td> --}}
                                                <td class="phone">+225 {{ $devi->telephone }}</td>
                            
                                                <td class="date">
                                                    <span class="p-2 badge badge-soft-success text-uppercase fs-8 fw-bolder">
                                                        {{ $devi->departement->libelle ?? ''   }}
                                                    </span>
                                                </td>

                                                <td class="date">
                                                    <span class="p-2 badge badge-soft-danger text-uppercase fs-8 fw-bolder">
                                                        {{ $devi->modedepartement->libelle }}
                                                    </span>
                                                </td>
                                                <td class="date">{{ date('d.m.Y H:i:s', strtotime($devi->created_at ))}}
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                         <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_{{ $devi->id }}">Modifier</button>
                                                        </div> 
                                                    
                                                        <div class="detail">
                                                        <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="#detailModal_{{ $devi->id }}">Fiche devis</button>
                                                        </div>

                                                        <div class="remove">
                                                        </div>
                                                        <form id="form-{{ $devi->id }}" 
                                                            action="{{url('delete/devis', $devi->id )}}" 
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
    
                                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $devi->id }}">Supprimer</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                           @endforeach
                                           @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="javascrpit:void(0)">
                                            Précédent
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="javascrpit:void(0)">
                                            Suivant
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

             
               <!-- modifier prestation-->
               @if(!is_null($devis))
               @foreach($devis as $devi)
                    <div class="modal fade" id="editModal_{{ $devi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title text-primary fw-bolder text-uppercase" id="exampleModalLabel">
                                        Modifier les informations du devis</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                </div>
                                <form action="{{ route('update.devis', $devi->id ) }}" class="" autocomplete="off" method="POST"  
                                    enctype="multipart/form-data">
                                    @csrf

                                    @method('PUT')
                                    <input type="hidden" name="_method" value="put">

                                    <div class="modal-body">
                                        <div class="mb-3" id="modal-id" style="display: none;">
                                            <label for="id-field" class="form-label">ID</label>
                                            <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="customername-field" class="form-label fw-bolder">Nom :</label>
                                                <input type="text" id="customername-field" 
                                                class="form-control" name="nom" 
                                                value="{{ $devi->nom }}"
                                                placeholder=""/>
                                            </div>
        
                                            <div class="col-6">
                                                <label for="customername-field" class="form-label fw-bolder">Prénoms :</label>
                                                <input type="text" id="customername-field" 
                                                class="form-control" name="prenoms" 
                                                value="{{ $devi->prenoms }}"
                                                placeholder=""/>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="customername-field" class="form-label fw-bolder">Téléphone :</label>
                                                <input type="number" id="customername-field" 
                                                class="form-control" name="telephone" 
                                                value="{{ $devi->telephone }}"
                                                placeholder=""/>
                                            </div>
        
                                            <div class="col-6">
                                                <label for="customername-field" class="form-label fw-bolder">Quartier :</label>
                                                <input type="text" id="customername-field" 
                                                class="form-control" name="quartier" 
                                                value="{{ $devi->quartier }}"
                                                placeholder=""/>
                                            </div> 
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="customername-field" class="form-label fw-bolder">Type de maison :</label>
                                                <select class="form-select mb-3" name="house_id" id="house_id">
                                                    <option value="">--Sélectionner</option>
                                                    @if(!is_null($houses))
                                                    @foreach($houses as $house)
                                                        <option value="{{ $house->id }}" 
                                                            @if((int) $devi->house_id == (int)$house->id) selected @endif>
                                                            {{ $house->libelle }}
                                                        </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="col-6">
                                            <label for="customername-field" class="form-label fw-bolder">Nombre pièces :</label>
                                            <select name="nbre_piece"  class="form-select" id="nbre_piece">
                                            <option value="">-- Sélectionnez une option ---</option>
                                                @for ($i = 1; $i < 21; $i++)
                                                    <option value="{{ $i }}"
                                                        @if ($i === (int) $devi->nbre_piece) selected @endif>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="customername-field" class="form-label fw-bolder">Surface :</label>
                                                <select class="form-select mb-3" name="surface_piece_id" id="surface_piece_id">
                                                    <option value="">--Sélectionner</option>
                                                    @if(!is_null($surface_pieces))
                                                    @foreach($surface_pieces as $surface_piece)
                                                        <option value="{{ $surface_piece->id }}" 
                                                            @if((int) $devi->surface_piece_id == (int)$surface_piece->id) selected @endif>
                                                            {{ $surface_piece->libelle_surface_piece }}
                                                        </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            
                                            <div class="col-6">
                                                <label for="customername-field" class="form-label fw-bolder">Situation :</label>
                                                <select class="form-select mb-3" name="situation_live_id" id="situation_live_id">
                                                    <option value="">--Sélectionner</option>
                                                    @if(!is_null($situa_houses))
                                                    @foreach($situa_houses as $situa_house)
                                                        <option value="{{ $situa_house->id }}" 
                                                            @if((int) $devi->situation_live_id == (int)$situa_house->id) selected @endif>
                                                            {{ $situa_house->libelle }}
                                                        </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="customername-field" class="form-label fw-bolder">Villes :</label>
                                                <select class="form-select mb-3" name="ville_id" id="ville_id">
                                                    <option value="">--Sélectionner</option>
                                                    @if(!is_null($villes))
                                                    @foreach($villes as $city)
                                                        <option value="{{ $city->id }}" 
                                                            @if((int) $devi->ville_id == (int)$city->id) selected @endif>
                                                            {{ $city->libelle }}
                                                        </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
        
                                            <div class="col-6">
                                                <label for="customername-field" class="form-label fw-bolder">Communes :</label>
                                                <select class="form-select mb-3" name="commune_id" id="commune_id">
                                                    <option value="">-- Sélectionnez une option ---</option>
                                                    @if(!is_null($communes))
                                                        @foreach($communes as $comm)
                                                        <option value="{{ $comm->id }}" 
                                                            @if((int) $devi->commune_id == (int)$comm->id) selected @endif>
                                                            {{ $comm->commune }}
                                                        </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                    
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="customername-field" class="form-label fw-bolder">Prestations :</label>
                                                    <select class="form-select mb-3" name="departement_id" id="prestation_id" aria-label="Default select example">
            
                                                        @if(!is_null($departements))
                                                            @foreach($departements as $departement)
                                                            <option value="{{ $departement->id }}" 
                                                                @if((int) $devi->departement_id == (int)$departement->id) selected @endif>
                                                                {{ $departement->libelle }}
                                                            </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="customername-field" class="form-label fw-bolder">Modes :</label>
                                                    <select class="form-select mb-3" name="mode_departement_id" id="mode_departement_id" aria-label="Default select example">
                                                        @if(!is_null($modedepartements))
                                                            @foreach($modedepartements as $modedepartement)
                                                            <option value="{{$modedepartement->id }}" 
                                                                @if((int) $devi->mode_departement_id == (int)$modedepartement->id) selected @endif>
                                                                {{ $modedepartement->libelle }}
                                                            </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="contact_email-field" class="form-label fw-bolder">Date d'exécution : </label>
                                                    <input type="date" id="contact_email-field" name="date_execution" value="{{$devi->date_execution}}" class="form-control" placeholder="Mettre à jour"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="contact_email-field" class="form-label fw-bolder">Heure d'exécution : </label>
                                                    <input type="time" id="contact_email-field" name="heure_execution" value="{{$devi->heure_execution}}" class="form-control" placeholder="Mettre à jour"/>
                                                </div>
                                            </div>

                                        </div><br><br>

                                        <div class="col-lg-12">
                                            <div>
                                                <label for="contactDescription" class="form-label fw-bolder">Plus d'information :</label>
                                                <textarea class="form-control" id="contactDescription" name="description_devis" rows="5" placeholder="" >{!!$devi->description_devis!!}</textarea>
                                            
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-success" id="edit-btn">Mettre à jour</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif 
              <!-- fin modifier -->
              
              <!-- modifier prestation-->
              @if(!is_null($devis))
              @foreach($devis as $devi)
              <section>
                @foreach ($devis as $devi)
                    <!-- Modal -->
                    <div class="modal fade" id="detailModal_{{ $devi->id }}" tabindex="-1"
                        aria-labelledby="detailModal{{ $devi->id }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: blue !important">
                                <h1 style="color: #ffff" class="modal-title fs-7 text-uppercase">
                                        Fiche Devis : 
                                </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
    
                                <div class="modal-body modalBody ">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9">
                                            {{-- Personnelles --}}
                                            <div class="mb-3 bloc-item">
                                                <u><h4 class="bloc-title fw-bolder">
                                                    Informations personnelles :</h4></u>
                                                <table width="100%">
                                                    <tbody width="100%">
                                                        <tr width="100%">
                                                            <td width="35%">
                                                            <span class="fs-20"> Nom & Prénoms :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                <span class="fw-bolder fs-20">
                                                                    {{ Str::ucfirst($devi->nom) }}  
                                                                    {{ Str::ucfirst($devi->prenoms) }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </p>
    
                                                <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                    <span class="fs-20">Téléphone: 
                                                                    </span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                <span class="fw-bolder fs-20"> {{ Str::ucfirst($devi->telephone) }}</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </p>
    
                                                <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                    <span class="fs-20">Email:</span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                    <span class="fw-bolder fs-20">{{ Str::ucfirst($devi->email) }}</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </p>
    
                                                <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                            <span class="fs-20">Ville & Commune:</span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                <span class="fw-bolder fs-20">
                                               {{$devi->ville->libelle }} - {{$devi->commune->commune}}
                                                                </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </p>
    
                                                <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                    <span class="fs-20">Quartier:</span>
                                                                 </td>
                                                                <td width="65%" class="data">
                                                                    <span class="fw-bolder fs-20">
                                                                    {{$devi->quartier}}
                                                                                                                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </p>
    
                                                @if (!is_null($devi->house_id))
                                                    <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                    <span class="fs-20">
                                                                        Type de maison :
                                                                    </span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                <span class="fw-bolder fs-20">
                                                                    {{$devi->house->libelle}}
                                                                </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </p>
                                                @endif 
    
                                                @if (!is_null($devi->nbre_piece))
                                                    <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                <span class="fs-20">
                                                                    Nombre de pièces :
                                                                </span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                <span class="fw-bolder fs-20">
                                                                        {{$devi->nbre_piece}}
                                                                </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </p>
                                                @endif
    
                                                @if (!is_null($devi->surface_piece_id))
                                                    <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                <span class="fs-20">Superficie :</span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                    <span class="fw-bolder fs-20">
                                                        {{$devi->surface->libelle_surface_piece}}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </p>
                                                @endif
    
                                            @if (!is_null($devi->situation_live_id))
                                                <p>
                                                <table width="100%">
                                                    <tbody width="100%">
                                                        <tr width="100%">
                                                            <td width="35%">
                                                            <span class="fs-20">Vit :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                             <span class="fw-bolder fs-20">
                                                                {{$devi->situation->libelle}}
                                                            </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </p>
                                            @endif

                                    @if (!is_null($devi->departement_id))
                                            <p>
                                            <table width="100%">
                                                <tbody width="100%">
                                                    <tr width="100%">
                                                        <td width="35%">
                                                        <span class="fs-20">Prestation :</span>
                                                        </td>
                                                        <td width="65%" class="data">
                                                         <span class="fw-bolder fs-20">
                                                            {{$devi->departement->libelle}}
                                                        </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>
                                        @endif

                                        @if (!is_null($devi->mode_departement_id))
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                    <span class="fs-20">Mode :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                     <span class="fw-bolder fs-20">
                                                        {{ $devi->modedepartement->libelle }}
                                                    </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    @endif
    
                                               @if (!is_null($devi->created_at))
                                                    <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                    <span class="fs-20">enrégistrée Le:</span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                <span class="fs-20 fw-bolder"> 
                                                                    {{ date('d.m.Y H:i:s', strtotime($devi->created_at ))}}
                                                                </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </p>
                                                @endif

                                                <p>
                                                <table width="100%">
                                                    <tbody width="100%">
                                                        <tr width="100%">
                                                            <td width="35%">
                                                            <span class="fs-20">
                                                                Date d'exécution:
                                                            </span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                <span class="fs-20 fw-bolder">
                                                            {{ Str::ucfirst($devi->date_execution) }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </p>

                                                <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                <span class="fs-20">
                                                                   Heure d'exécution:
                                                                </span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                <span class="fs-20 fw-bolder">
                                                                    {{ Str::ucfirst($devi->heure_execution) }}
                                                                </span>
                                                                
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </p>

                                            <div class="mb-3 bloc-item">
                                                <h4 class="bloc-title fs-20">Détails:</h4>
                                                <span class="fs-20">
                                                    @if (!is_null($devi->description_devis))
                                                    {!! $devi->description_devis !!}
                                                    @else
                                                        <div class="alert alert-danger text-center">
                                                            <span class="bx bx-info-circle"></span>&nbsp; Pas d'observations
                                                        </div>
                                                    @endif
                                                </span>
                                               
                                            </div>
                                            </div><br>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark"
                                            data-bs-dismiss="modal">Fermer</button>
                                            <a class="btn btn-primary" 
                                            href="{{ url('devis/fiche', $devi->id )}}" target="_blank"><i class="ri-download-2-line align-bottom me-1"></i>Télécharger
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
              </section>
              @endforeach
              @endif
              <!-- fin modifier -->
        
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
