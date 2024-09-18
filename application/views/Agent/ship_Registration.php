<?php include 'dashboard.php';?>



    <div class="form-group" id="ship_registration" >
        <?php echo form_open('Agent/addship_details', 'class="login-form"');?>



        <h3> Ship Registration </h3>
        <hr>

        <div class="errors">
            <?php if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
            ?>
            <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
            <label for="InputShipName">Ship Name</label>
            <input type="text" class="form-control" id="InputShipName" placeholder="Enter Ship Name" name="shipname" style="text-transform: uppercase">
        </div>
        <div class="form-group">
            <label for="InputShipFlag">Ship Flag</label>
            <input type="text" class="form-control" id="InputShipFlag" placeholder="Enter Ship Flag" name="shipflag" style="text-transform: uppercase">
        </div>
        <div class="form-group">
            <label for="InputImoNo">IMO No</label>
            <input type="number" class="form-control" id="InputImoNo" placeholder="Enter IMO No" name="imono" style="text-transform: uppercase">
        </div>
        <div class="form-group">

            <label for="InputAgentCompanyName">Agent Company Name</label>
            <input type="text" class="form-control" id="InputAgentCompanyName" value="<?php echo $this->session->userdata('agentname'); ?>" name="companyname" style="text-transform: uppercase" readonly>
        </div>



        <button type="submit" class="btn btn-primary btn-block btn-login">Submit</button>
        <?php echo form_close(); ?>

    </div>


    <script>
        $(document).ready(function(){
            // Set user_roles_link as active on page load
            $(".btn-sidebar").removeClass("active");
            $("#Link2").addClass("active");

        });
    </script>


<?php include 'Files/footer.php';