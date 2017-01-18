<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        $adminPanel = $auth->createPermission('adminPanel');
        $adminPanel->description = 'Admin panel';
        $auth->add($adminPanel);

		$comment = $auth->createPermission('comment');
		$comment->description = 'Comment';
		$auth->add($comment);
		
		$user = $auth->createRole('user');
		$auth->add($user);
		$auth->addChild($user, $comment);
		
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);
		$auth->addChild($author, $user);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $adminPanel);
        $auth->addChild($admin, $author);

        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
}