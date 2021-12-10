<?php
namespace App\Model\Table;

use Cake\ORM\Table;

use Cake\Validation\Validator;

class ReportsTable extends Table{

    //この関数を追加します
    public static function defaultConnectionName(){
        return 'sharerepo';
    }

    //バリデーション
    public function validationDefault(Validator $validator){
        $validator
            ->notEmpty('rp_date',"作業日が未入力です")
            ->requirePresence('rp_date')
            ->notEmpty('rp_time_from','作業開始日が未入力です')
            ->requirePresence('rp_time_from')
            ->notEmpty('rp_time_to','作業終了日が未入力です')
            ->requirePresence('rp_time_to')
            ->notEmpty('rp_content','作業内容が未入力です')
            ->requirePresence('rp_content')
            ->notEmpty('reportcate_id','作業種類が未入力です')
            ->requirePresence('reportcate_id');
        return $validator;
    }
}