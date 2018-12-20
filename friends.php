<?php
class friends
{

  static public function renderFriendShip($user_one, $user_two,$type)
  { global $db;
    //Now lets render the buttons
    switch($type)
    {
      case 'isThereRequestPending':
          $query = $db->prepare("SELECT * FROM friends WHERE user_one='".$user_one."' AND user_two='".$user_two."' AND friendship_official='0' OR user_one='".$user_two."' AND user_two='".$user_one."' AND friendship_official='0'");
          $query->execute();
          return $query->rowCount();
          break;
      case 'isThereFriendShip':
          $query = $db->prepare("SELECT * FROM friends WHERE user_one='".$user_one."' AND user_two='".$user_two."' AND friendship_official='1' OR user_one='".$user_two."' AND user_two='".$user_one."' AND friendship_official='1'");
          $query->exeute();
          return $query->rowCount();
          break;

    }
    // code...
  }

  static public function add($id,$user_two)
  {
    if(!emapty($id) && !empty($user_two))
    {
      global $db;
      $response = array();
      $id = (int) $id;
      $user_two = (int) $user_two;
      if($id != $user_two)
      {
        $f = new friends;
        $check =$f->renderFriendShip($id, $user_two,'isThereFriendShip');
        if($check ==0)
        {
          $insert = $db->prepare("INSERT INTO friends VALUES('','".$id."','".$user_two."','0',now())");
          $insert->execute();
          $response['code'] =1;
          $response['msg']="Request Sent!";
          echo json_encode($response);
          return false;
        }else{
          $response['code']=0;
          $response['msg']="Already Friends";
          echo json_encode($response);
          return false;
        }
      }
      else{
        $response['code']=0;
        $response['msg']="You can't friend Yourself";
        echo json_encode($response);
        return false;
      }

    }
  }
}

 ?>
