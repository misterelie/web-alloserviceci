@extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Département Mode</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Modes</li>
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
                            <h4 class="card-title mb-0">Ajout , Modification & Suppression d'un mode</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Ajouter un mode</button>
                                           
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
                                                <th class="sort" data-sort="numero">N°</th>
                                                <th class="sort" data-sort="customer_name">Titre</th>
                                                <th class="sort" data-sort="email">Départements</th>

                                                <th class="sort" data-sort="email">Modes</th>
                                                <th class="sort" data-sort="action" style="width: 120px !important">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null($departmodes))
                                            @foreach($departmodes as $departmode)
                                            <tr>
                                                <th scope="row">
                                                    {{ $loop->iteration }} 
                                                </th>
                                                <td class="mode_travail">{{$departmode->titre}}</td>
                                                <td class="customer_name">      {{$departmode->departement->libelle }}
                                                </td>

                                                 <td class="customer_name">      {{$departmode->modedepartement->libelle }}
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_">Modifier</button>
                                                            </div>

                                                    {{-- <button class="btn btn-sm btn-danger edit-item-btn">
                                                        <a class="text-white" href="#" onclick="if(confirm('Attention ! Vous êtes sur le point de supprimer cet élément ?  Appuyez sur OK pour confirmer.')){document.getElementById('form-{{$modedepartement->id}}').submit() }">Supprimer</a>
                                                    </button> --}}
                                                    {{-- <form id="form-{{$modedepartement->id}}" 
                                                            action="{{ url('/mode/departement/delete', $modedepartement->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="delete">
                                                    </form> --}}
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

             <!-- save  modes row -->
            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title text-primary" id="exampleModalLabel">Enregistrer le mode de prestation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ url('backend/departement/mode') }}" class="" autocomplete="off" method="POST"  enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly/>
                                </div>

                                 <div class="mb-3">
                                    <label for="status-field" class="form-label fw-bold"> Départements: </label>
                                    <select class="form-control" data-choices data-choices-search-false name="departement_id" id="status-field" >
                                        <option value="">-- Sélectionnez un département -- </option>
                                        @if(!is_null($departements))
                                        @foreach($departements as $departement)
                                            <option value="{{$departement->id}}">{{$departement->libelle}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div> 

                                 <div class="mb-3">
                                    <label for="status-field" class="form-label fw-bold"> Modes: </label>
                                    <select class="form-control" data-choices data-choices-search-false name="mode_departement_id" id="status-field" >
                                        <option value="">
                                        -- Sélectionnez un mode -- 
                                        </option>
                                         @if(!is_null($modedepartements))
                                         @foreach($modedepartements as $modedepartement)
                                            <option value="{{$modedepartement->id}}">{{$modedepartement->libelle}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                
                                <div class="mb-3">
                                    <label for="customername-field" class="form-label fw-bold">Titre</label>
                                    <input type="text" id="customername-field" 
                                        class="form-control" name="titre"
                                        placeholder="Entrez le nom"/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label fw-bold">Photos</label>
                                    <input type="file" id="customername-field" 
                                        class="form-control" name="image_prestation"
                                        placeholder="Entrez le nom"/>
                                </div><br>

                                <div class="mb-3">
                                    <label class="form-label fw-bold"
                                        for="gen-info-description-input">Description</label>
                                    <textarea class="form-control ckeditor-classic" name="description"
                                        placeholder="Entrez une description"
                                        id="gen-info-description-input" rows="2"
                                        required="">
                                    </textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Ajouter</button>
                                    {{-- <button type="submit" class="btn btn-success" id="edit-btn">Update</button> --> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
             <!-- end save  ethnie row -->

              <!-- modifier modes-->
              {{-- @if(!is_null($modedepartements))
               @foreach($modedepartements as $modedepartement)
               <div class="modal fade" id="editModal_{{ $modedepartement->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title text-uppercase text-primary" id="exampleModalLabel">Modifier</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ url('update/mode/departement', $modedepartement->id) }}" autocomplete="off" method="POST"  enctype="multipart/form-data">
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
                                    value="{{ $modedepartement->libelle }}"
                                    placeholder="Mettre à jour le nom"/>
                                   
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
            @endif --}}
              <!-- fin modifier -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection

@yield('js')