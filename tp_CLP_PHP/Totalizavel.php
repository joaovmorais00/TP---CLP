<?php 
abstract class Totalizavel{
	
	abstract protected function total();
	
}
class Venda extends Totalizavel{
	private $numero;
	private $data;
	private $cliente;
	private $itens;
	function __construct(){
		$this->numero = 0;
		$this->itens = array();
		
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
	public function set_itens($item){
		
		$this->itens[$this->numero] = $item;
		$this->numero++;
	}
	protected function total(){
		$total = 0; 
		for($i=0; i<$this->numero;$i++ ){
			$total += $this->itens[$i]->total();
		}
		return $total;
	}
}
class ItemVenda extends Totalizavel{
	private $produto;
	private $valor;
	private $quantidade;

	public function get_produto(){
		return $this->produto;
	}
	public function get_valor(){
		return $this->valor;
	}
	public function get_quantidade(){
		return $this->quantidade;
	}
	
	public function set_valor($valor){
		$this->valor = $valor;
	}
	public function set_quantidade($quantidade){
		$this->quantidade = $quantidade ;
	}
	public function set_produto($produto){
		$this->produto = $produto;
	}
	protected function total(){
		$total = $this->valor*$this->quantidade;
		return $total;
	}
}

?>