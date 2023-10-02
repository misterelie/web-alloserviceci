@extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">La liste des prestataires</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Prestataires</li>
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
                            <h4 class="card-title mb-0">Modification & Suppression d'un prestataire</h4>
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
                                                <th class="sort text-white text-uppercase" data-sort="photo">Photos</th>
                                                <th class="sort text-white text-uppercase" data-sort="customer_name">Nom & Prénoms</th>
                                                <th class="sort text-white text-uppercase" data-sort="nbre_enfant">Date Naissace</th>
                                                <th class="sort text-white text-uppercase" data-sort="telephone">Commune</th>
                                                <th class="sort text-white text-uppercase" data-sort="modes">Prestations</th>
                                               
                                                <th class="sort text-white text-uppercase w-200" data-sort="salaire">Statut</th>
                                                <th  class="sort text-white text-uppercase" data-sort="action" style="width: 260px !important">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null( $prestataires ))
                                            @foreach( $prestataires as $prestataire )
                                            <tr>
                                                <th scope="row">
                                                    {{ $loop->iteration }}
                                                </th>
                                                @if(!is_null($prestataire->photo))

                                                    <td class="photo"><img src="/PrestatairePhoto/{{ $prestataire->photo }}"
                                                        class="img-fluid rounded-circle" width="35">
                                                    </td>
                                                @else
                                                    <td class="photo"><img src="https://crm.alloservice.ci/backend/assets/img/male.png"
                                                        class="img-fluid rounded-circle" width="35">
                                                    </td>
                                                @endif
                                                
                                                <td class="customer_name">
                                                    {{ $prestataire->nom }} {{ $prestataire->prenoms }}
                                                </td>
                                               
                                                <td class="date fw-bolder text-center">{{ $prestataire->date_naiss }} <br> 
                                                    <span class="fw-bolder" style="color: #d08700 !important">{{ $prestataire->civilite }}</span></td>
                                                

                                                <td class="">
                                                <div class="d-block col">
                                                <strong><i class="mdi mdi-home">
                                                    </i>  
                                                    @if (!is_null($prestataire->commune))
                                                    {{ Str::ucfirst($prestataire->commune->commune) }}
                                                    @endif
                                                </i>
                                              </strong>

                                                <span class="d-block"><i class="bx bx-location-map bx-map"></i> 
                                                    &nbsp;{{ Str::ucfirst($prestataire->quartier) }}
                                                </span>
                                                                                                            
                                               </div>
                                                </td>

                                                <td class="">
                                                <div class="d-block col">
                                                                                                                                        <small class="d-block">
                                                                                                                                        {{ $prestataire->prestation->libelle ?? '' }}
                                            </small>
                                                                                                                        <small class="p-2 font-weight-bold fw-bold badge bg-primary">
                                                    <span style="color: #fff"><i class="bx bxs bx-timer" style="font-size: 14.8px;"></i>  
                                                    {{ $prestataire->mode->mode ?? '' }}
                                                    </span>
                            </small>
                                                        
                                                    </div>
                                                </td>
                                                
                                                <td class="status">
                                                    @if($prestataire->archived === 1)
                                                        <span class="badge bg-success mob-block">
                                                            Archivé
                                                        </span>    
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="detail">
                                                            <button class="btn btn-sm btn-warning edit-item-btn">
                                                                 <a class="dropdown-item text-success"
                                                                 href="{{ url('/prestataire/archiveReset', $prestataire) }}"
                                                                 onclick="return confirm('Attention ! Vous êtes sur le point de restaurer ce prestataire des archives. Appuyez sur OK pour confirmer.')">
                                                                 <i class="fa fa-undo"></i><span class="text-white">
                                                                    Restaurer</span></a>
                                                            </button>
                                                         </div>
                                                        <div class="detail">
                                                            <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="#detailModal_{{ $prestataire->id }}">Détails</button>
                                                        </div>

                                                    <form id="form-{{ $prestataire->id }}" action="{{ route('delete.prestataire', $prestataire->id) }}" 
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
    
                                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $prestataire->id }}">Supprimer</button>
                                                    </form>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                            
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">Désolé ! Aucun résultat trouvé</h5>
                                            <p class="text-muted mb-0">Nous avons recherché plus de 150+ Commandes Nous n'avons trouvé aucune
                                                pour votre recherche.</p>
                                        </div>
                                    </div>
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

        {{-- Details Modal --}}
    @if (!is_null($prestataires) && $prestataires->count() > 0)
            <section>
                @foreach ($prestataires as $prestataire)
                    <!-- Modal -->
                    <div class="modal fade" id="detailModal_{{ $prestataire->id }}" tabindex="-1"
                        aria-labelledby="detailModal{{ $prestataire->id }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #ffcc6e !important">
                                    <h1 class="modal-title fs-7 text-uppercase">
                                        Détails sur le prestataire : </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body modalBody ">
                                    <div class="row">

                                        <div class="col-lg-9 col-md-9">
                                            {{-- Personnelles --}}
                                            <div class="mb-3 bloc-item">
                                                <u><h4 class="bloc-title fw-bolder">Informations personnelles :</h4></u>
                                                <table width="100%">
                                                    <tbody width="100%">
                                                        <tr width="100%">
                                                            <td width="35%">
                                                            <span class="fs-16"> Nom & Prénom :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                <span class="fw-bolder fs-16">
                                                                    {{ Str::ucfirst($prestataire->nom) }}  
                                                                    {{ Str::ucfirst($prestataire->prenoms) }}
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
                                                                <span class="fs-16">Situation matrimoniale :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                            <span class="fw-bolder fs-16"> {{ Str::ucfirst($prestataire->situation_matri) }}</span>
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
                                                                <span class="fs-16">Nombre d'enfant :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                <span class="fw-bolder fs-16">{{ Str::ucfirst($prestataire->nbre_enfant) }}</span>
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
                                                                <span class="fs-16">Date de naissance :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                            <span class="fw-bolder fs-16">
                                                                {{ $prestataire->date_naiss }}
                                                            
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
                                                                <span class="fs-16">Contact 1 :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                <span class="fw-bolder fs-16">
                                                                    <a href="tel:+{{ Str::ucfirst($prestataire->telephone1) }}">
                                                                        {{ Str::ucfirst($prestataire->telephone1) }}
                                                                        &nbsp;&nbsp; <i class="fa fa-link"></i>
                                                                    </a>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </p>

                                                @if (!is_null($prestataire->telephone2))
                                                    <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                    <span class="fs-16">Contact 2 :</span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                    <span class="fw-bolder fs-16">
                                                                        <a href="tel:+{{ Str::ucfirst($prestataire->telephone2) }}">
                                                                            {{ Str::ucfirst($prestataire->telephone2) }}
                                                                            &nbsp;&nbsp; <i class="fa fa-link"></i>
                                                                        </a>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </p>
                                                @endif

                                                @if (!is_null($prestataire->whatsapp))
                                                    <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                <span class="fs-16"> whatsapp :</span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                <span class="fs-16 fw-bolder"><a href="https://wa.me/{{ urlencode($prestataire->whatsapp) }}">
                                                                    {{ Str::ucfirst($prestataire->whatsapp) }}
                                                                    &nbsp;&nbsp; <i class="fa fa-link"></i>
                                                                </a>
                                                                </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </p>
                                                @endif

                                                @if (!is_null($prestataire->email))
                                                    <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                <span class="fs-16"> Email :</span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                    <span class="fs-16 fw-bolder">
                                                                        <a href="mailto:{{ $prestataire->email }}">
                                                                            {{ $prestataire->email }}
                                                                            &nbsp;&nbsp; <i class="fa fa-link"></i></a>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </p>
                                                @endif

                                                @if (!is_null($prestataire->ethnie))
                                                    <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                <span class="fs-16"> Ethnie :</span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                <span class="fs-16 fw-bolder">
                                                                    {{ Str::ucfirst($prestataire->ethnie->ethnie) }}
                                                                </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </p>
                                                @endif

                                                @if (!is_null($prestataire->commune))
                                                    <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                    <span class="fs-16">Commune de résidence :</span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                <span class="fs-16 fw-bolder"> 
                                                                    {{ Str::ucfirst($prestataire->commune->commune) }}
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
                                                            <span class="fs-16"> Quartier :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                <span class="fs-16 fw-bolder">
                                                                    {{ Str::ucfirst($prestataire->quartier) }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </p>
                                            </div><br>


                                            {{-- Pro --}}
                                            <div class="mb-3 bloc-item">
                                                <u><h4 class="bloc-title fw-bolder">Informations Professionnelles :</h4>
                                                </u>
                                                <p>
                                                <table width="100%">
                                                    <tbody width="100%">
                                                        <tr width="100%">
                                                            <td width="35%">
                                                                <span class="fs-16">Domaine(s) d'activité :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                @if (!is_null($prestataire->prestation))
                                                                    <span class="fw-bolder fs-16">{{ Str::ucfirst($prestataire->prestation->libelle) }}</span>
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
                                                            <span class="fs-16"> Année(s) d'expérience :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                <span class="fs-16">
                                                                    {{ $prestataire->annee_experience != 0 ? $prestataire->annee_experience . ' ans' : 0 }}
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
                                                                <span class="fs-16">Prétention salariale :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                <span class="fw-bolder fs-16">
                                                                    {{ ($prestataire->pretention_salairiale) }} FCFA
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
                                                            <span class="fs-16"> Zone d'intervention :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                <span class="fs-16 fw-bolder">
                                                                    {{ Str::ucfirst($prestataire->commune->commune) }}
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
                                                                <span class="fs-16">Contact d'urgence :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                            <span class="fs-16 fw-bolder">
                                                                {{ $prestataire->contact_urgence }}
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
                                                                <span class="fs-16">Référence :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                            <span class="fs-16 fw-bolder"> {{ $prestataire->reference }}</span>
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
                                                                <span class="fs-16">Contact référence :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                            <span class="fs-16 fw-bolder">
                                                                {{ $prestataire->contact_reference }}
                                                            </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </p>

                                                @if (!is_null($prestataire->alphabet))
                                                    <p>
                                                    <table width="100%">
                                                        <tbody width="100%">
                                                            <tr width="100%">
                                                                <td width="35%">
                                                                    <span class="fs-16">Alphabétisation :</span>
                                                                </td>
                                                                <td width="65%" class="data">
                                                                    <span class="fs-16 fw-bolder"> {{ $prestataire->alphabet->alphabet }}</span>
                                                                    
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </p>
                                                @endif
                                            </div><br>

                                            {{-- Autres --}}
                                            <div class="mb-3 bloc-item">
                                                <ul><h4 class="bloc-title fw-bolder">Autres Informations :</h4></ul>
                                                <p>
                                                <table width="100%">
                                                    <tbody width="100%">
                                                        <tr width="100%">
                                                            <td width="35%">
                                                            <span class="fs-16"> Mode de travail :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                            <span class="fs-16 fw-bolder">
                                                                {{ !is_null($prestataire->mode) ? $prestataire->mode->mode : '...' }}
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
                                                            <span class="fs-16"> Disponibilité :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                            <span class="fs-16 fw-bolder">
                                                                {{ !is_null($prestataire->dispo) ? $prestataire->dispo->dispo : '...' }}
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
                                                                <span class="fs-16">Pièce d'identité :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                            <span class="fs-16 fw-bolder">
                                                                {{ !is_null($prestataire->piece) ? $prestataire->piece->piece : '...' }}
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
                                                                <span class="fs-16">Numéro de la pièce :</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                            <span class="fs-16 fw-bolder">
                                                                    {{ $prestataire->numero_piece }}
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
                                                                <span class="fs-16">
                                                                    A connu <small><strong>ALLO SERVICE</strong></small> par :
                                                                </span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                            <span class="fs-16 fw-bolder">
                                                                {{ !is_null($prestataire->canal) ? $prestataire->canal->canal : '...' }}
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
                                                            <span class="fs-16"> Date:</span>
                                                            </td>
                                                            <td width="65%" class="data">
                                                                <span class="fs-16 fw-bolder">{{ ($prestataire->created_at) }}</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </p>
                                            </div>


                                            <div class="mb-3 bloc-item">
                                                <h4 class="bloc-title">Observations sur le prestataire:</h4>

                                                @if (!is_null($prestataire->avis))
                                                {!! $prestataire->avis !!}
                                                @else
                                                    <div class="alert alert-danger text-center">
                                                        <span class="bx bx-info-circle"></span>&nbsp; Pas d'observations
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3">
                                            <div class="col-sm-2 previewDiv avatar-box mb-4">

                                                
                                                @if (!is_null($prestataire->photo))
                                                    <img src="../PrestatairePhoto/{{ $prestataire->photo }}"
                                                    class="" width="165px" height="185px">
                                                @else
                                                    <span class="fas fa fa-user camera-icon" id="cameraIcon"></span>
                                                @endif
                                            </div>

                                            <div class="row my-4">

                                                <div class="col-sm-12 mb-4">
                                                    <h4>Dossiers : </h4>
                                                </div>

                                                @if (!is_null($prestataire->copy_piece))
                                                <div class="col-sm-12 mb-3 border">
                                                    @if(!is_null($prestataire->copy_piece))
                                                        <a href="{{ asset('FichierCopiepiece/'.$prestataire->copy_piece) }}"
                                                                        target="_blank" rel="noopener noreferrer">
                                                                        <img src="{{ asset('assets/pdf.png') }}" target-="" 
                                                                        title="Pièce d'identité, Cliquez pour télécharger" download="piece_identite_{{$prestataire->nom."_".$prestataire->prenom}}" alt="{{$prestataire->copy_piece}}" dow width="25">
                                                        </a>
                                                
                                                        @else
                                                            <a href="{{asset($prestataire->copy_piece)}}" download="piece_identite_{{$prestataire->nom."_".$prestataire->prenom}}" class="btn d-block bg-okay"> <span class="bx bx-download"> </span>  Pièce d'identité</a>
                                                        @endif
                                                    
                                                </div>
                                                @endif

                                                @if (!is_null($prestataire->copy_last_diplome))
                                                <div class="col-sm-12 mb-3 border">
                                                    @if(!is_null($prestataire->copy_last_diplome))
                                                                    <a href="{{ asset('FichierCopiepiece/'.$prestataire->copy_last_diplome) }}"
                                                                        target="_blank" rel="noopener noreferrer">
                                                                        <img src="{{ asset('assets/pdf.png') }}" target-="" 
                                                                        title="Dernier Diplôme, Cliquez pour télécharger" alt="{{$prestataire->copy_last_diplome}}" width="25">
                                                                    </a>
                                                    
                                                        @else
                                                            <a href="{{asset($prestataire->copy_last_diplome)}}" download="derniere_diplome_{{$prestataire->nom."_".$prestataire->prenom}}" class="btn bg-okay d-block"><span class="bx bx-download"></span>Diplôme</a>
                                                        @endif
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fermer</button>
                                            <a class="btn btn-primary" 
                                            href="{{ url('fiche/prestataire', $prestataire->id )}}" target="_blank"><i class="ri-download-2-line align-bottom me-1"></i>Télécharger
                                            </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
    @endif

              {{-- archiver le prestataire--}}
              @if ($prestataires->count() > 0)
              <section>
                  @foreach ($prestataires as $prestataire)
                      <!-- Modal -->
                      <div class="modal fade" id="archiveModal_{{ $prestataire->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-header bg-primary p-3">
                                      <h5 class="modal-title text-white text-uppercase" id="exampleModalLabel">
                                          Archiver le prestataire
                                      </h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                  </div>
                                  <form action="{{ url('backend/prestataire/archive', $prestataire->id) }}" method="post"
                                  enctype="multipart/form-data">
                                  @csrf

                                  <div class="modal-body">
                                      <fieldset class="sm">
                                         <u><legend class="text-primary text-uppercase fs-14 fw-bold">Motif de l'archivage : </legend>
                                         </u>
                                          <div class="row g-3 align-items-center px-3 mb-2">
                                              <div class="col-sm-12">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="radio"
                                                          id="motif_A{{ $prestataire->numero.$prestataire->id }}" name="motif_archived"
                                                          value="Je ne suis plus intéresse(é)">
                                                      <label class="form-check-label pointer"
                                                          for="motif_A{{ $prestataire->numero.$prestataire->id }}">
                                                          Je ne suis plus intéresse(é)
                                                      </label>
                                                  </div>
                                              </div>
      
                                              <div class="col-sm-12">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="radio"
                                                          id="motif_B{{ $prestataire->numero.$prestataire->id }}" name="motif_archived"
                                                          value="J'ai déjà recruté un prestataire">
                                                      <label class="form-check-label pointer"
                                                          for="motif_B{{ $prestataire->numero.$prestataire->id }}">
                                                          J'ai déjà recruté un prestataire
                                                      </label>
                                                  </div>
                                              </div>
                                              
                                              <div class="col-sm-12">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="radio"
                                                          id="motif_C{{ $prestataire->numero.$prestataire->id }}" name="motif_archived"
                                                          value="Je serai absent(e) un moment">
                                                      <label class="form-check-label pointer"
                                                          for="motif_C{{ $prestataire->numero.$prestataire->id }}">
                                                          Je serai absent(e) un moment
                                                      </label>
                                                  </div>
                                              </div>
      
                                              <div class="col-sm-12">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="radio"
                                                          id="motif_C{{ $prestataire->numero.$prestataire->id }}" name="motif_archived"
                                                          value="Demande déjà traitée">
                                                      <label class="form-check-label pointer"
                                                          for="motif_C{{ $prestataire->numero.$prestataire->id }}">
                                                          Demande déjà traitée
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
                                      </fieldset>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary"
                                          data-bs-dismiss="modal">Fermer</button>
                                      <button type="submit" class="btn btn-primary"> <i class="fa fas fa-archive"></i>Archiver</button>
                                  </div>
                              </form>
                              </div>
                          </div>
                      </div> 
                  @endforeach
              </section>
          @endif

</div> <!-- container-fluid -->
</div>
    <!-- End Page-content -->
@endsection
@yield('js')