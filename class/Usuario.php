<?php

/*
 * CREATE TABLE usuario(
  id int PRIMARY KEY AUTO_INCREMENT,
  email varchar(100),
  senha varchar(100)
  );
 */
include_once 'Conectar.php';

class Usuario {
    private $id;
    private $email;
    private $senha;
    private $con;

    public function getId() {
        return $this->id;
    }
    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setSenha($senha): void {
        $this->senha = $senha;
    }

    public function consultar() {
        try {
            $this->con = new Conectar();
            $sql = "SELECT * FROM usuario where email = ? AND senha = ?";
            $ligacao = $this->con->prepare($sql);
            $ligacao->bindValue(1, $this->email);
            $ligacao->bindValue(2, sha1($this->senha));

            return $ligacao->execute() == 1 ? $ligacao->fetchAll() : false;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function crud($opcao) {
        try {
            $this->con = new Conectar();
            $sql = "CALL crud_usuario(?, ?, ?, ?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, $this->email);
            $executar->bindValue(3, $this->senha);
            $executar->bindValue(4, $opcao);
            return $executar->execute() == 1 ? "Procedimento ok" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

}
