<?php
$im = imagecreatefrompng("IMG.png");
$a=fopen("output.bin","w");
for($y=0;$y<64;$y=$y+8){
    for($x=0;$x<128;$x++){
        $data="";
        for($y2=$y;$y2<$y+8;$y2++){
            if(imagecolorat($im,$x,$y2)==0){
                $data.="0";
            }else{
                $data.="1";
            }
        }
    fputs($a,pack('H*', str_pad(base_convert($data, 2, 16), 2, "0", STR_PAD_LEFT)));
    }
}
fclose($a);
?>
