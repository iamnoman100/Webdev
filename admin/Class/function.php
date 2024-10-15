<?php

    Class adminBlog {
        private $conn;

        public function __construct(){
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "blogproject";

            $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            if(!$this->conn){
                die("Database connection error");
            }
        }

        public function admin_login($data){
            $admin_email = $data['admin_email'];
            $admin_pass = md5($data['admin_pass']);

            $query = "SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";

            if(mysqli_query($this->conn, $query)){
                $admin_info = mysqli_query($this->conn, $query);
                if($admin_info){
                    header("location:dashboard.php");
                    $admin_data = mysqli_fetch_assoc($admin_info);
                    session_start();
                    $_SESSION["admin_ID"] = $admin_data["id"];
                    $_SESSION["name"] = $admin_data["admin_name"];

                }
            }
        }
        public function admin_logout(){
            unset($_SESSION['admin_ID']);
            unset($_SESSION['name']);
            header("location: index.php");
        }
        public function add_category($data){
            $cat_name = $data['cat_name'];
            $cat_des = $data['cat_des'];
            $query = "INSERT INTO category(cat_name, cat_des) VALUE('$cat_name', '$cat_des') ";

            if(mysqli_query($this->conn, $query)){
                return "Page added successfully";
            }
        }
        public function display_category(){
            $query = "SELECT * FROM category";
            if(mysqli_query($this->conn, $query)){
                $categories = mysqli_query($this->conn, $query);
                return $categories;
            }
        }
        public function delete_cat($id){
            $query = "DELETE FROM category WHERE cat_id=$id";
            if(mysqli_query($this->conn, $query)){
                return "deleted successfully";
            }
        }

        public function display_cat_data($id){
            $query = "SELECT * FROM category WHERE cat_id=$id";
            if(mysqli_query($this->conn, $query)){
                $cat_datas = mysqli_query($this->conn, $query);
                $cat_data = mysqli_fetch_assoc($cat_datas);
                return $cat_data;
            }
        }

        public function update_cat($data){
            $cat_id = $data['edit_id'];
            $u_cat_name = $data['u_cat_name'];
            $u_cat_des = $data['u_cat_des'];
            $query = "UPDATE category SET cat_name='$u_cat_name', cat_des='$u_cat_des' WHERE cat_id=$cat_id";
            if(mysqli_query($this->conn, $query)){
                return "updated successfully";
            }

        }

        public function add_post($data){
            $post_title = $data['post_title'];
            $post_content = $data['post_content'];
            $post_img = $_FILES['post_img']['name'];
            $post_img_tmp = $_FILES['post_img']['tmp_name'];
            $post_ctg = $data['post_ctg'];
            $post_summery = $data['post_summery'];
            $post_tag = $data['post_tag'];
            $post_status = $data['post_status'];

            $query = " INSERT INTO posts(post_title,post_content,post_img,post_ctg,post_author,post_date,post_tag,post_comment_count,post_summery,post_status) VALUES('$post_title','$post_content','$post_img',$post_ctg,'Admin',now(),'$post_tag',3,'$post_summery',$post_status) ";
                if(mysqli_query($this->conn, $query)){
                    move_uploaded_file($post_img_tmp, "../upload/".$post_img);
                    return 'Post added successfully';
                }
        }

        public function display_posts(){
            $query = "SELECT * FROM post_with_ctg";
            if(mysqli_query($this->conn, $query)){
                $posts = mysqli_query($this->conn, $query);
                return $posts;
            }
        }

        public function display_posts_public(){
            $query = "SELECT * FROM post_with_ctg WHERE post_status = 1 ";
            if(mysqli_query($this->conn, $query)){
                $posts = mysqli_query($this->conn, $query);
                return $posts;
            }
        }
        public function edit_post_img($data){
           $img = $_FILES['edit_post_img']['name'];
           $tmp_name = $_FILES['edit_post_img']['tmp_name'];
           $img_id = $data['edit_img_id'];

           $query = "UPDATE posts SET post_img='$img' WHERE post_id=$img_id";

           if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_name, "../upload/".$img);
            return "Image updated successfully";
           }
    }

    public function edit_posts($id){
        $query = "SELECT * FROM posts WHERE post_id=$id";
        if(mysqli_query($this->conn, $query)){
            $posts = mysqli_query($this->conn, $query);
            $post = mysqli_fetch_assoc($posts);
            return $post;
        }
    }

    public function edited_post($data){
        $edit_post_id = $data['edit_post_id'];
        $edit_post_title = $data['edit_post_title'];
        $edit_post_content = $data['edit_post_content'];

        $query = "UPDATE posts SET post_title='$edit_post_title', post_content='$edit_post_content' WHERE post_id=$edit_post_id";

        if(mysqli_query($this->conn, $query)){
            return "post updated successfully";
        }
    }
}

?>