<?php

spl_autoload_register('PlanoAutoLoader');

    function PlanoAutoLoader($plano) {
        $path = "classes/";
        $extension = ".class.php";
        $fullPathName = $path . $plano . $extension;

        include_once $fullPathName;
    }
    
    function createBeneficiario($nome, $idade) {
        $beneficiario = new Beneficiario($nome, $idade);
        return $beneficiario;
    }
?>