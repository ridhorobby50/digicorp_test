<?php 


    function getRepeatLetter($string){
        $split = str_split($string);

        $listLetter = [];
        for ($i=0; $i < count($split)-1 ; $i++) {

            $tempExistIndex = false;
            if(isset($listLetter[$split[$i]])){
                $tempExistIndex = $listLetter[$split[$i]];
            }
            $listLetter[$split[$i]] = 1;
            for ($j=$i+1; $j < count($split) ; $j++) { 
                if($split[$i] == $split[$j]){
                    $listLetter[$split[$i]] ++;
                    $i++;
                }else{
                    break;
                }
            }

            if($tempExistIndex && $tempExistIndex > $listLetter[$split[$i]]){
                $listLetter[$split[$i]] = $tempExistIndex;
            }

            
        }

        $maxValue = max($listLetter);
        $findIndex = array_keys($listLetter, $maxValue);

        $res = $string." result : <br>";
        foreach ($findIndex as $value) {
            $res .= $value." repeat ".$maxValue."x <br>";
        }

        return $res;

    }


   
    echo getRepeatLetter("wellcome")."<br>";
    echo getRepeatLetter("strawberry")."<br>";
    echo getRepeatLetter("strrawbeery")."<br>";
?>