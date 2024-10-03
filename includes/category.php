<?php 
    $getcat = $obj->display_category();

?>

<div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                      <ul>
                      <?php while($cat = mysqli_fetch_assoc($getcat)){ ?>
              <li>
                <a href="#">
                  <?php echo $cat["cat_name"];?>
          
                </a>
              </li> 
              <?php } ?>
                        <li><a href="#">- Creative &amp; Unique</a></li>
                    

                      </ul>
                    </div>
                  </div>
                </div>
          