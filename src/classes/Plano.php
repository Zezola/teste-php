<?php

    namespace App\Entity;

    class Plano {
        private int $quantidadeDeBeneficiarios;
        private $beneficiarios = array();
        private string $registro; 
        private string $nome; 
        private int $codigo; 

        function __construct( $quantidadeDeBeneficiarios, $registro, $nome, $codigo) {
            $this->quantidadeDeBeneficiarios = $quantidadeDeBeneficiarios;
            $this->registro = $registro;
            $this->nome = $nome;
            $this->codigo = $codigo;
        }

        function getNome(){
            return $this->nome;
        }
    }

    




?>