<?php

// 128x64 monotone image
// Format: 
// Headerless
// Formated as 8 B/W pixels per byte
// 8 horizontal blocks of 128x8 (128 bytes)

$im = imagecreatefrompng("IMG.png");
$a = fopen("output.bin", "w");

// Step through height
for($y = 0; $y < 64; $y = $y+8){  // Y = 0 - 63 , 8 Step
    // Step through width
    for($x = 0; $x < 128; $x++){  // X = 0 - 127, Single step
        $byte = "";
        
        //Fetch 8 points (bits) to make up a byte
        for($bit = $y; $bit < $y + 8; $bit++){
            // trun black and white only
            if(imagecolorat($im, $x, $bit) == 0){
                $byte .= "0";
            }else{
                $byte .= "1";
            }
        }
        
        //Pack our bits into a byte.
        $byte = pack('H*', str_pad(base_convert($byte, 2, 16), 2, "0", STR_PAD_LEFT));
        fputs($a, $byte);
    }
}
fclose($a);
?>
