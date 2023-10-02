<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche de demande de prestation</title>
</head>
<body>
    
  
    @if(!is_null($demandeprestation))
    <section>
  <!-- Modal detail-->
      <div class="modal fade zoomIn" id="detailModal_{{ $demandeprestation->id }}" tabindex="-1" aria-labelledby="detailModal{{ $demandeprestation->id }}Label" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                   <u> <h2 class="modal-title fs-5 text-uppercase text-primary" style="text-transform: uppercase; text-align:center">Fiche de demande de Prestation </h2></u>
                </div>
                  <div class="modal-body modalBody">
                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                            {{-- Personnelles --}}
                            <div class="bloc-item">
                                <h4 class="bloc-title fw-bolder">Informations sur le client :
                                
                                @if (!is_null($demandeprestation))
                                    <p>
                                    <table width="100%">
                                        <tbody width="100%">
                                            <tr width="100%">
                                                <td width="35%">
                                                    <span class="fs-16">Nom & Prénoms :</span>
                                                </td>
                                                <td class="fw-bolder" width="65%" class="data">
                                                    <span class="fw-bolder fs-16">
                                                        {{ Str::ucfirst($demandeprestation->nom) }}  
                                                        {{ Str::ucfirst($demandeprestation->prenoms) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </p>

                                    @if (!is_null($demandeprestation->telephone))
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                       <span class="fs-16"> Téléphone :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        {{ Str::ucfirst($demandeprestation->telephone) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    @endif

                                    @if (!is_null($demandeprestation->email))
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-16">Email :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fw-bolder">
                                                            {{ Str::ucfirst($demandeprestation->email) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    @endif
                                @endif
                            </div><br>


                            {{-- Pro --}}
                            <div class="bloc-item">
                               <h4 class="bloc-title fw-bolder">Informations Professionnelles :</h4>
                                <p>
                                <table width="100%">
                                    <tbody width="100%">
                                        <tr width="100%">
                                            <td width="35%">
                                                <span class="fs-16">Prestation demandée :</span>
                                            </td>
                                            <td width="65%" class="data">
                                                @if (isset($demandeprestation->prestation))
                                                    <span class="fw-bolder fs-16">{{ Str::ucfirst($demandeprestation->prestation->libelle) }}</span>
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
                                                   <span class="fs-16"> Mode de prestation :</span>
                                                </td>
                                                <td width="65%" class="data">
                                                    @if (isset($demandeprestation->mode))
                                                    <span class="fw-bolder fs-16">{{ Str::ucfirst($demandeprestation->mode->mode) }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </p>

                                @if (isset($demandeprestation->ethnie))
                                    <p>
                                    <table width="100%">
                                        <tbody width="100%">
                                            <tr width="100%">
                                                <td width="35%">
                                                   <span class="fs-16"> Ethnie demandée :</span>
                                                </td>
                                                <td width="65%" class="data">
                                                   <span class="fw-bolder fs-16"> {{ Str::ucfirst($demandeprestation->ethnie->ethnie) }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </p>
                                @endif

                                @if (isset($demandeprestation->age_demande))
                                    <p>
                                    <table width="100%">
                                        <tbody width="100%">
                                            <tr width="100%">
                                                <td width="35%">
                                                   <span class="fs-16"> Âge demandé :</span>
                                                </td>
                                                <td width="65%" class="data">
                                                    <span class="fw-bolder fs-16">{{ Str::ucfirst($demandeprestation->age_demande) }} ans</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </p>
                                @endif

                                @if (isset($demandeprestation->salaire_propose))
                                <p>
                                <table width="100%">
                                    <tbody width="100%">
                                        <tr width="100%">
                                            <td width="35%">
                                               <span class="fs-16"> Proposition salariale :</span>
                                            </td>
                                            <td width="65%" class="data">
                                            <span class="fw-bolder fs-16">
                                                {{ ($demandeprestation->salaire_propose) . ' F CFA' }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </p>
                                @endif
                            </div>

                            {{-- Autres --}}
                            <div class="mb-3 bloc-item">
                                <h4 class="bloc-title fw-bolder">Autres Informations :
                                </u>
                                <p>
                                <table width="100%">
                                    <tbody width="100%">
                                        <tr width="100%">
                                            <td width="35%">
                                                <span class="fs-16">Date de la prestation :</span>
                                            </td>
                                            <td width="65%" class="data">
                                                <span class="fw-bolder fs-16">
                                                    {{ !is_null($demandeprestation->date_demande) ? $demandeprestation->date_demande : '(non précisée)' }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </p>

                                @if (!is_null($demandeprestation->created_at))
                                <p>
                                <table width="100%">
                                    <tbody width="100%">
                                        <tr width="100%">
                                            <td width="35%">
                                                <span class="fs-20">enrégistrée Le:</span>
                                            </td>
                                            <td width="65%" class="data">
                                            <span class="fs-20 fw-bolder"> 
                                                {{ date('d.m.Y H:i:s', strtotime($demandeprestation->created_at ))}}
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
                                                <span class="fs-16">Heure de prestation :</span>
                                            </td>
                                            <td width="65%" class="data">
                                               <span class="fw-bolder fs-16"> {{ $demandeprestation->heure_demande }}</span>
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
                                                    <span class="fs-16">Observation :</span>
                                                </td>
                                                <td width="65%" class="data">
                                                   <span class="fw-bolder fs-16">
                                                    {!! $demandeprestation->observation !!}
                                                   </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </p>
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