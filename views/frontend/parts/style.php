<?php
$style = PHP_EOL;

// Frontpage
if (strlen(\CM\CMFAQ_Settings::get('cmfaq_css_color_tile_title', ''))) {
    $style .= '#cmfaq .cmfaq-tile .cmfaq-tile-title-link{ color: ' . \CM\CMFAQ_Settings::get('cmfaq_css_color_tile_title') . '; }' . PHP_EOL;
}
if (strlen(\CM\CMFAQ_Settings::get('cmfaq_css_size_tile_title', ''))) {
    $style .= '#cmfaq .cmfaq-tile .cmfaq-tile-title-link{ font-size: ' . \CM\CMFAQ_Settings::get('cmfaq_css_size_tile_title') . '; }' . PHP_EOL;
}
if (strlen(\CM\CMFAQ_Settings::get('cmfaq_css_color_tile_link', ''))) {
    $style .= '#cmfaq .cmfaq-tile .cmfaq-tile-post-link{ color: ' . \CM\CMFAQ_Settings::get('cmfaq_css_color_tile_link') . '; }' . PHP_EOL;
}
if (strlen(\CM\CMFAQ_Settings::get('cmfaq_css_size_tile_link', ''))) {
    $style .= '#cmfaq .cmfaq-tile .cmfaq-tile-post-link{ font-size: ' . \CM\CMFAQ_Settings::get('cmfaq_css_size_tile_link') . '; }' . PHP_EOL;
}
if (strlen(\CM\CMFAQ_Settings::get('cmfaq_css_color_tile_more', ''))) {
    $style .= '#cmfaq .cmfaq-tile .cmfaq-tile-more-link{ color: ' . \CM\CMFAQ_Settings::get('cmfaq_css_color_tile_more') . '; }' . PHP_EOL;
}
if (strlen(\CM\CMFAQ_Settings::get('cmfaq_css_size_tile_more', ''))) {
    $style .= '#cmfaq .cmfaq-tile .cmfaq-tile-more-link{ font-size: ' . \CM\CMFAQ_Settings::get('cmfaq_css_size_tile_more') . '; }' . PHP_EOL;
}
echo $style;