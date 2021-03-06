<?php
function get_subpages($parent_id) {
    global $query_string;
    global $post;
    $subloop = get_pages($query_string.'&child_of='.$post->ID.'&sort_column=menu_order');
    $aa = 0;
    $sp = '';
    $sp .= '<div class="perpage cfx">';
    foreach($subloop as $sub) {
        setup_postdata($sub);
        $img = get_field('icon', $sub->ID, true);
        $sp .= '<div class="'.(($aa++%2==0)?'alignleft':'alignright').'" onClick="window.location=\''. get_permalink($sub->ID).'\'">';
        $sp .= '<h3 class="cfx"><img src="'. $img .'" class="alignleft" alt="'. $sub->post_title.'" />'. $sub->post_title.'</h3>';
        $sp .= '</div>';
    }
    $sp .= '</div>';
    return $sp;
}
/*
* using:
* [subpages]
*/
add_shortcode('subpages', 'get_subpages');

//User can enter e-mail for login
add_filter('authenticate', 'bainternet_allow_email_login', 20, 3);
function bainternet_allow_email_login( $user, $username, $password ) {
    if ( is_email( $username ) ) {
        $user = get_user_by( 'email', $username );
        if ( $user ) $username = $user->user_login;
    }
    return wp_authenticate_username_password(null, $username, $password );
}
add_filter( 'gettext', 'addEmailToLogin', 20, 3 );
function addEmailToLogin( $translated_text, $text, $domain ) {
    if ( "Username" == $translated_text )
        $translated_text .= __( ' Or Email');
    return $translated_text;
}

function javascript_escape($str) {
    $new_str = '';
    $str_len = strlen($str);
    for($i = 0; $i < $str_len; $i++) {
        $new_str .= '\\x' . sprintf('%02x', ord(substr($str, $i, 1)));
    }
    return htmlspecialchars($new_str);
}

if(defined('GOOGLEMAPS')) {
    /* google map shortcode
        *** Using [googlemap id="somemapid" coordinates="1 ,1" zoom="17" height="500px" infobox="<p>Some Infobox Content</p>"]
        *** if need street view, please add 'streetview="true"';
        *** if you need satellite view in 45 angle add 'tilt="45"';
    */
    function google_map_js($atts, $content) {
        extract(shortcode_atts(array(
            'id'                => 'map_canvas',
            'coordinates'       => '1, 1',
            'zoom'              => 4,
            'height'            => '350px',
            'zoomcontrol'       => 'true',
            'scalecontrol'      => 'false',
            'disabledefaultui'  => 'false',
            'infobox'           => '',
            'satellite'         => '',
            'tilt'              => '',
            'icon'              => 'data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCIgdmlld0JveD0iMCAwIDQyNS45NjMgNDI1Ljk2MyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDI1Ljk2MyA0MjUuOTYzOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTIxMy4yODUsMGgtMC42MDhDMTM5LjExNCwwLDc5LjI2OCw1OS44MjYsNzkuMjY4LDEzMy4zNjFjMCw0OC4yMDIsMjEuOTUyLDExMS44MTcsNjUuMjQ2LDE4OS4wODEgICBjMzIuMDk4LDU3LjI4MSw2NC42NDYsMTAxLjE1Miw2NC45NzIsMTAxLjU4OGMwLjkwNiwxLjIxNywyLjMzNCwxLjkzNCwzLjg0NywxLjkzNGMwLjA0MywwLDAuMDg3LDAsMC4xMy0wLjAwMiAgIGMxLjU2MS0wLjA0MywzLjAwMi0wLjg0MiwzLjg2OC0yLjE0M2MwLjMyMS0wLjQ4NiwzMi42MzctNDkuMjg3LDY0LjUxNy0xMDguOTc2YzQzLjAzLTgwLjU2Myw2NC44NDgtMTQxLjYyNCw2NC44NDgtMTgxLjQ4MiAgIEMzNDYuNjkzLDU5LjgyNSwyODYuODQ2LDAsMjEzLjI4NSwweiBNMjc0Ljg2NSwxMzYuNjJjMCwzNC4xMjQtMjcuNzYxLDYxLjg4NC02MS44ODUsNjEuODg0ICAgYy0zNC4xMjMsMC02MS44ODQtMjcuNzYxLTYxLjg4NC02MS44ODRzMjcuNzYxLTYxLjg4NCw2MS44ODQtNjEuODg0QzI0Ny4xMDQsNzQuNzM2LDI3NC44NjUsMTAyLjQ5NywyNzQuODY1LDEzNi42MnoiIGZpbGw9IiMyMmJiYjQiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K',
            'streetview'        => ''
        ), $atts));
        $mapid = str_replace('-','_',$id);

        $map = !$streetview?'<div class="googlemap" id="'.$id.'" '.($height?'style="height:'.$height.'"':'').'></div><script>
    var '.$mapid.';
    function initialize_'.$mapid.'() {
        var myLatlng = new google.maps.LatLng('.$coordinates.');
        var mapOptions = {
            '.($satellite?'mapTypeId: google.maps.MapTypeId.SATELLITE,':'').'
            zoom: '.$zoom.',
            center: myLatlng,
            zoomControl: '.$zoomcontrol.',
            scaleControl: '.$scalecontrol.',
            disableDefaultUI: '.$disabledefaultui.'
            '.( $content ? ',styles:'.$content : '' ).'
        };
        var '.$mapid.' = new google.maps.Map(document.getElementById("'.$id.'"), mapOptions);
        '.($tilt?$mapid.'.setTilt(45);':'').'
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: '.$mapid.',
            '.($icon?'icon:"'.$icon.'",':'').'
            animation: google.maps.Animation.DROP
        });
        '.($infobox?'marker.info = new google.maps.InfoWindow({content: \''.javascript_escape($infobox).'\'});
        google.maps.event.addListener(marker, "click", function() {marker.info.open('.$mapid.', marker);});':'').'

        google.maps.event.addListener('.$mapid.', "center_changed", function() {
            window.setTimeout(function() {
                '.$mapid.'.panTo(marker.getPosition());
            }, 15000);
        });
    };
    google.maps.event.addDomListener(window, "load", initialize_'.$mapid.');
    </script>':do_streetView_map($id, $coordinates, $height, $streetview);
        return $map;
    }
    add_shortcode('googlemap', 'google_map_js');

    function do_streetView_map($id, $pos, $height, $streetview){
        return '<div class="googlemap" id="street_'.$id.'" '.($height?'style="height:'.$height.'"':'').'></div><script>
        function street_init_'.$id.'() {


        var geocoder =  new google.maps.Geocoder();
        geocoder.geocode( { "address": "'.$streetview.'" }, function(results, status) {
            var lookTo = results[0].geometry.location;
            if (status == google.maps.GeocoderStatus.OK) {
                  var panoOptions = {
                    position: lookTo,
                    panControl: false,
                    addressControl: false,
                    linksControl: false,
                    zoomControlOptions: false
                  };
                  var pano = new  google.maps.StreetViewPanorama(document.getElementById("street_'.$id.'"),panoOptions);
                  var service = new google.maps.StreetViewService;
                  service.getPanoramaByLocation(pano.getPosition(), 50, function(panoData) {
                    if (panoData != null) {
                      var panoCenter = panoData.location.latLng;
                      var heading = google.maps.geometry.spherical.computeHeading(panoCenter, lookTo);
                      var pov = pano.getPov();
                      pov.heading = heading;
                      pano.setPov(pov);
                      var marker = new google.maps.Marker({
                        map: pano,
                        position: lookTo
                      });
                    } else {
                      alert("Not Found");
                    }
                  });
            } else {
                alert("Could not find your address");
            }
        });
        }
        google.maps.event.addDomListener(window, "load", street_init_'.$id.');</script>';
    }
} //end GOOGLEMAPS

function content_btn($atts,$content){
    extract(shortcode_atts(array(
        'text' => 'Learn More',
        'link' => site_url(),
        'class' => false,
        'target' => false
    ), $atts ));
    return '<a href="' . $link . '" class="button'.($class?' '.$class:'').'" '.($target?'target="'.$target.'"':'').'>' . $text . '</a>';
}
add_shortcode("button", "content_btn");

function tree_children($absolute = false, $page_id = 0) {
    global $wp_query;
    if ($wp_query->is_posts_page) {
        $post = get_post(BLOG_ID);
    } else {
        global $post;
    }
    $ex_pages = null;
    $ex_args = array(
        'posts_per_page' => -1,
        'post_type' => 'page',
        'meta_key' => 'hide_page',
        'meta_value' => true
    );
    $excluded = new WP_Query($ex_args);
    if ($excluded->have_posts()): while ($excluded->have_posts()) : $excluded->the_post();
    $ex_pages .= get_the_ID() . ',';
    endwhile;
    $ex_pages = substr($ex_pages, 0, -1);
    endif;
    wp_reset_query();
    $childlist = get_pages('child_of=' . $post->ID . ($ex_pages ? '&exclude=' . $ex_pages : ''));
    $children = '';
    if ($post->post_parent) {
        $ancestors = get_post_ancestors($post->ID);
        $reverse = array_reverse($ancestors);
        $abs = $reverse[0];
        $children .= '<ul class="submenu">';
        $children .= wp_list_pages("title_li=&child_of=" . $abs . "&echo=0&sort_column=menu_order" . ($ex_pages ? '&exclude=' . $ex_pages : ''));
        $children .= '</ul>';
        echo $children;
    } elseif ($childlist) {
        echo '<ul class="submenu">' . wp_list_pages("title_li=&child_of=" . $post->ID . "&echo=0&sort_column=menu_order" . ($ex_pages ? '&exclude=' . $ex_pages : '')) . '</ul>';
    }
}

//remove <p> and <br /> from shortcodes
add_filter('the_content', 'shortcode_empty_paragraph_fix');
function shortcode_empty_paragraph_fix($content){
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}

function so_me() {
    $so_me = get_field('so_me', 'option');
    $soc = '';
    if($so_me) {
        $soc .= '<div class="so_me">';
        foreach($so_me as $sm) {
            $soc .= '<a href="'.$sm['link'].'" class="i_'.$sm['icon'].'" target="_blank" rel="noopener noreferrer"></a>';
        }
        $soc .= '</div>';
    }
    return $soc;
}
add_shortcode("social", "so_me");


function youtube_image($id) {
    $resolution = array (
        'maxresdefault',
        'sddefault',
        'hqdefault',
        '0'
    );

    for ($x = 0; $x < sizeof($resolution); $x++) {
        $url = 'https://img.youtube.com/vi/' . $id . '/' . $resolution[$x] . '.jpg';
        if (get_headers($url)[0] == 'HTTP/1.0 200 OK') {
            break;
        }
    }
    return $url;
}


function popup_play_video($atts){
    extract(shortcode_atts(array(
        'link' => ''
    ), $atts ));
    $p = rand(1, 1000000);
    $details = explode("v=", $link);
    $id = explode("&t=", $details[1]);
    $embed_link = "https://www.youtube.com/embed/". $id[0];

    $thumb = youtube_image($id[0]);

    $out = '';
    $out.= '<div class="for_video"><a href="'. $embed_link . '" data-remodal-target="play_video'. $p .'" class="video_play"><img src="'. $thumb .'" alt=""></a></div>';
    $out.= '<div class="remodal" data-remodal-id="play_video'. $p .'" data-remodal-options="hashTracking: false"><div class="fullframe">';
    $out.= '<iframe frameborder="0" allowfullscreen="" src="'. $embed_link .'?rel=0&showinfo=0"></iframe>';
    $out.= '</div><span data-remodal-action="close" class="remodal-close"></span></div>';

    return $out;
}
add_shortcode("playvideo", "popup_play_video");