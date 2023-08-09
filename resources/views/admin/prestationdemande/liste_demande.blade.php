@extends('layouts.admin')

@section('content')

<style>
    .badge-mode {
    display: inline-block;
    padding: 0.35em 0.65em;
    font-size: .75em;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
}

.bg-full {
    background-color: #4b38b3;
    color: #fff;
}
</style>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Gestions des Demandes de Prestations</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                                <li class="breadcrumb-item active">
                                    Demande de prestation</li>
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
                            <h4 class="card-title mb-0">
                                Modification & Suppression d'une demande</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    
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
                                        <thead class="table" style="background-color: green">
                                            <tr>
                                                <th class="text-white">N°</th>
                                                <th class="sort text-uppercase text-white" data-sort="customer_name">Clients</th>
                                                <th class="sort text-uppercase text-white" data-sort="customer_presta">Prestations</th>
                                                <th class="sort text-uppercase text-white" data-sort="customer_ethnie">Modes travail</th>
                                                <th class="sort text-uppercase text-white" data-sort="customer_salaire">Salaires</th>
                                                <th class="sort text-uppercase text-white" data-sort="customer_ethnie">Statuts</th>
                                                <th class="sort text-uppercase text-white" data-sort="action" 
                                                style="width: 260px !important">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null($demandeprestations) && $demandeprestations->count() > 0)
                                            @foreach($demandeprestations as $demandeprestation)
                                            <tr>
                                                <th scope="row">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="customer_name">
                                                    {{ $demandeprestation->nom }} {{ $demandeprestation->prenoms }}
                                                </td>
                                                <td class="text-center">
                                                    @if (!is_null($demandeprestation->prestation))
                                                        <small
                                                            class="d-block fw-bold">{{ Str::ucfirst($demandeprestation->prestation->libelle) }}
                                                        </small>
                                                    @endif
                                                </td>

                                                <td class="text">
                                                    <small class="p-2 font-weight-bold fw-bold">
                                                        <small class="badge-mode bg-full mob-block"><i class="bx bxs bx-timer" style="font-size: 14.8px;"></i> {!! !is_null($demandeprestation->mode) ? ($demandeprestation->mode->mode) : 'NULL' !!}   </small>
                                                    </small>
                                                    <span class="d-block text-dark">{{ $demandeprestation->date_demande}}</span>
                                                </td>

                                                <td class="text-center">
                                                    @if (!is_null($demandeprestation->salaire_propose))
                                                        <span><strong>{{ $demandeprestation->salaire_propose }}
                                                                <sup><small>FCFA</small></sup> </strong></span>
                                                    @else
                                                        <small class="badge bg-danger">Indéfini</small>
                                                    @endif
                                                </td>

                                                <td class="status">
                                                   <span class="p-2 badge badge-soft-{{ $demandeprestation->etat == '1' ? 'success' : 'danger' }}"> {{ $demandeprestation->etat == '1' ? 'acceptée' : 'refusée' }}</span>     
                                                </td>

                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_{{ $demandeprestation->id }}">Modifier</button>
                                                        </div>
                                                    
                                                        <div class="detail">
                                                            <button class="btn btn-sm btn-secondary edit-item-btn" data-bs-toggle="modal" data-bs-target="#accepterlModal_{{ $demandeprestation->id }}">Statuts</button>
                                                        </div>
                                                
                                                        <div class="detail">
                                                        <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="#detailModal_{{ $demandeprestation->id }}">Détails</button>
                                                        </div>

                                                        <div class="remove">
                                                        </div>
                                                       <form  id="form-{{ $demandeprestation->id }}" 
                                                        action="{{ route('delete.demande', $demandeprestation->id) }}" 
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $demandeprestation->id }}">Supprimer</button>
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

            

             <!-- statut de la demande-->
            @if(!is_null($demandeprestations))
            @foreach($demandeprestations as $demandeprestation)
            <div class="modal fade" id="accepterlModal_{{ $demandeprestation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ url('accepterDemandeur', $demandeprestation->id) }}" class="" autocomplete="off" method="POST"  enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="etat" value="accepter">
                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly/>
                                </div>

                                <div class="mb-3">
                                    <fieldset class="sm">
                                        <legend for="customername-field" class="form-label">Staut de la demande</legend><br><br>
                                        <div class="row g-3 align-items-center px-3 mb-2">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        id="decisionOff{{ $demandeprestation->id }}" name="etat"
                                                        value="2">
                                                    <label class="form-check-label text-red pointer"
                                                        for="decisionOff{{ $demandeprestation->id }}">
                                                        Demande refusée
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        id="decisionOk{{ $demandeprestation->id }}" name="etat"
                                                        value="1">
                                                    <label class="form-check-label text-success pointer"
                                                        for="decisionOk{{ $demandeprestation->id }}">
                                                        Demande acceptée
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="mb-3">
                                    <div>
                                        <label for="exampleFormControlTextarea5" class="form-label">Motif</label>
                                        <textarea name="motif_de_rejet"  class="form-control" id="exampleFormControlTextarea5" rows="3">{!!$demandeprestation->motif_de_rejet!!}</textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    @if($demandeprestation->etat !=  NULL)
                                        <button type="submit" class="btn btn-success" id="add-btn">Valider</button>
                                    @else
                                    <button type="submit" class="btn btn-success" id="add-btn">Valider</button>
                                   @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            @endforeach
            @endif 


              <!-- modifier prestation-->
              @if(!is_null($demandeprestations))
               @foreach($demandeprestations as $demandeprestation)
               <div class="modal fade" id="editModal_{{ $demandeprestation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: red">Mettre à jour quelques informations</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ route('update.demande', $demandeprestation->id )}}" class="" autocomplete="off" method="POST"  
                            enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="_method" value="put">

                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Nom</label>
                                    <input type="text" id="customername-field" 
                                    class="form-control" name="nom" 
                                    value="{{ $demandeprestation->nom }}"
                                    placeholder=""/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Prénoms</label>
                                    <input type="text" id="customername-field" 
                                    class="form-control" name="prenoms" 
                                    value="{{ $demandeprestation->prenoms }}"
                                    placeholder=""/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Téléphone</label>
                                    <input type="number" id="customername-field" 
                                    class="form-control" name="telephone" 
                                    value="{{ $demandeprestation->telephone }}"
                                    placeholder=""/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Mode de travail</label>
                                    <select class="form-select mb-3" name="mode_id" id="mode_id">
                                        <option value="">--Sélectionner</option>
                                        @if(!is_null($modes))
                                            @foreach($modes as $mode)
                                              <option value="{{ $mode->id }}" 
                                                 @if((int) $demandeprestation->mode_id == (int)$mode->id) selected @endif>
                                                {{ $mode->mode }}
                                              </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Prestation</label>
                                    <select class="form-select mb-3" name="prestation_id" id="prestation_id" aria-label="Default select example">

                                        @if(!is_null($prestations))
                                            @foreach($prestations as $prestation)
                                              <option value="{{ $prestation->id }}" 
                                                 @if((int) $demandeprestation->prestation_id == (int)$prestation->id) selected @endif>
                                                {{ $prestation->libelle }}
                                              </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Ethnie</label>
                                    <select class="form-select mb-3" name="ethnie_id" id="ethnie_id" aria-label="Default select example">
                                        @if(!is_null($ethnies))
                                            @foreach($ethnies as $ethnie)
                                              <option value="{{ $ethnie->id }}" 
                                                 @if((int) $demandeprestation->ethnie_id == (int)$ethnie->id) selected @endif>
                                                {{ $ethnie->ethnie }}
                                              </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Salaire</label>
                                    <input type="text" id="customername-field" 
                                    class="form-control" name="salaire_propose" 
                                    value="{{ $demandeprestation->salaire_propose}}"
                                    placeholder=""/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Age</label>
                                    <input type="text" id="customername-field" 
                                    class="form-control" name="age_demande" 
                                    value="{{ $demandeprestation->age_demande}}"
                                    placeholder=""/>
                                </div>

                                <div class="col-sm-12">
                                    <label for="observation" class="col-form-label">Observation :
                                    </label>
                                    <textarea cols="30" rows="5" id="observation" name="observation" class="form-control">{{ $demandeprestation->observation }}</textarea>
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



            @if(!is_null($demandeprestations))
            <section>
               @foreach($demandeprestations as $demandeprestation)
          <!-- Modal detail-->
              <div class="modal fade zoomIn" id="detailModal_{{ $demandeprestation->id }}" tabindex="-1" aria-labelledby="detailModal{{ $demandeprestation->id }}Label" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header" style="background-color: #e9e9e9">
                            <h1 class="modal-title fs-5 text-uppercase text-primary">
                                Fiche de demande de Prestation : </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                          <div class="modal-body modalBody">
                            <div class="row">
                                <div class="col-lg-9 col-md-9">
                                    {{-- Personnelles --}}
                                    <div class="mb-3 bloc-item">
                                        <u><h4 class="bloc-title fw-bolder">Informations sur le client :</h4>
                                        </u>
                                        @if (!is_null($demandeprestation))
                                            <p>
                                            <table width="100%">
                                                <tbody width="100%">
                                                    <tr width="100%">
                                                        <td width="35%">
                                                            <span class="fs-16">Nom & Prénoms :</span>
                                                        </td>
                                                        <td class="fw-bolder" width="65%" class="data">
                                                            <span class="fw-bolder fs-16">
                                                                {{ Str::ucfirst($demandeprestation->nom) }}  
                                                                {{ Str::ucfirst($demandeprestation->prenoms) }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>

                                            @if (!is_null($demandeprestation->telephone))
                                                <p>
                                                <table width="100%">
                                                    <tbody width="100%">
                                                        <tr width="100%">
                                                            <td width="35%">
                                                               <span class="fs-16"> Téléphone :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                <span class="fw-bolder fs-16"><a
                                                                    href="tel:+{{ Str::ucfirst($demandeprestation->telephone) }}">
                                                                    {{ Str::ucfirst($demandeprestation->telephone) }}
                                                                    &nbsp;&nbsp; <i class="fa fa-link"></i>
                                                                </a></span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </p>
                                            @endif

                                            @if (!is_null($demandeprestation->email))
                                                <p>
                                                <table width="100%">
                                                    <tbody width="100%">
                                                        <tr width="100%">
                                                            <td width="35%">
                                                                <span class="fs-16">Email :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                <span class="fw-bolder fs-16">
                                                                    <a
                                                                    href="mailto:{{ Str::ucfirst($demandeprestation->email) }}">
                                                                    {{ Str::ucfirst($demandeprestation->email) }}
                                                                    &nbsp;&nbsp; <i class="fa fa-link"></i>
                                                                </a>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </p>
                                            @endif
                                        @endif
                                    </div><br>


                                    {{-- Pro --}}
                                    <div class="mb-3 bloc-item">
                                       <u> <h4 class="bloc-title fw-bolder">Informations Professionnelles :</h4></u>
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Prestation demandée :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        @if (!is_null($demandeprestation->prestation))
                                                            <span class="fw-bolder fs-16">{{ Str::ucfirst($demandeprestation->prestation->libelle) }}</span>
                                                        @endif
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
                                                           <span class="fs-16"> Mode de prestation :</span>
                                                        </td>
                                                        <td width="65%" class="data">
                                                            @if (!is_null($demandeprestation->mode))
                                                            <span class="fw-bolder fs-16">{{ Str::ucfirst($demandeprestation->mode->mode) }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>

                                        @if (!is_null($demandeprestation->ethnie))
                                            <p>
                                            <table width="100%">
                                                <tbody width="100%">
                                                    <tr width="100%">
                                                        <td width="35%">
                                                           <span class="fs-16"> Ethnie demandée :</span>
                                                        </td>
                                                        <td width="65%" class="data">
                                                           <span class="fw-bolder fs-16"> {{ Str::ucfirst($demandeprestation->ethnie->ethnie) }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>
                                        @endif

                                        @if (!is_null($demandeprestation->age_demande))
                                            <p>
                                            <table width="100%">
                                                <tbody width="100%">
                                                    <tr width="100%">
                                                        <td width="35%">
                                                           <span class="fs-16"> Âge demandé :</span>
                                                        </td>
                                                        <td width="65%" class="data">
                                                            <span class="fw-bolder fs-16">{{ Str::ucfirst($demandeprestation->age_demande) }} ans</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>
                                        @endif


                                        @if (!is_null($demandeprestation->salaire_propose))
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                       <span class="fs-16"> Proposition salariale :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                    <span class="fw-bolder fs-16">
                                                        {{ ($demandeprestation->salaire_propose) . ' F CFA' }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                        @endif
                                    </div>

                                    {{-- Autres --}}
                                    <div class="mb-3 bloc-item">
                                        <u><h4 class="bloc-title fw-bolder">Autres Informations :</h4>
                                        </u>
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Date de la prestation :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fw-bolder fs-16">
                                                            {{ !is_null($demandeprestation->date_demande) ? $demandeprestation->date_demande : '(non précisée)' }}
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
                                                        <span class="fs-16">Heure :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                       <span class="fw-bolder fs-16"> {{ $demandeprestation->heure_demande }}</span>
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
                                                            <span class="fs-16">Observation :</span><br><br>
                                                        </td>
                                                        <td width="65%" class="data">
                                                           <span class="fw-bolder fs-16"> 
                                                            {!! $demandeprestation->observation !!}
                                                           </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                <a href="javascript:window.print()" class="btn btn-secondary"><i class="ri-printer-line align-bottom me-1"></i> Imprimer</a>
                                <a class="btn btn-primary" href="{{ url('/demande/fiche', $demandeprestation->id )}}"><i class="ri-download-2-line align-bottom me-1"></i>Télécharger
                                </a>
                                
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
          <!--end modal -->
               @endforeach
        
        </section>
            @endif
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection

@yield('js')