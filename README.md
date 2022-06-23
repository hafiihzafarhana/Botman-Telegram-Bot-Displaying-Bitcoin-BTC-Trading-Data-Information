# Botman-Telegram-Bot-Displaying-Bitcoin-BTC-Trading-Data-Information
Create a system to display information about Bitcoin data that has been entered into a private database (MySQL) using a Telegram Bot

<h1> Trade Area Engels Bot </h1>
This is the link : https://t.me/tradeareabot

<h1>Tools</h1>
<table>
  <thead>
    <tr>
      <th>Tools</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>"botman/botman": "^2.7"</td>
    </tr>
    <tr>
      <td>"botman/driver-telegram": "^1.6"</td>
    </tr>
    <tr>
      <td>Ngrok (testing)</td>
    </tr>
    <tr>
      <td>PHP 7.4</td>
    </tr>
    <tr>
      <td>Composer 2.3.6</td>
    </tr>
    <tr>
      <td>MySQL & SQL</td>
    </tr>
  </tbody>
</table>


How to set webhook Telegram Bot:
https://api.telegram.org/bot[TokenBOT]/setWebhook?url=[Webhost]/[FolderProject]

[] => must remove

How to run in local:
1) Download Ngrok, XAMPP, Text Editor, Composer
2) Just download our repo (ZIP) and extract in htdocs

how to acc htdocs :
- Install XAMPP
- Open folder xampp
- Open folder htdocs
- Place the repo into the new folder

4) Active ngrok 
ngrok http [port] <br>
examples port : 80, 8080, 7882<br>
[] => must remove

5) Specifying the shell according to the folders that have been extracted. And write this:
php -S localhost:[port]<br>
examples port : 80, 8080, 7882<br>
[] => must remove

6) Get your Telegram Bot Key with <b>botfather</b>

=====================================================================<br>
Lets code

7) Make a folder private/
After you made this folder, you should set or write Bot Telegram Key

8) Make sure connected with xampp and donwload our SQL file


How to run in web hosting:
1) Just store your code in web host
2) Make sure, your main file is not error
3) And setwebhook
