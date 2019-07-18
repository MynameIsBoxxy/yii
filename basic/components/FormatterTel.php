<?
/*

в файле config/web в секцию components добавляем

        'formatter' => [
            'class' => 'app\components\FormatterTel',
        ],
Во вьюхе подключаем 
use app\components\FormatterTel;

Используем 
echo Yii::$app->formatter->asTel('89108540678','7 (999) 555-65-99');
*/
namespace app\components;

class FormatterTel extends \yii\i18n\Formatter{
    public function asTel($value,$mask='7(999)-999-99-99'){
        $ar = ['(',')','-',' '];
        $ar1=[];
        
        for($i = 0; $i < strlen($mask); $i++){
            
            if (in_array($mask[$i],$ar)){
                $ar1[$i] = $mask[$i];
            }
            
        }
        foreach($ar1 as $key=>$val){
            $value = substr_replace($value,$val,$key,0);
        }
        return $value;
    }
}