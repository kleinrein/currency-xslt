<?php
if($_POST['verdi']){
    
    $value = $_POST["verdi"];
    
    $valuePart = explode(";", $value);
    $value = $valuePart[0];
    $currency = $valuePart[1];
    
    $currencyPart = explode(" ", $currency);
    $currency = $currencyPart[0];
    
    $xmlSimple = simplexml_load_file("https://www.dnb.no/portalfront/datafiles/miscellaneous/csv/kursliste_ws.xml");
    
    $nodes = $xmlSimple->xpath("//valutakurs/kode[.='$currency']/parent::*");
    $result = $nodes[0];
    
    $buyCurrency = $result->overforsel->kjop;
    $enhet = $result->enhet;
    
    function calculate($a, $b, $op) { 
        // Change commas to periods 
        $a = str_replace(',', '.', $a); 
        $b = str_replace(',', '.', $b); 
        // Determine which arithmetic operation to use
        switch ($op) { 
        case '+': $ret = $a + $b; break; 
        case '-': $ret = $a - $b; break; 
        case '*': $ret = $a * $b; break; 
        case '/': $ret = $a / $b; break; 
        case '%': $ret = fmod($a, $b); break; 
        default: return false; 
        } 
        return str_replace('.', ',', $ret); 
    } 
    

    if($enhet == 1){
        $finalValue = calculate($value, $buyCurrency, "*");
        
        $lastValueAfterComma = explode(',', $finalValue);
        echo end($tokens);
        
        if(end($lastValueAfterComma) == null && end($lastValueAfterComma) == ''){ 
            echo(round($finalValue));
        }else{
            $finalValue = str_replace(",",".",$finalValue);
            echo round($finalValue, 2);
        }
    }else{
        echo $value * $buyCurrency / 100;
    }
    echo " NOK";
}