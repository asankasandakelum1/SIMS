<?php include 'dashboard.php';?>

    <div class="container text-center">
        <div class="form-group" id="ship_registration">
            <?php echo form_open('Shipcaptain/addShorePass_Request', 'class="login-form"');?>
            <div class="errors">
                <?php if($this->session->flashdata('msg')){
                    echo $this->session->flashdata('msg');
                }
                ?>
                <?php echo validation_errors(); ?>
            </div>

            <div>

                <div>
                    <?php
                    if ($result !== null) {
                        $voyage = $result->voyage_id;
                        echo '<input type="hidden" name="voyageid" value="'.$voyage.'">';
                    } else {
                        echo '<input type="hidden" name="voyageid" value="">';
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <input type="button" class="form-control" id="InputShipName" value="Check Ship Assignment">
            </div>

            <div id="shipAssignmentResult"></div>
            <button id="requestShorePassBtn" class="btn btn-primary"  style="display: none;">Request Shore Pass</button>
            <?php echo form_close(); ?> <!-- Close the form -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#InputShipName').click(function() {
                $.ajax({
                    url: '<?= base_url('Shipcaptain/check_ship_assignment') ?>',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#shipAssignmentResult').html('<p>User has an approved ship assignment.</p>');
                            $('#requestShorePassBtn').show();

                        } else {
                            $('#shipAssignmentResult').html('<p>No approved ship assignment found for the user.</p>');
                            $('#requestShorePassBtn').hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });


        });
    </script>



    <script>
        $(document).ready(function(){
            // Set user_roles_link as active on page load
            $(".btn-sidebar").removeClass("active");
            $("#LINK3").addClass("active");

        });
    </script>

<?php include 'Files/footer.php';
