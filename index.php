<?php 

    
	require __DIR__.'/vendor/autoload.php';

	// Importando as classes
	require_once "./src/classes/Beneficiario.php";
	use App\Entity\Beneficiario;

	require_once "./src/classes/Plano.php";
	use App\Entity\Plano;

	// Importando os controllers
	require_once "./src/controllers/PlanoController.php";
	use App\Controller\PlanoController;

	
	
	
	
	// Instanciando um plano atraves do controller
	$planoController = new PlanoController();
	$reg = readline("Registro do plano: ");
	$plano = $planoController->getPlanosByRegistro($reg);

	if ($plano != NULL) {
		// Pegando numero de vidas do plano
		$vidas = readline("Numero de vidas do plano: ");

		$plano->setVidas($vidas);

		// Cadastrando beneficiarios com idade e nome e pegando seu preco baseado na idade
		
		for ($aux = 0; $aux < $vidas; $aux++) {
			$nome = readline("Nome do beneficario: ");
			$idade = readline("Idade do beneficiario: ");
			$beneficiario = new Beneficiario($nome, $idade);		
			$plano->cadastrarBeneficiario($beneficiario);
			

		}

		// Mostrar o preço por beneficiario
		$plano->printPrecoPorBeneficiario();
		
		// Mostrar o preco total
		echo "Preco total do plano: " .$plano->getPrecoTotal()."\n";

	} else {
		echo "Registro de plano inexistente" ."\n";
	}
	
	


	
	
	
	


	


