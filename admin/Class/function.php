<?php

    Class adminBlog {
        private $conn;

        public function __construct(){
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "blogProject";

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
    }

?>