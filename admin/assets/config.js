/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    // Define changes to default configuration here. For example:
    config.language = 'en';
    config.extraPlugins = 'uploadimage';
    config.extraPlugins = 'image';
    //config.filebrowserUploadUrl = 'ckupload.php';
    config.filebrowserImageBrowseUrl = '/ckeditor/pictures';
    config.image_removeLinkByEmptyURL= true;
    config.image_previewText = CKEDITOR.tools.repeat( '?????????????? ', 100 );
};
