<?php
require_once __DIR__ . '/../Config.php';

class Cliente
{

    private $cliente_id;
    private $nome;
    private $telefone;
    private $email;

    public function getId()
    {
        return $this->cliente_id;
    }

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
