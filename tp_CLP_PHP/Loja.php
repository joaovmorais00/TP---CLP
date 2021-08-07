<?php 
include ('Pessoa.php');
include ('Produto.php');
include ('Totalizavel.php');

class Loja{
	public $clientes;
	public $produtos;
	public $vendas;
	function __construct(){
	
		$this->clientes = array(new Cliente);
		$this->produtos = array(new Produto);
		$this->vendas = array(new Venda);
		
	}
	
}
?>