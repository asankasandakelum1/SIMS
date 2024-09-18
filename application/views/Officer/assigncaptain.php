<?php include 'dashboard.php';?>
    <div class="table-responsive" id="userroles_table" >

        <h3> ASSIGN SHIP CAPTAIN </h3>
        <div class="errors">
            <?php if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
            ?>
            <?php echo validation_errors(); ?>
        </div>
        <table id="shipCaptainTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th>Ship Captain ID</th>
                <th>Ship Name</th>
                <th>Agent Company Name</th>
                <th>Arrival Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($shipassigns as $shipassign): ?>
                <tr>
                    <td><?php echo $shipassign->shipcap_id; ?></td>
                    <td><?php echo $shipassign->ship_name; ?></td>
                    <td><?php echo $shipassign->agentcompanyname; ?></td>
                    <td><?php echo $shipassign->arr_date; ?></td>
                    <td><?php echo ($shipassign->status == 'APPROVED') ? 'Assigned' : 'Not Assigned'; ?>
                    </td>
                    <td>
                        <?php if ($shipassign->status == 'APPROVED'): ?>
                            <a href="<?= base_url('Officer/dectivateAssign/'.$shipassign->shipcap_id) ?>">Deactivate</a>
                            <a>  |  </a>
                            <a href="<?= base_url('Officer/deleteAssign/'.$shipassign->shipcap_id) ?>">Delete</a>
                        <?php else: ?>
                            <a href="<?= base_url('Officer/ActivateAssign/'.$shipassign->shipcap_id) ?>")>Activate</a>
                            <a>  |  </a>
                            <a href="<?= base_url('Officer/deleteAssign/'.$shipassign->shipcap_id) ?>">Delete</a>
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
            $("#Link2").addClass("active");

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#shipCaptainTable').DataTable();
        });
    </script>

<?php include 'Files/footer.php';
