<?php
namespace App\Model\Table;


use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PeopleTable extends Table {
	public function initialize(array $config){
        parent::initialize($config);

        $this->setTable('people');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Boards', [
            'foreignKey' => 'person_id'
        ]);
	}


	public function validationDefault(Validator $validator){
		$validator->integer('id');
		$validator->notEmpty('name','必须项目');
		$validator->integer('password','必须项目');
		$validator->integer('comment','必须项目');
		return $validator;
	}


	public function buildRules(RulesChecker $rules){
		$rules->isUnique(['name'], '登録');
		return $rules;
	}

    public function checkNameAndPass($data){
        $n = $this->find()
            ->where(['name' => $data['name']])
            ->andWhere(['password' => $data['password']])
            ->count();
        return $n > 0 ? true : false;
    }
}