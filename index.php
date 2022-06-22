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

// menghubungkan bot telegram dengan API
$configs = [
    "telegram" => [
        "token" => file_get_contents("private/API_TOCEN.txt")
    ]
];

DriverManager::loadDriver(TelegramDriver::class);

$botman = BotManFactory::create($configs);

// https://api.telegram.org/bot5430773257:AAHymfT0BTkbqR1LNw3v9ZQp2FWSGU7ZwqE/setWebhook?url=https://6c47-36-68-223-45.ngrok.io


// 
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
    $message = OutgoingMessage::create('Trading Chart IDR'.spasi(). cmd())
            ->withAttachment($attachment);

    $bot->reply($message);
});

$botman->hears('/imgusd', function (BotMan $bot) {
    $attachment = new Image('https://ibb.co/Kysk7FZ', [
        'custom_payload' => true,
    ]);
    $message = OutgoingMessage::create('Trading Chart USD'.spasi(). cmd())
            ->withAttachment($attachment);
    $bot->reply($message);
});

$botman->hears('/imgidr_scalp {tahun}_{bulan}_{tanggal}', function (BotMan $bot, $tahun, $bulan, $tanggal) {
    $scalp = scalping($tahun, $bulan, $tanggal);
    $attachment = new Image($scalp, [
        'custom_payload' => true,
    ]);
    $message = OutgoingMessage::create('Trading Chart Scalping IDR'.spasi(). cmd())
            ->withAttachment($attachment);
    $bot->reply($message);
});

require_once('./ss2.php');

$botman->hears('/coba', function(BotMan $bot){
    // $GOOGLEAPIKEY = 'AIzaSyBHI1IlBTCs2oi33gdK5Zwkao6eiKWsAJE';
    // $site_url = 'https://pemweb-90f9f.web.app/html/home.html';
    // $googlePagesSpeedData = file_get_contents("https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=$site_url&screenshot=true&key=$GOOGLEAPIKEY");
    $dtgb = dapat_gambar();
    $attachment = new Image($dtgb, [
        'custom_payload' => true,
    ]);
    // sleep(70);
    $bot->reply($attachment);
});

$botman->fallback(function (BotMan $bot) {
    $message = $bot->getMessage()->getText();
    echo $message;
    $bot->reply("Maaf, Perintah Ini '$message' Tidak Ada 😐");
});

$botman->listen();