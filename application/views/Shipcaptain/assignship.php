<?php include 'dashboard.php';?>

    <div class="form-group" id="assign_ship" >
        <?php echo form_open('Shipcaptain/assigntoship', 'class="login-form"');?>
        <h3> ASSIGN SHIP </h3>
        <hr>

        <div class="errors">
            <?php if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
            ?>
            <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
            <label for="InputArrivalDate">Arrival Date</label>
            <input type="date" class="form-control" id="InputArrivalDate" name="arrivaldate">
        </div>
        <div class="form-group">
            <label for="InputImoNo">IMO No</label>
            <input type="number" class="form-control" id="InputImoNo" placeholder="Enter IMO No" name="imono" style="text-transform: uppercase">
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-login">Request to Assign</button>
        <?php echo form_close(); ?>

    </div>


    <script>
        $(document).ready(function(){
            // Set user_roles_link as active on page load
            $(".btn-sidebar").removeClass("active");
            $("#LINK2").addClass("active");

        });
    </script>

<?php include 'Files/footer.php';
