<?php 
//criando um modelo, toda classe deve ser escrita com letra maiscula
class Funcionario{
//atributos, a segunda palavra do atributo e metodos devem ser escritoscom letra maisucla
//atributos são caracteriticas e metodos são ações
public $nome = "José";
public $telefone = null;
public $numeroFilhos = 2;
//metodos
function resumirCadFunc() {
  //$this->__get chama  metodo internamente
return $this->__get('nome')." tem ". $this->__get('numeroFilhos')."filhos";
}
function modificarNumFilhos($numFilhos) {
  $this->numeroFilhos = $numFilhos ;
}
//getters e setters
//setter cuja facionalidade e seta e definir os valores do atributo do objeto
function setNome($nome) {
  $this->nome = $nome;
}
function setNumeroFilhos($numFilhos) {
  $this->numeroFilhos = $numFilhos;
}
//os metodos get permitem recuperar os valores do atributo e retornam
function getNome() {
  return $this->nome;
}
function getNumeroFilhos() {
  return  $this->numeroFilhos;

}
function setTelefone($telefone) {
  $this->telefone = $telefone;
}
function getTelefone() {
  return $this->telefone;
}
//metodos getters setters (overloading/sobrescrevendo)
//ou seja de vez de criar varios metodos get e set vc pod criar um e so passa o atributo e valor

function __set($atributo,$valor) {
  $this->$atributo = $valor;
}
function __get($atributo) {
  
  return $this->$atributo;
}
}
//PARA Acessar metodos ou atributos de uma classe coloque o ->
$funcionario = new Funcionario(); 
$funcionario->setNome("José");
$funcionario->setNumeroFilhos(2);
$funcionario->__set("telefone","+5518996640661");

echo $funcionario->resumirCadFunc();
echo "<br/>";
echo "metodo get: ".$funcionario->getNome()." tem ".$funcionario->getNumeroFilhos()." filhos e seu telefone é ".$funcionario->__get("telefone");
