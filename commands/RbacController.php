<?php
/**
 * Created by PhpStorm.
 * User: Azamat_Nurzhanuly
 * Date: 14.09.16
 * Time: 14:04
 */

namespace app\commands;


use yii\console\Controller;
use app\rbac\UserRoleRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth  = \Yii::$app->authManager;
        $auth->removeAll();

        $login = $auth->createPermission('login');
        $logout = $auth->createPermission('logout');
        $create = $auth->createPermission('create');
        $update = $auth->createPermission('update');
        $delete = $auth->createPermission('delete');

        $auth->add($login);
        $auth->add($logout);
        $auth->add($create);
        $auth->add($update);
        $auth->add($delete);

        $rule = new UserRoleRule();
        $auth->add($rule);

        $user = $auth->createRole('user');
        $user->ruleName = $rule->name;
        $auth->add($user);
        $auth->addChild($user, $login);

        $moder = $auth->createRole('moder');
        $moder->ruleName = $rule->name;
        $auth->add($moder);
        $auth->addChild($moder, $user);
        $auth->addChild($moder, $logout);
        $auth->addChild($moder, $create);
        $auth->addChild($moder, $update);

        $admin = $auth->createRole('admin');
        $admin->ruleName = $rule->name;
        $auth->add($admin);
        $auth->addChild($admin, $moder);
        $auth->addChild($admin, $delete);
    }
}