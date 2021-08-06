<?php
	class Menu{
		protected $opcao;
		public function menu_principal(){
			echo "Digite o número da opção desejada:";
			echo "1 - Cliente";
			echo "2 - Produto";
			echo "3 - Venda";
			$opcao = readline();
			switch:
				case 1:
					menu_Cliente();
				break;
		}
		public function menu_Cliente(){
			echo "1 - Criar Cliente";
			echo "2 - Listar Clientes";
			echo "3 - Remover Cliente";
			echo "4 - Alterar Cliente";
			$opcao = readline();
			switch:
				case 1:
					menu_Cliente();
				break;
		}
		public function menu_Produto(){
			echo "1 - Criar Produto";
			echo "2 - Listar Produtos";
			echo "3 - Remover Produto";
			echo "4 - Alterar Produto";
			$opcao = readline();
			switch:
				case 1:
					menu_Cliente();
				break;
		}
		public function menu_Venda(){
			echo "1 - Criar Venda";
			echo "2 - Listar Vendas";
			echo "3 - Remover Venda";
			echo "4 - Alterar Venda";
			$opcao = readline();
			switch:
				case 1:
					menu_Cliente();
				break;
		}
		
	}

?>