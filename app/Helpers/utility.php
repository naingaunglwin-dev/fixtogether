<?php

if (!function_exists('_message')) {
    /**
     * Alert message output with styled
     *
     * @param string $message
     * @param string $type success or error
     * @return string
     */
    function _message(string $message, string $type): string
    {
        $html = '<div class="alert-'. $type .'" >';

        $html .= $message;

        $html .= '</div>';

        return $html;
    }
}
