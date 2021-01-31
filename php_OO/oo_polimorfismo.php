<?php
//com herança  você classes herdam para outra classses, ou seja com extends um classe é um exentsaõ de outra é herdará seus atributos metodos
class Veiculo {
    public $placa = null;
    public $cor = null;
    function acelerar() {
        echo "acelerar";
    }
    function __construct($placa, $cor) {
        $this->cor = $cor;
        $this->placa = $placa;
    }
    function freiar() {
        echo "freiado";
    }
    function trocarMacha() {
        echo "desengatar emgreagem com o pé e engatar macha com a mão";
    }

}
class Carro  extends Veiculo{
  
    public $tetosolar = true;
  
    function abrirTetoSolar() {
        echo "teto solar aberto";
    }
    function alterarPosicaoVolante() {
        echo "mudar posição volante";
    }
}
   
class Moto extends Veiculo {
  
    public $contraPesoguidao = true;
    
    function enpinar(){
        echo "empinar";
    }
    function trocarMacha() {
        echo "desengatar emgreagem com o mão e engatar macha com o pé";
    }

}
class Caminhao extends Veiculo {

}
$carro = new Carro("q23r4","preto");
$moto = new Moto("d4r5ty","azul");
$caminhao = new Caminhao("f7p7d7", "branco");

echo '<pre>';
print_r($carro);
echo "<br/>";
print_r($moto);
echo "</pre>";
echo "<hr/>";
$carro->acelerar();
echo "<br/>";
$carro->abrirTetoSolar();
echo "<br/>";
$carro->freiar();
echo "<br/>";
$moto->freiar();
echo "<br/>";
$carro->trocarMacha();
echo "<br/>";
$moto->trocarMacha();
echo "<br/>";
$caminhao->trocarMacha();



 ?>