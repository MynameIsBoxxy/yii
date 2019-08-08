<?
namespace app\models;


use yii\base\Model;

class ParseXml extends Model{
    private $pathToFile;

    public function __construct($path){
        $this->pathToFile = $path;
    }
    public function getArrayFromXml(){
        $myxml = new \SimpleXMLElement($this->pathToFile,NULL,TRUE);
        $arr = array();
        foreach ($myxml as $key) {
            $arvalue = (array)$key;
            $arr[] = $arvalue;
        }
        return $arr;
    }
}
