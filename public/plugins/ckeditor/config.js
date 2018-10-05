/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        
        // Default Skin
        config.skin = 'bootstrapck';
        
        // Toolbar Sets
        config.toolbar = 'Basic,Standard';
        config.toolbar_Basic =
                [
                        { name: 'basicstyles', items : [ 'Bold','Italic' ] },
			{ name: 'paragraph', items : [ 'NumberedList','BulletedList' ] },
			{ name: 'tools', items : [ 'Maximize','-','About' ] }
                ];
	config.toolbar_Standard =
                [
                        { name: 'document', items : [ 'Source','NewPage','Preview'] },
                        { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'
                         ,'Iframe' ] },
                        '/',
                        { name: 'styles', items : [ 'Styles','Format' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
                        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
                        { name: 'tools', items : [ 'Maximize','-','About' ] }
                ];
                
        // Image Uploader        
        //config.extraPlugins = 'sourcearea';
	config.filebrowserBrowseUrl = '/plugins/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl =  '/plugins/ckfinder/ckfinder.html?type=Images';
	config.filebrowserUploadUrl =  '/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
};
