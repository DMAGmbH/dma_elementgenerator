

CREATE TABLE `tl_content` (
  `dma_eg_data` longtext NULL,
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `tl_module` (
  `dma_eg_data` longtext NULL,
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `tl_dma_eg` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',  
  `title` varchar(255) NOT NULL default '',
  `template` varchar(255) NOT NULL default '',
  `be_template` varchar(255) NOT NULL default '',
  `module` char(1) NOT NULL default '',
  `content` char(1) NOT NULL default '',
  `category` varchar(255) NOT NULL default '',
  `class` varchar(255) NOT NULL default '',
  `without_label` char(1) NOT NULL default '',
  `display_in_divs` char(1) NOT NULL default '',
  `invisible` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE `tl_dma_eg_fields` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',  
  `type` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `label` varchar(255) NOT NULL default '',
  `hidden` char(1) NOT NULL default '',
  `options` blob NULL
  `explanation` varchar(255) NOT NULL default '',
  `default_value` varchar(255) NOT NULL default '',
  `exclude` char(1) NOT NULL default '',
  `class` varchar(255) NOT NULL default '',
  `template` varchar(255) NOT NULL default '',
  `override_label_setting` char(1) NOT NULL default '',
  `without_label` char(1) NOT NULL default '',
  `eval_field_type` varchar(255) NOT NULL default '',
  `eval_path` blob NULL,
  `eval_mandatory` char(1) NOT NULL default '',
  `eval_blank_option` char(1) NOT NULL default '',
  `eval_chosen` char(1) NOT NULL default '',
  `eval_maxlength` int(10) unsigned NOT NULL default '0',
  `eval_minlength` int(10) unsigned NOT NULL default '0',
  `eval_rows` int(10) unsigned NOT NULL default '5',
  `eval_cols` int(10) unsigned NOT NULL default '100',
  `eval_tl_class` varchar(255) NOT NULL default '',
  `eval_rgxp` varchar(255) NOT NULL default '',
  `eval_rte` char(1) NOT NULL default '',
  `eval_extensions` varchar(255) NOT NULL default '',
  `eval_allow_html` char(1) NOT NULL default '',
  `eval_unique` char(1) NOT NULL default '',
  `eval_do_not_copy` char(1) NOT NULL default '',
  `eval_sortable` char(1) NOT NULL default '',
  `hyperlink_data` blob NULL,
  `image_data` blob NULL,
  `useCheckboxCondition` char(1) NOT NULL default '',
  `renderHiddenData` char(1) NOT NULL default '',
  `subpaletteSelector` int(10) unsigned NOT NULL default '0',
  `optionsType` varchar(255) NOT NULL default '',
  `optDbTable` varchar(255) NOT NULL default '',
  `optDbQuery` mediumtext NULL,
  `optDbTitle` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
