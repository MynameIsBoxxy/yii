<?
namespace app\models;

use yii\base\Model;
use app\models\ParseXml;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;

class ProductSearch extends Model{
    public $categoryId;
    public $price;
    private $_filtered = false;

    public function rules()
    {
        return [
            [['categoryId'], 'string'],
            [['price'],'integer']
        ];
    }
    public function search($params)
    {
        if ($this->load($params) && $this->validate()) {
            $this->_filtered = true;
        }

        return new \yii\data\ArrayDataProvider([
            'allModels' => $this->getData(),
            'sort' => [
                'attributes' => ['id','categoryId', 'price','hidden'],
            ], 

        ]);
    }
    protected function getData(){
       
        $categories = new ParseXml("/var/www/html/test.ru/basic/files/categories.xml");
        $categoriesArray = $categories->getArrayFromXml();

        $categoriesArray = ArrayHelper::map($categoriesArray, 'id', 'name');

        $products = new ParseXml("/var/www/html/test.ru/basic/files/products.xml");
        $data = $products->getArrayFromXml();

        for($i = 0; $i<count($data); $i++){
            $data[$i]["categoryId"] = $categoriesArray[$data[$i]["categoryId"]];
        }


        if ($this->_filtered) {
            $data = array_filter($data, function ($value) {
                $conditions = [true];
                if (!empty($this->categoryId)) {
                    $conditions[] = strpos($value['categoryId'], $this->categoryId) !== false;
                }
                 if (!empty($this->price)) {
                    $conditions[] = strpos($value['price'], $this->price) !== false;
                } 
                return array_product($conditions);
            });
        }

        return $data;
    }

}
