<?php include 'dashboard.php';?>



<div class="table-responsive" id="userroles_table" >

    <h3> USER ROLE MANAGEMENT </h3>
    <div class="errors">
        <?php if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
        }
        ?>
        <?php echo validation_errors(); ?>
    </div>
    <table id="userTable" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>User Category</th>
            <th>Company Name (If any)</th>
            <th>Officer ID (If any)</th>
            <th>Account Status</th>
            <th>Change Status or Delete</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user->uid; ?></td>
                <td><?php echo $user->uname; ?></td>
                <td><?php echo $user->fname; ?></td>
                <td><?php echo $user->lname; ?></td>
                <td><?php echo $user->uemail; ?></td>
                <td><?php echo $user->ucategory; ?></td>
                <td><?php echo $user->agentname; ?></td>
                <td><?php echo $user->officerid; ?></td>
                <td><?php echo ($user->ustatus == 1) ? 'Active' : 'Inactive'; ?>


                </td>
                <td>
                    <?php if ($user->ustatus == 1): ?>
                        <a href="<?= base_url('admin/deactivateUser/'.$user->uid) ?>">Deactivate</a>
                        <a>  |  </a>
                        <a href="<?= base_url('admin/deleteUser/'.$user->uid) ?>">Delete</a>
                    <?php else: ?>
                        <a href="<?= base_url('admin/activateUser/'.$user->uid) ?>")>Activate</a>
                        <a>  |  </a>
                        <a href="<?= base_url('admin/deleteUser/'.$user->uid) ?>">Delete</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


</div>

    <script>
        $(document).ready(function(){
            // Set user_roles_link as active on page load
            $(".btn-sidebar").removeClass("active");
            $("#user_roles_link").addClass("active");

        });
    </script>


</div>

<?php include 'Files/footer.php';