<?php
    $cat_name = $obj->display_category();
?>

<h2>add post page</h2>

<form action="" method="POST" enctype="mutlipart/form-data">
<div class="form-group">
    <label class=" mb-1" for="post_title">Post title</label>
    <input name="post_title" class="form-control py-4" id="post_title" type="text"/>
</div>
<div class="form-group">
    <label class=" mb-1" for="post_content">Post content</label>
    <textarea class="form-control py-4" name="post_content" id="post_content"></textarea>
</div>
<div class="form-group">
    <label class=" mb-1" for="post_img">Post img</label>
    <input name="post_img" id="post_img" type="file"/>
</div>
<div class="form-group">
    <label class=" mb-1" for="post_ctg">Select Post Category</label>
   <select class="form-control" name="post_ctg" id="post_ctg">
    <?php while($category = mysqli_fetch_assoc($cat_name)){ ?>
        <option value="<?php echo $category['cat_id'] ?>"><?php echo $category['cat_name'] ?></option>

        <?php } ?>
   </select>
</div>
<div class="form-group">
    <label class=" mb-1" for="post_summery">Post summery</label>
    <input name="post_summery" class="form-control py-4" id="post_summery" type="text"/>
</div>
<div class="form-group">
    <label class=" mb-1" for="post_tag">Post tags</label>
    <input name="post_tag" class="form-control py-4" id="post_tag" type="text"/>
</div>
<div class="form-group">
    <label class=" mb-1" for="post_status">Post status</label>
    <select class="form-control" name="post_status" id="post_status">
        <option value="1">Publish</option>
        <option value="0">Unpublish</option>

    </select>
</div>
<input type="submit" value="Add post" name="add_post" class="form-control btn btn-block btn-primary">
</form>