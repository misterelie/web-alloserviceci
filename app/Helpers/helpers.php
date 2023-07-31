<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class Helpers
{
    protected $array = [];
    /**
     * Helper Principal
     * Tous les autres helpers héroterons de cette classe
     * 
    */

    
    public static function formatFr($date)
    {
       return date("d-m-Y H:i:s", strtotime($date));
    }




    /**
     * Fonction magique pour inserer des retour  la ligne à un texte.
     *
     * @param string $text
     * @return mixed
     */
    public static function formatText($text)
    {
        return str_replace(["\n","\n\n", "\n\n\n"], "<br>", $text);
    }

    /**
     * Créer un retour à la ligne avec encode HTML
     *
     * @param string $longText
     * @return mixed
     */
    public static function encodeText(string $longText)
    {
        return str_replace("<br>", "\n", $longText);
    }


    /**
     * Fonction pour formater un Montant d'argent: 25000 => 25 000
     *
     * @param integer $money
     * @return void
     */
    public static function moneyFormat(int $money)
    {
    (int) $money = (int) $money;
        return isset($money)  ? number_format($money, 0, '', ' ') : 'indéfini';
    }

    public static function phone($phone)
    {
    (int) $phone = (int) $phone;
        return isset($phone)  ? number_format($phone, 0, '-', ' ') : 'indéfini';
    }


  

    /**
     * Fonction magique pour Uploader des fichier dans un répertoir
     *
     * @param HttpRequest $request
     * @param string $inputName
     * @param string $uploadDirectory
     * @return void
     */

    public static function upload(Request $request,  string $uploadDirectory = "images", $label = "photo")
    {
        $fileName = !is_null($label) ? self::filterstring($label."_".date('m-Y')."_").".".$request->photo->extension() : Str::random(6).'.'. $request->photo->extension();
        $request->photo->move($uploadDirectory, $fileName, 'public');
        return $fileName;
    }


    /**
     * Fonction magique pour Uploader des fichier dans un répertoir
     *
     * @param HttpRequest $request
     * @param string $uploadDirectory : Upload directory
     * @param string $label : Name of the data saved
     * @param string $inputName : HTML file input name
     * @return string : The new file saved name
     */
    public static function uploadFile(Request $request,  string $uploadDirectory = "images", $label = "image", $inputName)
    {
        $fileName = $label."_". Str::random(6).'.'. $request->file($inputName)->extension();
        $uploadedFileName = $request->file($inputName)->storeAs($uploadDirectory, $fileName, 'public');
        return $uploadedFileName;
    }



    /**
     * Remplacer les carctères spéciaux par des lettes simples
     *
     * @param [type] $text
     * @return string
     */
    public static  function replaceString($text)
    {
        $utf8 = array(
            // '/[:.;,!]/u' => '',
            '/[áàâãªä]/u' => 'a',
            '/[ÁÀÂÃÄ]/u' => 'A',
            '/[ÍÌÎÏ]/u' => 'I',
            '/[íìîï]/u' => 'i',
            '/[éèêëè]/u' => 'e',
            '/[ÉÈÊË]/u' => 'E',
            '/[óòôõºö]/u' => 'o',
            '/[ÓÒÔÕÖ]/u' => 'O',
            '/[úùûü]/u' => 'u',
            '/[ÚÙÛÜ]/u' => 'U',
            '/ç/' => 'c',
            '/Ç/' => 'C',
            '/ñ/' => 'n',
            '/Ñ/' => 'N',
            '/---/'=>'',
            '/----/'=>'',
            '/--/'=> ''
        );
        //
        //
        return preg_replace(array_keys($utf8), array_values($utf8), $text);
    }


    /**
     * Remplacer les espaces des séparateurs
     *
     * @param [type] $string
     * @return mixed
     */
    public static function filterstring($string)
    {
        return strtolower(self::replaceString(str_replace([' ','?', "  ",'#','+','x','*','.',"@",";",",","/", "'",":"],'-',str_replace(['--','---','----'],'-', $string))));
    }



    public static function wordwrap($string)
    {
        $exp = explode(" ", strtolower($string));
        $word = "";
        $word .= isset($exp[0]) ? trim($exp[0]). " " : "";
        $word .= isset($exp[1]) ? trim($exp[1]). " " : "";
        $word .= isset($exp[2]) ? trim($exp[2]). " " : "";
        $word .= isset($exp[3]) ? trim($exp[3]). " " : "";
        return trim($word);
    }


}
