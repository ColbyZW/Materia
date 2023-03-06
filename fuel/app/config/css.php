<?php
$webpack = \Config::get('materia.urls.js_css');
$vendor = \Config::get('materia.urls.js_css').'vendor/';
$cdnjs = '//cdnjs.cloudflare.com/ajax/libs/';
$g_fonts = '//fonts.googleapis.com/';

return [

	'always_load_groups' => [
		'default' => [
			'main',
			'fonts',
		],
	],

	'groups' => [
		'core' => [$webpack.'css/core.css'],
		'homepage' => [$webpack.'js/homepage.css'],
		'admin' => [$webpack.'css/admin.css'],
		'user-admin' => [$webpack.'js/user-admin.css'],
		'support' => [$webpack.'js/support.css'],
		'catalog' => [$webpack.'js/catalog.css'],
		'detail' => [$webpack.'js/detail.css'],
		'playpage' => [
			$webpack.'css/widget-player-page.css',
			$webpack.'css/loading-icon.css'
		],
		'widget_play' => [
			$webpack.'css/widget-play.css',
		],
		'lti' => [$webpack.'css/util-lti-picker.css'],
		'my_widgets'  => [$webpack.'js/my-widgets.css'],
		'widget_create' => [
			$webpack.'css/loading-icon.css',
			$webpack.'js/creator-page.css',
		],
		'widget_detail' => [
			$webpack.'css/widget-detail.css',
		],
		'widget_catalog' => [$webpack.'css/widget-catalog.css'],
		'profile' => [$webpack.'js/profile.css'],
		'login' => [$webpack.'js/login.css'],
		'scores' => [
			$cdnjs.'jqPlot/1.0.9/jquery.jqplot.min.css',
			$webpack.'js/scores.css',
		],
		'pre_embed_placeholder' => [$webpack.'js/pre-embed-common-styles.css'],
		'embed_scores' => [$webpack.'css/scores.css'],
		'question_import' => [
			$vendor.'jquery.dataTables.min.css',
			$webpack.'css/util-question-import.css',
			$webpack.'css/question-importer.css',
		],
		'questionimport' => [$webpack.'js/question-importer.css'],
		'qset_history' => [
			$webpack.'css/util-qset-history.css',
		],
		'rollback_dialog' => [
			$webpack.'css/util-rollback-confirm.css'
		],
		'media_import' => [$webpack.'js/media.css'],
		'help' => [$webpack.'css/help.css'],
		'errors' => [$webpack.'css/errors.css'],
		'fonts' => [
			$g_fonts.'css?family=Kameron:700&text=0123456789%25',
			$g_fonts.'css?family=Lato:300,400,700,700italic,900&amp;v2',
		],
		'guide' => [$webpack.'css/widget-guide.css'],
		// the following are required for the support-info styles to be embedded
		// TODO probably consolidate the support_info styles in a common stylesheet
		'draft-not-playable' => [$webpack.'js/draft-not-playable.css'],
		'500' => [$webpack.'js/500.css'],
		'no_permission' => [$webpack.'js/no-permission.css']
	],
];
