<?php 

    function getSecondGreatest($array=[]){
        $arUnique = array_unique($array);
        $tempArray = array_values($arUnique);
        $arUnique = $tempArray;

        foreach ($arUnique as $value) {
            for ($i=0; $i < count($arUnique)-1 ; $i++) { 
                if($arUnique[$i] > $arUnique[$i+1]){
                    $temp =  $arUnique[$i+1];
                    $arUnique[$i+1] = $arUnique[$i];
                    $arUnique[$i] = $temp;
                }
            }
        }
        return $arUnique[count($arUnique)-2];
        // echo "<pre>";print_r($arUnique);"</pre>";die();

    }

    
    $array = [10,10,10,4,2,8,5,7];
    echo "<pre>";print_r($array);"</pre>";
    echo "second greatest is : ".getSecondGreatest($array);


 ?>