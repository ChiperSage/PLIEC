<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="row">
  <div class="col-xs-12">

    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Users</h3>
        <a class="btn btn-default" href="<?php echo base_url('user/create_user') ?>">Add New</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Username</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; foreach ($users as $user) { $i++ ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo anchor('user/edit_user/'.$user->id, $user->username) ?></td>
                <td><?php echo $user->first_name.' '.$user->last_name ?></td>
                <td><?php echo $user->email ?></td>
                <td>
                  <?php foreach ($user->groups as $group):?>
                    <?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8').', ' ;?>
                  <?php endforeach?>
                </td>
                <td><?php echo ($user->active) ? anchor("user/deactivate/".$user->id, lang('index_active_link')) : anchor("user/activate/". $user->id, lang('index_inactive_link'));?></td>
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

