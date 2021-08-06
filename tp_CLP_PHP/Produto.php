<?php 

class Produto{
	private $nome;
	private $codigo;
	private $valor;

	public function get_nome(){
		return $this->nome;
	}
	public function get_codigo(){
		return $this->codigo;
	}
	public function get_valor(){
		return $this->valor;
	}
	public function set_nome($nome){
		 $this->nome = $nome;
	}
	public function set_codigo($codigo){
		$this->codigo = $codigo ;
	}
	public function set_valor($valor){
		$this->valor = $valor;
	}
	
}
?>