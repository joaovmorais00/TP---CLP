<?php
	include ('Loja.php');
	class Menu{
		protected $opcao;
		protected $loja;
		function __construct(){
			$this->loja = new Loja;
			
		}
		public function menu_principal(){
			echo "Digite o número da opção desejada:\n";
			echo "1 - Cliente\n";
			echo "2 - Produto\n";
			echo "3 - Venda\n";
			return $opcao = readline();
			
		}
		public function menu_Cliente(){
			echo "1 - Criar Cliente\n";
			echo "2 - Listar Clientes\n";
			echo "3 - Remover Cliente\n";
			echo "4 - Alterar Cliente\n";
			return $opcao = readline();
			
		}
		public function menu_Produto(){
			echo "1 - Criar Produto\n";
			echo "2 - Listar Produtos\n";
			echo "3 - Remover Produto\n";
			echo "4 - Alterar Produto\n";
			return $opcao = readline();
			
		}
		public function menu_Venda(){
			echo "1 - Criar Venda\n";
			echo "2 - Listar Vendas\n";
			echo "3 - Remover Venda\n";
			echo "4 - Alterar Venda\n";
			return $opcao = readline();
			
		}
		public function criar_Cliente(){
			
			echo "Digite o nome do cliente:\n";			
			$this->loja->clientes[0]->set_nome(readline());
			
			echo "Digite o RG do cliente:\n";
			$this->loja->clientes[0]->set_RG(readline());
			
			echo "Digite o endereço do cliente:\n";
			$this->loja->clientes[0]->set_endereco(readline());
			
			echo "Digite o data de nascimento do cliente:\n";
			$this->loja->clientes[0]->set_data_de_nascimento(readline());
		}
		public function listar_Clientes(){
			var_dump ($this->loja->clientes);
		}
		
	}

?>