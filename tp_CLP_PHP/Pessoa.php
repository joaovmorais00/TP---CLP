<?php 
abstract class Pessoa{
	private $nome;
	private $endereco;

}
class Cliente extends Pessoa{
	private $RG;
	private $data_de_nascimento;
	
	// construtor
	function __construct($nome,$endereco,$RG,$data_de_nascimento){
		$this->nome = $nome;
		$this->endereco = $endereco;
		$this->RG = $RG;
		$this->data_de_nascimento = $data_de_nascimento;
	}
	// gets;
	public function get_nome(){
		return $this->nome;
	}
	public function get_endereco(){
		return $this->endereco;
	}
	public function get_RG(){
		return $this->RG;
	}
	public function get_data_de_nascimento(){
		return $this->data_de_nascimento;
	}
	// sets;
	public function set_nome($nome){
		$this->nome = $nome;
	}
	public function set_endereco($endereco){
		$this->endereco = $endereco ;
	}
	public function set_RG($RG){
		$this->RG = $RG;
	}
	public function set_data_de_nascimento($data_de_nascimento){
		$this->data_de_nascimento = $data_de_nascimento;
	}
}
?>