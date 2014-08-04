<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('getTimeAgo')) {
    
    function getTimeAgo($date, $granularity = 1)
    {
        
        $values = explode(" ", $date);
        
        $time       = new DateTime('now', new DateTimeZone('UTC')); //GET CURRENT UTC TIME
        $date = $values[0] . "-" . $values[1] ;
        $difference = strtotime($time->format('Y-m-d H:i:s')) - strtotime($date);
        $retval     = '';
        $periods    = array(
            'decade' => 315360000,
            'year' => 31536000,
            'month' => 2628000,
            'week' => 604800,
            'day' => 86400,
            'hour' => 3600,
            'min' => 60,
            'sec' => 1
        );
        
        foreach ($periods as $key => $value) {
            if ($difference >= $value) {
                $time = floor($difference / $value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '') . $time . ' ';
                $retval .= (($time > 1) ? $key . 's' : $key);
                $granularity--;
            }
            if ($granularity == '0') {
                break;
            }
        }
        return $retval . ' ago';
    }
    
}

if (!function_exists('getNewsHTML')) {
    
    function getNewsHTML($news = array())
    {
        $html = '';
        if (empty($news))
            return NULL;
        //$html .= '<div class="tweetWrapper">';
        //$html .= '<div class="tweetHeader"><img src="'.base_url().'fr/images/twitter.png">TWEETS @nouphaltklm</div>';
        //$html .= '<div class="tweetContent">';
        
        $html .= '<ul data-role="listview">';
        foreach ($news as $newsarticle) {
            //print_r($tweet);
            $html .= '<li>';
            $html .= '<a href="'. site_url() .'news/' . $newsarticle['slug'] . ' ">';
            //$html .='<img src="'. $newsarticle['imgPath'] .'" alt=""/>';
            $html .= '<h3>' . $newsarticle['title'] . '</h3>';
            $html .= '<p>' . getTimeAgo($newsarticle['created_at']) . '</p>';
            //$html .='<p>'.print_r ($newsarticle['created_at']).'</p>';
            //$html .='<span><span class="mention"><a class="tweetOwner" href="http://twitter.com/'.$tweet->user->screen_name.'">'.$tweet->user->screen_name.'</a></span> | '.$tweet->text.'</span>';
            
            
            //$html .='<div class="tweetOptions">';         
            //$html .= '<a href="http://twitter.com/'.$tweet->user->screen_name.'/statuses/'.$tweet->id_str.'">'.getTimeAgo($tweet->created_at).'</a>';
            //$html .= '<a href="http://twitter.com/intent/tweet?in_reply_to='.$tweet->id_str.'">reply</a>';
            //$html .= '<a href="http://twitter.com/intent/retweet?tweet_id='.$tweet->id_str.'">retweet</a>';
            //$html .= '<a href="http://twitter.com/intent/favorite?tweet_id='.$tweet->id_str.'">favourite</a>';
            
            $html .= '</a>';
            $html .= '</li>';
        }
        
        $html .= '</ul>';
        //$html .= '</div>';
        //$html .= '</div>';
        return $html;
    }
}

if (!function_exists('getOneNewsHTML')) {
    
    function getOneNewsHTML($news_item = array())
    {
        $html = '';
        if (empty($news_item))
            return NULL;
        
        $news_items = $news_item;
        //print_r($tweet);
        $html .= '<h3>' . $news_items['title'] . '</h3>';
        $html .= '<img src="'. $newsarticle['imgPath'] .'" alt=""/>';
        $html .= '<div id="newswrap">' . $news_items['text'] . '</div>';
        $html .= '<div id="facebook-like">';
        $html .= '<div class="fb-like" data-href="" data-width="300" data-layout="button" data-action="like" data-show-faces="false" data-share="true">';
        //<!-- Facebook Like Button -->
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<h5><em>Last modified ' . getTimeAgo($news_items['updated_at']) . '</em></h5>';
        //$html .= '<a href="news/view/'.$newsarticle['slug'].' ">';        
        //$html .='<img src="'.$newsarticle->user->profile_image_url.'" alt=""/>';
        //$html .='<h3>'.$newsarticle['title'].'</h3>';
        //$html .='<p>'.getTimeAgo($newsarticle->created_at).'</p>';
        //$html .='<span><span class="mention"><a class="tweetOwner" href="http://twitter.com/'.$tweet->user->screen_name.'">'.$tweet->user->screen_name.'</a></span> | '.$tweet->text.'</span>';
        
        //$html .='<div class="tweetOptions">';         
        //$html .= '<a href="http://twitter.com/'.$tweet->user->screen_name.'/statuses/'.$tweet->id_str.'">'.getTimeAgo($tweet->created_at).'</a>';
        //$html .= '<a href="http://twitter.com/intent/tweet?in_reply_to='.$tweet->id_str.'">reply</a>';
        //$html .= '<a href="http://twitter.com/intent/retweet?tweet_id='.$tweet->id_str.'">retweet</a>';
        //$html .= '<a href="http://twitter.com/intent/favorite?tweet_id='.$tweet->id_str.'">favourite</a>';
        
        //$html .= '</a>';      
        //$html .= '</li>';     
        
        
        //$html .= '</ul>';
        //$html .= '</div>';
        //$html .= '</div>';
        return $html;
    }
}


if (!function_exists('getNewsHTMLStructureIsland')) {
    
    function getNewsHTMLStructureIsland($newslist = array())
    {
        $html = '';
        if (empty($newslist))
            return NULL;
        $html .= '<div role="main" class="fluid flush split homepage">';
        $html .= '<div class="lc flush lc-island">';
        $html .= '<div class="l-two-col">';
        $html .= '<div class="l-main-container">';
        $html .= '<div class="l-main">';

        //<!-- Begin: Channel Archive Page - Primary Island -->
        $html .= '<div class="island plain-island">';
        $newslistarticle = $newslist[0];
        $html .= '<div class="plain-feature block block-inset">';

        $html .= '<a href="'. site_url() .'news/'.$newslistarticle->slug.' " data-omni-sm="hp_featureddl">';
        $html .= '<img class="thumb" data-aspect-ratio="500x369" height="369" width="500" alt="'.$newslistarticle->title.'" src="" />';
        $html .= '<div class="block-title">';
        $html .= '<h2>'.$newslistarticle->title.'</h2>';
        $html .= '<div class="byline">by Alexia Tsotsis</div>';
        $html .= '</div>';
        $html .= '</a>';
        $html .= '</div>';
       
        

        $html .= '<ul class="plain-item-list">';
        foreach (array_slice($newslist, 1, 3) as $newsarticle) {
            //print_r($tweet);
            $html .= '<li class="plain-item block block-small">';
            $html .= '<a href="'. site_url() .'news/'.$newsarticle->slug.' " data-omni-sm="hp_featureddl">';
            $html .= '<img class="thumb" data-featured-thumb="1" height="90" width="145" alt="" src="" />';
            $html .= '<div class="plain-title">';
            $html .= '<h2 class="h-alt">'.$newsarticle->title.'</h2>';
            $html .= '<p class="byline">by Jordan Crook</p>';
            $html .= '</div>';
            $html .= '</a>';
            $html .= '</li>';
            
        }
        
            $html .= '</ul>';
            $html .= '</div>';
            ////<!-- End: Channel Archive Page - Primary Island -->
        return $html;
    }
}

if (!function_exists('getNewsHTMLWeB')) {
    
    function getNewsHTMLWeB($news = array())
    {
        $count = 100;
        $html = '';
        if (empty($news))
            return NULL;
        
            $html .= '<div class="tuck lc-padding">';
            $html .= '<div class="tabs tabs-large">';
            $html .= '<ul class="tab-list tabs-no-select">';
            $html .= '<li class="latest">';
            $html .= '<a href="/" class="active tabs-no-preventdefault">Latest</a>';
            $html .= '</li>';
            $html .= '<li class="popular">';
            $html .= '<a class="tabs-no-preventdefault" href="/popular/">Popular</a>';
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '</div>';
            $html .= '</div>';
            
        $html .= '<ul class="river lc-padding" id="river1">';
        foreach (array_slice($news, 4, 8) as $newswebs) {
            //print_r($tweet);
            $html .= '<li class="river-block" id="952134" data-permalink="news/' . $newswebs['slug'] . '" data-shareTitle="' . $newswebs['title'] . '">';
            $html .= '<div class="block block-thumb">';
            $html .= '<div class="tags" data-omni-sm-delegate="gbl_river_category">';
            $html .= '<a href="'. site_url() .'apps/" title="Apps" class="tag">';
            $html .= '<span>Apps</span>';
            $html .= '</a>';
            $html .= '</div>';
            $html .= '<div class="block-content">';
            $html .= '<a href="'. site_url() .'news/' . $newswebs['slug'] . ' " class="thumb">';
            $html .= '<img data-omni-sm="gbl_river_image" alt="" data-src="" data-tc-lazyload="deferred" src="" /></a>';
            $html .= '<h2 class="post-title"><a href="'. site_url() .'news/' . $newswebs['slug'] . ' " data-omni-sm="gbl_river_headline">'. $newswebs['title'] .'';
            $html .= '</a></h2>';
            $html .= '<div class="byline">';
            $html .= '<time datetime="'. $newswebs['created_at'] .'" class="timestamp">' . getTimeAgo($newswebs['created_at']) . '</time>';
            $html .= ' by <a href="'. site_url() .'author/natasha-lomas/" title="Posts by Natasha Lomas" onclick="s_objectID=\'river_author\';" rel="author">Natasha Lomas</a>';
            $html .= '</div>';
            $html .= '<p class="excerpt">'. word_limiter(strip_tags($newswebs['text']), $count) .'<a href="'. site_url() .'news/' . $newswebs['slug'] . '" class="read-more" data-omni-sm="gbl_river_readmore">Read&nbsp;More</a></p>';
            $html .= '<div class="social-cluster">';
            $html .= '<ul class="social-cluster-list">';
            $html .= '<li><a href="'. site_url() .'news/' . $newswebs['slug'] . ' /#comments" rel="external" class="icon-comment"><span class="social-count"><fb:comments-count href="news/' . $newswebs['slug'] . '"></fb:comments-count></span></a></li>';
            $html .= '<li><a href="#" rel="external" class="icon-facebook"><span class="social-count" id="fb-newshare-952134"></span></a></li>';
            $html .= '<li><a href="#" rel="external" class="icon-twitter"><span class="social-count" id="tweet-newshare-952134"></span></a></li>';
            $html .= '<li><a href="#" rel="external" class="icon-linkedin"><span class="social-count" id="linkedin-newshare-952134"></span></a></li>';
            $html .= '</ul>';
            $html .= '<div>';
            $html .= '<div id="clear" style="clear:both;">';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</li>';
            
        }
        
        $html .= '<div class="hide-med block align-center more-news">';
        $html .= '<a href="#river2" class="text-btn icon-caret-down">More news</a>';
        $html .= '</div>';
        $html .= '</ul>';
        $html .= '</div>';
        //<!-- /.l-main -->
        $html .= '</div>';
        //<!-- /.l-main-container -->
        
        return $html;
    }
}

if (!function_exists('getNewsTags')) {
    
    function getNewsTags($tag = array())
    {
        $html = '';
        if (empty($tag ))
            return NULL;
        //<!-- Begin: Article - Primary -->
        $html .= '<article class="article lc">';
        $html .= '<div class="l-two-col-expose">';
        //<!-- Begin: Article Content - Body Right Column -->
        $html .= '<div class="l-main-container">';
        $html .= '<div class="l-main">';
        //<!-- Begin: Article Header -->
        $html .= '<header class="article-header page-title">';
        $html .= '';
        $html .= '';
        $html .= '';
        //<!-- Begin: Article Eyebrows -->
        $html .= '<div class="tags">';
       
        foreach ($tag  as $tags) {
            //print_r($tweet);
            $html .= '<div class="tag-item">';
            $html .= '<a href="" class="tag" data-omni-sm="art_articlecategory">Apps</a>';
            $html .= '<div class="links" id="tc-tag-item-apps">';

            $html .= '<ul class="recirc-river river-small g g-1-2-1">';
            
            foreach ($tagnews as $tagnewsarticles) {

            $html .= '<li>';
            $html .= '<div class="block-small">';
            $html .= '<a class="block-wrapper" href="">';
            $html .= '<img src="" alt="" />';
            $html .= '<div class="block-content">';
            $html .= '<h3></h3>';
            $html .= '<div class="block-meta">';
            $html .= '<div class="byline">';
            $html .= '<time datetime=""></time>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</a>';
            $html .= '</div>';
            $html .= '</li>';

            $html .= '<li>';
            $html .= '<div class="block-small">';
            $html .= '<a class="block-wrapper" href="http://techcrunch.com/apps/">';
            $html .= '<div class="block-content">';
            $html .= '<h3>Browse more...</h3>';
            $html .= '</div>';
            $html .= '</a>';
            $html .= '</div>';
            $html .= '</li>';

            }

            $html .= '</ul>';
            $html .= '</div>';
            $html .= '</div>';
            
        }
        
            
            $html .= '</div>';
            //<!-- End: Article Eyebrows -->
        return $html;
    }
}

if (!function_exists('getOneNewsHTMLWeB')) {
    
    function getOneNewsHTMLWeB($news_item = array())
    {
        $html = '';
        if (empty($news_item))
            return NULL;
        
        $webonews_item = $news_item;
        //print_r($tweet);
        $html .= '<h1 class="alpha tweet-title">' . $webonews_item['title'] . '</h1>';
        $html .= '<div class="title-left">';
        $html .= '<div class="byline">';
        $html .= 'Posted <time datetime="'. $webonews_item['created_at'] .'" class="timestamp">' . getTimeAgo($webonews_item['created_at']) . '</time>';
        $html .= 'by <a href="'. site_url() .'/author/natasha-lomas/" title="Posts by Natasha Lomas" onclick="s_objectID=\'river_author\';" rel="author">Natasha Lomas</a>';
        $html .= '<span class="twitter-handle">(<a href="http://twitter.com/riptari" rel="external">@riptari</a>)</span>';
        $html .= '</div>';
        //<!-- Begin: Social Share Icons -->
        $html .= '<div class="social-share">';
        $html .= '<ul class="inline-list social-share-list" id="social-share">';
        $html .= '<li class="comment"><a href="#comments" rel="external" class="icon-comment launch-social-load"><span class="social-count">';
        $html .= '<fb:comments-count href="'. site_url() .'news/' . $webonews_item['slug'] . ' "></fb:comments-count></span></a>';
        $html .= '</li>';
        $html .= '<li><a href="#" rel="external" class="icon-facebook"><span class="social-count" id="fb-newshare-952134"></span></a></li>';
        $html .= '<li class="twitter"><a href="#" rel="external" class="icon-twitter"><span class="social-count" id="tweet-newshare-952134"></span></a></li>';
        $html .= '<li><a href="#" rel="external" class="icon-linkedin"><span class="social-count" id="linkedin-newshare-952134"></span></a></li> ';
        $html .= '<li><a href="#" class="icon-caret-down social-share-more"><span class="is-vishidden">More</span></a>';
        $html .= '<ul class="more-social-share-list">';
        $html .= '<li><div class="g-plusone" data-annotation="bubble" data-href="'.site_url().'news/' . $webonews_item['slug'] . '" data-size="medium" data-width="60">';
        $html .= '</div></li>';
        $html .= '<li><su:badge layout="1" type="badge" location="'.site_url().'news/' . $webonews_item['slug'] . '/?ncid=su_social_share"></su:badge></li>';
        $html .= '<li><a href="" target="_blank" class="reddit"><img src="" alt="submit to reddit" border="0" /></a></li>';
        $html .= '</ul>';
        $html .= '</li>';
        $html .= '</ul>';
        $html .= '</div>';
        //<!-- End: Social Share Icons -->
        $html .= '</div>';
        $html .= '<a href="" class="next-link" data-omni-sm="art_nextstory">';
        $html .= '<div class="next-story-link">Next Story</div>';
        $html .= '<div class="next-story-full">';
        $html .= '<h4 class="next-title">Foodpanda Gobbles Up $20M In Fresh Funding To Fatten Its Global&nbsp;Pawprint</h4>';
        $html .= '</div>';
        $html .= '</a>';
        $html .= '</header>';
        //<!-- End: Article Header -->
        //<!-- Begin: Article Body -->
        $html .= '<div class="l-two-col">';
        //<!-- Begin: Article Body - Main -->
        $html .= '<div class="l-main-container">';
        $html .= '<div class="l-main">';
        $html .= '<div class="article-entry text">';
        //<!-- Begin: Geekoverload Article Content -->
        $html .= '<img src="" class="" />';
        $html .= ''. $webonews_item['text'] .'';
        $html .= '<div id="jp-post-flair" class="sharedaddy sd-like-enabled"></div>';
        //<!-- End: Geekoverload Article Content -->
        $html .= '</div>';
        $html .= '<div id="social-after-wrapper" class="hide-med-max cf social-share">';
        $html .= '<ul class="inline-list social-share-list is-hidden" id="social-after">';
        $html .= '<li>';
        $html .= '<a href="#" rel="external" class="icon-facebook"><span class="social-count" id="fb-newshare-952134"></span></a>';
        $html .= '</li>';
        $html .= '<li class="twitter">';
        $html .= '<a href="#" rel="external" class="icon-twitter"><span class="social-count" id="tweet-newshare-952134"></span></a>';
        $html .= '</li>';
        $html .= '<li>';
        $html .= 'a href="#" rel="external" class="icon-linkedin"><span class="social-count" id="linkedin-newshare-952134"></span></a>';
        $html .= '</li>';
        $html .= '<li>';
        $html .= '<div class="g-plusone" data-annotation="bubble" data-href="'.site_url().'news/' .$webonews_item['slug']. '/" data-size="medium" data-width="60">';
        $html .= '</div>';
        $html .= '</li>';
        $html .= '<li>';
        $html .= '<su:badge layout="1" type="badge" location="'.site_url().'news/' . $webonews_item['slug'] . '/?ncid=su_social_share"></su:badge>';
        $html .= '</li>';
        $html .= '<li>';
        $html .= '<a href="" target="_blank" class="reddit"><img src="" alt="submit to reddit" border="0" /></a>';
        $html .= '</li>';
        $html .= '</ul>';
        $html .= '</div>';
        $html .= '<div id="grv-personalization-56"></div>';
        $html .= '</div>';

        
        return $html;
    }
}

if (!function_exists('getAdManager')) {
    
    function getAdManager()
    {
        $html = '';
        
        $html .= '<script src="<?php echo base_url();?>static/new/js/gravity.js"></script>';
        $html .= '<div class="ad-cluster-container ad-cluster-no-ad" style="display: none;">';
        $html .= '<small class="advertise-here"><a href="http://techcrunch.com/advertise/" title="Advertise on TechCrunch">Advertisement</a></small>';
        $html .= '<ul class="ad-cluster" data-adcount="4">';
        $html .= '</ul>';
        $html .= '</div>';
     
            
            $html .= '</div>';
            $html .= '</div>';
            //<!-- End: Article Body - Main -->
            //<!-- Begin: Article Body - Sidebar -->
            $html .= '<div class="l-sidebar">';
            $html .= '<div class="ad-unit ad-300x250">';
            $html .= '<small class="advertise-here"><a href="" title="Advertise on TechCrunch">Advertisement</a></small>';
            $html .= '<div id="ad-300x250"></div>';
            //<!-- Begin: Right Rail Advertisement -->
            $html .= '<div id="adsDiv8a8f2e32fb"></div>';
            $html .= '<script src="<?php echo base_url();?>static/new/js/railads.js"></script>';
            //<!-- End: Right Rail Advertisement -->
            $html .= '</div>';
            
        return $html;
    }
}

if (!function_exists('getCompanySubscribe')) {
    
    function getCompanySubscribe($company = array())
    {
        $html = '';
        if (empty($company))
            return NULL;
        //<!-- Begin: Crunchbase Shoal -->
        $html .= '<div class="section aside crunchbase-cluster collapse">';
        $html .= '<h3 class="section-title collapse-title">CrunchBase</h3>';
        $html .= '<div class="collapse-body">';

        $html .= '<ul class="crunchbase-accordion">';
        //<!-- Begin: CrunchBase Card -->
        foreach ($company as $companies) {
            //print_r($tweet);
            $html .= '<li class="data-card crunchbase-card active">';
            $html .= '<h4 class="card-title card-acc-handle">LINE App</h4>';
            $html .= '<div class="card-acc-panel">';
            $html .= '<div class="info-meta">Line 6, Inc.</div>';
            $html .= '<ul class="card-info">';
            $html .= '<li>';
            $html .= '<strong class="key">Founded</strong>';
            $html .= '<span class="value">December 1924</span>';
            $html .= '</li>';
            $html .= '<li>';
            $html .= '<strong class="key">Total Funding</strong>';
            $html .= '<span class="value">$743M</span>';
            $html .= '</li>';
            $html .= '<li class="full">';
            $html .= '<strong class="key">Description/Overview</strong>';
            $html .= '<span class="value"></span>';
            $html .= '</li>';
            $html .= '<li class="full">';
            $html .= '<strong class="key">Company</strong>';
            $html .= '<span class="value">NHN Corp. (Naver)</span>';
            $html .= '</li>';
            $html .= '<li class="full">';
            $html .= '<strong class="key">Website</strong>';
            $html .= '<span class="value"><a href="http://linecorp.com/en" target="_blank">http://linecorp.com/en</a></span>';
            $html .= '</li>';
            $html .= '<li class="full profile"><a href="http://crunchbase.com/product/line" target="_blank">Full profile for LINE App</a></li>';
            $html .= '</ul>';
            $html .= '</div>';
            $html .= '</li>';
            //<!-- End: CrunchBase Card -->
            
            
        }
        
            $html .= '</ul>';
            $html .= '</div>';
            $html .= '</div>';
            //<!-- End: Crunchbase Shoal -->
            $html .= '<div class="section aside crunchdaily collapse collapse-adjacent block">';
            $html .= '<h2 class="section-title collapse-title aside-adjacent">CrunchDaily</h2>';
            $html .= '<div class="collapse-body">';
            $html .= '<p class="crunchdaily-tagline">Latest headlines delivered to you daily</p>';
            $html .= '<div class="newsletter newsletter-side-bar-crunchdaily">';
            $html .= '<form method="post" class="inline-form form-newsletter crunchdaily-newsletter" data-crunchlist="crunchdaily" action="">';
            $html .= '<fieldset>';
            $html .= '<legend>Subscribe to CrunchDaily</legend>';
            $html .= '<label class="is-vishidden">Enter Email Address</label>';
            $html .= '<input type="email" name="email" placeholder="Enter Email Address">';
            $html .= '<button type="submit" class="newsletter-submit">Subscribe</button>';
            $html .= '</fieldset>';
            $html .= '</form>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
          
        return $html;
    }
}

if (!function_exists('getNewsVideos')) {
    
    function getNewsVideos($video = array())
    {
        $html = '';
        if (empty($video))
            return NULL;
        //
        $html .= '<section class="aside section video-aside collapse">';
        $html .= '<h2 class="section-title collapse-title">Related Videos</h2>';
        $html .= '<div class="collapse-body cf">';

        $html .= '<ul class="vid-list cf">';
        foreach ($video as $videos) {
            //print_r($tweet);
            $html .= '<li class="block vid-feature">';
            $html .= '<div class="block feature-video">';
            $html .= '<a href="">';
            $html .= '<img data-lightbox-url="" alt="HBO&#039;s Silicon Valley Teaser Trailer" data-src="" data-tc-lazyload="deferred" src="" />';
            $html .= '<div class="play-banner">';
            $html .= '<span class="icon-video-play"></span>';
            $html .= '<span class="play-callout">Play Video</span>';
            $html .= '<a href="jobs/" target="_blank" class="text-btn">More from CrunchBoard</a>';
            $html .= '</div>';
            $html .= '</a>';
            $html .= '</div>';
            $html .= '<h3><a href="" class="nolightbox">HBO&#8217;s Silicon Valley Teaser&nbsp;Trailer</a></h3>';
            $html .= '<div class="byline">0:30</div>';
            $html .= '</li>';
            
        }
        
            $html .= '</ul>';
            $html .= '<a href="/video/" class="text-btn" data-omni-sm="art_relatedvideo">More Related Videos</a>';
            $html .= '</div>';
            $html .= '</section>';
            $html .= '</div>';
            //<!-- End: Article Body - Sidebar -->
            $html .= '</div>';
            //<!-- End: Article Body -->
            $html .= '</div>';
            $html .= '</div>';
            //<!-- End: Article Content - Body Right Column -->

        return $html;
    }
}

if (!function_exists('getNewsRecirculation')) {
    
    function getNewsRecirculation($tag = array())
    {
        $html = '';
        if (empty($tag ))
            return NULL;
        //<!-- Begin: Article Recirculation - Body Left Column -->
        $html .= '<div class="l-sidebar demo-block">';
        //<!-- Begin: Recirculation Accordion -->
        $html .= '<div class="accordion recirc-accordion">">';
       
        $html .= '<ul>';
     
        foreach ($tag  as $tags) {
            //print_r($tweet);
            $html .= '<li id="tc-accordion-item-ffos-tag">';
            $html .= '<div class="acc-handle"><a href="http://techcrunch.com/tag/ffos/">ffos</a></div>';
            $html .= '<script src="<?php echo base_url();?>static/new/js/accordion.js"></script>';
            $html .= '</li>';
            $html .= '<li id="tc-accordion-item-firefox-os-tag">';
            $html .= '<div class="loaded acc-handle"><a href="http://techcrunch.com/tag/firefox-os/">Firefox OS</a></div>';
            $html .= '<div class="acc-panel">';

            $html .= '<ul class="recirc-river river-small" data-omni-sm-delegate="art_recircbottom">';
            
            foreach ($tagnews as $tagnewsarticles) {

            $html .= '<li>';
            $html .= '<div class="block-small">';
            $html .= '<a class="block-wrapper" href="http://techcrunch.com/2014/02/05/firefox-launcher/">';
            $html .= '<img src="" alt="" />';
            $html .= '<div class="block-content">';
            $html .= '<h3></h3>';
            $html .= '<div class="block-meta">';
            $html .= '<div class="byline">';
            $html .= '<time datetime="2014-02-05">Posted Feb 5, 2014</time>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</a>';
            $html .= '</div>';
            $html .= '</li>';
            $html .= '<li class="more-link">';
            $html .= '<a href="http://techcrunch.com/tag/firefox-os/" class="text-btn">More Firefox OS articles</a>';
            $html .= '</li>';


            }

            $html .= '</ul>';
            $html .= '</div>';
            $html .= '</div>';
            
        }
        
            $html .= '</ul>';
            $html .= '</div>';
            //<!-- End: Recirculation Accordion -->
            $html .= '</div>';
            //<!-- End: Article Recirculation - Body Left Column -->
            $html .= '</div>';
            $html .= '</article>';
            //<!-- End: Article - Primary -->
            
        return $html;
    }
}


if (!function_exists('getComments')) {
    
    function getComments($comment = array())
    {
        $html = '';
        if (empty($comment))
            return NULL;
        //<!-- Begin: Article - Secondary -->
        $html .= '<div class="article-extra">';
        $html .= '<div class="lc l-three-col">';
        //<!-- Begin: Center Column -->
        $html .= '<div class="l-main-container">';
        $html .= '<div class="l-main">';
        $html .= '<section class="comments section">';
        $html .= '<div class="comments-container" id="comments-container">';
        $html .= '<a name="comment-box"></a>';
        $html .= '<div id="comments">';
        $html .= '<div class="fb-comment-container" id="fb-comment-container">';
        $html .= '<div id="fb-root">';
        $html .= '</div>';
        $html .= '<fb:comments href="" num_posts="25" width="630"></fb:comments>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';
        $html .= '</div>';
        $html .= '</div>';
        //<!-- End: Center Column -->

        return $html;
    }
}

if (!function_exists('getRightColumn')) {
    
    function getRightColumn($news = array())
    {
        $html = '';
        if (empty($news))
            return NULL;
        //<!-- Begin: Right Column -->
        $html .= '<div class="l-sidebar-2 recirc-up-next section">';
        $html .= '<div class="toaster section">';
        $html .= '<div class="toaster-container">';
        $html .= '<div class="toaster-content">';
        $html .= '<div class="toaster-title">Up Next</div>';
        
        foreach (array_slice($news, 4, 4) as $webonews_item) {
        $html .= '<h3 class="h-alt"><a href="" data-omni-sm="art_upnext">' . $webonews_item['title'] . '</a></h3>';
        $html .= '<div class="byline">Posted <time datetime="2014-02-04" class="timestamp">Feb 4, 2014</time></div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="toaster-title toaster-popular">Popular Articles</div>';
        }

        

        $html .= '<ul class="recirc-river river-small g g-1-2-1">';
        foreach (array_slice($news, 1, 8) as $newsarticles) {
            //print_r($tweet);
            $html .= '<li class="gi">';
            $html .= '<div class="block-small">';
            $html .= '<a class="block-wrapper" href="" data-omni-sm="art_popular">';
            $html .= '<img src="" alt="' . $newsarticles['title'] . '" />';
            $html .= '<div class="block-content">';
            $html .= '<h3>' . $newsarticles['title'] . '</h3>';
            $html .= '<div class="block-meta">';
            $html .= '<div class="byline">';
            $html .= '<time datetime="2014-02-08">Posted 1 hour ago</time>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</a>';
            $html .= '</div>';
            $html .= '</li>';
            
        }
        
            $html .= '</ul>';
            //
        return $html;
    }
}


if (!function_exists('getJob')) {
    
    function getJob($job = array())
    {
        $html = '';
        if (empty($job))
            return NULL;
        //
        $html .= '<div class="section aside-alt crunchboard-listings collapse collapse-last">';
        $html .= '<h3 class="section-title collapse-title">CrunchBoard</h3>';
        $html .= '<div class="collapse-body">';
        $html .= '<h4 class="h-alt crunchboard-listings-subhead">Job Listings</h4>';

        $html .= '<ul class="info-list lined-list">';
        foreach ($jobs as $jobs) {

            //print_r($tweet);
            $html .= '<li>';
            $html .= '<a href="" target="_blank">';
            $html .= '<h3>Sr. Systems Administrator</h3>';
            $html .= '<div class="info-meta">Line 6, Inc.</div>';
            $html .= '</a>';
            $html .= '</li>';
            
        }
        
            $html .= '</ul>';
            $html .= '<a href="http://www.crunchboard.com/jobs/" target="_blank" class="text-btn">More from CrunchBoard</a>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            //<!-- End: Right Column -->
            $html .= '</div>';
            $html .= '</div>';
            //<!-- End: Article - Secondary -->
            $html .= '</div>';
            //<!-- End: Article Body Content - Main -->

        return $html;
    }
}