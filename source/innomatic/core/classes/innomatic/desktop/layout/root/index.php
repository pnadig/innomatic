<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Innomatic root - <?php echo WebAppContainer::instance('webappcontainer')->getProcessor()->getRequest()->getServerName(); ?></title>
<link rel="shortcut icon"
    href="<?php echo InnomaticContainer::instance('innomaticcontainer')->getBaseUrl(false);?>/favicon.ico"
    type="image/x-icon" />
</head>
<?php
require_once('innomatic/desktop/layout/DesktopLayout.php');
$layout_mode = DesktopLayout::instance('desktoplayout')->getLayout();

if ($layout_mode == 'horiz') {
    ?>
<frameset rows="35,*,90" framespacing="0" border="0" frameborder="0">
        <frame name="header" target="main" src="logo" scrolling="no" noresize>
    <frame name="main" src="<?php echo $main_page_url; ?>" noresize>
        <frame name="menu" target="main" src="menu" scrolling="auto" noresize>
    <noframes>
    <body>
    <p align="center"><strong>Your browser doesn't support frames.</strong></p>
    </body>
    </noframes>
</frameset>
    <?php
} else {
    ?>
<frameset cols="150,*" framespacing="0" border="0" frameborder="0">
    <frameset rows="95,*" framespacing="0" border="0" frameborder="0">
        <frame name="header" target="main" src="logo" scrolling="no" noresize>
        <frame name="menu" target="main" src="menu" scrolling="auto" noresize>
    </frameset>
    <frame name="main" src="<?php echo $main_page_url; ?>" noresize>
    <noframes>
    <body>
    <p align="center"><strong>Your browser doesn't support frames.</strong></p>
    </body>
    </noframes>
</frameset>
<?php
}
?>
</html>