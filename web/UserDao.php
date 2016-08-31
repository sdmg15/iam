<?php

/**
	@classname : UserDao
	@author: Sonkeng Maldini(sdmg15)

  This class deals with the famous CRUD (Create Read Update Delete).
**/

class UserDao extends Connection{

const HOST = 'myFavaouriteHOst';
const DNAME = 'iam';
const USER = 'root';
const PW = '';

public function __construct(){
  parent::__construct(self::HOST,self::DNAME,self::USER,self::PW);
}
/*
  @return : raw list of user;

  */

  public function getAll(){

    $req = $this->getBase()->query('SELECT * FROM iamtable ORDER BY user');
    $list = $req->fetchAll();
    $tableUsers = [];
    foreach ($list as $value) {
      $tableUsers[] = $value;
    }

    return $tableUsers;
  }
/*
  @param : user
 Returns introduction of a specific user
 */
  public function getOneUserPresentation($user){

    $req = $this->getBase()->prepare('SELECT user,presentation FROM iamtable WHERE user = :user');
    $req->bindValue(':user',$user,PDO::PARAM_STR);
    $req->execute();
    $datas = $req->fetch();

    return !empty($datas['presentation'])? '*'.$datas['user'].'* '.PHP_EOL.$datas['presentation'].PHP_EOL : "*Error: * Introduction not found.";
  }

  /*

  @param : user , presentation

  Helps to create or to update an introduction of a specific user.
  return message
  */

  public function doIam($user,$presentation){
    /* Check whether the user already have a presentation if true we just update */
    if($this->presentationExists($user)){

      $req = $this->getBase()->prepare('UPDATE iamtable SET presentation=:presentation WHERE user=:user');
      $req->bindValue(':user',$user,PDO::PARAM_STR);
      $req->bindValue(':presentation', $presentation, PDO::PARAM_STR);

      $req->execute();

      return ":white_check_mark: introduction saved.";
    }
    /* The user don't have a presentation and want to create it*/
    else {
      $req = $this->getBase()->prepare('INSERT INTO iamtable SET presentation = :presentation,user=:user');
      $req->bindValue(':user',$user,PDO::PARAM_STR);
      $req->bindValue(':presentation', $presentation, PDO::PARAM_STR);
      $req->execute();

      return ":white_check_mark: introduction created.";

    }
  }

  public function presentationExists($user){
    $req = $this->getBase()->prepare('SELECT user,presentation FROM iamtable WHERE user= :user');
    $req->bindValue(':user',$user,PDO::PARAM_STR);
    $req->execute();
    $datas = $req->fetch();

      if($datas['presentation']){
        return true;
      }else{
        return false;
      }
  }

}
