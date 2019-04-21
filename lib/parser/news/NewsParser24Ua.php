<?php

namespace Lib\Parser\News;

class NewsParser24Ua extends BaseNewsParser implements InterfaceNewsParser
{
    protected $url = 'https://24tv.ua/';
    protected $id_donor = 1;

    public function __construct($count)
   {
       parent::__construct($this->url, $count);

       $this->get_link_list();
       $this->parse_link_get_data();
//       $this->check_valid();

   }

    public function get_link_list()
    {
        $array = $this->html->find('.news-list li');

        $count = ($this->count != null) ? $this->count : count($array);

        foreach ($array as $k => $article) {
            if($k <= $count - 1){
                $article = pq($article);
                $l = $article->find('a')->attr('href');
                $this->link_list[] = $this->url . $l;
            }
        }
    }

    public function parse_link_get_data()
    {
        foreach ($this->link_list as $k => $item) {

            $curl = self::curl($item);
            $html = \phpQuery::newDocument($curl);

            $html->find('.recomendation_list')->remove();

            $res['data']['id_donor'] = $this->id_donor;

            $title = $html->find('.article');
            $title = pq($title)->find('.article_title')->text();
            $res['data']['title_ua'] = $this->clean_text($title);
            $this->titles[$k] = pq($title)->find('.article_title')->text();


            $img = ($html->find('.b_photo')) ?: '';
            $res['data']['img'] = pq($img)->find('img')->attr('src');

            $text = $html->find('.article_text');
            $text->find('.cke-markup')->remove();
            $text->find('img')->attr('style','width: 100%');
//            $img_w = $text->find('p > img')->attr('width');
//            $text->find('p > img')->wrap('<div style="'.round($img_w/2).'">');
            $text = pq($text)->find('#newsSummary')->html();


            $res['data']['text_ua'] = $this->clean_text($text);

            $res['data']['views'] = $this->random_views();

            $tag = $html->find('.tags a');

            foreach ($tag as $kk => $vv){
                $ua[$kk] = pq($vv)->text();
            }

            $this->data[$k] = $res;

            //////////////////get ru content///////////////////////////////////////////////

            $ru_link = $html->find('.changeLangRU')->attr('href');

            $curl_ru = self::curl($ru_link);
            $html_ru = \phpQuery::newDocumentHTML($curl_ru);

            $title_ru = $html_ru->find('.article');
            $res['data']['title_ru'] = $this->clean_text(pq($title_ru)->find('.article_title')->text());

            $text_ru = $title_ru->find('.article_text');
            $text_ru->find('.cke-markup')->remove();
            $res['data']['text_ru'] = $this->clean_text(pq($text_ru)->find('#newsSummary')->html());

            $tag_ru = $html_ru->find('.tags a');

            foreach ($tag_ru as $ku => $vvv){
                $ru[$ku] = pq($vvv)->text();
            }

            $res['data']['id_category'] = ($this->get_category('ru', $ru)) ?: 'all';

            $this->data[$k] = ($res['data']['title_ru']) ? $res : null;
        }
    }
}