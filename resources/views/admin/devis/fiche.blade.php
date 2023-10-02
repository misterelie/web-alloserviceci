<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche prestataire</title>
</head>
<body>
    
@if(!is_null($devi))
<section>
        <!-- Modal -->
        <div class="modal fade" id="detailModal_{{ $devi->id }}" tabindex="-1"
            aria-labelledby="detailModal{{ $devi->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <u> <h2 class="modal-title fs-5 text-uppercase text-primary" style="text-transform: uppercase; text-align:center">Fiche de demande devis: {{ $devi->code}} </h2></u>
                     </div>

                    <div class="modal-body modalBody ">
                        <div class="row">
                            <div class="col-lg-9 col-md-9">
                                {{-- Personnelles --}}
                                <div class="mb-3 bloc-item">
                                    <u>
                                        <h4 class="bloc-title fw-bolder text-uppercase">
                                       INFORMATIONS CLIENT :
                                        </h4>
                                    </u>
                                    <table width="100%">
                                        <tbody width="100%">
                                            <tr width="100%">
                                                <td width="35%">
                                                <span class="fs-20"> Nom & Prénoms :</span>
                                                </td>
                                                <td width="65%" class="data">
                                                    <span class="fw-bolder fs-20">
                                                        {{ Str::ucfirst($devi->nom) }}  
                                                        {{ Str::ucfirst($devi->prenoms) }}
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
                                                        <span class="fs-20">Téléphone: 
                                                        </span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                    <span class="fw-bolder fs-20"> {{ Str::ucfirst($devi->telephone) }}</span>
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
                                                        <span class="fs-20">Email:</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fw-bolder fs-20">{{ Str::ucfirst($devi->email) }}</span>
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
                                                <span class="fs-20">Ville & Commune:</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                    <span class="fw-bolder fs-20">
                                   {{$devi->ville->libelle }} - {{$devi->commune->commune}}
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
                                                        <span class="fs-20">Quartier:</span>
                                                     </td>
                                                    <td width="65%" class="data">
                                                        <span class="fw-bolder fs-20">
                                                        {{$devi->quartier}}
                                                                                                                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </p>

                                    @if (!is_null($devi->house_id))
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-20">
                                                            Type de maison :
                                                        </span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                    <span class="fw-bolder fs-20">
                                                        {{$devi->house->libelle}}
                                                    </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    @endif 

                                    @if (!is_null($devi->nbre_piece))
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                    <span class="fs-20">
                                                        Nombre de pièces :
                                                    </span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                    <span class="fw-bolder fs-20">
                                                            {{$devi->nbre_piece}}
                                                    </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    @endif

                                    @if (!is_null($devi->surface_piece_id))
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                    <span class="fs-20">Superficie :</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                        <span class="fw-bolder fs-20">
                                            {{$devi->surface->libelle_surface_piece}}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    @endif

                                @if (!is_null($devi->situation_live_id))
                                    <p>
                                    <table width="100%">
                                        <tbody width="100%">
                                            <tr width="100%">
                                                <td width="35%">
                                                <span class="fs-20">Vit :</span>
                                                </td>
                                                <td width="65%" class="data">
                                                 <span class="fw-bolder fs-20">
                                                    {{$devi->situation->libelle}}
                                                </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </p>
                                @endif

                        @if (!is_null($devi->departement_id))
                                <p>
                                <table width="100%">
                                    <tbody width="100%">
                                        <tr width="100%">
                                            <td width="35%">
                                            <span class="fs-20">Prestation :</span>
                                            </td>
                                            <td width="65%" class="data">
                                             <span class="fw-bolder fs-20">
                                                {{$devi->departement->libelle}}
                                            </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </p>
                            @endif

                            @if (!is_null($devi->mode_departement_id))
                            <p>
                            <table width="100%">
                                <tbody width="100%">
                                    <tr width="100%">
                                        <td width="35%">
                                        <span class="fs-20">Mode :</span>
                                        </td>
                                        <td width="65%" class="data">
                                         <span class="fw-bolder fs-20">
                                            {{ $devi->modedepartement->libelle }}
                                        </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                        @endif

                                   @if (!is_null($devi->created_at))
                                        <p>
                                        <table width="100%">
                                            <tbody width="100%">
                                                <tr width="100%">
                                                    <td width="35%">
                                                        <span class="fs-20">enrégistrée Le:</span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                    <span class="fs-20 fw-bolder"> 
                                                        {{ date('d.m.Y H:i:s', strtotime($devi->created_at ))}}
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
                                                <span class="fs-20">
                                                    Date d'exécution:
                                                </span>
                                                </td>
                                                <td width="65%" class="data">
                                                    <span class="fs-20 fw-bolder">
                                                {{ Str::ucfirst($devi->date_execution) }}
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
                                                    <span class="fs-20">
                                                       Heure d'exécution:
                                                    </span>
                                                    </td>
                                                    <td width="65%" class="data">
                                                    <span class="fs-20 fw-bolder">
                                                        {{ Str::ucfirst($devi->heure_execution) }}
                                                    </span>
                                                    
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </p>

                                <div class="mb-3 bloc-item">
                                    <h4 class="bloc-title fs-20">Détails:</h4>
                                    <span class="fs-17">
                                        @if (!is_null($devi->description_devis))
                                        {!! $devi->description_devis !!}
                                        @else
                                            <div class="alert alert-danger text-center">
                                                <span class="bx bx-info-circle"></span>&nbsp; Pas d'observations
                                            </div>
                                        @endif
                                    </span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </section>
@endif
</body>
</html>