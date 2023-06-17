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
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i></i>Les prestataires</button>
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
                                        <thead class="table-light">
                                            <tr>
                                                <th>N°</th>
                                                <th class="sort" data-sort="photo">Photos</th>
                                                <th class="sort" data-sort="customer_name">Noms</th>
                                                <th class="sort" data-sort="email">Prénoms</th>
                                                <th class="sort" data-sort="nbre_enfant">Nombre enfants</th>
                                                <th class="sort" data-sort="telephone">Téléphone 1  </th>
                                                <th class="sort" data-sort="modes">Modes de travail</th>
                                                <th class="sort" data-sort="copy_piece">Copies pièces</th>
                                                <th class="sort" data-sort="copy_last_diplome">Derniers diplômes</th>
                                                <th  class="sort" data-sort="action" style="max-width: 260px !important">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if(!is_null( $prestataires ))
                                            @foreach( $prestataires as $prestataire )
                                            <tr>
                                                <th scope="row">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="photo"><img src="/PrestatairePhoto/{{ $prestataire->photo }}"
                                                    class="img-fluid rounded-circle" width="45px">
                                                </td>
                                                <td class="customer_name">{{ $prestataire->nom }}</td>
                                                <td class="email">{{ $prestataire->prenoms }}</td>
                                                <td class="nbre_enfant">{{ $prestataire->nbre_enfant }}</td>
                                                <td class="telephone1">{{ $prestataire->telephone1 }}</td>
                                                <td class="telephone2">{{ $prestataire->mode->mode }}</td>
                                                <td class="copy_piece">
                                                    @if(!is_null($prestataire->copy_piece))
                                                            <a href="{{ asset('FichierCopiepiece/'.$prestataire->copy_piece) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img src="{{ asset('assets/pdf.png') }}" target-="" 
                                                                title="Cliquez pour télécharger" alt="{{$prestataire->copy_piece}}" width="25">
                                                            </a>
                                                    @endif
                                                </td>

                                                <td class="copy_last_diplome">
                                                    @if(!is_null($prestataire->copy_last_diplome))
                                                            <a href="{{ asset('FichierCopiepiece/'.$prestataire->copy_last_diplome) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img src="{{ asset('assets/pdf.png') }}" target-="" 
                                                                title="Cliquez pour télécharger" alt="{{$prestataire->copy_last_diplome}}" width="25">
                                                            </a>
                                                    @endif
                                                </td>
                                              
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editModal_{{$prestataire->id}}">Modifier</button>
                                                        </div>

                                                        <div class="detail">
                                                            <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="#detailModal_{{ $prestataire->id }}">Détails</button>
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
                                            <option value="">-- Sélectionnez une option ---</option>
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
                                            <option value="">-- Sélectionnez une option ---</option>
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

                                {{-- <div class="col-lg-4">
                                    <div>
                                        <label for="numero_piece" class="form-label">Copie de la pièce
                                           <small class="text-primary">[Image/PDF/WORD]</small> : </label>
                                        <input type="file" id="contact_email-field" name="copy_piece" class="form-control"/>
                                        
                                    </div>
                                </div> --}}

                                {{-- <div class="col-lg-4">
                                    <div>
                                        <label for="numero_piece" class="form-label">Copie dernier diplôme
                                           <small class="text-primary">[Image/PDF/WORD]</small> : </label>
                                        <input type="file" id="contact_email-field" name="copy_last_diplome" class="form-control"/>
                                        
                                    </div>
                                </div> --}}

                                    
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


            <!-- Modal suppression prestation-->
            {{-- @if(!is_null( $prestataires ))
            @foreach( $prestataires as $prestataire )
                <div class="modal fade zoomIn" id="deleteModal_{{$prestataire->id}}" tabindex="-1" aria-hidden="true">
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
                                        <p class="text-muted mx-4 mb-0">Êtes-vous sûr de vouloir supprimer cet enregistrement ? </p>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn w-sm btn-danger" id="delete-record">Oui, supprimez-le !</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif --}}
            <!--end modal -->


            @if(!is_null( $prestataires ))
            @foreach( $prestataires as $prestataire )
          <!-- Modal detail-->
              <div class="modal fade zoomIn" id="detailModal_{{ $prestataire->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" 
                              aria-label="Close" id="btn-close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="">
                                <h5 class="text-center" style="font-weight: bold"> VOIR TOUTES LES INFORMATIONS DU PRESTATAIRE</h5>
                                  <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                      <p class="">Nom: {{ $prestataire->nom }}</p>
                                      <p class="">Prénoms: {{ $prestataire->prenoms }}</p>
                                      <p>Téléphone1: {{ $prestataire->telephone1 }}</p>
                                      <p>Email: {{ $prestataire->email }}</p>
                                      <p>Mode travail: {{  $prestataire->mode->mode }}</p>
                                      <p>Civilité: {{  $prestataire->civilite }}</p>
                                      <p>Date naissance: {{  $prestataire->date_naiss }}</p>
                                      <p>Situation matrimoniale: {{  $prestataire->situation_matri }}</p>
                                      <p>Téléphone1: {{  $prestataire->telephone1 }}</p>
                                      <p>Téléphone2: {{  $prestataire->telephone2 }}</p>
                                      <p>whatsapp: {{  $prestataire->whatsapp }}</p>
                                      <p>Ethnie: {{  $prestataire->ethnie->ethnie  ?? '' }}</p>
                                      <p>Commune: {{  $prestataire->commune->commune  ?? ''}}</p>
                                      <p>Quartier: {{  $prestataire->quartier }}</p>
                                      <p>Domaine: {{  $prestataire->prestation->libelle ?? '' }}</p>
                                      <p>Année expérience: {{ $prestataire->annee_experience }} ans</p>
                                      <p>Salaire: {{  $prestataire->pretention_salairiale }}</p>
                                      <p>Zone: {{ $prestataire->commune->commune  ?? '' }}</p>
                                      <p>Cas urgence: {{  $prestataire->contact_urgence }}</p>
                                      <p>Référence: {{  $prestataire->reference }}</p>
                                      <p>Contact: {{  $prestataire->contact_reference }}</p>
                                      <p>Alphabétisation: {{ $prestataire->alphabet->alphabet  ?? '' }}</p>
                                      <p>Diplome: {{  $prestataire->diplome->diplome  ?? '' }}</p>
                                      <p>Disponibilité: {{  $prestataire->dispo->dispo ?? ''}}</p>
                                      <p>Pièce: {{  $prestataire->piece->piece }}</p>
                                      <p>Numéro pièce: {{  $prestataire->numero_piece }}</p>
                                      <p>Canal: {{  $prestataire->canal->canal }}</p>
                                      <p>Catalogue: {{  $prestataire->catalogue_realisa }}</p>
                                      <p>Avis: <br> {{  $prestataire->avis }}</p>
                                      
                                  </div>
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

@yield('js')