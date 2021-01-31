<?php
//tenha uma lógica 
try {

		
		
    echo '<h3> *** Try *** </h3>';

    $sql = 'select * from clientes';
//mysql_query($sql); //Erro
//função que retorna true ou false 

if(!file_exists('require_a_arquivo.php')) {
    //criando um  nova exceção
 //throw new Exception('o arquivo que deveria estar disponivel ás '.date("d/m/Y H:i:s").'mas não está' );
 //criando um erro
 throw new Error('o arquivo que deveria estar disponivel ás '.date("d/m/Y H:i:s").'mas não está');
}

    

} catch (Error $e) {
    echo '<h3> *** Catch Error *** </h3>';
    echo "<p style ='color: red'>" .$e. "</p>";
 

} 
catch(Exception $e) {
    echo '<h3> *** Catch Exception *** </h3>';
    echo "<p style ='color: red'>" .$e. "</p>";
 
}
finally {
    echo '<h3> *** Finally *** </h3>';
}
?>