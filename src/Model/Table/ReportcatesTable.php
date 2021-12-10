<?php
namespace App\Model\Table;

use Cake\ORM\Table;

use Cake\Validation\Validator;

class ReportcatesTable extends Table{

    //この関数を追加します
    public static function defaultConnectionName(){
        return 'sharerepo';
    }

}