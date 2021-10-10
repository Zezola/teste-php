<?php 

namespace App\Entity;

class Beneficiario {
    private string $nome; 
    private int $idade;
    


    function __construct($nome, $idade) {
        $this->nome = $nome; 
        $this->idade = $idade;

    }

    function getIdade(){
        return $this->idade;
    }

    function getNome() {
        return $this->nome;
    }

   function getFaixa($idade) {
        if($idade < 17) {
            $faixa = "faixa1";
        } else if ($idade > 17 && $idade < 40) {
            $faixa = "faixa2";
        } else {
            $faixa = "faixa3";
        }

        return $faixa;
   }
    
}

