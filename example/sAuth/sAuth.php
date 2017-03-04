<?php
  /*############## sAuth ##################
  ############## Version 1.2 ##############
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

  $_sAuth_Session = preg_replace("/^[0-9]$/", "", $_SESSION['steamid']);
  
  if($_sAuth_Session!=""){
    
    require('__sAuthConfig.php');    
    
    $q = mysqli_query($__sAuth_MySQL_CONNECT, 'SELECT * FROM `users` WHERE `steamid`="'.$_sAuth_Session.'"');
    
    if(mysqli_num_rows($q)){
      $row = mysqli_fetch_array($q);
      
      $sAuth = array(
        "status"    => true,
        "id"        => $row['id'],
        "steamid"   => $row['steamid'],
        "login"     => $row['login'],
        "loginSQL"  => $row['login'],
        "url"       => $row['url'],
        "img"       => $row['img'],
        "img_m"     => $row['img_m'],
        "img_f"     => $row['img_f']
      );
    }else{
      $sAuth = array(
        "status"    => false
      );
    }
  }else{
    $sAuth = array(
      "status"    => false
    );
  }
?>