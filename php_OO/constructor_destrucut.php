<?php 
class Pessoa {
    public $nome = null;
    //criando metodo construtor que ´ra construir o objeto e setar objetos ele iniciado quando a classe é instanciada
   function __construct($nome) {
       echo "objeto iniciado";
       $this->nome = $nome;
   }
   function __get($atributo) {
       return $this->$atributo;
   }
   function correr() {
       return $this->__get("nome")." está correndo";
   }
   function __destruct() {
       echo "objeto removido";
   }
}
// instanciação da classe
$pessoa = new Pessoa("keven");
echo "<br/>";
echo "O nome desta pessoa é ".$pessoa->__get("nome");
echo "<br/>";
echo $pessoa->correr();
echo "<br/>";
//unset($pessoa);

?>