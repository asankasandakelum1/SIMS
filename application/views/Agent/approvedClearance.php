<?php include 'dashboard.php';?>



    <div class="table-responsive" id="approved_clearance_table" >

        <h3> APPROVED CLEARANCES</h3>
        <hr>
        <div class="errors">
            <?php if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
            ?>
            <?php echo validation_errors(); ?>
        </div>
        <table id="clearanceTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th>Clearance ID</th>
                <th>Voyage ID</th>
                <th>Ship Name</th>
                <th>Agent Name</th>
                <th>Arrival Date</th>
                <th>Arrival Time</th>
                <th>Clearance Status</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($clearances as $clearance): ?>
                <tr>
                    <td><?php echo $clearance->clearance_id; ?></td>
                    <td><?php echo $clearance->voyage_id; ?></td>
                    <td><?php echo $clearance->ship_name; ?></td>
                    <td><?php echo $clearance->agentcompanyname; ?></td>
                    <td><?php echo $clearance->arr_date; ?></td>
                    <td><?php echo $clearance->arr_time; ?></td>
                    <td><?php echo $clearance->status; ?></td>


                    <td>
                        <?php if ($clearance->status == 'APPROVED'): ?>
                            <a href="javascript:void(0);" onclick="generatePDF('<?php echo $clearance->clearance_id; ?>')">View</a>

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
            $("#Link6").addClass("active");

        });
    </script>


    </div>

    <script>
        $(document).ready(function() {
            $('#clearanceTable').DataTable();
        });
    </script>

    <script>
        function generatePDF(clearanceid) {
            $.ajax({
                url: '<?= base_url("agent/GetClearanceData"); ?>',
                method: 'POST',
                data: {
                    clearance_id: clearanceid
                },
                success: function(response) {
                    // Open a new tab and populate it with the data
                    var newWindow = window.open('', '_blank');
                    newWindow.document.write(response);
                    newWindow.document.close();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    </script>




<?php include 'Files/footer.php';
