<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display('Index:index');
    }

    public function tutors(){
        $Data = D('User', 'Logic');
        $this->assign('list', $Data->getOne());
        dump(session());
        $this->display('Tutor:tutors');
    }

}