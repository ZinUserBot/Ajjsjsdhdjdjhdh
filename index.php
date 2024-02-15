<?php
/*
••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
اسکی میری منبع بزن 🌹
❄️ نوشته شده توسط @TKPHP | تک پسر
✅ اپن شده در @Sourrce_kade | سورس کده
••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
*/
error_reporting(E_ALL);
ini_set('display_errors','1');
ini_set('memory_limit' , '-1');
ini_set('max_execution_time','0');
ini_set('display_startup_errors','1');

if(file_exists('MadelineProto.log') and (filesize('MadelineProto.log') / 1024 ) > 1024) unlink('MadelineProto.log');
if(!file_exists('eshtrak.txt')){
echo 'The subscription date of this bot has expired : @FlashSelfBot';
exit();
}
if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';
if(!file_exists('bot.txt')){
file_put_contents('bot.txt','on');
}
use \danog\MadelineProto\API;
use \danog\Loop\Generic\GenericLoop;
use \danog\MadelineProto\EventHandler;
class XHandler extends EventHandler
{
    const Admins = [[*[ADMIN]*]];
    const Report = ''; // don't touch . . . !
    
    public function getReportPeers()
    {
        return [self::Report];
    }
    
    public function genLoop()
    {
        yield $this->account->updateStatus([
            'offline' => false
        ]);
        return 60000;
    }
    
    public function onStart()
    {
        $genLoop = new GenericLoop([$this, 'genLoop'], 'update Status');
        $genLoop->start();
    }
    
    public function onUpdateNewChannelMessage($update)
    {
        yield $this->onUpdateNewMessage($update);
    }
    
    public function onUpdateNewMessage($update)
    {
        if (time() - $update['message']['date'] > 2) {
            return;
        }
        try {
            $msgOrig = $update['message']['message']?? null;
            $messageId = $update['message']['id']?? 0;
            $fromId = $update['message']['from_id']['user_id']?? 0;
            $replyToId = $update['message']['reply_to']['reply_to_msg_id']?? 0;
            $peer = yield $this->getID($update);  
            $me = yield $this->getSelf();
            $me_id = $me['id'];           
//••••••••••••••••••••••••••••••••• Start Of Source •••••••••••••••••••••••••••••••••//
if(preg_match('/^[\/\#\!\.]?(ping|ربات)$/si', $msgOrig)) {
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Pong !','reply_to_msg_id' => $messageId]);
}
if (preg_match('/^[\/\#\!]?(restart|ریستارت)$/si',$msgOrig)){
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Restarted !','reply_to_msg_id' => $messageId]);
$this->restart();
}
if(preg_match('/^[\/\#\!\.]?(status|وضعیت)$/si', $msgOrig)){
$answer = 'Memory Usage : ' . round(memory_get_peak_usage(true) / 1021 / 1024, 2) . ' MB';
yield $this->messages->sendMessage(['peer' => $peer,'message'         => 'Restarted !','reply_to_msg_id' => $messageId]);
}
if(preg_match("/^[\/\#\!]?(bot) (on|off)$/i", $msgOrig)){
preg_match("/^[\/\#\!]?(bot) (on|off)$/i", $msgOrig, $m);
file_put_contents('bot.txt',"$m[2]");
yield $this->messages->editMessage(['peer' => $peer,'id' => $messageId,'message' => "⟩••• ᴛʜᴇ ʙᴏᴛ ɴᴏᴡ ɪs $m[2]"]);
}
//============== Spamer ===============
if ($msgOrig == 'help' or $msgOrig == '/help' or $msgOrig == 'راهنما'){
$mem_using = round((memory_get_usage()/1024)/1024, 0).' مگابایت';
$load = sys_getloadavg();
$ver = phpversion();
yield $this->messages->editMessage(['peer' => $peer,'id' => $messageId,'message' => "
⚠️ راهنمای سلف اسپمر !
➖➖➖➖
شمارش 1
شمارش 2
شمارش 3
شمارش 4
شمارش 5
شمارش 6
گایش
گاییدن
اسپم مخصوص
بکنش
کصننت بای
کصننت
ربات
وضعیت
ریستارت

🔥 خاموش و روشن کردن ربات
bot ( off | on )
➖➖➖➖
Version PHP : $ver
Memory Using : $mem_using
Loading : $load[0]"]);
  }
if(file_get_contents('bot.txt') == "on"){
if($msgOrig=='کصننت بای' or $msgOrig=='👉👌'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کصننتو گاییدم']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کیرم دهنت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کون سفیدتو بخورم']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'با ننت فیلم سوپر بازی کردم']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'ننت عجب دافیه بمولا']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کیرم تو هفت جد آبادت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خلاصه کیرم کصننت بای😇']);
}
if($msgOrig=='کصننت' or $msgOrig=='ksnne'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کـــ']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => 'کــص']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => 'کــص ن']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => 'کـــص نـــنـ']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => 'کـــص نـنـتـ']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '💝کص نـنـت']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '☘کـــص نـنـت دیگه☘']);
   }
   if($msgOrig=='بکنش2' or $msgOrig=='گاییدن'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کیر']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کص']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'ممه']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کیرم دهن همه']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'همه نه فقط تو کص خار مادرت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کص پدرت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کیرم تو هیکلت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بمولا مادرت خیلی جیگره']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'شماره کصتو لطف گن']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اوف خواهارتو برم کونش ز تو شلوار معلومه ای جانننن😍']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بزنم به تخته همتونم جیگرین']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'ولی زدم به گیرم چون عین یه میزه به کارتون میاد']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سسسکی کی بودی تو']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کصنننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کیرمو شیاف کن تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بگا رفتی نه']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کیرم سولاخت کرد🥺']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '🍑']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالایی کص ننته اره اوفف حال کردم']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '😋']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خلاصه کیرم تو جد و آبادت بای']);
}
if($msgOrig=='شمارش 1' or $msgOrig=='شمارش یک'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '1']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '2']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '3']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '4']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '5']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '6']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '7']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '8']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '9']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '10']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '11']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '12']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '13']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '14']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '15']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '16']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '17']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '18']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '19']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '20']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سسکتیر شمارش خورد ت کص ننت']);
}
if($msgOrig=='شمارش 2' or $msgOrig=='شمارش دو'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
}
if($msgOrig=='شمارش 3' or $msgOrig=='شمارش سه'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR SAG BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR GAV BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR KHAR BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR KHAZ BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR HEYVUN BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR GORAZ BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR KROKODIL BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR SHOTOR BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR SHOTOR MORGH BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MIKHAY TIZ BEGAMET HALA BEBI KHHKHKHKHK SORAATI NANATO MIKONAM']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'CHIYE KOS MEMBER BABT TAZE BARAT PC KHRIDE BI NAMOS MEMBER?']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'NANE MOKH AZAD NANE SHAM PAYNI NANE AROS MADAR KENTAKI PEDAR HALAZONI KIR MEMBERAK TIZ BASH YALA  TIZZZZZ😂']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'FEK KONAM NANE NANATI NAGAIIDAM KE ENGHAD SHAKHHI????????????????????????????????????HEN NANE GANGANDE PEDAR LASHI']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'to yatimi enghad to pv man daso pa mizani koskesh member man doroste nanato ye zaman mikardam vali toro beh kiramam nemigiram']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'KIRAM TU KUNE NNT BALA BASH KIRAM TU DAHANE MADARET BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'KHARETO BE GA MIDAM BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '1']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '2']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '3']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '4']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '5']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '6']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '7']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '8']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '9']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '10']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '1']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '2']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '3']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '4']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '5']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '6']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '7']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '8']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '9']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '10']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'NABINAM DIGE GOHE EZAFE BOKHORIA']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'KOS NANAT GAYIDE SHOD BINAMUS!!! SHOT SHODI BINAMUS!BYE']);
}
if($msgOrig=='شمارش 4' or $msgOrig=='شمارش چهار'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR SAG BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR GAV BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR KHAR BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR KHAZ BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR HEYVUN BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR GORAZ BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR KROKODIL BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR SHOTOR BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR SHOTOR MORGH BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'MIKHAY TIZ BEGAMET HALA BEBI KHHKHKHKHK SORAATI NANATO MIKONAM']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'CHIYE KOS MEMBER BABT TAZE BARAT PC KHRIDE BI NAMOS MEMBER?']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'NANE MOKH AZAD NANE SHAM PAYNI NANE AROS MADAR KENTAKI PEDAR HALAZONI KIR MEMBERAK TIZ BASH YALA  TIZZZZZ😂']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'FEK KONAM NANE NANATI NAGAIIDAM KE ENGHAD SHAKHHI????????????????????????????????????HEN NANE GANGANDE PEDAR LASHI']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'to yatimi enghad to pv man daso pa mizani koskesh member man doroste nanato ye zaman mikardam vali toro beh kiramam nemigiram']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'KIRAM TU KUNE NNT BALA BASH KIRAM TU DAHANE MADARET BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'KHARETO BE GA MIDAM BALA BASH']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '1']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '2']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '3']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '4']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '5']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '6']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '7']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '8']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '9']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '10']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '1']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '2']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '3']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '4']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '5']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '6']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '7']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '8']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '9']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '10']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'NABINAM DIGE GOHE EZAFE BOKHORIA']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'KOS NANAT GAYIDE SHOD BINAMUS!!! SHOT SHODI BINAMUS!BYE']);
}
if($msgOrig=='شمارش 5' or $msgOrig == 'شمارش پنج'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '1⃣1⃣
1⃣1⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '2⃣2⃣
2⃣2⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '3⃣3⃣
3⃣3⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '4⃣4⃣
4⃣4⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '5⃣5⃣
5⃣5⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '6⃣6⃣
6⃣6⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '7⃣7⃣
7⃣7⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '8⃣8⃣
8⃣8⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '9⃣9⃣
9⃣9⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '🔟🔟
🔟🔟']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '1⃣1⃣
1⃣1⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '1⃣2⃣
1⃣2⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '1⃣3⃣
1⃣3⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '1⃣4⃣
1⃣4⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '1⃣5⃣
1⃣5⃣']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '☘|‌صیکتیر شمارش خوردی|☘']);
}
if ($msgOrig == 'شمارش 6' or $msgOrig == 'شمارش شش') {
		yield $this->messages->editMessage(['peer' => $peer,'id' => $messageId,'message' => "１"]);
		yield $this->messages->sendMessage(['peer' => $peer, 'message' => "２"]);
		yield $this->messages->sendMessage(['peer' => $peer, 'message' => "３"]);
		yield $this->messages->sendMessage(['peer' => $peer, 'message' => "４"]);
		yield $this->messages->sendMessage(['peer' => $peer, 'message' => "５"]);
		yield $this->messages->sendMessage(['peer' => $peer, 'message' => "６"]);
		yield $this->messages->sendMessage(['peer' => $peer, 'message' => "７"]);
		yield $this->messages->sendMessage(['peer' => $peer, 'message' => "８"]);
		yield $this->messages->sendMessage(['peer' => $peer, 'message' => "９"]);
		yield $this->messages->sendMessage(['peer' => $peer, 'message' => "１０"]);
		yield $this->messages->sendMessage(['peer' => $peer, 'message' => "کوبصی ⛈ ریدی بای😹🤘"]);
    }
if($msgOrig=='گایش'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کیر کص ممه😐']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => 'کیرم دهن همه😇']);

yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId +1, 'message' => '☘|‌صیکتیر گاییده شدی☘']);
}
if($msgOrig=='گاییش خاص' or $msgOrig=='اسپم مخصوص'){
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $this->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
}
if($msgOrig=='بکنش' or $msgOrig=='بگاش'){
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'فاضلاب شمال شرق تهران تو کص ننت']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'کیر گراز وحشی تو مادرت']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'اونجا که شاعر میگه یه کیر دارم شاه نداره تو ننت']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'پایه تختم تو کونت']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'کلا کص ننت']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'الکی بی دلیل کص ننت']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'بابات چه ورقیه']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'دست زدم به کون بابات دلم رفت']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'به بابات بگو سفید کنه شب میام بکنم']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'کص ننت؟']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'ایمیل عمتو لطف کن']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'کوننده خونه ای که عمت توش پول درمیاره نوشتم رو کیرم']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'کص ننت']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => 'کص پدرت']);
  yield $this->sleep(1);
  yield $this->messages->editMessage(['peer' => $peer, 'id' => $messageId, 'message' => '😂 امیدوارم از فحش ها لذت برده باشی']);
}
}
//••••••••••••••••••••••••••••••••• End Of Source •••••••••••••••••••••••••••••••••//
}
} catch (\Throwable $e){
$this->report("Surfaced: $e");
}
}
}
$settings = [
'serialization' => [
'cleanup_before_serialization' => true,
],
'logger' => [
'max_size' => 1*1024*1024,
],
'peer' => [
'full_fetch' => false,
'cache_all_peers_on_startup' => false,
],
'app_info' => [
'api_id' => "[*[API_ID]*]",
'api_hash' => "[*[API_HASH]*]"
]
];
$bot = new \danog\MadelineProto\API('Flash.session', $settings);
$bot->startAndLoop(XHandler::class);
?>