<?
namespace app\components;

use yii\helpers\StringHelper;
use yii\helpers\Inflector;

class MyHelpers {
    public static function method_one(){
        return StringHelper::truncateWords('Утром, когда должна была быть репетиция в музыкальной школе , я, не теряя времени принялся делать уроки на всю неделю, после уроков я решил сделать родителям приятно и решил помыть полы, пропылесосить, и приготовить суп.', 12);
    }

    public static function method_two ($str = "created_at"){
       return Inflector::camelize($str);        
    }

    public static function method_three(){

        return Inflector::transliterate("Купи слона");

    }
}
