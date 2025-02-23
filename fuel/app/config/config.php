<?php

// See FuelPHP documentation on \Config for more info
return array(

	/**
	 * base_url - The base URL of the application.
	 * MUST contain a trailing slash (/)
	 *
	 * You can set this to a full or relative URL:
	 *
	 *     'base_url' => '/foo/',
	 *     'base_url' => 'http://foo.com/'
	 *
	 * Set this to null to have it automatically detected.
	 */
	// 'base_url'  => null,

	/**
	 * url_suffix - Any suffix that needs to be added to
	 * URL's generated by Fuel. If the suffix is an extension,
	 * make sure to include the dot
	 *
	 *     'url_suffix' => '.html',
	 *
	 * Set this to an empty string if no suffix is used
	 */
	// 'url_suffix'  => '',

	/**
	 * index_file - The name of the main bootstrap file.
	 *
	 * Set this to 'index.php if you don't use URL rewriting
	 */
	// 'index_file' => false,

	// 'profiling'  => false,

	/**
	 * Default location for the file cache
	 */
	// 'cache_dir'       => APPPATH.'cache/',

	/**
	 * Settings for the file finder cache (the Cache class has it's own config!)
	 */
	// 'caching'         => false,
	// 'cache_lifetime'  => 3600, // In Seconds

	/**
	 * Callback to use with ob_start(), set this to 'ob_gzhandler' for gzip encoding of output
	 */
	// 'ob_callback'  => null,

	// 'errors'  => array(
		// Which errors should we show, but continue execution? You can add the following:
		// E_NOTICE, E_WARNING, E_DEPRECATED, E_STRICT to mimic PHP's default behaviour
		// (which is to continue on non-fatal errors). We consider this bad practice.
		// 'continue_on'  => array(),
		// How many errors should we show before we stop showing them? (prevents out-of-memory errors)
		// 'throttle'     => 10,
		// Should notices from Error::notice() be shown?
		// 'notices'      => true,
		// Render previous contents or show it as HTML?
		// 'render_prior' => false,
	// ),

	/**
	 * Localization & internationalization settings
	 */
	// 'language'           => 'en', // Default language
	// 'language_fallback'  => 'en', // Fallback language when file isn't available for default language
	'locale'             => $_ENV['FUEL_LOCAL'] ?? 'en_US.UTF-8', // PHP set_locale() setting, null to not set

	/**
	 * Internal string encoding charset
	 */
	// 'encoding'  => 'UTF-8',

	/**
	 * DateTime settings
	 *
	 * server_gmt_offset	in seconds the server offset from gmt timestamp when time() is used
	 * default_timezone		optional, if you want to change the server's default timezone
	 */
	// 'server_gmt_offset'  => 0,
	// 'default_timezone'   => null,

	/**
	 * Logging Threshold.  Can be set to any of the following:
	 *
	 * Fuel::L_NONE
	 * Fuel::L_ERROR
	 * Fuel::L_WARNING
	 * Fuel::L_DEBUG
	 * Fuel::L_INFO
	 * Fuel::L_ALL
	 */
	'log_threshold'    => $_ENV['FUEL_LOG_THRESHOLD'] ?? Fuel::L_WARNING,
	// 'log_path'         => APPPATH.'logs/',
	'log_date_format'  => 'H:i:s',

	// provide a monolog handler
	'log_handler_factory' => function($locals, $level)
	{
		$handler_type = $_ENV['LOG_HANDLER'] ?? '';
		if($handler_type == 'STDOUT')
		{
			return new \Monolog\Handler\ErrorLogHandler();
		}

		// no matches, use the default handler
		return null;
	},

	'log_file_perms'   => 0664,
	/**
	 * Security settings
	 */
	'security' => array(
		// 'csrf_autoload'            => false,
		// 'csrf_autoload_methods'    => array('post', 'put', 'delete'),
		// 'csrf_bad_request_on_fail' => false,
		// 'csrf_auto_token'          => false,
		// 'csrf_token_key'           => 'fuel_csrf_token',
		// 'csrf_expiration'          => 0,

		/**
		 * A salt to make sure the generated security tokens are not predictable
		 */
		// 'token_salt'            => 'put your salt value here to make the token more secure',

		/**
		 * Allow the Input class to use X headers when present
		 *
		 * Examples of these are HTTP_X_FORWARDED_FOR and HTTP_X_FORWARDED_PROTO, which
		 * can be faked which could have security implications
		 */
		// 'allow_x_headers'       => false,

		/**
		 * This input filter can be any normal PHP function as well as 'xss_clean'
		 *
		 * WARNING: Using xss_clean will cause a performance hit.
		 * How much is dependant on how much input data there is.
		 */
		'uri_filter'       => array('htmlentities'),

		/**
		 * This input filter can be any normal PHP function as well as 'xss_clean'
		 *
		 * WARNING: Using xss_clean will cause a performance hit.
		 * How much is dependant on how much input data there is.
		 */
		// 'input_filter'  => array(),

		/**
		 * This output filter can be any normal PHP function as well as 'xss_clean'
		 *
		 * WARNING: Using xss_clean will cause a performance hit.
		 * How much is dependant on how much input data there is.
		 */
		'output_filter'  => array('Security::htmlentities'),

		/**
		 * Encoding mechanism to use on htmlentities()
		 */
		// 'htmlentities_flags' => ENT_QUOTES,

		/**
		 * Whether to encode HTML entities as well
		 */
		// 'htmlentities_double_encode' => false,

		/**
		 * Whether to automatically filter view data
		 */
		'auto_filter_output'  => true,

		/**
		 * With output encoding switched on all objects passed will be converted to strings or
		 * throw exceptions unless they are instances of the classes in this array.
		 */
		'whitelisted_classes' => array(
			'Fuel\\Core\\Presenter',
			'Fuel\\Core\\Response',
			'Fuel\\Core\\View',
			'Closure',
			'Materia\\Widget_Instance',
			'Materia\\Msg',
			'Materia\\Score_Record',
			'Materia\\Widget',
		),
	),

	/**
	 * Cookie settings
	 */
	// 'cookie' => array(
		// Number of seconds before the cookie expires
		// 'expiration'  => 0,
		// Restrict the path that the cookie is available to
		// 'path'        => '/',
		// Restrict the domain that the cookie is available to
		// 'domain'      => null,
		// Only transmit cookies over secure connections
		// 'secure'      => false,
		// Only transmit cookies over HTTP, disabling Javascript access
		// 'http_only'   => false,
	// ),

	/**
	 * Validation settings
	 */
	// 'validation' => array(
		/**
		 * Whether to fallback to global when a value is not found in the input array.
		 */
		// 'global_input_fallback' => true,
	// ),

	/**
	 * Controller class prefix
	 */
	 // 'controller_prefix' => 'Controller_',

	/**
	 * Routing settings
	 */
	// 'routing' => array(
		/**
		 * Whether URI routing is case sensitive or not
		 */
		// 'case_sensitive' => true,

		/**
		 *  Whether to strip the extension
		 */
		// 'strip_extension' => true,
	// ),

	/**
	 * To enable you to split up your application into modules which can be
	 * routed by the first uri segment you have to define their basepaths
	 * here. By default empty, but to use them you can add something
	 * like this:
	 *      array(APPPATH.'modules'.DS)
	 *
	 * Paths MUST end with a directory separator (the DS constant)!
	 */
	'module_paths' => array(
		APPPATH.'modules'.DS
	),

	/**
	 * To enable you to split up your additions to the framework, packages are
	 * used. You can define the basepaths for your packages here. By default
	 * empty, but to use them you can add something like this:
	 *      array(APPPATH.'modules'.DS)
	 *
	 * Paths MUST end with a directory separator (the DS constant)!
	 */
	'package_paths' => array(
		PKGPATH,
	),

	/**************************************************************************/
	/* Always Load                                                            */
	/**************************************************************************/
	'always_load'  => array(

		/**
		 * These packages are loaded on Fuel's startup.
		 * You can specify them in the following manner:
		 *
		 * array('auth'); // This will assume the packages are in PKGPATH
		 *
		 * // Use this format to specify the path to the package explicitly
		 * array(
		 *     array('auth'	=> PKGPATH.'auth/')
		 * );
		 */
		'packages'  => explode(',', $_ENV['FUEL_ALWAYS_LOAD_PACKAGES'] ?? 'orm,auth,materiaauth,ltiauth'),

		/**
		 * These modules are always loaded on Fuel's startup. You can specify them
		 * in the following manner:
		 *
		 * array('module_name');
		 *
		 * A path must be set in module_paths for this to work.
		 */
		'modules' => explode(',', $_ENV['FUEL_ALWAYS_LOAD_MODULES'] ?? ''),

		/**
		 * Classes to autoload & initialize even when not used
		 */
		'classes' => array(
			'Alwaysload',
		),

		/**
		 * Configs to autoload
		 *
		 * Examples: if you want to load 'session' config into a group 'session' you only have to
		 * add 'session'. If you want to add it to another group (example: 'auth') you have to
		 * add it like 'session' => 'auth'.
		 * If you don't want the config in a group use null as groupname.
		 */
		'config' => array(
			'lti::lti',
		),

		/**
		 * Language files to autoload
		 *
		 * Examples: if you want to load 'validation' lang into a group 'validation' you only have to
		 * add 'validation'. If you want to add it to another group (example: 'forms') you have to
		 * add it like 'validation' => 'forms'.
		 * If you don't want the lang in a group use null as groupname.
		 */
		'language' => array(
			'login',
		),
	),

	// which widgets are installed with the widget:install_from_config task
	'widgets' => [
		[
			'id' => 1,
			'package'  => 'https://github.com/ucfopen/crossword-materia-widget/releases/latest/download/crossword.wigt',
			'checksum' => 'https://github.com/ucfopen/crossword-materia-widget/releases/latest/download/crossword-build-info.yml',
		],
		[
			'id' => 2,
			'package'  => 'https://github.com/ucfopen/guess-the-phrase-materia-widget/releases/latest/download/guess-the-phrase.wigt',
			'checksum' => 'https://github.com/ucfopen/guess-the-phrase-materia-widget/releases/latest/download/guess-the-phrase-build-info.yml',
		],
		[
			'id' => 3,
			'package'  => 'https://github.com/ucfopen/matching-materia-widget/releases/latest/download/matching.wigt',
			'checksum' => 'https://github.com/ucfopen/matching-materia-widget/releases/latest/download/matching-build-info.yml',
		],
		[
			'id' => 4,
			'package'  => 'https://github.com/ucfopen/enigma-materia-widget/releases/latest/download/enigma.wigt',
			'checksum' => 'https://github.com/ucfopen/enigma-materia-widget/releases/latest/download/enigma-build-info.yml',
		],
		[
			'id' => 5,
			'package'  => 'https://github.com/ucfopen/labeling-materia-widget/releases/latest/download/labeling.wigt',
			'checksum' => 'https://github.com/ucfopen/labeling-materia-widget/releases/latest/download/labeling-build-info.yml',
		],
		[
			'id' => 6,
			'package' => 'https://github.com/ucfopen/flash-cards-materia-widget/releases/latest/download/flash-cards.wigt',
			'checksum' => 'https://github.com/ucfopen/flash-cards-materia-widget/releases/latest/download/flash-cards-build-info.yml'
		],
		[
			'id' => 7,
			'package' => 'https://github.com/ucfopen/this-or-that-materia-widget/releases/latest/download/this-or-that.wigt',
			'checksum' => 'https://github.com/ucfopen/this-or-that-materia-widget/releases/latest/download/this-or-that-build-info.yml'
		],
		[
			'id' => 8,
			'package' => 'https://github.com/ucfopen/word-search-materia-widget/releases/latest/download/word-search.wigt',
			'checksum' => 'https://github.com/ucfopen/word-search-materia-widget/releases/latest/download/word-search-build-info.yml'
		],
		[
			'id' => 9,
			'package' => 'https://github.com/ucfopen/adventure-materia-widget/releases/latest/download/adventure.wigt',
			'checksum' => 'https://github.com/ucfopen/adventure-materia-widget/releases/latest/download/adventure-build-info.yml'
		],
		[
			'id' => 10,
			'package' => 'https://github.com/ucfopen/equation-sandbox-materia-widget/releases/latest/download/equation-sandbox.wigt',
			'checksum' => 'https://github.com/ucfopen/equation-sandbox-materia-widget/releases/latest/download/equation-sandbox-build-info.yml'
		],
		[
			'id' => 11,
			'package' => 'https://github.com/ucfopen/sort-it-out-materia-widget/releases/latest/download/sort-it-out.wigt',
			'checksum' => 'https://github.com/ucfopen/sort-it-out-materia-widget/releases/latest/download/sort-it-out-build-info.yml'
		],
		[
			'id' => 12,
			'package' => 'https://github.com/ucfopen/survey-materia-widget/releases/latest/download/simple-survey.wigt',
			'checksum' => 'https://github.com/ucfopen/survey-materia-widget/releases/latest/download/simple-survey-build-info.yml'
		],
		[
			'id' => 13,
			'package' => 'https://github.com/ucfopen/sequencer-materia-widget/releases/latest/download/sequencer.wigt',
			'checksum' => 'https://github.com/ucfopen/sequencer-materia-widget/releases/latest/download/sequencer-build-info.yml'
		],
		[
			'id' => 14,
			'package' => 'https://github.com/ucfopen/syntax-sorter-materia-widget/releases/latest/download/syntax-sorter.wigt',
			'checksum' => 'https://github.com/ucfopen/syntax-sorter-materia-widget/releases/latest/download/syntax-sorter-build-info.yml'
		]
	],
);
