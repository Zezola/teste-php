<?php 
    
    namespace App\Controller;

    class PlanoController {

        // Pra construir um plano, precisamos do registro
        // 1 - Percorrer os planos e encontrar o/os plano/planos que tem o registro

        function getPlanosByRegistro ($reg) {            
            // Converter pra array
            $planos = file_get_contents("planos.json");
            $planosDecoded = json_decode($planos, true);
            
            for ($aux = 0; $aux < sizeof($planosDecoded); $aux++) {
                // Verificar o plano que atende o registro 
                if ($planosDecoded[$aux]["registro"] == $reg) {
                    // Pegar o codigo do plano quando encontrar
                    return $planosDecoded[$aux]["codigo"];
                }
                //echo $planosDecoded[$aux]["registro"];
            }
            
           // echo $planosDecoded[0]["registro"]; 
        }

        
    
    }




