<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$meta_title?></title>
    <link href="<?=base_url('css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('css/datepicker.css')?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url('js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('js/bootstrap-datepicker.js')?>"></script>

    <?php if (isset($sortable) && $sortable == true): ?>
    <link href="<?=base_url('css/admin.css')?>" rel="stylesheet">
    <script src="<?=base_url('js/jquery-ui-1.9.1.custom.min.js')?>"></script>
    <script src="<?=base_url('js/jquery.mjs.nestedSortable.js')?>"></script>
    <?php endif; ?>

    <script src="http://ci.cms/public_html/js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
    tinyMCE.init({
      mode : "textareas",
      theme : "advanced",
      plugins : "paste,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage," +
            "advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace," +
            "print,contextmenu,directionality,fullscreen,noneditable,visualchars,nonbreaking," +
            "xhtmlxtras,template,wordcount,advlist,visualblocks",
      theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
      theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
      theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
      theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
      theme_advanced_toolbar_location : "top",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom",
      theme_advanced_resizing : true,
      add_unload_trigger: false,

      theme_advanced_default_font_size : '10pt',
      theme_advanced_default_font_family : 'Verdana',
      theme_advanced_fonts : "Andale Mono=andale mono,monospace;Arial=arial,helvetica,sans-serif;Arial Black=arial black,sans-serif;Book Antiqua=book antiqua,palatino,serif;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier,monospace;Georgia=georgia,palatino,serif;Helvetica=helvetica,arial,sans-serif;Impact=impact,sans-serif;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco,monospace;Times New Roman=times new roman,times,serif;Trebuchet MS=trebuchet ms,geneva,sans-serif;Verdana=verdana,geneva,sans-serif;Webdings=webdings;Wingdings=wingdings,zapf dingbats",
      theme_advanced_font_sizes : '8pt,9pt,10pt,11pt,12pt,14pt,16pt,18pt,20pt,22pt,24pt,28pt,36pt',
    });
    </script>
</head>