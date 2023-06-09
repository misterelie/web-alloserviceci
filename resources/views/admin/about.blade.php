@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Présentation</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">A propos de nous</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">

                @if($message = Session::get('success'))
                    <div class="alert alert-success text-center">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger text-center">
                        <strong>Oups !</strong> Oups ! Il y a eu des problèmes avec votre entrée..<br><br>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                        id="create-btn" data-bs-target="#showModal"><i
                                            class="ri-add-line align-bottom me-1"></i> Ajouter une description</button>

                                </div>
                            </div>
                            <div class="card-body">
                                <table id="model-datatables" class="table table-bordered table-striped align-middle"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!is_null($abouts))
                                            @foreach($abouts as $about)
                                                <tr>
                                                    <td> {{ $loop->iteration }}</td>
                                                    <td>{{ $about->titre }}</td>
                                                    <td>{!!$about->description!!}</td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <button class="btn btn-sm btn-success edit-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editModal_{{ $about->id }}">Modifier</button>
                                                            </div>

                                                            <form id="form-{{ $about->id }}" 
                                                                action="{{ route('delete.about', $about->id) }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button class="btn btn-sm btn-danger remove-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal_{{ $about->id }}">Supprimer</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>

                                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <form action="{{ route('save.about') }}"
                                                class="tablelist-form" autocomplete="off" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="modal-body">
                                                    <div class="mb-3" id="modal-id" style="display: none;">
                                                        <label for="id-field" class="form-label">ID</label>
                                                        <input type="text" id="id-field" class="form-control"
                                                            placeholder="ID" readonly />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="customername-field" class="form-label">Titre</label>
                                                        <input type="text" id="customername-field" class="form-control"
                                                            name="titre" placeholder="Entrez un titre" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="gen-info-description-input">Description</label>
                                                        <textarea class="form-control" name="description"
                                                            placeholder="Entrez une description"
                                                            id="gen-info-description-input" rows="2"
                                                            required=""></textarea>
                                                        <div class="invalid-feedback">Please enter a description</div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Fermer</button>
                                                        <button type="submit" class="btn btn-success"
                                                            id="add-btn">Ajouter</button>
                                                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- section modifier-->
                @if(!is_null($abouts))
                    @foreach($abouts as $about)
                        <div class="modal fade" id="editModal_{{ $about->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel" style="color: red">Mettre à jour
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close" id="close-modal"></button>
                                    </div>
                                    <form action="{{ route('about.update', $about->id) }}" 
                                        class="tablelist-form" autocomplete="off" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        @method('PUT')
                                        <input type="hidden" name="_method" value="put">

                                        <div class="modal-body">
                                            <div class="mb-3" id="modal-id" style="display: none;">
                                                <label for="id-field" class="form-label">ID</label>
                                                <input type="text" id="id-field" class="form-control" placeholder="ID"
                                                    readonly />
                                            </div>

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Nom</label>
                                                <input type="text" id="customername-field" class="form-control"
                                                    value="{{ $about->titre }}" name="titre"
                                                    placeholder="Entrez le nom">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="gen-info-description-input">Description</label>
                                                <textarea class="form-control"
                                                    name="description"
                                                    placeholder="Entrez une description" id="gen-info-description-input" rows="2">{!!$about->description!!}
                                                 </textarea>
                                                 
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-success" id="add-btn">Mettre à
                                                    jour</button>
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

                @if(!is_null($abouts))
                @foreach($abouts as $about)
            <!-- Modal suppression-->
            <div class="modal fade zoomIn" id="deleteModal_{{ $about->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="btn-close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mt-2 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                    colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">
                                </lord-icon>
                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Êtes-vous sûr ?</h4>
                                    <p class="text-muted mx-4 mb-0">Êtes-vous sûr de vouloir supprimer cet
                                        enregistrement ?</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn w-sm btn-danger" id="delete-record">Oui,
                                    supprimez-le!</button>
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