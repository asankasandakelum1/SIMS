<?php include 'dashboard.php';?>
    <div class="table-responsive" id="approved_clearance_table" >

        <h3> APPROVED SHORE PASSES </h3>
        <hr>
        <div class="errors">
            <?php if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
            ?>
            <?php echo validation_errors(); ?>
        </div>
        <table id="shorepassTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th>Shorepass Issuance ID</th>
                <th>Voyage ID</th>
                <th>Ship Name</th>
                <th>Arrival Date</th>
                <th>Status</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($shorepasses as $shorepass): ?>
                <tr>
                    <td><?php echo $shorepass->shorepass_id; ?></td>
                    <td><?php echo $shorepass->voyage_id; ?></td>
                    <td><?php echo $shorepass->ship_name; ?></td>
                    <td><?php echo $shorepass->arr_date; ?></td>
                    <td>
                        <?php if ($shorepass->status == 'APPROVED'): ?>
                            <a href="javascript:void(0);" onclick="generatePDF('<?php echo $shorepass->shorepass_id; ?>')">View</a>
                        <?php endif; ?>
                        <?php if ($shorepass->status == 'PENDING'): ?>
                            <a>Pending</a>
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
            $("#LINK4").addClass("active");

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#clearanceTable').DataTable();
        });
    </script>

    <script>
        function generatePDF(shorepass_id) {
            $.ajax({
                url: '<?= base_url("Shipcaptain/GetShorepassData"); ?>',
                method: 'POST',
                data: {
                    shorepass_id: shorepass_id
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