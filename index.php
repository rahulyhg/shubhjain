<?php
  
  ini_set('display_errors', true); 

  include_once 'lib/core/init.php';
  include_once 'supporting_scripts/header.php';
  include_once 'supporting_scripts/flash.php';

  $url = (isset($_REQUEST['url'])) ? $_REQUEST['url'] : '' ;

  if($url === '') {
    $url = 'home';
  }

  $filePath = 'pages/' . $url . '.php';

  if(file_exists($filePath)) {
    switch ($url) {
      case 'register':
        $result = Action::register();
        if(is_array($result)){
          $errors = $result;
        }
        break;

      case ('login' || 'home' || '') :
        Action::login();
        break;
    }

    include_once $filePath;    
  } else {
    Redirect::to('404');
  }
     

  include_once 'supporting_scripts/footer.php';
?>