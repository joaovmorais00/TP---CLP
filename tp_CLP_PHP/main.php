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
	
}
?>