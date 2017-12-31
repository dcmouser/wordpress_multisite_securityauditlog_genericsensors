# wordpress_multisite_securityauditlog_genericsensors
addon plugin for the wp-security-audit-log plugin for wordpress, that provides generic sensors for arbitrary coder/user generated event logging

=== WP Security Audit Log addon for Generic Sensors ===
  Plugin Name: WP Security Audit Log - Generic Sensor
  Plugin URI: https://www.donationcoder.com
  Description: an addon to the WP Security Audit Log Plugin to track generic simple string events
  Version: 1.0
  Author: mouser@donationcoder.com based on code by Bill Stoltz
  Author URI:
  Depends: WP Security Audit Log
  License: GPL3

Contributors: billstotlz, mouser@donationcoder.com
Tags: Wordpress Security Audit Log, Wordpress Security plugin, event log wordpress, audit log
Requires at least: 4
Tested up to: 4.8.1
Stable tag: 1.1.4
Depends on : WP Security Audit Log

An Addon to the WP Security Audit Log plugin to log generic events

== Description ==

This plugin Extends the plugin [WP Security Audit Log](https://wordpress.org/plugins/wp-security-audit-log/) to log generic events.
It is based heavily on the code by Bill Stoltz in his plugin for his plugin: [Paid Memberships Pro](https://wordpress.org/plugins/paid-memberships-pro/).

= Actions / Hooks Supported in the plugin =

Anywhere in any of your code you may trigger an audit log entry via any of the following:
do_action('wsal_notice', 'your message here');
do_action('wsal_warning', 'your message here');
do_action('wsal_critical', 'your message here');

You can also create your own custom sensors (thanks to Bill Stoltz's flexible code) by adding a new sensor php file in the Sensors directory.

== Installation ==

= Download, Install and Activate! =
In your WordPress admin, go to Plugins > Add New to install WP Security Audit Log for Paid Memberships Pro, or:

1. Download the latest version of the plugin.
2. Unzip the downloaded file to your computer.
3. Upload the /wpsecurity-audit-log-genericsensors/ directory to the /wp-content/plugins/ directory of your site.
4. Activate the plugin through the 'Plugins' menu in WordPress.

== Screenshots ==

== Changelog ==

= 1.0 =
* Initial version