<?php

define('unisitecms', true);
session_start();

$config = require "../../../../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php");
include_once( $config["basePath"] . "/" . $config["folder_admin"] . "/lang/" . $settings["lang_admin_default"].".php" );

if( !(new Admin())->accessAdmin($_SESSION['cp_control_city']) ){
   $_SESSION["CheckMessage"]["warning"] = "Ограничение прав доступа!";
   exit;
}

if(isAjax() == true){

$Cache = new Cache();

$region_id = intval($_POST["region_id"]);
$country_id = intval($_POST["country_id"]);
$name = clear($_POST["name"]);

 $error = array();
 
 if(empty($region_id)){$error[] = "Выберите регион";}
 if(empty($country_id)){$error[] = "Выберите страну";}
 if(empty($name)){$error[] = 'Укажите название города';}

    if (count($error) == 0) {

      $insert = insert("INSERT INTO uni_city(city_name, country_id, region_id, city_alias)VALUES(?,?,?,?)", array($name,$country_id,$region_id,translite($name)));        
                
          if($insert){
                $_SESSION["CheckMessage"]["success"] = "Действие успешно выполнено!";
                echo true;
                $Cache->update( "cityDefault" );
          }                 
        
      } else {
               $_SESSION["CheckMessage"]["warning"] = implode("<br/>", $error);        
             }

}
?>