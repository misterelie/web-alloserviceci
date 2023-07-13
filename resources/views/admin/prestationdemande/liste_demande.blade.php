@extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">La liste de toutes les demandes de prestations</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Demande</li>
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
                            <h4 class="card-title mb-0">Modification & Suppression d'une demande</h4>
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
                                                <th class="sort" data-sort="customer_prestataire">Ethnies</th>
                                                <th class="sort" data-sort="customer_presta">Prestations</th>
                                                <th class="sort" data-sort="customer_salaire">Salaires</th>
                                                <th class="sort" data-sort="customer_ethnie">Modes travail</th>
                                                <th class="sort" data-sort="customer_ethnie">Statuts</th>
                                                <th class="sort" data-sort="action" 
                                                style="max-width: 260px !important">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null($demandeprestations))
                                            @foreach($demandeprestations as $demandeprestation)
                                            <tr>
                                                <th scope="row">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="customer_name">{{ $demandeprestation->nom }}</td>
                                                <td class="customer_prenoms">{{ $demandeprestation->prenoms }}</td>
                                                <td class="phone">{{ $demandeprestation->telephone }}</td>
                                                <td class="date">{{ $demandeprestation->ethnie->ethnie ?? '' }}</td>
                                                <td class="date">{{ $demandeprestation->prestation->libelle ?? '' }}
                                                </td>

                                                <td class="date">{{ $demandeprestation->salaire_propose }} FCFA</td>
                                                <td class="date">{{ $demandeprestation->mode->mode ?? '' }}</td>
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

             <!-- statu de la demande-->
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
            @foreach($demandeprestations as $demandeprestation)
          <!-- Modal detail-->
              <div class="modal fade zoomIn" id="detailModal_{{ $demandeprestation->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" 
                              aria-label="Close" id="btn-close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="">
                                <h5 class="text-center" style="font-weight: bold"> VOIR TOUTES LES INFORMATIONS DU DEMANDEUR</h5>
                                  <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                      <p class="">Nom: {{ $demandeprestation->nom }}</p>
                                      <p class="">Prénoms: {{ $demandeprestation->prenoms }}</p>
                                      <p>Téléphone: {{ $demandeprestation->telephone }}</p>
                                      <p>Email: {{ $demandeprestation->email }}</p>
                                      <p>Mode travail: {{  $demandeprestation->mode->mode ?? '' }}</p>
                                      <p>Prestation: {{  $demandeprestation->prestation->libelle ?? ''}}</p>
                                      <p>salaire: {{  $demandeprestation->salaire_propose}}</p>
                                      <p>Age: {{ $demandeprestation->age_demande }} ans</p>
                                      <p>Ethnie: {{  $demandeprestation->ethnie->ethnie ?? ''}}</p>
                                      <p>Date de demande: {{  $demandeprestation->date_demande }}</p>
                                      <p>Heure de la demande: {{  $demandeprestation->heure_demande }}</p>
                                      <p>Observation: <br> {{  $demandeprestation->observation }}</p>
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

@yield('js')