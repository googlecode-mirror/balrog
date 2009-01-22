<?php
class Path implements Config
{
    public static function get_path ($filename)
    {}
    public static function get_html_path ($filename)
    {
        return sprintf('%1$s%2$sviews%2$shtml%2$s%3$s', self::DIRROOT, DIRECTORY_SEPARATOR, $filename);
    }
    public static function get_inc_path ($filename)
    {
        return sprintf('%1$s%2$sviews%2$sinc%2$s%3$s', self::DIRROOT, DIRECTORY_SEPARATOR, $filename);
    }
}