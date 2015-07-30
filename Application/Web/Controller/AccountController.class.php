<?php
namespace Web\Controller;
use Think\Controller;
class AccountController extends Controller {

    public function register() {
        if (IS_POST) {
            $register = D('User', 'Logic');
            $registerData['name'] = I('post.phone');
            $registerData['password'] = I('post.pwd');
            $registerResult = $register->createUser($registerData);
            if ($registerResult === false) {
                $this->ajaxReturn(array('code' => 550, 'desc' => '注册失败', 'data' => ''));
            } else {
                $data = $register->getAll();
                $this->ajaxReturn(array('code' => 220, 'desc' => '注册成功', 'data' => $data));
            }
        }
    }

    public function login() {
        if (IS_POST) {
            $User = D('User', 'Logic');
            $condition['name'] = I('post.name');
            $condition['password'] = I('post.pwd');
            $list = $User->getOne($condition);

            if (!$list) {
                $this->ajaxReturn(array('code' => 550, 'desc' => '登录失败', 'data' => $list, 'd' => $condition));
            } else {
                session('USER', $list['name']);
                $this->ajaxReturn(array('code' => 220, 'desc' => '登录成功', 'data' => $list));
            }

        }
    }

}