<?php


namespace Rahim;
require_once __DIR__.'/../../../../wp-load.php';

class Keywords
{
    public $output;
    private $pattern;

    // Get data with Post ID {id} keyword
    public function DataWithID($post = '')
    {
        $this->pattern = '@Post ID {(.*?)}@';
        global $wpdb;
        preg_match_all($this->pattern,$post,$ids);
        $this->output = $post;
        if (count($ids[1]) !== 0)
        {
            foreach ($ids[1] as $id)
            {
                $data = $wpdb->get_results( "SELECT * FROM  wp_posts WHERE ID = ".$id." AND post_status = 'publish' AND post_title != '' AND comment_status = 'open'",ARRAY_A);

                $replace = '';
                if (count($data) !== 0)
                {
                    $replace .= "\n Title :".$data[0]['post_title'];
                    $replace .= "\n Content :".$data[0]['post_content']."\n";
                    $this->output = str_replace("Post ID {".$id."}",$replace,$post);
                    $post = $this->output;
                    $replace = '';
                }
            }
        }

        return $this->output;
    }

    // Get data with Post title {title} keyword
    public function DataWithTITLE($post = '')
    {
        $this->pattern = '@Post title {(.*?)}@';
        global $wpdb;
        preg_match_all($this->pattern,$post,$titles);
        $this->output = $post;
        if (count($titles[1]) !== 0)
        {
            foreach ($titles[1] as $title)
            {
                $data = $wpdb->get_results( "SELECT * FROM `wp_posts` WHERE `post_title` = '".$title."'",ARRAY_A);

                $replace = '';
                if (count($data) !== 0)
                {
                    $replace .= "\n Title :".$data[0]['post_title'];
                    $replace .= "\n Content :".$data[0]['post_content']."\n";
                    $this->output = str_replace("Post title {".$title."}",$replace,$post);
                    $post = $this->output;
                    $replace = '';
                }
            }
        }

        return $this->output;
    }
}