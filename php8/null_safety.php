<?php

class User{
    public function address(){
        return null;
    }

    public function state(){
        return ['name'=>'Khulna'];
    }
}

$user = null;
$user2 = new User();

echo $user ?-> address() ?-> country();
echo $user2 ?-> address() ?-> country();
echo $user2 ?-> state()['name'] ?? '';