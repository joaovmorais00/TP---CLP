<?php 
abstract class Pessoa{
	private $nome;
	private $endereco;

	public function __construct($nome, $endereco){
		$this->nome = $nome;
		$this->endereco = $endereco;
	}

	public function get_nome(){
		return $this->nome;
	}
	public function get_endereco(){
		return $this->endereco;
	}

	public function set_nome($nome){
		$this->nome = $nome;
	}
	public function set_endereco($endereco){
		$this->endereco = $endereco ;
	}
}
class Cliente extends Pessoa{
	private $RG;
	private $data_de_nascimento;

	public function __construct($nome, $endereco, $RG, $data_de_nascimento){
		parent::__construct($nome, $endereco);
		$this->RG = $RG;
		$this->data_de_nascimento = $data_de_nascimento;
	}
	
	public function get_RG(){
		return $this->RG;
	}
	public function get_data_de_nascimento(){
		return $this->data_de_nascimento;
	}
	public function set_RG($RG){
		$this->RG = $RG;
	}
	public function set_data_de_nascimento($data_de_nascimento){
		$this->data_de_nascimento = $data_de_nascimento;
	}
	
}
?>