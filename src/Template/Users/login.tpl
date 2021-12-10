<h1>login</h1>
<?php
    echo $this->Form->create($user);
    echo $this->Form->control('user_id',['required'=>'false']);
    echo $this->Form->control('passwd', ['type' => 'password','required'=>'false']);
    echo $this->Form->button(__('login'));
    echo $this->Form->end();
?>