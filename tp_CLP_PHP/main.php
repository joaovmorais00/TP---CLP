<?php
include ('Menu.php');

$menu = new Menu;
//$loja = new Loja;

while(1){
	global $menu;
	//global $loja;
	
	//menu principal;
	$opcao = $menu->menu_principal();	
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
//-------------------------------------------------------
	//Menu Cliente;	
	if($opcao==1){
		//try{
			switch ($opcaoCliente):
				case 1:
					$menu->criar_Cliente();
				break;
				
				case 2:
					$menu->listar_Clientes();
				break;
				
				case 3:
					$menu->remover_Cliente();
				break;
				
				case 4:
					$menu->alterar_Cliente();
				break;
				
				default:
					echo "\nOpcao invalida\n";
				break;
			endswitch;
		
		//}catch(Exception $e){
			
			
		//}
//--------------------------------------------------------
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
	}else if($opcao == 3){
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