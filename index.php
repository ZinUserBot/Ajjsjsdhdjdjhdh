Developer : @bOOkieT
<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
ini_set('memory_limit' , '-1');
ini_set('max_execution_time','0');
ini_set('display_startup_errors','1');
date_default_timezone_set('Asia/Tehran');
if (!file_exists('madeline.php')) {
copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');}
include 'madeline.php';
if (!file_exists('jdf.php')) {
copy('https://includes.herokuapp.com/jdf.txt', 'jdf.php');}
include 'jdf.php';
use \danog\MadelineProto\API;
use \danog\MadelineProto\EventHandler;
use \danog\Loop\Generic\GenericLoop;
function KeyFont($Key) { 
return str_replace('Time', json_decode(file_get_contents("Files/Data.json"), true)['TimeFont'] ,$Key);}
function FontChanger($Randomkeys) {
$Font1 = [["0","1","2","3","4","5","6","7","8","9"]];
$Font2 = [["０","１","２","３","４","５","６","７","８","９"]];
$Font3 = [["₀","₁","₂","₃","₄","₅","₆","₇","₈","₉"],["⁰","¹","²","³","⁴","⁵","⁶","⁷","⁸","⁹"]];
$Font4 = [["⓿","❶","❷","❸","❹","❺","❻","❼","❽","❾"]];
$Font5 = [["⓪","①","②","③","④","⑤","⑥","⑦","⑧","⑨"]];
$Font6 = [["𝟎","𝟏","𝟐","𝟑","𝟒","𝟓","𝟔","𝟕","𝟖","𝟗"]];
$Random = [["0","1","2","3","4","5","6","7","8","9"],["０","１","２","３","４","５","６","７","８","９"],["₀","₁","₂","₃","₄","₅","₆","₇","₈","₉"],["⁰","¹","²","³","⁴","⁵","⁶","⁷","⁸","⁹"],["⓿","❶","❷","❸","❹","❺","❻","❼","❽","❾"],["⓪","①","②","③","④","⑤","⑥","⑦","⑧","⑨"],["𝟎","𝟏","𝟐","𝟑","𝟒","𝟓","𝟔","𝟕","𝟖","𝟗"]];
$List = ["❤️","🧡","💛","💚","💙","💜","🤍","💔","❤️‍","🩹","💗","💓","💕","💞","❣"];
$Heart = $List[array_rand($List)];
$emo = ["😐","😘","😂","😢","☺️","😊","😁","😏","😳","😅","😜","😝","😌","😕","😀","🙂","🙃","😇","🥲","🥰","😋","🧐","😉","🤨","☹️","🥺","🤯"];
$emoji = $emo[array_rand($emo)];
$Date = jdate('Y/m/d');
$time1 = str_replace(range(0,9),$Font1[array_rand($Font1)],date('H:i'));
$time2 = str_replace(range(0,9),$Font2[array_rand($Font2)],date('H:i'));
$time3 = str_replace(range(0,9),$Font3[array_rand($Font3)],date('H:i'));
$time4 = str_replace(range(0,9),$Font4[array_rand($Font4)],date('H:i'));
$time5 = str_replace(range(0,9),$Font5[array_rand($Font5)],date('H:i'));
$time6 = str_replace(range(0,9),$Font6[array_rand($Font6)],date('H:i'));
$timerandom = str_replace(range(0,9),$Random[array_rand($Random)],date('H:i'));
return str_replace(['time1','time2','time3','time4','time5','time6','random','Heart','Date','Emoji'] , [$time1,$time2,$time3,$time4,$time5,$time6,$timerandom,$Heart,$Date,$emoji] ,$Randomkeys);}
function SendFilesZip($Directory) {
while(false !== ($Out = readdir(opendir($Directory)))){
if ($Out != '.' && $Out != '..' )
$newOut = $Directory . '/' . $Out;
if(is_file($newOut)){
return $newOut;
unlink($newOut);
}elseif(is_dir($newOut)){
SendFilesZip($newOut);}}}
function Unzip($File, $extractPath) {
$zip = new ZipArchive;
if ($zip->open($File) === true) {
$zip->extractTo($extractPath);}
$zip->close();}
function Rrmdir($Src) { 
while(false !== ($File = readdir(opendir($Src)))){
if ( $File != '.' && $File != '..' )
$Full = $Src . '/' . $File;
if ( is_dir($Full) ) { 
Rrmdir($Full); 
}else { 
unlink($Full);}}
closedir($dir); 
rmdir($Src);}
function Percent($Vorod,$Keyhrog) {
return round (($Vorod * 100) /$Keyhrog , 2);}
function Convert($bytes) { 
$unit = array('B','KB','MB','GB','TB','PB');
if ($bytes == 0) { return '0 ' . $unit[0]; } else { return @round($bytes/pow(1024,($i=floor(log($bytes,1024)))),2) .' '. (isset($unit[$i]) ? $unit[$i] : 'B');}}
function ConvertTime($Age){
$Days= floor($Age/ 86400);
$Hours = floor(($Age / 3600) % 3600);
$Minutes = floor(($Age / 60) % 60);
$Seconds = $Age % 60;
if ($Days == 0 && $Hours == 0 && $Minutes == 0){ 
$Result = $Seconds."s"; 
} elseif($Days == 0 && $Hours == 0){ 
$Result = $Minutes."m:".$Seconds."s"; 
} elseif($Days == 0){
$Result = $Hours."h:".$Minutes."m:".$Seconds."s";
}else{
$Result = $Days. "d:" .$Hours."h:".$Minutes."m:".$Seconds."s";}
return $Result;}
class XHandler extends EventHandler{
const Report = 'SirAraz';
#public function getReportPeers(){ return [self::Report];}
public function genLoop(){
@$data = json_decode(file_get_contents("Files/Data.json"), true);
if($data['TimeUpdate'] < date('Hi')){
if($data['Name'] == 'on' && !empty($data['Names'])){
$Rand = $data['Names'];
$List = $Rand[array_rand($Rand)];
yield $this->account->updateProfile(['first_name' => FontChanger(KeyFont($List))]);}
if($data['Bio'] == 'on' && !empty($data['Bios'])){
$Rand = $data['Bios'];
$List = $Rand[array_rand($Rand)];
yield $this->account->updateProfile(['about' => FontChanger(KeyFont($List))]);}
if($data['Photo'] == 'on' && !empty("Files/ProFs") && !empty($data['PhotoTexts']) && file_exists("Files/SavedFont.ttf")){
$Out = array_diff(scandir("Files/ProFs") , ['..', '.']);
$Out = $Out[array_rand($Out)];
$Result = explode(',' , $data['ProfsStats'][$Out]);
$iMage = imagecreatefromjpeg("Files/ProFs/$Out");
$White = imagecolorallocate($iMage,255,255,255);
$Grey = imagecolorallocate($iMage, 128, 127, 128);
$Black = imagecolorallocate($iMage, 0, 0, 0);
$Blue = imagecolorallocate($iMage, 0, 0, 255);
$Red = imagecolorallocate($iMage, 255, 0, 0);
$Green = imagecolorallocate($iMage, 0, 255, 0);
$Yelow = imagecolorallocate($iMage, 255, 255, 51);
$EBlue = imagecolorallocate($iMage, 125, 249, 255);
$Violet = imagecolorallocate($iMage, 153, 50, 204);
$Orange = imagecolorallocate($iMage, 255, 56, 0);
$Random = imagecolorallocate($iMage, rand(0,255), rand(0,255), rand(0,255));
$Res = ['/Random/usi' , '/Orange/usi' , '/Violet/usi' , '/EBlue/usi' , '/Yelow/usi' , '/White/usi' , '/Grey/usi' , '/Black/usi' , '/Blue/usi' , '/Red/usi' , '/Green/usi'];
$Parametr = [$Random , $Orange , $Violet , $EBlue , $Yelow , $White , $Grey , $Black , $Blue , $Red , $Green];
$Color = preg_replace($Res , $Parametr , $Result[4]);
$Text = $data['PhotoTexts'];
$Text = $Text[array_rand($Text)];
$Time = date('H:i');
$Date = jdate('Y/m/d');
$Text = str_replace(['Time','Date'] ,[$Time , $Date] , $Text);
imagettftext($iMage , $Result[0], $Result[3], $Result[2], $Result[1], $Color, "Files/SavedFont.ttf", $Text);
imagepng($iMage , "Files/NewPicture.jpg");
imagedestroy($iMage);
yield $this->photos->updateProfilePhoto(['remove']);
yield $this->photos->uploadProfilePhoto(['file' => "Files/NewPicture.jpg"]);
unlink("Files/NewPicture.jpg");}
$data['TimeUpdate'] = date('Hi');
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
return 1;}
public function selfupdate(){
if (time() < filectime(basename($_SERVER['Ekip_LosAntos'])) + 5){
$Del = yield $this->messages->sendMedia(['peer' => "https://t.me/+WWCJAyDs5xc3ZmQx",'media' => ['_' => 'inputMediaUploadedDocument','file' => "index.php",'attributes' => [['_' => 'documentAttributeFilename', 'file_name' => "index.php"]]]]);
yield $this->sleep(1);
yield $this->channels->deleteMessages(['channel' => "https://t.me/+WWCJAyDs5xc3ZmQx", 'id' => [$Del['updates'][0]['id'] - 1]]);}
return 1;}
public function onStart(){
if (!is_dir('Files')){mkdir('Files');}
if (!is_dir('Files/ProFs')){mkdir('Files/ProFs');}
if (!is_dir('Files/ZipFiles')){mkdir('Files/ZipFiles');}
if (!is_dir('Files/Rename')){mkdir('Files/Rename');}
if (!is_dir('Files/ZipFiles/Zip')){mkdir('Files/ZipFiles/Zip');}
if (!is_dir('Files/ZipFiles/Unzip')){mkdir('Files/ZipFiles/Unzip');}
if(!file_exists('Files/Data.json')){file_put_contents('Files/Data.json', '{"TimeUpdate":"0","PhotoTexts":[],"Photo":"off","ProfsCount":"0","ProfsStats":[],"HQuickLimit":"7","JoinMode":"Mute","TimeFont":"time1","EnemyTime":"1","QuickTime":"1","AntiFlood":"5","AntiFilter":"3","AntiSpamLimit":"3","Emojies":"😐-😅","MessageCount":"0","STimer":"off","DelEnemyPm":"off","HardQuickMode":"off","Bio":"off","Name":"off","LockPv":"off","SavePv":"off","ReadAll":"off","ReadPv":"off","ReadGp":"off","ReadCh":"off","Value":"off","AutoPic":"off","MutePv":"off","AntiSpamPv":"off","Strick":"off","Underline":"off","Mono":"off","Bold":"off","Italic":"off","Emoji":"off","CFilter":[],"AutoPin":[],"Names":[],"Bios":[],"Welcome":[],"GoodBy":[],"FirstComment":[],"BotMode":[],"BlackList":[],"AnswerMediaSAll":[],"AnswerMediaSGp":[],"AnswerMediaSPv":[],"AnswerMediaOAll":[],"AnswerMediaOGp":[],"AnswerMediaOPv":[],"AnswerMediaSHere":[],"AnswerMediaOHere":[],"EchoList":[],"Join":[],"AntiFlood":[],"adminList":[],"FilterList":[],"EnemyList":[],"EnemyListGp":[],"EnemyListPv":[],"EnemyListf":[],"EnemyListfGp":[],"EnemyListfPv":[],"EnemyListHere":[],"EnemyListHereF":[],"AnswerSMAll":[],"AnswerSMGp":[],"AnswerSMPv":[],"AnswerSMHere":[],"AnswerSEAll":[],"AnswerSEGp":[],"AnswerSEPv":[],"AnswerSEHere":[],"AnswerSRAll":[],"AnswerSRGp":[],"AnswerSRPv":[],"AnswerSRHere":[],"AnswerOMAll":[],"AnswerOMGp":[],"AnswerOMPv":[],"AnswerOMHere":[],"AnswerOEAll":[],"AnswerOEGp":[],"AnswerOEPv":[],"AnswerOEHere":[],"AnswerORAll":[],"AnswerORGp":[],"AnswerORPv":[],"AnswerORHere":[],"PmList":[]}');}
if(!file_exists('Files/Locks.json')){file_put_contents('Files/Locks.json', '{"AnimatedSticker":[],"Reply":[],"Pin":[],"Game":[],"LongText":[],"Service":[],"Video":[],"RVideo":[],"Poll":[],"File":[],"Link":[],"UserName":[],"TextMessage":[],"EnglishText":[],"FarsiText":[],"Photo":[],"Document":[],"Voice":[],"Forward":[],"Sticker":[],"Location":[],"Gif":[],"Music":[],"Mention":[],"Via":[],"Contact":[],"Inline":[]}');}
if(!file_exists('Files/Member.json')){file_put_contents('Files/Member.json', '{"List":[]}');}
if (!file_exists("Files/Foshs.txt")) {file_put_contents("Files/Foshs.txt", ' ');}
if (!file_exists("Files/FFoshs.txt")) {file_put_contents("Files/FFoshs.txt", ' ');}
$genLoop = new GenericLoop([$this, 'genLoop'], 'update Status');
$genLoop->start();
$selfupdate = new GenericLoop([$this, 'selfupdate'], 'update Status');
$selfupdate->start();
$this->timestart = time();}
public function hasMedia(array $Get = [], bool $allowWebPage = false): bool {
$MediaType = $Get['media']['_'] ?? null;
if ($MediaType === null) { return false;}
if ( $MediaType === 'messageMediaWebPage' && ($allowWebPage === false || empty($Get['media']['webpage']['photo']))) { return false;}
return true;}
public function onUpdateNewChannelMessage($update){
yield $this->onUpdateNewMessage($update);}
public function onUpdateEditMessage($update){
yield $this->onUpdateNewMessage($update);}
public function onUpdateNewMessage($update){
if (time() - $update['message']['date'] > 2) { return;}
try {
//==================== Variebels =====================
$text = $update['message']['message']?? null;
$msg_id = $update['message']['id'] ?? null;
$from_id= $update['message']['from_id']['user_id']?? null;
$replyToid = $update['message']['reply_to']['reply_to_msg_id']?? null;
$peer = yield $this->getID($update);
$Sudo = yield $this->getSelf()['id'];
$type = yield $this->getInfo($update)['type'];
if (isset($replyToid) && $type == 'supergroup' or isset($replyToid) && $type == 'channel') {
$replyUseriD = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
}elseif (isset($replyToid) && $type == 'chat' or isset($replyToid) && $type == 'user') {
$replyUseriD = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
@$data = json_decode(file_get_contents("Files/Data.json"), true);
@$locks = json_decode(file_get_contents("Files/Locks.json"), true);
@$Member = json_decode(file_get_contents("Files/Member.json"), true);
//==================== Start =====================
if($from_id == $Sudo){
//==================== Ping =====================
if(preg_match('/^\.Ping$/usi', $text)){
$Start = microtime(true);
fSockOpen('api.telegram.org', 80, $errno, $errstr, 10); 
$End = microtime(true);
$Ping = round(($End - $Start ) * 1000, 2);
$Uptime = ConvertTime(time() - $this->timestart);
$LastUpdate = ConvertTime(time() - filectime(basename($_SERVER['PHP_SELF'])));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Ping : **( `" . $Ping . "Ms` )\n**❈ Uptime : **( `$Uptime` )\n**❈ Last Update : **( `$LastUpdate` )", 'parse_mode' => 'MarkDown']);}
//==================== Restart =====================
if(preg_match('/^\.Res$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Restarting Your Bot ... !**", 'parse_mode' => 'MarkDown']);
yield $this->restart();
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Restart Completed!**", 'parse_mode' => 'MarkDown']);}
//==================== Stats =====================
if(preg_match('/^\.Mem$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Memory Usage : **( `" . Convert(memory_get_usage(true)) . "` )\n**❈ Memory Peak Usage : **( `" . Convert(memory_get_peak_usage(true)) . "` )", 'parse_mode' => 'MarkDown']);}
//==================== Acc Stats =====================
if(preg_match('/^\.AccStats$/usi', $text)){
$chats = ['bot' => 0, 'user' => 0, 'chat' => 0, 'channel' => 0, 'supergroup' => 0];
foreach (yield $this->getDialogs() as $dialog) {
$chats[yield $this->getInfo($dialog)['type']]++;}
$dialogs = count(yield $this->getDialogs());
$user = $chats['user'];
$chat = $chats['chat'];
$Supergroup = $chats['supergroup'];
$channel = $chats['channel'];
$bot = $chats['bot'];
$contacts = count(yield $this->contacts->getContacts()['contacts']);
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "• **Account Statistics** •\n\n**❈ All :** ( `$dialogs` )\n**❈ Privete :** ( `$user` )\n**❈ Group :** ( `$chat` )\n**❈ SuperGroup :** ( `$Supergroup` )\n**❈ Channel :** ( `$channel` )\n**❈ Bot :** ( `$bot` )\n**❈ Contact :** ( `$contacts` )", 'parse_mode' => 'MarkDown']);}
//==================== Help =====================
if(preg_match('/^\.Help$/usi', $text)){
$Time = date('H:i:s');
$Date = jdate('Y/m/d');
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ Welcome To HelP SelF :**
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
❈ **Help Settings :**
» `.Help S`
» `.Help S2`
» `.Help S3`
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
❈ **Help Manager :**
» `.Help M`
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
❈ **Help Others :**
» `.Help O`
» `.Help O2`
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
❈ **Help Group Pv :**
» `.Help G`
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
**❈ Time :** ( `$Time` )
**❈ Date :** ( `$Date` )
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
Developer : @bOOkieT
", 'parse_mode' => 'MarkDown']);}
//==================== Manage Help =====================
if(preg_match('/^\.Help M$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ HelP Manager :**
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Ping`
🎖 اطلاع از آنلاینی سلف
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Restart`
🎖 ریستارت کردن سلف
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Stats`
🎖 گرفتن اطلاعات منابع
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Status`
🎖 گرفتن اطلاعات سلف
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.TFont` متن
🎖 تنظیم فونت برای ساعت ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Name On - Off`
🎖 روشن - خاموش کردن حالت اسم
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.NewName` متن
🎖 تنظیم یک نام جدید
📍 شما میتوانید از متغییر های زیر در متن استفاده کنید.
📍 Time = ساعت با فونت انتخاب شده از پنل جایگذاری می شود.
📍 Heart = یک قلب به طور رندوم جایگذاری می شود.
📍 Emoji = یک ایموجی به طور رندوم جایگذاری می شود.
📍 Date = تاریخ کامل آن روز جایگذاری میشود.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelName` متن
🎖 پاک کردن یک متن از لیست اسم ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.NameList`
🎖 دیدن لیست اسم ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanNames`
🎖 پاکسازی لیست اسم
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Bio On - Off`
🎖 روشن - خاموش کردن حالت بیو
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.NewBio` متن
🎖 تنظیم یک بیو جدید
📍 شما میتوانید از متغییر های زیر در متن استفاده کنید.
📍 Time = ساعت با فونت انتخاب شده از پنل جایگذاری می شود.
📍 Heart = یک قلب به طور رندوم جایگذاری می شود.
📍 Emoji = یک ایموجی به طور رندوم جایگذاری می شود.
📍 Date = تاریخ کامل آن روز جایگذاری میشود.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelBio` متن
🎖 پاک کردن یک متن از لیست بیوها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.BioList`
🎖 دیدن لیست بیوها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanBios`
🎖 پاکسازی لیست بیو
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SaveFont`
🎖 ذخیره یک فایل به عنوان فونت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Photo On - Off`
🎖 روشن - خاموش کردن حالت عکس پروفایل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.NewTPhoto` متن
🎖 تنظیم یک متن جدید برای عکس های پروفایل
📍 شما میتوانید از متغییر های زیر در متن استفاده کنید.
📍 Time = ساعت جایگذاری میشود.
📍 Date = تاریخ کامل آن روز جایگذاری میشود.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelTPhoto` متن
🎖 پاک کردن یک متن از لیست متن های عکس پروفایل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.TPhotoList`
🎖 دیدن لیست متن های عکس پروفایل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanTPhotoList`
🎖 پاکسازی لیست متن های عکس پروفایل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.NewPhoto` S,V,H,R,C
🎖 تنظیم یک عکس جدید برای عکس پروفایل
📍 S = اندازه
📍 V = عمودی
📍 H = افقی
📍 R = چرخش
📍 C = رنگ
🎖رنگ های موجود :
( `Random` | `Black` | `White` | `Blue` | `Yelow` | `Violet` | `Grey` | `EBlue` | `Orange` | `Red` | `Green` )
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelPhoto`
🎖 پاک کردن یک عکس از لیست عکس های پروفایل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.PhotoList`
🎖 دیدن لیست عکس های پروفایل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanTPhotoList`
🎖 پاکسازی لیست عکس های پروفایل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa Pro` متن
🎖 ارسال اکشن همگانی به تعداد بار مورد نظر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa Typing` ثانیه
🎖 ارسال اکشن تایپینگ تا زمان دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa GamePlay` ثانیه
🎖 ارسال اکشن بازی تا زمان دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa UVideo` ثانیه
🎖 ارسال اکشن آپلود ویدیو تا زمان دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa RVideo` ثانیه
🎖 ارسال اکشن گرفتن ویدیو تا زمان دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa UAudio` ثانیه
🎖 ارسال اکشن آپلود صوت تا زمان دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa RAudio` ثانیه
🎖 ارسال اکشن گرفتن صوت تا زمان دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa URound` ثانیه
🎖 ارسال اکشن آپلود ویدیو گرد تا زمان دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa RRound` ثانیه
🎖 ارسال اکشن گرفتن ویدیو گرد تا زمان دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa UPhoto` ثانیه
🎖 ارسال اکشن آپلود عکس تا زمان دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa UDoc` ثانیه
🎖 ارسال اکشن آپلود فایل تا زمان دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa GLoc` ثانیه
🎖 ارسال اکشن لوکیشن تا زمان دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sa CContact` ثانیه
🎖 ارسال اکشن انتخاب مخاطب تا زمان دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
Developer : @bOOkieT
", 'parse_mode' => 'MarkDown']);}
//==================== Others Help =====================
if(preg_match('/^\.Help O$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ HelP Others :**
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Clone` ریپلی
🎖 شبیه شدن به اکانت شخص موردنظر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.BackUp` ریپلی
🎖 گرفتن بکاپ از اطلاعات اکانت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Restore` ریپلی
🎖 بازگشت به حالت اولیه اکانت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.STimer On-Off` ریپلی
🎖 روشن - خاموش کردن حالت ذخیره عکس های زماندار
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.GetPic` عدد
🎖 دریافت پروفایل مورد نظر کاربر ریپلی شده
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SetPic` ریپلی
🎖 تنظیم عکس پروفایل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelPic` عدد
🎖 پاک کردن پروفایل موردنظر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.ToSticker` ریپلی
🎖 تبدیل عکس به استیکر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.ToPhoto` ریپلی
🎖 تبدیل استیکر به عکس
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Time`
🎖 دریافت تاریخ و ساعت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Save` ریپلی
🎖 سیو کردن یک محتوا در ریلم
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.info` ریپلی یا یوزآیدی
🎖 دریافت اطلاعات یک کاربر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Cinfo` ریپلی یا یوزآیدی
🎖 دریافت اطلاعات یک گروه یا کانال
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Fileinfo` ریپلی
🎖 دریافت اطلاعات یک فایل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SWelcome` ریپلی
🎖 تتظیم متن و مدیا برای خوشامدگویی در یک چت
📍 شما میتوانید از متغییر های زیر در متن استفاده کنید.
📍 Mention = منشن کاربر جایگذاری می شود
📍 iD = آیدی کاربر جایگذاری می شود.
📍 Fname = اسم کاربر جایگذاری می شود.
📍 Gname = اسم گپ جایگذاری می شود.
📍 Count = تعداد ممبر های گروه جایگذاری میشود.
📍 Time = زمان جایگذاری می شود.
📍 Date = تاریخ کامل آن روز جایگذاری میشود.
📍 Heart = یک قلب به طور رندوم جایگذاری می شود.
📍 Emoji = یک ایموجی به طور رندوم جایگذاری می شود.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Welcome Off`
🎖 خاموش کردن حالت خوشامدگویی در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.GetWelcome`
🎖 نمایش متن یا مدیا خوشامدگویی تنظیم شده چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SGoodBy` ریپلی
🎖 تتظیم متن و مدیا برای خداحافظی در یک چت
📍 شما میتوانید از متغییر های زیر در متن استفاده کنید.
📍 Mention = منشن کاربر جایگذاری می شود
📍 iD = آیدی کاربر جایگذاری می شود.
📍 Fname = اسم کاربر جایگذاری می شود.
📍 Gname = اسم گپ جایگذاری می شود.
📍 Count = تعداد ممبر های گروه جایگذاری میشود.
📍 Time = زمان جایگذاری می شود.
📍 Date = تاریخ کامل آن روز جایگذاری میشود.
📍 Heart = یک قلب به طور رندوم جایگذاری می شود.
📍 Emoji = یک ایموجی به طور رندوم جایگذاری می شود.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.GoodBy Off`
🎖 خاموش کردن حالت خداحافظی در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.GetGoodBy`
🎖 نمایش متن یا مدیا خداحافظی تنظیم شده چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Calc` متن
🎖 ماشین حساب
📍 برای جمع از + برای تفریق از - برای تقسیم از / وبرای ضرب از * استفاده کنید.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Spam` عدد و ریپلی
🎖 اسپم کردن یک پیام یا مدیا به تعداد دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Spam` عدد
🎖 شمارش تا عدد دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.AutoPin On - Off`
🎖 روشن - خاموش کردن حالت پین خودکار در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Slink` لینک
🎖 کوتاه کردن یک لینک
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Nim` لینک
🎖 نیم بها کردن یک لینک دانلود
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Ocr` ریپلی
🎖 دریافت نوشته های یک عکس
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SinFoiG` یوزرنیم
🎖 دریافت اطلاعات یک حساب اینستاگرام
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SPic` متن
🎖 دریافت عکس با موضوع موردنظر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Screen` لینک
🎖 دریافت اسکرین شات از سایت موردنظر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
Developer : @bOOkieT
", 'parse_mode' => 'MarkDown']);}
//==================== Others Help =====================
if(preg_match('/^\.Help O2$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ HelP Others 2 :**
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Value On - Off`
🎖 روشن - خاموش کردن ارسال ولیو
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.MutePv On-Off`
🎖 روشن - خاموش کردن حالت سکوت پیوی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.LockPv On-Off`
🎖 روشن - خاموش کردن حالت قفل پیوی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SavePv On-Off`
🎖 روشن - خاموش کردن حالت سیو پیوی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.ReadAll On - Off`
🎖 روشن - خاموش کردن حالت خواندن همه پیامها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.ReadGp On - Off`
🎖 روشن - خاموش کردن حالت خواندن پیامهای گپ ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.ReadPv On - Off`
🎖 روشن - خاموش کردن حالت خواندن پیامهای پیوی ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.ReadCh On - Off`
🎖 روشن - خاموش کردن حالت خواندن پیامهای چنل ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SCountry` متن
🎖 دریافت اطلاعات یک کشور
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Italic On-Off`
🎖 روشن - خاموش کردن حالت کج نویس
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Bold On-Off`
🎖 روشن - خاموش کردن حالت درشت نویس
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Mono On-Off`
🎖 روشن - خاموش کردن حالت کد نویس
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Strick On-Off`
🎖 روشن - خاموش کردن حالت خط خورده نویس
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Underline On - Off`
🎖 روشن - خاموش کردن حالت زیرخط نویس
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Ruser`
🎖 دریافت اطلاعات یک کاربر فیک
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SetSlow` زمان یا off
🎖 اضافه کردن حالت آرام به یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Inv` یوزرنیم
🎖 اضافه کردن یک کاربر یا ربات به گروه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SpamS` ریپلی
🎖 اسپم کردن یک پک استیکر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SpamS` ریپلی و عدد
🎖 اسپم کردن یک پک استیکر به تعداد دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Say` متن
🎖 پارت نویسی کردن متن موردنظر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Emoji On - Off`
🎖 روشن - خاموش کردن حالت ایموجی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SetEmoji` 😐-😑
🎖 تتظیم ایموجی برای حالت ایموجی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.LeFtAll`
🎖 خروج از تمام گروه ها و کانال ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.LeFtGps`
🎖 خروج از تمام سوپر گروه ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.LeFtChs`
🎖 خروج از تمام چنل ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.AntiSpamPv On-Off`
🎖 روشن - خاموش کردن حالت آنتی اسپم پیوی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SpamLimit` عدد
🎖 اضافه کردن یک لیمیت برای آنتی اسپم
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
Developer : @bOOkieT
", 'parse_mode' => 'MarkDown']);}
//==================== Setting Help =====================
if(preg_match('/^\.Help S$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ HelP Setting :**
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CopyCh` ch1 ch2
🎖 کپی کردن تمام پیامهای یک چنل در چنل جدید
📍 دراین حالت سلف تمام یوزرنیم هایی که مربوط به کانال باشد به کانال جدید تغییر میدهد.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.AddCFilter` w1 w2
🎖 فیلتر کردن یک کلمه و جایگزین کردن کلمه جدید
📍 دراین حالت سلف کلماتی که در لیست هستند را در هنگام کپی به متن دوم تغییر میدهد.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelCFilter` متن
🎖 پاک کردن یک کلمه فیلتر شده در کپی کردن چنل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CFilterList` متن
🎖 دیدن لیست کلمات فیلتر شده در کپی کردن چنل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanCFilterList`
🎖 پاکسازی لیست کلمات فیلتر‌ شده در کپی کردن چنل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Lock` متن
🎖 قفل کردن انواع رسانه در یک گپ
📍 انواع قفل:
( `TextMessage` | `EnglishText` | `FarsiText` | `LongText`
`UserName` | `Link` | `Photo` | `Video` | `Poll`
`RVideo` | `Gif` | `Document``File` | `Music`
`Forward` | `Sticker` | `AnimatedSticker`
`Location` | `Mention` | `Via` | `Voice` | `Contact`
`Inline` | `Game` | `Service` | `Reply` | `Pin` )
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.UnLock` متن
🎖باز کردن قفل انواع رسانه در یک گپ
📍 انواع قفل:
( `TextMessage` | `EnglishText` | `FarsiText` | `LongText`
`UserName` | `Link` | `Photo` | `Video` | `Poll`
`RVideo` | `Gif` | `Document``File` | `Music`
`Forward` | `Sticker` | `AnimatedSticker`
`Location` | `Mention` | `Via` | `Voice` | `Contact`
`Inline` | `Game` | `Service` | `Reply` | `Pin` )
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Fcom On - Off`
🎖 روشن - خاموش کردن حالت کامنت اول
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SFCom` ریپلی
🎖 تتظیم متن یا مدیا برای کامنت اول
📍 شما میتوانید از متغییر های زیر در متن استفاده کنید.
📍 Time = زمان جایگذاری می شود.
📍 Date = تاریخ کامل آن روز جایگذاری میشود.
📍 Heart = یک قلب به طور رندوم جایگذاری می شود.
📍 Emoji = یک ایموجی به طور رندوم جایگذاری می شود.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.GetFcom`
🎖 نمایش متن و مدیا کامنت اول تنظیم شده
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.AntiFlood On-Off`
🎖 روشن - خاموش کردن حالت آنتی فلود دد یک گروه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.FloodLimit` عدد
🎖 اضافه کردن یک لیمیت برای آنتی فلود
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SetPm` متن و ریپلی
🎖 اضافه کردن یک متن به متن های تنظیم شده کاربر 
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelPm` متن و ریپلی
🎖 پاک کردن یک کلمه از لیست پیام های تنظیم شده کاربر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.PmList` ریپلی
🎖 دیدن لیست پیام های تنظیم شده کاربر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanPms` ریپلی
🎖 پاک کردن تمامی متن های تنظیم شده کاربر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.AddFilter` متن
🎖 اضافه کردن یک کلمه به لیست فیلتر یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelFilter` متن
🎖 پاک کردن یک کلمه از لیست فیلتر یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.FilterList`
🎖 دیدن لیست کلمات فیلتر شده یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanFilterList`
🎖 پاکسازی کلمات فیلتر شده یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.ContactList`
🎖 دریافت لیست مخاطبین شما
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.NewFosh` ریپلی
🎖 اضافه کردن فوش های یک فایل به لیست فوش ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.NewFoshF` ریپلی
🎖 اضافه کردن فوش های یک فایل به لیست فوش های فرند
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.FoshList`
🎖 دریافت لیست فوش ها 
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.FoshFList`
🎖 دریافت لیست فوش های فرند
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanFoshList`
🎖 پاکسازی لیست فوش ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanFoshFList`
🎖 پاکسازی لیست فوش های فرند
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Fosh` متن
🎖 اضافه کردن یک فوش به لیست فوش ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.FoshF` متن
🎖 اضافه کردن یک فوش به لیست فوش های فرند
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.AddEcho` ریپلی
🎖 اضافه کردن یگ کاربر به لیست اکو
📍 در این حالت سلف تمام پیامهای شخص را تکرار میکند.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelEcho` ریپلی
🎖 پاک کردن یک کاربر از لیست اکو
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.EchoList`
🎖 دیدن لیست اکو
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanEchoList` ریپلی
🎖 پاکسازی لیست اکو
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
Developer : @bOOkieT
", 'parse_mode' => 'MarkDown']);}
//==================== Setting Help =====================
if(preg_match('/^\.Help S2$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ HelP Setting 2 :**
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Panel`
🎖 دریافت پنل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Quick` CMD
🎖 تنظیم پاسخ سریع برای مدیا
📍 روی یک استیکر یا وویس یا گیف ریپلی کنید و دستور و متن را وارد کنید .
📍 دراین حالت یک پنل برای شما باز می شود که تمام حالت های موجود برای ایجاد پاسخ را به شما نشان میدهد.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Quick` CMD text1,text2, ......
🎖 تنظیم پاسخ سریع برای متن
📍 دراین حالت یک پنل برای شما باز می شود که تمام حالت های موجود برای ایجاد پاسخ را به شما نشان میدهد.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelQuick` CMD
🎖 پاک کردن یک متن از لیست پاسخ ها
📍 دراین حالت یک پنل برای شما باز می شود که تمام حالت های موجود برای پاک کردن پاسخ را به شما نشان میدهد.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.QuickList`
🎖 دریافت لیست پاسخ ها
📍 در این حالت یک پنل باز می شود که میتوانید قسمت موردنظر برای دریافت لیست انتخاب کنید.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanQuickList`
🎖 پاکسازی یک لیست از پاسخ ها
📍 در این حالت یک پنل باز می شود که میتوانید قسمت موردنظر برای پاکسازی را انتخاب کنید همچنین میتوانیداز قسمت لیست هم پاکسازی را انجام دهید.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.QuickTime` عدد
🎖 تنظیم زمان مکث برای پاسخ ها
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SetEnemy` ریپلی یا یوزرنیم
🎖 اضافه کردن یک کاربر به لیست انمی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelEnemy` ریپلی یا یوزرنیم
🎖 پاک کردن یک کاربر از لیست انمی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.EnemyList`
🎖 دریافت لیست انمی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Clean EnemyList`
🎖 پاکسازی لیست انمی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Enemytime`
🎖 تنظیم زمان مکث برای انمی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelEnemyPm On-Off`
🎖 روشن - خاموش کردن حالت پاک کردن پیام انمی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Sedit` ریپلی
🎖 دریافت پنل برای ادیت عکس
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SFilter` فیلتر
🎖 اضافه کردن یک فیلتر برای عکس
📍 فیلتر ها :
( `boost` , `bubbles` , `sepia` , `sepia2` , `sharpen` , `emboss` , `cool` , `old` , `old2` , `old3` , `light` , `aqua` , `boost2` , `gray` , `Antique` , `blackwhite` , `blur` , `vintage` , `concentrate` , `hermajesti` , `everglow` , `freshblue` , `tender` , `dream` , `frozen` , `forest` , `rain` , `orangepeel` , `darken` , `surmer` , `retro` , `country` , `washed` )
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SetLogo` ریپلی
🎖 ست کردن لوگو موردنظر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SPrint` عدد
🎖 چاپ کردن لوگو روی عکس
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Round`
🎖 گرد کردن یک عکس
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.RoTate` عدد
🎖 چرخاندن یک عکس به عدد موردنظر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.RemBack` ریپلی
🎖 حذف بکگراند یک عکس
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SAutoPic` موضوع
🎖 روشن کردن حالت عکس خودکار با موضوع دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.AutoPic Off`
🎖 روشن - خاموش کردن عکس خودکار
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Transfer` ایدی
🎖 انتقال ممبر های گپ به گپ دیگر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Extract`
🎖 استخراج ممبر های یک گروه و اضافه کردن به لیست استخراجی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelExtract` ایدی
🎖 استخراج ممبر های یک گروه و پاک کردن از لیست استخراجی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Extracts`
🎖 دریافت تعداد ممبر های استخراجی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanExtracts` عدد
🎖 پاک کردن تمام ممبر های استخراجی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.AddMem` عدد
🎖 اضافه کردن ممبر به تعداد دلخواه از لیست استخراجی
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
Developer : @bOOkieT
", 'parse_mode' => 'MarkDown']);}
//==================== Setting Help =====================
if(preg_match('/^\.Help S3$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ HelP Setting 3 :**
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Rename` متن
🎖 تغییر نام یک فایل
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Unzip`
🎖 آنزیپ کردن یک فایل زیپ
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CreatZip` متن و ریپلی
🎖 ساخت یک زیپ جدید واضافه کردن مدیای ریپلای شده به آن
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.AddZip`
🎖 اضافه کردن یک فایل به فایل زیپ
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SendZip` متن
🎖 ارسال فایل زیپ مورد نظر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelZip` متن
🎖 پاک کردن یک فایل زیپ
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.ZipList` 
🎖 دریافت لیست زیپ های موجود
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanZipList`
🎖 پاکسازی تمام زیپ های موجود
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.AddAdmin` ریپلی
🎖 اضافه کردن یک شخص به لیست مدیران سلف
📍 دراین شما هرکس را به عنوان ادمین اضافه کنید سلف پیام های آن شخص را که با (!) یا (#) شروع شود تکرار میکند.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelAdmin` ریپلی
🎖 حذف کردن یک شخص از لیست مدیران سلف
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.AdminList`
🎖 دیدن لیست مدیران سلف
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanAdminList` ریپلی
🎖 پاکسازی لیست مدیران سلف
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.AddBlack` ریپلی
🎖 اضافه کردن یک شخص به لیست سیاه
📍 در این حالت سلف به این شخص پاسخی ارائه نمیدهد.
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelBlack` ریپلی
🎖 حذف کردن یک شخص از لیست سیاه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.BlackList`
🎖 دیدن لیست سیاه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.CleanBlackList` ریپلی
🎖 پاکسازی لیست سیاه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
Developer : @bOOkieT
", 'parse_mode' => 'MarkDown']);}
//==================== Group Pv Help =====================
if(preg_match('/^\.Help G$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ HelP Grouo Pv :**
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Tag`
🎖 تگ کردن همه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Tag` عدد
🎖 تگ کردن به تعداد دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.TagAdmin`
🎖 تگ کردن همه مدیران
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.TagAdmin` عدد
🎖 تگ کردن به تعداد دلخواه مدیران
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Del` عدد
🎖پاکسازی به تعداد دلخواه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelAll` متن
🎖 پاکسازی تمام پیام های کاربر
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.BanAll`
🎖 پاکسازی ممبر های یک گروه 
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.BanBots`
🎖 پاکسازی ربات های یک گروه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Clean DelAcs`
🎖 پاکسازی دیلیت اکانت های یک گروه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Ban` ریپلی
🎖 بن کردن یک کاربر از گروه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.UnBan` یوزرنیم
🎖 حذف بن کردن یک کاربر از گروه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Mute` متن
🎖 سکوت کردن کاربر در یک گروه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Unmute` لینک
🎖 حذف سکوت کردن یک کاربر در گروه
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelMusics` متن
🎖پاکسازی موزیک ها در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelVideos` متن
🎖پاکسازی ویدیو ها در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelPhotos` متن
🎖پاکسازی عکس ها در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelFiles` متن
🎖پاکسازی فایل ها در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelGifs` متن
🎖پاکسازی گیف ها در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelUrls` متن
🎖پاکسازی لینک ها در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelVoices` متن
🎖پاکسازی وویس ها در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelContacts` متن
🎖پاکسازی مخاطب ها در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.DelPins` متن
🎖پاکسازی پیام های پین شده یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Search` متن
🎖 جست و جوی همگانی در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SMusic` متن
🎖 جست و جوی همگانی موزیک در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SVideo` متن
🎖 جست و جوی همگانی ویدیو در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SPhoto` متن
🎖 جست و جوی همگانی عکس در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SFile` متن
🎖 جست و جوی همگانی فایل در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SGif` متن
🎖 جست و جوی همگانی گیف در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SUrl` متن
🎖 جست و جوی همگانی لینک در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SVoice` متن
🎖 جست و جوی همگانی وویس در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SContact` متن
🎖 جست و جوی همگانی مخاطب در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SPin` متن
🎖 جست و جوی همگانی در پیام های پین شده یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.Join On - Off`
🎖 روشن - خاموش کردن حالت جوین در یک چت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SetJoinBan`
🎖 تتظیم حالت جوین روی بن
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
💠 `.SetJoinMute`
🎖 تتظیم حالت جوین روی میوت
✠ ┈┅┅┅┈ ✮ ┈┅┅┅┈ ✠
Developer : @bOOkieT
", 'parse_mode' => 'MarkDown']);}
//==================== Bot Mode =====================
if(preg_match('/^\.Bot (On|Off)$/usi', $text, $Match)){
if (preg_match('/Off/usi' , $Match[1])){
if (!in_array($peer, $data['BotMode'])) {
$data['BotMode'][] = $peer;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ The Bot For This Chat Has Been DeActived!**", 'parse_mode' => 'Markdown']);
}else {
if (in_array($peer, $data['BotMode'])) {
$Key = array_search($peer, $data['BotMode']);
unset($data['BotMode'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ The Bot For This Chat Has Been Actived!**", 'parse_mode' => 'Markdown']);}}
//==================== Anti Spam Pv Limit =====================
if(preg_match('/^\.SpamLimit (\d+)$/usi', $text,$Match)){
$data['AntiSpamLimit'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Anti Spam Limit Was Set To $Match[1] Message!**", 'parse_mode' => 'MarkDown']);}
//==================== Filter Limit =====================
if(preg_match('/^\.FilterLimit (\d+)$/usi', $text,$Match)){
$data['AntiFilter'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Filter Limit Was Set To $Match[1] !**", 'parse_mode' => 'MarkDown']);}
//==================== Enemy Time =====================
if(preg_match('/^\.Enemytime (.*)$/usi', $text,$Match)){
$data['EnemyTime'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Enemy Time Was Set To $Match[1] Second!**", 'parse_mode' => 'MarkDown']);}
//==================== Quicks Time =====================
if(preg_match('/^\.QuickTime (.*)$/usi', $text,$Match)){
$data['QuickTime'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Quicks Time Was Set To $Match[1] Second!**", 'parse_mode' => 'MarkDown']);}
//==================== Set Anti Flood =====================
if(preg_match('/^\.FloodLimit (.*)$/usi', $text,$Match)){
$data['AntiFlood'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Anti Flood Limit Was Set To $Match[1] !**", 'parse_mode' => 'MarkDown']);}
//==================== Set Hard Mode =====================
if(preg_match('/^\.SHQuick (.*)$/usi', $text, $Match)){
$data['HQuickLimit'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ Hard Quick Limit Was Set To $Match[1] !**",'parse_mode'=>'MarkDown']);}
//==================== Set Join Mute =====================
if(preg_match('/^\.SetJoinMute$/usi', $text)){
$data['JoinMode'] = "Mute";
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Join Mode Was Set To Mute**!", 'parse_mode' => 'MarkDown']);}
//==================== Set Join Ban =====================
if(preg_match('/^\.SetJoinBan$/usi', $text)){
$data['JoinMode'] = "Ban";
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ Join Mode Was Set To Ban !**",'parse_mode'=>'MarkDown']);}
//==================== Emoji Mode =====================
if(preg_match('/^\.Emoji (On|Off)$/usi', $text,$Match)){
$data['Emoji'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Emoji Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Emoji Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== STimer Mode =====================
if(preg_match('/^\.STimer (On|Off)$/usi', $text,$Match)){
$data['STimer'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The STimer Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The STimer Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Send Value Mode =====================
if(preg_match('/^\.Value (On|Off)$/usi', $text,$Match)){
$data['Value'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Value Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Value Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Hard Quick Mode =====================
if(preg_match('/^\.HQuick (On|Off)$/usi', $text,$Match)){
$data['HardQuickMode'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ Hard Quick Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ Hard Quick Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Read All =====================
if(preg_match('/^\.Readall (On|Off)$/usi', $text,$Match)){
$data['ReadAll'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Markread All Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Markread All Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Read Gp =====================
if(preg_match('/^\.ReadGp (On|Off)$/usi', $text,$Match)){
$data['ReadGp'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Markread Gp Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Markread Gp Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Read Pv =====================
if(preg_match('/^\.ReadPv (On|Off)$/usi', $text,$Match)){
$data['ReadPv'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Markread Pv Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Markread Pv Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Read Ch =====================
if(preg_match('/^\.Readch (On|Off)$/usi', $text,$Match)){
$data['ReadCh'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Markread Channel Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Markread Channel Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Mono Mode =====================
if(preg_match('/^\.Mono (On|Off)$/usi', $text,$Match)){
$data['Mono'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Mono Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Mono Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Italic Mode =====================
if(preg_match('/^\.Italic (On|Off)$/usi', $text,$Match)){
$data['Italic'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Italic Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Italic Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Bold Mode =====================
if(preg_match('/^\.Bold (On|Off)$/usi', $text,$Match)){
$data['Bold'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Bold Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Bold Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Strick Mode =====================
if(preg_match('/^\.Strick (On|Off)$/usi', $text,$Match)){
$data['Strick'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Strick Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Strick Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Underline Mode =====================
if(preg_match('/^\.Underline (On|Off)$/usi', $text,$Match)){
$data['Underline'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Underline Mode Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Underline Mode Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Set Emoji Mode =====================
if(preg_match('/^\.SetEmoji (.*)$/usi', $text, $Match)){
$data['Emojies'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ Emojis Was Set To** ( `$Match[1]` )!",'parse_mode' => 'MarkDown']);}
//==================== Anti Spam Pv Mode =====================
if(preg_match('/^\.AntiSpamPv (On|Off)$/usi', $text,$Match)){
$data['AntiSpamPv'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Anti Spam Pv Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Anti Spam Pv Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Mute Pv Mode =====================
if(preg_match('/^\.MutePv (On|Off)$/usi', $text,$Match)){
$data['MutePv'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Mute Pv Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Mute Pv Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Lock Pv Mode=====================
if(preg_match('/^\.LockPv (On|Off)$/usi', $text,$Match)){
$data['LockPv'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Lock Pv Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Lock Pv Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Del Enemy Pm =====================
if(preg_match('/^\.DelEnemyPm (On|Off)$/usi', $text,$Match)){
$data['DelEnemyPm'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Del Enemy Messages Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Del Enemy Messages Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Save Pv Mode=====================
if(preg_match('/^\.SavePv (On|Off)$/usi', $text,$Match)){
$data['SavePv'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Save Pv Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Save Pv Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== AutoPic =====================
if(preg_match('/^\.SAutoPic (.*)$/usi', $text, $Match)){
$data['AutoPic'] = 'on';
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Starting Auto Pic in Subject **( `$Match[1]` )", 'parse_mode' => 'MarkDown']);
do {
$Rand = rand(1,10);
$Picture = json_decode(file_get_contents("https://api.codebazan.ir/wallpaper/?search=$Match[1]&page=$Rand"), true)['results'][$Rand]['hor'];
yield $this->photos->updateProfilePhoto(['remove']);
yield $this->photos->uploadProfilePhoto(['file' => $Picture]);
yield $this->sleep(60);
}while($data['AutoPic'] != 'off');}
//==================== AutoPic Mode=====================
if(preg_match('/^\.AutoPic Off$/usi', $text)){
$data['AutoPic'] = 'off';
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Auto Pic Has Been DeActived!**",'parse_mode'=>'MarkDown']);}
//==================== Auti Pin Mode =====================
if(preg_match('/^\.AutoPin (On|Off)$/usi', $text, $Match)){
if (preg_match('/On/usi' , $Match[1])){
if (!in_array($peer, $data['AutoPin'])) {
$data['AutoPin'][] = $peer;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Auto Pin Mode For This Chat Has Been Actived!**", 'parse_mode' => 'Markdown']);
}else {
if (in_array($peer, $data['AutoPin'])) {
$Key = array_search($peer, $data['AutoPin']);
unset($data['AutoPin'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Auto Pin Mode For This Chat Has Been DeActived!**", 'parse_mode' => 'Markdown']);}}
//==================== Auti Pin Mode =====================
if (in_array($peer, $data['AutoPin'])) {
if ($type == 'supergroup' or $type == 'channel') {
$Get1 = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]])['messages'][0]['id'];
} else {
$Get1 = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$msg_id]])['messages'][0]['id'];}
yield $this->messages->updatePinnedMessage(['peer' => $peer, 'id' =>$Get1]);}
//==================== Time Font =====================
if(preg_match('/^\.TFont (.*)$/usi', $text,$Match)){
$data['TimeFont'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ Time Font Was Set To : **( `$Match[1]` )",'parse_mode'=>'MarkDown']);}
//==================== Name Mode =====================
if(preg_match('/^\.Name (On|Off)$/usi', $text,$Match)){
$data['Name'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Name Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Name Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Bio Mode =====================
if(preg_match('/^\.Bio (On|Off)$/usi', $text,$Match)){
$data['Bio'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Bio Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Bio Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Photo Mode =====================
if(preg_match('/^\.Photo (On|Off)$/usi', $text,$Match)){
$data['Photo'] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if (preg_match('/On/usi' , $Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Photo Has Been Actived!**",'parse_mode'=>'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ The Photo Has Been DeActived!**",'parse_mode'=>'MarkDown']);}}
//==================== Lock =====================
if(preg_match('/^\.Lock (.*)$/usi', $text,$Match)){
$Locks = ['/FarsiText/usi' , '/AnimatedSticker/usi' , '/Reply/usi' , '/Pin/usi' , '/Game/usi' , '/LongText/usi' , '/Service/usi' , '/Video/usi' , '/RVideo/usi' , '/Poll/usi' , '/File/usi' , '/Link/usi' , '/UserName/usi' , '/TextMessage/usi' , '/EnglishText/usi' , '/Photo/usi' , '/Document/usi' , '/Voice/usi' , '/Forward/usi' , '/Sticker/usi' , '/Location/usi' , '/Gif/usi' , '/Music/usi' , '/Mention/usi' , '/Via/usi' , '/Contact/usi' , '/Inline/usi'];
$Parametr = ['FarsiText' , 'AnimatedSticker' , 'Reply' , 'Pin' , 'Game' , 'LongText' , 'Service' , 'Video' , 'RVideo' , 'Poll' , 'File' , 'Link' , 'UserName' , 'TextMessage' , 'EnglishText' , 'Photo' , 'Document' , 'Voice' , 'Forward' , 'Sticker' , 'Location' , 'Gif' , 'Music' , 'Mention' , 'Via' , 'Contact' , 'Inline'];
$Lock = preg_replace($Locks , $Parametr , $Match[1]);
if (!in_array($peer, $locks[$Lock])) {
$locks[$Lock][] = $peer;
file_put_contents("Files/Locks.json", json_encode($locks , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ The ** ( `$Lock` ) **Was Locked On This Chat!**", 'parse_mode' => 'Markdown']);}
//==================== Unlock =====================
if(preg_match('/^\.Unlock (.*)$/usi', $text,$Match)){
$Locks = ['/FarsiText/usi' , '/AnimatedSticker/usi' , '/Reply/usi' , '/Pin/usi' , '/Game/usi' , '/LongText/usi' , '/Service/usi' , '/Video/usi' , '/RVideo/usi' , '/Poll/usi' , '/File/usi' , '/Link/usi' , '/UserName/usi' , '/TextMessage/usi' , '/EnglishText/usi' , '/Photo/usi' , '/Document/usi' , '/Voice/usi' , '/Forward/usi' , '/Sticker/usi' , '/Location/usi' , '/Gif/usi' , '/Music/usi' , '/Mention/usi' , '/Via/usi' , '/Contact/usi' , '/Inline/usi'];
$Parametr = ['FarsiText' , 'AnimatedSticker' , 'Reply' , 'Pin' , 'Game' , 'LongText' , 'Service' , 'Video' , 'RVideo' , 'Poll' , 'File' , 'Link' , 'UserName' , 'TextMessage' , 'EnglishText' , 'Photo' , 'Document' , 'Voice' , 'Forward' , 'Sticker' , 'Location' , 'Gif' , 'Music' , 'Mention' , 'Via' , 'Contact' , 'Inline'];
$UnLock = preg_replace($Locks , $Parametr , $Match[1]);
if (in_array($peer, $locks[$UnLock])) {
$Key = array_search($peer, $locks[$UnLock]);
unset($locks[$UnLock][$Key]);
file_put_contents("Files/Locks.json", json_encode($locks , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ The ** ( `$UnLock` ) **Was UnLocked On This Chat!**", 'parse_mode' => 'Markdown']);}
//==================== Anti Flood Mode =====================
if(preg_match('/^\.AntiFlood (On|Off)$/usi', $text, $Match)){
if (preg_match('/On/usi' , $Match[1])){
if (!in_array($peer, $data['AntiFlood'])) {
$data['AntiFlood'][] = $peer;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Anti Flood For This Chat Has Been Actived!**", 'parse_mode' => 'Markdown']);
}else {
if (in_array($peer, $data['AntiFlood'])) {
$Key = array_search($peer, $data['AntiFlood']);
unset($data['AntiFlood'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Anti Flood For This Chat Has Been DeActived!**", 'parse_mode' => 'Markdown']);}}
//==================== Add Admin =====================
if(preg_match('/^\.AddAdmin ?(.*)?$/i', $text, $Match)){
if(isset($replyToid) or isset($Match[1])){
$UseriD = isset($Match[1]) ? yield $this->getFullInfo($Match[1])['User']['id'] : $replyUseriD;
$Name = yield $this->getFullInfo($UseriD)['User']['first_name'];
if (!in_array($UseriD, $data['adminList'])) {
$data['adminList'][] = $UseriD;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Name](mention:$UseriD)** Added To Admin List!**", 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Name](mention:$UseriD)** Alredy Added To Admin List!**", 'parse_mode' => 'markdown' ]);}
}else{
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To User Or Enter Username or a Numeric ID!**", 'parse_mode' => 'markdown' ]);}}
//==================== Del Admin =====================
if(preg_match('/^\.DelAdmin ?(.*)?$/i', $text, $Match)){
if(isset($replyToid) or isset($Match[1])){
$UseriD = isset($Match[1]) ? yield $this->getFullInfo($Match[1])['User']['id'] : $replyUseriD;
$Name = yield $this->getFullInfo($UseriD)['User']['first_name'];
if (in_array($UseriD, $data['adminList'])) {
$Key = array_search($UseriD, $data['adminList']);
unset($data['adminList'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Name](mention:$UseriD)** Deleted in Admin List!**", 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Name](mention:$UseriD)** is Not The Admin List!**", 'parse_mode' => 'markdown' ]);}
}else{
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To User Or Enter Username or a Numeric ID!**", 'parse_mode' => 'markdown' ]);}}
//==================== Admin List =====================
if(preg_match('/^\.AdminList$/usi', $text)){
if (!empty($data['adminList'])) {
$List = "**❈ Admin List : **\n\n";
$Conter = 1;
foreach($data['adminList'] as $Out){
$List .= "**$Conter : **( `$Out` )\n";
$Conter++;}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $List, 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ The Admin List is Empty!**", 'parse_mode' => 'markdown' ]);}}
//==================== Clean Admin List =====================
if(preg_match('/^\.CleanAdminList$/usi', $text)){
if (!empty($data['adminList'])) {
$data['adminList'] = [];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ The Admin List Was Cleard!**", 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ The Admin List is Empty!**", 'parse_mode' => 'markdown' ]);}}
//==================== Echo Mode =====================
if(preg_match('/^\.AddEcho ?(.*)?$/i', $text, $Match)){
if(isset($replyToid) or isset($Match[1])){
$UseriD = isset($Match[1]) ? yield $this->getFullInfo($Match[1])['User']['id'] : $replyUseriD;
$Name = yield $this->getFullInfo($UseriD)['User']['first_name'];
if (!in_array($UseriD, $data['EchoList'])) {
$data['EchoList'][] = $UseriD;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Echo Mode Has Been Actived For **[$Name](mention:$UseriD)** !**", 'parse_mode' => 'Markdown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Name](mention:$UseriD)** Alredy Added To Echo List!**", 'parse_mode' => 'markdown' ]);}
}else{
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To User Or Enter Username or a Numeric ID!**", 'parse_mode' => 'markdown' ]);}}
//==================== Echo Mode =====================
if(preg_match('/^\.DelEcho ?(.*)?$/i', $text, $Match)){
if(isset($replyToid) or isset($Match[1])){
$UseriD = isset($Match[1]) ? yield $this->getFullInfo($Match[1])['User']['id'] : $replyUseriD;
$Name = yield $this->getFullInfo($UseriD)['User']['first_name'];
if (in_array($UseriD, $data['EchoList'])) {
$Key = array_search($UseriD, $data['EchoList']);
unset($data['EchoList'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Echo Mode Has Been DeActived For **[$Name](mention:$UseriD)** !**", 'parse_mode' => 'Markdown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Name](mention:$UseriD)** is Not The Echo List!**", 'parse_mode' => 'markdown' ]);}
}else{
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To User Or Enter Username or a Numeric ID!**", 'parse_mode' => 'markdown' ]);}}
//==================== Echo List =====================
if(preg_match('/^\.EchoList$/usi', $text)){
if (!empty($data['EchoList'])) {
$List = "**❈ Echo List : **\n\n";
$Conter = 1;
foreach($data['EchoList'] as $Out){
$List .= "**$Conter : **( `$Out` )\n";
$Conter++;}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $List, 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ The Echo List is Empty!**", 'parse_mode' => 'markdown' ]);}}
//==================== Clean Echo List =====================
if(preg_match('/^\.CleanEchoList$/usi', $text)){
if (!empty($data['adminList'])) {
$data['EchoList'] = [];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ The Echo List Was Cleard!**", 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ The Echo List is Empty!**", 'parse_mode' => 'markdown' ]);}}
//====================Add Black =====================
if(preg_match('/^\.AddBlack ?(.*)?$/usi', $text)){
if(isset($replyToid) or isset($Match[1])){
$UseriD = isset($Match[1]) ? yield $this->getFullInfo($Match[1])['User']['id'] : $replyUseriD;
$Name = yield $this->getFullInfo($UseriD)['User']['first_name'];
if (!in_array($UseriD, $data['BlackList'])) {
$data['BlackList'][] = $UseriD;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ User **[$Name](mention:$UseriD)** Added To Black List!**", 'parse_mode' => 'Markdown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Name](mention:$UseriD)** Alredy Added To Black List!**", 'parse_mode' => 'markdown' ]);}
}else{
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To User Or Enter Username or a Numeric ID!**", 'parse_mode' => 'markdown' ]);}}
//====================Del Black =====================
if(preg_match('/^\.DelBlack ?(.*)?$/usi', $text)){
if(isset($replyToid) or isset($Match[1])){
$UseriD = isset($Match[1]) ? yield $this->getFullInfo($Match[1])['User']['id'] : $replyUseriD;
$Name = yield $this->getFullInfo($UseriD)['User']['first_name'];
if (in_array($UseriD, $data['BlackList'])) {
$Key = array_search($UseriD, $data['BlackList']);
unset($data['BlackList'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ User **[$Name](mention:$UseriD)** Deleted On Black List!**", 'parse_mode' => 'Markdown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Name](mention:$UseriD)** is Not The Black List!**", 'parse_mode' => 'markdown' ]);}
}else{
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To User Or Enter Username or a Numeric ID!**", 'parse_mode' => 'markdown' ]);}}
//==================== Black List =====================
if(preg_match('/^\.BlackList$/usi', $text)){
if (!empty($data['BlackList'])) {
$List = "**❈ Black List : **\n\n";
$Conter = 1;
foreach($data['BlackList'] as $Out){
$List .= "**$Conter : **( `$Out` )\n";
$Conter++;}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $List, 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ The Black List is Empty!**", 'parse_mode' => 'markdown' ]);}}
//==================== Clean Black List =====================
if(preg_match('/^\.CleanBlackList$/usi', $text)){
if (!empty($data['BlackList'])) {
$data['BlackList'] = [];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ The Black List Was Cleard!**", 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ The Black List is Empty!**", 'parse_mode' => 'markdown' ]);}}
//==================== New Names =====================
if(preg_match('/^\.NewName (.*)$/usi', $text, $Match)){
$data['Names'][] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This **( `$Match[1]` ) **Added To Name List!**", 'parse_mode' => 'Markdown']);}
//==================== New Bios =====================
if(preg_match('/^\.NewBio (.*)$/usi', $text, $Match)){
$data['Bios'][] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This **( `$Match[1]` ) **Added To Bio List!**", 'parse_mode' => 'Markdown']);}
//==================== Del Name =====================
if(preg_match('/^\.DelName (.*)$/usi', $text, $Match)){
if (in_array($Match[1], $data['Names'])) {
$Key = array_search($Match[1], $data['Names']);
unset($data['Names'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This **( `$Match[1]` ) **Deleted in Name List!**", 'parse_mode' => 'Markdown']);
}else {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This **( `$Match[1]` ) **is Not The Name List!**", 'parse_mode' => 'Markdown']);}}
//==================== Del Bio =====================
if(preg_match('/^\.DelBio (.*)$/usi', $text, $Match)){
if (in_array($Match[1], $data['Bios'])) {
$Key = array_search($Match[1], $data['Bios']);
unset($data['Bios'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This **( `$Match[1]` ) **Deleted in Bio List!**", 'parse_mode' => 'Markdown']);
}else {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This **( `$Match[1]` ) **is Not The Bio List!**", 'parse_mode' => 'Markdown']);}}
//==================== Name List =====================
if(preg_match('/^\.NameList|Names$/usi', $text)){
if (!empty($data['Names'])) {
$List = "**❈ Name List : **\n\n";
$Conter = 1;
foreach($data['Names'] as $Out){
$List .= "**$Conter : **( `$Out` )\n";
$Conter++;}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $List, 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Name List is Empty!**", 'parse_mode' => 'markdown' ]);}}
//==================== Bio List =====================
if(preg_match('/^\.BioList|Bios$/usi', $text)){
if (!empty($data['Bios'])) {
$List = "**❈ Bio List : **\n\n";
$Conter = 1;
foreach($data['Bios'] as $Out){
$List .= "**$Conter : **( `$Out` )\n";
$Conter++;}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $List, 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Bio List is Empty!**", 'parse_mode' => 'markdown' ]);}}
//==================== Clean Names =====================
if(preg_match('/^\.CleanNames$/usi', $text)){
$data['Names'] = [];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This Name List Cleared!**", 'parse_mode' => 'Markdown']);}
//==================== Clean Bios =====================
if(preg_match('/^\.CleanBios$/usi', $text)){
$data['Bios'] = [];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This Bio List Cleared!**", 'parse_mode' => 'Markdown']);}
//==================== Save Font =====================
if(preg_match('/^\.SaveFont$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['document'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['document'];}
yield $this->downloadToFile($Get, "Files/SavedFont.ttf");
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ This File Saved For Font Time!**",'parse_mode'=>"MarkDown"]);}
//==================== New Photo =====================
if(preg_match('/^\.NewPhoto (.*)$/usi', $text , $Match)){
$Result = explode(',' , $Match[1]);
if (count($Result) == 5){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
$New = $data['ProfsCount'] + 1;
$data['ProfsCount'] = $New;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
$NamePhoto = "Photo$New.jpg";
$data['ProfsStats'][$NamePhoto] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['photo'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['photo'];}
yield $this->downloadToFile($Get, "Files/ProFs/$NamePhoto");
yield $this->photos->uploadProfilePhoto(['file' => "Files/ProFs/$NamePhoto"]);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ A New Photo With The Following Settings Was Saved!**\n\n• **Size :** ( `$Result[0]` )\n• **Vertical :** ( `$Result[1]` )\n• **Horizontal :** ( `$Result[2]` )\n• **Rotation :** ( `$Result[3]` )\n• **Color :** ( `$Result[4]` )",'parse_mode'=>"MarkDown"]);}}
//==================== Del Photo =====================
if(preg_match('/^\.DelPhoto (.*)$/usi', $text, $Match)){
unlink("Files/ProFs/$Match[1]");
$Key = array_search($Match[1], $data['ProfsStats']);
unset($data['ProfsStats'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This Photo Named** ( `$Match[1]` ) **Was Deleted!**", 'parse_mode' => 'MarkDown']);}
//==================== Photo List =====================
if(preg_match('/^\.Photolist$/usi', $text)){
$List = "**❈ Photo List : **\n\n";
$Conter = 1;
$directory = "Files/ProFs";
foreach(array_diff(scandir($directory), array('..', '.')) as $Out){
$List .= "**$Conter : **( `$Out` )\n";
$Conter++;
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $List, 'parse_mode' => 'markdown' ]);}}
//==================== Clean Photo List =====================
if(preg_match('/^\.CleanPhotoList$/usi', $text)){
$directory = "Files/ProFs";
foreach(array_diff(scandir($directory), array('..', '.')) as $Out){
unlink("Files/ProFs/$Out");}
$data['ProfsCount'] = "0";
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
$data['ProfsStats'] = [];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Photo List Was Cleard!**", 'parse_mode' => 'markdown' ]);}
//==================== New Text Photo =====================
if(preg_match('/^\.NewTPhoto (.*)$/usi', $text, $Match)){
if (!in_array($Match[1], $data['PhotoTexts'])) {
$data['PhotoTexts'][] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This **( `$Match[1]` ) **Added To Text Photo List!**", 'parse_mode' => 'Markdown']);}
//==================== Del Text Photo =====================
if(preg_match('/^\.DelTPhoto (.*)$/usi', $text, $Match)){
if (in_array($Match[1], $data['PhotoTexts'])) {
$Key = array_search($Match[1], $data['PhotoTexts']);
unset($data['PhotoTexts'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This **( `$Match[1]` ) **Deleted in Text Photo List!**", 'parse_mode' => 'Markdown']);
}else {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This **( `$Match[1]` ) **is Not The Text Photo List!**", 'parse_mode' => 'Markdown']);}}
//==================== Text Photo List =====================
if(preg_match('/^\.TPhotoList$/usi', $text)){
if (!empty($data['PhotoTexts'])) {
$List = "**❈ Text Photo List : **\n\n";
$Conter = 1;
foreach($data['PhotoTexts'] as $Out){
$List .= "**$Conter : **( `$Out` )\n";
$Conter++;}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $List, 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Text Photo List is Empty!**", 'parse_mode' => 'markdown' ]);}}
//==================== Clean Text Photo =====================
if(preg_match('/^\.CleanTPhoto$/usi', $text)){
$data['PhotoTexts'] = [];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This Text Photo List Cleared!**", 'parse_mode' => 'Markdown']);}
//==================== Join Mode =====================
if(preg_match('/^\.Join (On|Off)$/usi', $text, $Match)){
if (preg_match('/On/usi' , $Match[1])){
if (!in_array($peer, $data['Join'])) {
$data['Join'][] = $peer;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Join Mode For This Chat Has Been Actived!**", 'parse_mode' => 'Markdown']);
}else {
if (in_array($peer, $data['Join'])) {
$Key = array_search($peer, $data['Join']);
unset($data['Join'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Join Mode For This Chat Has Been DeActived!**", 'parse_mode' => 'Markdown']);}}
//==================== Welcome Off =====================
if(preg_match('/^\.Welcome off$/usi', $text, $Match)){
if (in_array($peer, $data['Welcome'])) {
$Key = array_search($peer, $data['Welcome']);
unset($data['Welcome'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Welcome Mode For This Chat Has Been DeActived!**", 'parse_mode' => 'Markdown']);}
//==================== SWelCome =====================
if(preg_match('/^\.SWelCome$/usi', $text)){
if (!in_array($peer, $data['Welcome'])) {
$data['Welcome'][] = $peer;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]]);
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]]);}
$List = glob('Files/Welcome*');
foreach ($List as $item) {
unlink($item);}
$Media = $Get['messages'][0]['media'] ?? null;
if ($Media !== null){
$types = ['audio','document','photo','sticker','video','voice','video_note','animation'];
$botAPI_file = yield $this->MTProtoToBotAPI($Media);
foreach ($types as $type) {
if (isset($botAPI_file[$type]) && is_array($botAPI_file[$type])) {
$method = $type;}}
$result['file_type'] = $method;
if ($result['file_type'] == 'photo') {
$item = end($botAPI_file[$method]);
$result['file_size'] = $item['file_size'];
if (isset($item['file_name'])) {
$result['file_name'] = $item['file_name'];
$result['file_id'] = $item['file_id'];}
}else {
if (isset($botAPI_file[$method]['file_name'])) {
$result['file_name'] = $botAPI_file[$method]['file_name'];}
if (isset($botAPI_file[$method]['file_size'])) {
$result['file_size'] = $botAPI_file[$method]['file_size'];}
if (isset($botAPI_file[$method]['mime_type'])) {
$result['mime_type'] = $botAPI_file[$method]['mime_type'];}
$result['file_id'] = $botAPI_file[$method]['file_id'];}
if (!isset($result['mime_type'])) {
$result['mime_type'] = 'application/octet-stream';}
if (!isset($result['file_name'])) {
$result['file_name'] = $result['file_id'].($method === 'sticker' ? '.webp' : '');}
$iD = $result['file_id'];
file_put_contents("Files/WelcomeMedia$peer.txt", $iD);}
$Msg = $Get['messages'][0]['message'] ?? null;
if ($Msg !== null){
file_put_contents("Files/WelcomeNote$peer.txt","$Msg");}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message'=> "**❈ WelCome Note For This Chat Saved!**",'parse_mode' => 'markdown']);}
//==================== GetWelcome =====================
if(preg_match('/^\.GetWelcome$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
if (is_file("Files/WelcomeMedia$peer.txt") or is_file("Files/WelcomeNote$peer.txt")){
if (is_file("Files/WelcomeMedia$peer.txt") && is_file("Files/WelcomeNote$peer.txt")){
$Media = file_get_contents("Files/WelcomeMedia$peer.txt");
$List = file_get_contents("Files/WelcomeNote$peer.txt");
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ WelCome Note in This Chat :**",'parse_mode'=>"MarkDown"]);
yield $this->messages->sendMedia(['peer' => $peer,'reply_to_msg_id' => $msg_id,'media' => $Media, 'message' => $List, 'parse_mode' => 'MarkDown']);
}elseif (is_file("Files/WelcomeMedia$peer.txt")){
$Media = file_get_contents("Files/WelcomeMedia$peer.txt");
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ WelCome Note in This Chat :**",'parse_mode'=>"MarkDown"]);
yield $this->messages->sendMedia(['peer' => $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);
}elseif (is_file("Files/WelcomeNote$peer.txt") ){
$List = file_get_contents("Files/WelcomeNote$peer.txt");
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ WelCome Note in This Chat :**",'parse_mode'=>"MarkDown"]);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $List, 'parse_mode' => 'MarkDown','reply_to_msg_id' => $msg_id]);}
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ WelCome Note For This Chat Not Saved!**",'parse_mode'=>"MarkDown"]);}}
//==================== GoodBy Off =====================
if(preg_match('/^\.GoodBy off$/usi', $text, $Match)){
if (in_array($peer, $data['GoodBy'])) {
$Key = array_search($peer, $data['GoodBy']);
unset($data['GoodBy'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ GoodBy Mode For This Chat Has Been DeActived!**", 'parse_mode' => 'Markdown']);}
//==================== SGoodBy =====================
if(preg_match('/^\.SGoodBy$/usi', $text)){
if (!in_array($peer, $data['GoodBy'])) {
$data['GoodBy'][] = $peer;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]]);
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]]);}
$List = glob('Files/GoodBy*');
foreach ($List as $item) {
unlink($item);}
$Media = $Get['messages'][0]['media'] ?? null;
if ($Media !== null){
$types = ['audio','document','photo','sticker','video','voice','video_note','animation'];
$botAPI_file = yield $this->MTProtoToBotAPI($Media);
foreach ($types as $type) {
if (isset($botAPI_file[$type]) && is_array($botAPI_file[$type])) {
$method = $type;}}
$result['file_type'] = $method;
if ($result['file_type'] == 'photo') {
$item = end($botAPI_file[$method]);
$result['file_size'] = $item['file_size'];
if (isset($item['file_name'])) {
$result['file_name'] = $item['file_name'];
$result['file_id'] = $item['file_id'];}
}else {
if (isset($botAPI_file[$method]['file_name'])) {
$result['file_name'] = $botAPI_file[$method]['file_name'];}
if (isset($botAPI_file[$method]['file_size'])) {
$result['file_size'] = $botAPI_file[$method]['file_size'];}
if (isset($botAPI_file[$method]['mime_type'])) {
$result['mime_type'] = $botAPI_file[$method]['mime_type'];}
$result['file_id'] = $botAPI_file[$method]['file_id'];}
if (!isset($result['mime_type'])) {
$result['mime_type'] = 'application/octet-stream';}
if (!isset($result['file_name'])) {
$result['file_name'] = $result['file_id'].($method === 'sticker' ? '.webp' : '');}
$iD = $result['file_id'];
file_put_contents("Files/GoodByMedia$peer.txt", $iD);}
$Msg = $Get['messages'][0]['message'] ?? null;
if ($Msg !== null){
file_put_contents("Files/GoodByNote$peer.txt","$Msg");}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message'=> "**❈ GoodBy Note For This Chat Saved!**",'parse_mode' => 'markdown']);}
//==================== GetGoodBy =====================
if(preg_match('/^\.GetGoodBy$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
if (is_file("Files/GoodByMedia$peer.txt") or is_file("Files/GoodByNote$peer.txt")){
if (is_file("Files/GoodByMedia$peer.txt") && is_file("Files/GoodByNote$peer.txt")){
$Media = file_get_contents("Files/GoodByMedia$peer.txt");
$List = file_get_contents("Files/GoodByNote$peer.txt");
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ GoodBy Note in This Chat :**",'parse_mode'=>"MarkDown"]);
yield $this->messages->sendMedia(['peer' => $peer,'reply_to_msg_id' => $msg_id,'media' => $Media, 'message' => $List, 'parse_mode' => 'MarkDown']);
}elseif (is_file("Files/GoodByMedia$peer.txt")){
$Media = file_get_contents("Files/GoodByMedia$peer.txt");
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ GoodBy Note in This Chat :**",'parse_mode'=>"MarkDown"]);
yield $this->messages->sendMedia(['peer' => $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);
}elseif (is_file("Files/GoodByNote$peer.txt") ){
$List = file_get_contents("Files/GoodByNote$peer.txt");
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ GoodBy Note in This Chat :**",'parse_mode'=>"MarkDown"]);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $List, 'parse_mode' => 'MarkDown','reply_to_msg_id' => $msg_id]);}
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ GoodBy Note For This Chat Not Saved!**",'parse_mode'=>"MarkDown"]);}}
//==================== Fcom Mode =====================
if(preg_match('/^\.Fcom off$/usi', $text, $Match)){
if (in_array($peer, $data['FirstComment'])) {
$Key = array_search($peer, $data['FirstComment']);
unset($data['FirstComment'][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ First Comment For This Chat Has Been DeActived!**", 'parse_mode' => 'Markdown']);}
//==================== SFcom =====================
if(preg_match('/^\.SFCom$/usi', $text)){
if (!in_array($peer, $data['FirstComment'])) {
$data['FirstComment'][] = $peer;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]]);
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]]);}
$List = glob('Files/First*');
foreach ($List as $item) {
unlink($item);}
$Media = $Get['messages'][0]['media'] ?? null;
if ($Media !== null){
$types = ['audio','document','photo','sticker','video','voice','video_note','animation'];
$botAPI_file = yield $this->MTProtoToBotAPI($Media);
foreach ($types as $type) {
if (isset($botAPI_file[$type]) && is_array($botAPI_file[$type])) {
$method = $type;}}
$result['file_type'] = $method;
if ($result['file_type'] == 'photo') {
$item = end($botAPI_file[$method]);
$result['file_size'] = $item['file_size'];
if (isset($item['file_name'])) {
$result['file_name'] = $item['file_name'];
$result['file_id'] = $item['file_id'];}
}else {
if (isset($botAPI_file[$method]['file_name'])) {
$result['file_name'] = $botAPI_file[$method]['file_name'];}
if (isset($botAPI_file[$method]['file_size'])) {
$result['file_size'] = $botAPI_file[$method]['file_size'];}
if (isset($botAPI_file[$method]['mime_type'])) {
$result['mime_type'] = $botAPI_file[$method]['mime_type'];}
$result['file_id'] = $botAPI_file[$method]['file_id'];}
if (!isset($result['mime_type'])) {
$result['mime_type'] = 'application/octet-stream';}
if (!isset($result['file_name'])) {
$result['file_name'] = $result['file_id'].($method === 'sticker' ? '.webp' : '');}
$iD = $result['file_id'];
file_put_contents("Files/FirstMedia.txt", $iD);}
$Msg = $Get['messages'][0]['message'] ?? null;
if ($Msg !== null){
file_put_contents("Files/FirstNote.txt","$Msg");}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message'=> "**❈ First Comment Note For This Chat Saved!**",'parse_mode' => 'markdown']);}
//==================== Get Fcom =====================
if(preg_match('/^\.GetFcom$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
if (is_file("Files/FirstMedia.txt") or is_file("Files/FirstNote.txt")){
if (is_file("Files/FirstMedia.txt") && is_file("Files/FirstNote.txt")){
$Media = file_get_contents("Files/FirstMedia.txt");
$List = file_get_contents("Files/FirstNote.txt");
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ First Comment Note :**",'parse_mode'=>"MarkDown"]);
yield $this->messages->sendMedia(['peer' => $peer,'reply_to_msg_id' => $msg_id,'media' => $Media, 'message' => $List, 'parse_mode' => 'MarkDown']);
}elseif (is_file("Files/FirstMedia.txt")){
$Media = file_get_contents("Files/FirstMedia.txt");
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ First Comment Note :**",'parse_mode'=>"MarkDown"]);
yield $this->messages->sendMedia(['peer' => $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);
}elseif (is_file("Files/FirstNote.txt") ){
$List = file_get_contents("Files/FirstNote.txt");
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ First Comment Note:**",'parse_mode'=>"MarkDown"]);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $List, 'parse_mode' => 'MarkDown','reply_to_msg_id' => $msg_id]);}
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ First Comment Note Not Saved!**",'parse_mode'=>"MarkDown"]);}}
//==================== Mono =====================
if($data['Mono'] == 'on'){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`$text`",'parse_mode'=>'MarkDown']);}
//==================== Bold =====================
if($data['Bold'] == 'on'){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**$text**",'parse_mode'=>'markdown']);}
//==================== Italic =====================
if($data['Italic'] == 'on'){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "__$text__",'parse_mode'=>'markdown']);}
//==================== Underline =====================
if($data['Underline'] == 'on'){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "<u>$text</u>",'parse_mode'=>'HTML']);}
//==================== Strick =====================
if($data['Strick'] == 'on'){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "~~$text~~",'parse_mode'=>'markdown']);}
//==================== Emoji =====================
if($data['Emoji'] == 'on'){
$Emoji1 = explode('-' , $data['Emojies'])[0];
$Emoji2 = explode('-' , $data['Emojies'])[1];
if ($type == 'supergroup' or $type == 'channel') {
$Msg = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]])['messages'][0];
} else {
$Msg = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$msg_id]])['messages'][0];}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $Emoji1 . $Msg['message'] . $Emoji2, 'entities' => $Msg['entities'] ?? [], 'parse_mode' => 'MarkDown']);}
//==================== User ID =====================
if(preg_match('/^\.iD$/usi', $text)){
if (isset($replyToid)) {
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User ID : **( `$Get` )", 'parse_mode' => 'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Chat ID : **( `$peer` )", 'parse_mode' => 'MarkDown']);}}
//==================== BanAll =====================
if(preg_match('/^\.BanAll$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$channelParticipantsRecent = ['_' => 'channelParticipantsRecent'];
$channelParticipantsAdmins= ['_' => 'channelParticipantsAdmins'];
$GetAdmins = yield $this->channels->getParticipants(['channel' => $peer, 'filter' => $channelParticipantsAdmins, 'offset' => 0, 'limit' => 100]);
foreach ($GetAdmins['participants'] as $Admin) {
$Admins[] = $Admin['user_id'];}
$Participants = yield $this->channels->getParticipants(['channel' => $peer, 'filter' => $channelParticipantsRecent, 'offset' => 0, 'limit' => 100]);
for ($i = 0; $i <= count($Participants['users']) ; $i++) {
$UseriD = $Participants['users'][$i]['id'];
if ($UseriD != $Sudo && !in_array($UseriD, $Admins)) {
$channelBannedRights = ['_' => 'chatBannedRights', 'view_Messages' => true, 'send_Messages' => true, 'send_media' => true, 'send_stickers' => true, 'send_gifs' => true, 'send_games' => true, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_Messages' => true, 'until_date' => 999999999];
yield $this->channels->editBanned(['channel' => $peer,'user_id' => $UseriD,'banned_rights' => $channelBannedRights]);}}
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "❈ ( `$i` ) **Members Was Deleted!**", 'parse_mode' => 'Markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Clean Delete Accounts =====================
if(preg_match('/^\.BanDelAcs$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$channelParticipantsRecent = ['_' => 'channelParticipantsRecent'];
$Participants = yield $this->channels->getParticipants(['channel' => $peer, 'filter' => $channelParticipantsRecent, 'offset' => 0, 'limit' => 200]);
foreach($Participants['users'] as $User){
if($User['deleted'] === true){
$chatBannedRights = ['_' => 'chatBannedRights', 'view_Messages' => true, 'send_Messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => false, 'embed_links' => false, 'until_date' => 99999999];
yield $this->channels->editBanned(['channel'=> $peer,'user_id'=> $User['id'],'banned_rights' => $chatBannedRights]);}}
$i = count($User);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "❈ ( `$i` ) **Delete Accounts Was Deleted!**", 'parse_mode' => 'Markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== BanBots =====================
if(preg_match('/^\.BanBots$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$channelParticipantsRecent = ['_' => 'channelParticipantsRecent'];
$Participants = yield $this->channels->getParticipants(['channel' => $peer, 'filter' => $channelParticipantsRecent, 'offset' => 0, 'limit' => 200]);
foreach($Participants['users'] as $User){
if($User['bot'] === true){
$channelBannedRights = ['_' => 'chatBannedRights', 'view_Messages' => true, 'send_Messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_Messages' => true, 'until_date' => 999999999999];
yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $Fonid, 'banned_rights' => $channelBannedRights,]);}}
$i = count($User);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "❈ ( `$i` ) **Bot Was Deleted!**", 'parse_mode' => 'Markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Del Medias =====================
if(preg_match('/^\.Del (\w+)$/usi', $text , $Match)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
if(preg_match('/Music|Musics|Video|Videos|File|Files|Photo|Photos|Contact|Contacts|Gif|Gifs|Voice|Voices|Pin|Pins|Url|Urls|RVideo|RVideos|RVoice|RVoices/usi', $Match[1])){
$Req = ['/Music|Musics/usi' , '/Video|Videos/usi' , '/File|Files/usi' , '/Photo|Photos/usi' , '/Contact|Contacts/usi' , '/Gif|Gifs/usi' , '/Voice|Voices/usi' , '/Pin|Pins/usi' , '/Url|Urls/usi' , '/RVideo|RVideos/usi' , '/RVoice|RVoices/usi'];
$Parametr = ['Music' , 'Video' , 'Document' , 'Photos' , 'Contacts' , 'Gif' , 'Voice' , 'Pinned' , 'Url' , 'RoundVideo' , 'RoundVoice'];
$Mode = preg_replace($Req , $Parametr , $Match[1]);
$i = 0;
$Res = yield $this->messages->search(['peer' => $peer, 'q' => '', 'filter' => ['_' => "inputMessagesFilter$Mode"], 'min_date' => -1, 'max_date' => -1, 'offset_id' => $msg_id, 'add_offset' => 0, 'limit' => 100, 'max_id' => $msg_id, 'min_id' => 0,]);
foreach ($Res['messages'] as $Value){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$Value['id']]]);
$i++;
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$Value['id']]]);
$i++;}}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "❈ ( `$i` ) **$Mode Messages Deleted On This Chat!**", 'parse_mode' => 'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Filter Not Found!**", 'parse_mode' => 'MarkDown']);}}
//==================== Pin Message =====================
if(preg_match('/^\.Pin$/usi', $text)){
if (isset($replyToid)) {
if ($type == 'supergroup' or $type == 'channel') {
$Get1 = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['id'];
} else {
$Get1 = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['id'];}
yield $this->messages->updatePinnedMessage(['peer' => $peer, 'id' =>$Get1]);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Message Pinned!**", 'parse_mode' => 'markdown']);
}else{
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To Message!**", 'parse_mode' => 'markdown']);}}
//==================== Pin Message =====================
if(preg_match('/^\.UnPin$/usi', $text)){
yield $this->messages->unpinAllMessages(['peer' => $peer]);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Messages UnPinned!**", 'parse_mode' => 'markdown']);}
//==================== Cleaner =====================
if(preg_match('/^\.LeFtAll$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
$i = 0;
foreach (yield $this->getDialogs() as $dialog){
$i++;
$Left = yield $this->getInfo($dialog)['bot_api_id'];
yield $this->channels->leaveChannel(['channel' => $Left]);}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Left Of All Chats!**\n**❈ Count : **( `$i` )", 'parse_mode' => 'MarkDown']);}
//==================== Cleaner =====================
if(preg_match('/^\.LeFtGps$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
$i = 0;
foreach (yield $this->getDialogs() as $dialog){
$type =yield $this->getInfo($dialog)['type']; 
if($type == 'supergroup' or $type = 'chat'){
$i++;
$Left = yield $this->getInfo($dialog)['bot_api_id'];
yield $this->channels->leaveChannel(['channel' => $Left]);}}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Left Of Groups!**\n**❈ Count : **( `$i` )", 'parse_mode' => 'MarkDown']);}
//==================== Cleaner =====================
if(preg_match('/^\.LeFtChs$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
$i = 0;
foreach (yield $this->getDialogs() as $dialog){
$type =yield $this->getInfo($dialog)['type']; 
if($type == 'channel'){
$i++;
$Left = yield $this->getInfo($dialog)['bot_api_id'];
yield $this->channels->leaveChannel(['channel' => $Left]);}}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Left Of Channels!**\n**❈ Count : **( `$i` )", 'parse_mode' => 'MarkDown']);}
//==================== Phones =====================
if (preg_match('/^\.Phones$/usi', $text)) {
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$List = [];
$List = "**❈ Users Number in This Chat :**\n\n";
$Get = yield $this->getPwrChat($peer);
foreach($Get['participants'] as $Main){
if ($Main['user']['id'] != $Sudo){
$phone = $Main['user']['phone'] ?? Null;
if ($phone !== null){
$Name = $Main['user']['first_name'];
$phones = $phone;
$List[] = "• $Name : ( `+$phones` )\n";}}}
foreach($List as $up){
$List .= $up;
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $List, 'parse_mode' => 'markdown' ]);}}
//==================== Contact List =====================
if (preg_match('/^\.ContactList$/usi', $text)) {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
foreach ( yield $this->contacts->getContacts()['users'] as $Contact){
$Name = $Contact['first_name'];
$iD = $Contact['id'];
$phone = "+" . $contact['phone'] ?? "---";
$List[] = "• ( [$Name](mention:$iD) ) - ( `$iD` ) - ( `$phone` )\n";}
foreach ($List as $Con) {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Your Contacts :**\n\n$Con", 'parse_mode' => 'markdown']);}}
//==================== Tag =====================
if (preg_match('/^\.Tag$/usi', $text)) {
$Start = microtime(true);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$Result = [];
$offset = 0;
$Mentioned = 0;
$peer_count = yield $this->getFullInfo($peer)['full']['participants_count'];
$peer_counta = $peer_count - 1;
while (true) {
$participants = yield $this->channels->getParticipants(['channel' => $peer,'filter' => ['_' => 'channelParticipantsRecent'],'offset' => $offset,'limit' => 200]);
foreach ($participants['users'] as $Member) {
if (!$Member['deleted'] && !$Member['bot'] && $Member['id'] != $Sudo) {
$Memf = $Member['first_name'];
$Memid = $Member['id'];
$Result [] = "• [{$Memf}](mention:{$Memid})\n";
$Mentioned++;}
if ($Mentioned == $peer_counta or $Mentioned > $peer_counta) {
break;}}
$count = $participants['count'];
$offset += $count;
if ($count < 200) {
break;}}
foreach (array_chunk($Result, 5) as $part => $MentionGroup) {
$part = $part + 1;
$Tag= "**❈ Tag List ( Part = $part )**\n\n";
$Tag .= implode("" , $MentionGroup);
yield $this->messages->sendMessage(['peer' => $peer,'message' => $Tag,'parse_mode' => 'Markdown']);}
$end = microtime(true);
$Sec = ConvertTime($end - $Start);
$Res = count($Result);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Tag Members Complete!**\n\n**❈ Members Count :** ( `$Res` )\n**❈ Message Count :** ( `$count` )\n**❈ Time Tag :** ( `$Sec` )", 'parse_mode' => 'markdown']);}
//==================== Tag =====================
if (preg_match('/^\.Tag (.*)$/usi', $text, $Match)) {
$Start = microtime(true);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$Result = [];
$offset = 0;
$Mentioned = 0;
while (true) {
$participants = yield $this->channels->getParticipants(['channel' => $peer,'filter' => ['_' => 'channelParticipantsRecent'],'offset' => $offset,'limit' => 200]);
foreach ($participants['users'] as $Member) {
if (!$Member['deleted'] && !$Member['bot'] && $Member['id'] != $Sudo) {
$Memf = $Member['first_name'];
$Memid = $Member['id'];
$Result [] = "• [{$Memf}](mention:{$Memid})\n";
$Mentioned++;}
if ($Mentioned == $Match[1] or $Mentioned > $Match[1]) {
break;}}
$count = $participants['count'];
$offset += $count;
if ($count < 200) {
break;}}
foreach (array_chunk($Result, 5) as $part => $MentionGroup) {
$part = $part + 1;
$Tag= "**❈ Tag List ( Part = $part )**\n\n";
$Tag .= implode("" , $MentionGroup);
yield $this->messages->sendMessage(['peer' => $peer,'message' => $Tag,'parse_mode' => 'Markdown']);}
$end = microtime(true);
$Sec = ConvertTime($end - $Start);
$Res = count($Result);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Tag Members Complete!**\n\n**❈ Members Count :** ( `$Res` )\n**❈ Message Count :** ( `$count` )\n**❈ Time Tag :** ( `$Sec` )", 'parse_mode' => 'markdown']);}
//==================== Tag =====================
if (preg_match('/^\.TagAdmin$/usi', $text)) {
$Start = microtime(true);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$Result = [];
$offset = 0;
$Mentioned = 0;
$peer_count = yield $this->getFullInfo($peer)['full']['participants_count'];
$peer_counta = $peer_count - 1;
while (true) {
$participants = yield $this->channels->getParticipants(['channel' => $peer,'filter' => ['_' => 'channelParticipantsAdmins'],'offset' => $offset,'limit' => 200]);
foreach ($participants['users'] as $Member) {
if (!$Member['deleted'] && !$Member['bot'] && $Member['id'] != $Sudo) {
$Memf = $Member['first_name'];
$Memid = $Member['id'];
$Result [] = "• [{$Memf}](mention:{$Memid})\n";
$Mentioned++;}
if ($Mentioned == $peer_counta or $Mentioned > $peer_counta) {
break;}}
$count = $participants['count'];
$offset += $count;
if ($count < 200) {
break;}}
foreach (array_chunk($Result, 5) as $part => $MentionGroup) {
$part = $part + 1;
$Tag= "**❈ Tag Admin List ( Part = $part )**\n\n";
$Tag .= implode("" , $MentionGroup);
yield $this->messages->sendMessage(['peer' => $peer,'message' => $Tag,'parse_mode' => 'Markdown']);}
$end = microtime(true);
$Sec = ConvertTime($end - $Start);
$Res = count($Result);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Tag Admins Complete!**\n\n**❈ Members Count :** ( `$Res` )\n**❈ Message Count :** ( `$count` )\n**❈ Time Tag :** ( `$Sec` )", 'parse_mode' => 'markdown']);}
//==================== Tag =====================
if (preg_match('/^\.TagAdmin (.*)$/usi', $text, $Match)) {
$Start = microtime(true);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$Result = [];
$offset = 0;
$Mentioned = 0;
while (true) {
$participants = yield $this->channels->getParticipants(['channel' => $peer,'filter' => ['_' => 'channelParticipantsAdmins'],'offset' => $offset,'limit' => 200]);
foreach ($participants['users'] as $Member) {
if (!$Member['deleted'] && !$Member['bot'] && $Member['id'] != $Sudo) {
$Memf = $Member['first_name'];
$Memid = $Member['id'];
$Result [] = "• [{$Memf}](mention:{$Memid})\n";
$Mentioned++;}
if ($Mentioned == $Match[1] or $Mentioned > $Match[1]) {
break;}}
$count = $participants['count'];
$offset += $count;
if ($count < 200) {
break;}}
foreach (array_chunk($Result, 5) as $part => $MentionGroup) {
$part = $part + 1;
$Tag= "**❈ Tag Admin List ( Part = $part )**\n\n";
$Tag .= implode("" , $MentionGroup);
yield $this->messages->sendMessage(['peer' => $peer,'message' => $Tag,'parse_mode' => 'Markdown']);}
$end = microtime(true);
$Sec = ConvertTime($end - $Start);
$Res = count($Result);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Tag Admins Complete!**\n\n**❈ Members Count :** ( `$Res` )\n**❈ Message Count :** ( `$count` )\n**❈ Time Tag :** ( `$Sec` )", 'parse_mode' => 'markdown']);}
//==================== Mute =====================
if (isset($replyToid)) {
if(preg_match('/^\.Mute$/usi', $text)){
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
$Fnm = yield $this->getFullInfo($Get)['User']['first_name'];
$offset = 0;
while (true) {
$Part = yield $this->channels->getParticipants(['channel' => $peer,'filter' => ['_' => 'channelParticipantsBanned'],'offset' => $offset,'limit' => 200]);
foreach ($Part['users'] as $Member) {
$offset += $Part['count'];
if ($Get != $Member['id']) {
$Mute = ['_' => 'chatBannedRights', 'send_Messages' => true, 'send_media' => true, 'send_stickers' => true, 'send_gifs' => true, 'send_games' => true, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_Messages' => true, 'until_date' => 999999999999];
yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $Get, 'banned_rights' => $Mute]);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Fnm](mention:$Get) **Muted!**", 'parse_mode' => 'Markdown']);
 }else {
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Fnm](mention:$Get) **Already Muted!**", 'parse_mode' => 'Markdown']);}}}}
}elseif (preg_match('/^\.Mute (.*)$/usi', $text,$Match)){
$Info = yield $this->getFullInfo($Match[1]);
$UserInfo = $Info['User'];
$Get = $UserInfo['id'];
$Fnm = $UserInfo['first_name'];
$participants = yield $this->channels->getParticipants(['channel' => $peer,'filter' => ['_' => 'channelParticipantsKicked'],'offset' => 0,'limit' => 200]);
foreach ($participants['users'] as $Member) {
$Memid = $Member['id'];}
if ($Get != $Memid) {
$Mute = ['_' => 'chatBannedRights', 'send_Messages' => true, 'send_media' => true, 'send_stickers' => true, 'send_gifs' => true, 'send_games' => true, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_Messages' => true, 'until_date' => 999999999999];
yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $Get, 'banned_rights' => $Mute, ]);
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Fnm](mention:$Get) **Muted!**", 'parse_mode' => 'Markdown']);
 }else {
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Fnm](mention:$Get) **Already Muted!**", 'parse_mode' => 'Markdown']);}}
//==================== UnMute =====================
if (isset($replyToid)) {
if(preg_match('/^\.Unmute$/usi', $text)){
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
$Fnm = yield $this->getFullInfo($Get)['User']['first_name'];
 $UnMute = ['_' => 'chatBannedRights','send_Messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => false, 'pin_Messages' => true, 'until_date' => 9999];
 yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $Get, 'banned_rights' => $UnMute]);
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**?? User** [$Fnm](mention:$Get) **Unmuted!**", 'parse_mode' => 'Markdown']);}
}elseif (preg_match('/^\.Unmute (.*)$/usi', $text,$Match)){
$Info = yield $this->getFullInfo($Match[1]);
$UserInfo = $Info['User'];
$Get = $UserInfo['id'];
$Fnm = $UserInfo['first_name'];
 $UnMute = ['_' => 'chatBannedRights','send_Messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => false, 'pin_Messages' => true, 'until_date' => 9999];
 yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $Get, 'banned_rights' => $UnMute]);
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Fnm](mention:$Get) **Unmuted!**", 'parse_mode' => 'Markdown']);}
//==================== Ban =====================
if (isset($replyToid)) {
if(preg_match('/^\.ban$/usi', $text)){
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
 $Info = yield $this->getFullInfo($Get);
$UserInfo = $Info['User'];
$Fnm = $UserInfo['first_name'];
 $ban = ['_' => 'chatBannedRights', 'view_Messages' => true, 'send_Messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_Messages' => true, 'until_date' => 999999999999];
 yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $Get, 'banned_rights' => $ban, ]);
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Fnm](mention:$Get) **Baned!**", 'parse_mode' => 'Markdown']);}
}elseif (preg_match('/^\.ban (.*)$/usi', $text,$Match)){
$Info = yield $this->getFullInfo($Match[1]);
$UserInfo = $Info['User'];
$Get = $UserInfo['id'];
$Fnm = $UserInfo['first_name'];
 $ban = ['_' => 'chatBannedRights', 'view_Messages' => true, 'send_Messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_Messages' => true, 'until_date' => 999999999999];
 yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $Get, 'banned_rights' => $ban, ]);
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Fnm](mention:$Get) **Baned!**", 'parse_mode' => 'Markdown']);}
if (isset($replyToid)) {
//==================== Unban =====================
if(preg_match('/^\.unban$/usi', $text)){
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
 $Info = yield $this->getFullInfo($Get);
$UserInfo = $Info['User'];
$Fnm = $UserInfo['first_name'];
$unban = ['_' => 'chatBannedRights', 'view_Messages' => false, 'send_Messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => false, 'pin_Messages' => true, 'until_date' => 999999999999];
 yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $Get, 'banned_rights' => $unban, ]);
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Fnm](mention:$Get) **Unbaned!**", 'parse_mode' => 'Markdown']);}
}elseif (preg_match('/^\.unban (.*)$/usi', $text,$Match)){
$Info = yield $this->getFullInfo($Match[1]);
$UserInfo = $Info['User'];
$Get = $UserInfo['id'];
$Fnm = $UserInfo['first_name'];
$unban = ['_' => 'chatBannedRights', 'view_Messages' => false, 'send_Messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => false, 'pin_Messages' => true, 'until_date' => 999999999999];
 yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $Get, 'banned_rights' => $unban, ]);
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User** [$Fnm](mention:$Get) **Unbaned!**", 'parse_mode' => 'Markdown']);}
//==================== Clone =====================
if(preg_match('/^\.Clone$/usi', $text)){
if (isset($replyToid)) {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
$Info = yield $this->getFullInfo($Get);
$UserInfo = $Info['User'];
$Name = $UserInfo['first_name'];
$Last = $UserInfo['last_name'] ?? Null;
$Bio = $Info['full']['about'] ?? Null;
$phots = yield $this->photos->getUserPhotos(['user_id' => $Get, 'offset' => 0, 'max_id' => 0, 'limit' => 1]);
$photo = $photos['photos']['0'] ?? Null;
if ($photo !== null){
yield $this->downloadToFile($photo, 'Files/ClonePic.jpg');
yield $this->photos->updateProfilePhoto(['remove']);
yield $this->photos->uploadProfilePhoto(['file' => 'Files/ClonePic.jpg']);}
yield $this->account->updateProfile(['first_name' => $Name , 'last_name' => $Last , 'about' => $Bio]);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ SuccesFuly Cloned!**\n**• iM The Soul oF** `$Name` 😏", 'parse_mode' => 'markdown']);
unlink("Files/ClonePic.jpg");
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To User!**", 'parse_mode' => 'markdown']);}}
//==================== Backup =====================
if(preg_match('/^\.BackUp$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$Info = yield $this->getFullInfo($Sudo);
$UserInfo = $Info['User'];
$Name = $UserInfo['first_name'];
$Last = $UserInfo['last_name'] ?? Null;
$Bio = $Info['full']['about'] ?? Null;
file_put_contents("Files/NameBack.txt", $Name);
file_put_contents("Files/LastBack.txt", $Last);
file_put_contents("Files/BioBack.txt", $Bio);
$photos = yield $this->photos->getUserPhotos(['user_id' => $Sudo, 'offset' => 0, 'max_id' => 0, 'limit' => 1]);
$photo = $photos['photos']['0'] ?? Null;
if ($photo !== null){
yield $this->downloadToFile($phots, 'Files/PicBackup.jpg');}
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ The Backup From The Account Was Successful!**", 'parse_mode' => 'markdown']);}
//==================== Restore =====================
if(preg_match('/^\.Restore$/usi', $text)){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
if (is_file('Files/NameBack.txt')){
yield $this->account->updateProfile(['first_name' => file_get_contents("Files/NameBack.txt")]);}
if (is_file('Files/LastBack.txt')){
yield $this->account->updateProfile(['last_name' => file_get_contents("Files/LastBack.txt")]);}
if (is_file('Files/BioBack.txt')){
yield $this->account->updateProfile(['about' => file_get_contents("Files/BioBack.txt")]);}
if (is_file('Files/PicBackup.jpg')){
yield $this->photos->updateProfilePhoto(['remove']);
yield $this->photos->uploadProfilePhoto(['file' => 'Files/PicBackup.jpg']);}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Returned To The initial State Of Accounts!**", 'parse_mode' => 'markdown']);}
//==================== Get Profiles =====================
if(preg_match('/^\.GetPic (\d+)$/usi', $text,$Match)){
$UserInfo = $Match[1] - 1;
if (isset($replyToid)) {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
$photos = yield $this->photos->getUserPhotos(['user_id' => $Get, 'offset' => $Me, 'max_id' => 0, 'limit' => 1]);
$photo = $photos['photos']['0'] ?? Null;
if ($photo!== null){
yield $this->messages->sendMedia(['peer' => $peer,'media' => $photo,'message' => "**❈ User Profile Was Upload To :** ( `" . date('Y/m/d | H:i:s' , $photo['date']) . "` )" ,'parse_mode' => 'Markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User Not Profile!**", 'parse_mode' => 'markdown']);}
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To User!**", 'parse_mode' => 'markdown']);}}
//==================== Upload Profile =====================
if(preg_match('/^\.SetPic$/usi', $text)){
if (isset($replyToid)) {
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['photo'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['photo'];}
yield $this->downloadToFile($Get, 'Files/profile.jpg');
yield $this->photos->uploadProfilePhoto(['file' => 'Files/profile.jpg',]);
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Profile Uploaded!**", 'parse_mode' => 'MarkDown']);
unlink("Files/profile.jpg");
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To Photo!**", 'parse_mode' => 'markdown']);}}
//==================== Delete Profile =====================
if(preg_match('/^\.DelPic (\d+)$/usi', $text,$Match)){
$Mf = $Match[1] - 1;
$photo = yield $this->photos->getUserPhotos(['user_id' => $Sudo, 'offset' => $Mf, 'max_id' => 0, 'limit' => 1]);
$photo_id = $photo['photos']['0']['id'];
$photo_hash = $photo['photos']['0']['access_hash'];
$inputPhoto = ['_' => 'inputPhoto', 'id' => $photo_id, 'access_hash' => $photo_hash];
yield $this->photos->deletePhotos(['id' =>[$inputPhoto]]);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Profile **( `$Match[1]` ) **Deleted!**",'parse_mode'=>'MarkDown']);}
//==================== Convert To Photo =====================
if(preg_match('/^\.ToPhoto$/usi', $text)){
if (isset($replyToid)) {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
yield $this->downloadToFile($Get, 'Files/tophoto.jpg');
yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedPhoto','file' => 'Files/tophoto.jpg'],'message' => '**❈ Your Photo!**','parse_mode' => 'Markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
unlink("Files/tophoto.jpg");
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To Sticker!**",'parse_mode'=>"MarkDown"]);}}
//==================== Convert To Sticker =====================
if(preg_match('/^\.ToSticker$/usi', $text)){
if (isset($replyToid)) {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
yield $this->downloadToFile($Get, "Files/tosticker.png");
$photoName = "Files/tosticker.png";
$StickerName = "Files/tosticker.webp";
$img = imagecreatefromjpeg($photoName);
imagewebp($img,$StickerName);
imagedestroy($img);
yield $this->messages->sendMedia(['peer'=> $peer,'media' => ['_' => 'inputMediaUploadedDocument','file'=> $StickerName,'attributes'=> [['_' => 'documentAttributeSticker','mask'=> false,'alt' => '','stickerset'=> ['_' => 'inputStickerSetEmpty'],]]]]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
unlink($StickerName);
unlink($photoName);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To Photo!**",'parse_mode'=>"MarkDown"]);}}
//==================== Time =====================
if(preg_match('/^\.Time$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$Time = date('H:i:s');
$Dates = jdate('Y/m/d - l');
$Datem = date('l - Y/m/d');
if(!file_exists("Files/Dates.jpg")){
copy("https://calendar.nagsh.ir/wp-content/uploads/2020/12/%D8%AA%D9%82%D9%88%DB%8C%D9%85-1400-%D8%AF%D8%B1-%DB%8C%DA%A9-%D9%86%DA%AF%D8%A7%D9%87-1.jpg" , 'Files/Dates.jpg');}
yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedPhoto','file' => 'Files/Dates.jpg'],'message' => "**❈ Time** : ( `$Time` )\n\n**❈ Date Shamsi** : ( `$Dates` )\n\n**❈ Date Miladi** : ( `$Datem` )",'parse_mode' => 'Markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Save =====================
if(preg_match('/^\.Save$/usi', $text)){
if (isset($replyToid)) {
yield $this->messages->forwardMessages(['from_peer' => $peer, 'to_peer' => $Sudo, 'id' => [$Get['reply_to']['reply_to_msg_id']]]);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Message Saved!** ",'parse_mode'=>"MarkDown"]);
}else{
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To Mesaage!** ",'parse_mode'=>"MarkDown"]);}}
//==================== Del Messages =====================
if(preg_match('/^\.DelAll ?(.*)?$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
if(isset($replyToid) or isset($Match[1])){
$UseriD = isset($Match[1]) ? yield $this->getFullInfo($Match[1])['User']['id'] : $replyUseriD;
$Name = yield $this->getFullInfo($UseriD)['User']['first_name'];
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteUserHistory(['channel' => $peer, 'user_id' => $UseriD]);
}else {
yield $this->messages->deleteUserHistory(['peer' => $peer, 'user_id' => $UseriD]);}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ All Messages From** [$Name](mention:$UseriD) **To This Chat Was Deleted!**", 'parse_mode' => 'Markdown']);
}else {
foreach(array_chunk(range($msg_id - 1 , 1) ,10) as $Msgid){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' =>$peer,'id' =>$Msgid]);
} else {
yield $this->messages->deleteMessages(['channel' =>$peer,'id' =>$Msgid]);}}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ All Messages To This Chat Was Deleted!**", 'parse_mode' => 'Markdown']);}}
//==================== Del =====================
if(preg_match('/^\.Del (\d+)$/usi', $text,$Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$Count = 0; $Msgid = $msg_id - 1;
do {
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$Msgid]]);
$Msgid--; $Count++;
}else {
 yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$Msgid]]);
$Msgid--; $Count++;}
}while($Count != $Match[1]); 
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "❈ ( `$Count` ) **Message Deleted!**", 'parse_mode' => 'markdown']);}
//==================== Info =====================
if(preg_match('/^\.info ?(.*)?$/i', $text, $Match)){
if(isset($replyToid) or isset($Match[1])){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$UseriD = isset($Match[1]) ? yield $this->getFullInfo($Match[1])['User']['id'] : $replyUseriD;
$Info = yield $this->getFullInfo($UseriD);
$UserInfo = $Info['User'];
$Name = $UserInfo['first_name'];
$last = $UserInfo['last_name'] ?? "---";
$Bio = $Info['full']['about'] ?? "---";
$UserName = "@" .$UserInfo['username'] ?? "---";
if ($UserInfo['bot'] == 1){ $type = "Bot"; } else { $type = "User";}
$Phone = $UserInfo['phone'] ?? Null;
if ($UserInfo['bot'] == 1 or $Phone == null){ $phone = "---"; } else{ $phone = "+".$UserInfo['phone'];}
if ($UserInfo['bot'] == 1){$Stats = "---"; } else {$Stats = str_replace('userStatus' , null , $UserInfo['status']['_']);}
if($Stats == 'Offline'){ $LastSeen = "**❈ Last Seen : **( `" . date('H:i:s' , $UserInfo['status']['was_online']) . "` )\n"; } else {$LastSeen = null;}
$common = $Info['full']['common_chats_count'];
if ($UserInfo['verified'] == 1){ $Verified = "Yes"; } else { $Verified = "No";}
$Profs = count(yield $this->photos->getUserPhotos(['user_id' => $UseriD, 'offset' => 0, 'max_id' => 0, 'limit' => 100])['photos']);
if ($UserInfo['contact'] == 1){ $contact = "Yes"; } else { $contact = "No";}
$photos = yield $this->photos->getUserPhotos(['user_id' => $UseriD, 'offset' => 0, 'max_id' => 0, 'limit' => 1]);
$photo = $photos['photos']['0'] ?? Null;
if ($photo !== null){
yield $this->messages->sendMedia(['peer' => $peer,'media' => $photo,'message' => "**❈ information Of : {** [$Name](mention:$UseriD) }\n\n**❈ User iD : **( `$UseriD` )\n**❈ First Name : **( `$Name` )\n**❈ Last Name : **( `$last` )\n**❈ Username : **( `$UserName` )\n**❈ Biography : **( `$Bio` )\n**❈ Phone : **( `$phone` )\n**❈ Com Gro Count : **( `$common` )\n**❈ Stats : **( `$Stats` )\n$LastSeen **❈ Type : **( `$type` )\n**❈ Verified By Telegram : **( `$Verified` )\n**❈ Your Contact : **( `$contact` )\n**❈ Photo Count : **( `$Profs` )",'parse_mode' => 'Markdown']);
}else {
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "**❈ information Of : {** [$Name](mention:$UseriD) }\n\n**❈ User iD : **( `$UseriD` )\n**❈ First Name : **( `$Name` )\n**❈ Last Name : **( `$last` )\n**❈ Username : **( `$UserName` )\n**❈ Biography : **( `$Bio` )\n**❈ Phone : **( `$phone` )\n**❈ Com Gro Count : **( `$common` )\n**❈ Stats : **( `$Stats` )\n$LastSeen **❈ Type : **( `$type` )\n**❈ Verified By Telegram : **( `$Verified` )\n**❈ Your Contact : **( `$contact` )\n**❈ Photo Count : **( `$Profs` )", 'parse_mode' => 'Markdown']);}
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
}else{
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To User Or Enter Username or a Numeric ID!**", 'parse_mode' => 'markdown' ]);}}
//==================== Chat Info =====================
if(preg_match('/^\.Cinfo$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
$Gpinf = yield $this->getFullInfo($peer);
$title = $Gpinf['Chat']['title'];
$iD = $Gpinf['Chat']['id'];
$uname = $Gpinf['Chat']['username'] ?? "---";
$about = $Gpinf['full']['about'] ?? "---";
$type = $Gpinf['type'];
$CreatTime = date('Y/m/d | H:i:s' , $Gpinf['Chat']['date']);
if ($Gpinf['Chat']['verified'] == 1){ $Verified = "Yes"; } else { $Verified = "No";}
if ($Gpinf['Chat']['scam'] == 1){ $Scam = "Yes"; } else { $Scam = "No";}
$Keyicked = $Gpinf['full']['kicked_count'] ?? "---";
$admin = $Gpinf['full']['admins_count'] ?? "---";
$banned = $Gpinf['full']['banned_count'] ?? "---";
$participants = $Gpinf['full']['participants_count'];
if($Gpinf['Chat']['photo']['_'] !== "chatPhotoEmpty"){
$inputPhoto = ['_' => 'inputPhoto', 'id' => $Gpinf['full']['chat_photo']['id'], 'access_hash' => $Gpinf['full']['chat_photo']['access_hash']];
$inputMediaPhoto = ['_' => 'inputMediaPhoto', 'id' => $inputPhoto];
yield $this->messages->sendMedia(['peer' => $peer, 'media' => $inputMediaPhoto, 'message' => "**❈ Chat information** :\n\n**❈ Chat iD** : ( `-100$iD` )\n**❈ Title : **( `$title` )\n**❈ Username : **( `$uname` )\n**❈ Type : **( `$type` )\n**❈ Members Count : **( `$participants` )\n**❈ Admins Count : **( `$admin` )\n**❈ Banned Count : **( `$banned` )\n**❈ Kicked Count : **( `$Keyicked` )\n**❈ Verified By Telegram : **( `$Verified` )\n**❈ Scam : **( `$Scam` )\n**❈ Creat Time : **( `$CreatTime` )\n**❈ Chat About : **( `$about` )",'parse_mode' => 'Markdown']);
}else{
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "**❈ Chat information** :\n\n**❈ Chat iD** : ( `-100$iD` )\n**❈ Title : **( `$title` )\n**❈ Username : **( `$uname` )\n**❈ Type : **( `$type` )\n**❈ Members Count : **( `$participants` )\n**❈ Admins Count : **( `$admin` )\n**❈ Banned Count : **( `$banned` )\n**❈ Kicked Count : **( `$Keyicked` )\n**❈ Verified By Telegram : **( `$Verified` )\n**❈ Scam : **( `$Scam` )\n**❈ Creat Time : **( `$CreatTime` )\n**❈ Chat About : **( `$about` )", 'parse_mode' => 'Markdown']);}
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
if (preg_match('/^\.Cinfo (.*)$/usi', $text,$Match)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
$Gpinf = yield $this->getFullInfo($Match[1]);
$title = $Gpinf['Chat']['title'];
$iD = $Gpinf['Chat']['id'];
$uname = $Gpinf['Chat']['username'] ?? "---";
$about = $Gpinf['full']['about'] ?? "---";
$type = $Gpinf['type'];
$CreatTime = date('Y/m/d | H:i:s' , $Gpinf['Chat']['date']);
if ($Gpinf['Chat']['verified'] == 1){ $Verified = "Yes"; } else { $Verified = "No";}
if ($Gpinf['Chat']['scam'] == 1){ $Scam = "Yes"; } else { $Scam = "No";}
$Keyicked = $Gpinf['full']['kicked_count'] ?? "---";
$admin = $Gpinf['full']['admins_count'] ?? "---";
$banned = $Gpinf['full']['banned_count'] ?? "---";
$participants = $Gpinf['full']['participants_count'];
if($Gpinf['Chat']['photo']['_'] !== "chatPhotoEmpty"){
$inputPhoto = ['_' => 'inputPhoto', 'id' => $Gpinf['full']['chat_photo']['id'], 'access_hash' => $Gpinf['full']['chat_photo']['access_hash']];
$inputMediaPhoto = ['_' => 'inputMediaPhoto', 'id' => $inputPhoto];
yield $this->messages->sendMedia(['peer' => $peer, 'media' => $inputMediaPhoto, 'message' => "**❈ Chat information** :\n\n**❈ Chat iD** : ( `-100$iD` )\n**❈ Title : **( `$title` )\n**❈ Username : **( `$uname` )\n**❈ Type : **( `$type` )\n**❈ Members Count : **( `$participants` )\n**❈ Admins Count : **( `$admin` )\n**❈ Banned Count : **( `$banned` )\n**❈ Kicked Count : **( `$Keyicked` )\n**❈ Verified By Telegram : **( `$Verified` )\n**❈ Scam : **( `$Scam` )\n**❈ Creat Time : **( `$CreatTime` )\n**❈ Chat About : **( `$about` )",'parse_mode' => 'Markdown']);
}else{
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "**❈ Chat information** :\n\n**❈ Chat iD** : ( `-100$iD` )\n**❈ Title : **( `$title` )\n**❈ Username : **( `$uname` )\n**❈ Type : **( `$type` )\n**❈ Members Count : **( `$participants` )\n**❈ Admins Count : **( `$admin` )\n**❈ Banned Count : **( `$banned` )\n**❈ Kicked Count : **( `$Keyicked` )\n**❈ Verified By Telegram : **( `$Verified` )\n**❈ Scam : **( `$Scam` )\n**❈ Creat Time : **( `$CreatTime` )\n**❈ Chat About : **( `$about` )", 'parse_mode' => 'Markdown']);}
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Set Pm =====================
if(preg_match('/^\.Setpm (.*)$/usi', $text,$Match)){
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
$Info = yield $this->getFullInfo($Get);
$UserInfo = $Info['User'];
$Name = $UserInfo['first_name'];
if (!in_array($Get, $data['PmList'])) {
$data['PmList'] = $Get;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
$data['PmList'][$Get][] = $Match[1];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Word **( `$Match[1]` )** Added To Pm List** [$Name](mention:$Get)!", 'parse_mode' => 'Markdown']);}
//==================== Del Pm =====================
if(preg_match('/^\.DelPm (.*)$/usi', $text, $Match)){
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
$Info = yield $this->getFullInfo($Get);
$UserInfo = $Info['User'];
$Name = $UserInfo['first_name'];
if (in_array($Match[1], $data['PmList'][$Get])) {
$Key = array_search($Match[1], $data['PmList'][$Get]);
unset($data['PmList'][$Get][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Word **( `$Match[1]` ) **Deleted in Pm List** [$Name](mention:$Get)!", 'parse_mode' => 'Markdown']);}
//==================== List Pm =====================
if(preg_match('/^\.PmList$/usi', $text)){
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
if (!empty($data['PmList'][$Get])) {
$List = "**❈ Pm List : **\n\n";
$Conter = 1;
foreach($data['PmList'][$Get] as $Out){
$List .= "**$Conter : **( `$Out` )\n";
$Conter++;}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $List, 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Pm List is Empty!**", 'parse_mode' => 'markdown' ]);}}
//==================== CleanPms =====================
if(preg_match('/^\.CleanPms$/usi', $text)){
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
$Info = yield $this->getFullInfo($Get);
$UserInfo = $Info['User'];
$Name = $UserInfo['first_name'];
$data['PmList'][$Get] = [];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Pm List** [$Name](mention:$Get)** Cleared!**", 'parse_mode' => 'Markdown']);}
//==================== Pack Info =====================
if(preg_match('/^\.Packinfo$/usi', $text)){
if ($type == 'supergroup' or $type == 'channel') {
$Res = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0];
} else {
$Res = yield $this->messages->getMessnages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0];}
$doc = $Res['media']['document']['attributes'] ?? [];
$emoji = $Res['media']['document']['attributes']['1']['alt'];
foreach($doc as $i){
if ($i['_'] == 'documentAttributeSticker'){
$Set = $i['stickerset'];
$Res = yield $this->messages->getStickerSet(['stickerset' => $Set]);}}
$Hel = $Res['set']['title'];
$Short = $Res['set']['short_name'];
$count = $Res['set']['count'];
$ani = $Res['set']['animated'];
if ($ani == 1){$anim = "Yes";}else {$anim = "No";}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Sticker Pack information :**\n\n**❈ Title :** ( `$Hel` )\n**❈ Short Name :** ( `$Short` )\n**❈ Stickers Count :** ( `$count` )\n**❈ Animated Sticker :** ( `$anim` )\n**❈ Sticker Emoji :** ( `$emoji` )
", 'parse_mode' => 'MarkDown']);}
//==================== Set Filter =====================
if(preg_match('/^\.Filter (.*)$/usi', $text, $Match)){
if (!in_array($peer, $data['FilterList'])) {
$data['FilterList'] = $peer;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
$List = explode("," , $Match[1]);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
foreach($List as $Filter){
if (!in_array($Me, $data['FilterList'][$peer])) {
$data['FilterList'][$peer][] = $Filter;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "❈** Words **( `$Match[1]` )** Added To Filter List On This Chat!**", 'parse_mode' => 'markdown' ]);}
//==================== Del Filter =====================
if(preg_match('/^\.DelFilter (.*)$/usi', $text,$Match)){
$List = explode("," , $Match[1]);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
foreach($List as $Filter){
if (in_array($Filter, $data['FilterList'][$peer])) {
$Key = array_search($Filter, $data['FilterList'][$peer]);
unset($data['FilterList'][$peer][$Key]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Words **( `$Match[1]` )** Deleted in Filter List On This Chat!**", 'parse_mode' => 'markdown' ]);}
//==================== Filter List =====================
if(preg_match('/^\.FilterList$/usi', $text)){
if (!empty($data['FilterList'][$peer])) {
$List = "**❈ Filter List : **\n\n";
$Conter = 1;
foreach($data['FilterList'][$peer] as $Out){
$List .= "**$Conter : **( `$Out` )\n";
$Conter++;}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $List, 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Filter List is Empty!**", 'parse_mode' => 'markdown' ]);}}
//==================== Clean Filter List =====================
if(preg_match('/^\.CleanFilterList$/usi', $text)){
$data['FilterList'][$peer] = [];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Filter List Cleared!**",'parse_mode'=>'MarkDown']);}
//==================== Messages Count =====================
if($update){
$MPast = $data['MessageCount'];
$MNow = $MPast + 1;
$data['MessageCount'] = $MNow;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
//==================== NewFosh =====================
if(preg_match('/^\.NewFosh$/usi', $text)){
 yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
if (isset($replyToid)) {
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['document'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['document'];}
yield $this->downloadToFile($Get,
new \danog\MadelineProto\FileCallback(
'Files/newFosh.txt',
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
static $prev = 0;
$now = \time();
if($now - $prev < 10 && $progress < 100){
return;}
$prev = $now;
$darsad = Percent($progress,100);
if ($speed > 0){
$Mem = $speed * 1000000 / 8;
$speeds = Convert($Mem)."/s";
}else {
$speeds = "-";}
$tiop = ConvertTime($time);
$len = $progress / 4;
$Prog = str_repeat("●", $len);
try {
if ($progress < 100){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ Downloading ....**\n
**❈ Progress : **
`[$Prog]$darsad%` \n
**❈ Speed : **( `$speeds` )\n
**❈ Time : **( `$tiop` )\n
", 'parse_mode' => 'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ Download Was Done & Foshs Saved!**\n
**❈ Progress : **
`[$Prog]$darsad%` \n
**❈ Speed : **( `$speeds` )\n
**❈ Time : **( `$tiop` )\n
", 'parse_mode' => 'MarkDown']);}
} catch (\Throwable $e) {}}));
$newFosh = file_get_contents("Files/newFosh.txt");
$FoshList = file_get_contents("Files/Foshs.txt");
$news = "$FoshList\n$newFosh";
file_put_contents("Files/Foshs.txt", $news);
unlink("Files/newFosh.txt");
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To File!**", 'parse_mode' => 'markdown']);}}
//==================== Fosh List =====================
if(preg_match('/^\.FoshList$/usi', $text)){
 yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
$List = file_get_contents("Files/Foshs.txt");
$List = explode(PHP_EOL, $List);
$count = count($List);
 yield $this->messages->sendMedia(['peer' => $peer,
'media' => ['_' => 'inputMediaUploadedDocument',
'file' => new \danog\MadelineProto\FileCallback(
'Files/Foshs.txt',
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
static $prev = 0;
$now = \time();
if($now - $prev < 10 && $progress < 100){
return;}
$prev = $now;
$darsad = Percent($progress,100);
if ($speed > 0){
$Mem = $speed * 1000000 / 8;
$speeds = Convert($Mem)."/s";
}else {
$speeds = "-";}
$tiop = ConvertTime($time);
$len = $progress / 4;
$Prog = str_repeat("●", $len);
try {
if ($progress < 100){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ Uploading ....**\n
**❈ Progress : **
`[$Prog]$darsad%` \n
**❈ Speed : **( `$speeds` )\n
**❈ Time : **( `$tiop` )\n
", 'parse_mode' => 'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ Upload Was Done!**\n
**❈ Progress : **
`[$Prog]$darsad%` \n
**❈ Speed : **( `$speeds` )\n
**❈ Time : **( `$tiop` )\n
", 'parse_mode' => 'MarkDown']);}
} catch (\Throwable $e) {}}),
'attributes' => [['_' => 'documentAttributeFilename', 'file_name' => 'Fosh.txt']]],'message' => "**❈ List Of **( `$count` ) **Fosh!**",'parse_mode' => 'Markdown']);}
//==================== Clean Fosh List =====================
if(preg_match('/^\.CleanFoshList$/usi', $text)){
file_put_contents("Files/Foshs.txt", ' ');
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Fosh List Cleared!**", 'parse_mode' => 'MarkDown']);}
//==================== New F Fosh =====================
if(preg_match('/^\.NewFoshF$/usi', $text)){
 yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
if (isset($replyToid)) {
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['document'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['document'];}
yield $this->downloadToFile($Get,
new \danog\MadelineProto\FileCallback(
'Files/newFosh.txt',
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
static $prev = 0;
$now = \time();
if($now - $prev < 10 && $progress < 100){
return;}
$prev = $now;
$darsad = Percent($progress,100);
if ($speed > 0){
$Mem = $speed * 1000000 / 8;
$speeds = Convert($Mem)."/s";
}else {
$speeds = "-";}
$tiop = ConvertTime($time);
$len = $progress / 4;
$Prog = str_repeat("●", $len);
try {
if ($progress < 100){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ Downloading ....**\n
**❈ Progress : **
`[$Prog]$darsad%` \n
**❈ Speed : **( `$speeds` )\n
**❈ Time : **( `$tiop` )\n
", 'parse_mode' => 'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ Download Was Done & Foshs Friend Saved!**\n
**❈ Progress : **
`[$Prog]$darsad%` \n
**❈ Speed : **( `$speeds` )\n
**❈ Time : **( `$tiop` )\n
", 'parse_mode' => 'MarkDown']);}
} catch (\Throwable $e) {}}));
$newFosh = file_get_contents("Files/newFosh.txt");
$FoshList = file_get_contents("Files/FFoshs.txt");
$news = "$FoshList\n$newFosh";
file_put_contents("Files/FFoshs.txt", $news);
unlink("Files/newFosh.txt");
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Reply To File!**", 'parse_mode' => 'markdown']);}}
//==================== Fosh F List =====================
if(preg_match('/^\.FoshFList$/usi', $text)){
 yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
$List = file_get_contents("Files/FFoshs.txt");
$List = explode(PHP_EOL, $List);
$count = count($List);
 yield $this->messages->sendMedia(['peer' => $peer,
'media' => ['_' => 'inputMediaUploadedDocument',
'file' => new \danog\MadelineProto\FileCallback(
'Files/FFoshs.txt',
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
static $prev = 0;
$now = \time();
if($now - $prev < 10 && $progress < 100){
return;}
$prev = $now;
$darsad = Percent($progress,100);
if ($speed > 0){
$Mem = $speed * 1000000 / 8;
$speeds = Convert($Mem)."/s";
}else {
$speeds = "-";}
$tiop = ConvertTime($time);
$len = $progress / 4;
$Prog = str_repeat("●", $len);
try {
if ($progress < 100){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ Uploading ....**\n
**❈ Progress : **
`[$Prog]$darsad%` \n
**❈ Speed : **( `$speeds` )\n
**❈ Time : **( `$tiop` )\n
", 'parse_mode' => 'MarkDown']);
}else {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "
**❈ Upload Was Done!**\n
**❈ Progress : **
`[$Prog]$darsad%` \n
**❈ Speed : **( `$speeds` )\n
**❈ Time : **( `$tiop` )\n
", 'parse_mode' => 'MarkDown']);}
} catch (\Throwable $e) {}}),
'attributes' => [['_' => 'documentAttributeFilename', 'file_name' => 'FoshFriend.txt']]],'message' => "**❈ List Of **( `$count` ) **Fosh Friend!**",'parse_mode' => 'Markdown']);}
//==================== Clean Fosh F List =====================
if(preg_match('/^\.CleanFoshFList$/usi', $text)){
file_put_contents("Files/FFoshs.txt", ' ');
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Fosh Friend List Cleared!**", 'parse_mode' => 'MarkDown']);}
//==================== Added Fosh =====================
if(preg_match('/^\.Fosh (.*)$/usi', $text, $Match)){
$List = $Match[1];
$FoshList = file_get_contents("Files/Foshs.txt");
$news = "$FoshList\n$List";
file_put_contents("Files/Foshs.txt", $news);
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Fosh** ( `$List` ) **Added To Fosh List!**", 'parse_mode' => 'MarkDown']);}
//==================== Added Fosh F =====================
if(preg_match('/^\.FoshF (.*)$/usi', $text,$Match)){
$List = $Match[1];
$FoshList = file_get_contents("Files/FFoshs.txt");
$news = "$FoshList\n$List";
file_put_contents("Files/FFoshs.txt", $news);
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Fosh** ( `$List` ) **Added To Fosh Friend List!**", 'parse_mode' => 'MarkDown']);}
//==================== Upload in Telegram =====================
if(preg_match('/^\.Upload (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
$Name = \basename($Match[1]) ?? 'Unkowon';
$Size = get_headers($Match[1] , true)['Content-Length'];
$url= new \danog\MadelineProto\FileCallback($Match[1],
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
static $prev = 0;
$now = \time();
if($now - $prev < 10 && $progress < 100){
return;}
$prev = $now;
$darsad = Percent($progress,100);
$speed = Convert($speed * 1000000 / 8)."/s";
$time = ConvertTime($time);
$Sizer = Convert(round($progress , 2) * round(($Size / 1024 / 1024) , 2) / 100 * 1024 * 1024);
$Size = Convert($Size);
$lev = round($progress / 4);
$prog1 = str_repeat("●", $lev);
$prog2 = str_repeat("○", 25 - $lev);
$Prog = "$prog1$prog2";
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Uploading ....**\n\n**❈ Progress : **`[$Prog] $darsad%` \n\n**❈ Speed : **( `$speed` )\n\n**❈ Time : **( `$time` )\n\n**❈ Size : **( `$Sizer` ) **Of** ( `$Size` )", 'parse_mode' => 'MarkDown']);});
yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedDocument','file' => $url,'attributes' => [['_' => 'documentAttributeFilename', 'file_name' => $Name]]],'message' => "**❈ Name : **( `$Name` )\n\n**❈ Your Link :** ( `$Match[1]` )", 'parse_mode' => 'markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Invite To Group =====================
if(preg_match('/^\.inv (.*)$/usi', $text,$Match)){
if ($type == "supergroup") {
yield $this->channels->inviteToChannel(['channel' => $peer, 'users' => [$Match[1]]]);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ User invited To Group!**", 'parse_mode' => 'markdown']);
} else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Send in The SuperGroup!**", 'parse_mode' => 'markdown']);}}
//==================== Spam All Stickers =====================
if(preg_match('/^\.SpamS$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ Ok Please Wait!**",'parse_mode'=>'MarkDown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]]);
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]]);}
$inputStickerSetID = $Get['messages'][0]['media']['document']['attributes'][1]['stickerset'];
$Stickerset= yield $this->messages->getStickerSet(['stickerset' => $inputStickerSetID]);
$dec = $Stickerset['documents'];
for ($i = 0; $i <= count($dec); $i++) {
$docid = $dec[$i]['id'];
$acces= $dec[$i]['access_hash'];
$Ref = $dec[$i]['file_reference'];
$inputDocument= ['_' => 'inputDocument', 'id' => $docid, 'access_hash' => $acces, 'file_reference' => $Ref];
$inputMediaDocument = ['_' => 'inputMediaDocument', 'id' => $inputDocument];
yield $this->messages->sendMedia(['peer'=> $peer,'media' => $inputMediaDocument]);}}
//==================== Spam Count Stickers =====================
if(preg_match('/^\.SpamS (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => " **❈ Ok Please Wait!**",'parse_mode'=>'MarkDown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]]);
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]]);}
$inputStickerSetID = $Get['messages'][0]['media']['document']['attributes'][1]['stickerset'];
$Stickerset= yield $this->messages->getStickerSet(['stickerset' => $inputStickerSetID]);
$dec = $Stickerset['documents'];
for ($i = 1; $i <= $Match[1] ; $i++) {
$docid = $dec[$i]['id'];
$acces= $dec[$i]['access_hash'];
$Ref = $dec[$i]['file_reference'];
$inputDocument= ['_' => 'inputDocument', 'id' => $docid, 'access_hash' => $acces, 'file_reference' => $Ref];
$inputMediaDocument = ['_' => 'inputMediaDocument', 'id' => $inputDocument];
yield $this->messages->sendMedia(['peer'=> $peer,'media' => $inputMediaDocument]);}}
//==================== File Info =====================
if(preg_match('/^\.Fileinfo$/usi', $text)){
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
$types = ['audio','document','photo','sticker','video','voice','video_note','animation'];
$botAPI_file = yield $this->MTProtoToBotAPI($Media);
foreach ($types as $type) {
if (isset($botAPI_file[$type]) && is_array($botAPI_file[$type])) {
$method = $type;}}
$result['file_type'] = $method;
if ($result['file_type'] == 'photo') {
$item = end($botAPI_file[$method]);
$result['file_size'] = $item['file_size'];
if (isset($item['file_name'])) {
$result['file_name'] = $item['file_name'];
$result['file_id'] = $item['file_id'];}
}else {
if (isset($botAPI_file[$method]['file_name'])) {
$result['file_name'] = $botAPI_file[$method]['file_name'];}
if (isset($botAPI_file[$method]['file_size'])) {
$result['file_size'] = $botAPI_file[$method]['file_size'];}
if (isset($botAPI_file[$method]['mime_type'])) {
$result['mime_type'] = $botAPI_file[$method]['mime_type'];}
$result['file_id'] = $botAPI_file[$method]['file_id'];}
if (!isset($result['mime_type'])) {
$result['mime_type'] = 'application/octet-stream';}
if (!isset($result['file_name'])) {
$result['file_name'] = $result['file_id'].($method === 'sticker' ? '.webp' : '');}
$iD = $result['file_id'];
$info = yield $this->getDownloadInfo($Get);
$Size = Convert($info['size']);
$Name = $info['name'];
$ext = $info['ext'];
$types = $info['mime'];
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ File ID :** ( `$iD` )\n\n**❈ Name :** ( `$Name` )\n**❈ Size :** ( `$Size` )\n**❈ Type :** ( `$types` )\n**❈ Format :** ( `$ext` )",'parse_mode'=>'MarkDown']);}
//==================== Send By File iD =====================
if(preg_match('/^\.Sendid (.*)$/usi', $text,$Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Match[1]]);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ File ID : **( `$Match[1]` )",'parse_mode'=>"MarkDown"]);}
//==================== Say Text =====================
if(preg_match('/^\.Say (.*)$/usi', $text,$Match)){
for ($i = 1; $i <= strlen(str_replace(' ' , null ,$Match[1])) ; $i++) {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => substr($Match[1], 0, $i)]);
yield $this->sleep(0.5);}}
//==================== Short Link =====================
if(preg_match('/^\.SLink (.*)$/usi', $text,$Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
$link = json_decode(file_get_contents("https://api.shrtco.de/v2/shorten?url=$Match[1]"), true);
$Short = $link['result']['full_short_link'];
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Your Link : **( `$Match[1]` )\n❈** Short Link : **( [Link]($Short) )",'parse_mode'=>"MarkDown"]);}
//==================== Nim Baha Link =====================
if(preg_match('/^\.Nim (.*)$/usi', $text,$Match)){
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://www.digitalbam.ir/DirectLinkDownloader/Download');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, ['downloadUri'=> $Match[1]]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$nim = json_decode(curl_exec($curl))->fileUrl;
curl_close($curl);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Your Link : **( `$Match[1]` )\n❈** NimBaha Link : **( [Link]($nim) )",'parse_mode'=>"MarkDown"]);}
//==================== Convert Photo =====================
if(preg_match('/^\.SFilter (.*)$/usi', $text,$Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
if ($Me == 'boost' or $Me == 'bubbles' or $Me == 'sepia' or $Me == 'sepia2' or $Me == 'sharpen' or $Me == 'emboss' or $Me == 'cool' or $Me == 'old' or $Me == 'old2' or $Me == 'old3' or $Me == 'light' or $Me == 'aqua' or $Me == 'boost2' or $Me == 'gray' or $Me == 'Antique' or $Me == 'blackwhite' or $Me == 'blur' or $Me == 'vintage' or $Me == 'concentrate' or $Me == 'hermajesti' or $Me == 'everglow' or $Me == 'freshblue' or $Me == 'tender' or $Me == 'dream' or $Me == 'frozen' or $Me == 'forest' or $Me == 'rain' or $Me == 'orangepeel' or $Me == 'darken' or $Me == 'surmer' or $Me == 'retro' or $Me == 'country' or $Me == 'washed') {
 if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['photo'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['photo'];}
yield $this->downloadToFile($Get, "Files/Edit.jpg");
$Pic = "http://api.codebazan.ir/effect/?filt=$Match[1]&ur=https://".$_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_URL'] ."Files/Edit.jpg";
yield $this->messages->sendMedia(['peer' => $peer,'media' => $Pic,'message' => '**❈ Your Photo!**','parse_mode' => 'Markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
unlink("Files/Edit.jpg");
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Filter Not Found , Please Use The Following Filters :** ( `boost` , `bubbles` , `sepia` , `sepia2` , `sharpen` , `emboss` , `cool` , `old` , `old2` , `old3` , `light` , `aqua` , `boost2` , `gray` , `Antique` , `blackwhite` , `blur` , `vintage` , `concentrate` , `hermajesti` , `everglow` , `freshblue` , `tender` , `dream` , `frozen` , `forest` , `rain` , `orangepeel` , `darken` , `surmer` , `retro` , `country` , `washed` )",'parse_mode'=>"MarkDown"]);}}
//==================== Cut Music =====================
if(preg_match('/^\.SCut (.*) (.*)$/usi', $text,$Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
 if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
yield $this->downloadToFile($Get, "Files/CutMusic.mp3");
$NewMusic = json_decode(file_get_contents("https://mrkhas.ml/apiha/demo/index.php?link=https://".$_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_URL'] ."Files/CutMusic.mp3&s=$Match[1]&p=$Match[2]"), true)['results']['link'];
yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedDocument',
'file' => $NewMusic,
'attributes' => [
['_' => 'documentAttributeAudio', 'voice' => false, 'title' => $Match[1] . "-" . $Match[2], 'performer' => 'SirAraz']
]
],
'message' => '[This is the caption](https://t.me/MadelineProto)',
'parse_mode' => 'Markdown'
]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
unlink("Files/CutMusic.mp3");}
//==================== Text On Photo =====================
if(preg_match('/^\.Ocr$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
 if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['photo'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['photo'];}
yield $this->downloadToFile($Get, "Files/Matn.jpg");
$link = "https://mohammadsylixapi.herokuapp.com/api.php?url=https://".$_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_URL'] ."Files/Matn.jpg";
$Matn = file_get_contents($link);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Result :** \n( `$Matn` )",'parse_mode'=>"MarkDown"]);
unlink("Files/Matn.jpg");}
//==================== Set Logo =====================
if(preg_match('/^\.SetLogo$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
yield $this->downloadtofile($Get, "Files/LoGo.png");
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Logo Was Saved!**",'parse_mode'=>"MarkDown"]);}
//==================== SPrint Logo =====================
if(preg_match('/^\.SPrint (.*)$/usi', $text,$Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
yield $this->downloadToFile($Get, 'Files/Logos.jpg');
$link = "https://api.codebazan.ir/watermark/?type=out&position=$Match[1]&link=http://".$_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_URL'] ."Files/Logos.jpg&logo=http://".$_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_URL'] ."/Files/LoGo.png";
copy($link, "Files/Yourlogo.jpg");
yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedPhoto','file' => 'Files/Yourlogo.jpg'],'message' => '**❈ Your Photo!**','parse_mode' => 'Markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
unlink("Files/Logos.jpg");
unlink("Files/Yourlogo.jpg");}
//==================== Round Photo =====================
if(preg_match('/^\.Round$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
yield $this->downloadToFile($Get, "Files/Round.jpg");
$link = "https://api.codebazan.ir/image/?type=round&size=500,500&url=http://".$_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_URL'] ."/Files/Round.jpg";
copy($link, "Files/Rounds.png");
 yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedDocument','file' => 'Files/Rounds.png','attributes' => [['_' => 'documentAttributeFilename', 'file_name' => 'Me.PNG']]]]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
unlink("Files/Round.jpg");
unlink("Files/Rounds.png");}
//==================== Rotate Photo =====================
if(preg_match('/^\.Rotate (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
yield $this->downloadToFile($Get, "Files/Rotate.jpg");
header('Content-type: image/jpeg');
$Source = imagecreatefromjpeg("Files/Rotate.jpg");
$Rotate = imagerotate($Source, $Match[1], 0);
imagejpeg($Rotate , "Files/EditRotate.jpg");
imagedestroy($Source);
imagedestroy($Rotate);
yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedPhoto','file' => 'Files/EditRotate.jpg']]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
unlink("Files/EditRotate.jpg");
unlink("Files/Rotate.jpg");}
//==================== Instagram Information =====================
if(preg_match('/^\.SinFoiG (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$link = json_decode(file_get_contents("https://www.wirexteam.ga/instagram?type=info&id=$Match[1]"), true);
$user = $link['instagram']['info']['username'];
$Name = $link['instagram']['info']['name'];
$iD = $link['instagram']['info']['id'];
$Verified = $link['instagram']['info']['verified'];
if ($Verified == 1){$Veri = "Yes";}else {$Veri = "No";}
$private = $link['instagram']['info']['private'];
if ($private == 1){$pri = "Yes";}else {$pri = "No";}
$post = $link['instagram']['info']['post'];
$Highlight = $link['instagram']['info']['highlight'];
$Follower = $link['instagram']['info']['follower'];
$Following = $link['instagram']['info']['following'];
$igtvcount = $link['instagram']['info']['igtvcount'];
$Bio = $link['instagram']['info']['bio'];
$Prof = $link['instagram']['info']['profile_url'];
if ($Bio == ""){$Bios = "---";}else {$Bios = $Bio;}
if ($Name == ""){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Page Not Found!**", 'parse_mode' => 'Markdown']);
}else {
yield $this->messages->sendMedia(['peer' => $peer ,'media' => $Prof,'message' => "**❈ information Of** { [$Name](https://instagram.com/$user) } **in instagram :**\n\n**❈ Username : ** ( `$user` )\n**❈ Name : ** ( `$Name` )\n**❈ ID : ** ( `$iD` )\n**❈ Posts Count : ** ( `$post` )\n**❈ Followers Count : ** ( `$Follower` )\n**❈ Following Count : ** ( `$Following` )\n**❈ Verified By instagram : ** ( `$Veri` )\n**❈ Private Account : ** ( `$pri` )\n**❈ Highlight Post Count : ** ( `$Highlight` )\n**❈ iGTv Count : ** ( `$igtvcount` )\n**❈ Biography : ** ( `$Bios` )",'parse_mode' => 'Markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}}
//==================== Picture Finder =====================
if(preg_match('/^\.SPic (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$curl = curl_init();
curl_setopt_array($curl, [
CURLOPT_URL => "https://bing-image-search1.p.rapidapi.com/images/search?q=$Match[1]",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 100,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => [
"x-rapidapi-host: bing-image-search1.p.rapidapi.com",
"x-rapidapi-key: 60d4b6c6a5mshe2938f8d12748a2p1b6476jsn11f73de661d5"],]);
$Response = curl_exec($curl);
curl_close($curl);
$link = json_decode($Response , true);
$List = rand(0,8);
$Pic = $link['value'][$List]['contentUrl'];
if (!strpos($Pic, "https://www.donnashape.com")!== false) {
copy($Pic, "Files/Picture.jpg");
yield $this->messages->sendMedia(['peer' => $peer ,'media' => ['_' => 'inputMediaUploadedPhoto','file' => 'Files/Picture.jpg']]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
unlink("Files/Picture.jpg");
}else {
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}}
//==================== Scr For Site =====================
if(preg_match('/^\.Screen (.*)$/usi', $text, $Match)){
$SiteURL = $Match[1];
$googlePagespeedData = getData($SiteURL);
$googlePagespeedData = json_decode($googlePagespeedData, true);
$Screenshot = $googlePagespeedData['screenshot']['data'];
$Screenshot = str_replace(array('_','-'),array('/','+'),$Screenshot);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$url = "https://api.browshot.com/api/v1/simple?url=$Me&instance_id=12&key=VbqIgfWSm0O9VNjvIMFvbbCO";
copy($url, "Files/screen.jpg");
yield $this->messages->sendMedia(['peer' => $peer ,'media' => ['_' => 'inputMediaUploadedPhoto','file' => 'Files/screen.jpg']]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
unlink("Files/screen.jpg");}
//==================== Remove Back =====================
if(preg_match('/^\.RemBack$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
yield $this->downloadToFile($Get, "Files/remove.jpg");
$File = "http://".$_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_URL'] ."Files/remove.jpg";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.remove.bg/v1.0/removebg');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$post = array(
'image_url' => $File,
'size' => 'auto');
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$Headers = array();
$Headers[] = 'X-Api-Key: ZChZ1zcKoQs6vZqdv9YBuJ7h';
curl_setopt($ch, CURLOPT_HTTPHEADER, $Headers);
$Result = curl_exec($ch);
curl_close($ch);
$Fp = fopen('Files/remove.png',"wb");
fwrite($Fp,$Result);
fclose($Fp);
 yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedDocument','file' => 'Files/remove.png','attributes' => [['_' => 'documentAttributeFilename', 'file_name' => 'Me.PNG']]]]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
unlink("Files/remove.jpg");
unlink("Files/remove.png");}
//==================== Country Information =====================
if(preg_match('/^\.SCountry (.*)$/usi', $text, $Match)){
$Request = str_replace(" ", "+", $Match[1]);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$link = json_decode(file_get_contents("https://restcountries.eu/rest/v2/name/$Request"), true);
$a1 = $link['0']['name'];
$a2 = $link['0']['topLevelDomain']['0'];
$a3 = $link['0']['population'];
$a4 = $link['0']['timezones']['0'];
$a5 = $link['0']['capital'];
$a6 = $link['0']['region'];
$a7 = $link['0']['subregion'];
$a8 = $link['0']['callingCodes']['0'];
$a9 = $link['0']['currencies']['0']['name'];
$a10 = $link['0']['languages']['0']['name'];
$a11 = $link['0']['languages']['0']['nativeName'];
$aa = $link['message'] ?? Null;
if ($aa == null){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "**❈ Country information :**\n\n**❈ Name : ** ( `$a1` )\n**❈ Capital : ** ( `$a5` )\n**❈ Language : ** ( `$a10 - $a11` )\n**?? Money Unit : ** ( `$a9` )\n**❈ Calling Code : ** ( `$a8` )\n**❈ Continent : ** ( `$a6 - $a7` )\n**❈ Population : ** ( `$a3` )\n**❈ Domain : ** ( `$a2` )\n**❈ Time Zone : ** ( `$a4` )", 'parse_mode' => 'Markdown', 'reply_to_msg_id' => $msg_id]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "❈** Country Not Found!**", 'parse_mode' => 'markdown']);}}
//==================== Mobile Information =====================
if(preg_match('/^\.SMobile (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$Request = str_replace(" ", "+", $Match[1]);
$link = json_decode(file_get_contents("http://mrkhas.ml/apiha/by.php?name=$Request"), true);
if (!isset($link['description'])){
for ($i = 1; $i <= $link['result_count'] ; $i++) {
$Name = $link['result'][$i]['name'];
$Price = $link['result'][$i]['price'];
$Seller = $link['result'][$i]['seller'];
$Date = $link['result'][$i]['date'];
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id, 'message' => "**$i : **\n**❈ Name : ** ( `$Name` )\n**❈ Price : ** ( `$Price Toman` )\n**❈ Seller : ** ( `$Seller` )\n**❈ Date : ** ( `$Date` )\n", 'parse_mode' => 'Markdown', 'reply_to_msg_id' => $msg_id]);
yield $this->sleep(5);}
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "❈** Mobile Not Found!**", 'parse_mode' => 'markdown']);}}
//==================== Random User =====================
if(preg_match('/^\.RUser$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$link = json_decode(file_get_contents("https://randomuser.me/api"), true);
$gen = $link['results']['0']['gender'];
$First = $link['results']['0']['name']['first'];
$last = $link['results']['0']['name']['last'];
$con = $link['results']['0']['location']['country'];
$State = $link['results']['0']['location']['state'];
$city = $link['results']['0']['location']['city'];
$Sname = $link['results']['0']['location']['street']['name'];
$Snum = $link['results']['0']['location']['street']['number'];
$postcode = $link['results']['0']['location']['postcode'];
$email = $link['results']['0']['email'];
$age = $link['results']['0']['dob']['age'];
$phone = $link['results']['0']['phone'];
$Pic = $link['results']['0']['picture']['large'];
yield $this->messages->sendMedia(['peer' => $peer ,'media' => $Pic,'message' => "**❈ Random User :**\n\n**❈ Gender : ** ( `$gen` )\n**❈ First Name : ** ( `$First` )\n**❈ Last Name : ** ( `$last` )\n**❈ Age : ** ( `$age` )\n**❈ Phone : ** ( `$phone` )\n**❈ Country : ** ( `$con` )\n**❈ State : ** ( `$State` )\n**❈ City : ** ( `$city` )\n**❈ Street : ** ( `$Sname - $Snum` )\n**❈ Post Code : ** ( `$postcode` )\n**❈ Email : ** ( `$email` )",'parse_mode' => 'Markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Youtube Down =====================
if(preg_match('/^\.YtV (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
$ch = curl_init("https://api.y2mate.guru/api/convert");
$data['url'] = "$Match[1]";
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch,CURLOPT_NOBODY,FALSE);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
curl_setopt($ch,CURLOPT_AUTOREFERER,1);
curl_setopt($ch,CURLOPT_ENCODING, 'UTF-8');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resultCurl= curl_exec($ch);
curl_close($ch);
$list = json_decode($resultCurl, true);
$Time=$list['meta']['duration'];
$Title=$list['meta']['title'];
$Thumb=$list['thumb'];
for($i=0 ; $i <= count($list['url']) -1 ; $i++){
if ($list['url'][$i]['downloadable'] !== false){
$Url = $list['url'][$i]['url'];}}
$Size = get_headers($Url , true)['Content-Length'];
$Siz = Convert($Size);
$Url= new \danog\MadelineProto\FileCallback($Url,
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
$darsad = Percent($progress,100);
$speed = Convert($speed * 1000000 / 8)."/s";
$time = ConvertTime($time);
$Sizer = Convert(round($progress , 2) * round(($Size / 1024 / 1024) , 2) / 100 * 1024 * 1024);
$Size = Convert($Size);
$lev = round($progress / 4);
$prog1 = str_repeat("●", $lev);
$prog2 = str_repeat("○", 25 - $lev);
$Prog = "$prog1$prog2";
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Uploading ....**\n\n**❈ Progress : **`[$Prog] $darsad%` \n\n**❈ Speed : **( `$speed` )\n\n**❈ Time : **( `$time` )\n\n**❈ Size : **( `$Sizer` ) **Of** ( `$Size` )", 'parse_mode' => 'MarkDown']);});
yield $MadelineProto->messages->sendMedia(['peer' => $peer,'media' => $Url,'message' => "
**❈ Title :** ( `$Title` )
**❈ Time :** ( `$Time` )
**❈ Size :** ( `$Siz` )
" ,'parse_mode' => 'Markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Please Try Again!**", 'parse_mode' => 'markdown']);}
//==================== Slow Mode =====================
if(preg_match('/^\.Slow 10s|30s|1m|5m|15m|1h|off$/usi', $text,$Match)){
$Vor = [["10s","30s","1m","5m","15m","1h"]];
$Keyor = [["10","30","60","300","900","3600"]];
$zaman = str_replace($Vor[array_rand($Vor)],$Keyor[array_rand($Keyor)],$Match[1]);
if ($Me != 'off'){
yield $this->channels->toggleSlowMode(['channel' => $peer, 'seconds' => "$zaman" ]);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Slow Mode Has Been Actived For **( `$Match[1]` )** !**",'parse_mode'=>"MarkDown"]);
}else {
yield $this->channels->toggleSlowMode(['channel' => $peer, 'seconds' => "0" ]);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Slow Mode Has Been DeActived!**",'parse_mode'=>"MarkDown"]);}}
//==================== Inline Panel =====================
if(preg_match('/^\.Panel$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`", 'parse_mode' => 'markdown']);
file_put_contents("Files/Panelid.txt","$peer");
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devabolikosnell_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Inline Edit Photo =====================
if(preg_match('/^\.SEdit$/usi', $text,$Match)){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
 if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
yield $this->downloadToFile($Get , "Files/EditPhoto.jpg");
unlink("Files/EditPhoto.jpg");
yield $this->downloadToFile($Get , "Files/EditPhoto.jpg");
file_put_contents("Files/ChatEditPhoto.txt", "$peer");
if ($type == 'supergroup' or $type == 'channel') {
$Rep = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['id'];
} else {
$Rep = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['id'];}
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devabolieditphoto_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'reply_to_msg_id' => $Rep, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Set Enemy =====================
if(preg_match('/^\.Enemy|SetEnemy$/usi', $text)){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
$Get = yield $this->getFullInfo($Get);
$Me = $Get['User'];
$iD = $Me['id'];
$Name = $Me['first_name'];
file_put_contents("Files/Enemyid.txt","$iD");
file_put_contents("Files/Enemyname.txt","$Name");
file_put_contents("Files/Enemypeer.txt","$peer");
if ($type == 'supergroup' or $type == 'channel') {
$Rep = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['id'];
} else {
$Rep = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['id'];}
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devabolisetEnemy_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'reply_to_msg_id' => $Rep, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Del Enemy =====================
if(preg_match('/^\.DelEnemy$/usi', $text)){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['users'][0]['id'];}
$Get = yield $this->getFullInfo($Get);
$Me = $Get['User'];
$Name = $Me['first_name'];
file_put_contents("Files/DelEnemyid.txt","$Get");
file_put_contents("Files/DelEnemyname.txt","$Name");
file_put_contents("Files/DelEnemypeer.txt","$peer");
if ($type == 'supergroup' or $type == 'channel') {
$Rep = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['id'];
} else {
$Rep = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['id'];}
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devabolidelEnemy_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'reply_to_msg_id' => $Rep, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Set Enemy =====================
if(preg_match('/^\.Enemy|SetEnemy (.*)$/usi', $text, $Match)){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
$Get = yield $this->getFullInfo($Match[1]);
$Me = $Get['User'];
$iD = $Me['id'];
$Name = $Me['first_name'];
file_put_contents("Files/Enemyid.txt","$iD");
file_put_contents("Files/Enemyname.txt","$Name");
file_put_contents("Files/Enemypeer.txt","$peer");
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devabolisetEnemy_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Del Enemy =====================
if(preg_match('/^\.DelEnemy (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
$Get = yield $this->getFullInfo($Match[1]);
$Me = $Get['User'];
$iD = $Me['id'];
$Name = $Me['first_name'];
file_put_contents("Files/DelEnemyid.txt","$iD");
file_put_contents("Files/DelEnemyname.txt","$Name");
file_put_contents("Files/DelEnemypeer.txt","$peer");
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devabolidelEnemy_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Enemty List =====================
if(preg_match('/^\.EnemyList|ListEnemy$/usi', $text)){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
file_put_contents("Files/EnemyListpeer.txt","$peer");
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devaboliEnemyList_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Clean Enemty List =====================
if(preg_match('/^\.Clean EnemyList|CleanEnemyList$/usi', $text)){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
file_put_contents("Files/EnemyListpeer.txt","$peer");
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devaboliclEnemyList_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Set Quicks =====================
if(preg_match('/^\.Quick \'(.*)\' (.*)$/usi', $text, $Match)){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
file_put_contents("Files/QuickCmd.txt","$Match[1]");
file_put_contents("Files/QuickJavab.txt","$Match[1]");
file_put_contents("Files/QuickPeer.txt","$peer");
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devaboliquicks_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Set Quicks Sticker =====================
if(preg_match('/^\.Quick (.*)$/usi', $text, $Match)){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]]);
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]]);}
$Rep = $Get['messages'][0]['id'];
$Media = $Get['messages'][0]['media'] ?? null;
file_put_contents("Files/QuickStickerCmd.txt","$Match[1]");
file_put_contents("Files/QuickStickerMedia.txt", $Media);
file_put_contents("Files/QuickStickerPeer.txt","$peer");
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devaboliquicksticker_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'reply_to_msg_id' => $Rep, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Del Quicks =====================
if(preg_match('/^\.DelQuick (.*)$/usi', $text, $Match)){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
file_put_contents("Files/DelQuick.txt","$Match[1]");
file_put_contents("Files/DelQuickPeer.txt","$peer");
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devabolidelquicks_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Quicks List =====================
if(preg_match('/^\.QuickList$/usi', $text)){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
file_put_contents("Files/QuickListPeer.txt","$peer");
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devaboliquickList_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Clean Quicks List =====================
if(preg_match('/^\.CleanQuickList$/usi', $text)){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "`❈ Processing ...!`",'parse_mode'=>"MarkDown"]);
file_put_contents("Files/QuickListPeer.txt","$peer");
$BotResults = yield $this->messages->getInlineBotResults(['bot' => "@SirArazBot", 'peer' => $peer, 'query' => "devaboliCleanquickList_", 'offset' => '0']);
$query_id = $BotResults['query_id'];
$query_res_id = $BotResults['results'][0]['id'];
yield $this->messages->sendInlineBotResult(['peer' => $peer, 'query_id' => $query_id, 'id' => "$query_res_id"]);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Send Stickers =====================
if(!empty($data['AnswerMediaSAll'])){
foreach($data['AnswerMediaSAll'] as $i => $Media){
if(strpos($text, $i)!== false){
$QTime = $data['QuickTime'];
yield $this->sleep($QTime);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);}}}
//==================== Send Stickers =====================
if(!empty($data['AnswerMediaSGp'])){
foreach($data['AnswerMediaSGp'] as $i => $Media){
if(strpos($text, $i)!== false){
if ($type == 'supergroup' or $type == 'chat') {
$QTime = $data['QuickTime'];
yield $this->sleep($QTime);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);}}}}
//==================== Send Stickers =====================
if(!empty($data['AnswerMediaSPv'])){
foreach($data['AnswerMediaSPv'] as $i => $Media){
if(strpos($text, $i)!== false){
if ($type == 'user') {
$QTime = $data['QuickTime'];
yield $this->sleep($QTime);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);}}}}
//==================== Send Stickers =====================
if(!empty($data['AnswerMediaSHere'][$peer])){
foreach($data['AnswerMediaSHere'][$peer] as $i => $Media){
if(strpos($text, $i)!== false){
$QTime = $data['QuickTime'];
yield $this->sleep($QTime);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerSMAll'])){
foreach($data['AnswerSMAll'] as $i => $List){
if(strpos($text, $i)!== false){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
foreach($List as $item){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerSMGp'])){
foreach($data['AnswerSMGp'] as $i => $List){
if(strpos($text, $i)!== false){
if ($type == 'supergroup' or $type == 'caht'){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
foreach($List as $item){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerSMPv'])){
foreach($data['AnswerSMPv'] as $i => $List){
if(strpos($text, $i)!== false){
if ($type == 'user'){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
foreach($List as $item){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerSMHere'][$peer])){
foreach($data['AnswerSMHere'][$peer] as $i => $List){
if(strpos($text, $i)!== false){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
foreach($List as $item){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerSEAll'])){
foreach($data['AnswerSEAll'] as $i => $List){
if(strpos($text, $i)!== false){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
foreach($List as $item){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $item,'parse_mode'=>"MarkDown"]);
yield $this->sleep($Sleep);}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerSEGp'])){
foreach($data['AnswerSEGp'] as $i => $List){
if(strpos($text, $i)!== false){
if ($type == 'supergroup' or $type == 'caht'){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
foreach($List as $item){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $item,'parse_mode'=>"MarkDown"]);
yield $this->sleep($Sleep);}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerSEPv'])){
foreach($data['AnswerSEPv'] as $i => $List){
if(strpos($text, $i)!== false){
if ($type == 'user'){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
foreach($List as $item){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $item,'parse_mode'=>"MarkDown"]);
yield $this->sleep($Sleep);}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerSEHere'][$peer])){
foreach($data['AnswerSEHere'][$peer] as $i => $List){
if(strpos($text, $i)!== false){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
foreach($List as $item){
 yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $item,'parse_mode'=>"MarkDown"]);
yield $this->sleep($Sleep);}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerSRAll'])){
foreach($data['AnswerSRAll'] as $i => $List){
if(strpos($text, $i)!== false){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
$item = $List[array_rand($List)];
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerSRGp'])){
foreach($data['AnswerSRGp'] as $i => $List){
if(strpos($text, $i)!== false){
if ($type == 'supergroup' or $type == 'caht'){
$Sleep = $data['QuickTime'];
$List = $data['AnswerSRGp'][$text];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
$item = $List[array_rand($List)];
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerSRPv'])){
foreach($data['AnswerSRPv'] as $i => $List){
if(strpos($text, $i)!== false){
if ($type == 'user'){
$Sleep = $data['QuickTime'];
$List = $data['AnswerSRPv'][$text];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
$item = $List[array_rand($List)];
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerSRHere'][$peer])){
foreach($data['AnswerSRHere'][$peer] as $i => $List){
if(strpos($text, $i)!== false){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
$item = $List[array_rand($List)];
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}
//==================== Spam =====================
if (isset($replyToid)) {
if(preg_match('/^\.Spam (.*)$/usi', $text, $Match)){
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0];}
$GetData = [
'message' => $Get['message'] ?? '',
'peer' => $peer,
'entities' => $Get['entities'] ?? [],
];
for ($i = 1; $i <= $Match[1]; $i++) {
if ($this->hasMedia($Get, false)) {
$GetData['media'] = $Get;
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
yield $this->messages->sendMedia($GetData);
} else {
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
yield $this->messages->sendMessage($GetData);}}}
}elseif(preg_match('/^\.Spam (.*)$/usi', $text, $Match)){
$count = 0;
for ($i = 1; $i <= $Match[1]; $i++) {
$count++;
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "$count",'parse_mode' => 'markdown']);}}
//==================== Calc =====================
if(preg_match('/^\.Calc (.*)$/usi', $text, $Match)){
eval("\$Result = $Match[1];");
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Result : **( `$Result` )",'parse_mode'=>"MarkDown"]);}
//==================== Rename =====================
if(preg_match('/^\.Rename (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
$Size = yield $this->getDownloadInfo($Get)['size'];
$ext = yield $this->getDownloadInfo($Get)['ext'];
$Name = yield $this->getDownloadInfo($Get)['name'];
yield $this->downloadToFile($Get, new \danog\MadelineProto\FileCallback("Files/Rename/$Name$ext",
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
static $prev = 0;
$now = \time();
if($now - $prev < 10 && $progress < 100){ return;}
$prev = $now;
$darsad = Percent($progress,100);
$speed = Convert($speed * 1000000 / 8)."/s";
$time = ConvertTime($time);
$Sizer = Convert(round($progress , 2) * round(($Size / 1024 / 1024) , 2) / 100 * 1024 * 1024);
$Size = Convert($Size);
$lev = round($progress / 4);
$prog1 = str_repeat("●", $lev);
$prog2 = str_repeat("○", 25 - $lev);
$Prog = "$prog1$prog2";
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Downloading ....**\n\n**❈ Progress : **`[$Prog] $darsad%` \n\n**❈ Speed : **( `$speed` )\n\n**❈ Time : **( `$time` )\n\n**❈ Size : **( `$Sizer` ) **Of** ( `$Size` )\n\n", 'parse_mode' => 'MarkDown']);}));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Download Was Done!**\n\n**❈ Please Wait For Renaming ... !**", 'parse_mode' => 'MarkDown']);
rename("Files/Rename/$Name$ext" , "Files/Rename/$Match[1]$ext");
$File = "Files/Rename/$Match[1]$ext";
$Size = filesize($File);
yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedDocument','file' => new \danog\MadelineProto\FileCallback("$File",
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
static $prev = 0;
$now = \time();
if($now - $prev < 10 && $progress < 100){
return;}
$prev = $now;
$darsad = Percent($progress,100);
$speed = Convert($speed * 1000000 / 8)."/s";
$time = ConvertTime($time);
$Sizer = Convert(round($progress , 2) * round(($Size / 1024 / 1024) , 2) / 100 * 1024 * 1024);
$Size = Convert($Size);
$lev = round($progress / 4);
$prog1 = str_repeat("●", $lev);
$prog2 = str_repeat("○", 25 - $lev);
$Prog = "$prog1$prog2";
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Uploading ....**\n\n**❈ Progress : **`[$Prog] $darsad%` \n\n**❈ Speed : **( `$speed` )\n\n**❈ Time : **( `$time` )\n\n**❈ Size : **( `$Sizer` ) **Of** ( `$Size` )", 'parse_mode' => 'MarkDown']);}), 'attributes' => [['_' => 'documentAttributeFilename', 'file_name' => $Me . $ext]]],'message' => "**❈ Name : **( `$Me$ext` )",'parse_mode' => 'Markdown']);
unlink($File);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Unzip =====================
if(preg_match('/^\.Unzip$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['document'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media']['document'];}
$Rand = rand(11111111,99999999);
if (!is_dir("Files/ZipFiles/Unzip/$Rand")){mkdir("Files/ZipFiles/Unzip/$Rand");}
$Size = yield $this->getDownloadInfo($Get)['size'];
yield $this->downloadToFile($Get, new \danog\MadelineProto\FileCallback("Files/ZipFiles/Unzip/$Rand/$Rand.zip",
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
$darsad = Percent($progress,100);
$speed = Convert($speed * 1000000 / 8)."/s";
$time = ConvertTime($time);
$Sizer = Convert(round($progress , 2) * round(($Size / 1024 / 1024) , 2) / 100 * 1024 * 1024);
$Size = Convert($Size);
$lev = round($progress / 4);
$prog1 = str_repeat("●", $lev);
$prog2 = str_repeat("○", 25 - $lev);
$Prog = "$prog1$prog2";
try {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Downloading ....**\n\n**❈ Progress : **`[$Prog] $darsad%` \n\n**❈ Speed : **( `$speed` )\n\n**❈ Time : **( `$time` )\n\n**❈ Size : **( `$Sizer` ) **Of** ( `$Size` )\n\n", 'parse_mode' => 'MarkDown']);
} catch (\Throwable $e) {}}));
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Download Was Done!**\n\n**❈ Please Wait While The Files Are Being Extracted ... !**", 'parse_mode' => 'MarkDown']);
Unzip("Files/ZipFiles/Unzip/$Rand/$Rand.zip","Files/ZipFiles/Unzip/$Rand");
unlink("Files/ZipFiles/Unzip/$Rand/$Rand.zip");
$File = SendFilesZip("Files/ZipFiles/Unzip/$Rand");
$Size = filesize($File);
$nam = basename($File);
yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedDocument','file' => new \danog\MadelineProto\FileCallback("$File",
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
static $prev = 0;
$now = \time();
if($now - $prev < 10 && $progress < 100){
return;}
$prev = $now;
$darsad = Percent($progress,100);
$speed = Convert($speed * 1000000 / 8)."/s";
$time = ConvertTime($time);
$Sizer = Convert(round($progress , 2) * round(($Size / 1024 / 1024) , 2) / 100 * 1024 * 1024);
$Size = Convert($Size);
$lev = round($progress / 4);
$prog1 = str_repeat("●", $lev);
$prog2 = str_repeat("○", 25 - $lev);
$Prog = "$prog1$prog2";
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Uploading ....**\n\n**❈ Progress : **`[$Prog] $darsad%` \n\n**❈ Speed : **( `$speed` )\n\n**❈ Time : **( `$time` )\n\n**❈ Size : **( `$Sizer` ) **Of** ( `$Size` )", 'parse_mode' => 'MarkDown']);}), 'attributes' => [['_' => 'documentAttributeFilename', 'file_name' => $nam]]],'message' => "**❈ Name : **( `$File` )",'parse_mode' => 'Markdown']);
Rrmdir("Files/ZipFiles/Unzip/$Rand");
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Create Zip =====================
if(preg_match('/^\.CreatZip (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
$info = yield $this->getDownloadInfo($Get);
$Name = $info['name'];
$ext = $info['ext'];
$Preg = preg_replace('/(\_(\d+))/ius', null, $Name);
$esm = $Preg . $ext;
$Size = $info['size'];
yield $this->downloadToFile($Get, new \danog\MadelineProto\FileCallback("Files/ZipFiles/Zip/$esm",
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
static $prev = 0;
$now = \time();
if($now - $prev < 10 && $progress < 100){ return;}
$prev = $now;
$darsad = Percent($progress,100);
$speed = Convert($speed * 1000000 / 8)."/s";
$time = ConvertTime($time);
$Sizer = Convert(round($progress , 2) * round(($Size / 1024 / 1024) , 2) / 100 * 1024 * 1024);
$Size = Convert($Size);
$lev = round($progress / 4);
$prog1 = str_repeat("●", $lev);
$prog2 = str_repeat("○", 25 - $lev);
$Prog = "$prog1$prog2";
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Downloading ....**\n\n**❈ Progress : **`[$Prog] $darsad%` \n\n**❈ Speed : **( `$speed` )\n\n**❈ Time : **( `$time` )\n\n**❈ Size : **( `$Sizer` ) **Of** ( `$Size` )\n\n", 'parse_mode' => 'MarkDown']);}));
$zip = new ZipArchive();
$zip->open("Files/ZipFiles/Zip/$Match[1]", ZipArchive::CREATE);
$zip->addFile("Files/ZipFiles/Zip/$esm", "$esm");
$zip->close();
unlink("Files/ZipFiles/Zip/$esm");
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ A New Zip File Named **( `$Match[1]` )** Was Built And This File Added To Zip File!**", 'parse_mode' => 'MarkDown']);}
//==================== Add Zip =====================
if(preg_match('/^\.AddZip (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['media'];}
$info = yield $this->getDownloadInfo($Get);
$Name = $info['name'];
$ext = $info['ext'];
$M = preg_replace('/(\_(\d+))/ius', null, $Name);
$esm = "$M$ext";
$Size = $info['size'];
yield $this->downloadToFile($Get,
new \danog\MadelineProto\FileCallback(
"Files/ZipFiles/Zip/$esm",
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
static $prev = 0;
$now = \time();
if($now - $prev < 10 && $progress < 100){
return;}
$prev = $now;
$darsad = Percent($progress,100);
$speed = Convert($speed * 1000000 / 8)."/s";
$time = ConvertTime($time);
$Sizer = Convert(round($progress , 2) * round(($Size / 1024 / 1024) , 2) / 100 * 1024 * 1024);
$Size = Convert($Size);
$lev = round($progress / 4);
$prog1 = str_repeat("●", $lev);
$prog2 = str_repeat("○", 25 - $lev);
$Prog = "$prog1$prog2";
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Downloading ....**\n\n**❈ Progress : **`[$Prog] $darsad%` \n\n**❈ Speed : **( `$speed` )\n\n**❈ Time : **( `$time` )\n\n**❈ Size : **( `$Sizer` ) **Of** ( `$Size` )\n\n", 'parse_mode' => 'MarkDown']);}));
$zip = new ZipArchive();
if ($zip->open("Files/ZipFiles/Zip/$Match[1]") === TRUE) {
$zip->addFile("Files/ZipFiles/Zip/$esm", "$esm");
$zip->close();}
unlink("Files/ZipFiles/Zip/$esm");
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This File Was Added To Zip Named** ( `$Match[1]` )", 'parse_mode' => 'MarkDown']);}
//==================== Send Zip =====================
if(preg_match('/^\.SendZip (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
$Size = filesize("Files/ZipFiles/Zip/$Match[1]");
yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedDocument','file' => new \danog\MadelineProto\FileCallback("Files/ZipFiles/Zip/$Match[1]",
function ($progress, $speed, $time) use ($Size,$peer,$msg_id) {
static $prev = 0;
$now = \time();
if($now - $prev < 10 && $progress < 100){
return;}
$prev = $now;
$darsad = Percent($progress,100);
$speed = Convert($speed * 1000000 / 8)."/s";
$time = ConvertTime($time);
$Sizer = Convert(round($progress , 2) * round(($Size / 1024 / 1024) , 2) / 100 * 1024 * 1024);
$Size = Convert($Size);
$lev = round($progress / 4);
$prog1 = str_repeat("●", $lev);
$prog2 = str_repeat("○", 25 - $lev);
$Prog = "$prog1$prog2";
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Uploading ....**\n\n**❈ Progress : **`[$Prog] $darsad%` \n\n**❈ Speed : **( `$speed` )\n\n**❈ Time : **( `$time` )\n\n**❈ Size : **( `$Sizer` ) **Of** ( `$Size` )", 'parse_mode' => 'MarkDown']);}), 'attributes' => [['_' => 'documentAttributeFilename', 'file_name' => $Me]]],'message' => "**❈ Name : **( `$Match[1]` )",'parse_mode' => 'Markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
//==================== Del Zip =====================
if(preg_match('/^\.DelZip (.*)$/usi', $text, $Match)){
unlink("Files/ZipFiles/Zip/$Match[1]");
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ This Zip Named** ( `$Match[1]` ) **Was Deleted!**", 'parse_mode' => 'MarkDown']);}
//==================== Zip List =====================
if(preg_match('/^\.ZipList$/usi', $text)){
$List = "**❈ Zip List : **\n\n";
$Conter = 1;
$directory = "Files/ZipFiles/Zip";
foreach(array_diff(scandir($directory), array('..', '.')) as $Out){
$List .= "**$Conter : **( `$Out` )\n";
$Conter++;
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $List, 'parse_mode' => 'markdown' ]);}}
//==================== Clean Zip List =====================
if(preg_match('/^\.CleanZipList$/usi', $text)){
$directory = "Files/ZipFiles/Zip";
foreach(array_diff(scandir($directory), array('..', '.')) as $Out){
unlink("Files/ZipFiles/Zip/$Out");}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Zip List Was Cleard!**", 'parse_mode' => 'markdown' ]);}
//==================== Run Codes =====================
if (preg_match('/^\/Run ?(.*)$/usi', $text, $Match)) {
$Result = null;
$Errors = null;
$Match[1] = "return (function () use (&\$update, &\$peer, &\$msg_id, &\$data, &\$Member, &\$text, &\$from_id, &\$replyToid, &\$type){{$Match[1]}})();";
ob_start();
try {
(yield eval($Match[1]));
$Result .= ob_get_contents();
} catch (\Throwable $e) {
$Errors .= $e->getMessage() . ' •> on line ' . $e->getLine();}
ob_end_Clean();
if (empty($Result) && !empty($Errors)){
$e = "**❈ Errors :**\n `$Errors`";
yield $this->messages->sendMessage(['peer'=> $peer,'message' => $e,'reply_to_msg_id' => $msg_id,'parse_mode' => 'markdown']);
} elseif (!empty($Result)){
$answer = "**❈ Results :**\n `$Result`";
yield $this->messages->sendMessage(['peer'=> $peer,'message' => $answer,'reply_to_msg_id' => $msg_id,'parse_mode' => 'markdown']);}}
//==================== Send Log =====================
if(preg_match('/^\.SendLog$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Logs Send For You ...!**", 'parse_mode' => 'MarkDown']);
yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedDocument','file' => "MadelineProto.log",'attributes' => [['_' => 'documentAttributeFilename', 'file_name' => "MadelineProto.log"]]]]);}
//==================== Search =====================
if(preg_match('/^\.Get(.*) ?(.*)?$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
if(preg_match('/All|Music|Musics|Video|Videos|File|Files|Photo|Photos|Contact|Contacts|Gif|Gifs|Voice|Voices|Pin|Pins|Url|Urls|RVideo|RVideos|RVoice|RVoices/usi', $Match[1])){
$Req = ['/All/usi' , '/Music|Musics/usi' , '/Video|Videos/usi' , '/File|Files/usi' , '/Photo|Photos/usi' , '/Contact|Contacts/usi' , '/Gif|Gifs/usi' , '/Voice|Voices/usi' , '/Pin|Pins/usi' , '/Url|Urls/usi' , '/RVideo|RVideos/usi' , '/RVoice|RVoices/usi'];
$Parametr = ['Empty' , 'Music' , 'Video' , 'Document' , 'Photos' , 'Contacts' , 'Gif' , 'Voice' , 'Pinned' , 'Url' , 'RoundVideo' , 'RoundVoice'];
$Mode = preg_replace($Req , $Parametr , $Match[1]);
$Conter = 1;
$Request = isset($Match[2]) ? $Match[2] : '';
$Text = "**❈ Search $Mode Completed!**\n**❈ Request :** ( `$Request` )\n\n";
$Res = yield $this->messages->search(['peer' => $peer, 'q' => $Request, 'filter' => ['_' => "inputMessagesFilter$Mode"], 'min_date' => -1, 'max_date' => -1, 'offset_id' => $msg_id, 'add_offset' => 0, 'limit' => 100, 'max_id' => $msg_id, 'min_id' => 0,]);
foreach ($Res['messages'] as $Value){
$Msgid = $Value['id'];
$iD = str_replace('-100','',$peer);
if ($Conter < 50){
$List[] = "**• $Conter : **( https://t.me/c/$iD/$Msgid )\n";
$Conter++;}}
if(!empty($List)){
foreach($List as $Res){
$Text .= $Res;
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => $List, 'parse_mode' => 'MarkDown']);}
}else {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ No Result For Your Request!**", 'parse_mode' => 'MarkDown']);}
}else {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Filter Not Found!**", 'parse_mode' => 'MarkDown']);}}
//==================== Edit Channel =====================
if(preg_match('/^\.EditCh (.*) (.*)\|(.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
$Vorod = explode(',' , $Match[2]);
$Khorog = explode(',' , $Match[2]);
$Count = 0;
$offsetiD = 1;
$Limit = 100;
$addoffset = false;
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Messages in Channel :** ( `$Match[1]` ) **Was Extracted!**\n`❈ Starting Edit Channel ... !`", 'parse_mode' => 'MarkDown']);
do{
$GetHistory = yield $this->messages->getHistory(['peer'=> $Match[1],'offset_id' => $offsetiD,'offset_date' => 0,'add_offset'=> (!$addoffset) ? -1 * $Limit : -1 * $Limit -1,'Limit' => $Limit,'max_id'=> 0,'min_id'=> 0,'hash'=> 0])['messages'];
if (count($GetHistory) == 0) break;
$offsetiD = $GetHistory[0]['id'];
if (!$addoffset) $addoffset = true;
foreach(array_reverse($GetHistory) as $Message){
if ($Message['_'] === 'message') {
$Result = $Message['message'];
for ($i = 0; $i < count($Vorod) ; $i++) {
$Past = $Vorod[$i];
$New = $Khorog[$i];
if (preg_match("/$Past/usi" , $Result)){
$Result = preg_replace("/$Past/usi" , $New , $Result);
yield $this->messages->editMessage(['id' => $Message['id'] , 'message' => $Result, 'peer' => $Match[1]]);
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Word :** ( `$Past` ) **Replaced For Word **( `$New` )", 'parse_mode' => 'MarkDown']);}}}}
yield $this->sleep(2);
}while(true);
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Copmpleted Edit Channel!**\n❈ ( `$Count` )** Mesaage in Channel** ( `$Match[1]` ) **Was Edited!**", 'parse_mode' => 'MarkDown']);}
//==================== Copy Channel =====================
if(preg_match('/^\.CopyCh (.*) (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
try { $info = yield $this->getFullInfo($Match[2]); } catch (\Throwable $e){}
if (isset($info['Chat']) or isset($info['User'])){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ The Channel For Username **( `$Match[2]` ) **Already Created!**\n `❈ Starting Copy Channel .... !`", 'parse_mode' => 'MarkDown']);
}else {
$ch = yield $this->channels->createChannel(['broadcast' => true, 'megagroup' => false, 'title' => str_replace('@','',$Match[2]) ,'about' => "❈ This Channel Copyied From : ( $Match[1] )"]);
yield $this->channels->updateUsername(['channel' => "-100".$ch['updates'][1]['channel_id'] , 'username' => str_replace("@", "", $Match[2])]);
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ The Channel For Username **( `$Match[2]` ) **Successfuli Created!**\n `❈ Starting Copy Channel .... !`", 'parse_mode' => 'MarkDown']);}
$Count = 0;
$offsetiD = 1;
$Limit = 100;
$addoffset = false;
do{
$GetHistory = yield $this->messages->getHistory(['peer'=> $Match[1],'offset_id' => $offsetiD,'offset_date' => 0,'add_offset'=> (!$addoffset) ? -1 * $Limit : -1 * $Limit -1,'Limit' => $Limit,'max_id'=> 0,'min_id'=> 0,'hash'=> 0])['messages'];
if (count($GetHistory) == 0) break;
$offsetiD = $GetHistory[0]['id'];
if (!$addoffset) $addoffset = true;
foreach(array_reverse($GetHistory) as $Message){
if ($Message['_'] === 'message') {
$Result = $Message['message'];
if(!empty($data['CFilter'])){
foreach($data['CFilter'] as $Key => $Value){
if (preg_match("/$Key/usi" , $Result)){
$Result = preg_replace("/$Key/usi" , $Value , $Result);}}}
$GetData = ['message' => $Result ?? '', 'peer' => $Match[2], 'entities' => $Message['entities'] ?? []];
if ($this->hasMedia($Message, false)) {
$GetData['media'] = $Message;
yield $this->messages->sendMedia($GetData);
yield $this->sleep(1);
$Count++;
} else {
yield $this->messages->sendMessage($GetData);
yield $this->sleep(1);
$Count++;}}}
yield $this->sleep(2);
}while(true);
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Copmpleted Copy Channel!**\n❈ ( `$Count` )** Mesaage in Channel** ( `$Match[1]` ) **Copied To Channel** ( `$Match[2]` )", 'parse_mode' => 'MarkDown']);}
//==================== Add CFilter =====================
if(preg_match('/^\.AddCFilter (.*) (.*)$/usi', $text, $Match)){
if (!in_array($Match[1] , $data['CFilter'])) {
$data['CFilter'][$Match[1]] = $Match[2];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Word** ( `$Match[1]` )** Replaced For Word** ( `$Match[2]` ) **in Copy Channel!**", 'parse_mode' => 'MarkDown']);}
//==================== Del CFilter =====================
if(preg_match('/^\.DelCFilter (.*)$/usi', $text, $Match)){
if (in_array($Match[1], $data['CFilter'])) {
$ter = array_search($Match[1], $data['CFilter']);
unset($data['CFilter'][$ter]);
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Word** ( `$Match[1]` )** Deleted in CFilter List!**", 'parse_mode' => 'markdown' ]);}
//==================== CFilter List =====================
if(preg_match('/^\.CFilterList$/usi', $text)){
if (!empty($data['CFilter'])) {
$List = "**❈ CFilter List : **\n\n";
$Conter = 1;
foreach($data['CFilter'] as $Out => $Match){
$List .= "**$Conter : **( `$Out` ) -> ( `$Match` )\n";
$Conter++;}
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $List, 'parse_mode' => 'markdown' ]);
}else {
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ CFilter List is Empty!**", 'parse_mode' => 'markdown' ]);}}
//==================== Clean CFilter List =====================
if(preg_match('/^\.CleanCFilterList$/usi', $text)){
$data['CFilter'] = [];
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ CFilter List Was Cleard!**", 'parse_mode' => 'markdown' ]);}
//==================== Extract Members =====================
if(preg_match('/^\.Extract$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
$Get = yield $this->getPwrChat($peer);
$i = 0;
foreach($Get['participants'] as $Key) {
$iD = $Key['user']['id'];
if(!in_array($iD, $Member['List'])) {
$Member['List'][] = $iD;
file_put_contents("Files/Member.json", json_encode($Member , JSON_PRETTY_PRINT));
$i++;
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "❈ ( `$i` ) **Member Were Extracted And Added To The List!**", 'parse_mode' => 'MarkDown']);}}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Completed!**\n❈ ( `$i` ) **Member Were Extracted And Added To The List!**", 'parse_mode' => 'MarkDown']);}
//==================== Del Extract =====================
if(preg_match('/^\.DelExtract$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
$chat = yield $this->getPwrChat($peer);
$i = 0;
foreach($chat['participants'] as $pars) {
$iD = $pars['user']['id'];
if (in_array($iD, $Member['List'])) {
$ter = array_search($iD, $Member['List']);
unset($Member['List'][$ter]);
file_put_contents("Files/Member.json", json_encode($Member , JSON_PRETTY_PRINT));
$i++;
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "❈ ( `$i` ) **Member Were Extracted And Deleted in The List!**", 'parse_mode' => 'MarkDown']);}}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Completed!**\n❈ ( `$i` ) **Member Were Extracted And Deleted in The List!**", 'parse_mode' => 'MarkDown']);}
//==================== Extracts List =====================
if(preg_match('/^\.Extracts$/usi', $text)){
$count = count($Member['List']);
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Extracts Members Count :** ( `$count` )", 'parse_mode' => 'markdown' ]);}
//==================== Clean Extracts List =====================
if(preg_match('/^\.CleanExtracts$/usi', $text)){
$Member['List'] = [];
file_put_contents("Files/Member.json", json_encode($Member , JSON_PRETTY_PRINT));
yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "**❈ Extract Members List Was Cleard!**", 'parse_mode' => 'markdown' ]);}
//==================== Extract Members =====================
if(preg_match('/^\.AddMem (.*)$/usi', $text, $Match)){
$i = 1;
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Starting ... !`**❈ Extract Members invited To This Group!**", 'parse_mode' => 'MarkDown']);
do{
foreach($Member['List'] as $User){
yield $this->channels->inviteToChannel(['channel' => $peer, 'users' => [$User]]);
$i++;}
}while ($i != $Match[1]);
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Completed!**\n❈ ( `$i` ) **Member invited To This Group!**", 'parse_mode' => 'MarkDown']);}
//==================== Transfer Members =====================
if(preg_match('/^\.Transfer (.*)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
$Gpinf = yield $this->getFullInfo($Match[1]);
$gid = $Gpinf['Chat']['id'];
try {
$chat = yield $this->getPwrChat($peer);
$i = 0;
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Starting .... !`**❈ Members Were Transferd To Another Group!**", 'parse_mode' => 'MarkDown']);
foreach($chat['participants'] as $pars) {
$iD = $pars['user']['id'];
yield $this->channels->inviteToChannel(['channel' => $gid, 'users' => [$iD]]);
$i++;}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Completed!**\n❈ ( `$i` ) **Member Were Transferd To Another Group!**", 'parse_mode' => 'MarkDown']);
}catch (\Throwable $e){
if($e->getMessage() == 'PEER_FLOOD'){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ You Are Limited!**\n❈ ( `$i` ) **Member Were Transferd To Another Group!**", 'parse_mode' => 'MarkDown']);}}}
//==================== Actions =====================
if(preg_match('/^\.SA (\w+) (\d+)$/usi', $text, $Match)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
if(preg_match('/Type|Typing|Game|GamePlay|RVideo|RecordVideo|UVideo|UploadVideo|RecordAudio|RAudio|UploadAudio|UAudio|UploadPhoto|UPhoto|UploadDocument|UploadDoc|UDoc|GeoLocation|GeoLoc|ChooseContact|CContact|RecordRound|RRound|UploadRound|URound/usi', $Match[1])){
$Req = ['/Type|Typing/usi' , '/Game|GamePlay/usi' , '/RVideo|RecordVideo/usi' , '/UVideo|UploadVideo/usi' , '/RecordAudio|RAudio/usi' , '/UploadAudio|UAudio/usi' , '/UploadPhoto|UPhoto/usi' , '/UploadDocument|UploadDoc|UDoc/usi' , '/GeoLocation|GeoLoc/usi' , '/ChooseContact|CContact/usi' , '/RecordRound|RRound/usi' , '/UploadRound|URound/usi'];
$Parametr = ['Typing' , 'GamePlay' , 'RecordVideo' , 'UploadVideo' , 'RecordAudio' , 'UploadAudio' , 'UploadPhoto' , 'UploadDocument' , 'GeoLocation' , 'ChooseContact' , 'RecordRound', 'UploadRound'];
$Actions = preg_replace($Req , $Parametr , $Match[1]);
if(preg_match('/Upload/usi' , $Actions)){ $Action = ['_' => "sendMessage$Actions" . "Action" , 'progress' => 17]; } else { $Action = ['_' => "sendMessage$Actions" . "Action"];}
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Sending Action **( `$Actions` )** For **( `$Match[2]` ) **Second On This Chat!**", 'parse_mode' => 'MarkDown']);
do {
yield $this->messages->setTyping(['peer' => $peer, 'action' => $Action]);
$Match[2]--;
yield $this->sleep(1);
}while($Match[2] != 0);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
}else {
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "**❈ Action Not Found!**", 'parse_mode' => 'MarkDown']);}}
//==================== Updates =====================
if(preg_match('/^\.SUpdates$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
if ($type == 'supergroup' or $type == 'channel') {
$Result = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]]);
} else {
$Result = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]]);}
file_put_contents("Files/Updates.txt", json_encode($Result , JSON_PRETTY_PRINT));
yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedDocument','file' => "Files/Updates.txt",'attributes' => [['_' => 'documentAttributeFilename', 'file_name' => "Updates.txt"]]],'message' => "**❈ List Of Updates!**", 'parse_mode' => 'markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}
unlink("Files/Updates.txt");}
//==================== Logs =====================
if(preg_match('/^\.SLogs$/usi', $text)){
yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "`❈ Processing ...!`", 'parse_mode' => 'MarkDown']);
yield $this->messages->sendMedia(['peer' => $peer,'media' => ['_' => 'inputMediaUploadedDocument','file' => "Files/Logs.txt",'attributes' => [['_' => 'documentAttributeFilename', 'file_name' => "Logs.txt"]]],'message' => "**❈ List Of Logs!**", 'parse_mode' => 'markdown']);
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}


}//پایان ادمینی

if($from_id != $Sudo && !in_array($from_id, $data['BlackList']) && !in_array($peer, $data['BotMode']) && $peer != '-1001147515146') {
//==================== Del Files =====================
if($update){
$List = glob('Files/Flood*.txt');
foreach ($List as $item) {
unlink($item);}
$lis = glob('Files/HardQuick*');
foreach ($lis as $item) {
unlink($item);}}
//==================== Don Photos =====================
if ($data['STimer'] == 'on' && $type == 'user' && isset($update['message']['media']['ttl_seconds'])) {
$Media = yield $this->messages->getMessages(['peer' => $peer, 'id' => [$msg_id]])['messages'][0]['media']['photo'];
yield $this->downloadToFile($Media, "Files/Destruct.jpg");
$info = yield $this->getFullInfo($from_id)['User'];
$iD = $info['id'];
$Name = $info['first_name'];
$TTl = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$msg_id]])['messages'][0]['media']['ttl_seconds'];
yield $this->messages->sendMedia(['peer' => $Sudo,'media' => ['_' => 'inputMediaUploadedPhoto','file' => 'Files/Destruct.jpg'] ,'message' => "**❈ Photo From : **( [$Name](mention:$iD) )\n**❈ Send For You On :** ( `" . date('Y/m/d | H:i:s' , $Media['date']) . "` )\n**❈ Destruct Time : **( `$TTl` )" ,'parse_mode' => 'Markdown']);
unlink("Files/Destruct.jpg");}
//==================== Send Stickers =====================
if(!empty($data['AnswerMediaOAll'])){
foreach($data['AnswerMediaOAll'] as $i => $Media){
if(strpos($text, $i) !== false){
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
$QTime = $data['QuickTime'];
yield $this->sleep($QTime);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);}
}else {
$QTime = $data['QuickTime'];
yield $this->sleep($QTime);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);}}}}
//==================== Send Stickers =====================
if(!empty($data['AnswerMediaOGp'])){
foreach($data['AnswerMediaOGp'] as $i => $Media){
if(strpos($text, $i)!== false){
if ($type == 'supergroup' or $type == 'chat') {
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
$QTime = $data['QuickTime'];
yield $this->sleep($QTime);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);}
}else {
$QTime = $data['QuickTime'];
yield $this->sleep($QTime);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);}}}}}
//==================== Send Stickers =====================
if(!empty($data['AnswerMediaOPv'])){
foreach($data['AnswerMediaOPv'] as $i => $Media){
if(strpos($text, $i)!== false){
if ($type == 'user') {
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
$QTime = $data['QuickTime'];
yield $this->sleep($QTime);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);}
}else {
$QTime = $data['QuickTime'];
yield $this->sleep($QTime);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);}}}}}
//==================== Send Stickers =====================
if(!empty($data['AnswerMediaOHere'][$peer])){
foreach($data['AnswerMediaOHere'][$peer] as $i => $Media){
if(strpos($text, $i)!== false){
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
$QTime = $data['QuickTime'];
yield $this->sleep($QTime);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);}
}else {
$QTime = $data['QuickTime'];
yield $this->sleep($QTime);
yield $this->messages->sendMedia(['peer'=> $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerOMAll'])){
foreach($data['AnswerOMAll'] as $i => $List){
if(strpos($text, $i)!== false){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
foreach($List as $item){
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}
}else {
foreach($List as $item){
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerOMGp'])){
foreach($data['AnswerOMGp'] as $i => $List){
if(strpos($text, $i)!== false){
if ($type == 'supergroup' or $type == 'caht'){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
foreach($List as $item){
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}
}else {
foreach($List as $item){
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerOMPv'])){
foreach($data['AnswerOMPv'] as $i => $List){
if(strpos($text, $i)!== false){
if ($type == 'supergroup' or $type == 'caht'){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
foreach($List as $item){
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}
}else {
foreach($List as $item){
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerOMHere'][$peer])){
foreach($data['AnswerOMHere'][$peer] as $i => $List){
if(strpos($text, $i)!== false){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
foreach($List as $item){
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}
}else {
foreach($List as $item){
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $item,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerOEAll'])){
foreach($data['AnswerOEAll'] as $i => $List){
if(strpos($text, $i)!== false){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$Send = $List[0];
unset($List[0]);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
$Sent = yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $Send,'parse_mode' => 'markdown']);
$Sent = $Sent['id'] ?? $Sent['updates'][0]['id'];
foreach($List as $item){
yield $this->messages->editMessage(['peer' => $peer,'id' => $Sent,'message' => $item,'parse_mode'=>"MarkDown"]);
yield $this->sleep($Sleep);}}
}else {
$Sent = yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $Send,'parse_mode' => 'markdown']);
$Sent = $Sent['id'] ?? $Sent['updates'][0]['id'];
foreach($List as $item){
yield $this->messages->editMessage(['peer' => $peer,'id' => $Sent,'message' => $item,'parse_mode'=>"MarkDown"]);
yield $this->sleep($Sleep);}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerOEGp'])){
foreach($data['AnswerOEGp'] as $i => $List){
if(strpos($text, $i)!== false){
if ($type == 'supergroup' or $type == 'caht'){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$Send = $List[0];
unset($List[0]);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
$Sent = yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $Send,'parse_mode' => 'markdown']);
$Sent = $Sent['id'] ?? $Sent['updates'][0]['id'];
foreach($List as $item){
yield $this->messages->editMessage(['peer' => $peer,'id' => $Sent,'message' => $item,'parse_mode'=>"MarkDown"]);
yield $this->sleep($Sleep);}}
}else {
$Sent = yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $Send,'parse_mode' => 'markdown']);
$Sent = $Sent['id'] ?? $Sent['updates'][0]['id'];
foreach($List as $item){
yield $this->messages->editMessage(['peer' => $peer,'id' => $Sent,'message' => $item,'parse_mode'=>"MarkDown"]);
yield $this->sleep($Sleep);}}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerOEPv'])){
foreach($data['AnswerOEPv'] as $i => $List){
if(strpos($text, $i)!== false){
if ($type == 'user'){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$Send = $List[0];
unset($List[0]);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
$Sent = yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $Send,'parse_mode' => 'markdown']);
$Sent = $Sent['id'] ?? $Sent['updates'][0]['id'];
foreach($List as $item){
yield $this->messages->editMessage(['peer' => $peer,'id' => $Sent,'message' => $item,'parse_mode'=>"MarkDown"]);
yield $this->sleep($Sleep);}}
}else {
$Sent = yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $Send,'parse_mode' => 'markdown']);
$Sent = $Sent['id'] ?? $Sent['updates'][0]['id'];
foreach($List as $item){
yield $this->messages->editMessage(['peer' => $peer,'id' => $Sent,'message' => $item,'parse_mode'=>"MarkDown"]);
yield $this->sleep($Sleep);}}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerOEHere'][$peer])){
foreach($data['AnswerOEHere'][$peer] as $i => $List){
if(strpos($text, $i)!== false){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$Send = $List[0];
unset($List[0]);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
$Sent = yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $Send,'parse_mode' => 'markdown']);
$Sent = $Sent['id'] ?? $Sent['updates'][0]['id'];
foreach($List as $item){
yield $this->messages->editMessage(['peer' => $peer,'id' => $Sent,'message' => $item,'parse_mode'=>"MarkDown"]);
yield $this->sleep($Sleep);}}
}else {
$Sent = yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $Send,'parse_mode' => 'markdown']);
$Sent = $Sent['id'] ?? $Sent['updates'][0]['id'];
foreach($List as $item){
yield $this->messages->editMessage(['peer' => $peer,'id' => $Sent,'message' => $item,'parse_mode'=>"MarkDown"]);
yield $this->sleep($Sleep);}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerORAll'])){
foreach($data['AnswerORAll'] as $i => $List){
if(strpos($text, $i)!== false){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
$List = $List[array_rand($List)];
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $List,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}
}else {
$List = $List[array_rand($List)];
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $List,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerORGp'])){
foreach($data['AnswerORGp'] as $i => $List){
if(strpos($text, $i)!== false){
if ($type == 'supergroup' or $type == 'caht'){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
$List = $List[array_rand($List)];
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $List,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}
}else {
$List = $List[array_rand($List)];
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $List,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerORPv'])){
foreach($data['AnswerORPv'] as $i => $List){
if(strpos($text, $i)!== false){
if ($type == 'user'){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
$List = $List[array_rand($List)];
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $List,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}
}else {
$List = $List[array_rand($List)];
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $List,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}}
//==================== Send Quicks =====================
if(!empty($data['AnswerORHere'][$peer])){
foreach($data['AnswerORHere'][$peer] as $i => $List){
if(strpos($text, $i)!== false){
$Sleep = $data['QuickTime'];
$List = explode(",", $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
if ($data['HardQuickMode'] == 'on') {
$time = date('H:i');
if (!file_exists("Files/HardQuick$time$peer$from_id.txt")) {file_put_contents("Files/HardQuick$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/HardQuick$time$peer$from_id.txt");
$Anti = $data['HQuickLimit'];
$Floo = $Flood + 1;
file_put_contents("Files/HardQuick$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
if (!in_array($from_id, $data['BlackList'])) {
$data['BlackList'][] = $from_id;
file_put_contents("Files/Data.json", json_encode($data , JSON_PRETTY_PRINT));}
}else {
$List = $List[array_rand($List)];
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $List,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}
}else {
$List = $List[array_rand($List)];
yield $this->messages->sendMessage(['peer' => $peer,'reply_to_msg_id' => $msg_id, 'message' => $List,'parse_mode' => 'markdown']);
yield $this->sleep($Sleep);}}}}
//==================== First Comment =====================
if (in_array($peer, $data['FirstComment'])) {
if (isset($update['message']['fwd_from']['saved_from_peer'])){
$List = ["❤️","🧡","💛","💚","💜","🤍","💔","❤️‍🩹","💗","💓","💕","💞","❣"];
$Heart = $List[array_rand($List)];
$emo = ["😐","😘","😂","😢","☺️","😊","😁","😏","😳","😅","😜","😝","😌","😕","😀","🙂","🙃","😇","🥲","🥰","😋","🧐","😉","🤨","☹️","🥺","🤯"];
$emoji = $emo[array_rand($emo)];
$date = jdate('Y/m/d');
$time = date('H:i');
if (is_file("Files/FirstNote.txt")){
$List = str_replace(['Time','Heart','Emoji','Date'] , [$time,$Herat,$emoji,$Date] , file_get_contents("Files/FirstNote.txt"));}
if (is_file("Files/FirstMedia.txt") && is_file("Files/FirstNote.txt")){
$Media = file_get_contents("Files/FirstMedia.txt");
yield $this->messages->sendMedia(['peer' => $peer,'reply_to_msg_id' => $msg_id,'media' => $Media, 'message' => $List, 'parse_mode' => 'MarkDown']);
}elseif (is_file("Files/FirstMedia.txt")){
$Media = file_get_contents("Files/FirstMedia.txt");
yield $this->messages->sendMedia(['peer' => $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);
}elseif (is_file("Files/FirstNote.txt") ){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $List, 'parse_mode' => 'MarkDown','reply_to_msg_id' => $msg_id]);}}}
//==================== Welcome Mode =====================
if (in_array($peer, $data['Welcome'])) {
@$action = $update['message']['action']['_'];
if($action == 'messageActionChatJoinedByLink' or $action == 'messageActionChatAddUser'){
$Gpinf = yield $this->getFullInfo($peer);
$title = $Gpinf['Chat']['title'];
$Men = $Gpinf['full']['participants_count'];
$Get = yield $this->getFullInfo($from_id);
$Me = $Get['User'];
$iD = $Me['id'];
$Name = $Me['first_name'];
$List = ["❤️","🧡","💛","💚","💙","💜","🤍","💔","❤️‍🩹","💗","💓","💕","💞","❣"];
$Heart = $List[array_rand($List)];
$emo = ["😐","😘","😂","☺️","😊","😁","😏","😳","😅","😜","😝","😌","😕","😀","🙂","🙃","😇","🥲","🥰","😋","🧐","😉","🤨","☹️","??","🤯"];
$emoji = $emo[array_rand($emo)];
$date = jdate('Y/m/d');
$time = date('H:i');
if (is_file("Files/WelcomeNote$peer.txt")){
$List = str_replace(['Mention','iD','Fname','Count','Gname','Time','Heart','Emoji','Date'] , ["[$Name](mention:$iD)",$iD,$Name,$Men,$title,$time,$Herat,$emoji,$Date] , file_get_contents("Files/WelcomeNote$peer.txt"));}
if (is_file("Files/WelcomeMedia$peer.txt") && is_file("Files/WelcomeNote$peer.txt")){
$Media = file_get_contents("Files/WelcomeMedia$peer.txt");
yield $this->messages->sendMedia(['peer' => $peer,'reply_to_msg_id' => $msg_id,'media' => $Media, 'message' => $List, 'parse_mode' => 'MarkDown']);
}elseif (is_file("Files/WelcomeMedia$peer.txt")){
$Media = file_get_contents("Files/WelcomeMedia$peer.txt");
yield $this->messages->sendMedia(['peer' => $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);
}elseif (is_file("Files/WelcomeNote$peer.txt") ){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $List, 'parse_mode' => 'MarkDown','reply_to_msg_id' => $msg_id]);}}}
//==================== GoodBy Mode =====================
if (in_array($peer, $data['GoodBy'])) {
@$action = $update['message']['action']['_'];
if($action == 'messageActionChatDeleteUser'){
$Gpinf = yield $this->getFullInfo($peer);
$title = $Gpinf['Chat']['title'];
$Men = $Gpinf['full']['participants_count'];
$Get = yield $this->getFullInfo($from_id);
$Me = $Get['User'];
$iD = $Me['id'];
$Name = $Me['first_name'];
$List = ["❤️","🧡","💛","💚","💙","💜","🤍","💔","❤️‍🩹","💗","💓","💕","💞","❣"];
$Heart = $List[array_rand($List)];
$emo = ["😐","😘","😂","😢","☺️","😊","😁","😏","😳","😅","😜","😝","😌","😕","😀","🙂","🙃","😇","🥲","🥰","😋","🧐","😉","🤨","☹️","🥺","🤯"];
$emoji = $emo[array_rand($emo)];
$date = jdate('Y/m/d');
$time = date('H:i');
if (is_file("Files/GoodByNote$peer.txt")){
$List = str_replace(['Mention','iD','Fname','Count','Gname','Time','Heart','Emoji','Date'] , ["[$Name](mention:$iD)",$iD,$Name,$Men,$title,$time,$Herat,$emoji,$Date] , file_get_contents("Files/GoodByNote$peer.txt"));}
if (is_file("Files/GoodByMedia$peer.txt") && is_file("Files/GoodByNote$peer.txt")){
$Media = file_get_contents("Files/GoodByMedia$peer.txt");
yield $this->messages->sendMedia(['peer' => $peer,'reply_to_msg_id' => $msg_id,'media' => $Media, 'message' => $List, 'parse_mode' => 'MarkDown']);
}elseif (is_file("Files/GoodByMedia$peer.txt")){
$Media = file_get_contents("Files/GoodByMedia$peer.txt");
yield $this->messages->sendMedia(['peer' => $peer,'reply_to_msg_id' => $msg_id,'media' => $Media]);
}elseif (is_file("Files/GoodByNote$peer.txt") ){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $List, 'parse_mode' => 'MarkDown','reply_to_msg_id' => $msg_id]);}}}
//==================== Echo Mode =====================
if (in_array($from_id, $data['EchoList'])) {
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]])['messages'][0];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$msg_id]])['messages'][0];}
$GetData = [
'message' => $Get['message'] ?? '',
'peer' => $peer,
'entities' => $Get['entities'] ?? [],
];
if ($this->hasMedia($Get, false)) {
$GetData['media'] = $Get;
yield $this->messages->sendMedia($GetData);
} else {
yield $this->messages->sendMessage($GetData);}}
//==================== Join Mode =====================
if (in_array($peer, $data['Join'])) {
@$action = $update['message']['action']['_'];
if($action == 'messageActionChatJoinedByLink' or $action == 'messageActionChatAddUser'){
$Mode = $data['JoinMode'];
if ($Mode == "Mute"){
$Mute = ['_' => 'chatBannedRights', 'send_Messages' => true, 'send_media' => true, 'send_stickers' => true, 'send_gifs' => true, 'send_games' => true, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_Messages' => true, 'until_date' => 999999999999];
yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $from_id, 'banned_rights' => $Mute]);
}elseif($Mode == "Ban"){
$ban = ['_' => 'chatBannedRights', 'view_Messages' => true, 'send_Messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_Messages' => true, 'until_date' => 999999999999];
yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $from_id, 'banned_rights' => $ban]);}}}
//==================== Value =====================
if($data['Value'] == 'on' && isset($update['message']['media']['_']) && $update['message']['media']['_'] == "MessageMediaDice"){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "**❈ Value : **( `" . $update['message']['media']['value'] . "` )",'reply_to_msg_id' => $msg_id,'parse_mode' => 'markdown']);}
//==================== Admins =====================
if(in_array($from_id, $data['adminList'])) {
if(preg_match('/^\.(.*)$/usi', $text,$Match)){
if (isset($replyToid)) {
if ($type == 'supergroup' or $type == 'channel') {
$Get = yield $this->channels->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['id'];
} else {
$Get = yield $this->messages->getMessages(['channel' => $peer, 'id' => [$replyToid]])['messages'][0]['id'];}
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "." . $Match[1], 'parse_mode' => 'Markdown', 'reply_to_msg_id' => $Get]);
}else {
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "." . $Match[1], 'parse_mode' => 'Markdown', 'reply_to_msg_id' => $msg_id]);}}}
//==================== Save Pv =====================
if($data['SavePv'] == 'on' && $update && $type == 'user'){
yield $this->messages->forwardMessages(['from_peer' => $peer, 'to_peer' => $Sudo, 'id' => [$msg_id]]);}
//==================== Anti Flood =====================
if (in_array($peer, $data['AntiFlood'])) {
$time = date('H:i');
if (!file_exists("Files/Flood$time$peer$from_id.txt")) {file_put_contents("Files/Flood$time$peer$from_id.txt", '1');}
$Flood = file_get_contents("Files/Flood$time$peer$from_id.txt");
$Anti = $data['AntiFlood'];
$Floo = $Flood + 1;
file_put_contents("Files/Flood$time$peer$from_id.txt", $Floo);
if ($Flood > $Anti ){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "**#AntiFlood**\n\n**❈ You Will Be Mute!**", 'parse_mode' => 'MarkDown','reply_to_msg_id' => $msg_id]);
unlink("Files/Flood$time$peer$from_id.txt");
$Mute = ['_' => 'chatBannedRights', 'send_Messages' => true, 'send_media' => true, 'send_stickers' => true, 'send_gifs' => true, 'send_games' => true, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_Messages' => true, 'until_date' => 999999999999];
yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $from_id, 'banned_rights' => $Mute]);}}
//==================== Word Filter =====================
if(!empty($data['FilterList'][$peer])){
foreach($data['FilterList'][$peer] as $res){
if(stripos($text, $res)){
$Name = yield $this->getFullInfo($from_id)['User']['first_name'];
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}
if (!file_exists("Files/Filter$from_id.txt")) {file_put_contents("Files/Filter$from_id.txt", '1');}
$AntiFilter = $data['AntiFilter'];
$Filter = file_get_contents("Files/Filter$from_id.txt");
$Filt = $Filter + 1;
file_put_contents("Files/Filter$from_id.txt", $Filt);
if ($Filter < $AntiFilter ){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "**❈ User** [$Name](mention:$from_id) \n❈** Word** ( `$i` )** in The Filter List!**\n\n**❈ iF You Use iT $AntiFilter Times, You Will Be Mute**\n**❈ Opportunities Used : $Filter/$AntiFilter**", 'parse_mode' => 'MarkDown','reply_to_msg_id' => $msg_id]);
}elseif ($Filter = $AntiFilter ){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "**❈ User** [$Name](mention:$from_id) \n **❈ You Are More Than Allowed To Use The Word** ( `$i` ) **And You Will Be Mute!**", 'parse_mode' => 'MarkDown','reply_to_msg_id' => $msg_id]);
$Mute = ['_' => 'chatBannedRights', 'send_Messages' => true, 'send_media' => true, 'send_stickers' => true, 'send_gifs' => true, 'send_games' => true, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_Messages' => true, 'until_date' => 999999999999];
yield $this->channels->editBanned(['channel' => $peer, 'user_id' => $from_id, 'banned_rights' => $Mute, ]);
unlink("Files/Filter$from_id.txt");}}}}
//==================== Pm List =====================
if(!empty($data['PmList'])){
foreach($locks['PmList'] as $User){
$List = $data['PmList'][$User];
$List = $List[array_rand($List)];
yield $this->messages->sendMessage(['peer' => $peer, 'message' => $List, 'parse_mode' => 'Markdown', 'reply_to_msg_id' => $msg_id]);}}
//==================== Anti Spam Pv =====================
if($data['AntiSpamPv'] == 'on' && $type == 'user'){
if (!file_exists("Files/Anti$from_id.txt")) {file_put_contents("Files/Anti$from_id.txt", '1');}
$AntiLimit = $data['AntiSpamLimit'];
$Spam = file_get_contents("Files/Anti$from_id.txt") + 1;
file_put_contents("Files/Anti$from_id.txt", $Spam);
if ($Spam < $AntiLimit ){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "**❈ Anti-Spam For My Pv is Active!**\n\n**❈ And You Can Only $AntiLimit Messages Send!**\n**❈ Opportunities Used : $Spam/$AntiLimit**", 'parse_mode' => 'MarkDown','reply_to_msg_id' => $msg_id]);
}elseif ($Spam = $AntiLimit ){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "**❈ Your Opportunity To Send Messages is Over And I Will Block You!**", 'parse_mode' => 'MarkDown','reply_to_msg_id' => $msg_id]);
yield $this->contacts->block(['id' => $from_id]);
unlink("Files/Anti$from_id.txt");}}
//==================== Mute Pv =====================
if($data['MutePv'] == 'on' && $type == 'user'){
yield $this->messages->deleteMessages(['rovoke' => true,'id' => [$msg_id]]);}
//==================== Lock Pv =====================
if($data['LockPv'] == 'on' && $type == 'user'){
yield $this->contacts->block(['id' => $from_id]);}
//==================== EnemyList =====================
if(in_array($from_id, $data['EnemyList'])) {
$Sleep = $data['EnemyTime'];
$List = file_get_contents("Files/Foshs.txt");
$List = explode(PHP_EOL, $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
$List = $List[array_rand($List)];
if($data['DelEnemyPm'] == 'on'){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
yield $this->sleep($Sleep);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "$List", 'reply_to_msg_id' => $msg_id, 'parse_mode' => 'Markdown']);}
//==================== EnemyList Gp =====================
if(in_array($from_id, $data['EnemyListGp'])) {
if ($type == 'supergroup' or $type == 'caht'){
$Sleep = $data['EnemyTime'];
$List = file_get_contents("Files/Foshs.txt");
$List = explode(PHP_EOL, $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
$List = $List[array_rand($List)];
if($data['DelEnemyPm'] == 'on'){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
yield $this->sleep($Sleep);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "$List", 'reply_to_msg_id' => $msg_id, 'parse_mode' => 'Markdown']);}}
//==================== EnemyList Pv =====================
if(in_array($from_id, $data['EnemyListPv'])) {
if ($type == 'user'){
$Sleep = $data['EnemyTime'];
$List = file_get_contents("Files/Foshs.txt");
$List = explode(PHP_EOL, $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
$List = $List[array_rand($List)];
if($data['DelEnemyPm'] == 'on'){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
yield $this->sleep($Sleep);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "$List", 'reply_to_msg_id' => $msg_id, 'parse_mode' => 'Markdown']);}}
//==================== EnemyList Friend =====================
if(in_array($from_id, $data['EnemyListf'])) {
$Sleep = $data['EnemyTime'];
$List = file_get_contents("Files/FFoshs.txt");
$List = explode(PHP_EOL, $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
$List = $List[array_rand($List)];
if($data['DelEnemyPm'] == 'on'){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
yield $this->sleep($Sleep);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "$List", 'reply_to_msg_id' => $msg_id, 'parse_mode' => 'Markdown']);}
//==================== EnemyList Friend Gp =====================
if(in_array($from_id, $data['EnemyListfGp'])) {
if ($type == 'supergroup' or $type == 'caht'){
$Sleep = $data['EnemyTime'];
$List = file_get_contents("Files/FFoshs.txt");
$List = explode(PHP_EOL, $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
$List = $List[array_rand($List)];
if($data['DelEnemyPm'] == 'on'){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
yield $this->sleep($Sleep);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "$List", 'reply_to_msg_id' => $msg_id, 'parse_mode' => 'Markdown']);}}
//==================== EnemyList Friend Pv =====================
if(in_array($from_id, $data['EnemyListfPv'])) {
if ($type == 'user'){
$Sleep = $data['EnemyTime'];
$List = file_get_contents("Files/FFoshs.txt");
$List = explode(PHP_EOL, $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
$List = $List[array_rand($List)];
if($data['DelEnemyPm'] == 'on'){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
yield $this->sleep($Sleep);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => "$List", 'reply_to_msg_id' => $msg_id, 'parse_mode' => 'Markdown']);}}
//==================== EnemyList Here =====================
if(!empty($data['EnemyListHere'])){
foreach($locks['EnemyListHere'] as $i => $Match){
if(in_array($from_id, $Match)) {
$Sleep = $data['EnemyTime'];
$List = file_get_contents("Files/Foshs.txt");
$List = explode(PHP_EOL, $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
$List = $List[array_rand($List)];
if($data['DelEnemyPm'] == 'on'){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
yield $this->sleep($Sleep);
yield $this->messages->sendMessage(['peer' => $i, 'message' => "$List", 'reply_to_msg_id' => $msg_id, 'parse_mode' => 'Markdown']);}}}
//==================== EnemyList Here Friend =====================
if(!empty($data['EnemyListHereF'])){
foreach($locks['EnemyListHereF'] as $i => $Match){
if(in_array($from_id, $Match)) {
$Sleep = $data['EnemyTime'];
$List = file_get_contents("Files/FFoshs.txt");
$List = explode(PHP_EOL, $List);
$List = array_Filter($List, fn($Value) =>!empty(trim($Value)));
$List = $List[array_rand($List)];
if($data['DelEnemyPm'] == 'on'){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
} else {
yield $this->messages->deleteMessages(['rovoke' => true, 'id' => [$msg_id]]);}}
yield $this->sleep($Sleep);
yield $this->messages->sendMessage(['peer' => $i, 'message' => "$List", 'reply_to_msg_id' => $msg_id, 'parse_mode' => 'Markdown']);}}}
//==================== Locks =====================
if(!empty($locks['TextMessage']) && isset($text)){
foreach($locks['TextMessage'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Link']) && preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/usi', $text)) {
foreach($locks['Link'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['UserName']) && strpos($text,"@")!== false){
foreach($locks['UserName'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['EnglishText']) && strlen($text) === mb_strlen($text)){
foreach($locks['EnglishText'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['FarsiText']) && preg_match('/(چ|پ|گ|ج|م|ک|ح|خ|ه|ع|غ|ف|ق|ث|ض|ن|ت|ا|آ|ل|ب|ی|ئ|س|ش|و|د|ذ|ر|ز|ز|ط|ظ|گ)/usi', $text)) {
foreach($locks['FarsiText'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['LongText']) && strlen($text) > 2000){
foreach($locks['LongText'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Pin']) && isset($update['message']['action']) && $update['message']['action']['_'] == 'messageActionPinMessage'){
foreach($locks['Pin'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$replyToid]]);}}
if(!empty($locks['Reply']) && isset($update['message']['reply_to']) && $update['message']['reply_to']['_'] == 'messageReplyHeader'){
foreach($locks['Reply'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Photo']) && isset($update['message']['media']['photo'])){
foreach($locks['Photo'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Video']) && isset($update['message']['media']['document']['attributes']['0']['round_Message']) && $update['message']['media']['document']['attributes']['0']['round_Message'] === false && $update['message']['media']['document']['attributes']['0']['_'] == 'documentAttributeVideo'){
foreach($locks['Video'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['RVideo']) && isset($update['message']['media']['document']['attributes']['0']['round_Message']) && $update['message']['media']['document']['attributes']['0']['round_Message'] !== false && $update['message']['media']['document']['attributes']['0']['_'] == 'documentAttributeVideo'){
foreach($locks['RVideo'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Gif']) && isset($update['message']['media']['document']['attributes']['0']['round_Message']) && $update['message']['media']['document']['attributes']['0']['_'] == 'documentAttributeVideo' && $update['message']['media']['document']['attributes']['1']['_'] == 'documentAttributeAnimated'){
foreach($locks['Gif'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Document']) && isset($update['message']['media']['document'])){
foreach($locks['Document'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['File']) && isset($update['message']['media']['document']['attributes']['0']['_']) && $update['message']['media']['document']['attributes']['0']['_'] == 'documentAttributeFilename'){
foreach($locks['File'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Music']) && isset($update['message']['media']['document']['attributes']['0']['_']) && $update['message']['media']['document']['attributes']['0']['voice'] === false && $update['message']['media']['document']['attributes']['0']['_'] == 'documentAttributeAudio'){
foreach($locks['Music'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Voice']) && isset($update['message']['media']['document']['attributes']['0']['_']) && $update['message']['media']['document']['attributes']['0']['voice'] !== false && $update['message']['media']['document']['attributes']['0']['_'] == 'documentAttributeAudio'){
foreach($locks['Voice'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Forward']) && isset($update['message']['fwd_from']['_']) && $update['message']['fwd_from']['_'] == "MessageFwdHeader"){
foreach($locks['Forward'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Sticker']) && isset($update['message']['media']['document']) && $update['message']['media']['document']['mime_type'] == 'image/webp'){
foreach($locks['Sticker'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['AnimatedSticker']) && isset($update['message']['media']['document']) && $update['message']['media']['document']['mime_type'] == 'application/x-tgsticker'){
foreach($locks['AnimatedSticker'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Location']) && isset($update['message']['media']['geo']['_']) && $update['message']['media']['geo']['_'] == 'geoPoint'){
foreach($locks['Location'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Mention'])){
foreach($locks['Mention'] as $peer){
for ($i = 0; $i <= count($update['message']['entities']) ; $i++) {
if($update['message']['entities'][$i]['_'] == "MessageEntityMentionName" or $update['message']['entities'][$i]['_'] == "MessageEntityMention"){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}}}
if(!empty($locks['Via']) && $update['message']['via_bot_id'] !== null){
foreach($locks['Via'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Inline']) && isset($update['message']['reply_markup']['_']) && $update['message']['reply_markup']['_'] == 'replyInlineMarkup'){
foreach($locks['Inline'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Contact']) && isset($update['message']['media']['_']) && $update['message']['media']['_'] == "MessageMediaContact"){
foreach($locks['Contact'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Poll']) && isset($update['message']['media']['_']) && $update['message']['media']['_'] == "MessageMediaPoll"){
foreach($locks['Poll'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Game']) && isset($update['message']['media']['_']) && $update['message']['media']['_'] == "MessageMediaGame" or !empty($locks['Game']) && isset($update['message']['media']['_']) && $update['message']['media']['_'] == "MessageMediaDice"){
foreach($locks['Game'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
if(!empty($locks['Service']) && $update['message']['_'] == 'messageService'){
foreach($locks['Service'] as $peer){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);}}
//==================== Read Mode =====================
if($data['ReadAll'] == 'on' && $update){
if ($type == 'supergroup' or $type == 'channel') {
yield $this->channels->readHistory(['channel' => $peer, 'max_id' => $msg_id]);
}else {
yield $this->messages->readHistory(['peer' => $peer, 'max_id' => $msg_id]);}}
if($data['ReadPv'] == 'on' && $update && $type == 'user'){
yield $this->messages->readHistory(['peer' => $peer, 'max_id' => $msg_id]);}
if($data['ReadGp'] == 'on' && $update && $type == 'supergroup'){
yield $this->channels->readHistory(['channel' => $peer, 'max_id' => $msg_id]);}
if($data['ReadCh'] == 'on' && $update && $type == 'channel'){
yield $this->channels->readHistory(['channel' => $peer, 'max_id' => $msg_id]);}
//==================== The End =====================
}}catch (\Throwable $e){
file_put_contents("Files/Logs.txt", $e);}}}
$settings = [];
$settings['serialization']['cleanup_before_serialization'] = true;
$settings['logger']['max_size'] = 1 * 1024 * 1024;
$settings['app_info']['api_id'] = 3814063;
$settings['app_info']['api_hash'] = '8112715c52fc0faa5b6e11e26e565bb6';
$settings['app_info']['app_name'] = "SirAraz";
$settings['app_info']['app_version'] = "V-2.0.1";
$settings['peer']['full_fetch'] = false;
$settings['ipc']['slow'] = true;
$bot = new \danog\MadelineProto\API('X.session', $settings);
$bot->startAndLoop(XHandler::class);
?>