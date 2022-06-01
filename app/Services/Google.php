<?php

namespace App\Services;

class Google
{
    private $max_num = 50;

    private $keywords = "仮想通貨";

    private $API_BASE_URL;

    private $items;

    public function __construct()
    {
        $this->API_BASE_URL = "https://news.google.com/rss/search?ie=UTF-8&oe=UTF-8&q=" . $this->keywords . "&hl=ja&gl=JP&ceid=JP:ja";

        $this->items = simplexml_load_file($this->API_BASE_URL)->channel->item;
    }

    public function news()
    {
        set_time_limit(120);

        //記事のタイトルとURLを取り出して配列に格納
        for ($i = 0; $i < count($this->items); $i++) {
            $list[$i]['title'] = mb_convert_encoding($this->items[$i]->title, "UTF-8", "auto");
            $list[$i]['url'] = mb_convert_encoding($this->items[$i]->link, "UTF-8", "auto");
            $list[$i]['pubDate'] = mb_convert_encoding($this->items[$i]->pubDate, "UTF-8", "auto");
            $list[$i]['description'] = mb_convert_encoding($this->items[$i]->description, "UTF-8", "auto");
        }

        //$max_num以上の記事数の場合は切り捨て
        if (count($list) > $this->max_num) {
            for ($i = 0; $i < $this->max_num; $i++) {
                $list_gn[$i] = $list[$i];
                $i++;
            }
        } else {
            $list_gn = $list;
        }

        return $list_gn;
    }
}
