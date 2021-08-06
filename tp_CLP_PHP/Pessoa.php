<?php 
abstract class Pessoa{
	private $nome;
	private $endereco;
	abstract protected function get_nome();
	abstract protected function get_endereco();
	abstract protected function set_nome($nome);
	abstract protected function set_endereco($endereco);
	
}
class Cliente extends Pessoa{
	private $RG;
	private $data_de_nascimento;
	
	public function get_nome(){
		return $this->nome;
	}
	public function get_endereco(){
		return $this->endereco;
	}
	public function get_Rg(){
		return $this->RG;
	}
	public function get_data_de_nascimento(){
		return $this->data_de_nascimento;
	}
	public function set_nome($nome){
		 $this->nome = $nome;
	}
	public function set_endereco($endereco){
		$this->endereco = $endereco ;
	}
	public function set_Rg($RG){
		$this->RG = $RG;
	}
	public function set_data_de_nascimento($data_de_nascimento){
		$this->data_de_nascimento = $data_de_nascimento;
	}
	
}
?>