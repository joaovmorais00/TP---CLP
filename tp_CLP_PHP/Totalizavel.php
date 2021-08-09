<?php 
abstract class Totalizavel{
	
	abstract protected function total();
	
}
class Venda extends Totalizavel{
	private $numero;
	private $data;
	private $cliente;
	private $itens;
	function __construct($numero, $data, $cliente, $itens){
		$this->numero = $numero;
		$this->data =$data;
		$this->cliente = $cliente;
		$this->itens = $itens;
		
	}
	//geters
	public function get_numero(){
		return $this->numero;
	}
	public function get_data(){
		return $this->data;
	}
	public function get_cliente(){
		return $this->cliente;
	}
	public function get_itens(){
		return $this->itens;
	}
	//Seters
	public function set_numero($numero){
		$this->numero = $numero;
	}
	public function set_data($data){
		 $this->data = $data;
	}
	public function set_cliente($cliente){
		$this->cliente = $cliente ;
	}	
	public function set_itens($itens){
		$this->itens = $itens;
	}
	public function total(){
		$total = 0; 
		foreach($this->itens as $item){
			$total+= $item->total();
		}
		return $total;
	}
}
class ItemVenda extends Totalizavel{
	private $produto;
	private $quantidade;
	private $valor;

	public function __construct($produto, $quantidade){
		$this->produto = $produto;
		$this->quantidade = $quantidade;
		$this->valor = $this->produto->get_valor();
	}

	public function get_produto(){
		return $this->produto;
	}
	
	public function get_quantidade(){
		return $this->quantidade;
	}

	public function get_valor(){
		return $this->valor;
	}
	
	public function set_quantidade($quantidade){
		$this->quantidade = $quantidade ;
	}
	public function set_produto($produto){
		$this->produto = $produto;
	}

	public function total(){
		$total = $this->valor * $this->quantidade;
		return $total;
	}
}

?>