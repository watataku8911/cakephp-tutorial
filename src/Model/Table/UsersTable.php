<?php
namespace App\Model\Table;

use Cake\ORM\Table;

use Cake\Validation\Validator;

class UsersTable extends Table{

    // //この関数を追加します
    // public static function defaultConnectionName(){
    //     return 'sharerepo';
    // }

    //バリデーション
    public function validationDefault(Validator $validator){
        $validator
            ->notEmpty('mail',"メールアドレスが未入力です")
            ->requirePresence('mail')
            ->notEmpty('passwd','パスワードが未入力です')
            ->requirePresence('passwd');
        return $validator;
    }
}