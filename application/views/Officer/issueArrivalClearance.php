<?php include 'dashboard.php';?>
    <div class="table-responsive" id="ArrivalClearance_table" >

        <h3> ISSUE ARRIVAL CLEARANCE </h3>
        <div class="errors">
            <?php if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
            ?>
            <?php echo validation_errors(); ?>
        </div>
        <table id="issueArrivalClearanceTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th>Clearance ID</th>
                <th>Voyage ID</th>
                <th>Ship Name</th>
                <th>IMO No</th>
                <th>Ship Flag</th>
                <th>Agent Name</th>
                <th>Arrival Date</th>
                <th>Arrival Time</th>
                <th>Last Port</th>
                <th>Next Port</th>
                <th>Crew Count</th>
                <th>Crew Sign On</th>
                <th>Crew Sign Off</th>
                <th>Pax Count</th>
                <th>Pax On</th>
                <th>PAx Off</th>
                <th>Stowaway Count</th>

                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($Clearances as $Clearance): ?>
                <tr>
                    <td><?php echo $Clearance->clearance_id; ?></td>
                    <td><?php echo $Clearance->voyage_id; ?></td>
                    <td><?php echo $Clearance->ship_name; ?></td>
                    <td><?php echo $Clearance->imo_no; ?></td>
                    <td><?php echo $Clearance->ship_flag; ?></td>
                    <td><?php echo $Clearance->agentcompanyname; ?></td>
                    <td><?php echo $Clearance->arr_date; ?></td>
                    <td><?php echo $Clearance->arr_time; ?></td>
                    <td><?php echo $Clearance->lastport; ?></td>
                    <td><?php echo $Clearance->nextport; ?></td>
                    <td><?php echo $Clearance->crewcount; ?></td>
                    <td><?php echo $Clearance->signon_count; ?></td>
                    <td><?php echo $Clearance->signoff_count; ?></td>
                    <td><?php echo $Clearance->paxcount; ?></td>
                    <td><?php echo $Clearance->paxon_count; ?></td>
                    <td><?php echo $Clearance->paxoff_count; ?></td>
                    <td><?php echo $Clearance->stow_count; ?></td>


                    <td><?php echo ($Clearance->status == 'APPROVED') ? 'Clearance Granted' : 'Not Granted'; ?>
                    </td>
                    <td>
                        <?php if ($Clearance->status == 'APPROVED'): ?>
                            <a href="<?= base_url('Officer/crewview/'.$Clearance->clearance_id) ?>">Check Crew</a></br>
                            <a>  |  </a></br>
                            <a href="<?= base_url('Officer/deleteClearanceRequest/'.$Clearance->clearance_id) ?>">Delete</a>
                        <?php else: ?>
                            <a href="<?= base_url('Officer/grantClearance/'.$Clearance->clearance_id) ?>">Grant Clearance</a></br>
                            <a>  |  </a></br>
                            <a href="<?= base_url('Officer/crewview/'.$Clearance->clearance_id) ?>")>Check Crew</a></br>
                            <a>  |  </a></br>
                            <a href="<?= base_url('Officer/deleteClearanceRequest/'.$Clearance->clearance_id) ?>">Delete</a>
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
            $("#Link3").addClass("active");

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#issueArrivalClearanceTable').DataTable();
        });
    </script>

<?php include 'Files/footer.php';