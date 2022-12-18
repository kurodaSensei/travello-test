<?php
namespace Alfredo\Config;

use WP_Query;

class CustomFunctions
{

    public function __construct()
    {
    }

    public function getCols(array $array)
    {
        $result = (100 / 12) * count($array);
        return $result;
    }

    public function getStars(Int $rate)
    {
        switch ($rate) {
            case 1:
                return '⭐️';
                break;
            case 2:
                return '⭐️⭐️';
                break;
            case 3:
                return '⭐️⭐️⭐️';
                break;
            case 4:
                return '⭐️⭐️⭐️⭐️';
                break;
            case 5:
                return '⭐️⭐️⭐️⭐️⭐️';
                break;

            default:
                return '';
                break;
        }
    }

    public function getField(String $name, Int $id)
    {
        return get_field($name, $id, true);
    }

    public static function getHotels(array $attrs)
    {
        $args = array(
            'post_type' => 'hotel',
            'posts_per_page' => 4,
            'order_by' => $attrs['order_by'],
            'order' => $attrs['order'],
        );

        $query = new WP_Query($args);

        return $query->get_posts();
    }

}
