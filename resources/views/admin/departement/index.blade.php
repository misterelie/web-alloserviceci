{{-- @extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Repassages</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Repassage</a></li>
                                <li class="breadcrumb-item active">Repassage</li>
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
                        <strong>Oups!</strong> Oups! Il y a eu des problèmes avec votre entrée..<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
        

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Ajout, Modification & suppression</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addmenageshowModal"><i class="ri-add-line align-bottom me-1"></i> Ajouter</button>
                                           
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle" id="customerTable" style="width:100% !important">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        N°
                                                    </div>
                                                </th>
                                                <th class="sort" data-sort="customer_name">Libelles</th>
                                                <th class="sort" data-sort="location">Enregistrer par</th>
                                                <th class="sort" data-sort="date">Enregistrer le</th>
                                                <th class="sort" data-sort="action">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null($departements))
                                            @foreach($departements as $departement)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                </th>
                                                
                                                <td class="customer_name">{{ $departement->libelle }}</td>
                                                <td class="email">
                                                    @if(!is_null($departement->user_id))
                                                        <span class="p-2 badge badge-soft-secondary text-uppercase fs-8 fw-bolder"> 
                                                            {{ $departement->user->name ?? '' }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="date">{{ $departement->created_at }}</td>
                                                
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#motifmenageshowModal_{{ $departement->id}}">Modifier</button>
                                                        </div>
                                                        <form id="form-{{ $departement->id }}" 
                                                            action="{{ route('delete.departement', $departement->id ) }}" 
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
    
                                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteModal_">Supprimer</button>
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
                                            <p class="text-muted mb-0"></p>
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

            <div class="modal fade" id="addmenageshowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title text-primary text-uppercase" id="exampleModalLabel">
                                Ajouter</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ url('backends/store/departements') }}" class="tablelist-form" autocomplete="off" method="POST" 
                            enctype="multipart/form-data">
                            @csrf 

                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Intitulé du ménage

                                    </label>
                                    <input type="text" id="customername" class="form-control" name="libelle" 
                                    placeholder="Entrez le nom" required/>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Ajouter</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @if(!is_null($departements))
        @foreach($departements as $departement)
            <div class="modal fade" id="motifmenageshowModal_{{ $departement->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title text-primary text-uppercase" id="exampleModalLabel">
                                Modification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ route('departement.update', $departement->id )}}" class="tablelist-form" autocomplete="off" method="POST" 
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
                                    <label for="customername-field" class="form-label">Intitulé du ménage

                                    </label>
                                    <input type="text" id="customername" class="form-control" 
                                    value="{{ $departement->libelle }}" name="libelle" 
                                    placeholder="Entrez le nom"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            @endforeach
            @endif
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
@yield('js') --}}


@extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Departements</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Departements</li>
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
                            <h4 class="card-title mb-0">Ajout , Modification & Suppression</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Ajouter un departements</button>
                                           
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
                                                <th class="sort" data-sort="customer_name">Libelle</th>
                                                <th class="sort" data-sort="email">Modes
                                                </th>
                                                <th class="sort" data-sort="email">Dates d'ajout</th>
                                                <th class="sort" data-sort="action" style="width: 120px !important">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null($departements))
                                            @foreach($departements as $departement)
                                            <tr>
                                                <th scope="row">
                                                    {{ $loop->iteration }} 
                                                </th>
                                                <td class="mode_travail">{{$departement->libelle}}
                                                </td>

                                                <td class="status"><span class="badge badge-soft-secondary text-uppercase"> {{$departement->modedepartement->libelle ?? '' }}</span></td>

                                              
                                                <td class="customer_name">
                                                {{ $departement->created_at}}
                                                </td>

                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_{{ $departement->id}}">Modifier</button>
                                                        </div>
                                                        <form id="form-{{ $departement->id }}" 
                                                            action="{{ route('delete.departement', $departement->id ) }}" 
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
    
                                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteModal_">Supprimer</button>
                                                        </form>
                                                    </div>
                                                </td>
                                                {{-- <td>
                                                    <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_{{ $mode->id}}">Modifier</button>
                                                            </div>
                                                       <form id="form-{{ $departement->id }}" 
                                                        action="{{ route('delete.departement', $departement->id ) }}" 
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')

                                                       <a href=""><button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $mode->id }}">Supprimer</button></a>
                                                       </form>
                                                    </div>
                                                </td> --}}
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
                            <h5 class="modal-title text-primary" id="exampleModalLabel">Enregistrer un département</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        
                        <form action="{{ url('backends/store/departements') }}" class="" autocomplete="off" method="POST"  enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Intitulé
                                    </label>
                                    <input type="text" id="customername" class="form-control" name="libelle" 
                                    placeholder="Entrez le nom" required/>
                                </div>
                                
                               
                                {{-- <div class="mb-3">
                                    <label for="status-field fw-bold" class="form-label fw-bold">Le mode: </label>
                                    <select class="form-control" data-choices data-choices-search-false name="mode_departement_id" id="status-field" >
                                        <option value="">--- Sélectionnez une option --- </option>
                                        @if(!is_null($modedepartements))
                                        @foreach($modedepartements as $modedepartement)
                                            <option value="{{$modedepartement->id}}">{{$modedepartement->libelle}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div> --}}

                                {{-- <div class="mb-3">
                                    <label class="form-label fw-bold"
                                        for="gen-info-description-input">Description</label>
                                    <textarea class="form-control ckeditor-classic" name="description"
                                        placeholder="Entrez une description"
                                        id="gen-info-description-input" rows="2"
                                        required="">
                                    </textarea>
                                </div> --}}

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-dark" id="add-btn">Enregistrer</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
             <!-- end save  ethnie row -->

              <!-- modifier modes-->
              @if(!is_null($departements))
               @foreach($departements as $departement)
               <div class="modal fade" id="editModal_{{ $departement->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title text-uppercase text-primary" id="exampleModalLabel">Modification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ route('departement.update', $departement->id) }}" autocomplete="off" method="POST"  enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="_method" value="put">

                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Intitulé</label>
                                    <input type="text" id="customername-field" 
                                    class="form-control" name="libelle" 
                                    value="{{ $departement->libelle }}"
                                    placeholder="Mettre à jour le nom"/>
                                </div>

                                {{-- <div class="mb-3">
                                    <label for="status-field" class="form-label fw-bold">Mode: </label>
                                    <select class="form-control" data-choices data-choices-search-false name="mode_departement_id" id="status-field" >
                                        <option value="">-- Sélectionnez une option --- </option>
                                       
                                        @if(!is_null($modedepartements))
                                        @foreach($modedepartements as $modedepartement)
                                                <option value="{{ $modedepartement->id }}" 
                                                    @if((int) $departement->mode_departement_id == (int)$modedepartement->id) selected @endif>
                                                    {{ $modedepartement->libelle }}
                                                </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div> --}}

                                {{-- <div class="mb-3">
                                    <label for="customername-field" class="form-label">
                                        Titre
                                    </label>
                                    <input type="text" id="customername-field" 
                                    class="form-control" name="titre" 
                                    value="{{ $departement->titre }}"
                                    placeholder="Mettre à jour le nom"/>
                                </div> --}}

                                {{-- <div class="mb-3">
                                    <label class="form-label fw-bold"
                                        for="gen-info-description-input">Description</label>
                                    <textarea class="form-control" name="description"
                                        placeholder="Entrez une description"
                                        id="gen-info-description-input" rows="2">
                                        {!!$departement->description!!}
                                    </textarea>
                                </div> --}}

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
              <!-- fin modifier -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection

@yield('js')