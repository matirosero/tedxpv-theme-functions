<?php

/*-------------------------------------
  Move Yoast to the Bottom
---------------------------------------*/
function tedx_yoast_bottom() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', 'tedx_yoast_bottom');