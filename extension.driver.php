<?php
	
	class extension_XMLField extends Extension {

		public function about() {
			return array(
				'name'			=> 'Field: XML',
				'version'		=> '1.1',
				'release-date'	=> '2011-03-22',
				'author'		=> array(
					'name'			=> 'Symphony Team',
					'website'		=> 'http://symphony-cms/com',
					'email'			=> 'team@symphony-cms.com'
				),
				'description'	=> 'Textarea field that only accepts valid XML'
			);
		}
		
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
