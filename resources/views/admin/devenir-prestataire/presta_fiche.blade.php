<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche prestataire</title>
</head>
<body>
    
  
    @if(!is_null($prestataire))
    <section>
  <!-- Modal detail-->
      <div class="modal fade zoomIn" id="detailModal_{{ $prestataire->id }}" tabindex="-1" aria-labelledby="detailModal{{ $prestataire->id }}Label" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                   <u> <h2 class="modal-title fs-5 text-uppercase text-primary" style="text-transform: uppercase; text-align:center">Fiche prestataire </h2></u>
                </div>
                  <div class="modal-body modalBody">
                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                            {{-- Personnelles --}}
                            <div class="bloc-item">
                                <u><h4 class="bloc-title fw-bolder">Informations personnelles :</h4></u>
                                
                                @if (!is_null($prestataire))
                                    <p>
                                    <table width="100%">
                                        <tbody width="100%">
                                            <tr width="100%">
                                                <td width="35%">
                                                    <span class="fs-16">Nom & Prénoms :</span>
                                                </td>
                                                <td class="fw-bolder" width="65%" class="data">
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
                                                    <td class="fw-bolder" width="65%" class="data">
                                                        <span class="fw-bolder fs-16">
                                                            {{ Str::ucfirst($prestataire->situation_matri) }}  
                                                            
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
                                                            <span class="fs-16">Nombre d'enfant :</span>
                                                        </td>
                                                        <td class="fw-bolder" width="65%" class="data">
                                                            <span class="fw-bolder fs-16">
                                                                {{ Str::ucfirst($prestataire->nbre_enfant) }}  
                                                                
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
                                                                Date de naissance :
                                                            </td>
                                                            <td width="65%" class="adhesion">
                                                                {{ $prestataire->date_naiss }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </p>

                                    @if (!is_null($prestataire->telephone1))
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                       <span class="fs-16"> Contact 1 :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        {{$prestataire->telephone1 }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    @endif

                                    @if (!is_null($prestataire->telephone2))
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                       <span class="fs-16"> Conatct 2 :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        {{Str::ucfirst($prestataire->telephone2) }}
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
                                                    Whatsapp :
                                                </td>
                                                <td width="65%" class="adhesion">
                                                        {{ Str::ucfirst($prestataire->whatsapp) }}
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
                                                        <span class="fs-16">Email :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fw-bolder">
                                                            {{ Str::ucfirst($prestataire->email) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    @endif

                                    @if (($prestataire->ethnie ))
                                            <p>
                                            <table width="100%">
                                                <tbody width="100%">
                                                    <tr width="100%">
                                                        <td width="35%">
                                                            Ethnie :
                                                        </td>
                                                        <td width="65%" class="">
                                                            {{ $prestataire->ethnie->ethnie }}
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
                                                            Commune de résidence :
                                                        </td>
                                                        <td width="65%" class="adhesion">
                                                            {{ Str::ucfirst($prestataire->commune->commune) }}
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
                                                            Quartier :
                                                        </td>
                                                        <td width="" class="adhesion">
                                                            {{ Str::ucfirst($prestataire->quartier) }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                       </p>
                                @endif
                            </div><br>


                            {{-- Pro --}}
                            <div class="bloc-item">
                               <u><h4 class="bloc-title fw-bolder">Informations Professionnelles :</h4></u>
                               
                               <p>
                                <table width="100%">
                                    <tbody width="100%">
                                        <tr width="100%">
                                            <td width="35%">
                                                Domaine(s) d'activité :
                                            </td>
                                            <td width="65%" class="adhesion">
                                                @if (!is_null($prestataire->prestation))
                                                {{ Str::ucfirst($prestataire->prestation->libelle) }}
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
                                                    Année(s) d'expérience :
                                                </td>
                                                <td width="65%" class="adhesion">
                                                    {{ $prestataire->annee_experience != 0 ? $prestataire->annee_experience . ' ans' : 0 }}
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
                                                        Prétention salariale :
                                                    </td>
                                                    <td width="65%" class="adhesion">
                                                        {{ $prestataire->pretention_salairiale . ' F CFA' }}
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
                                                            Zone d'intervention :
                                                        </td>
                                                        <td width="65%" class="adhesion">
                                                            {{ $prestataire->commune->commune }}
                                                            
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
                                                                Contact d'urgence :
                                                            </td>
                                                            <td width="65%" class="adhesion">
                                                                {{ $prestataire->contact_urgence }}
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
                                                                Référence :
                                                            </td>
                                                            <td width="65%" class="adhesion">
                                                                {{ $prestataire->reference }}
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
                                                                Contact référence :
                                                            </td>
                                                            <td width="65%" class="adhesion">
                                                                {{ $prestataire->contact_reference }}
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
                                                        Alphabétisation :
                                                    </td>
                                                    <td width="65%" class="adhesion">
                                                        {{ $prestataire->alphabet->alphabet }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    @endif

                                    @if (!is_null($prestataire->diplome))
                                            <p>
                                            <table width="100%">
                                                <tbody width="100%">
                                                    <tr width="100%">
                                                        <td width="35%">
                                                            Diplome :
                                                        </td>
                                                        <td width="65%" class="adhesion">
                                                            {{ $prestataire->diplome->diplome }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </p>
                                        @endif
                                
                            {{-- Autres --}}
                            <div class="mb-3 bloc-item">
                               <u> <h4 class="bloc-title">Autres Informations :</h4></u>

                                <p>
                                <table width="100%">
                                    <tbody width="100%">
                                        <tr width="100%">
                                            <td width="35%">
                                                Mode/Temps de travail :
                                            </td>
                                            <td width="65%" class="adhesion">
                                                {{ !is_null($prestataire->mode) ? $prestataire->mode->mode : '...' }}
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
                                                Disponibilité :
                                            </td>
                                            <td width="65%" class="adhesion">
                                                {{ !is_null($prestataire->dispo) ? $prestataire->dispo->dispo : '...' }}
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
                                                Pièce d'identité :
                                            </td>
                                            <td width="65%" class="adhesion">
                                                {{ !is_null($prestataire->piece) ? $prestataire->piece->piece : '...' }}
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
                                                Numéro de la pièce :
                                            </td>
                                            <td width="65%" class="adhesion">
                                                {{ $prestataire->numero_piece }}
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
                                                A connu <strong>Allô Service</strong> par :
                                            </td>
                                            <td width="65%" class="adhesion">
                                                {{ !is_null($prestataire->canal) ? $prestataire->canal->canal : '...' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </p><br>

                                <div class="mb-3 bloc-item">
                                    <h4 class="bloc-title">Observations sur le prestataire:</h4><br>
                                    @if (!is_null($prestataire->avis))
                                    {!! $prestataire->avis !!}
                                    @else
                                        <div class="alert alert-danger text-center">
                                            <span class="bx bx-info-circle"></span>&nbsp; Pas d'observations
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
  <!--end modal -->
       
</section>
    @endif

</body>
</html>