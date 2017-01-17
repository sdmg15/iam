<?php
/*
 

 */
function load($classname){
  require $classname.'.php';
}

spl_autoload_register('load');


if(isset($_GET['token'])  && $_GET['token'] == "TOKEN_FROM_YOUR_TEAM")
{
     $connect = new UserDao;

     $receivedText = $_GET['text'];
     $explodedText = explode(' ',$receivedText, 2);

     if($explodedText[0] == 'edit' || $explodedText[0]== 'create'){

      $message = $connect->doIam(htmlspecialchars($_GET['user_name']), $explodedText[1]);

      echo $message;
    }


    else if($explodedText[0] == 'show'){
      $username = str_replace('@','',trim($explodedText[1]));
      $message = $connect->getOneUserPresentation($username);
      echo $message;
    }

  /* We display informations about the command */
     else{

        echo '*IamBot Version dof_init.1* by sdmg15'.PHP_EOL;
        echo 'This command helps you to see introduction of other members. To do so, type `/iam show @username` and then press Enter.'.PHP_EOL;
        echo 'You can also create your own introduction by typing `/iam create [introduction_text]` and then hit enter if you leave it empty  it will show this guide.'.PHP_EOL;
        echo 'May be while creating your introduction you made a mistake? Ok just type `/iam edit [new_introduction]`.'.PHP_EOL;
  
        echo 'You can view introduction of following members : ``` ';
        foreach ($connect->getAll() as $value) {  
          echo $value['user'].'```'.PHP_EOL;
        }
        
        echo 'View the source on <https://gitlab.com/sdmg15/iAm| GitLab> or <https://github.com/sdmg15/iam| on GitHub>.'.PHP_EOL; 
     }


}else {

  echo "*Error: * : sorry the request doesn't come from a verify slack team.";
}
