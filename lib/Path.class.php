<?php
require_once '../lib/Settings.class.php';
class Path
{
    public static function get_path($filename)
    {
        return sprintf('%1$s%2$sviews%2$s%3$s', Settings::get('blrg:dirroot'), DIRECTORY_SEPARATOR, $filename);
    }
    public static function get_html_path($filename)
    {
        return sprintf('%1$s%2$sviews%2$shtml%2$s%3$s', Settings::get('blrg:dirroot'), DIRECTORY_SEPARATOR, $filename);
    }
    public static function get_inc_path($filename)
    {
        return sprintf('%1$s%2$sviews%2$sinc%2$s%3$s', Settings::get('blrg:dirroot'), DIRECTORY_SEPARATOR, $filename);
    }
    public static function get_xml_path($filename)
    {
        return sprintf('%1$s%2$sviews%2$sxml%2$s%3$s', Settings::get('blrg:dirroot'), DIRECTORY_SEPARATOR, $filename);
    }
    public static function get_xsl_path($filename)
    {
        return sprintf('%1$s%2$sviews%2$sxsl%2$s%3$s', Settings::get('blrg:dirroot'), DIRECTORY_SEPARATOR, $filename);
    }
}
