<?php
   
   header("Access-Control-Allow-Origin", "*");

    require_once("lib/detectlanguage.php");

    use \DetectLanguage\DetectLanguage;
    
    DetectLanguage::setApiKey("f5608a003aadef587d313b0550f7237f");
    
    // Enable secure mode if passing sensitive information
    // DetectLanguage::setSecure(true);
    /*Array
    (
        [0] => stdClass Object
        (
            [language] => es
            [isReliable] => 1
            [confidence] => 10.24
        )
    )*/
    // DetectLanguage::detect("Buenos dias señor");
    // simple detect
    //DetectLanguage::simpleDetect("اهلا");
    //$languageCode = DetectLanguage::simpleDetect("اهلا");
    //echo $languageCode;
    
    $output = array('flag'=>0,'msg'=>'Incorrect message' ,'src'=>'',  'lang'=>'');
    if(isset($_POST['msg']))
    {
       $msg = $_POST['msg'];
      $result = DetectLanguage::simpleDetect($msg);
      $output['src']=$result;
      if($result == 'ar')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Arabic";
        }
      else if($result == 'en')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "English";
        }
        else if($result == 'ja')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Japanese";
        }
        else if($result == 'de')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "German";
        }
        else if($result == 'fr')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "French";
        }
        else if($result == 'zh')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Chinese";
        }
        else if($result == 'el')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Greek";
        }
        else if($result == 'hi')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Hindi";
        }
        else if($result == 'it')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Italian";
        }
        else if($result == 'ku')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Korean";
        }
        else if($result == 'la')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Latin";
        }
        else if($result == 'ru')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Russian";
        }
        else if($result == 'es')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Spanish";
        }
        else if($result == 'tr')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Turkish";
        }
        else if($result == 'uk')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Ukrainian";
        }
        else if($result == 'sv')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Swedish";
        }
        else if($result == 'id')
        {
            $output['flag']=1;
            $output['msg']=$msg;
            $output['lang'] = "Indonesian";
        }
        else
        {
            $output['flag']=0;
            $output['msg']=$msg;
            $output['lang'] ="Not Found";
            $output['info'] ="please check your message";
        }
    
    }
    echo json_encode( $output, JSON_PRETTY_PRINT);
    
    ?>