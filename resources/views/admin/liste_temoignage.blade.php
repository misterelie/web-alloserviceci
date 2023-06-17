@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Nos Témoignages</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Témoignages</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
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
                        <h4 class="card-title mb-0">Ajout, Modification & Suppression</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                            id="create-btn" data-bs-target="#showModal"><i
                                                class="ri-add-line align-bottom me-1"></i> Ajouter</button>
                                        {{-- <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                                class="ri-delete-bin-2-line"></i></button> --}}
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
                                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                                        value="option">
                                                </div>
                                            </th>
                                            <th class="sort" data-sort="customer_name">Photos</th>
                                            <th class="sort" data-sort="email">Nom</th>
                                            <th class="sort" data-sort="phone">Contacts</th>
                                            <th class="sort" data-sort="date">Dates d'ajout</th>
                                            <th class="sort" data-sort="status">Statuts</th>
                                            <th class="sort" data-sort="action">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @if(!is_null($temoignages))
                                            @foreach($temoignages as $temoignage)
                                                <tr>
                                                    <th scope="row">
                                                        <div class="form-check">
                                                            {{ $loop->iteration }}
                                                        </div>
                                                    </th>
                                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                            class="fw-medium link-primary">#VZ2101</a></td>
                                                    <td class="customer_name">
                                                        <img src="/TemoignagnesPhoto/{{ $temoignage->photo_person }}"
                                                            alt="" class="avatar-xs rounded-circle">
                                                    </td>
                                                    <td class="email">{{ $temoignage->nom }}</td>
                                                    <td class="phone">{{ $temoignage->contact }}</td>
                                                    <td class="date">{{ $temoignage->created_at }}</td>

                                                  
                                                    <td class="status">

                                                        @if ($temoignage->etatStatus($temoignage->etat)->status == 'Désactivé')
                                                            <span
                                                                class="badge badge-soft-danger text-uppercase {{ $temoignage->etatStatus($temoignage->etat) }} fs-8 fw-bolder">{{ $temoignage->etatStatus($temoignage->etat)->status }}
                                                            </span>
                                                        @else
                                                            <span
                                                                class="badge badge-soft-success text-uppercase {{ $temoignage->etatStatus($temoignage->etat) }} fs-8 fw-bolder">{{ $temoignage->etatStatus($temoignage->etat)->status }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <button class="btn btn-sm btn-success edit-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editModal_{{$temoignage->id}}">Modifier</button>
                                                            </div>

                                                            <div class="detail">
                                                                <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="#detailModal_{{ $temoignage->id }}">Lire plus</button>
                                                            </div>

                                                            <div class="remove">
                                                                <form id="form-{{ $temoignage->id }}" 
                                                                     action="{{ route('delete.temoignage', $temoignage->id )}}" method="POST" enctype="multipart/form-data">

                                                                     @csrf
                                                                     @method('DELETE')
             
                                                                    <button class="btn btn-sm btn-danger remove-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteRecordModal_{{$temoignage->id}}">Supprimer
                                                                </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find
                                            any
                                            orders for you search.</p>
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


        <!-- end row -->
        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                    </div>
                    <form class="" action="{{ route('save.temoignage') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Nom</label>
                                <input type="text" id="customername-field" name="nom" class="form-control"
                                    placeholder="Entrez le nom" required />
                            </div>

                            <div class="mb-3">
                                <label for="phone-field" class="form-label">Contact</label>
                                <input type="tel" id="phone-field" name="contact" class="form-control"
                                    placeholder="Ce champs peut etre vide" />
                            </div>

                            <div class="mb-3">
                                <label for="photo-field" class="form-label">Vous pouvez ajouté une image</label>
                                <input type="file" id="photo-field" name="photo_person" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label for="date-field" class="form-label">Ecrivez</label>
                                <textarea class="form-control" name="texte" placeholder="Saisissez le témoignage"
                                    id="gen-info-description-input" rows="2" style="height: 112px;" required>
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Ajouter</button>
                                <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(!is_null($temoignages))
        @foreach($temoignages as $temoignage)
            <div class="modal fade" id="editModal_{{$temoignage->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form action="{{ route('update.temoignage', $temoignage->id )}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf 

                            @method('PUT')
                            <input type="hidden" name="_method" value="put">

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Nom</label>
                                    <input type="text" id="customername-field" value="{{ $temoignage->nom }}" name="nom" class="form-control" placeholder="Entrez le nom"/>
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Contact</label>
                                    <input type="tel" id="phone-field" name="contact" value="{{ $temoignage->contact }}" class="form-control" placeholder="Ce champs peut etre vide" />
                                </div>

                                <div class="mb-3">
                                    <label for="photo-field" class="form-label">Vous pouvez ajouté une image</label>
                                    <input type="file" id="photo-field" name="photo_person" class="form-control" /><br>
                                    <img src="../TemoignagnesPhoto/{{ $temoignage->photo_person }}" alt="" 
                                    class="img-fluid justify-center" width="70px" height="70px">
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Statut</label>
                                    <select name="etat" class="form-select" id="deatType">
                                        <option value="">Sélectionnez le statut</option>
                                        @if (!is_null($etats))
                                            @foreach ($etats as $etat)
                                            <option value="{{ $etat->id }}"
                                                @if ((int) $temoignage->etat == (int) $etat->id) selected @endif>
                                                {{ $etat->status }}
                                            </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="date-field" class="form-label">Ecrivez</label>
                                    <textarea class="form-control" name="texte" placeholder="Saisissez le témoignage"
                                        id="gen-info-description-input" rows="2" style="height: 112px;">
                                        {!! $temoignage->texte !!}
                                    </textarea>
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
        @endforeach
        @endif

        @if(!is_null($temoignages))
        @foreach($temoignages as $temoignage)
      <!-- Modal detail-->
          <div class="modal fade zoomIn" id="detailModal_{{ $temoignage->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" 
                          aria-label="Close" id="btn-close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="">
                            <h5 class="text-center" style="font-weight: bold">LIRE PLUS</h5>
                              <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                  <p class=""><span style="color: #4b38b3; font-weight:bold">Nom</span>: {{ $temoignage->nom }}</p>
                                  <p class=""><span style="color: #4b38b3; font-weight:bold">Contact</span>: {{ $temoignage->contact }}</p>
                                  <p><span style="color: #4b38b3; font-weight:bold">Témoignage</span>: <br><br>  {!! $temoignage->texte !!}</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      <!--end modal -->
      @endforeach
      @endif

{{-- 
        @if(!is_null($temoignages))
        @foreach($temoignages as $temoignage)
        <!-- Modal suppresseion -->
        <div class="modal fade zoomIn" id="deleteRecordModal_{{$temoignage->id}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Êtes-vous sûr ?</h4>
                                <p class="text-muted mx-4 mb-0">Êtes-vous sûr de vouloir supprimer cet enregistrement ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Fermer</button>
                            <button type="button" class="btn w-sm btn-danger " id="delete-record">Oui, Supprimer
                                It!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal -->
        @endforeach
        @endif --}}
    </div>
    <!-- container-fluid -->
</div>
@endsection