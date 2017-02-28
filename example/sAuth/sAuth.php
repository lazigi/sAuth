<?php
  /*############## sAuth ##################
  ############## Version 1.0 ##############
  #########################################
  ##### The script written by lazigi ######
  #########################################
  ######## Writing data 02.28.2017 ########
  #########################################
  ############## GitHub link ##############
  #### https://github.com/lazigi/sAuth ####
  #########################################
  ########## GitHub Author link ###########
  ####### https://github.com/lazigi #######
  #########################################
  #######################################*/
  
  
  ob_start();
  session_start();

  $_sAuth_Session = preg_replace("/[^0-9]/", "", $_SESSION['steamid']);
  
  if($_sAuth_Session!=""){
    
    require('__sAuthConfig.php');

    $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$__sAuth_API&steamids=$_sAuth_Session";
    $json_object  = file_get_contents($url);
    $json_decoded = json_decode($json_object, true);
    
    $json = $json_decoded['response']['players'][0];
    
    $sAuth = array(
      "status"    => true,
      "id"        => $json['steamid'],
      "login"     => $json['personaname'],
      "loginSQL"  => str_replace('"', '&quot;', $json['personaname']),
      "url"       => $json['profileurl'],
      "img"       => $json['avatar'],
      "img_m"     => $json['avatarmedium'],
      "img_f"     => $json['avatarfull']
    );
    
  }else{
    $sAuth = array(
      "status"    => false
    );
  }
?>