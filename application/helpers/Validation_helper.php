
<?php
/*
Used for verfiy the email 
*/
 function verifyEmail($email)
{
  $CI =& get_instance(); 
  $CI->load->library('verifyEmail');
  $vmail = new verifyEmail();
  $vmail->setStreamTimeoutWait(20);
  $vmail->Debug= TRUE;
  $vmail->Debugoutput= 'html';
  $vmail->setEmailFrom('info.cloudevils@gmail.com');
  if ($vmail->check($email))
  {
    return 1 ;
  }
  /*elseif (verifyEmail::validate($email))
  {
    return 2;
  }*/ 
  else
  {
    return 0;
  }
    
 
}
/*
Used for verfiy the token 
*/
function verifiedToken($headers)
{
  $CI =& get_instance(); 
  $CI->load->library('Authorization_Token');
  $decodedToken = $CI->authorization_token->validateToken($headers['Authorization']);
  if(isset($decodedToken['data'])){
    $var=(array)$decodedToken['data'];
  }
  else{
    $var= MESSAGE_conf::ERROR;
  }
  return $var;
}
?>