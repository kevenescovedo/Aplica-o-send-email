<?php
//todos os elementos da interface deve ser publico
//criando um interface que é um contrado ou seja os define os metodos ou seja o contrado que deve ser implementado pela classe {
    
interface EquipamentoEletronicoInterface {
    public function ligar();
    public function desligar();
}
// para implementar ainterface basta utilizar implements
class Geladeira implements EquipamentoEletronicoInterface {
public function abrirPosta() {
echo "abrir porta";

}
public function ligar() {
echo 'ligar';
}
public function desligar() {
    echo "desligar";
}
}
class Tv implements EquipamentoEletronicoInterface {
    public function trocarCanal() {
       echo "canal trocado";
    }
    public function ligar() {
        echo 'ligar';
        }
    public function desligar() {
            echo "desligar";
        }
}

$geladeira = new Geladeira();
$tv = new Tv();
//--------------------------------------------------//
interface MamiferoInterface {
    public function respirar();
}
interface TerrestreInterface{
    public function andar();
}
interface AquaticoTerrestre{
    public function nadar();
}
class Humano implements TerrestreInterface, MamiferoInterface{
public function andar() {
    echo 'andar';
}
public function respirar() {
    echo 'respirar';
}
protected function conversar() {
    echo 'conversar';
}
}
class Baleia implements AquaticoTerrestre,  MamiferoInterface {
    public function respirar() {
        echo 'respirar';
    }
    public function nadar() {
        echo 'nadar';
    }
    protected function esguichar() {
        echo 'esguichar';
    }
}

//----------------------//
interface AnimalInterface{
    public function comer();
}
interface AveInterface extends AnimalInterface {
    public function voar();
}
class PapagaioInterface  implements  AveInterface {
   
    public function voar() {
        echo 'voar';
    }
    public function comer() {
        echo 'comer';
    }
}
 ?>
