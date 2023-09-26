<?php
//Classe Quartos(define a classe que sera á usada para a funcionalidades CRUD)
class Quartos
{
    private $numero;
    private $ocupado;
    private $valor;

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($num)
    {
        $this->numero = $num;
    }

    public function getOcupado()
    {
        return $this->ocupado;
    }

    public function setOcupado($ocup)
    {
        $this->ocupado = $ocup;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($val)
    {
        $this->valor = $val;
    }
}
