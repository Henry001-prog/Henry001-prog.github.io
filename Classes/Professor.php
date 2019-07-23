<?php
require_once 'Pessoa2.php';
class Professor extends Pessoa {
	//Atributos
	private $especialidade;
	private $salario;
	//Métodos
	public function receberAumento($aum) {
		$this->setSalario($this->getSalario() + $aum); //+= $aum;
	}
	//Metodos Especiais
	public function getEspecialidade() {
		return $this->getEspecialidade;
	}

	public function getSalario() {
		return $this->salario;
	}

	public function setEspecialidade($especialidade) {
		$this->especialidade = $especialidade;
	}

	public function setSalario($salario) {
		$this->salario = $salario;
	}

}