<?php
$name = isset($category) ? $category->category_name : '' ;
$slug = isset($category) ? $category->category_slug : '' ;
$parent = isset($category) ? $category->category_parent : '' ;
$desc = isset($category) ? $category->category_desc : '' ;
?>

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Category</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->

  <div class="box-body">

    <form class="form-horizontal" method="post">

     <?php echo validation_errors(); ?>

     <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Slug</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="slug" value="<?php echo $slug ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Parent</label>
      <div class="col-sm-3">
        <?php 
        $field = array('0'=>'No Parent');
        foreach ($parent_list as $value) {
          $field[$value->category_id] = $value->category_name;
        }
        echo form_dropdown('parent', $field, $parent, 'class="form-control"');
        ?>
        <!-- <input type="text" class="form-control" name="parent" value="<?php echo $parent ?>"> -->
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="inputPassword3" name='desc' value="<?php echo $desc ?>">
      </div>
    </div>    

    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label"></label>
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
    
  </form>

</div>

</div>