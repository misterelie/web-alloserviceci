@extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">toutes nos prestations</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Prestations</li>
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
                            <h4 class="card-title mb-0">Ajout , Modification & Suppression d'une prestation</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Ajouter une prestation</button>
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
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>N°</th>
                                                <th class="sort text-uppercase" data-sort="customer_name">Images</th>
                                                <th class="sort text-uppercase" data-sort="email">prestations</th>
                                                <th class="sort text-uppercase" data-sort="mode">départements</th>
                                                <th class="sort text-uppercase" data-sort="mode">Modes</th>
                                                <th class="sort" data-sort="email">ENREGISTRÉ PAR</th>
                                                <th class="sort text-uppercase" data-sort="date">ENREGISTRÉ LE</th>
                                                <th class="sort" data-sort="action" style="width: 120px !important">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null($prestations))
                                            @foreach($prestations as $prestation)
                                            <tr>
                                                <th scope="row">
                                                    {{ $loop->iteration }}
                                                </th>
                                               
                                                <td class="customer_name">
                                                    <img src="../uploadsprestation/{{ $prestation->image_prestation}}" alt="" 
                                                    class="img-fluid" width="40px" height="40px">
                                                </td>

                                                <td class="email fw-bold">{{ $prestation->libelle }}</td>

                                                <td class="email">
                                                   
                                                        <span class="p-2 badge badge-soft-success text-uppercase fs-8 fw-bolder"> 
                                                            {{ $prestation->departement->libelle ?? '' }}
                                                        </span>
                                                 </td>

                                                 <td class="mode">
                                                   
                                                    <span class="p-2 badge badge-soft-danger text-uppercase fs-8 fw-bolder"> 
                                                        {{ $prestation->mode->mode ?? ''  }}
                                                    </span>
                                                 </td>

                                                <td class="email">
                                                    @if(!is_null($prestation->user_id))
                                                        <span class="p-2 badge badge-soft-secondary text-uppercase fs-8 fw-bolder"> 
                                                            {{ $prestation->user->name ?? '' }}
                                                        </span>
                                                    @endif
                                                </td>

                                                <td class="email">{{ $prestation->created_at }}</td>
                                    
                                                {{-- <td class="status"><span class="badge badge-soft-success text-uppercase"></span></td> --}}
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_{{ $prestation->id }}">Modifier</button>
                                                        </div>

                                                        <div class="remove">
                                                        </div>
                                                       <form id="form-{{ $prestation->id }}" 
                                                        action="{{ route('delete.prestation', $prestation->id) }}" 
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $prestation->id }}">Supprimer</button>
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

            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title text-primary text-uppercase" id="exampleModalLabel">Ajouter une prestation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ route('save.prestation')}}" class="" autocomplete="off" method="POST"  
                           enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label fw-bold">Nom</label>
                                    <input type="text" id="customername-field" 
                                        class="form-control @error('libelle') is-invalid @enderror" name="libelle"
                                        placeholder="Entrez le nom de la prestation"/>
                                    @error('libelle')
                                        <div class="alert alert-danger">Veuillez saisir le nom de la prestation</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email-field" class="form-label fw-bold">Ajouter une image</label>
                                    <input type="file" id="image_prestation" name="image_prestation" 
                                    class="form-control  @error('image_prestation') is-invalid @enderror" 
                                    placeholder="Ajouter une image pour la prestation" />
                                    @error('image_prestation')
                                        <div class="alert alert-danger">Ajouter une image pour la prestation.</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Ajouter la prestation</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

              <!-- modifier prestation-->
              @if(!is_null($prestations))
               @foreach($prestations as $prestation)
               <div class="modal fade" id="editModal_{{ $prestation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title text-primary text-center" id="exampleModalLabel">Modification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ route('prestation.upate', $prestation->id )}}" 
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
                                    <label for="status-field" class="form-label fw-bold">Le département: </label>
                                    <select class="form-control" data-choices data-choices-search-false name="departement_id" id="status-field" >
                                        <option value="">-- Sélectionnez une option --- </option>
                                        @if(!is_null($departements))
                                            @foreach($departements as $departement)
                                                <option value="{{ $departement->id }}" 
                                                    @if((int) $prestation->departement_id == (int)$departement->id) selected @endif>
                                                            {{ $departement->libelle }}
                                                </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="status-field fw-bold" class="form-label fw-bold">Le mode: </label>
                                    <select class="form-control" data-choices data-choices-search-false name="mode_id" id="status-field" >
                                        <option value="">-- Sélectionnez une option --- </option>
                                        @if(!is_null($modes))
                                        @foreach($modes as $mode)
                                        <option value="{{ $mode->id }}" 
                                            @if((int) $prestation->mode_id == (int)$mode->id) selected @endif>
                                                    {{ $mode->mode }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label fw-bold">Nom</label>
                                    <input type="text" id="customername-field" 
                                    class="form-control" name="libelle" 
                                    value="{{ $prestation->libelle }}"
                                    placeholder="Entrez le nom de la prestation"/>
                                    <div class="invalid-feedback">Veuillez saisir le nom de la prestation.</div>
                                </div><br>

                                <div class="mb-3">
                                    <label for="email-field" class="form-label fw-bold">Mettre à jour</label>
                                    <input  type="file" id="image_prestation" name="image_prestation" class="form-control" 
                                    placeholder="Ajouter une image pour la prestation"/> <br>
                                    <img src="/uploadsprestation/{{ $prestation->image_prestation}}" alt="" 
                                    class="img-fluid justify-center text-center" width="70px" height="70px">
                                    <div class="invalid-feedback">Ajouter une image</div>
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
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection

@yield('js')