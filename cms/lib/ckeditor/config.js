/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//config.toolbar = 'Basic';

// Comment out or remove the 2 lines below if you want to enable the Advanced Content Filter	
config.allowedContent = true;
config.extraAllowedContent = '*{*}';	

    //привинчиваем файл-браузер
   
//config.filebrowserBrowseUrl = '/cms/lib/ckeditor/plugins/filemanager/browser/default/browser.html?Type=Image&Connector=/cms/lib/ckeditor/plugins/filemanager/connectors/php/connector.php'; 
//config.filebrowserFileBrowseUrl = '/cms/lib/ckeditor/plugins/filemanager/browser/default/browser.html?Type=Image&Connector=/cms/lib/ckeditor/plugins/filemanager/connectors/php/connector.php'; 
//config.filebrowserFlashBrowseUrl = '/cms/lib/ckeditor/plugins/filemanager/browser/default/browser.html?Type=Image&Connector=/cms/lib/ckeditor/plugins/filemanager/connectors/php/connector.php'; 
//config.filebrowserBrowseUrl='/cms/lib/ckeditor/plugins/filemanager/browser/default/browser.html?Type=Image&Connector=/cms/lib/ckeditor/plugins/filemanager/connectors/php/connector.php'; 


config.filebrowserBrowseUrl = '/cms/lib/ckeditor/kcfinder/browse.php?type=files',
config.filebrowserImageBrowseUrl = '/cms/lib/ckeditor/kcfinder/browse.php?type=images',
config.filebrowserFlashBrowseUrl = '/cms/lib/ckeditor/kcfinder/browse.php?type=flash',
config.filebrowserUploadUrl = '/cms/lib/ckeditor/kcfinder/upload.php?type=files',
config.filebrowserImageUploadUrl = '/cms/lib/ckeditor/kcfinder/upload.php?type=images',
config.filebrowserFlashUploadUrl = '/cms/lib/ckeditor/kcfinder/upload.php?type=flash'


    config.toolbar_Full =
    [
        ['Source','-','Templates'],
        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
        ['Maximize', 'ShowBlocks'],
        '/',
        ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Link','Unlink','Anchor','More'],
        ['Styles','Format'],
        ['TextColor','BGColor']
    ];
 
    config.toolbar_Medium = [
        ['Bold','Italic','Underline','Strike'],
        ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe','Youtube'],
        ['NumberedList','BulletedList','-','Blockquote'],
        ['Link','Unlink','Anchor','Smiley'],
        ['TextColor','BGColor'],
        ['Cut','Copy','Paste','PasteText','Scayt'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],['Source']
    ];
 
    config.toolbar_Basic =
    [
        ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-'],
        ['TextColor','BGColor'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ];
    
    config.toolbar_Web2Net =
    [
        ['Source','-','Save','NewPage','Preview','-','Templates'],
	['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
	'/',
	['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	['Link','Unlink','Anchor'],
	['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Youtube'],
	'/',
	['Styles','Format','Font','FontSize'],
	['TextColor','BGColor'],
	['Maximize', 'ShowBlocks','-','About']
    ];

};

