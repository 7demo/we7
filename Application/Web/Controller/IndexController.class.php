<?php
namespace Web\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
        $this->display('Index:index');
    }

    public function tutor(){
        $this->display('Index:tutors');
    }

    public function tutor_info(){
        $this->display('Index:tutors_info');
    }

    public function rlease(){
        $this->display('Index:rlease');
    }

    public function order(){
        $this->display('Index:order');
    }

    public function order_detail(){
        $this->display('Index:order_detail');
    }

    public function myset(){
        $this->display('Index:myset');
    }

    public function info(){
        $this->display('Index:info');
    }
    public function login(){
        $this->display('Index:login');
    }

    public function download(){
        $this->display('Index:download');
    }

    public function downloadIos(){
        $this->display('Index:downloadios');
    }

    public function downloadAndroid(){
        $this->display('Index:downloadandroid');
    }

    public function test(){

        $Data = D('Ad', 'Logic');
        $list = $Data->getAll();
        $select = $Data->getById(3);
//        $add = $Data->addOne(null,'77','增加测试1','/upload/');
        $addData['website'] = '77';
        $addData['title'] = '测试增加1';
        $addData['picture'] = '/upload/';
        $addData['order'] = '0';
        $addData['is_open'] = '0';
        $addData['type'] = '0';
        $addData['url'] = 46;
        $addData['orders'] = 0;
        $addData['autor'] = 1;
        $Data->addOne($addData);
//        $this->adLogic->addOne($addData);
        $this->assign('list', $list);
        $this->assign('select', $select);

//        $_SESSION['name'] = '用户1';
        $_SESSION = array();

        dump($_SESSION);
        $this->display('Index:test');


//        dump(session());
//        $this->display('Tutor:tutors');
    }

}