<?php

declare(strict_types=1);

namespace BbApp\SmartBanner\GooglePlay;

use BbApp\SmartBanner\SmartBanner;

/**
 * Generates Google Play smart banner meta tags.
 */
class GooglePlaySmartBanner extends SmartBanner
{
    protected $deep_link_requires_base_url = true;
	protected $options;

	/**
	 * Constructs a Google Play smart banner with the given options.
	 *
	 * @param GooglePlaySmartBannerOptions $options
	 */
	public function __construct(GooglePlaySmartBannerOptions $options)
	{
		parent::__construct($options);
	}

	/**
	 * Returns the meta tag name for Google Play smart banners.
	 *
	 * @return string
	 */
	function name(): string
	{
		return "google-play-app";
	}

	/**
	 * Returns the meta tag content with the app package name.
	 *
	 * @return string
	 */
	function content(): string
	{
		return "app-id=" . $this->options->appPackageName;
	}

	/**
	 * Generates an Android deep link URL.
	 *
	 * @param string $path
	 * @param string|null $base_url
	 * @return string|null
	 */
	function deep_link(string $path, ?string $base_url = null): ?string
	{
		if (!empty($base_url)) {
			$parts = parse_url($base_url);
			$host = $parts['host'] . (!empty($parts['port']) ? ':' . $parts['port'] : '');
			return "android-app://{$this->options->appPackageName}/https/" . $host . $path;
		}

		return null;
	}
}
