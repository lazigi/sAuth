<?PHP
  include('sAuth/sAuth.php');
  
  if($sAuth['status']){
    echo 'login: '.$sAuth['login'].'<br>';
    echo 'SteamID: '.$sAuth['id'].'<br>';
    echo 'Small image: '.$sAuth['img'].'<br>';
    echo 'Medium image: '.$sAuth['img_m'].'<br>';
    echo 'Full image: '.$sAuth['img_f'].'<br>';
    echo 'URL: '.$sAuth['url'].'<br>';
    echo '<a href="/sAuth/sAuthLogin.php?logout">logout</a>';
  }else{
    echo '<a href="/sAuth/sAuthLogin.php?login">login</a>';
  }
?>
