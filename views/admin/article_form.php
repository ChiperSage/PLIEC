<script type="text/javascript" src="<?php echo base_url() ?>vendor/ckeditor/ckeditor/ckeditor.js"></script>

<!-- tag-it -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>vendor/tag-it/css/jquery.tagit.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>vendor/tag-it/css/tagit.ui-zendesk.css">
<script src="<?php echo base_url() ?>vendor/tag-it/js/tag-it.min.js" type="text/javascript"></script>
<script>
    $(function(){
        $('#myTags').tagit();            
    });
</script>

<!-- multiple-select -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>vendor/multiple-select/multiple-select.css">
<script src="<?php echo base_url() ?>vendor/multiple-select/multiple-select.js" type="text/javascript"></script>
<script>
    $(function() {
        $('#ms').change(function() {
            // console.log($(this).val());
        }).multipleSelect({
            width: '100%',
        });
    });
</script>

<style type="text/css" media="screen">
    .parent-0{font-weight: bold;}
</style>

<?php 
$title       = isset($article) ? $article->post_title : '';
$content     = isset($article) ? $article->post_content : '';
$datetime    = isset($article) ? $article->post_date : date('Y-m-d H:i:s') ;
$status      = isset($article) ? $article->post_status : 'publish' ;
$tag         = isset($article) ? $article->post_tag : '';
$type        = isset($article) ? $article->post_type : 'post';
$category_id = isset($article) ? $article->post_category : '' ;

if(!is_numeric($category_id) || !empty($category_id)){
    $category_id = unserialize($category_id);
}
if($status == 'publish'){
    $publish = true;
    $draft = false;
}else{
    $publish = false; 
    $draft = true; 
}
?>

<div class="row">
    <div class="col-xs-12">

        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Add New Post</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form name="form1" method="post">
                    <?php echo validation_errors() ?>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" value="<?php echo $title ?>" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea id="editor1" name="content" placeholder="Enter content here" class="form-control"><?php echo $content ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <input type="text" id="myTags" name="tag" class="form-control" value="<?php echo $tag ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Datetime</label>
                                <input type="text" name="datetime" class="form-control" value="<?php echo $datetime ?>">
                            </div>
                            <div class="form-group">
                                <label>Status</label><br>
                                <?php
                                echo form_radio('status', 'publish', $publish).' Publish ';
                                echo form_radio('status', 'draft', $draft).' Draft';
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <?php
                                $field = array();
                                foreach ($category_list as $value) {
                                    $field[$value->category_id] = ($value->category_parent == 0) ? ' '.$value->category_name.' [Parent]' : $value->category_name ;
                                }
                                echo form_dropdown('category_id[]', $field, $category_id, 'id="ms" multiple');
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <?php
                                $field = array('post'=>'Post','page'=>'Page');
                                echo form_dropdown('type', $field, $type, 'class="text-uppercase form-control"');
                                ?>
                            </div> 
                            <button name="submit" class="btn btn-info">Update</button>
                            <a href="<?php echo base_url('article') ?>" class="btn btn-danger">Back</a>
                        
                        </div>
                        <div class="clearfix"></div>            
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace( 'editor1', {
      height: 260
  } );
</script>