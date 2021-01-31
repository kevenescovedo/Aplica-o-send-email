<?php 
namespace A;
class Cliente implements  CadastroInterface {
    public $nome = "Jorge";
    public function __get($attr) {
        return $this->$attr;
      
    }
    public function __construct() {
        print_r(get_class_methods($this));
    }
    public function salvar() {
        echo "salvar";
    }
}
interface CadastroInterface {
    public function salvar();
}

//se queremos idnicar qual namespace da classe da referencia de objeto com base na classe em um namespace exemplo
;
?>