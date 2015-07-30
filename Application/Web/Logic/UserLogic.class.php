<?php

    namespace Web\Logic;
    use Think\Model;

    class UserLogic extends Model {

        public function getAll() {
            return $this->select();
        }

        public function createUser($data) {
            return $this->add($data);
        }

        public function getOne($condition) {
            return $this->where($condition)->find();
        }
    }


