<?php

namespace B;
class Cliente implements CadastroInterface {
    public $nome = "Angela";
    public function __construct() {
        print_r(get_class_methods($this));
    }
    public function __get($attr) {
        return $this->$attr;
    }
    public function remover() {
        echo "salvar";
    }
}
interface CadastroInterface {
    public function remover();
}
//se queremos idnicar qual namespace da classe da referencia de objeto com base na classe em um namespace exemplo

 ?>