<?php
//namespaces servem ara diferenciar um classe da outra com mesmo nome imagina vc cria um classe e essa classe tem o mesmo nome de uma classe da biblioteca
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
namespace B;
class Cliente implements \A\ CadastroInterface {
    public $nome = "Angela";
    public function __construct() {
        print_r(get_class_methods($this));
    }
    public function __get($attr) {
        return $this->$attr;
    }
    public function salvar() {
        echo "salvar";
    }
}
interface CadastroInterface {
    public function remover();
}
//se queremos idnicar qual namespace da classe da referencia de objeto com base na classe em um namespace exemplo

$c = new \B\ Cliente();
print_r($c);
echo "<br/>";
echo $c->__get('nome');
 ?>