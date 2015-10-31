  <?php

  error_reporting(E_NONE);
ini_set("display_errors", 0);

class ComparisonList {
    public static function getNext($intID = "", $BestWorseScaling){
        $boolKill = false;
        if(empty($intID))
            $boolKill = true;
        foreach(Config::$factorObjects as $objComparisonData){
            if($boolKill){
                if($BestWorseScaling == null)
                    return $objComparisonData;
                if($BestWorseScaling->isNeedFull($objComparisonData))
                    return $objComparisonData;
                else
                    $intID = $offset;
            }
            if(isset($intID) && $intID === $offset)
                $boolKill = true;
        }
        return null;
    }
    public static function getArguments(){
        $arReturn = array();
        foreach(Config::$factorObjects as $objComparisonData){
            if(!in_array($objComparisonData->aAlt, $arReturn))
                $arReturn[] = $objComparisonData->aAlt;
            if(!in_array($objComparisonData->bAlt, $arReturn))
                $arReturn[] = $objComparisonData->bAlt;
			 if(!in_array($objComparisonData->cAlt, $arReturn))
                $arReturn[] = $objComparisonData->cAlt;
			  if(!in_array($objComparisonData->dAlt, $arReturn))
                $arReturn[] = $objComparisonData->dAlt;
        }
        return $arReturn;
    }
}