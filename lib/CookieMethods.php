<?php

/**
 * Checks if a user allowed given feature via cookie
 *
 * @param string $featureName
 * @return false
 */
function isFeatureAllowed(string $featureName)
{
    return strpos($_COOKIE['cookie_status'] ?? '', $featureName) !== false;
}

/**
 * Get all allowed features or false if nothing is selected
 *
 * @return false|string[]
 */
function getAllowedFeatures()
{
    return array_filter(explode(',', $_COOKIE['cookie_status'] ?? ''), function ($feature) {
        return !empty($feature) and $feature !== '';
    });
}

/**
 * Clear all allowed features
 *
 * @return bool
 */
function clearAllowedFeatures()
{
    return \Kirby\Http\Cookie::remove('cookie_status');
}

function getCookieModalTranslation($key)
{
    if (option('languages')) {
        return t("michnhokn.cookie-banner.$key");
    }
    return option("michnhokn.cookie-banner.content.$key");
}
