<?php
include "bot.php"; //Import functions file


$token="6085126468:AAF_x9semmfJdrtnJhmyuAjacCRCXTunYdg"; //Bot Token
$api="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";//openai ApiKey

$bot= new tgbot($token,$api); //create bot object 

$data = json_decode(file_get_contents('php://input')); //Get Updates


//Getting User Message 
$text=$data->message->text;

//Getting User Name And I'd

$firstname=$data->message->from->first_name;
//$lastname=$data->message->from->
$chat_id = $data->message->from->id;

//Checking The Message And Sending Reply
if($text=='/start'){
  $bot->send_message($chat_id,"<b> Hello $firstname Welcome To Ai Bot\n\nthis Bot Created using openai Api\n\nUse /ask command To ask questions</b>","html");
}elseif($text=='/ask' or substr($text,0,4)=='/ask'){
$msg=explode("/ask ",$text);
  $prompt=$msg[1];
  if($prompt !=""){
    $answer=$bot->get_answer($prompt);
  $bot->send_message($chat_id, $answer,"html");
  }else{
    $bot->send_message($chat_id, "<b>send like this /ask your question</b>","html");
  }
}
  
?>
