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
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i></i>Les prestataires</button>
                                            {{-- <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button> --}}
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
                                    <table class="table align-middle table-nowrap" id="customerTable"  style="width:120% !important">
                                        <thead class="table-light">
                                            <tr>
                                                <th>N°</th>
                                                <th class="sort" data-sort="photo">Photos</th>
                                                <th class="sort" data-sort="customer_name">Noms</th>
                                                <th class="sort" data-sort="email">Prénoms</th>
                                                <th class="sort" data-sort="date_naissance">Dates naissance</th>
                                                <th class="sort" data-sort="situation_matri">Situation Matrimoniale</th>
                                                <th class="sort" data-sort="nbre_enfant">Nombre enfants</th>
                                                <th class="sort" data-sort="telephone">Téléphone 1  </th>
                                                <th class="sort" data-sort="modes">Modes de travail</th>
                                                <th class="sort" data-sort="action">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null( $prestataires ))
                                            @foreach( $prestataires as $prestataire )
                                            <tr>
                                                <th scope="row">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="photo"><img src="/PrestatairePhoto/{{ $prestataire->photo }}"
                                                    class="img-fluid rounded-circle" width="50px" height="50">
                                                </td>
                                                <td class="customer_name">{{ $prestataire->nom }}</td>
                                                <td class="email">{{ $prestataire->prenoms }}</td>
                                                <td class="date_naissance">{{ $prestataire->date_naiss }}</td>
                                                <td class="situation_matri">{{ $prestataire->situation_matri }}</td>
                                                <td class="nbre_enfant">{{ $prestataire->nbre_enfant }}</td>
                                                <td class="telephone1">{{ $prestataire->telephone1 }}</td>
                                                <td class="telephone2">{{ $prestataire->mode->mode }}</td>
                                              
                                                
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_">Modifier</button>
                                                        </div>

                                                        <div class="detail">
                                                            <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="#detailModal_{{ $prestataire->id }}">Détail</button>
                                                        </div>
                                                       <form id="" 
                                                        action="" 
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteModal_">Delete</button>
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

              <!-- modifier prestation-->
              {{-- @if(!is_null($prestations))
               @foreach($prestations as $prestation) --}}
               <div class="modal fade" id="editModal_" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="" 
                            class="" autocomplete="off" method="POST"  enctype="multipart/form-data">
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
                                    class="form-control" name="libelle" 
                                    value=""
                                    placeholder="Entrez le nom de la prestation"/>
                                    <div class="invalid-feedback">Veuillez saisir le nom de la prestation.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="email-field" class="form-label">Mettre à jour</label>
                                    <input  type="file" id="image_prestation" name="image_prestation" class="form-control" 
                                    placeholder="Ajouter une image pour la prestation"/> <br>
                                    <img src="../uploadsprestation/" alt="" 
                                    class="img-fluid justify-center text-center" width="70px" height="70px">
                                    <div class="invalid-feedback">Ajouter une image pour la prestation.</div>
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
               {{-- @endforeach
              @endif --}}
              <!-- fin modifier -->


            <!-- Modal suppression prestation-->
            {{-- @if(!is_null($prestations))
            @foreach($prestations as $prestation) --}}
                <div class="modal fade zoomIn" id="deleteModal_" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mt-2 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                        <h4>Êtes-vous sûr ?</h4>
                                        <p class="text-muted mx-4 mb-0">Êtes-vous sûr de vouloir supprimer cet enregistrement ? </p>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn w-sm btn-danger" id="delete-record">Oui, supprimez-le !</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- @endforeach
            @endif --}}
            <!--end modal -->


            @if(!is_null( $prestataires ))
            @foreach( $prestataires as $prestataire )
          <!-- Modal detail-->
              <div class="modal fade zoomIn" id="detailModal_{{ $prestataire->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" 
                              aria-label="Close" id="btn-close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="">
                                <h5 class="text-center" style="font-weight: bold"> VOIR TOUTES LES INFORMATIONS DU PRESTATAIRE</h5>
                                  <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                      <p class="">Nom: {{ $prestataire->nom }}</p>
                                      <p class="">Prénoms: {{ $prestataire->prenoms }}</p>
                                      <p>Téléphone1: {{ $prestataire->telephone1 }}</p>
                                      <p>Email: {{ $prestataire->email }}</p>
                                      <p>Mode travail: {{  $prestataire->mode->mode }}</p>
                                      <p>Civilité: {{  $prestataire->civilite }}</p>
                                      <p>Date naissance: {{  $prestataire->date_naiss }}</p>
                                      <p>Situation matrimoniale: {{  $prestataire->situation_matri }}</p>
                                      <p>Téléphone1: {{  $prestataire->telephone1 }}</p>
                                      <p>Téléphone2: {{  $prestataire->telephone2 }}</p>
                                      <p>whatsapp: {{  $prestataire->whatsapp }}</p>
                                      <p>Ethnie: {{  $prestataire->ethnie->ethnie }}</p>
                                      <p>Commune: {{  $prestataire->commune->commune }}</p>
                                      <p>Quartier: {{  $prestataire->quartier }}</p>
                                      <p>Domaine: {{  $prestataire->prestation->libelle ?? '' }}</p>
                                      <p>Année expérience: {{ $prestataire->annee_experience }} ans</p>
                                      <p>Salaire: {{  $prestataire->pretention_salairiale }}</p>
                                      <p>Zone: {{ $prestataire->commune->commune }}</p>
                                      <p>Cas urgence: {{  $prestataire->contact_urgence }}</p>
                                      <p>Référence: {{  $prestataire->reference }}</p>
                                      <p>Contact: {{  $prestataire->contact_reference }}</p>
                                      <p>Alphabétisation: {{ $prestataire->alphabet->alphabet }}</p>
                                      <p>Diplome: {{  $prestataire->diplome->diplome }}</p>
                                      <p>Disponibilité: {{  $prestataire->dispo->dispo }}</p>
                                      <p>Pièce: {{  $prestataire->piece->piece }}</p>
                                      <p>Numéro pièce: {{  $prestataire->numero_piece }}</p>
                                      <p>Canal: {{  $prestataire->canal->canal }}</p>
                                      <p>Catalogue: {{  $prestataire->catalogue_realisa }}</p>
                                      <p>Avis: <br> {{  $prestataire->avis }}</p>
                                      
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