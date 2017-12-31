<?php

$wsal_generic_alerts = array(
	__( 'Third Party Support', 'wp-security-audit-log' ) => array(
		__( 'Generic Alerts', 'wp-security-audit-log' ) => array(

			array(
				WSAL_Sensors_GenericSensorHooks_AlertCode_Notice,
				E_NOTICE,
				__( 'Generic alert (notice)', 'wp-security-audit-log' ),
        __('%alertText%', 'wp-security-audit-log')
			),
			array(
				WSAL_Sensors_GenericSensorHooks_AlertCode_Warning,
				E_WARNING,
				__( 'Generic alert (warning)', 'wp-security-audit-log' ),
        __('%alertText%', 'wp-security-audit-log')
			),
			array(
				WSAL_Sensors_GenericSensorHooks_AlertCode_Critical,
				E_CRITICAL,
				__( 'Generic alert (critical)', 'wp-security-audit-log' ),
         __('%alertText%', 'wp-security-audit-log')
			),

		)
	)
);
