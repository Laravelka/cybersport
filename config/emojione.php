<?php
return [
    'imagePathPNG' => '/vendor/emojione/png/', // defaults to jsdelivr's free CDN
    'sprites' => true, // use sprites?
    'spriteSize' => 64, // 32/64

    // If you are using the cdn, then you can change these values to get different sizes
    'emojiSize' => 64, // 32/64/128
    'emojiVersion' => '4.0',
    
    'ascii' => false, // convert ascii characters into emoji shortcodes
];
