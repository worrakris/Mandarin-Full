<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ZHtml
 *
 * @author Worrakris
 */
class ZHtml extends CHtml {
    
    public static function enumDromDownList($model, $attribute, $htmlOptions=array()) {
        return CHtml::activeDropDownList($model, $attribute, self::enumItem($model, $attribute), $htmlOptions);
    }
    
    public static function enumDromDownListUpdate($model, $attribute, $htmlOptions=array()) {
        return CHtml::activeDropDownList($model, $attribute, self::enumItem2($model, $attribute), $htmlOptions);
    }
    
    public static function enumItem($model, $attribute) {
        $attr = $attribute;
        self::resolveName($model, $attr);
        preg_match('/\((.*)\)/', $model->tableSchema->columns[$attr]->dbType, $matches);
        $values[''] = "All";
        foreach (explode("','", $matches[1]) as $value) {
            $value = str_replace("'", NULL, $value);
            $values[$value] = Yii::t('enumItem', $value);
        }
        return $values;
    }
    
    public static function enumItem2($model, $attribute) {
        $attr = $attribute;
        self::resolveName($model, $attr);
        preg_match('/\((.*)\)/', $model->tableSchema->columns[$attr]->dbType, $matches);
        foreach (explode("','", $matches[1]) as $value) {
            $value = str_replace("'", NULL, $value);
            $values[$value] = Yii::t('enumItem', $value);
        }
        return $values;
    }
}
