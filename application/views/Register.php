<?php include 'Partials/header.php'?>


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

        <?php echo form_open('Register/RegisterUser', 'class="login-form"');?>

     <h2> Registration </h2>
     <hr>
     <div class="errors">
         <?php if($this->session->flashdata('msg')){
             echo $this->session->flashdata('msg');
         }
         ?>
         <?php echo validation_errors(); ?>
     </div>

     <div class="form-group">
         <label for="InputFirstName">First Name</label>
         <input type="text" class="form-control" id="InputFirstName" placeholder="Enter First Name" name="fname" style="text-transform: uppercase">
     </div>
     <div class="form-group">
         <label for="InputLastName">Last Name</label>
         <input type="text" class="form-control" id="InputLastName" placeholder="Enter Last Name" name="lname" style="text-transform: uppercase">
     </div>
     <div class="form-group">
        <label for="InputEmail">Email address</label>
        <input type="email" class="form-control" id="InputEmail" placeholder="Enter Email" name="email">
    </div>

            <div class="form-group">
                <label for="InputNIC">Input NIC</label>
                <input type="text" class="form-control" id="InputNIC" placeholder="Enter Your NIC" name="nic">
            </div>

    <div class="form-group">
        <label for="Inputusername">Username</label>
        <input type="text" class="form-control" id="Inputusername" placeholder="Enter Username" name="username">
    </div>

    <div class="form-group">
        <label for="InputPassword">Password</label>
        <input type="password" class="form-control" id="InputPassword" placeholder="Enter Password" name="password">
    </div>

    <div class="form-group">
        <label for="ConfirmPassword">Confirm Password</label>
        <input type="password" class="form-control" id="ConfirmPassword" placeholder="Confirm Password" name="confirmpassword">
    </div>

    <div class="form-group">
        <label for="UserCategory">User Category</label><br>
        <select class="form-select" id="UserCategory" name="user_category">
            <option selected>Choose...</option>
            <option value="Immigration Officer" <?= set_select('user_category', 'Immigration Officer'); ?>>IMMIGRATION OFFICER</option>
            <option value="Ship Captain" <?= set_select('user_category', 'Ship Captain'); ?>>SHIP CAPTAIN</option>
            <option value="Shipping Agent" <?= set_select('user_category', 'Shipping Agent'); ?>>SHIPPING AGENT</option>
        </select>
    </div>

            <div class="form-group">
                <label for="InputOfficerID"></label>
                <input type="text" class="form-control" id="InputOfficerID" placeholder="Enter Your Officer ID" name="officerid" style="display: none;">
            </div>



         <div class="form-group" id="agentDropdown" style="display: none;">
         <label for="AgentName">Agent Company Name</label><br>


             <select class="form-select" id="AgentName" name="agent_name">
             <option selected value=""></option>
             <?php
             if (isset($agents)) {
                 foreach ($agents as $agent) {
                     echo '<option value="' . $agent->agentname . '">' . $agent->agentname . '</option>';
                 }
             } else {
                 echo '<option value="">No Agents Found</option>';
             }
            ?>
            </select>
        </div>

     <button type="submit" class="btn btn-primary btn-block btn-login">Submit</button>
            <br>
            <br>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $('#UserCategory').change(function(){
                        var selectedCategory = $(this).val();
                        if(selectedCategory === 'Shipping Agent'){
                            $('#agentDropdown').show();
                        } else {
                            $('#agentDropdown').hide();
                        }
                        if(selectedCategory === 'Immigration Officer'){
                            $('#InputOfficerID').show();
                        } else {
                            $('#InputOfficerID').hide();
                        }
                    });
                });


            </script>




     <?php echo form_close(); ?>
    </div>
    </div>
</div>

<?php include 'Partials/footer.php'?>
