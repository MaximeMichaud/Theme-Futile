<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=yes">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<title><?= $title_for_layout; ?> - <?= $website_name ?></title>
	<link rel="icon" type="image/png" href="<?= $theme_config['favicon_url'] ?>" />
	<!-- CSS -->
	<?= $this->Html->css('style.css'); ?>
	<?= $this->Html->css('nav.css'); ?>
	<?= $this->Html->css('home.css'); ?>
	<?= $this->Html->css('footer.css'); ?>
	<?= $this->Html->css('services.css'); ?>
	<?= $this->Html->css('news.css'); ?>
	<?= $this->Html->css('modals.css'); ?>
	<?= $this->Html->css('plugins.css'); ?>

	<?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'); ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">

	<!-- JavaScript -->
	<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'); ?>
	<?= $this->Html->script('bootstrap.min.js') ?>
	<?= $this->Html->script('nav.js') ?>
	<?= $this->Html->script('jquery.cookie.js') ?>
</head>
<body>
<?= $this->element('modals') ?>
<?= $this->element('navbar') ?>
<?php
		/*
		if ($this->Html->url('') == $this->Html->url('/'))
echo $this->fetch('content');
else
echo $this->fetch('content');
*/
?>
<?= $this->fetch('content'); ?>

<?= $this->element('footer') ?>
<?= $this->element('scripts'); ?>
<?= $this->Html->script('app.js') ?>
<?= $this->Html->script('form.js') ?>
<?= $this->Html->script('notification.js') ?>
<script>
    $(document).ready(function() {
        var offset=250,
            scrollDuration=300;
        $(window).scroll(function() {
            if ($(this).scrollTop() > offset) {
                $('.totop').fadeIn(500);
            } else {
                $('.totop').fadeOut(500);
            }
        });

        $('.totop').click(function(event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: 0}, scrollDuration);
        })
    });

</script>
<script>
    <?php if($isConnected) { ?>
        var notification = new $.Notification({
            'url': {
                'get': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'getAll')) ?>',
                'clear': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clear', 'NOTIF_ID')) ?>',
                'clearAll': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clearAll')) ?>',
                'markAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAsSeen', 'NOTIF_ID')) ?>',
                'markAllAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAllAsSeen')) ?>'
            },
            'messages': {
                'markAsSeen': '<?= $Lang->get('NOTIFICATION__MARK_AS_SEEN') ?>',
                'notifiedBy': '<?= $Lang->get('NOTIFICATION__NOTIFIED_BY') ?>'
            }
        });
    <?php } ?>
    var LIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'like')) ?>";
    var DISLIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'dislike')) ?>";

    var LOADING_MSG = "<?= $Lang->get('GLOBAL__LOADING') ?>";
    var ERROR_MSG = "<?= $Lang->get('GLOBAL__ERROR') ?>";
    var INTERNAL_ERROR_MSG = "<?= $Lang->get('ERROR__INTERNAL_ERROR') ?>";
    var FORBIDDEN_ERROR_MSG = "<?= $Lang->get('ERROR__FORBIDDEN') ?>"
    var SUCCESS_MSG = "<?= $Lang->get('GLOBAL__SUCCESS') ?>";

    var CSRF_TOKEN = "<?= $csrfToken ?>";
</script>

<?php if(isset($google_analytics) && !empty($google_analytics)) { ?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?= $google_analytics ?>', 'auto');
    ga('send', 'pageview');
</script>
<?php } ?>
<?= $configuration_end_code ?>
</body>
</html>

