
@extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">La liste des demandes de devis</h4>

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
                                                <th>N°</th>
                                                <th class="sort" data-sort="customer_name">Noms</th>
                                                <th class="sort" data-sort="customer_name">Prénoms</th>
                                                <th class="sort" data-sort="customer_name">Téléphones</th>
                                                <th class="sort" data-sort="customer_presta">Emails</th>
                                                <th class="sort" data-sort="customer_ethnie">Type prestations</th>
                                                <th class="sort" data-sort="customer_ethnie">Modes</th>
                                                <th class="sort" data-sort="action" 
                                                style="max-width: 260px !important">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null($devis))
                                            @foreach($devis as $devi)
                                            <tr>
                                                <th scope="row">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="customer_name">{{ $devi->nom }}</td>
                                                <td class="customer_prenoms">{{ $devi->prenoms }}</td>
                                                <td class="phone">+225 {{ $devi->telephone }}</td>
                                                <td class="email">{{ $devi->email }}</td>

                                                <td class="date">
                                                    <span class="p-2 badge badge-soft-success text-uppercase fs-8 fw-bolder">
                                                        {{ $devi->prestation->libelle  }}
                                                    </span>
                                                </td>

                                                <td class="date">
                                                    <span class="p-2 badge badge-soft-danger text-uppercase fs-8 fw-bolder">
                                                        {{ $devi->mode->mode  }}
                                                    </span>
                                                </td>
                                               
                                              
                                                {{-- <td class="status">
                                                   <span class="p-2 badge badge-soft-{{ $demandeprestation->etat == '1' ? 'success' : 'danger' }}"> {{ $demandeprestation->etat == '1' ? 'acceptée' : 'refusée' }}</span>     
                                                </td> --}}
                                                <td>
                                                    <div class="d-flex gap-2">
                                                         <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_{{ $devi->id }}">Modifier</button>
                                                        </div> 
                                                    
                                                        {{-- <div class="detail">
                                                            <button class="btn btn-sm btn-secondary edit-item-btn" data-bs-toggle="modal" data-bs-target="#accepterlModal_">Statuts</button>
                                                        </div> --}}
                                                
                                                        <div class="detail">
                                                        <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="#detailModal_{{ $devi->id }}">Détails Devis</button>
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

             <!-- statu de la demande-->
            {{-- @if(!is_null($demandeprestations))
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
            @endif  --}}

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
                                                <select class="form-select mb-3" name="prestation_id" id="prestation_id" aria-label="Default select example">
        
                                                    @if(!is_null($prestations))
                                                        @foreach($prestations as $prestation)
                                                        <option value="{{ $prestation->id }}" 
                                                            @if((int) $devi->prestation_id == (int)$prestation->id) selected @endif>
                                                            {{ $prestation->libelle }}
                                                        </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label fw-bolder">Mode de prestation :</label>
                                                <select class="form-select mb-3" name="mode_id" id="mode_id" aria-label="Default select example">
                                                    @if(!is_null($modes))
                                                        @foreach($modes as $mode)
                                                        <option value="{{ $mode->id }}" 
                                                            @if((int) $devi->mode_id == (int)$mode->id) selected @endif>
                                                            {{ $mode->mode }}
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







            @if(!is_null($devis))
            @foreach($devis as $devi)
          <!-- Modal detail-->
              <div class="modal fade zoomIn" id="detailModal_{{ $devi->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" 
                              aria-label="Close" id="btn-close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="">
                                <h5 class="text-center text-primary" style="font-weight: bold"> VOIR TOUTES LES INFORMATIONS SUR LE DEVIS</h5>
                                  <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                      <p> <span class="fw-bolder"> Nom :</span> {{ $devi->nom }}</p>
                                      <p><span class="fw-bolder"> Prénoms :</span> {{ $devi->prenoms }}</p>
                                      <p><span class="fw-bolder"> Téléphone :</span> {{ $devi->telephone }}</p>
                                      <p> <span class="fw-bolder"> Email :</span> {{ $devi->email }}</p>
                                      <p> <span class="fw-bolder"> Ville :</span> {{ $devi->ville->libelle }}</p>
                                      <p><span class="fw-bolder">Mode travail :</span> <span class="fw-bolder text-primary">{{  $devi->mode->mode ?? '' }}</span></p>
                                      <p><span class="fw-bolder">Prestation :</span> <span class="fw-bolder text-primary">{{  $devi->prestation->libelle ?? ''}}</span></p>
                                      <p><span class="fw-bolder">Date d'exécution :</span> {{  $devi->date_execution }}</p>
                                      <p><span class="fw-bolder">Heure d'exécution :</span> {{  $devi->heure_execution }}</p>
                                      <p><span class="fw-bolder">Plus d'information: </span> <br><br> {{  $devi->description_devis }}</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          <!--end modal -->
          @endforeach
          @endif 
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
