<?php

class User extends database
{
    // Add user
    public function add_product($group_id, $name)
    {
        $getall = $this->connect->prepare("INSERT INTO product (group_id, name) VALUES ( '$group_id', '$name')");
        $getall->execute();
    }
    public function update_product($group_id, $id, $name)
    {
        $getall = $this->connect->prepare("UPDATE product set group_id = '$group_id', `name`='$name' where id='$id'");
        $getall->execute();
    }

    public function delete_product($id)
    {
        $getall = $this->connect->prepare("DELETE from product  where id='$id'");
        $getall->execute();
    }

    public function add_group($group_name, $title, $content)
    {
        $getall = $this->connect->prepare("INSERT INTO `group` (group_name, title, content) VALUES ( '$group_name', '$title', '$content')");
        $getall->execute();
    }
    public function update_group($group_name, $id, $title, $content)
    {
        $getall = $this->connect->prepare("UPDATE `group` set group_name = '$group_name', title='$title', content='$content' where id='$id'");
        $getall->execute();
    }

    public function delete_group($id)
    {
        $getall = $this->connect->prepare("DELETE from `group`  where id='$id';DELETE FROM product where group_id='$id'");
        $getall->execute();
    }
    //load group
    public function load_group()
    {
        $getall = $this->connect->prepare("SELECT * FROM `group` ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    // load user
    public function load_product($id)
    {
        $getall = $this->connect->prepare("SELECT a.id,a.group_id, a.name, b.group_name FROM product a inner join `group` b on a.group_id=b.id where a.group_id='$id' order by `name` ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
}
