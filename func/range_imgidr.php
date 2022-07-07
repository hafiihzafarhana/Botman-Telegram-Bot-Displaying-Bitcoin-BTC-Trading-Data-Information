<?php
    function range_trade($range1, $range2, $id){
        $ch = curl_init();
        $json_url ="https://www.googleapis.com/pagespeedonline/v5/runPagespeed?key=AIzaSyA1wE1TFQB5HNyOVTlRH-lgA8XYLV_4Mj4&url=https://hafiihzafarhana.000webhostapp.com".urlencode("/botme/dapat.php?tgl1=$range1&tgl2=$range2");
        $json = file_get_contents($json_url);
        $data = json_decode($json, true);
        $test =$data["lighthouseResult"]["audits"]["full-page-screenshot"]["details"]["screenshot"]["data"];
        list($type, $test) = explode(";", $test);
        list(,$test) = explode(",", $test);
        $data = base64_decode($test);
        $im = imagecreatefromstring($data);

        $fileName = time(). ".png";
        imagepng($im, $fileName);
        imagedestroy($im);
        $image = curl_file_create($fileName);

        $url = 'https://api.telegram.org/bot5403472035:AAFf-1tR-sYVEfFBXqn7MTg23jiR1BJlf_g/sendPhoto?chat_id='.$id;
        $post_fields = [
            'photo' => $image,
        ];
        $ch = curl_init(); 

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type:multipart/form-data"
        ));

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'POST');
        $result = curl_exec($ch);
        curl_close($ch);
        unlink($fileName);
    }

    function range_trade_day($range1_day, $time1, $range2_day, $time2, $id){
        $ch = curl_init();
        $json_url ="https://www.googleapis.com/pagespeedonline/v5/runPagespeed?key=AIzaSyA1wE1TFQB5HNyOVTlRH-lgA8XYLV_4Mj4&url=https://hafiihzafarhana.000webhostapp.com".urlencode("/botme/dapat2.php?tgl1=$range1_day&time1=$time1&tgl2=$range2_day&time2=$time2");
        $json = file_get_contents($json_url);
        $data = json_decode($json, true);
        $test =$data["lighthouseResult"]["audits"]["full-page-screenshot"]["details"]["screenshot"]["data"];
        list($type, $test) = explode(";", $test);
        list(,$test) = explode(",", $test);
        $data = base64_decode($test);
        $im = imagecreatefromstring($data);

        $fileName = time(). ".png";
        imagepng($im, $fileName);
        imagedestroy($im);
        $image = curl_file_create($fileName);

        $url = 'https://api.telegram.org/bot5403472035:AAFf-1tR-sYVEfFBXqn7MTg23jiR1BJlf_g/sendPhoto?chat_id='.$id;
        $post_fields = [
            'photo' => $image,
        ];
        $ch = curl_init(); 

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type:multipart/form-data"
        ));

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'POST');
        $result = curl_exec($ch);
        curl_close($ch);
        unlink($fileName);
    }