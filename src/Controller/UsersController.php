<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
// use Cake\ORM\TableRegistry;
class UsersController extends AppController{

    public function login(){
       if($this->request->is('post')) {
        $user = $this->Auth->identify();

        if ($user){
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            $this->Flash->error('ログインエラーです');
        }
        $this->set('user', $user);
    }
}