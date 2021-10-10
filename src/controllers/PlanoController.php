<?php 
    
    namespace App\Controller;

    use App\Entity\Plano;

    class PlanoController {

        // Pra construir um plano, precisamos da quantidade de vidas, e do registro
        // 1 - Percorrer os planos e encontrar o/os plano/planos que tem o registro
           
        private $plano;
        

        function getPlanosByRegistro ($reg) {            
            // Converter pra array
            $planosJson = file_get_contents("planos.json");
            $planosDecoded = json_decode($planosJson, true);
            
            for ($aux = 0; $aux < count($planosDecoded); $aux++) {
                // Verificar o plano que atende o registro 
                if ($planosDecoded[$aux]["registro"] == $reg) {
                    // Pegar o codigo do plano quando encontrar
                    
                    $plano = new Plano( $planosDecoded[$aux]["registro"], $planosDecoded[$aux]["nome"]
                    , $planosDecoded[$aux]["codigo"]);
                    
                    // Adicionar a lista os planos que batem com o meu registro
                    return $plano;
                   
                }           
                
                
            }                   
            
        }


        

        

        

        

        





        

        


    
    }




