<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/16
 * Time: 19:48
 */

namespace Web\Logic;
use Think\Model;

class AdLogic extends Model {
    public function getAll () {
        return $this->select();
    }

    public function addOne($data) {
        $data['create_time'] = date('Y-m-d H:i:s', time());
        return $this->add($data);
    }

}