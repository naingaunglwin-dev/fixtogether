<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;


if (!function_exists('_uriCheck')) {
    /**
     * Check if the current URL contains the given URI.
     *
     * @param string $uri The URI to check against the current URL.
     * @return bool Returns true if the current URL contains the given URI; otherwise, false.
     */
    function _uriCheck(string $uri): bool
    {
        $current = \Illuminate\Support\Facades\URL::current();

        return str_contains($current, $uri);
    }
}

if (!function_exists('_uriIs')) {
    /**
     * Check if the current URL is exactly the same as the given URI.
     *
     * @param string $uri The URI to compare with the current URL.
     * @return bool Returns true if the current URL matches the given URI exactly; otherwise, false.
     */
    function _uriIs(string $uri): bool
    {
        $current = \Illuminate\Support\Facades\URL::current();

        return $uri === $current;
    }
}

if (!function_exists('loggedInUser')) {
    /**
     * Get the logged-in user from the session.
     *
     * @return mixed Returns the logged-in user data, or null if the user is not logged in.
     */
    function loggedInUser(): mixed
    {
        return Session::get('user');
    }
}

if (!function_exists('_logout')) {
    /**
     * Log out the current user and redirect if specified.
     *
     * @param string $redirect The optional URL to redirect to after logging out.
     * @return \Illuminate\Contracts\Foundation\Application|Application|RedirectResponse|Redirector Returns a redirect response if $redirect is provided; otherwise, returns the Application instance.
     */
    function _logout(string $redirect = ''): Application|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        Session::pull('user');

        $language = app()->getLocale();

        $site = (loggedInUser()->role === 'admin') ? 'admin/' : '';

        return redirect($language . $site . $redirect);
    }
}

if (!function_exists('_configSiteApp')) {
    /**
     * Get a configuration value from the siteApp configuration.
     *
     * @param string $name The name of the configuration value to retrieve.
     * @return mixed Returns the value of the specified configuration item.
     */
    function _configSiteApp(string $name): mixed
    {
        return config("siteApp.$name");
    }
}

if (!function_exists('_assetVersion')) {
    /**
     * Get the asset version from the configuration.
     *
     * @return string Returns the asset version from the configuration.
     */
    function _assetVersion(): string
    {
        return _configSiteApp('assetVersion');
    }
}

if (!function_exists('_baseUrl')) {

    /**
     * Generate a base URL with optional redirection.
     *
     * **Not included locale in url by default.**
     *
     * @param string $url The optional URL path to append to the base URL.
     * @param bool $redirect Indicates whether to return a redirect response.
     * @param int $status HTTP Status to used in redirect
     * @return Application|string|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application Returns the base URL with or without the appended path, or a redirect response if $redirect is true.
     */
    function _baseUrl(string $url = '', bool $redirect = false, int $status = 302): Application|string|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $url = !empty($url) && !str_starts_with('/' || '\\', $url) ? "/$url" : $url;

        $baseUrl = \Illuminate\Support\Facades\Request::root() . $url;

        return $redirect ? redirect($baseUrl, $status) : $baseUrl ;
    }
}

if (!function_exists('_localizedRoute')) {
    /**
     * Generate a localized route URL.
     *
     * @param string $route The name of the route.
     * @return string Returns the URL for the localized route.
     */
    function _localizedRoute(string $route): string
    {
        $route = str_replace(_baseUrl(), '', route($route));

        $locale = app()->getLocale();

        return _baseUrl($locale . $route);
    }
}

if (!function_exists('_uriSegmentIs')) {
    /**
     * Checks if a specific URI segment matches a given value.
     *
     * @param int $segment The segment index to check (1-based index).
     * @param string $url The value to compare with the URI segment.
     * @return bool Returns true if the specified URI segment matches the given value, false otherwise.
     */
    function _uriSegmentIs(int $segment, string $url): bool
    {
        $path = \Illuminate\Support\Facades\Request::path();

        $path = explode('/', $path);

        if ($path[($segment - 1)] && $path[($segment - 1)] === $url) {
            return true;
        }

        return false;
    }
}
