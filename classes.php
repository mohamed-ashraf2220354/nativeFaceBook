<?php
abstract class users
{
    public $id;
    public $name;
    public $phone;
    protected $password;

    public $image;
    public $email;

    public $created_at;


    function __construct($id,$name,$email,$password,$phone,$image,$created_at){
        $this->id =$id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->image = $image;
        $this->created_at = $created_at;
    }



    public static function login($email, $password)
    {
        $user = null;
        $qry = "SELECT * FROM users WHERE email='$email' AND password ='$password'";
        require_once('config.php');
        $con = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($con, $qry);
        if ($arr = mysqli_fetch_assoc($rslt)){
            switch($arr["role"]){
                case 'subscriber':
                    $user = new Subscriber($arr["id"],$arr["name"],$arr["email"],$arr["phone"],$arr["password"],$arr["image"],$arr["created_at"]);
                    break;
                case 'admin':
                    $user = new Admin ($arr["id"],$arr["name"],$arr["email"],$arr["phone"],$arr["password"],$arr["image"],$arr["created_at"]);
                    break;
            }
        }
        mysqli_close($con);
        return $user;
    }


    public static function store_posts($title , $imageName ,$user_id)
    {
        $qry = "INSERT INTO posts (title ,image ,user_id) 
        VALUES('$title' , '$imageName','$user_id')";
        require_once('config.php');
        $con = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($con, $qry);
        mysqli_close($con);
        return $rslt;
    }


    public static function store_comment($comment ,$user_id)
    {
        $qry = "INSERT INTO comments (comment ,user_id) 
        VALUES('$comment' , '$user_id')";
        require_once('config.php');
        $con = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($con, $qry);
        mysqli_close($con);
        return $rslt;
    }


    public static function myposts($user_id)
    {
        $qry = "SELECT * FROM posts WHERE  user_id =$user_id ORDER BY CREATED_AT DESC" ;
        require_once('config.php');
        $con = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($con, $qry);
        $data=mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($con);
        return $data;
    }

    public static function mycomment($post_id)
    {
        $qry = "SELECT * FROM comments JOIN users on comment.user_id = user.id  WHERE  post_id =$post_id ORDER BY comments.CREATED_AT DESC" ;
        require_once('config.php');
        $con = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($con, $qry);
        $data=mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($con);
        return $data;
    }

    public static function update_user_image($imagepath,$user_id)
    {
        $qry = "UPDATE users SET image ='$imagepath' WHERE id = $user_id" ;
        require_once('config.php');
        $con = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($con, $qry);
        mysqli_close($con);
        return  $rslt;
    }

    }


class Subscriber extends users
{
    public $role = "subscriber";
    public static function signup($name, $email, $phone, $password)
    {
        $qry = "INSERT INTO users (name,email,phone,password) 
        VALUES('$name','$email','$phone','$password')";

        require_once('config.php');
        $con = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($con, $qry);
        mysqli_close($con);
        return $rslt;
    }
}
class Admin extends users
{
    public $role = "admin";


    function get_all_user(){
        $qry = "SELECT * FROM users WHERE role = 'subscriber' ORDER BY CREATED_AT" ;
        require_once('config.php');
        $con = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($con, $qry);
        $data=mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($con);
        return $data;
    }

    function get_all_post(){
        $qry = "SELECT * FROM posts ORDER BY CREATED_AT" ;
        require_once('config.php');
        $con = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($con, $qry);
        $data=mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($con);
        return $data;
    }

    function delete($user_id){
        $qry = "DELETE FROM users WHERE id =$user_id" ;
        require_once('config.php');
        $con = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($con, $qry);
        mysqli_close($con);
        return $rslt;
    }
    
    

}
