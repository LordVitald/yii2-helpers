<?php
/**
 * @link https://github.com/borodulin/yii2-helpers
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-helpers/blob/master/LICENSE
 */

namespace conquer\helpers;

use yii\web\JsExpression;

/**
 * Gives ability to using js: prefix 
 */
class Json extends \yii\helpers\BaseJson
{
    /**
     * @inheritdoc
     */
    public static function encode($value, $options = 320)
    {
    	array_walk_recursive($value, function(&$item){
    		if(is_string($item) && (strpos('js:', $item)==0))
    			$item = new JsExpression(substr($item,3));
    	});
    	return parent::encode($value, $options);
    }
}