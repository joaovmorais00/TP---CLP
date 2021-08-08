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
			return readline();
			
		}
		public function menu_Cliente(){
			echo "1 - Criar Cliente\n";
			echo "2 - Listar Clientes\n";
			echo "3 - Remover Cliente\n";
			echo "4 - Alterar Cliente\n";
			return readline();
			
		}
		public function menu_Produto(){
			echo "1 - Criar Produto\n";
			echo "2 - Listar Produtos\n";
			echo "3 - Remover Produto\n";
			echo "4 - Alterar Produto\n";
			return readline();
			
		}
		public function menu_Venda(){
			echo "1 - Criar Venda\n";
			echo "2 - Listar Vendas\n";
			echo "3 - Remover Venda\n";
			echo "4 - Alterar Venda\n";
			return readline();
			
		}
		public function criar_Cliente(&$qtd){
			// $clienteTemp = new Cliente;
			// echo "Digite o nome do cliente:\n";			
			// $clienteTemp->set_nome(readline());
			
			// echo "Digite o RG do cliente:\n";
			// $clienteTemp->set_RG(readline());
			
			// echo "Digite o endereço do cliente:\n";
			// $clienteTemp->set_endereco(readline());
			
			// echo "Digite o data de nascimento do cliente:\n";
			// $clienteTemp->set_data_de_nascimento(readline());

			// array_push($this->loja->clientes, $clienteTemp);
		}
		public function listar_Clientes(){
			foreach($this->loja->clientes as $cliente){
				echo "Nome: $cliente->get_nome(), ";
				echo "Endereco: $cliente->get_endereco(), ";
				echo "RG: $cliente->get_RG(), ";
				echo "Data Nascimento: $cliente->get_data_de_nascimento()\n";
				//  ->get_nome();
			}
		}

		public function criar_Produto(){
			echo "\nDigite o nome do produto:\n";			
			$nomeTemp = readline();
			
			echo "Digite o codigo do produto:\n";
			$codigoTemp = readline();
			
			echo "Digite o valor do produto:\n";
			$valorTemp = readline();

			$produtoTemp = new Produto($nomeTemp, $codigoTemp, $valorTemp);

			array_push($this->loja->produtos, $produtoTemp);
		}

		public function listar_Produto(){
			echo "\nProdutos:\n";
			foreach($this->loja->produtos as $produto){
				echo "Nome:".$produto->get_nome().", Codigo: ".$produto->get_codigo().", Valor: ".$produto->get_valor()."\n";
			}
		}

		public function encontra_Produto(){
			echo "\nDigite o codigo do produto: \n";
			$encontrar = readline();
			$indice=0;
			foreach($this->loja->produtos as $produto){
				if($produto->get_codigo() == $encontrar){
					break;
				}else $indice++;
			}
			return $indice;
		}

		public function excluir_Produto(){
			$indice = $this->encontra_Produto();
			if($indice == count($this->loja->produtos)){
				throw new Exception("\nCodigo nao encontrado\n");
			}else{
				unset($this->loja->produtos[$indice]);
			}
		}

		public function alterar_Produto(){
			$indice = $this->encontra_Produto();
			if($indice == count($this->loja->produtos)){
				throw new Exception("\nCodigo nao encontrado\n");
			}else{
				echo "\nDeseja alterar o nome do produto? 1-SIM  2-NAO\n";
				$opcao = readline();
				if($opcao==1){
					echo "\nDigite o novo nome:\n";
					$nome = readline();
					$this->loja->produtos[$indice]->set_nome($nome);
				}
				echo "\nDeseja alterar o codigo do produto? 1-SIM  2-NAO\n";
				$opcao = readline();
				if($opcao==1){
					echo "\nDigite o novo codigo:\n";
					$codigo = readline();
					$this->loja->produtos[$indice]->set_codigo($codigo);
				}
				echo "\nDeseja alterar o valor do produto? 1-SIM  2-NAO\n";
				$opcao = readline();
				if($opcao==1){
					echo "\nDigite o novo valor:\n";
					$valor = readline();
					$this->loja->produtos[$indice]->set_valor($valor);
				}
			}
		}
		
	}

?>