<?php include 'dashboard.php';?>
    <div class="table-responsive" id="ArrivalClearance_table" >

        <h3> ISSUE SHORE PASSES </h3>
        <div class="errors">
            <?php if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
            ?>
            <?php echo validation_errors(); ?>
        </div>
        <table id="issueShorepassTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th>Shore Pass ID</th>
                <th>Voyage ID</th>
                <th>Ship Name</th>
                <th>IMO No</th>
                <th>Agent Name</th>
                <th>Arrival Date</th>
                <th>Ship Clearance Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($Shorepasses as $Shorepass): ?>
                <tr>
                    <td><?php echo $Shorepass->shorepass_id; ?></td>
                    <td><?php echo $Shorepass->voyage_id; ?></td>
                    <td><?php echo $Shorepass->ship_name; ?></td>
                    <td><?php echo $Shorepass->imo_no; ?></td>
                    <td><?php echo $Shorepass->agentcompanyname; ?></td>
                    <td><?php echo $Shorepass->arr_date; ?></td>
                    <td><?php echo ($Shorepass->status == 'APPROVED') ? 'Issued' : 'Not Issued'; ?>
                    </td>
                    <td>
                        <?php if ($Shorepass->status == 'APPROVED'): ?>
                            <a href="<?= base_url('Officer/notIssueShore/'.$Shorepass->shorepass_id) ?>">Not Issue</a>
                        <?php else: ?>
                            <a href="<?= base_url('Officer/IssueShore/'.$Shorepass->shorepass_id) ?>">Issue</a>
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
            $("#Link4").addClass("active");

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#issueShorepassTable').DataTable();
        });
    </script>



<?php include 'Files/footer.php';
