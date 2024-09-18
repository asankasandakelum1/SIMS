<?php include 'Partials/header.php'?>

<div class="container">
    <div class="row">


        <div class="col-md-6 col-md-offset-3">

<!--<?php if($this->session->flashdata('errormsg')){
    echo "<h3>".$this->session->flashdata('errormsg')."</h3>";
}
?>
-->

<?php echo form_open('Login/loginUser','class="login-form"'); ?>

    <div class="imagebox">
        <img src="<?php echo base_url('Assets/seaport.png'); ?>" alt="Your Image" class="img-responsive center-block" alt="Seaport Image">
    </div>
    <h2> LOGIN </h2>
    <hr>

    <div class="errors">
    <?php if($this->session->flashdata('errormsg')){
        echo $this->session->flashdata('errormsg');
    }
    ?>
    <?php echo validation_errors(); ?>
    </div>

    <div class="form-group">
        <label for="Inputusername">Username</label>
        <input type="text" class="form-control" id="Inputusername" placeholder="Enter Username" name="username">
    </div>
    <div class="form-group">
        <label for="InputPassword">Password</label>
        <input type="password" class="form-control" id="InputPassword" placeholder="Enter Password" name="password">
    </div>


    <button type="submit" class="btn btn-primary btn-block btn-login">Submit</button>
    <?php echo form_close(); ?>
</div>

<?php include 'Partials/footer.php'?>
