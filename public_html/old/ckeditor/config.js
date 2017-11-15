/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserUploadUrl = '/ckeditor/upload.php';
	config.filebrowserImageBrowseLinkUrl = '/ckeditor/browse.php';
	config.filebrowserFlashBrowseUrl = '/ckeditor/browse.php';
	//config.skin = 'office2003';

	//config.toolbar = 'Basic';
 
	config.toolbar_Basic =
	[
		['Source', 'Bold', 'Italic', 'Underline','Strike','Subscript','Superscript', 'TextColor','BGColor', 'NumberedList', 'BulletedList', 'Link', 'Unlink','Image','PasteText','PasteFromWord']
	];

};
