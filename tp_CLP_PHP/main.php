<?php
include ('Menu.php');

$menu = new Menu;
//$loja = new Loja;
$qtdClientes = 0;
while(1){
	global $menu, $qtdClientes;
	//global $loja;
	$opcao = $menu->menu_principal();
	//menu principal;
	switch ($opcao):
		case 1:
			$opcaoCliente = $menu->menu_Cliente();
		break;
		case 2:
			$opcaoProduto = $menu->menu_Produto();			
		break;
		
		case 3:
			$opcaoVenda = $menu->menu_Venda();
		break;
		default:
			echo "\nOpcao invalida\n";
		break;
	endswitch;
	
	if($opcao==1){
		switch ($opcaoCliente):
			case 1:
				$menu->criar_Cliente($qtdClientes);
			break;
			
			case 2:
				$menu->listar_Clientes();
							
			break;
			
			case 3:
				//$menu->remover_Cliente();
			default:
				echo "\nOpcao invalida\n";
			break;
		endswitch;
	}else if($opcao==2){
		switch ($opcaoProduto):
			case 1:
				$menu->criar_Produto();
			break;
			
			case 2:
				$menu->listar_Produto();		
			break;
			
			case 3:
				try{
					$menu->excluir_Produto();
				}catch(Exception $e){
					echo $e->getMessage();
				}
			break;
			case 4:
				try{
					$menu->alterar_Produto();
				}catch(Exception $e){
					echo $e->getMessage();
				}
			break;
			default:
				echo "\nOpcao invalida\n";
			break;
		endswitch;
	}else{
		switch ($opcaoVenda):
			case 1:
			break;
			
			// case 2:
							
			// break;
			
			// case 3:
				//$menu->remover_Cliente();
			default:
				echo "\nOpcao invalida\n";
			break;
		endswitch;
	}
	
}
?>