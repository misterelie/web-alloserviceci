@extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Nos différents contacts</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Assistances</li>
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
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Ajouter</button>
                                           
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
                                                        <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>
                                                <th class="sort" data-sort="customer_name">Téléphone 1</th>
                                                <th class="sort" data-sort="tel_2">Téléphone 2</th>
                                                <th class="sort" data-sort="tel_3">Téléphone 3</th>
                                                <th class="sort" data-sort="what">Whatsapp</th>
                                                <th class="sort" data-sort="email">Adresse email</th>
                                                <th class="sort" data-sort="action">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null($assistances))
                                            @foreach($assistances as $assistance)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </th>
                                                
                                                <td class="customer_name">{{$assistance->telephone1}}</td>
                                                <td class="tel_2">{{$assistance->telephone2}}</td>
                                                <td class="tel_3">{{$assistance->telephone3}}</td>
                                                <td class="what">{{$assistance->whatsapp}}</td>
                                                <td class="email">{{$assistance->email}}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_{{ $assistance->id }}">Modifier</button>
                                                        </div>
                                                        <form id="form-{{ $assistance->id }}" 
                                                            action="{{ route('delete.assistance', $assistance->id )}}" 
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
    
                                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $assistance->id }}">Supprimer</button>
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

            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ route('save.assistance') }}" class="tablelist-form" autocomplete="off" method="POST" 
                            enctype="multipart/form-data">
                            @csrf 

                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Téléphone 1</label>
                                    <input type="tel"  id="phone1" id="customername-field" class="form-control" name="telephone1" 
                                    placeholder="Entrez le numéro " required/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">telephone2</label>
                                    <input type="tel" id="phone2" id="customername-field" class="form-control" name="telephone2" 
                                    placeholder="Entrez le nom" required/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">telephone3</label>
                                    <input type="tel" id="telephone3" id="customername-field" class="form-control" name="telephone3" 
                                    placeholder="Entrez le nom"/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field"  class="form-label">Whatsapp</label>
                                    <input type="tel" id="customername-field"  id="whatsapp" class="form-control" name="whatsapp" 
                                    placeholder="Entrez le numéro whatsapp"/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Adresse email</label>
                                    <input type="email" id="customername" class="form-control" name="email" 
                                    placeholder="Entrez l'email" required/>
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


              <!-- section modifier-->
             @if(!is_null($assistances))
             @foreach($assistances as $assistance)
            <div class="modal fade" id="editModal_{{ $assistance->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: red">Mettre à jour</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ route('update.assistance', $assistance->id )}}" class="tablelist-form" autocomplete="off" method="POST" 
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
                                    <label for="customername-field" class="form-label">Téléphone 1</label>
                                    <input type="tel" id="customername-field" value="{{ $assistance->telephone1 }}" class="form-control" name="telephone1" 
                                    placeholder="Entrez le numéro"/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">telephone2</label>
                                    <input type="tel" id="customername-field" value="{{ $assistance->telephone2 }}"  class="form-control" name="telephone2" 
                                    placeholder="Entrez le nom"/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">telephone3</label>
                                    <input type="tel" id="phone" id="customername-field" 
                                    value="{{ $assistance->telephone3 }}"  class="form-control" name="telephone3" 
                                    placeholder="Entrez le nom"/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Whatsapp</label>
                                    <input type="tel"  id="phone" id="customername-field" value="{{ $assistance->whatsapp }}"  class="form-control" name="whatsapp" 
                                    placeholder="Entrez le numéro whatsapp"/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Adresse email</label>
                                    <input type="email" id="customername-field"
                                     value="{{ $assistance->email }}" class="form-control" name="email" 
                                    placeholder="Entrez l'email"/>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Mettre à jour</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
             <!-- end modifier -->
             @endforeach
             @endif


             @if(!is_null($assistances))
             @foreach($assistances as $assistance)
            <!-- Modal suppression-->
            <div class="modal fade zoomIn" id="deleteModal_{{ $assistance->id }}" tabindex="-1" aria-hidden="true">
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
                                    <p class="text-muted mx-4 mb-0">Êtes-vous sûr de vouloir supprimer cet enregistrement ?</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn w-sm btn-danger" id="delete-record">Oui, supprimez-le!</button>
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