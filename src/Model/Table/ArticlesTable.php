<?php
namespace App\Model\Table;

use Cake\ORM\Table;

use Cake\Validation\Validator;

class ArticlesTable extends Table{
    public function initialize(array $config){
        $this->addBehavior('Timestamp');
    }

    //バリデーション
    public function validationDefault(Validator $validator){
        $validator
            ->notEmpty('title',"タイトルが未入力です")
            ->requirePresence('title')
            ->notEmpty('body','本文が未入力です')
            ->requirePresence('body');
        return $validator;
    }
}