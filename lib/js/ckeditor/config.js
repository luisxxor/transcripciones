/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.

	// document
	config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'clipboard',   groups: [ 'undo', 'clipboard' ] },
		{ name: 'editing',     groups: [ 'find', 'selection' ] },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'document',	   groups: [ 'mode','document', 'doctools' ] },
		'/',
		{ name: 'links' },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'tools' },
	];
	
	// compact
	// config.toolbarGroups = [
		// { name: 'basicstyles', groups: [ 'basicstyles' ] },
		// { name: 'paragraph',   groups: [ 'list' ] },
		// { name: 'links' },
	// ];
	
	// developer
	// config.toolbarGroups = [
		// { name: 'document',	   groups: [ 'mode' ] },
		// { name: 'basicstyles', groups: [ 'basicstyles' ] },
		// { name: 'paragraph',   groups: [ 'list' ] },
		// { name: 'links' },
		// { name: 'insert' },
		// { name: 'styles' },
	// ];
	

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Strike,Subscript,Superscript,Anchor,Styles';

	// Set the most common block elements.
	config.format_tags = 'h1;h2;h3;p;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	
	config.extraPlugins='onchange'; 
	config.skin = 'bootstrapck';
	config.height = '100px';
	// config.width = '300px';
	config.minimumChangeMilliseconds = 100; // 100 milliseconds (default value)
};
