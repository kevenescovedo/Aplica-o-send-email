<?php
class MinhaExceptionCustomizada extends Exception {
    private $erro;
    public function __construct($erro) {
        $this->erro = $erro;
    }
    public function pegarMensagem() {
        return $this->erro;
    }
}
try {
 throw new  MinhaExceptionCustomizada("Esse é um erro teste");
} catch(MinhaExceptionCustomizada $e) {
  echo $e->pegarMensagem();
}
?>