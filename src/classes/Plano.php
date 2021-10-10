<?php

    namespace App\Entity;
    
    use App\Entity\Beneficiario;

    class Plano {
        private int $vidas;
        private $beneficiarios = array();
        private string $registro; 
        private string $nome; 
        private int $codigo; 

        function __construct($registro, $nome, $codigo) {
            $this->registro = $registro;
            $this->nome = $nome;
            $this->codigo = $codigo;
        }

        function setVidas($vidas) {
            $this->vidas = $vidas;
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
                if ($this->codigo == $precosDecoded[$aux]["codigo"] && $this->vidas >= $precosDecoded[$aux]["minimo_vidas"]) {
                    $preco = $precosDecoded[$aux][$beneficario->getFaixa($beneficario->getIdade())];
                }
                
            }
            
            return $preco;
        }

        function printPrecoPorBeneficiario() {
            for($aux = 0; $aux < count($this->beneficiarios); $aux++) {
                echo "nome: ".$this->beneficiarios[$aux]->getNome()."\n";
                echo "idade: ".$this->beneficiarios[$aux]->getIdade()."\n";
                echo "preco: ".$this->getPrecoPorBeneficiario($this->beneficiarios[$aux])."\n";
                
            }
        }

        function getPrecoTotal() {
            (double) $precoTotal = 0; 
            for ($aux = 0; $aux < count($this->beneficiarios); $aux++) {
                $precoTotal += $this->getPrecoPorBeneficiario($this->beneficiarios[$aux]);
            }
            return $precoTotal;
        }
    }



   



    




?>