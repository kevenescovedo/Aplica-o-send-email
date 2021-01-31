<?php 

class Pai {
 //um atributo private não pode ser acessado pela aplicação e nem herdeiros
    private $nome = "Keven";
    //um atributo protected não pode ser acessado pela aplicação porém pode ser acessado pelos herdeiros;
    protected $sobrenome = "Escovedo";
    //um atributo publico pode ser acessado pela aplicação e por herdeiros
    public $humor = "Feliz";
    //mas vc pode pegar um atributo private ou proted utilizando de interfaces, ou seja através
    //de metodos
    public function getNome() {
    return $this->nome;
    }
    public function setNome($value) {
       if(strlen($value) >= 0){
        $this->nome = $value;
       }
    }
    public function getSobrenome() {
        return $this->sobrenome;
        }
        public function setSobrenome($value) {
           if(strlen($value) >= 0){
            $this->sobrenome = $value;
           }
        }
    function __get($atributo) {
        return $this->$atributo;

    }
    function __set($atributo, $value) {
        return $this->$atributo = $value;
        
    } 
    private function executarMania() {
        echo "Assobiar";
    }
    protected function responder() {
        echo "oi";
    }
    public function executarAcao() {
       $x = rand(1,10);
       if($x >=1 and $x <= 8 ) {
        $this->executarMania();
       }
       else {
        $this->responder();
       }
    }    
}
class Filho extends Pai {
    public function getAtributo($atributo) {
        return $this->$atributo;
    }
    public function setAtributo($atributo,$valor) {
         $this->$atributo = $valor;
    }

}
$pai = new Pai();
$pai->humor = "Muito Feliz";
echo $pai->getNome();
echo "</br>";
echo $pai->humor;


// os metodos magicos __get and set __ nos permite acessar dados protects e privates na aplicacação;
echo "</br>";
echo $pai->nome;
echo $pai->executarAcao();
$filho = new Filho();

print_r($filho);
$filho->setAtributo("nome","leandro");
print_r($filho);
//pega os metodos de uma classe
print_r(get_class_methods($filho));

?>