<?php 
   header("Access-Control-Allow-Origin", "*");
require_once ('vendor/autoload.php');
use \Statickidz\GoogleTranslate;

/*$source = 'en';
$target = 'ar';
$text = 'Hello guys';

$trans = new GoogleTranslate();
$result = $trans->translate($source, $target, $text);
// Good morning
echo $result;
*/
$output = array('flag'=>0,'info'=>'Incorrect message' ,  'trans'=>'');
if(isset($_POST['trans']) )
{
    $source = $_POST['src'];
    $target = $_POST['tar'];
    $text = $_POST['trans'];

    $trans = new GoogleTranslate();
    $result = $trans->translate($source, $target, $text);

    $output['flag']=1;
    $output['info']='Message Translated';
    $output['trans'] = $result;
}
else
{
    $output['info']='Could Not Translate The Message';
}
echo json_encode( $output, JSON_PRETTY_PRINT);


?>