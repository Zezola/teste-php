<?php 

namespace App\Entity;

class Beneficiario {
    private string $nome; 
    private int $idade;
    


    function __construct($nome, $idade) {
        $this->nome = $nome; 
        $this->idade = $idade;

    }

    function getFaixa($idade) {
        // Pegar a idade do participante 
        file_get_contents('planos.json');
        // Verificar em qual faixa ele fica
        return "30";
    }

    function getNome() {
        return $this->nome;
    }
}

