=== Shortcode Ajax ===
Contributors: rang501
Tags: shortcode, ajax
Requires at least: 3.0
Tested up to: 3.1
Stable tag: 1.0

Easiest solution to add some ajax to shortcodes.

== Description ==

This plugin adds new shortcode: [shortcode_ajax][/shortcode_ajax]
Originally written for WP-Table Reloaded plugin to add ability reload some tables dynamically. It should work with other plugins too!

== Installation ==

Download plugin and extract to wordpress plugins directory. See FAQ for further instructions.

== Frequently Asked Questions ==

= How to use it? =

After installation and activation, you will see new button inside the editor. Recommended way to use it, is to insert shortcode you need to be reloadable, then select it and click to Shortcode Ajax button. Basically, final result needs to be: [shortcode_ajax][YOUR SHORTCODE][/shortcode_ajax]

= Can I set reloading interval? =

Yes, but you need to edit main file to change it. Default is 10 000ms.

= Which wordpress versions are supported? =

It was developed with 3.1rc2. It should work with 2.9.

= Is this plugin secure? =

I really don't know that. Security was not the primary goal, so if you found something, that can break wordpress, please contact me ASAP.

= Why don't you use ajax-admin.php file for ajax requests? =

I tried it. I had some problems to get it working with WP-Table Reloaded, probably caused by is_admin() check, so no shortcodes were registered and reloading tables was impossible. If you know some workaround, you could mention it.

= How to contact you? =

Check plugin's main file.

== Changelog ==

= 1.0 =
* Initial release

