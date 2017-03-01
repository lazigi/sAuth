<?PHP

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
  require("openid.php");
  require("__sAuthConfig.php");

  try{
    $openid = new LightOpenID($__sAuth_URL_SITE);
    if(!$openid->mode){
      if(isset($_GET["login"])){
        $openid->identity = "http://steamcommunity.com/openid/?l=english";
        header("Location: ".$openid->authUrl());
      }
    }else{
      if($openid->mode=="cancel"){
        sAuth_error_print("Steam Fail", "User has canceled authentication!");
      }else{
        if($openid->validate()){
          $id = $openid->identity;

          $reg = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
          preg_match($reg, $id, $matches);
          echo sAuth_error_print("Steam Access", "<center><h2><a href='$__sAuth_LOGIN'>Go to site</a></h2></center>");

          $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$__sAuth_API&steamids=$matches[1]";
          $json_object= file_get_contents($url);
          $json_decoded = json_decode($json_object, true);
          $json = $json_decoded['response']['players'][0];
          
          $_SESSION['steamid'] = $json['steamid'];
          
          if($__sAuth_MySQL){
            $q = mysqli_query($__sAuth_MySQL_CONNECT, 'SELECT * FROM `users` WHERE `steamid`="'.$json['steamid'].'"');
            
            if(mysqli_num_rows($q)==0){
              mysqli_query($__sAuth_MySQL_CONNECT, 
                          'INSERT INTO `users` (
                            `login`,
                            `steamid`,
                            `img`,
                            `img_m`,
                            `img_f`
                          )VALUES(
                            "'.$json['personaname'].'",
                            "'.$json['steamid'].'",
                            "'.$json['avatar'].'",
                            "'.$json['avatarmedium'].'",
                            "'.$json['avatarfull'].'"
                          )'
              );
            }else{
              if($__sAuth_MySQL_Update){
                $row = mysqli_fetch_array($q);
                
                if($json['avatar']!=$row['img']){
                  mysqli_query($__sAuth_MySQL_CONNECT, 'UPDATE `users` SET `img`="'.$json['avatar'].'", `img_m`="'.$json['avatarmedium'].'", `img_f`="'.$json['avatarfull'].'" WHERE `steamid`="'.$row['steamid'].'"');
                }
                
                if($json['personaname']!=$row['login']){
                  mysqli_query($__sAuth_MySQL_CONNECT, 'UPDATE `users` SET `login`="'.$json['personaname'].'" WHERE `steamid`="'.$row['steamid'].'"');
                }
              }
            }
            
            mysqli_close($__sAuth_MySQL_CONNECT);
          }
          die(header('Location: '.$__sAuth_LOGIN));
        }else{
          die(sAuth_error_print("Steam Fail", 'some error'));///FIX
        }
      }
    }
  }catch(ErrorException $e){
    die(sAuth_error_print("Steam Fail", $e->getMessage()));
  }
  
  if(isset($_GET['logout'])){
    $_SESSION = array();
    unset($_SESSION);
    if(ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
      );
    }

    session_destroy();
    die(header('Location: '.$__sAuth_LOGOUT));
  }
?>
