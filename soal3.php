<?php 

    class Lampu{

        private $warna = ["merah", "kuning", "hijau"];
        private $panggilan = 0;

        function panggil(){
            $index = $this->panggilan % count($this->warna);
            $this->panggilan++;
            return $this->warna[$index];
        }
        
    }

    $lampuLalin = new Lampu();

    for ($i=0; $i < 11; $i++) { 
        echo $lampuLalin->panggil()."<br>";
    }


 ?>