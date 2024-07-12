<?php 

    class Siswa{

        private $nrp;
        private $nama;
        private $daftarNilai;

        public function __construct($nrp, $nama){
            $this->nrp = $nrp;
            $this->nama = $nama;
        }

        public function storeNilai($mapel, $nilai){
            $nilai = new Nilai($mapel, $nilai);
            $this->daftarNilai = 
            [
                "nrp"   => $this->nrp,
                "nama"   => $this->nama,
                "daftar_nilai" => $nilai->getNilai()
            ];
        }

        public function getdaftarNilai(){
            return $this->daftarNilai;
        }
    }

    class Nilai{

        private $mapel;
        private $nilai;

        public function __construct($mapel, $nilai){
            $this->mapel = $mapel;
            $this->nilai = $nilai;
        }

        public function getNilai(){
            return [
                "mapel" => $this->mapel,
                "nilai" => $this->nilai,
            ];
        }
    }


    function _generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    $siswa = new Siswa("123", "Edo");
    $newSiswa = $siswa->storeNilai("Inggris",100);
    $getNilaiSiswa = $siswa->getdaftarNilai();
    echo "<pre>";print_r($getNilaiSiswa);"</pre>";

    $list_siswa = [];
    $list_mapel = ["inggris", "indonesia", "jepang"];
    for ($i=0; $i < 10 ; $i++) { 
        $nama = _generateRandomString();
        $nrp = $nama."-"._generateRandomString();
        $nilai = rand(0,100);
        $mapel = $list_mapel[array_rand($list_mapel)];

        $siswa = new Siswa($nrp, $nama);
        $storeNilai = $siswa->storeNilai($mapel,$nilai);

        $list_siswa[] = $siswa->getdaftarNilai();
    }

    echo "<pre>";print_r($list_siswa);"</pre>";

 ?>