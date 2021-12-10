<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

use App\Controller\AppController;
// use Cake\ORM\TableRegistry;
class ArticlesController extends AppController{

    public function index(){
        $query = $this->Articles->find();
        $ret = $query->select(['max_id' => $query->func()->max('id')])->first();
        $this->set('ret',$ret);
        
        $this->set('articles', $this->Articles->find('all')->where(["is_enables"=>true]));
    }

    public function view($id){
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }

    //追加
    public function add(){
        $article = $this->Articles->newEntity();
        
        $article->is_enables=true;
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('article', $article);
    }

    //編集
    public function edit($id){
        $article = $this->Articles->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your article.'));
        }

        $this->set('article', $article);
    }

    //削除（物理）
    // public function delete($id){
    //     $this->request->allowMethod(['post', 'delete']);

    //     $article = $this->Articles->get($id);
    //     if ($this->Articles->delete($article)) {
    //         $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
    //         return $this->redirect(['action' => 'index']);
    //     }
    // }


    //削除(論理)
    public function delete($id){
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->get($id);
        $article->is_enables=false;
        $article->deleted=date("Y-m-d H:i:s");
        if ($this->Articles->save($article)) {
            $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}