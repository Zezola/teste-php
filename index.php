<?php 



/* 
- "Plano" dito aqui signficia "Plano de Saúde".
- "Beneficiários" são as pessoas participantes/pagantes de um plano de saúde.


1. Você recebeu duas tabelas em JSON, uma de Planos e outra de Preços.
	- A tabela de plano possui os planos que serão vendidos.
	- A tabela de preço possui o(s) preço(s) para cada plano listado na tabela de planos.



2. Cada plano tem três faixas de preços, sendo estas categorizadas por idade:
	- Pessoas de 0 a 17 anos vão para a faixa1.
	- Pessoas de 18 a 40 anos vão para a faixa2.
	- Pessoas com mais de 40 anos vão para a faixa3.



3. Cada plano pode ter preços variados dependendo da quantidade de pessoas participando do mesmo.
	- Essa variação é representada na tabela de preços pela coluna "minimo_vidas".


------------------------
Com as especificações acima, faça um programa que permita a entrada dos seguintes dados:
	- Quantidade de beneficiários
	- Idade de cada beneficiário
	- Nome de cada beneficiário
	- Registro do plano escolhido (deve ser um dos registros listados na tabela de plano)
		-> Caso o usuário liste um registro inexistente, deve mostrar mensagem de erro.


Esse programa deve ler a tabela de Plano e a tabela de Preço, e retornar:
	- O preço total do Plano escolhido (soma do preço de cada beneficiário)
	- Preço de cada beneficiário para o plano escolhido, juntamente com a sua idade.
	
	Nota: o valor (preço) para cada beneficiário deve ser float, pois representa dinheiro.

    1 - Pegar as informações do usuário 

	*/
	
    
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
	
	// Pegando numero de vidas do plano
	$vidas = readline("Numero de vidas do plano: ");

	// Cadastrando beneficiarios com idade e nome e pegando seu preco baseado na idade
	for ($aux = 0; $aux < $vidas; $aux++) {
		$nome = readline("Nome do beneficario: ");
		$idade = readline("Idade do beneficiario: ");
		$beneficiario = new Beneficiario($nome, $idade);		
		$plano->cadastrarBeneficiario($beneficiario);

	}


	
	
	
	


	


