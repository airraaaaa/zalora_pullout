<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property integer $id_account
 * @property string $username
 * @property string $password
 * @property string $account_name
 * @property string $department
 *
 * @property AccountHistory[] $accountHistories
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_account', 'username', 'password', 'account_name', 'department'], 'required'],
            [['id_account'], 'integer'],
            [['username', 'password', 'account_name', 'department'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_account' => 'Id Account',
            'username' => 'Username',
            'password' => 'Password',
            'account_name' => 'Account Name',
            'department' => 'Department',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountHistories()
    {
        return $this->hasMany(AccountHistory::className(), ['fk_id_account' => 'id_account']);
    }
}
