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
			$opcao = readline();
			switch ($opcao):
				case 1:
					$this->criar_Cliente();
				break;
				
				case 2:
					$this->listar_Clientes();
								
				break;
				
				case 3:
					//$menu->remover_Cliente();
				default:
					echo "\nOpcao invalida\n";
				break;
			endswitch;
			
		}
		public function menu_Produto(){
			echo "1 - Criar Produto\n";
			echo "2 - Listar Produtos\n";
			echo "3 - Remover Produto\n";
			echo "4 - Alterar Produto\n";
			$opcao = readline();
			switch ($opcao):
				case 1:
					$this->criar_Produto();
				break;
				
				case 2:
					$this->listar_Produto();		
				break;
				
				case 3:
					try{
						$this->excluir_Produto();
					}catch(Exception $e){
						echo $e->getMessage();
					}
				break;
				case 4:
					try{
						$this->alterar_Produto();
					}catch(Exception $e){
						echo $e->getMessage();
					}
				break;
				default:
					echo "\nOpcao invalida\n";
				break;
			endswitch;
			
		}
		public function menu_Venda(){
			echo "1 - Criar Venda\n";
			echo "2 - Listar Vendas\n";
			echo "3 - Remover Venda\n";
			echo "4 - Alterar Venda\n";
			$opcao = readline();
			switch ($opcao):
				case 1:
					$this->criar_Venda();
				break;
				
				case 2:
					$this->listar_Venda();		
				break;
				
				case 3:
					try{
						$this->excluir_Venda();
					}catch(Exception $e){
						echo $e->getMessage();
					}
				break;
				case 4:
					try{
						$this->alterar_Venda();
					}catch(Exception $e){
						echo $e->getMessage();
					}
				break;
				default:
					echo "\nOpcao invalida\n";
				break;
			endswitch;
			
		}

//CRUD CLIENTE
		public function criar_Cliente(){
			echo "Digite o nome do cliente:\n";			
			$nomeTemp = readline();
			
			echo "Digite o endereço do cliente:\n";
			$enderecoTemp = readline();
			
			echo "Digite o RG do cliente:\n";
			$rgTemp = readline();
			
			echo "Digite o data de nascimento do cliente:\n";
			$dataTemp = readline();
			
			$clienteTemp = new Cliente($nomeTemp,$enderecoTemp,$rgTemp,$dataTemp);

			$this->loja->clientes[]= $clienteTemp;
		}
		
		public function listar_Clientes(){
			if(sizeof($this->loja->clientes)!=0)
				foreach($this->loja->clientes as $cliente){
					echo "\nNome: ".$cliente->get_nome()."\n";
					echo "Endereco: ".$cliente->get_endereco()."\n";
					echo "RG: ".$cliente->get_RG()."\n";
					echo "Data Nascimento: ".$cliente->get_data_de_nascimento()."\n\n";
				}
			else
				echo "Nenhum cliente foi encontrado\n";
		}
		
		public function remover_Cliente(){
			echo ("\nDigite o nome do Cliente que deseja remover:\n");
			
			$nome = readline();
			
			for($i = 0;$i<sizeof($this->loja->clientes);$i++){
				if ( $this->loja->clientes[$i]->get_nome() == $nome){
					echo "Tem certeza que deseja excluir o cliente: $nome? 1 - SIM 2 - NAO\n";
					if(readline() == 1){
						unset($this->loja->clientes[$i]);
						echo "Cliente $nome excluido.\n";
					}
				}
				else
					echo "Cliente não encontrado\n";
			}
		}
		public function alterar_Cliente(){
			echo ("\nDigite o nome do Cliente que deseja alterar:\n");
			
			$nome = readline();
			
			for($i = 0;$i<sizeof($this->loja->clientes);$i++){
				if ( $this->loja->clientes[$i]->get_nome() == $nome){
					echo "Deseja alterar nome do cliente? 1 - SIM 2 - NAO\n";
					if(readline() == 1){
						echo "\nDigite o novo nome:\n";
						$nome = readline();
						$this->loja->clientes[$i]->set_nome($nome);
						$this->loja->clientes[$i]->set_nome($nome);
						echo "Cliente $nome excluido.\n";
					}
				}
				else
					echo "Cliente não encontrado\n";
			}
		}
		public function encontra_Cliente(){
			echo "\nDigite o RG do cliente: \n";
			$encontrar = readline();
			$indice=0;
			foreach($this->loja->clientes as $cliente){
				if($cliente->get_RG() == $encontrar){
					break;
				}else $indice++;
			}
			return $indice;
		}
//CRUD PRODUTO
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
				echo "\nDeseja alterar o nome do produto? 1-SIM (OUTRO DIGITO OU ENTER)-NAO\n";
				$opcao = readline();
				if($opcao==1){
					echo "\nDigite o novo nome:\n";
					$nome = readline();
					$this->loja->produtos[$indice]->set_nome($nome);
				}
				echo "\nDeseja alterar o codigo do produto? 1-SIM  (OUTRO DIGITO OU ENTER)-NAO\n";
				$opcao = readline();
				if($opcao==1){
					echo "\nDigite o novo codigo:\n";
					$codigo = readline();
					$this->loja->produtos[$indice]->set_codigo($codigo);
				}
				echo "\nDeseja alterar o valor do produto? 1-SIM (OUTRO DIGITO OU ENTER)-NAO\n";
				$opcao = readline();
				if($opcao==1){
					echo "\nDigite o novo valor:\n";
					$valor = readline();
					$this->loja->produtos[$indice]->set_valor($valor);
				}
			}
		}

//CRUD ITEM VENDA
		public function criar_itemVenda(){
			$indice = $this->encontra_Produto();
			if($indice >= count($this->loja->produtos)){
				throw new Exception("\nCodigo nao encontrado\n");
			}else{
				echo "Digite quantidade:\n";
				$qtdTemp = readline();
				$produtoTemp = $this->loja->produtos[$indice];
				$itemVenda = new ItemVenda($produtoTemp, $qtdTemp);
				//array_push($this->loja->vendas[$indiceVenda]->itens, $itemVenda);
				return $itemVenda;
			}
		}

		public function listar_ItemVenda($indiceVenda){
			echo "\nItens da venda:\n";
			$indiceItemVenda=1;
			foreach($this->loja->vendas[$indiceVenda]->itens as $item){
				echo $indiceItemVenda."Produto: ".$item->produto->get_nome().", Quantidade: ".$item->get_quantidade().", Valor (Valor de cada unidade do produto): ".$item->get_valor()."\n";
				$indiceItemVenda++;
			}
		}

		public function excluir_ItemVenda($indiceVenda){
			echo "\nDigite o indice do item da venda\n";
			$indice = readline();
			if($indice > count($this->loja->produtos)){
				throw new Exception("\nIndice inválido\n");
			}else{
				unset($this->loja->vendas[$indiceVenda]->itens[$indice]);
			}
		}

		public function alterar_ItemVenda($indiceVenda){
			echo "\nDigite o indice do item da venda\n";
			$indice = readline();
			if($indice > count($this->loja->produtos)){
				throw new Exception("\nIndice inválido\n");
			}else{
				echo "\nDeseja alterar o produto? 1-SIM (OUTRO DIGITO OU ENTER)-NAO\n";
				$opcao = readline();
				if($opcao==1){
					$indiceProduto = $this->encontra_Produto();
					if($indiceProduto >= count($this->loja->produtos)){
						throw new Exception("\nCodigo nao encontrado\n");
					}else{
						$this->loja->vendas[$indiceVenda]->itens[$indice]->set_produto($this->loja->produtos[$indiceProduto]);
					}
				}
				echo "\nDeseja alterar a quantidade? 1-SIM (OUTRO DIGITO OU ENTER)-NAO\n";
				$opcao = readline();
				if($opcao==1){
					echo "\nDigite a nova quantidade:\n";
					$quantidade = readline();
					$this->loja->vendas[$indiceVenda]->itens[$indice]->set_quantidade($quantidade);
				}
			}
		}
		
//CRUD VENDA
		public function criar_Venda(){
			echo "\nDigite o numero da venda:\n";
			$numTemp = readline();
			echo "\nDigite a data da venda:\n";
			$dataTemp = readline();
			$indiceCliente = $this->encontra_Cliente();
			if($indiceCliente >= count($this->loja->clientes)){
				throw new Exception("\nCliente nao encontrado\n");
			}else{
				$itensTemp = array();
				$opcao = 1;
				while($opcao == 1){
					echo "\n1-Adicionar Item 2-Fechar Venda\n";
					if(readline()==1){
						$itemTemp = $this->criar_itemVenda();
						array_push($itensTemp, $itemTemp);
					}else{
						$opcao = 0;
					}
				}
			}
		}

		public function listar_Venda(){
			echo "\nVendas:\n";
			$indiceVenda=0;
			foreach($this->loja->vendas as $venda){
				echo "\nNumero: ".$venda->get_numero().", Data: ".$venda->get_data().", Nome do Cliente: ".$venda->get_cliente()->get_nome()."\nItens:\n";
				$this->listar_ItemVenda($indiceVenda);
				$indiceVenda++;
			}
		}

		public function encontra_Venda(){
			echo "\nDigite o numero da venda: \n";
			$encontrar = readline();
			$indice=0;
			foreach($this->loja->vendas as $venda){
				if($venda->get_numero() == $encontrar){
					break;
				}else $indice++;
			}
			return $indice;
		}

		public function excluir_Venda(){
			$indice = $this->encontra_Venda();
			if($indice >= count($this->loja->vendas)){
				throw new Exception("\nNumero da venda nao encontrado\n");
			}else{
				unset($this->loja->vendas[$indice]);
			}
		}

		public function alterar_Venda(){
			$indice = $this->encontra_Venda();
			if($indice >= count($this->loja->vendas)){
				throw new Exception("\nNumero da venda nao encontrado\n");
			}else{
				echo "\nDeseja alterar o cliente da venda? 1-SIM (OUTRO DIGITO OU ENTER)-NAO\n";
				$opcao = readline();
				if($opcao==1){
					$indiceCliente = $this->encontra_Cliente();
					if($indiceCliente >= count($this->loja->clientes)){
						throw new Exception("\nCliente nao encontrado\n");
					}else{
						$this->loja->vendas[$indice]->set_cliente($this->loja->clientes[$indiceCliente]);
					}
				}
				echo "\nDeseja alterar o numero da venda? 1-SIM (OUTRO DIGITO OU ENTER)-NAO\n";
				$opcao = readline();
				if($opcao==1){
					echo "\nDigite o novo numero:\n";
					$numero = readline();
					$this->loja->vendas[$indice]->set_numero($numero);
				}
				echo "\nDeseja alterar a data da venda? 1-SIM (OUTRO DIGITO OU ENTER)-NAO\n";
				$opcao = readline();
				if($opcao==1){
					echo "\nDigite a nova data da venda:\n";
					$data = readline();
					$this->loja->vendas[$indice]->set_data($data);
				}
				echo "\nDeseja alterar ou remover algum item da venda? 1-SIM (OUTRO DIGITO OU ENTER)-NAO\n";
				$opcao = readline();
				if($opcao==1){
					$itensTemp = array();
					$opcao = 1;
					while($opcao == 1){
						echo "\n1-Alterar Item 2-Remover Item 3-Fechar Venda\n";
						$operacao = readline();
						switch($operacao){
							case 1:
								$this->alterar_ItemVenda($indice);
							break;
							case 2:
								$this->excluir_ItemVenda($indice);
							break;
							case 3:
								$opcao=3;
							break;
							default:
								echo "Opcao invalida";
							break;
						}
					}
				}
			}
		}
	}

?>