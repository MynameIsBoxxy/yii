<?
namespace app\components;

use yii\helpers\StringHelper;
use yii\helpers\Inflector;

class MyHelpers {
    public static function method_one(){
        return StringHelper::truncateWords('Утром, когда должна была быть репетиция в музыкальной школе , я, не теряя времени принялся делать уроки на всю неделю, после уроков я решил сделать родителям приятно и решил помыть полы, пропылесосить, и приготовить суп.', 12);
    }

    public static function method_two ($str = "created_at"){
        $ar = [];
        $res = '';

        $ar = StringHelper::explode($str,'_');

        for($i = 0;$i < count($ar);$i++)
            {
                $res.= StringHelper::mb_ucwords($ar[$i]);
            }

        return $res;
        
    }

    public static function method_three(){

        return Inflector::transliterate("Купи слона");

    }
}
