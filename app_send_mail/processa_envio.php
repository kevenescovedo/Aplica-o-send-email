<?php 
print_r($_POST);
class Mensagem {
    private $para = null;
    private $assunto = null;
    private $mensagem = null;
    public function __get($atributo) {
        return $this->$atributo;
    }
    public function __set($atributo,$valor) {
        $this->$atributo = $valor;
    }
    public function mensagemValida() {
        //empty verifica se algo ta vazio e caso sim retorna true
   if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)  ) {
       return false;
   }
   else {
       return true;
   }
    }
}
$mensagem = new Mensagem();
$mensagem->__set('para',$_POST['para']);
$mensagem->__set('assunto',$_POST['assunto']);
$mensagem->__set('mensagem',$_POST['mensagem']);
//print_r($mensagem);
if($mensagem->mensagemValida()) {
    echo "<br/>";
    echo "mensagem valida";
}
else {
    echo "<br/>";
    echo "mensagem invalida, pois dados não foram preenchidos corretamente";
}

?>