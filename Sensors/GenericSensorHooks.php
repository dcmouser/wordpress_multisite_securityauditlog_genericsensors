<?php
/**
 * The Class is used to allow developers to create
 * custom alerts
 */
 
 

class WSAL_Sensors_GenericSensorHooks extends WSAL_AbstractSensor
{
    public function HookEvents()
    {
        add_action('wsal_notice', array($this, 'EventGenericSensorStriggerNotice'), 10, 1);
        add_action('wsal_warning', array($this, 'EventGenericSensorStriggerWarning'), 10, 1);
        add_action('wsal_critical', array($this, 'EventGenericSensorStriggerCritical'), 10, 1);
    }


    public function EventGenericSensorStriggerNotice($msg='empty') {
    	$this->EventGenericSensorStrigger($msg, 'Notice', WSAL_Sensors_GenericSensorHooks_AlertCode_Notice);
    }
    public function EventGenericSensorStriggerWarning($msg='empty') {
    	$this->EventGenericSensorStrigger($msg, 'Warning', WSAL_Sensors_GenericSensorHooks_AlertCode_Warning);
    }
    public function EventGenericSensorStriggerCritical($msg='empty') {
    	$this->EventGenericSensorStrigger($msg, 'Critical', WSAL_Sensors_GenericSensorHooks_AlertCode_Critical);
    }

    public function EventGenericSensorStrigger($msg, $typestr, $alertCode) {
    
    		// alert string (convert to string if passed in an array, etc.)
        if (is_string($msg)) {
	        $alertText = $msg;
	      } else {
	      	$alertText = print_r($msg,true);
	      }

				// trigger it
        $this->plugin->alerts->Trigger($alertCode, array(
        	 'alertText' => $typestr . ': ' . $alertText)
        	 );
    }

}
