@extends('layouts.admin')

@section('content')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tous les messages</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                            <li class="breadcrumb-item active">Contacts</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            {{-- <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <div class="flex-grow-1">
                                <button class="btn btn-info add-btn" data-bs-toggle="modal"
                                    data-bs-target="#showModal"><i class=""></i>Liste Messages</button>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="hstack text-nowrap gap-2">
                                    <button class="btn btn-soft-danger" id="remove-actions"
                                        onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#addmembers"><i class="ri-filter-2-line me-1 align-bottom"></i>
                                        Filters</button>
                                    <button class="btn btn-soft-success shadow-none">Importer</button>
                                    <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                        aria-expanded="false" class="btn btn-soft-info shadow-none"><i
                                            class="ri-more-2-fill"></i></button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li><a class="dropdown-item" href="#">Tous</a></li>
                                        <li><a class="dropdown-item" href="#">Last Week</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--end col-->

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
            <div class="col-xxl-9">
                <div class="card" id="contactList">
                    <div class="card-header">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="search-box">
                                    <input type="text" class="form-control search" placeholder="Search for contact...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            {{-- <div class="col-md-auto ms-auto">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="text-muted">Sort by: </span>
                                        <select class="form-control mb-0" data-choices data-choices-search-false id="choices-single-default">
                                            <option value="Name">Nom</option>
                                            <option value="Company">Prénoms</option>
                                            <option value="Lead">email</option>
                                        </select>
                                    </div>
                                </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="table-responsive table-card mb-3">
                                <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>N°</th>
                                            <th class="sort" data-sort="name" scope="col">Noms</th>
                                            <th class="sort" data-sort="company_name" scope="col">Prénoms</th>
                                            <th class="sort" data-sort="email_id" scope="col">Email</th>
                                            <th class="sort" data-sort="phone" scope="col">objet</th>
                                            <th class="sort" data-sort="tags" scope="col">Dates envoi</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @if(!is_null($messages))
                                            @foreach($messages as $message)
                                                <tr>
                                                    <th scope="row">
                                                        {{ $loop->iteration }}
                                                    </th>
                                                    <td class="company_name">{{ $message->nom }}</td>
                                                    <td class="email_id">{{ $message->prenoms }}</td>
                                                    <td class="phone">{{ $message->email }}</td>
                                                    <td class="lead_score">{{ $message->objet }}</td>
                                                    <td class="date"><small
                                                            class="text-muted">{{ $message->created_at }}</small></td>
                                                    <td>
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                            <div class="detail">
                                                                <button class="btn btn-sm btn-primary edit-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#detailModal_{{ $message->id }}">Détails</button>
                                                            </div>
                                                            <div class="remove">
                                                            </div>
                                                            <form id="form-{{ $message->id }}" 
                                                                action="{{ route('delete.messagecontact', $message->id) }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button class="btn btn-sm btn-danger remove-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal_{{ $message->id }}">Delete</button>
                                                            </form>
                                                        </ul>
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
                                        <p class="text-muted mb-0">We've searched more than 150+ contacts We did not
                                            find any contacts for you search.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="#">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="#">
                                        Next
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end add modal-->

                        @if(!is_null($messages))
                            @foreach($messages as $message)
                                <!-- Modal detail-->
                                <div class="modal fade zoomIn" id="detailModal_{{ $message->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="btn-close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="">
                                                    <h5 class="text-center" style="font-weight: bold">TOUS LES DETAILS
                                                    </h5>
                                                    <div class="col-xxl-3">
                                                        <div class="card" id="contact-view-detail">
                                                            <div class="card-body text-center">
                                                                
                                                                <h5 class="mt-4 mb-1">Nom: {{$message->nom}}</h5>
                                                                <p class="text-muted">Prénoms: {{$message->prenoms}}</p>
                                                            </div>
                                                            <div class="card-body">
                                                                
                                                                <div class="table-responsive table-card">
                                                                    <table class="table table-borderless mb-0">
                                                                        <tbody>
                                                                           
                                                                            <tr>
                                                                                <td class="fw-medium" scope="row">Email
                                                                                </td>
                                                                                <td>{{$message->email}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="fw-medium" scope="row">Objet</td>
                                                                                <td>{{$message->objet}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="fw-medium" scope="row">Date envoie</td>
                                                                                <td>
                                                                                <small class="text-muted">{{ $message->created_at }}</small>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div><br><br>

                                                                <h6 class="text-muted text-uppercase fw-semibold mb-3">
                                                                    Message
                                                                </h6>
                                                                <p class="text-muted mb-4">
                                                                    {!!$message->message!!}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!--end card-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end modal -->
                            @endforeach
                        @endif

                        @if(!is_null($messages))
                        @foreach($messages as $message)
                            <div class="modal fade zoomIn" id="detailModal_{{ $message->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" id="deleteRecord-close"
                                                data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                        </div>
                                        <div class="modal-body p-5 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px">
                                            </lord-icon>
                                            <div class="mt-4 text-center">
                                                <h4 class="fs-semibold">You are about to delete a contact ?</h4>
                                                <p class="text-muted fs-14 mb-4 pt-1">Deleting your contact will remove all
                                                    of your information from our database.</p>
                                                <div class="hstack gap-2 justify-content-center remove">
                                                    <button class="btn btn-link link-success fw-medium text-decoration-none"
                                                        id="deleteRecord-close" data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i> Close</button>
                                                    <button class="btn btn-danger" id="delete-record">Yes, Delete
                                                        It!!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--end delete modal -->
                        @endforeach
                        @endif
                    </div>
                </div>
                <!--end card-->
            </div>
        </div>
        <!--end row-->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection