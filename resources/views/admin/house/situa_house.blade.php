@extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Situation Matri</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Situation Matri</li>
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
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        N°
                                                    </div>
                                                </th>
                                                <th class="sort" data-sort="customer_name">Situation</th>
                                                <th class="sort" data-sort="email">
                                                    Date.enregistr
                                                </th>

                                                <th class="sort" data-sort="email">
                                                    enregistr.par
                                                </th>
                                                
                                                <th class="sort" data-sort="action">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null($situa_houses))
                                            @foreach($situa_houses as $situa_house)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                </th>
                                                
                                           <td class="customer_name fw-bold fs-16">
                                            {{ $situa_house->libelle }}
                                            </td>
                                            <td class="date">{{ date('d.m.Y H:i:s', strtotime($situa_house->created_at ))}}

                                            <td class="customer_name">
                                                {{ $situa_house->user->name  }}
                                            </td>
                                            </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_{{ $situa_house->id}}">Editer</button>
                                                        </div>
                                                        <button class="btn btn-sm btn-warning edit-item-btn">
                                                            <a class="text-white" href="#" onclick="if(confirm('Attention ! Vous êtes sur le point de supprimer cet élément ?  Appuyez sur OK pour confirmer.')){document.getElementById('form-{{$situa_house->id}}').submit() }">Supprimer</a>
                                                        </button>
                                                        <form id="form-{{$situa_house->id}}" 
                                                                action="{{ route('delete.situa_house', $situa_house->id) }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="delete">
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
                            <h5 class="modal-title text-primary" id="exampleModalLabel">Enrégistrer une maison</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ route('save')}}" class="tablelist-form" autocomplete="off" method="POST" 
                            enctype="multipart/form-data">
                            @csrf 

                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Libelle</label>
                                    <input type="text" id="customername-field" class="form-control" name="libelle" 
                                    placeholder="Entrez le libelle" required/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Enrégistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


              <!-- section modifier-->
             @if(!is_null($situa_houses))
             @foreach($situa_houses as $situa_house)
            <div class="modal fade" id="editModal_{{ $situa_house->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: red">MODIFICATION</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ route('update.situahouse',$situa_house->id)}}" class="tablelist-form" autocomplete="off" method="POST" 
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
                                    <label for="customername-field" class="form-label">Libelle</label>
                                    <input type="text" id="customername-field" 
                                    class="form-control" value="{{ $situa_house->libelle }}" name="libelle" placeholder="Entrez le nom">
                                </div>
                               
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Enrégistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
             <!-- end modifier -->
             @endforeach
             @endif 

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection