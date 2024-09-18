<?php
class Shipcaptain extends CI_Controller
{
    public function index()
    {
        $this->load->view('Shipcaptain/dashboard');
    }

    public function dashboard_Home()
    {
        $this->load->view('Shipcaptain/dashboard_Home');
    }

    public function assignship()
    {

        $this->load->view('Shipcaptain/assignship');
    }


    public function assigntoship() {

        $imono = $this->input->post('imono');
        $arrivaldate = $this->input->post('arrivaldate');
        $userid = $this->session->userdata('user_id');

        $this->load->model('Model_shipcaptain');

        // Search Records
        $voyage_records = $this->Model_shipcaptain->searchVoyageRecords($imono, $arrivaldate);

        if ($voyage_records) {
            foreach ($voyage_records as $record) {
                $data = array(
                    'user_id' => $userid,
                    'voyage_id' => $record->voyage_id,
                    'status' => 'PENDING'
                );

               //Assign Data
                $this->Model_shipcaptain->assignCaptain($data);
            }
            $this->session->set_flashdata('msg', 'Ship Captain Sent For Approval');
            redirect('Shipcaptain/assignship');
        } else {
            $this->session->set_flashdata('msg', 'Please Add Correct Details');
            redirect('Shipcaptain/assignship');
        }
    }


    public function request_shorepass()
    {
        $userid = $this->session->userdata('user_id');
        $this->load->model('Model_shipcaptain');
        $result = $this->Model_shipcaptain->checkApprovedShipId($userid);
        $data['result'] = $result;
        $this->load->view('Shipcaptain/request_shorepass',$data);
    }

    public function check_ship_assignment()
    {
        $userid = $this->session->userdata('user_id');
        $this->load->model('Model_shipcaptain');
        $result = $this->Model_shipcaptain->checkApprovedShipId($userid);
        $response = array();

        if (isset($result)) {
            $response['success'] = true;
         //   $response['voyage_id'] = $result[0]->voyage_id; // Assuming you want the first voyage_id
            $response['voyage_id'] = $result;
        } else {
            $response['success'] = false;
            $response['voyage_id'] = null; // Set voyage_id to null if no result
            //
            }

        echo json_encode($response);
    }


    public function addShorePass_Request()
    {
        $voyageid = $this->input->post('voyageid');
        $userid = $this->session->userdata('user_id');

        if (!empty($voyageid)) {
            $this->load->model('Model_shipcaptain');

            $result = $this->Model_shipcaptain->requestShorePass($voyageid, $userid);

            if ($result) {
                $response['success'] = true;
                $this->session->set_flashdata('msg', 'Shore Pass Request Submitted');
                redirect('Shipcaptain/request_shorepass');


            } else {
                $this->session->set_flashdata('msg', 'Already Requested');
                redirect('Shipcaptain/request_shorepass');
            }
        }

    }

    public function approved_shorepass()
    {
        $this->load->model('Model_shipcaptain');
        $userid = $this->session->userdata('user_id');

        $data['shorepasses'] = $this->Model_shipcaptain->getApprovedShorepass($userid);
        $this->load->view('Shipcaptain/approved_shorepass',$data);
    }

    public function GetShorepassData()
    {

        $shorepass_id = $this->input->post('shorepass_id');

        $this->load->model('Model_shipcaptain');

        // Get the clearance data
        $shorepass_data = $this->Model_shipcaptain->getShorepassData($shorepass_id);

        // Create HTML content to display in the new tab
        $html = '
    <html>
    <head>
        <title>Clearance Report</title>
        <style>
            body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
        }
        .logo {
            max-width: 100px;
            margin-right: 20px;
        }
        h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .report-row {
            display: flex;
            margin-bottom: 10px;
        }
        .report-label {
            width: 30%;
            background-color: #f2f2f2;
            padding: 10px;
            font-weight: bold;
        }
        .report-value {
            flex-grow: 1;
            background-color: #e9ecef;
            padding: 10px;
        }
        .print-button {
            text-align: center;
            margin-top: 20px;
        }
        .print-button button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
        </style>
    </head>
    <body>
        <div class="container">
        <div class="header">
        <img src="path_to_your_logo.png" alt="Logo" class="logo">
            <h1>SHIP SHORE PASS</h1>
        </div>';

        foreach ($shorepass_data as $shorepass) {
            $html .= '
            <div class="report-row">
                <span class="report-label">Shorepass ID:</span>
                <span class="report-value">' . $shorepass->shorepass_id . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Voyage ID:</span>
                <span class="report-value">' . $shorepass->voyage_id . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Ship Name:</span>
                <span class="report-value">' . $shorepass->ship_name . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Agent Name:</span>
                <span class="report-value">' . $shorepass->agentcompanyname . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Arrival Date:</span>
                <span class="report-value">' . $shorepass->arr_date . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Departure Date:</span>
                <span class="report-value">' . $shorepass->dep_date . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Clearance Status:</span>
                <span class="report-value">' . $shorepass->status . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Remarks:</span>
                <span class="report-value">' . $shorepass->remark . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">First Name:</span>
                <span class="report-value">' . $shorepass->fname . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Last Name:</span>
                <span class="report-value">' . $shorepass->lname . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Gender:</span>
                <span class="report-value">' . $shorepass->gender . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Nationality:</span>
                <span class="report-value">' . $shorepass->nationality . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Rank:</span>
                <span class="report-value">' . $shorepass->rank . '</span>
            </div>
            <div class="report-row">
                <span class="report-label">Passport No:</span>
                <span class="report-value">' . $shorepass->pptno . '</span>
            </div>
            
            <hr class="report-row">';
        }

        $html .= '
            <div class="print-button">
                <button onclick="window.print()">Print Report</button>
            </div>
            <div class="footer">
                Generated on ' . date('Y-m-d H:i:s') . ' by SL Immigration
            </div>
        </div>
    </body>
    </html>';

        // Set the content type to PDF
        header('Content-Type: application/pdf');

        // Output the HTML content
        echo $html;
    }




}