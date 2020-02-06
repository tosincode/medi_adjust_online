<?php
if (!class_exists('ComposerAutoloaderInit4618f5c41cf5e27cc7908556f031e4d4')) {require_once EWD_UASP_CD_PLUGIN_PATH . 'PHPSpreadsheet/vendor/autoload.php';}
use PhpOffice\PhpSpreadsheet\Spreadsheet;
function EWD_UASP_Import_From_Spreadsheet($Excel_File_Name){
    global $wpdb;
    global $ewd_usap_appointments_table_name;
    global $ewd_uasp_fields_table_name;
    global $ewd_uasp_fields_meta_table_name;

    $Fields = $wpdb->get_results("SELECT * FROM $ewd_uasp_fields_table_name");

    $Excel_URL = EWD_UASP_CD_PLUGIN_PATH . 'appointment-sheets/' . $Excel_File_Name;

    // Build the workbook object out of the uploaded spreadsheet
    $objWorkBook = \PhpOffice\PhpSpreadsheet\IOFactory::load($Excel_URL);

    // Create a worksheet object out of the product sheet in the workbook
    $sheet = $objWorkBook->getActiveSheet();

    $Allowable_Custom_Fields = array();
    foreach ($Fields as $Field) {$Allowable_Custom_Fields[$Field->Field_ID] = $Field->Field_Name;}
    //List of fields that can be accepted via upload
    $Allowed_Fields = array("Appointment Start", "Appointment End", "Location Name", "Service Name", "Service Provider Name", "Client Name", "Client Phone", "Client Email", "Appointment Confirmed");


    // Get column names
    $Imported_Custom_Fields = array();
    $highestColumn = $sheet->getHighestColumn();
    $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
    for ($column = 1; $column <= $highestColumnIndex; $column++) {
        if (in_array(trim($sheet->getCellByColumnAndRow($column, 1)->getValue()), $Allowable_Custom_Fields)) {
            $key = array_search(trim($sheet->getCellByColumnAndRow($column, 1)->getValue()), $Allowable_Custom_Fields);
            $Imported_Custom_Fields[$key] = $column;
        }
        if (trim($sheet->getCellByColumnAndRow($column, 1)->getValue()) == "Appointment Start") {
            $Start_Column = $column;
            $Field_Titles[] = 'Appointment_Start';
        }
        if (trim($sheet->getCellByColumnAndRow($column, 1)->getValue()) == "Appointment End") {
            $End_Column = $column;
            $Field_Titles[] = 'Appointment_End';
        }
        if (trim($sheet->getCellByColumnAndRow($column, 1)->getValue()) == "Location Name") {
            $Location_Column = $column;
            $Field_Titles[] = 'Location_Name';
            $Field_Titles[] = 'Location_Post_ID';
        }
        if (trim($sheet->getCellByColumnAndRow($column, 1)->getValue()) == "Service Name") {
            $Service_Column = $column;
            $Field_Titles[] = 'Service_Name';
            $Field_Titles[] = 'Service_Post_ID';
        }
        if (trim($sheet->getCellByColumnAndRow($column, 1)->getValue()) == "Service Provider Name") {
            $Service_Provider_Column = $column;
            $Field_Titles[] = 'Service_Provider_Name';
            $Field_Titles[] = 'Service_Provider_Post_ID';
        }
        if (trim($sheet->getCellByColumnAndRow($column, 1)->getValue()) == "Client Name") {
            $Client_Name_Column = $column;
            $Field_Titles[] = 'Appointment_Client_Name';
        }
        if (trim($sheet->getCellByColumnAndRow($column, 1)->getValue()) == "Client Phone") {
            $Client_Phone_Column = $column;
            $Field_Titles[] = 'Appointment_Client_Phone';
        }
        if (trim($sheet->getCellByColumnAndRow($column, 1)->getValue()) == "Client Email") {
            $Client_Email_Column = $column;
            $Field_Titles[] = 'Appointment_Client_Email';
        }
        if (trim($sheet->getCellByColumnAndRow($column, 1)->getValue()) == "Appointment Confirmed") {
            $Confirmed_Column = $column;
            $Field_Titles[] = 'Appointment_Confirmation_Received';
        }
    }
    $Fields_String = implode(",", $Field_Titles);


    // Put the spreadsheet data into a multi-dimensional array to facilitate processing
    $highestRow = $sheet->getHighestRow();
    for ($row = 2; $row <= $highestRow; $row++) {
        for ($column = 1; $column <= $highestColumnIndex; $column++) {
            $Data[$row][$column] = $sheet->getCellByColumnAndRow($column, $row)->getValue();
        }
    }

    // Create the query to insert the products one at a time into the database and then run it
    foreach ($Data as $Appointment) {

        // Create an array of the values that are being inserted for each order,
        // edit if it's a current order, otherwise add it
        $Values = array();
        $Field_Values = array();
        foreach ($Appointment as $Col_Index => $Value) {
            if (in_array($Col_Index, $Imported_Custom_Fields)) {$Field_Values[$Col_Index] = esc_sql($Value);}
            else {$Values[] = esc_sql($Value);}

            if ($Col_Index == $Location_Column) {
                $Location_Post = get_page_by_title($Value, OBJECT, 'uasp-location');
                $Values[] = $Location_Post->ID;
            }

            if ($Col_Index == $Service_Column) {
                $Service_Post = get_page_by_title($Value, OBJECT, 'uasp-service');
                $Values[] = $Service_Post->ID;
            }

            if ($Col_Index == $Service_Provider_Column) {
                $Service_Provider_Post = get_page_by_title($Value, OBJECT, 'uasp-provider');
                $Values[] = $Service_Provider_Post->ID;
            }
        }
        $Values_String = implode("','", $Values);

        $wpdb->query("INSERT INTO $ewd_usap_appointments_table_name (" . $Fields_String . ") VALUES ('" . $Values_String . "')");
        $Appointment_ID = $wpdb->insert_id;
        
        foreach ($Imported_Custom_Fields as $Field_ID => $column) {
            $wpdb->query("INSERT INTO $ewd_uasp_fields_meta_table_name (Field_ID, Appointment_ID, Meta_Value) VALUES ('" . $Field_ID . "','" . $Appointment_ID . "','" . $Field_Values[$column] . "')");
        }

        unset($Values);
        unset($Field_Values);
    }

    return __("Appointments added successfully.", 'ultimate-appointment-scheduling');
}

function EWD_UASP_Speadsheet_Import() {

        /* Test if there is an error with the uploaded spreadsheet and return that error if there is */
        if (!empty($_FILES['Appointments_Spreadsheet']['error']))
        {
                switch($_FILES['Appointments_Spreadsheet']['error'])
                {

                case '1':
                        $error = __('The uploaded file exceeds the upload_max_filesize directive in php.ini', 'ultimate-appointment-scheduling');
                        break;
                case '2':
                        $error = __('The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form', 'ultimate-appointment-scheduling');
                        break;
                case '3':
                        $error = __('The uploaded file was only partially uploaded', 'ultimate-appointment-scheduling');
                        break;
                case '4':
                        $error = __('No file was uploaded.', 'ultimate-appointment-scheduling');
                        break;

                case '6':
                        $error = __('Missing a temporary folder', 'ultimate-appointment-scheduling');
                        break;
                case '7':
                        $error = __('Failed to write file to disk', 'ultimate-appointment-scheduling');
                        break;
                case '8':
                        $error = __('File upload stopped by extension', 'ultimate-appointment-scheduling');
                        break;
                case '999':
                        default:
                        $error = __('No error code avaiable', 'ultimate-appointment-scheduling');
                }
        }
        /* Make sure that the file exists */
        elseif (empty($_FILES['Appointments_Spreadsheet']['tmp_name']) || $_FILES['Appointments_Spreadsheet']['tmp_name'] == 'none') {
                $error = __('No file was uploaded here..', 'ultimate-appointment-scheduling');
        }
        /* Move the file and store the URL to pass it onwards*/
        /* Check that it is a .xls or .xlsx file */
        if(!isset($_FILES['Appointments_Spreadsheet']['name']) or (!preg_match("/\.(xls.?)$/", $_FILES['Appointments_Spreadsheet']['name']) and !preg_match("/\.(csv.?)$/", $_FILES['Appointments_Spreadsheet']['name']))) {
            $error = __('File must be .csv, .xls or .xlsx', 'ultimate-appointment-scheduling');
        }
        else {
                        $msg = " ";
                        $msg .= $_FILES['Appointments_Spreadsheet']['name'];
                        //for security reason, we force to remove all uploaded file
                        $target_path = ABSPATH . "wp-content/plugins/ultimate-appointment-scheduling/appointment-sheets/";
                        //plugins_url("order-tracking/product-sheets/");

                        $target_path = $target_path . basename( $_FILES['Appointments_Spreadsheet']['name']);

                        if (!move_uploaded_file($_FILES['Appointments_Spreadsheet']['tmp_name'], $target_path)) {
                        //if (!$upload = wp_upload_bits($_FILES["Item_Image"]["name"], null, file_get_contents($_FILES["Item_Image"]["tmp_name"]))) {
                              $error .= "There was an error uploading the file, please try again!";
                        }
                        else {
                                $Excel_File_Name = basename( $_FILES['Appointments_Spreadsheet']['name']);
                        }
        }

        /* Pass the data to the appropriate function in Update_Admin_Databases.php to create the products */
        if (!isset($error)) {
                $user_update = EWD_UASP_Import_From_Spreadsheet($Excel_File_Name);
                return $user_update;
        }
        else {
                $output_error = array("Message_Type" => "Error", "Message" => $error);
                return $output_error;
        }
}
?>
