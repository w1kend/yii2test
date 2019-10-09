<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
/**
 * 
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $text
 * @property integer $completed
 * @property integer $edited
 */
class Task extends ActiveRecord
{
    const SCENARIO_EDIT = 'edit';
    const SCENARIO_ADD = 'add';


    public function rules()
    {
        return [
            [   
                ['name', 'email', 'text'], 
                'required',
                'message' => 'Обязательно для заполнения',
                'on' => self::SCENARIO_ADD,
            ],
            [['name','email'],'trim'],
            ['name', 'validateName'],
            ['email', 'email', 'message' => 'Некорректное значение'],
            ['text', 'string', 'max' => 300],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя пользователя',
            'email' => 'Email',
            'text' => 'Текст задания',
            'completed' => 'Выполнено',
            'edited' => 'Отредактировано',
        ];
    }

    public function validateName($attribute,$params)
    {
        $len = mb_strlen($this->$attribute);
        if ($len <= 3) {
            $this->addError($attribute,'Длина имя должна быть больше 3 символов');
        }
    }

    public function pagination($orderBy,$type)
    {

    }
}