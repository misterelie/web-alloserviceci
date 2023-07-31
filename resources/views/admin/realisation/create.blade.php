@extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Réalisations</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Gérer les</a></li>
                                <li class="breadcrumb-item active">Réalisations</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            
           
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
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addmenageshowModal"><i class="ri-add-line align-bottom me-1"></i> Ajouter une réalisation</button>
                                           
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
                                                <th class="sort text-uppercase" data-sort="customer_name">Réalisation</th>
                                                <th class="sort text-uppercase" data-sort="location">Images</th>
                                                <th class="sort text-uppercase" data-sort="date">Enregistrer par</th>
                                                <th class="sort text-uppercase" data-sort="date">Enregistrer le</th>
                                                <th class="sort text-uppercase" data-sort="action">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if (!is_null($realisations))
                                            @foreach ($realisations as $real)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                </th>

                                                <td class="customer_name">{{$real->realisation}}</td>
                                            <td class="customer_name"><img src="{{ asset('UploadRealisations/'.$real->photo) }}" alt="" width="50" height="50"> </td>

                                                <td class="email">
                                                    @if(!is_null($real->user_id))
                                                        <span class="p-2 badge badge-soft-secondary text-uppercase fs-8 fw-bolder"> 
                                                            {{ $real->user->name ?? '' }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="date">{{ $real->created_at }} </td>
                                            
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_{{ $real->id }}">Modifier</button>
                                                        </div>
                                                        <form id="form-{{ $real->id }}" 
                                                            action="{{ url("realisation/destroy",$real->id ) }}" 
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="btn btn-sm btn-danger remove-item-btn" type="submit"
                                                            title="Remove"  onclick="return confirm('Êtes-vous sûrs de vouloir supprimer cette information ?')">Supprimer
                                                            </button>
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
                                Enregistrer une réalisation:</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ url("realisation/store") }}" class="tablelist-form" autocomplete="off" method="POST" 
                            enctype="multipart/form-data">
                            @csrf 

                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label fw-bold font-weight-bold">Libellé de la réalisation <span class="text-danger">*</span> :</label>
                                    <input type="text" id="customername" class="form-control" name="realisation" required/>
                                </div>

                                <div class="mb-3">
                                    <label for="photo" class="form-label fw-bold font-weight-bold ">Image de la réalisation: <span class="text-danger">*</span> </label>
                                    <input type="file" name="photo" id="photo" class="form-control" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary" id="add-btn">Valider</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            {{-- Modification --}}
            @if (!is_null($realisations))
            @foreach ($realisations as $real)
             <div class="modal fade" id="editModal_{{ $real->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title text-primary text-uppercase" id="exampleModalLabel">
                                Edition</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                       
                        <form action="{{ url("realisation/update", $real->id ) }}" class="tablelist-form" autocomplete="off" method="POST" 
                            enctype="multipart/form-data">
                            @csrf 

                            @method('PUT')
                            <input type="hidden" name="_method" value="put">

                            <div class="modal-body">
                                <h5 class="modal-heading mt-2 mb-4 fw-bold text-primary">Modifier la réalisation:</h5>
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="realisation" class="form-label fw-bold font-weight-bold ">Libellé de la réalisation: <small style="color: red">(Facultatif)</small> </label>
                                    <input type="text" name="realisation" id="realisation" class="form-control" value="{{ $real->realisation }} " >
                                </div>

                                <div class="mb-3">
                                    <label for="photo" class="form-label fw-bold font-weight-bold ">Image de la réalisation: <small style="color: red">(Facultatif)</small> </label>
                                    <input type="file" name="photo" id="photo" class="form-control">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-warning" id="add-btn">Valider</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
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