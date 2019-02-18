<?php
$im = imagecreatefrompng("IMG.png");
$a = fopen("output.bin", "w");
for($y = 0; $y < 64; $y = $y+8){  //Y=64
    for($x = 0; $x < 128; $x++){  //X=128
        $data = "";
        for($y2 = $y; $y2 < $y + 8; $y2++){  //Fetch 8 points to make up a byte
            if(imagecolorat($im, $x, $y2) == 0){
                $data .= "0";
            }else{
                $data .= "1";
            }
        }
    $byte = pack('H*', str_pad(base_convert($data, 2, 16), 2, "0", STR_PAD_LEFT)); //Pack bits into a byte.
    fputs($a, $byte);
    }
}
fclose($a);
?>
