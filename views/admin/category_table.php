<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Categories</h3>

        <a class="btn btn-default" href="<?php echo base_url('category/create') ?>">Add New</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <?php echo $this->session->flashdata('msg') ?>

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="50">No.</th>
              <th>Nama</th>
              <th>Slug</th>
              <th>Desc</th>
              <th>Parent</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; foreach ($categories as $value) { $i++ ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo anchor('category/update/'.$value->category_id, $value->category_name) ?></td>
                <td><?php echo $value->category_slug ?></td>
                <td><?php echo $value->category_desc ; ?></td>
                <td><?php echo ($value->category_parent == '') ? 'No Parent' : $value->category_parent ; ?></td>
                <td width="100"><a href="<?php echo site_url('category/update/'.$value->category_id) ?>"><i class="fa fa-edit"></i></a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

<!-- DataTables -->
<script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

