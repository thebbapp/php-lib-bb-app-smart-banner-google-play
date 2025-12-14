<?php

declare(strict_types=1);

namespace BbApp\SmartBanner\GooglePlay;

use BbApp\SmartBanner\SmartBannerOptions;

/**
 * Configuration options for Google Play smart banner.
 */
class GooglePlaySmartBannerOptions extends SmartBannerOptions
{
    public $appPackageName;

	/**
	 * Constructs Google Play smart banner options with the app package name.
	 *
	 * @param string $appPackageName
	 */
    public function __construct(string $appPackageName)
    {
        $this->appPackageName = $appPackageName;
        parent::__construct();
    }
}
