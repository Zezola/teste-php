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

   
}

