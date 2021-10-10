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

        function getPrecoPorBeneficiario(Beneficiario $beneficario) {
            $precosJson = file_get_contents("precos.json");
            $precosDecoded = json_decode($precosJson, true);
    
            // Procurando o codigo do plano
            for ($aux = 0; $aux < count($precosDecoded); $aux++) {
                if ($this->codigo == $precosDecoded[$aux]["codigo"]) {
                    $preco = $precosDecoded[$aux][$beneficario->getFaixa($beneficario->getIdade())];
                }
                
            }
            
            return $preco;
        }

        function printPrecoPorBeneficiario() {
            for($aux = 0; $aux < count($this->beneficiarios); $aux++) {
                echo $this->getPrecoPorBeneficiario($this->beneficiarios[$aux]);
                echo "\n";
            }
        }
    }



   



    




?>