<?php
if (!class_exists('ComposerAutoloaderInit4618f5c41cf5e27cc7908556f031e4d4')) {require_once EWD_UASP_CD_PLUGIN_PATH . 'PHPSpreadsheet/vendor/autoload.php';}
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
function EWD_UASP_Export_To_Excel() {
		global $wpdb;
		global $ewd_usap_appointments_table_name;
		global $ewd_uasp_fields_table_name;
		global $ewd_uasp_fields_meta_table_name;

		$Appointment_Confirmation = get_option("EWD_UASP_Appointment_Confirmation");

		if (isset($_GET['Format_Type'])) {$Format_Type = $_GET['Format_Type'];}
		
		// Instantiate a new PHPExcel object 
		$Spreadsheet = new Spreadsheet();  
		// Set the active Excel worksheet to sheet 0 
		$Spreadsheet->setActiveSheetIndex(0);  

		// Print out the regular order field labels
		$Spreadsheet->getActiveSheet()->setCellValue("A1", "Appointment Start");
		$Spreadsheet->getActiveSheet()->setCellValue("B1", "Appointment End");
		$Spreadsheet->getActiveSheet()->setCellValue("C1", "Location Name");
		$Spreadsheet->getActiveSheet()->setCellValue("D1", "Service Name");
		$Spreadsheet->getActiveSheet()->setCellValue("E1", "Service Provider Name");
		$Spreadsheet->getActiveSheet()->setCellValue("F1", "Client Name");
		$Spreadsheet->getActiveSheet()->setCellValue("G1", "Client Phone");
		$Spreadsheet->getActiveSheet()->setCellValue("H1", "Client Email");
		$Spreadsheet->getActiveSheet()->setCellValue("I1", "Appointment Confirmed");

		//start of printing column names as names of custom fields  
		$column = 'J';
		$Sql = "SELECT * FROM $ewd_uasp_fields_table_name";
		$Custom_Fields = $wpdb->get_results($Sql);
		foreach ($Custom_Fields as $Custom_Field) {
     		$Spreadsheet->getActiveSheet()->setCellValue($column."1", $Custom_Field->Field_Name);
    		$column++;
		}  

		//start while loop to get data  
		$rowCount = 2;
		$Last_30_Days = date('Y-m-d', time()- 30 * 24*3600); 
		$Appointments = $wpdb->get_results($wpdb->prepare("SELECT * FROM $ewd_usap_appointments_table_name WHERE DATE(Appointment_Start)>=%s", $Last_30_Days));
		foreach ($Appointments as $Appointment)  
		{  
    	 	$Spreadsheet->getActiveSheet()->setCellValue("A" . $rowCount, $Appointment->Appointment_Start);
			$Spreadsheet->getActiveSheet()->setCellValue("B" . $rowCount, $Appointment->Appointment_End);
			$Spreadsheet->getActiveSheet()->setCellValue("C" . $rowCount, $Appointment->Location_Name);
			$Spreadsheet->getActiveSheet()->setCellValue("D" . $rowCount, $Appointment->Service_Name);
			$Spreadsheet->getActiveSheet()->setCellValue("E" . $rowCount, $Appointment->Service_Provider_Name);
			$Spreadsheet->getActiveSheet()->setCellValue("F" . $rowCount, $Appointment->Appointment_Client_Name);
			$Spreadsheet->getActiveSheet()->setCellValue("G" . $rowCount, $Appointment->Appointment_Client_Phone);
			$Spreadsheet->getActiveSheet()->setCellValue("H" . $rowCount, $Appointment->Appointment_Client_Email);
			$Spreadsheet->getActiveSheet()->setCellValue("I" . $rowCount, $Appointment->Appointment_Confirmation_Received);
				
			$column = 'J';
    		foreach ($Custom_Fields as $Custom_Field) {  
        	  $MetaValue = $wpdb->get_var($wpdb->prepare("SELECT Meta_Value FROM $ewd_uasp_fields_meta_table_name WHERE Appointment_ID=%d AND Field_ID=%d", $Appointment->Appointment_ID, $Custom_Field->Field_ID));

        		$Spreadsheet->getActiveSheet()->setCellValue($column.$rowCount, $MetaValue);
        		$column++;
    		}  
    		$rowCount++;
		} 

		if ($Appointment_Confirmation != 'Yes') {$Spreadsheet->getActiveSheet()->removeColumn('I');}

		// Redirect output to a client’s web browser (Excel5) 
		if (isset($Format_Type) and $Format_Type == "CSV") {
			header('Content-Type: application/vnd.ms-excel'); 
			header('Content-Disposition: attachment;filename="Appointments_Export.csv"'); 
			header('Cache-Control: max-age=0'); 
			$objWriter = new Csv($Spreadsheet);
			$objWriter->save('php://output');
		}
		else {
			header('Content-Type: application/vnd.ms-excel'); 
			header('Content-Disposition: attachment;filename="Appointments_Export.xls"'); 
			header('Cache-Control: max-age=0'); 
			$objWriter = new Xls($Spreadsheet);
			$objWriter->save('php://output');
		}

		exit();
}
?>