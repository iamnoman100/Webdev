<?php
     
    include("Class/function.php");
    $obj = new adminBlog();
    session_start();
      $id = $_SESSION["admin_ID"];
      if($id==null){
        header("location: index.php");
      }
      if(isset($_GET['admin_logout'])){
        if($_GET['admin_logout'] == 'logout'){
            $obj->admin_logout();
        }
      }
?>

<?php include_once("includes/head.php")?>
    <body class="sb-nav-fixed">
        <?php include_once("includes/topnav.php")?>
        <div id="layoutSidenav">
          <?php include_once("includes/sidenav.php")?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <?php
                            if(isset($view)){
                                if($view == "dashboard"){
                                    include("view/dash_view.php");
                                }else if($view == "add post"){
                                    include("view/add_post_view.php");
                                }else if($view == "manage post"){
                                    include("view/manage_post_view.php");
                                }else if($view == "add category"){
                                    include("view/add_cat_view.php");
                                }else if($view == "manage category"){
                                    include("view/manage_cat_view.php");
                                }else if ($view == "edit category"){
                                    include("view/edit_cat_view.php");
                                }
                            }
                        ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
      <?php include_once("includes/script.php")?>
    </body>
</html>
