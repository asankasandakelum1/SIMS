<?php include 'dashboard.php';?>

    <div>

        <a href="<?= base_url('Admin/user_roles') ?>" class="image-button">
            <img src="<?= base_url('Assets/user_roles.jpeg') ?>" alt="Button 1" width="100" height="50">
            <span class="button-text">USER ROLES</span>
        </a>


        <a href="<?= base_url('Agent/ship_AgentView') ?>" class="image-button">
            <img src="<?= base_url('Assets/company_registration.png') ?>" alt="Button 2" width="100" height="50">
            <span class="button-text">REGISTERED COMPANY LIST</span>
        </a>

        <a href="<?= base_url('Agent/agentRegister') ?>" class="image-button">
            <img src="<?= base_url('Assets/SHIPPING_Agent.jpeg') ?>" alt="Button 2" width="100" height="50">
            <span class="button-text">SHIPPING AGENT REGISTRATION</span>
        </a>

    </div>




    </div>
    </div>

<?php include 'Files/footer.php';
