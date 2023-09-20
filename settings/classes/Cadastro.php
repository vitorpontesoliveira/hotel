<?php

//Classe Clientes(define a classe que sera á usada para a funcionalidades CRUD)
class Cliente
{
    private $nome;
    private $telefone;
    private $email;

    //Seção que trata dos dados dos campos
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($name)
    {
        $nome = trim($name);

        if (preg_match('/^[a-zA-Z\s]+$/', $nome)) {
            $this->nome = $nome;
        } else {
            throw new InvalidArgumentException('Apenas Letras.');
        }
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($tel)
    {
        $this->telefone = $tel;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($ema)
    {
        $this->email = $ema;
    }
}


//Classe Quartos(define a classe que sera á usada para a funcionalidades CRUD)
class Quartos{
    private $numero;
    private $ocupado;
    private $valor;

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($num) {
        $this->numero = $num;
    }

    public function getOcupado() {
        return $this->ocupado;
    }

    public function setOcupado($ocup){
        $this->ocupado = $ocup;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($val){
        $this->valor = $val;
    }

}
