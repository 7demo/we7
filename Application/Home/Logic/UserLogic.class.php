<?php

    namespace Home\Logic;
    use Think\Model;

    class UserLogic extends Model {

        public function getOne() {
            return $this->select();
        }

        public function makeSubject($data) {
            return $this->add($data);
        }
    }


