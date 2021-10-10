<?php 
    
    namespace App\Controller;

    use App\Entity\Plano;

    class PlanoController {

        // Pra construir um plano, precisamos da quantidade de vidas, e do registro
        // 1 - Percorrer os planos e encontrar o/os plano/planos que tem o registro
        private $planos = array();

        

        function getPlanosByRegistro ($reg) {            
            // Converter pra array
            $planosJson = file_get_contents("planos.json");
            $planosDecoded = json_decode($planosJson, true);
            
            for ($aux = 0; $aux < sizeof($planosDecoded); $aux++) {
                // Verificar o plano que atende o registro 
                if ($planosDecoded[$aux]["registro"] == $reg) {
                    // Pegar o codigo do plano quando encontrar
                    
                    $plano = new Plano(4, $planosDecoded[$aux]["registro"], $planosDecoded[$aux]["nome"]
                    , $planosDecoded[$aux]["codigo"]);
                    
                    // Adicionar a lista os planos que batem com o meu registro
                    array_push($this->planos, $plano);
                   
                }
            
                
                //echo $planosDecoded[$aux]["registro"];
                
            }

            for ($aux = 0; $aux < sizeof($this->planos); $aux++) {
                echo $this->planos[$aux]->getNome();
            }

            
            
           // echo $planosDecoded[0]["registro"]; 
        }

        


    
    }




