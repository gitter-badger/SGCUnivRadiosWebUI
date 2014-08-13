<div class="jumbotron" style="background:#000 url('<?php print(base_url('assets/img/miscellaneous/jumbotron.png')); ?>') repeat 0 0">
        <div class="container">
                <h1 style="color:#666">Admin UI</h1>
                <h3 style="color:#555">&nbsp;</h3>
        </div>
</div>
<div class="container">
        <div class="row">
                <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#general" role="tab" data-toggle="tab">General</a></li>
                        <li><a href="#users" role="tab" data-toggle="tab">Users</a></li>
                        <li><a href="#radios" role="tab" data-toggle="tab">Radios</a></li>
                </ul>
                <div class="tab-content">
                        <div class="tab-pane active" id="general">
                                
                        </div>
                        <div class="tab-pane" id="users" style="background-color:#fff;border:1px solid #ddd;">
                                <table class="table">
                                        <thead>
                                                <tr>
                                                        <th width="10%">#</th>
                                                        <th width="35%">Username</th>
                                                        <th width="25%">Creation date</th>
                                                        <th width="20%">Role</th>
                                                        <th width="10%">Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php foreach($users as $user): ?>
                                                <tr>
                                                        <td><?php print($user->id); ?></td>
                                                        <td><?php print($user->username); ?></td>
                                                        <td><?php print(gmdate("Y/m/d H:i:s", $user->creation_ts)) ?></td>
                                                        <td><?php print($user->role == 0 ? 'Admin':'User'); ?></td>
                                                        <td><button class="btn btn-success btn-sm btn-edit-user" data-id="<?php print($user->id); ?>"><span class="glyphicon glyphicon-pencil"></span></button></td>
                                                </tr>
                                                <?php endforeach; ?>
                                        </tbody>
                                </table>
                        </div>
                        <div class="tab-pane" id="radios">
                                
                        </div>
                </div>
        </div>
</div>

<div class="modal fade" id="user_action" tabindex="-1" role="dialog" aria-labelledby="user_actionLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="user_actionLabel">Edit user</h4>
                        </div>
                        <div class="modal-body">
                                <?php print(form_open('#', array('class' => 'form-signin'))); ?>
                                        <div class="alert alert-danger alert-dismissible" role="alert" style="display:none;"></div>
                                        <label for="username">Username <span class="label label-default">required</span> :</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                                        <br/>
                                        <label for="username">Change password <span class="label label-default">optional</span> :</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                        <br/>
                                        <label for="username">Confirm password <span class="label label-default">optional</span> :</label>
                                        <input type="password" class="form-control" id="passwordconf" name="passwordconf" placeholder="Confirm password" />
                                        <br/>
                                        <label for="rolecb">Select a role <span class="label label-default">required</span> :</label>
                                        <select class="form-control" id="rolecb" name="rolecb" placeholder="Role">
                                                <option value="1">User</option>
                                                <option value="0">Admin</option>
                                        </select>
                                </form>
                        </div>
                        <div class="modal-footer">
                                <div id="status_div" class="pull-left"></div>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>&nbsp;Close</button>
                                <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</button>
                                <button type="button" class="btn btn-success btn-form-valid"><span class="glyphicon glyphicon-ok"></span>&nbsp;Save</button>
                        </div>
                </div>
        </div>
</div>

<script src="<?php print(base_url('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php print(base_url('assets/js/vendor/jquery.ui.widget.js')); ?>"></script>
<script src="<?php print(base_url('assets/js/bootstrap.min.js')); ?>"></script>

<script type="text/javascript">
        $('#myTab a').click(function(e) {
                e.preventDefault();
                $(this).tab('show');
        });
        var userId = 0;
        $('.btn-edit-user').click(function(e) {
                e.preventDefault();
                userId = $(this).attr('data-id');
                $('#status_div').html('Loading user <span id="user_id">'+userId+'</span> ...');
                $('#user_action').modal({ keyboard: false }, 'show');
        });
        $('#user_action').on('shown.bs.modal', function(e) {
                $.ajax({
                        url: '<?php print(base_url('ajax/admin/user/load')); ?>:'+userId,
                        dataType: 'json'
                })
                .done(function(data) {
                        if (data.rc == 0) {
                                $('#username').val(data.username);
                                $('#rolecb option[value="'+data.role+'"]').attr('selected', 'selected');
                                $('#password, #passwordconf').val('');
                                if (data.role == 0 && data.nbAdmins >= 1) {
                                        $('.btn-danger').hide();
                                        $('#rolecb').attr('disabled', 'disabled');
                                }
                                $('#status_div').empty();
                        } else {
                                
                        }
                });
        });
        var changes = 0;
        $('.form-control').change(function(e) {
                e.preventDefault();
                changes = 1;
        });
        $('.btn-form-valid').click(function(e) {
                e.preventDefault();
                if (changes == 1) {
                        $.ajax({
                                type: 'POST',
                                url: '<?php print(base_url('ajax/admin/user/save')); ?>',
                                data: {'ID':userId,'username':$('#username').val(),'password':$('#password').val(),'passwordconf':$('#passwordconf').val(),'role':$('#rolecb').val()},
                                success: function(data) {
                                        if (data.rc == 0) {
                                                location.reload();
                                        } else {
                                                $('.alert-danger').text(data.rcMsg);
                                        }
                                },
                                dataType: 'json'
                        });
                } else {
                        $('#user_action').modal('hide');
                }
        });
</script>
