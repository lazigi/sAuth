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
  
  
  /*############## CONFIG #############*/
    $__sAuth_API =                "YOUR_STEAM_API_KEY";
    $__sAuth_URL_SITE =           "http://example.com";
    $__sAuth_MySQL =              false;
    $__sAuth_MySQL_Update =       false;
    
  /*########## CONFIG MYSQL ###########*/
    $__sAuth_MySQL_SERVER =       "SERVER_NAME";
    $__sAuth_MySQL_USER   =       "USER_NAME";
    $__sAuth_MySQL_PASSWORD =     "PASSWORD";
    $__sAuth_MySQL_DB =           "DB_NAME";
    
  /*############ REDIRECTS ############*/ 
    
    $__sAuth_LOGIN =  "/example.php";
    $__sAuth_LOGOUT = "/example.php";
    
  
  
  /*####################################*/ 
  /*############ END CONFIG ############*/ 
  /*####################################*/ 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  ####################################
  ####################################
  #### DONT TOUCH SYSTEM SCRIPT!! ####
  #### DONT TOUCH SYSTEM SCRIPT!! ####
  ####################################
  ####################################
  if($__sAuth_MySQL){
    $__sAuth_MySQL_CONNECT = mysqli_connect($__sAuth_MySQL_SERVER, $__sAuth_MySQL_USER, $__sAuth_MySQL_PASSWORD, $__sAuth_MySQL_DB);
    if(!$__sAuth_MySQL_CONNECT){
      die(sAuth_error_print('MySQL error:', mysqli_connect_error()));
    }
  }
  
  function sAuth_error_print($title,$text){ return '<html><head><style>body{margin:0;color:#434a54;width:100%;background:#eeeeee;} .sAuth{position:relative;width:350px;margin:0px auto;margin-top:200px;font-family:monospace;} .sAuth .header{margin-top:20px;margin-bottom:10px;height:42px;background:#fff;border-radius:4px;box-shadow: 0px 6px 4px -4px rgba(0,0,0,0.09);} .sAuth .header .title{text-align:center;font-size:22px;padding: 8px 0px;} .sAuth .main{width:100%;min-height:300px;background:#ffffff;margin-bottom:5px;border-radius:4px;box-shadow: 0px 6px 4px -4px rgba(0,0,0,0.09);} .sAuth .page_title{width:100%;height:22px;background:#ffffff;margin-bottom:10px;border-radius:4px;box-shadow: 0px 6px 4px -4px rgba(0,0,0,0.09);text-align:center;font-size:15px;padding-top:5px;} .sAuth .page_footer{width:100%;height:22px;background:#ffffff;margin-bottom:10px;border-radius:4px;box-shadow: 0px 6px 4px -4px rgba(0,0,0,0.09);text-align:center;font-size:12px;padding-top:5px;color:#a7a7a7;} .sAuth .text{padding:5px 20px;} .sAuth .text.title{border-bottom:2px solid #eee;} .sAuth .text.info{padding-left:30px;font-weight:600;} .sAuth a{color:#a7a7a7;text-decoration:underline;outline:none;} .sAuth a:hover{text-decoration:none;}</style></head><body><div class="sAuth"><div class="header"><div class="title">sAuth</div></div><div class="page_title">Version 1.0</div><div class="main"><div class="text title">'.$title.'</div><div class="text info">'.$text.'</div></div><div class="page_footer">Author:<a target="_blank" href="https://github.com/lazigi/">lazigi</a> | GitHub:<a target="_blank" href="https://github.com/lazigi/sAuth/">sAuth</a></div></div></body></html>';}
?>
