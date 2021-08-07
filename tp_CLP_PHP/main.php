<?php
include ('Menu.php');

$menu = new Menu;
//$loja = new Loja;

while(1){
	global $menu;
	//global $loja;
	$opcao = $menu->menu_principal();
	//menu principal;
	switch ($opcao):
		case 1:
			$opcao = $menu->menu_Cliente();
		break;
		
		case 2:
			$opcao = $menu->menu_Produto();
						
		break;
		
		case 3:
			$opcao = $menu->menu_Venda();
		break;
		default:
			echo "Essa opção não é valida";
		break;
	endswitch;
	
	//menu cliente;
	switch ($opcao):
		case 1:
			$menu->criar_Cliente();
		break;
		
		case 2:
			$menu->listar_Clientes();
						
		break;
		
		case 3:
			$menu->remover_Cliente();
		
	endswitch;
}
?>