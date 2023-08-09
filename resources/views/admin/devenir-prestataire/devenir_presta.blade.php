@extends('layouts.admin')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">La liste des prestataires</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Prestataires</li>
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
                            <h4 class="card-title mb-0">Modification & Suppression d'un prestataire</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal" style="background: green"><i></i>Les prestataires</button>
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
                                        <thead class="table" style="background-color: green">
                                            <tr>
                                                <th class="text-white">N°</th>
                                                <th class="sort text-white text-uppercase" data-sort="photo">Photos</th>
                                                <th class="sort text-white text-uppercase" data-sort="customer_name">Nom & Prénoms</th>
                                                <th class="sort text-white text-uppercase" data-sort="nbre_enfant">Date Naissace</th>
                                                <th class="sort text-white text-uppercase" data-sort="telephone">Commune</th>
                                                <th class="sort text-white text-uppercase" data-sort="modes">Prestations</th>
                                                <th class="sort text-white text-uppercase" data-sort="salaire">Salaires</th>
                                                <th class="sort text-white text-uppercase w-200" data-sort="salaire">Etats</th>
                                                <th  class="sort text-white text-uppercase" data-sort="action" style="width: 260px !important">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null( $prestataires ))
                                            @foreach( $prestataires as $prestataire )
                                            <tr>
                                                <th scope="row">
                                                    {{ $loop->iteration }}
                                                </th>
                                                @if(!is_null($prestataire->photo))

                                                    <td class="photo"><img src="/PrestatairePhoto/{{ $prestataire->photo }}"
                                                        class="img-fluid rounded-circle" width="35">
                                                    </td>
                                                @else
                                                    <td class="photo"><img src="https://crm.alloservice.ci/backend/assets/img/male.png"
                                                        class="img-fluid rounded-circle" width="35">
                                                    </td>
                                                @endif
                                                
                                                <td class="customer_name">
                                                    {{ $prestataire->nom }} {{ $prestataire->prenoms }}
                                                </td>
                                               
                                                <td class="date fw-bolder text-center">{{ $prestataire->date_naiss }} <br> 
                                                    <span class="fw-bolder" style="color: #d08700 !important">{{ $prestataire->civilite }}</span></td>
                                                {{-- <td class="commune fw-bolder">{{ $prestataire->commune->commune }}</td> --}}

                                                <td class="">
                                                <div class="d-block col">
                                                <strong><i class="mdi mdi-home">
                                                    </i>  
                                                    @if (!is_null($prestataire->commune))
                                                    {{ Str::ucfirst($prestataire->commune->commune) }}
                                                    @endif
                                                </i>
                                              </strong>

                                                <span class="d-block"><i class="bx bx-location-map bx-map"></i> 
                                                    &nbsp;{{ Str::ucfirst($prestataire->quartier) }}
                                                </span>
                                                                                                            
                                               </div>
                                                </td>

                                                <td class="">
                                                <div class="d-block col">
                                                                                                                                                                          <small class="d-block">
                                                                                                                                                                            {{ $prestataire->prestation->libelle }}
                                                                                                                                                                          </small>
                                                                                                                                                                            <small class="p-2 font-weight-bold fw-bold badge bg-primary">
                                                    <span style="color: #fff"><i class="bx bxs bx-timer" style="font-size: 14.8px;"></i>  
                                                        {{ $prestataire->mode->mode }}</span>
                                                    </small>
                                                        
                                                    </div>
                                                </td>
                                                
                                                <td class="date"> 
                                                    <span class="p-2 badge badge-soft-success text-primary fs-12 fw-bolder">{{ $prestataire->pretention_salairiale }} <sup><small> FCFA</small></sup></span>
                                                </td>

                                                <td class="status">
                                                    <span class="p-2 badge badge-soft-{{ $prestataire->etat == '1' ? 'success' : 'danger' }}"> {{ $prestataire->etat == '1' ? 'acceptée' : 'refusée' }}
                                                    </span>     
                                                 </td>
                                                {{-- <td class="copy_piece">
                                                    @if(!is_null($prestataire->copy_piece))
                                                            <a href="{{ asset('FichierCopiepiece/'.$prestataire->copy_piece) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img src="{{ asset('assets/pdf.png') }}" target-="" 
                                                                title="Cliquez pour télécharger" alt="{{$prestataire->copy_piece}}" width="25">
                                                            </a>
                                                    @endif
                                                </td> --}}

                                                {{-- <td class="copy_last_diplome">
                                                    @if(!is_null($prestataire->copy_last_diplome))
                                                            <a href="{{ asset('FichierCopiepiece/'.$prestataire->copy_last_diplome) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img src="{{ asset('assets/pdf.png') }}" target-="" 
                                                                title="Cliquez pour télécharger" alt="{{$prestataire->copy_last_diplome}}" width="25">
                                                            </a>
                                                    @endif
                                                </td> --}}
                                              
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_{{$prestataire->id}}">Modifier</button>
                                                        </div>

                                                        <div class="detail">
                                                            <button class="btn btn-sm btn-secondary edit-item-btn" data-bs-toggle="modal" data-bs-target="#accepterlModal_{{ $prestataire->id }}">Etats</button>
                                                        </div>

                                                        <div class="detail">
                                                            <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="#detailModal_{{ $prestataire->id }}">Fiche de profil</button>
                                                        </div>

                                                        <form  id="form-{{ $prestataire->id }}" 
                                                            action="{{ route('delete.prestataire', $prestataire->id) }}" 
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
    
                                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $prestataire->id }}">Supprimer</button>
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

              <!-- modifier prestation-->
              @if(!is_null( $prestataires ))
              @foreach( $prestataires as $prestataire )
              <div class="modal fade" id="editModal_{{$prestataire->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-soft-info p-3">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form class="tablelist-form" action="{{route('update.prestataire', $prestataire->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            @method('PUT')
                            <input type="hidden" name="_method" value="put">

                            <div class="modal-body">
                                <input type="hidden" id="id-field" />
                                <div class="row g-3">
                                
                                    <div class="col-lg-12">
                                        <div>
                                            <label for="email-field" class="form-label">Photos</label>
                                            <input  type="file" id="photo" name="photo" class="form-control" 
                                            placeholder="Ajouter une image pour la prestation"/> <br>
                                            @if(!is_null($prestataire->photo))
                                                <img src="/PrestatairePhoto/{{ $prestataire->photo }}"
                                                class="img-fluid rounded-circle" width="100px" height="100px">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="star_value-field" class="form-label">Nom</label>
                                            <input type="text" id="star_value-field" name="nom" value="{{$prestataire->nom}}" class="form-control" placeholder="Mettre à jour"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="location-field" class="form-label">Prénoms</label>
                                            <input type="text" id="location-field" class="form-control" name="prenoms" value="{{$prestataire->prenoms}}" placeholder="Mettre à jour"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="employee-field" class="form-label">Date naissance</label>
                                            <input type="text" id="employee-field"  max="{{ date('Y-m-d') }}" name="date_naiss" value="{{$prestataire->date_naiss}}" class="form-control" placeholder="Mettre à jour"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="website-field" class="form-label">Nombre d'enfant</label>
                                            <select name="nbre_enfant" class="form-select" id="nbre_enfant">
                                                <option value="">-- Sélectionnez une option ---</option>
                                                    @for ($i = 0; $i < 21; $i++)
                                                        <option value="{{ $i }}"
                                                            @if ($i === (int) $prestataire->nbre_enfant) selected @endif>
                                                            {{ $i }}</option>
                                                    @endfor
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="contact_email-field" class="form-label">Téléphone 1</label>
                                            <input type="tel" id="contact_email-field" name="telephone1" value="{{$prestataire->telephone1}}" class="form-control" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="contact_email-field" class="form-label">Téléphone 2</label>
                                            <input type="tel" id="contact_email-field" name="telephone2" value="{{$prestataire->telephone2}}" class="form-control" placeholder=""/>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="website-field" class="form-label">Whatsapp</label>
                                            <input type="tel" id="website-field" name="whatsapp" value="{{$prestataire->whatsapp}}" class="form-control" placeholder="Mettre à jour"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="contact_email-field" class="form-label">Adresse Email </label>
                                            <input type="tel" id="contact_email-field" name="email" value="{{$prestataire->email}}" class="form-control" placeholder="Mettre à jour"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="ethnie_id" class="form-label">Ethnie</label>
                                            <select name="ethnie_id" class="form-select" id="ethnie_id">
                                                <option value="">-- Sélectionnez une option ---</option>
                                                @if(!is_null($ethnies))
                                                    @foreach($ethnies as $ethnie)
                                                    <option value="{{ $ethnie->id }}" 
                                                        @if((int) $prestataire->ethnie_id == (int)$ethnie->id) selected @endif>
                                                        {{ $ethnie->ethnie }}
                                                    </option>
                                                    @endforeach
                                            @endif
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div>
                                            <label for="commune_id" class="form-label">Commune</label>
                                            <select name="commune_id" class="form-select" id="commune_id">
                                                <option value="">-- Sélectionnez une option ---</option>
                                                @if(!is_null($communes))
                                                    @foreach($communes as $comm)
                                                    <option value="{{ $comm->id }}" 
                                                        @if((int) $prestataire->commune_id == (int)$comm->id) selected @endif>
                                                        {{ $comm->commune }}
                                                    </option>
                                                    @endforeach
                                            @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="contact_email-field" class="form-label">Quartier </label>
                                            <input type="text" id="contact_email-field" name="quartier" value="{{$prestataire->quartier}}" class="form-control" placeholder="Mettre à jour"/>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="prestation_id" class="form-label">Domaine(s) d'activité</label>
                                            <select name="prestation_id" class="form-select" id="prestation_id">
                                                <option value="">-- Sélectionnez une option ---</option>
                                                @if(!is_null($prestations))
                                                    @foreach($prestations as $prestation)
                                                    <option value="{{ $prestation->id }}" 
                                                        @if((int)  $prestataire->prestation_id == (int)$prestation->id) selected @endif>
                                                        {{ $prestation->libelle }}
                                                    </option>
                                                    @endforeach
                                            @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="annee_experience" class="form-label">Nombre d'année d'expérience</label>
                                            <select name="annee_experience"  class="form-select" id="annee_experience">
                                                <option value="">-- Sélectionnez une option ---</option>
                                                @for ($i = 0; $i < 20; $i++)
                                                <option value="{{ $i }}"
                                                    @if ($i === (int) $prestataire->annee_experience) selected @endif>
                                                    {{ $i }}</option>
                                            @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="contact_email-field" class="form-label">Prétention salariale </label>
                                            <input type="text" id="contact_email-field" name="pretention_salairiale" 
                                            value="{{$prestataire->pretention_salairiale}}" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="prestation_id" class="form-label">Zone d'intervention</label>
                                            <select name="prestation_id" class="form-select" id="prestation_id">
                                                <option value="">-- Sélectionnez une option ---</option>
                                                @if(!is_null($communes))
                                                    @foreach($communes as $comm)
                                                    <option value="{{ $comm->id }}" 
                                                        @if((int) $prestataire->commune_id == (int)$comm->id) selected @endif>
                                                        {{ $comm->commune }}
                                                    </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                            <div>
                                                <label for="contact_email-field" class="form-label">Personne à contacter </label>
                                                <input type="text" id="contact_email-field" name="contact_urgence"
                                                 value="{{$prestataire->contact_urgence}}" class="form-control"/>
                                            </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="contact_email-field" class="form-label">Référence</label>
                                            <input type="text" id="contact_email-field" name="reference" value="{{$prestataire->reference}} " class="form-control" placeholder=""/>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="prestation_id" class="form-label">Contact de votre référence</label>
                                            <input type="tel" id="contact_email-field" name="contact_reference" 
                                            value="{{$prestataire->contact_reference}}" class="form-control" placeholder=""/>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="alphabet_id" class="form-label">Alphabétisation</label>
                                            <select name="alphabet_id" class="form-select" id="alphabet_id">
                                                <option value="">-- Sélectionnez une option ---</option>
                                                @foreach ($alphabets as $k => $c)
                                                        <option value="{{ $c->id }}"
                                                            @if ($c->id === (int) $prestataire->alphabet_id) selected @endif>
                                                            {{ $c->alphabet }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                               
                                <div class="col-lg-4">
                                    <div>
                                        <label for="diplome_id" class="form-label">Dernier diplôme</label>
                                        <select name="diplome_id" class="form-select" id="diplome_id">
                                            <option value="">-- Sélectionnez une option ---</option>
                                            @if(!is_null($diplomes))
                                                @foreach($diplomes as $diplome)
                                                <option value="{{ $diplome->id }}" 
                                                    @if((int) $prestataire->diplome_id == (int)$diplome->id) selected @endif>
                                                    {{ $diplome->diplome }}
                                                </option>
                                                @endforeach
                                        @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div>
                                        <label for="mode_id" class="form-label">Mode de travail</label>
                                        <select name="mode_id" class="form-select" id="mode_id">
                                            <option value="">--- Sélectionnez une option ---</option>
                                            @if(!is_null($modes))
                                                @foreach($modes as $mode)
                                                <option value="{{ $mode->id }}" 
                                                    @if((int) $prestataire->mode_id == (int)$mode->id) selected @endif>
                                                    {{ $mode->mode }}
                                                </option>
                                                @endforeach
                                        @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div>
                                        <label for="dispo_id" class="form-label">Disponibilité</label>
                                        <select name="dispo_id" class="form-select" id="dispo_id">
                                            <option value="">-- Sélectionnez une option ---</option>
                                            @if(!is_null($dispos))
                                                @foreach($dispos as $dispo)
                                                <option value="{{ $dispo->id }}" 
                                                    @if((int) $prestataire->dispo_id == (int)$dispo->id) selected @endif>
                                                    {{ $dispo->dispo }}
                                                </option>
                                                @endforeach
                                        @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div>
                                        <label for="piece_id" class="form-label">Nature de la pièce </label>
                                        <select name="piece_id" class="form-select" id="piece_id">
                                            <option value="">--- Sélectionnez une option ---</option>
                                            @if(!is_null($pieces))
                                                @foreach($pieces as $piece)
                                                <option value="{{ $piece->id }}" 
                                                    @if((int) $prestataire->piece_id == (int)$piece->id) selected @endif>
                                                    {{ $piece->piece }}
                                                </option>
                                                @endforeach
                                        @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div>
                                        <label for="numero_piece" class="form-label">Numéro de la pièce</label>
                                        <input type="text" id="contact_email-field" name="numero_piece" 
                                        value="{{$prestataire->numero_piece}}" class="form-control" placeholder=""/>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div>
                                        <label for="canal_id" class="form-label">Rencontre avec Allô Service </label>
                                        <select name="canal_id" class="form-select" id="canal_id">
                                            <option value="">-- Sélectionnez une option ---</option>
                                            @if(!is_null($canals))
                                                @foreach($canals as $canal)
                                                <option value="{{ $canal->id }}" 
                                                    @if((int) $prestataire->canal_id == (int)$canal->id) selected @endif>
                                                    {{ $canal->canal }}
                                                </option>
                                                @endforeach
                                        @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div>
                                        <label for="contactDescription" class="form-label">Observation</label>
                                        <textarea class="form-control" id="contactDescription" name="avis" rows="5" placeholder="" >{{$prestataire->avis}}</textarea>
                                       
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
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
              <!-- fin modifier -->

 <!-- statut de la demande-->
 @if(!is_null($prestataires))
 @foreach($prestataires as $prestataire)
 <div class="modal fade" id="accepterlModal_{{ $prestataire->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header bg-light p-3">
                 <h5 class="modal-title fw-bold" id="exampleModalLabel">Etat de la demande</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
             </div>
             <form action="{{ url('accepterPrestataire', $prestataire->id) }}" class="" autocomplete="off" method="POST"  enctype="multipart/form-data">
                 @csrf

                 @method('PUT')
                 <input type="hidden" name="_method" value="put">
                 <input type="hidden" name="etat" value="accepter">
                 <div class="modal-body">
                     <div class="mb-3" id="modal-id" style="display: none;">
                         <label for="id-field" class="form-label">ID</label>
                         <input type="text" id="id-field" class="form-control" placeholder="ID" readonly/>
                     </div>

                     <div class="mb-3">
                         <fieldset class="sm">
                            
                             <div class="row g-3 align-items-center px-3 mb-2">
                                 <div class="col-6">
                                     <div class="form-check">
                                         <input class="form-check-input" type="radio"
                                             id="decisionOff{{ $prestataire->id }}" name="etat"
                                             value="2">
                                         <label class="form-check-label fw-bold text-red pointer"
                                             for="decisionOff{{ $prestataire->id }}">
                                             Demande refusée
                                         </label>
                                     </div>
                                 </div>
                                 <div class="col-6">
                                     <div class="form-check">
                                         <input class="form-check-input" type="radio"
                                             id="decisionOk{{ $prestataire->id }}" name="etat"
                                             value="1">
                                         <label class="form-check-label fw-bold text-success pointer"
                                             for="decisionOk{{ $prestataire->id }}">
                                             Demande acceptée
                                         </label>
                                     </div>
                                 </div>
                             </div>
                         </fieldset>
                     </div>

                     <div class="mb-3">
                         <div>
                             <label for="exampleFormControlTextarea5" class="form-label fw-bold">Motif :</label>
                             <textarea name="motif"  class="form-control" id="exampleFormControlTextarea5" rows="3">{!!$prestataire->motif!!}</textarea>
                         </div>
                     </div>

                 </div>
                 <div class="modal-footer">
                     <div class="hstack gap-2 justify-content-end">
                         <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                         @if($prestataire->etat !=  NULL)
                             <button type="submit" class="btn btn-success" id="add-btn">Valider</button>
                         @else
                         <button type="submit" class="btn btn-success" id="add-btn">Valider</button>
                        @endif
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div> 
 @endforeach
 @endif 


         {{-- Details Modal --}}
    @if (!is_null($prestataires) && $prestataires->count() > 0)
    <section>
        @foreach ($prestataires as $prestataire)
            <!-- Modal -->
            <div class="modal fade" id="detailModal_{{ $prestataire->id }}" tabindex="-1"
                aria-labelledby="detailModal{{ $prestataire->id }}Label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #ffcc6e !important">
                            <h1 class="modal-title fs-7 text-uppercase">
                                Détails sur le prestataire : </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body modalBody ">
                            <div class="row">

                                <div class="col-lg-9 col-md-9">
                                    {{-- Personnelles --}}
                                    <div class="mb-3 bloc-item">
                                        <u><h4 class="bloc-title fw-bolder">Informations personnelles :</h4></u>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                       <span class="fs-16"> Nom & Prénom :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fw-bolder fs-16">
                                                            {{ Str::ucfirst($prestataire->nom) }}  
                                                            {{ Str::ucfirst($prestataire->prenoms) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Situation matrimoniale :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                       <span class="fw-bolder fs-16"> {{ Str::ucfirst($prestataire->situation_matri) }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Nombre d'enfant :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fw-bolder fs-16">{{ Str::ucfirst($prestataire->nbre_enfant) }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Date de naissance :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                    <span class="fw-bolder fs-16">
                                                        {{ $prestataire->date_naiss }}
                                                      
                                                    </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Contact 1 :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fw-bolder fs-16">
                                                            <a href="tel:+{{ Str::ucfirst($prestataire->telephone1) }}">
                                                                {{ Str::ucfirst($prestataire->telephone1) }}
                                                                &nbsp;&nbsp; <i class="fa fa-link"></i>
                                                            </a>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        @if (!is_null($prestataire->telephone2))
                                            <p>
                                            <table width="100%">
                                                <tbody width="100%">
                                                    <tr width="100%">
                                                        <td width="35%">
                                                            <span class="fs-16">Contact 2 :</span>
                                                        </td>
                                                        <td width="65%" class="data">
                                                            <span class="fw-bolder fs-16">
                                                                <a href="tel:+{{ Str::ucfirst($prestataire->telephone2) }}">
                                                                    {{ Str::ucfirst($prestataire->telephone2) }}
                                                                    &nbsp;&nbsp; <i class="fa fa-link"></i>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>
                                        @endif

                                        @if (!is_null($prestataire->whatsapp))
                                            <p>
                                            <table width="100%">
                                                <tbody width="100%">
                                                    <tr width="100%">
                                                        <td width="35%">
                                                           <span class="fs-16"> whatsapp :</span>
                                                        </td>
                                                        <td width="65%" class="data">
                                                           <span class="fs-16 fw-bolder"><a href="https://wa.me/{{ urlencode($prestataire->whatsapp) }}">
                                                            {{ Str::ucfirst($prestataire->whatsapp) }}
                                                            &nbsp;&nbsp; <i class="fa fa-link"></i>
                                                           </a>
                                                        </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>
                                        @endif

                                        @if (!is_null($prestataire->email))
                                            <p>
                                            <table width="100%">
                                                <tbody width="100%">
                                                    <tr width="100%">
                                                        <td width="35%">
                                                           <span class="fs-16"> Email :</span>
                                                        </td>
                                                        <td width="65%" class="data">
                                                            <span class="fs-16 fw-bolder">
                                                                <a href="mailto:{{ $prestataire->email }}">
                                                                    {{ $prestataire->email }}
                                                                    &nbsp;&nbsp; <i class="fa fa-link"></i></a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>
                                        @endif

                                        @if (!is_null($prestataire->ethnie))
                                            <p>
                                            <table width="100%">
                                                <tbody width="100%">
                                                    <tr width="100%">
                                                        <td width="35%">
                                                           <span class="fs-16"> Ethnie :</span>
                                                        </td>
                                                        <td width="65%" class="data">
                                                           <span class="fs-16 fw-bolder">
                                                            {{ Str::ucfirst($prestataire->ethnie->ethnie) }}
                                                           </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>
                                        @endif

                                        @if (!is_null($prestataire->commune))
                                            <p>
                                            <table width="100%">
                                                <tbody width="100%">
                                                    <tr width="100%">
                                                        <td width="35%">
                                                            <span class="fs-16">Commune de résidence :</span>
                                                        </td>
                                                        <td width="65%" class="data">
                                                           <span class="fs-16 fw-bolder"> 
                                                            {{ Str::ucfirst($prestataire->commune->commune) }}
                                                           </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>
                                        @endif

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                       <span class="fs-16"> Quartier :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fs-16 fw-bolder">
                                                            {{ Str::ucfirst($prestataire->quartier) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    </div><br>


                                    {{-- Pro --}}
                                    <div class="mb-3 bloc-item">
                                        <u><h4 class="bloc-title fw-bolder">Informations Professionnelles :</h4>
                                        </u>
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Domaine(s) d'activité :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        @if (!is_null($prestataire->prestation))
                                                            <span class="fw-bolder fs-16">{{ Str::ucfirst($prestataire->prestation->libelle) }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                       <span class="fs-16"> Année(s) d'expérience :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fs-16">
                                                            {{ $prestataire->annee_experience != 0 ? $prestataire->annee_experience . ' ans' : 0 }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Prétention salariale :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fw-bolder fs-16">
                                                            {{ ($prestataire->pretention_salairiale) }} FCFA
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                       <span class="fs-16"> Zone d'intervention :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fs-16 fw-bolder">
                                                            {{ Str::ucfirst($prestataire->commune->commune) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Contact d'urgence :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                       <span class="fs-16 fw-bolder">
                                                        {{ $prestataire->contact_urgence }}
                                                       </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Référence :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                       <span class="fs-16 fw-bolder"> {{ $prestataire->reference }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Contact référence :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                       <span class="fs-16 fw-bolder">
                                                        {{ $prestataire->contact_reference }}
                                                       </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        @if (!is_null($prestataire->alphabet))
                                            <p>
                                            <table width="100%">
                                                <tbody width="100%">
                                                    <tr width="100%">
                                                        <td width="35%">
                                                            <span class="fs-16">Alphabétisation :</span>
                                                        </td>
                                                        <td width="65%" class="data">
                                                            <span class="fs-16 fw-bolder"> {{ $prestataire->alphabet->alphabet }}</span>
                                                            
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>
                                        @endif
                                    </div><br>

                                    {{-- Autres --}}
                                    <div class="mb-3 bloc-item">
                                        <ul><h4 class="bloc-title fw-bolder">Autres Informations :</h4></ul>
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                       <span class="fs-16"> Mode de travail :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                       <span class="fs-16 fw-bolder">
                                                        {{ !is_null($prestataire->mode) ? $prestataire->mode->mode : '...' }}
                                                       </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                       <span class="fs-16"> Disponibilité :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                       <span class="fs-16 fw-bolder">
                                                        {{ !is_null($prestataire->dispo) ? $prestataire->dispo->dispo : '...' }}
                                                       </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Pièce d'identité :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                       <span class="fs-16 fw-bolder">
                                                        {{ !is_null($prestataire->piece) ? $prestataire->piece->piece : '...' }}
                                                       </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Numéro de la pièce :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                       <span class="fs-16 fw-bolder">
                                                            {{ $prestataire->numero_piece }}
                                                       </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">
                                                            A connu <small><strong>ALLO SERVICE</strong></small> par :
                                                        </span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                       <span class="fs-16 fw-bolder">
                                                        {{ !is_null($prestataire->canal) ? $prestataire->canal->canal : '...' }}
                                                       </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>

                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                       <span class="fs-16"> Date:</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fs-16 fw-bolder">{{ ($prestataire->created_at) }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    </div>


                                    <div class="mb-3 bloc-item">
                                        <h4 class="bloc-title">Observations sur le prestataire:</h4>

                                        @if (!is_null($prestataire->avis))
                                        {!! $prestataire->avis !!}
                                        @else
                                            <div class="alert alert-danger text-center">
                                                <span class="bx bx-info-circle"></span>&nbsp; Pas d'observations
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <div class="col-sm-2 previewDiv avatar-box mb-4">

                                        
                                        @if (!is_null($prestataire->photo))
                                            <img src="../PrestatairePhoto/{{ $prestataire->photo }}"
                                            class="" width="165px" height="185px">
                                        @else
                                            <span class="fas fa fa-user camera-icon" id="cameraIcon"></span>
                                        @endif
                                    </div>

                                    <div class="row my-4">

                                        <div class="col-sm-12 mb-4">
                                            <h4>Dossiers : </h4>
                                        </div>

                                        @if (!is_null($prestataire->copy_piece))
                                        <div class="col-sm-12 mb-3 border">
                                            @if(!is_null($prestataire->copy_piece))
                                                <a href="{{ asset('FichierCopiepiece/'.$prestataire->copy_piece) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img src="{{ asset('assets/pdf.png') }}" target-="" 
                                                                title="Pièce d'identité, Cliquez pour télécharger" download="piece_identite_{{$prestataire->nom."_".$prestataire->prenom}}" alt="{{$prestataire->copy_piece}}" dow width="25">
                                                </a>
                                          
                                                @else
                                                    <a href="{{asset($prestataire->copy_piece)}}" download="piece_identite_{{$prestataire->nom."_".$prestataire->prenom}}" class="btn d-block bg-okay"> <span class="bx bx-download"> </span>  Pièce d'identité</a>
                                                @endif
                                            
                                        </div>
                                        @endif

                                        @if (!is_null($prestataire->copy_last_diplome))
                                        <div class="col-sm-12 mb-3 border">
                                            @if(!is_null($prestataire->copy_last_diplome))
                                                            <a href="{{ asset('FichierCopiepiece/'.$prestataire->copy_last_diplome) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img src="{{ asset('assets/pdf.png') }}" target-="" 
                                                                title="Dernier Diplôme, Cliquez pour télécharger" alt="{{$prestataire->copy_last_diplome}}" width="25">
                                                            </a>
                                            
                                                @else
                                                    <a href="{{asset($prestataire->copy_last_diplome)}}" download="derniere_diplome_{{$prestataire->nom."_".$prestataire->prenom}}" class="btn bg-okay d-block"><span class="bx bx-download"></span>Diplôme</a>
                                                @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Fermer</button>
                                    <a class="btn btn-primary" 
                                    href="{{ url('fiche/prestataire', $prestataire->id )}}" target="_blank"><i class="ri-download-2-line align-bottom me-1"></i>Télécharger
                                    </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endif

</div>
        <!-- container-fluid -->
</div>
    <!-- End Page-content -->
@endsection

@yield('js')