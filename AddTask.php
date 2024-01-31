<?php
//echo "Archivo que interactua con la base de datos";

try{
$conn= new PDO('mysql:host=localhost; dbname=to_do_list','root','');
echo "Conexión establecida.";
}catch(PDOException $e){
    echo "Error de conexión:" .$e->getMessage();

}

$sql="SELECT * FROM tasks";
$registros=$conn->query($sql);

foreach($registros as $registro){
    print_r($registro);

}


?>