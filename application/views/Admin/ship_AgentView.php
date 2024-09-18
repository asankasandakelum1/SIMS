<?php include 'dashboard.php';?>

<div class="table-responsive" id="AgentCompany_table" >

    <h3> REGISTERED AGENT COMPANY LIST </h3>
    <div class="errors">
        <?php if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
        }
        ?>
        <?php echo validation_errors(); ?>
    </div>
    <table id="userTable" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead>
        <tr>
            <th>Company Name</th>
            <th>Company Address</th>
            <th>Contact Person</th>
            <th>Contact No</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($companies as $company): ?>
            <tr>
                <td><?php echo $company->agentname; ?></td>
                <td><?php echo $company->agentaddress; ?></td>
                <td><?php echo $company->contactperson; ?></td>
                <td><?php echo $company->contactno; ?></td>

                <td>
                    <a href="#" class="delete-company" data-id="<?= $company->agentid ?>">Delete</a>
              <!--      <a href="<?= base_url('agent/deleteCompany/'.$company->agentid) ?>">Delete</a> -->
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
            $("#view_shipping_agent_link").addClass("active");

        });
    </script>

    <!-- JavaScript Confirmation -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var deleteLinks = document.querySelectorAll(".delete-company");
            deleteLinks.forEach(function(link) {
                link.addEventListener("click", function(event) {
                    event.preventDefault();
                    var companyId = link.getAttribute("data-id");
                    var confirmation = confirm("Are you sure you want to delete this company?");
                    if (confirmation) {

                        window.location.href = "<?= base_url('agent/deleteCompany/') ?>" + companyId;
                    }
                });
            });
        });
    </script>



</div>

<?php include 'Files/footer.php';