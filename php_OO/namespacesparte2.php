<?php
 require "./bibliotecas/lib1/lib1.php";
 require "./bibliotecas/lib2/lib2.php";
 //para usar uma classe em outro arquivo utilize o use
 //nome namespace\classe
 //vc pode apilidiar namespaces para utlizar classes de ambos vc apilida a classe

 use A\Cliente as C1;
 use B\Cliente;
 $c = new C1();
 echo $c->__get("nome");

?>