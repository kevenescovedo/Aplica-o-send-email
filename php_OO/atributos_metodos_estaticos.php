<?php 
class Exemplo {
    public static $atributo = 'eu sou atributo statico';
    public $atributo2 = 'eu sou um atributo mormal';
    public static function metodo() {
       
     echo 'eu sou metodo estatico meu irmão!!';
    }
    public function metodo2() {
        echo 'eu sou metodo normal!!';
        echo "<br/>";
      
    }
}
$x = new Exemplo();
//quando se esta utilizando a classes e metodos estaticos não a necesidade de instanciar um objeto basta apenas fazer como ilustrado abaixo
echo Exemplo::$atributo;
echo '<br/>';
Exemplo::metodo();
//quando vc tenta acessar atributos não estaticos isto ocorre um erro;
//metodos funcionam mais não é ideal;
echo '<br/>';
Exemplo::metodo2();
$x->metodo();
//não podemos acessarum atributo estatico atrvaés do operador seta 
//e metodos estaticos não podemos acessar atraves do this
?>