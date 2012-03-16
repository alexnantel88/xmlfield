<?php
	
	class extension_XMLField extends Extension {
		
		public function uninstall() {
			Symphony::Database()->query("DROP TABLE `tbl_fields_xml`");
		}
		
		public function install() {
			return Symphony::Database()->query("CREATE TABLE IF NOT EXISTS `tbl_fields_xml` (
			  `id` int(11) unsigned NOT NULL auto_increment,
			  `field_id` int(11) unsigned NOT NULL,
			  `size` int(3) unsigned NOT NULL,
			  PRIMARY KEY  (`id`),
			  KEY `field_id` (`field_id`)
			) TYPE=MyISAM;"
			);
		}

	}
