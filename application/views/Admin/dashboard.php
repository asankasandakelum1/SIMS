<?php include 'Files/header.php';
?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <div class="profile">

                    <h4><?php echo $this->session->userdata('firstname'); ?> <?php echo $this->session->userdata('lastname'); ?></h4>
                    <p><?php echo $this->session->userdata('usercategory'); ?></p>

                </div>
                <ul>
                    <li><a href="<?= base_url('Admin/dashboard_Home') ?>" class="btn-sidebar active" id="dashboard_link">DASHBOARD</a></li>
                    <li><a href="<?= base_url('Admin/user_roles') ?>" class="btn-sidebar" id="user_roles_link">USER ROLES</a></li>
                    <li><a href="<?= base_url('Agent/ship_AgentView') ?>" class="btn-sidebar"id="view_shipping_agent_link">REGISTERED COMPANY LIST</a></li>
                    <li><a href="<?= base_url('Agent/agentRegister') ?>" class="btn-sidebar"id="add_shipping_agent_link">SHIPPING AGENT REGISTRATION</a></li>

                </ul>
            </div>



    <div class="col-md-10 mx-auto text-center">
        <h1 class="mt-4" align="center">ADMIN DASHBOARD</h1>
        <hr>




