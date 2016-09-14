<?php
/**
 * Created by PhpStorm.
 * User: Azamat_Nurzhanuly
 * Date: 14.09.16
 * Time: 15:28
 */

namespace app\rbac;


use yii\helpers\ArrayHelper;
use yii\rbac\Rule;
use app\models\User;

class UserRoleRule extends Rule
{
    public $name = 'userRole';

    public function execute($user, $item, $params)
    {
        $user = ArrayHelper::getValue($params, 'user', User::findByUsername($user));

        if($user)
        {
            $role = $user->role;

            if($item->name === 'admin')
            {
                return $role == User::ROLE_ADMIN;

            } elseif ($item->name === 'moder') {

                return $role == User::ROLE_ADMIN || $role == User::ROLE_MODER;

            } elseif ($item->name === 'user') {

                return $role == User::ROLE_USER || $role == User::ROLE_ADMIN || $role == User::ROLE_MODER;
            }
        }

        return false;
    }
}