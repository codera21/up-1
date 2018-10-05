<?php  namespace App\Libs;
use Config;
use Carbon;

class Helper
{
    

    /**
     * Clean String
     * 
     * @param string $string
     * @param integer $limit
     * @param boolean $removeSpecialChars
     * @param boolean $removeApostrophe
     * @return string
     */
    public static function cleanString($string, $limit = 46, $removeSpecialChars = FALSE, $removeApostrophe = FALSE)
    { 
       if ($removeSpecialChars == TRUE) {
            if ($removeApostrophe == TRUE) {
                $string = str_replace("'", ' ', $string); // Replaces apostrophe with space
            }
            $string = preg_replace('/[^\da-z -.]/i', '', $string); // Removes special chars.
            $string = substr($string,0,$limit);
       } else {
            if ($removeApostrophe == TRUE) {
                $string = str_replace("'", ' ', $string); // Replaces apostrophe with space.
            }
            $string = substr($string,0,$limit);
       }
       $string = preg_replace('/(\s)+/', ' ', $string);
       return trim($string);
    }
    
    
    /**
     * Verifes and returns Upper deposit limit in account
     * 
     * @param object $user
     * @return integer
     */
    public static function getCustomerUpperLimit($user) {
        $verificationTier = $user->parent->verification_tier;
        $upperLimit = 25;
        switch ($verificationTier) {
            case 1:
                $upperLimit = 25;
                break;
            case 2:
                $upperLimit = 500;
                break;
            case 3:
                $upperLimit = 1000;
                break;
            case 4:
                $upperLimit = 2500;
                break;
            default:
                $upperLimit = 25;
        }
        return $upperLimit;
    }
    
    /*
    |--------------------------------------------------------------------------
    | Text / String / Number Functions
    |--------------------------------------------------------------------------
    */
    public static function sDesc($description,$length=250,$continue=" ....")
    {
            $description=strip_tags(stripslashes($description));
            if(strlen($description)>$length)
            {
                    $description=substr($description,0,$length);
                    $description=substr($description,0,strrpos($description," ")).$continue;
            }
            return $description;
            //return nl2br($description);

    }
    public static function getString($string)
    {
            return htmlentities($string);
    }
    public static function numberFormat($number,$decimal=2)
    {
            return number_format($number, $decimal, '.', ',');
    }
    public static function decimalFormat($number,$decimal=2)
    {	
            return number_format($number, $decimal, '.', ',');
    }
    public static function floatFormat($number,$decimal=2)
    {
            $number=str_replace(",","",$number);
            return number_format($number, $decimal, '.', '');
    }
    public static function moneyFormat($number, $decimal=2, $fractional=true) {
        $number=str_replace(",","",$number);
        if ($fractional) {
                $number = sprintf('%.'.$decimal.'f', $number);
        }
        while (true) {
                $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                if ($replaced != $number) {
                        $number = $replaced;
                } else {
                        break;
                }
        }
        return $number;
    } 
    public static function textFormat($text,$html=true,$link=false)
    {


        if($html==false)
        {
            $text=strip_tags(stripslashes($text));
        }

        if($link==true)
        {
            $text=preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank">$1</a>', $text);
        }

        $text=  nl2br($text);

        return $text;

    }
    public static function makeClickableLinks($s) {
        return preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank">$1</a>', $s);
    }
    
    /**
     * Convert unicode characters to utf-8
     * 
     * @param type $string
     * @return type
     */
    public static function convertUnicodeToUtf8Chars($string)
    {

        if (!isset($string) or empty($string) or is_numeric($string))
        {
           return $string; 
        }
        return mb_convert_encoding($string, 'UTF-8', 'HTML-ENTITIES');
    }

    /**
     * Get filename
     * 
     * @param string $url
     * @return string
     */
    public static function getFileName($url){
        $path = parse_url($url, PHP_URL_PATH);
        $fileName = pathinfo ($path ,PATHINFO_BASENAME);
        return $fileName;
    }

    /**
     * Get relative path
     * 
     * @param string $url
     * @return string
     */
    public static function getRelativePath($url){
        return $path = parse_url($url, PHP_URL_PATH);
    }

    /**
     * Get base url
     *
     * @param string $url
     * @return string
     */
    public static function getBaseUrl($url){
        $result = parse_url($url);
        if(isset($result['host'])){
            return $result['scheme']."://".$result['host'];
        }

    }

    /**
     * Generate PDF using html
     * 
     * @param string $html
     * @param string $filePath
     */
    public static function generatePdf($html, $filePath)
    {
        
        // Create new PDF document
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor(config('settings.site_name'));
        $pdf->SetTitle(config('settings.site_name').' Document');
        $pdf->SetSubject('');
        $pdf->SetKeywords(config('settings.website'));

        // Remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $container_value = null;
        // Set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 7, PDF_MARGIN_RIGHT);


        // Set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // Set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Add a page
        //$pdf->AddPage();
        $pdf->AddPage('P', 'US Letter');

        $pdf->writeHTML($html, true, false, true, false, '');

        //Save PDF document
        $pdf->Output($filePath, 'F');

    }
}
