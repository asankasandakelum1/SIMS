<?php include 'dashboard.php';
?>

<div class="form-group" id="ship_agent_registration" >
            <?php echo form_open('Agent/agentRegister', 'class="login-form"');?>

            <h3> SHIPPING AGENT REGISTRATION </h3>
            <hr>
            <div class="errors">
                <?php if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
                }
                ?>
                <?php echo validation_errors(); ?>
            </div>
            <div class="form-group">
                <label for="InputAgentCompanyName">Agent Company Name</label>
                <input type="text" class="form-control" id="InputAgentCompanyName" placeholder="Enter Agent Company Name" name="agentname" style="text-transform: uppercase">
            </div>
            <div class="form-group">
                <label for="InputAgentAddress">Company Address</label>
                <input type="text" class="form-control" id="InputAgentAddress" placeholder="Enter Company Address" name="agentaddress" style="text-transform: uppercase">
            </div>
            <div class="form-group">
                <label for="InputContactPerson">Contact Person</label>
                <input type="text" class="form-control" id="InputContactPerson" placeholder="Enter Contact Person Name" name="contactperson" style="text-transform: uppercase">
            </div>
            <div class="form-group">
                <label for="InputContactNo">Contact No</label>
                <input type="text" class="form-control" id="InputContactNo" placeholder="Enter Contact No" name="contactno">
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-login">Submit</button>
            <?php echo form_close(); ?>

        </div>


    <script>
        $(document).ready(function(){
            // Set user_roles_link as active on page load
            $(".btn-sidebar").removeClass("active");
            $("#add_shipping_agent_link").addClass("active");

        });
    </script>

<?php include 'Files/footer.php';