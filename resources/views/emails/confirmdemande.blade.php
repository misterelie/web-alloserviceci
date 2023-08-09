{{-- Header --}}
@include('emails.layout.header')

<tr>
    <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
        <table>
            <tr>
                <td>
                    <div class="text" style="padding: 0 2.5em; text-align: center;">
                        <h2 style="text-align: center; text-transform: uppercase; font-size: 18px !important; font-weight: 700; color: #08ba08; margin-bottom: 15px;">Demande {{ $demandeprestation->etat === '1' ? 'acceptée' : 'refusée' }} </h2>

                        <div class="hr" style="width: 100%; height: 1px solid #029302; margin-bbom: 12px"></div>
                        <p style="text-align: justify; color: #222">
                            <strong>Bonjour cher  !  {{$demandeprestation->nom}} {{$demandeprestation->prenoms}}</strong> <br>
                        </p>
                        
                        <p style="text-align: justify; color: #222">
                            {{ $demandeprestation->motif_de_rejet }}
                        </p>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr><!-- end tr -->

<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
  <tr>
    <td class="bg_light" style="text-align: center; padding: 25px 45px; ">
        <p style="text-align: center !important; color: #474747">Merci de votre confiance. L'équipe : <a href="#" style="color: rgba(0,0,0,.8);"></a></p>
    </td>
  </tr>
</table>
