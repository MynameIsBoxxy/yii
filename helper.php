<?
namespace app\components;

use yii\helpers\StringHelper;

class MyHelpers {
    public static function method_one(){
        return StringHelper::truncateWords('Утром, когда должна была быть репетиция в музыкальной школе , я, не теряя времени принялся делать уроки на всю неделю, после уроков я решил сделать родителям приятно и решил помыть полы, пропылесосить, и приготовить суп.', 12);
    }

    public static function method_two ($str = "created_at"){
        
        $offset = 0;
        $ar = [];
        while (($pos = strpos($str,'_',$offset)) != false){
            $ar[] = $pos;
            $offset   = $pos + 1;            
        }

        foreach(array_reverse($ar) as $key=>$val){            
            $str = substr_replace($str,'',$val,1);
            if ($val + 1 <= strlen($str)){
                $str = substr_replace($str,strtoupper($str[$val]),$val,1);
            }
        }

        return strtoupper($str[0]).substr($str,1);
        
    }

    public static function method_three(){
        //Kupi slona
        //Купи слона
        $ar = array(
            'К'=>'K', 'и'=>'i', 'о'=>'o',
            'у'=>'u', 'с'=>'s', 'н'=>'n',
            'п'=>'p', 'л'=>'l', 'а'=>'a',
        );
        return strtr("Купи слона",$ar);
    }
}
