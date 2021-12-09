<?php

  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  header('Content-Type: application/json');
  header("Accept: application/json");
    require_once("lib/detectlanguage.php");


    use \DetectLanguage\DetectLanguage;

    DetectLanguage::setApiKey("f5608a003aadef587d313b0550f7237f");

    $output = array('flag'=>0,'msg'=>'Incorrect message' ,  'lang'=>'','local'=>'', 'code' => '');

    if(isset($_POST['msg']))
    {
        $msg = $_POST['msg'];

        $LangCode = DetectLanguage::simpleDetect($msg);
        $LangName = Locale::getDisplayLanguage($LangCode, 'Ar');
        $LangNameLocale = Locale::getDisplayLanguage($LangCode, 'en');
        

        if($LangCode){
            $output['flag']=1;
            $output['msg']=$msg;
            if ($LangCode == 'fa' ){
                $output['lang'] = "العربية";
                $output['local'] = "Arabic";
                $output['code'] = "ar";
            }
            else{
                $output['code'] = $LangCode;
                $output['lang'] = $LangName;
                $output['local'] = $LangNameLocale;
            }
        }
        else{
            $output['flag']=0;
            $output['msg']=$msg;
            $output['lang'] =$msg;
            $output['info'] ="please check your message";
        }
        if (strpos($msg, 'مرحبا') !== false || strpos($msg, 'الله') !== false || strpos($msg, 'سلام') !== false ){
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "العربية";
            $output['local'] = "Arabic";
            $output['code'] = "ar";
        }
    }
    echo json_encode( $output, JSON_PRETTY_PRINT);
?>