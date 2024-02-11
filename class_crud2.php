<?php
require_once 'config.php';

class crud2{
private $db;
private $dbpass=DB;
private $dbuser=DBUSER;
private $dbhost=DBHOST;
private $dbname=DBNAME;


function __construct(argument)
{
try {
$this->db=new PDO('mysql:host',$this->dbhost.'dbname='.$this->dbname,$this->dbuser,$this->dbpass);
$this->db->setAttiribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
die("Bağlantı Başarısız!".$e->getMessage());
}
}


public function ekle_deger($argse){
$values=implode('',aray_map(function($item){
  return $item. '=?';
},array_keys($argse)))
return $values;
}


public function ekle($table,$values){
try {
$valuesExecute=array_map('htmlspecialchars',$values);
$stmt=$this->db->prepare("INSERT INTO $table SET{$this->addValue($values)}");
$stmt->execute(array_values($valuesExecute));
} catch (PDOException $e) {
die("Bağlantı Başarısız:".$e->getMessage());
}
}


public function oku($table,$values){
try {
$valuesExecute=array_map('htmlspecialchars',$values);
$stmt=$this->db->prepare("SELECT * FROM $table SET {$this->addValue($values)}");
$stmt->execute(array_values($valuesExecute));
} catch (PDOException $e) {
die("Bağlantı Başarısız:".$e->getMessage());
}
}

public function guncelle($table,$values){
try {
$valuesExecute=array_map('htmlspecialchars',$values);
$stmt=$this->db->prepare("UPDATE  $table SET {$this->addValue($values)}");
$stmt->execute(array_values($valuesExecute));
} catch (PDOException $e) {
die("Bağlantı Başarısız:".$e->getMessage());
}
}

public function sil($table,$values){
try {
$valuesExecute=array_map('htmlspecialchars',$values);
$stmt=$this->db->prepare("DELETE FROM $table SET {$this->addValue($values)}");
$stmt->execute(array_values($valuesExecute));
} catch (PDOException $e) {
die("Bağlantı Başarısız:".$e->getMessage());
}
}



}


?>
