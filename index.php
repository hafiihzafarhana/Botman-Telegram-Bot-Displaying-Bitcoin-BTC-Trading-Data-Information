<?php
// library (composer)
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Attachments\Attachment;
use BotMan\Drivers\Telegram\TelegramDriver;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

// fungsi
require_once './vendor/autoload.php';
require_once './func/tampilVolume.php';
require_once './func/tampilHarga.php';
require_once './func/lastBuy.php';
require_once './func/lastSell.php';
require_once './func/textCommand.php';
require_once './func/spasi.php';
require_once './func/scalping.php';
require_once './func/range_imgidr.php';
// /range_trade 2022_05_10 & 2022_05_12
// menghubungkan bot telegram dengan API
$configs = [
    "telegram" => [
        "token" => file_get_contents("private/API_TOCEN.txt")
    ]
];

DriverManager::loadDriver(TelegramDriver::class);

$botman = BotManFactory::create($configs);

// https://api.telegram.org/bot5403472035:AAFf-1tR-sYVEfFBXqn7MTg23jiR1BJlf_g/setWebhook?url=https://hafiihzafarhana.000webhostapp.com/botme/index.php

$botman->hears('/start', function (BotMan $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();

    $bot->reply("Halo, $firstname Selamat Datang di UPN Trade Bot\n\nSilahkan ketikan /bantu untuk untuk mengetahui fitur apa saja yang berlaku");
});

$botman->hears('/bantu', function (BotMan $bot) {
    $message = cmd();
    $bot->reply($message);
});

$botman->hears('/harga {tahun}_{bulan}_{tanggal}', function (BotMan $bot, $tahun, $bulan, $tanggal) {
    $tampilHarga = tampilHarga($tahun, $bulan, $tanggal);
    $bot->reply("$tampilHarga");
});

$botman->hears('/volume {tahun}_{bulan}_{tanggal}', function (BotMan $bot, $tahun, $bulan, $tanggal) {
    $tampilVolum = tampilVolum($tahun, $bulan, $tanggal);
    $bot->reply("$tampilVolum");
});

$botman->hears('/lastbuy {tahun}_{bulan}_{tanggal}', function (BotMan $bot, $tahun, $bulan, $tanggal) {
    $lastBuyy = lastBuy($tahun, $bulan, $tanggal);
    $bot->reply("$lastBuyy \n");
});

$botman->hears('/lastsell {tahun}_{bulan}_{tanggal}', function (BotMan $bot, $tahun, $bulan, $tanggal) {
    $lastSell = lastSell($tahun, $bulan, $tanggal);
    $bot->reply("$lastSell \n");
});

$botman->hears('/imgidr', function (BotMan $bot) {
    $attachment = new Image('https://ibb.co/hfcLJ68', [
        'custom_payload' => true,
    ]);
    $message = OutgoingMessage::create('Trading Chart IDR. Tanggal : 29-04-2022 - 03-06-2022')
            ->withAttachment($attachment);

    $bot->reply($message);
});

$botman->hears('/range_imgidr', function (BotMan $bot){
    
});

$botman->hears('/imgusd', function (BotMan $bot) {
    $attachment = new Image('https://ibb.co/Kysk7FZ', [
        'custom_payload' => true,
    ]);
    $message = OutgoingMessage::create('Trading Chart USD. Tanggal : 29-04-2022 - 03-06-2022')
            ->withAttachment($attachment);
    $bot->reply($message);
});

$botman->hears('/day_trade {tahun}_{bulan}_{tanggal}', function (BotMan $bot, $tahun, $bulan, $tanggal) {
    $scalp = scalping($tahun, $bulan, $tanggal);
    $attachment = new Image($scalp, [
        'custom_payload' => true,
    ]);
    $message = OutgoingMessage::create('Day Trading Untuk IDR. Tanggal: '.$tanggal."-".$bulan."-".$tahun)
            ->withAttachment($attachment);
    $bot->reply($message);
});

$botman->hears('/range_trade {tahun1}_{bulan1}_{tanggal1} & {tahun2}_{bulan2}_{tanggal2}', function (BotMan $bot, $tahun1, $bulan1, $tanggal1, $tahun2, $bulan2, $tanggal2) {
    $user = $bot->getUser();
    $id = $user->getId();
    $range1 = ''; $range1.=$tahun1; $range1.="-"; $range1.=$bulan1; $range1.="-"; $range1.=$tanggal1;
    $range2 = ''; $range2.=$tahun2; $range2.="-"; $range2.=$bulan2; $range2.="-"; $range2.=$tanggal2;
    range_trade($range1, $range2, $id);
    $bot->reply("Chart Trading tanggal $tanggal1-$bulan1-$tahun1 sampai $tanggal2-$bulan2-$tahun2");
});

$botman->hears('/range_trade_day {tahun1}_{bulan1}_{tanggal1} - {jam1}_{menit1}_{detik1} & {tahun2}_{bulan2}_{tanggal2} - {jam2}_{menit2}_{detik2}', function (BotMan $bot, $tahun1, $bulan1, $tanggal1, $jam1, $menit1, $detik1, $tahun2, $bulan2, $tanggal2, $jam2, $menit2, $detik2) {
    $user = $bot->getUser();
    $id = $user->getId();
    $range1_day = ''; $range1_day.=$tahun1; $range1_day.="-"; $range1_day.=$bulan1; $range1_day.="-"; $range1_day.=$tanggal1;
    $range2_day = ''; $range2_day.=$tahun2; $range2_day.="-"; $range2_day.=$bulan2; $range2_day.="-"; $range2_day.=$tanggal2;
    $time1 = ''; $time1.=$jam1; $time1.=":"; $time1.=$menit1; $time1.=":"; $time1.=$detik1;
    $time2 = ''; $time2.=$jam2; $time2.=":"; $time2.=$menit2; $time2.=":"; $time2.=$detik2;
    range_trade_day($range1_day, $time1, $range2_day, $time2, $id);
    $bot->reply("Chart Trading tanggal $tanggal1-$bulan1-$tahun1 $jam1:$menit1:$detik1 sampai $tanggal2-$bulan2-$tahun2 $jam2:$menit2:$detik2");
});

$botman->fallback(function (BotMan $bot) {
    $message = $bot->getMessage()->getText();
    $bot->reply("Maaf, Perintah Ini '$message' Tidak Ada 😐");
});

$botman->listen();