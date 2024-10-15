<?php
    if(isset($_GET['status'])){
        if($_GET['status']=='edit_post'){
            $id = $_GET['id'];
        }
    }
        $post = $obj->edit_posts($id);
        if(isset($_POST['edit_post_btn'])){
            $msg = $obj->edited_post($_POST);
        }
   
?>


<h2>Edit post</h2>
<h3><?php if(isset($msg)){echo $msg;} ?></h3>
<form class="form" action="" method="post">
<input name="edit_post_id" type="hidden" value="<?php echo $id; ?>">

<div class="form-group">
    <label class=" mb-1" for="post_title">Post Title</label>
    <input value="<?php echo $post['post_title']; ?>" name="edit_post_title" class="form-control py-4" id="edit_post_title" type="text"/>
</div>
<div class="form-group">
    <label class=" mb-1" for="post_content">Post Content</label>
    <input value="<?php echo $post['post_content']; ?>" name="edit_post_content" class="form-control py-4" id="edit_post_content" type="text"/>
</div>
<div class="form-group">
    
    <input name="edit_post_btn" class="form-control btn btn-primary" id="edit_post_btn" type="submit"/>
</div>
</form>