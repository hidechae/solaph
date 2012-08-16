<?php
require_once 'MySmarty.php';
require_once '/var/www/html/twitter_api//twitteroauth/twitteroauth/twitteroauth.php';

// url
define('HOME_TIMELINE', 'http://api.twitter.com/1/statuses/home_timeline.json?include_entities=true');
define('LIST_ALL', 'http://api.twitter.com/1/lists/all.json');
define('LIST_SHOW', 'http://api.twitter.com/1/lists/show.json');
define('LIST_MEMBERS', 'http://api.twitter.com/1/lists/members.json');
define('UPDATE_PROFILE', 'http://api.twitter.com/1/account/update_profile.json');


// application info
define('CONSUMER_KEY', 'OGTWud5yfmmJvdLmGAjk0A');
define('CONSUMER_SECRET', 'MrVGsjYLHonCVZgKVOubYKG1dTI7HD7fxATjJRlS1HM');
define('ACCESS_TOKEN', '102410000-5taeCbOSekNYi2JBxr2zkTWCk0EiZEykAsWt3oI4');
define('ACCESS_TOKEN_SECRET', 'zn2B0h0taX2YTjCE1eKNyAJBm9G8td5Dfn9JlQgNfY');

$twitteroauth = new TwitterOAuth(
    CONSUMER_KEY,
    CONSUMER_SECRET,
    ACCESS_TOKEN,
    ACCESS_TOKEN_SECRET
);

$smarty = new MySmarty();
