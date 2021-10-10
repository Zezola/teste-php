<?php

    namespace App\Entity;
    
    use App\Entity\Beneficiario;

    class Plano {
        private int $quantidadeDeBeneficiarios;
        private $beneficiarios = array();
        private string $registro; 
        private string $nome; 
        private int $codigo; 

        function __construct(  $registro, $nome, $codigo) {
            
            $this->registro = $registro;
            $this->nome = $nome;
            $this->codigo = $codigo;
        }

        function getNome(){
            return $this->nome;
        }

        function cadastrarBeneficiario($beneficario) {
            array_push($this->beneficiarios, $beneficario);
            
        }
    }

    




?>