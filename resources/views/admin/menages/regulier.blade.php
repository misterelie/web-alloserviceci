@extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Ménage régulier</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ménages</a></li>
                                <li class="breadcrumb-item active">Réguliers</li>
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
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addmenageshowModal"><i class="ri-add-line align-bottom me-1"></i> Ajouter un ménage</button>
                                           
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
                                                <th class="sort" data-sort="customer_image">Images</th>
                                                <th class="sort" data-sort="location">Enregistrer par</th>
                                                <th class="sort" data-sort="date">Enregistrer le</th>
                                                <th class="sort" data-sort="action">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null($reguliers))
                                            @foreach($reguliers as $regul)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                </th>
                                                
                                                <td class="customer_name">{{ $regul->libelle}}</td>

                                                <td class="customer_image">
                                                    <img src="../sources/{{ $regul->image_menage}}" alt="" 
                                                    class="img-fluid" width="50px" height="50px">
                                                </td>

                                                <td class="location">
                                                    <span class="p-2 badge badge-soft-success text-uppercase fs-8 fw-bolder"> 
                                                        {{ $regul->user->name ?? '' }}
                                                    </span>
                                                </td>
                                                <td class="date">{{ $regul->created_at}}</td>
                                                
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#motifmenageshowModal_{{ $regul->id }}">Modifier</button>
                                                        </div>
                                                        <form id="form-{{ $regul->id }}" 
                                                            action="{{ url('delete/menage/regulier', $regul->id )}}" 
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
                                Ajout de ménage régulier</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ url('store/menage/regulier') }}" class="tablelist-form" autocomplete="off" method="POST" 
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

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Image</label>
                                    <input type="file" id="customername" class="form-control" name="image_menage" 
                                    placeholder="Entrez le nom" required/>
                                </div> <br>

                                <div class="mb-3">
                                    <label class="form-label"
                                        for="gen-info-description-input">Détails</label>
                                    <textarea class="form-control ckeditor-classic"
                                        name="details"
                                        placeholder="Entrez une description" id="gen-info-description-input" rows="2">
                                     </textarea>
                                     
                                </div>

                                {{-- <div class="mb-3">
                                    <label for="validationTextarea" class="form-label">Détails</label>
                                    <textarea class="form-control ckeditor-classic" name="details" id="validationTextarea" placeholder="Donnez plus détails !">
                                    </textarea>
                                </div> --}}
                                
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

            @if(!is_null($reguliers))
            @foreach($reguliers as $regul)
            <div class="modal fade" id="motifmenageshowModal_{{ $regul->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title text-primary text-uppercase" id="exampleModalLabel">
                                Modification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{ route('update.menagesregulier', $regul->id )}}" class="tablelist-form" autocomplete="off" method="POST" 
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
                                    value="{{ $regul->libelle }}" name="libelle" 
                                    placeholder="Entrez le nom"/>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Image</label>
                                    <input type="file" id="customername" class="form-control" name="image_menage" 
                                    placeholder="Entrez le nom"/>
                                </div> <br>

                                <div class="mb-3">
                                    <label for="validationTextarea" class="form-label">Détails</label>
                                    <textarea class="form-control snow-editor" name="details" id="validationTextarea" placeholder="Donnez plus détails !">
                                        {!! $regul->details !!}
                                    </textarea>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Modifier</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif


            


             {{-- @if(!is_null($assistances))
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
            @endif  --}}

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection