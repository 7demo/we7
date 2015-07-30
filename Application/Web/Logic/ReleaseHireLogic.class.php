<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/16
 * Time: 19:33
 */

namespace Web\Logic;
use Think\Model;


class ReleaseHireLogic extends Model {

    public function getAll() {
        return $this->select();
    }

    public function getById($id) {
        $condition['id'] = $id;
        return $this->where($condition)-find();
    }




    public function addOne($data) {
        $data['create_time'] = date('Y-m-d H:i:s', time());
        return $this->add($data);
    }

}
