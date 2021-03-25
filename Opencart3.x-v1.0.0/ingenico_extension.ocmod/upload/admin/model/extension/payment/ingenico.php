<?php
class ModelExtensionPaymentIngenico extends Model {
	public function install() {
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "ingenico` (
			`id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
			`merchant_code` varchar(255) NOT NULL,			
			`key` varchar(255) NOT NULL,
			`webservice_locator` varchar(255) NOT NULL,
			`status` enum('1','0') NOT NULL,
			`sort_order` int(10) NOT NULL,
			`primary_color_code` varchar(255),
			`secondary_color_code` varchar(255),
			`button_color_code_1` varchar(255),
			`button_color_code_2` varchar(255),
			`merchant_logo_url` varchar(255),
			`enableExpressPay` varchar(255),
			`separateCardMode` varchar(255),
			`enableNewWindowFlow` varchar(255),
			`merchantMsg` varchar(255),
			`disclaimerMsg` varchar(255),
			`paymentMode` varchar(255),
			`paymentModeOrder` varchar(255),
			`enableInstrumentDeRegistration` varchar(255),
			`txnType` varchar(255),
			`hideSavedInstruments` varchar(255),
			`saveInstrument` varchar(255),
			`displayErrorMessageOnPopup` varchar(255),
			`embedPaymentGatewayOnPage` varchar(255),
			`merchant_scheme_code` varchar(255) NOT NULL,
			PRIMARY KEY (`id`),
			UNIQUE KEY `unique_merchant_code` (`merchant_code`)
			) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;");
	}

	public function uninstall() {
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "ingenico`;");
	}

	public function add($merchant_details) {
		if(count($merchant_details) > 0){
			$this->db->query("INSERT INTO `" . DB_PREFIX . "ingenico`(
				`merchant_code`,
				`key`,  
				`webservice_locator`, 
				`status`, 
				`sort_order`,
				`primary_color_code`,
				`secondary_color_code`,
				`button_color_code_1`,
				`button_color_code_2`,
				`merchant_logo_url`,
				`enableExpressPay`,
				`separateCardMode`,
				`enableNewWindowFlow`,
				`merchantMsg`,
				`disclaimerMsg`,
				`paymentMode`,
				`paymentModeOrder`,
				`enableInstrumentDeRegistration`,
				`txnType`,
				`hideSavedInstruments`,
				`saveInstrument`,
				`displayErrorMessageOnPopup`,
				`embedPaymentGatewayOnPage`,
				`merchant_scheme_code`
				)
				VALUES (
				'".trim($merchant_details['payment_ingenico_merchant_code'])."', 
				'".trim($merchant_details['payment_ingenico_key'])."',
				'".$merchant_details['payment_ingenico_webservice_locator']."', 
				'".$merchant_details['payment_ingenico_status']."',
				'".trim($merchant_details['payment_ingenico_sort_order'])."',
				'".trim($merchant_details['payment_ingenico_primary_color_code'])."',
				'".trim($merchant_details['payment_ingenico_secondary_color_code'])."',
				'".trim($merchant_details['payment_ingenico_button_color_code_1'])."',
				'".trim($merchant_details['payment_ingenico_button_color_code_2'])."',
				'".trim($merchant_details['payment_ingenico_merchant_logo_url'])."',
				'".trim($merchant_details['payment_ingenico_enableExpressPay'])."',
				'".trim($merchant_details['payment_ingenico_separateCardMode'])."',
				'".trim($merchant_details['payment_ingenico_enableNewWindowFlow'])."',
				'".trim($merchant_details['payment_ingenico_merchantMsg'])."',
				'".trim($merchant_details['payment_ingenico_disclaimerMsg'])."',
				'".trim($merchant_details['payment_ingenico_paymentMode'])."',
				'".trim($merchant_details['payment_ingenico_paymentModeOrder'])."',
				'".trim($merchant_details['payment_ingenico_enableInstrumentDeRegistration'])."',
				'".trim($merchant_details['payment_ingenico_txnType'])."',
				'".trim($merchant_details['payment_ingenico_hideSavedInstruments'])."',
				'".trim($merchant_details['payment_ingenico_saveInstrument'])."',
				'".trim($merchant_details['payment_ingenico_displayErrorMessageOnPopup'])."',
				'".trim($merchant_details['payment_ingenico_embedPaymentGatewayOnPage'])."',
				'".trim($merchant_details['payment_ingenico_merchant_scheme_code'])."' )");
			return true;
		}
		return false;
	}

	public function get() {
		return $this->db->query("SELECT * FROM `" . DB_PREFIX . "ingenico`")->rows;
	}

	public function edit($merchant_details) {
		if(count($merchant_details) > 0){
			$this->db->query("UPDATE `" . DB_PREFIX . "ingenico`	
				SET 
				`merchant_code` = '".trim($merchant_details['payment_ingenico_merchant_code'])."',
				`key` = '".trim($merchant_details['payment_ingenico_key'])."',
				`webservice_locator` = '".$merchant_details['payment_ingenico_webservice_locator']."',
				`status` = '".$merchant_details['payment_ingenico_status']."',
				`sort_order` = '".trim($merchant_details['payment_ingenico_sort_order'])."',
				`primary_color_code` = '".trim($merchant_details['payment_ingenico_primary_color_code'])."',
				`secondary_color_code` = '".trim($merchant_details['payment_ingenico_secondary_color_code'])."',
				`button_color_code_1` = '".trim($merchant_details['payment_ingenico_button_color_code_1'])."',
				`button_color_code_2` = '".trim($merchant_details['payment_ingenico_button_color_code_2'])."',
				`merchant_logo_url` = '".trim($merchant_details['payment_ingenico_merchant_logo_url'])."',
				`enableExpressPay` = '".trim($merchant_details['payment_ingenico_enableExpressPay'])."',
				`separateCardMode` = '".trim($merchant_details['payment_ingenico_separateCardMode'])."',
				`enableNewWindowFlow` = '".trim($merchant_details['payment_ingenico_enableNewWindowFlow'])."',
				`merchantMsg` = '".trim($merchant_details['payment_ingenico_merchantMsg'])."',
				`disclaimerMsg` = '".trim($merchant_details['payment_ingenico_disclaimerMsg'])."',
				`paymentMode` = '".trim($merchant_details['payment_ingenico_paymentMode'])."',
				`paymentModeOrder` = '".trim($merchant_details['payment_ingenico_paymentModeOrder'])."',
				`enableInstrumentDeRegistration` = '".trim($merchant_details['payment_ingenico_enableInstrumentDeRegistration'])."',
				`txnType` = '".trim($merchant_details['payment_ingenico_txnType'])."',
				`hideSavedInstruments` = '".trim($merchant_details['payment_ingenico_hideSavedInstruments'])."',
				`saveInstrument` = '".trim($merchant_details['payment_ingenico_saveInstrument'])."',
				`displayErrorMessageOnPopup` = '".trim($merchant_details['payment_ingenico_displayErrorMessageOnPopup'])."',
				`embedPaymentGatewayOnPage` = '".trim($merchant_details['payment_ingenico_embedPaymentGatewayOnPage'])."',
				`merchant_scheme_code` = '".$merchant_details['payment_ingenico_merchant_scheme_code']."'");
			return true;
		}
		return false;
	}

}