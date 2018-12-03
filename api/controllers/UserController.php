<?php

namespace api\controllers;

use yii\rest\ActiveController;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';
}
