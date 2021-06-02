<?php
ob_start();
define('API_KEY','1617015180:AAG8WAi17jotiQKznah8WQ2zxMYWx14gT-k');
//TOKEN 
$admin = "515984974"; 
$bot = "ReferralMoney_Robot";
//Bu kod @Clay_Haker ga tegishli
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$mid = $message->message_id;
$kel = $message->new_chat_member;
$id = $kel->id;
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$cqid = $update->callback_query->id;
$cid = $message->chat->id;
$uid= $message->from->id;
$ccid = $update->callback_query->message->chat->id;
$cuid = $update->callback_query->message->from->id;
$mid = $message->message_id;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$mid = $update->callback_query->message->message_id;
$ati = $update->message->from->first_name;
$familya = $update->message->from->last_name;
$login = $update->message->from->username;
$user_id = $update->message->from->id;
$from_id = $update->message->from->id;
$check_token = file_get_contents("https://api.telegram.org/bot$text/getMe")->result->username;
$json = json_decode($check_token);

$bot_id = $json->result->id;
$bot_name = $json->result->first_name;
$bot_user = $json->result->username;
$bot_ture = $json->result->is_bot;

$document = $message->document;
$file = $document->file_id;
$get = bot('getfile',['file_id'=>$file]);
$siz = $get->result->file_size;

$get = file_get_contents("https://api.telegram.org/bot870733702:AAGCRZd4vJc7t5-reH1RztofMSJrxW7rGrk/getUserProfilePhotos?user_id=$id&limit=1");
$json = json_decode($get);
$photo = $json->result->photos[0][0]->file_id;

if($text == "/start"){
    bot('sendMessage',[
       'chat_id'=>$chat_id,
       'parse_mode'=>"markdown",
        'text'=>"*👋 Assalomu alaykum $ati  kanallarda ishlovchi botimizga xush kelibsiz botni guruhingizga yoki kanalingizga admin qiling to'liq va uning funksiyalaridan bemalol foydalaning 
🔥 Bot kanalizda do'stlarga yuborish va postni ulashish tugmalarini har bir postingizga qo'shib beradi botdan foydalanish tartibi oddiy to'liq bilish uchun* /help *buyrug'ini yuboring!*",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'🔧 Sozlamalar 🔧', 'callback_data' => "sozlama"],['text'=>'🔥 Bõlim 🔥', 'callback_data' => "bolimlar"]],
            ]
        ]),
        ]);

}
if($data=="sozlama"){
   bot('editMessageText',[
    'message_id'=>$message_id2,
    'chat_id'=>$ccid,
    'text'=>"*🔧 Kerakli sozlamalarni tanlang:*",
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
       [['text'=>"📑 Kanalni sozlash 📑",'callback_data'=>"kanal"]],
   [['text'=>"💭 Ulashishlarni sozlash 💭",'callback_data'=>"ulashish"]],
]
       ])
  ]);   
}
if($data=="bolimlar"){
   bot('editMessageText',[
    'message_id'=>$message_id2,
    'chat_id'=>$ccid,
    'text'=>"*😊 Ushbu bo'lim orqali siz biz haqimizda to'liq ma'lumotlarga ega bo'lasiz va bizning loyihalardan bohabar bo'lasiz kerakli bo'limlarni tanlang:*",
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
       [['text'=>"💥 Bizning loyihalar 💥",'callback_data'=>"loyihalar"]],
    [['text'=>"🔥 Kanallarimiz 🔥",'callback_data'=>"kanallarim"]],
   [['text'=>"🔹 So'ngi yangilik 🔹",'callback_data'=>"yangilik"]],
]
       ])
  ]);
}
   if($data=="yangilik"){
  $url = 'https://daryo.uz/feed/';
   bot('answerCallbackQuery',[
       'callback_query_id'=>$cqid,
       'text'=> "🔷 $url $line !
✉ Yaratuvchilar : @Meshonuz4",
       'show_alert'=>true
        ]);
    }
if($data=="kanallarim"){
   bot('editMessageText',[
    'message_id'=>$message_id2,
    'chat_id'=>$ccid,
    'text'=>"<b>😊 Bizning eng zo'r Kanallarimizga siz ham obuna bo'ling ✅</b>
1. @Meshonuz4
2. @ZaxaR_Mbot
3. @Bot_Master_roMbot
4. @True_Mafia_Meshon",
    'parse_mode'=>'HTML'
  ]);
 }
if($data=="kanal"){
   bot('editMessageText',[
    'message_id'=>$message_id2,
    'chat_id'=>$ccid,
    'text'=>"☺ <b>Botni kanalga sozlash uchun botga quyidagi formatda xabar yuboring!</b>
<i>▶ Misol uchun : </i>@Meshonuz4",
    'parse_mode'=>'HTML'
  ]);
 }
if($data=="ulashish"){
   bot('editMessageText',[
    'message_id'=>$message_id2,
    'chat_id'=>$ccid,
    'text'=>"<b>♻ Ulashish uchun kerakli bo'lgan tekstni #ulash so'zidan so'ng yuboring ✅
🔹 Agar bunga qiynalsangiz tekstni botga yuboring</b>
<i>⚠ Diqqat bu funksiyalar faqat kanalda ishlaydi</i>",
    'parse_mode'=>'HTML'
  ]);
}
if($data=="loyihalar"){
   bot('editMessageText',[
    'message_id'=>$message_id2,
    'chat_id'=>$ccid,
    'text'=>"<b>😊 Bizning eng ommabop va eng yaxshi loyihalarimiz hozircha quyidagilardir :</b>
1. @ZaxaR_Mbot - <b>bu bot orqali Gruhingizni qizqarli qilishingiz mumkin✅</b>
2. @Bot_Master_roMbot - <b>Host va Php kodsiz Bot yaratadi</b>
3. @True_Mafia_Meshon - <b>True Mafia Oyinini gruhi</b>",
    'parse_mode'=>'HTML'

]);
}

$message_ch = $update->channel_post;
$message_ch_text = $message_ch->text;
$message_ch_photo = $message_ch->photo;


$message_ch_author = $message_ch->author_signature;
$message_ch_mid = $message_ch->message_id;
$message_ch_chid = $message_ch->chat->id;
$message_ch_user = $message_ch->chat->username;
$audio_ch = $message_ch->audio;

$texxx = $message_ch->caption;
$ex=explode("@",$texxx);
$ex=$ex[1];
$exx=explode(" ",$ex);
$ab=str_replace($exx[0],'$message_ch_user',$texxx);
$ab=str_replace('@','',$ab);
if(isset($message_ch_photo)){
$export = bot('exportChatInviteLink',[
    'chat_id'=>$message_ch_chid,
    ]);
  $a = $export->result;
    bot('editMessageCaption',[
        'chat_id'=>$message_ch_chid,
'message_id'=>$message_ch_mid,
'caption'=>"[$texxx]
🔥 Eng sara rasmlar va fotkalar faqat sizlar uchun bizda aslo uzoqlashmang biz bilan qoling 😉
   ✨ [@$message_ch_user] ✅",
        'message_id'=>$message_ch_mid,
        'parse_mode'=> 'Markdown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"♻ Do'stlarga yuborish ♻", "url"=>"https://t.me/share/url?url=https://telegram.me/$message_ch_user/$message_ch_mid"]],
                [['text'=>"🤖Botimiz", "url"=>"https://t.me/ReferralMoney_Robot"]],
            ]
        ])
        ]);
}

$message_ch_video = $message_ch->video;
if($message_ch_video){
   $export = bot('exportChatInviteLink',[
    'chat_id'=>$message_ch_chid,
    ]);
  $a = $export->result; bot('editMessageCaption',[
        'chat_id'=>$message_ch_chid,
        'caption'=>"[$texxx]
*✨ Oldin bizga, keyin qolganlarga ✅
🔹 Kanalimizga a'zo bo'lishni unutmang*🔥
 
 ✨[@$message_ch_user] ✅",
        'message_id'=>$message_ch_mid,
        'parse_mode'=> 'Markdown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"♻ Do'stlarga yuborish ♻", "url"=>"https://t.me/share/url?url=https://telegram.me/$message_ch_user/$message_ch_mid"]],
                [['text'=>"🤖Botimiz", "url"=>"https://t.me/ReferralMoney_Robot"]],
            ]
        ])
        ]);
}

$message_ch_audio = $message_ch->audio;
if($message_ch_audio){
   $export = bot('exportChatInviteLink',[
    'chat_id'=>$message_ch_chid,
    ]);
  $a = $export->result; bot('editMessageCaption',[
        'chat_id'=>$message_ch_chid,
        'caption'=>"[$texxx] 
    * ▷◉─────────0:00
      😍   ⏪       ⏸        ⏩    😍
    ┅━✧⊱••••🔊🎶♪🔊•••⊰✧━┅*
          🍁[@$message_ch_user] ✅",
        'message_id'=>$message_ch_mid,
        'parse_mode'=> 'Markdown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"♻ Do'stlarga yuborish ♻", "url"=>"https://t.me/share/url?url=https://telegram.me/$message_ch_user/$message_ch_mid"]],
                [['text'=>"🤖Botimiz", "url"=>"https://t.me/ReferralMoney_Robot"]],
            ]
        ])
        ]);
}

$message_ch_voice = $message_ch->voice;
if($message_ch_voice){
   $export = bot('exportChatInviteLink',[
    'chat_id'=>$message_ch_chid,
    ]);
  $a = $export->result; bot('editMessageCaption',[
        'chat_id'=>$message_ch_chid,
        'caption'=>"[$texxx] 
    * ▷◉─────────0:00
      😍   ⏪       ⏸        ⏩    😍
    ┅━✧⊱••••🔊🎶♪🔊•••⊰✧━┅*
          🍁 [@$message_ch_user] ✅",
        'message_id'=>$message_ch_mid,
        'parse_mode'=> 'Markdown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"♻ Do'stlarga yuborish ♻", "url"=>"https://t.me/share/url?url=https://telegram.me/$message_ch_user/$message_ch_mid"]],
                [['text'=>"🤖Botimiz", "url"=>"https://t.me/ReferralMoney_Robot"]],
            ]
        ])
        ]);
}
$message_ch_doc = $message_ch->document;
if($message_ch_doc){
   $export = bot('exportChatInviteLink',[
    'chat_id'=>$message_ch_chid,
    ]);
  $a = $export->result; bot('editMessageCaption',[
        'chat_id'=>$message_ch_chid,
        'caption'=>"[$texxx]
▶ Sizlar uchun maxsus fayl biz bilan qoling va birga bo'ling ✔
🍁 [@$message_ch_user]  ✅",
        'message_id'=>$message_ch_mid,
        'parse_mode'=> 'Markdown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"♻ Do'stlarga yuborish ♻", "url"=>"https://t.me/share/url?url=https://telegram.me/$message_ch_user/$message_ch_mid"]],
                [['text'=>"🤖Botimiz", "url"=>"https://t.me/ReferralMoney_Robot"]],
            ]
        ])
        ]);
}
if(isset($message_ch)){
$export = bot('exportChatInviteLink',[
'chat_id'=>$message_ch_chid,
    ]);
$a = $export->result;
bot('editMessageText',[
'chat_id'=>$message_ch_chid,
'message_id'=>$message_ch_mid,
'text'=> "[$message_ch_text] 
Sizlar uchun maxsus : @Aristokrat_uzbek",
'message_id'=>$message_ch_mid,
        'parse_mode'=> 'Markdown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"♻ Dostlarga yuborish ♻", "url"=>"https://t.me/share/url?url=https://telegram.me/$message_ch_user/$message_ch_mid"]],
                [['text'=>"🤖Botimiz", "url"=>"https://t.me/ReferralMoney_Robot"]],
            ]
        ])
        ]);



$baza = file_get_contents("azo.dat");  
if(mb_stripos($baza, $message_ch_chid) !== false){  
}else{  
file_put_contents("azo.dat", "$bazan$message_ch_chid");
}
}




$admin = "550584399";
$reply_menu = json_encode([
           'resize_keyboard'=>false,
            'force_reply' => true,
            'selective' => true
        ]);
    $replyik = $message->reply_to_message->text;
    $yubbi = "💌Yuboriladigon xabarni kiriting. Xabar turi markdown🔽";

if($text == "/send" and $chat_id == $admin){
      bot('sendMessage',[
      'chat_id'=>$chat_id,
      'parse_mode'=>'markdown',
      'text'=>$yubbi,
      'reply_markup'=>$reply_menu,
      ]);
    }
    if($text == "/help"){
    bot('sendmessage',[
        'chat_id'=>$cid,
        'parse_mode'=>"HTML",
        'text'=>"<b>👋 Salom $ati botdan foydalanish uchun avvalo siz </b>@Meshonuz4 va @True_Mafia_Meshon <b>kanallariga a'zo bo'lgan bo'lishingiz kerak a'zo bo'ling aks holda bot ishlamaydi.
😊 Botdan foydalanish tartibi quyidagicha siz avval botni kanalizga to'liq admin qiling va kanalga test so'zini yuboring va botga uni forward qilib yuboring keyin esa bot kanalizda aftomatik ravishda ishga tushadi ✅ 
⚠ Biz bergan buyruqlar faqat kanalda ishlaydi</b>
👤 <b>Admin : </b>@Aristokrat_Uzbek"
]);
}
    if($text == "/start"){
    bot('sendmessage',[
        'chat_id'=>$cid,
        'parse_mode'=>"HTML",
        'text'=>"<b>👋 Salom $ati botdan foydalanish uchun avvalo siz </b>@meshonuz4 va @True_Mafia_Meshon <b>kanallariga a'zo bo'lgan bo'lishingiz kerak a'zo bo'ling aks holda bot ishlamaydi.",
'reply_to_message_id'=>$mid,
        'disable_web_page_preview' => True,
 'reply_markup'=>json_encode([
   'inline_keyboard'=>[ 
[['text'=>'➕ A`zo bo`lish ➕','url'=>'https://t.me/Meshonuz4']],
[['text'=>'➕ Hamkor ➕','url'=>'https://t.me/True_Mafia_Meshon']]
] 
    ]) 
        ]);
}
    if($replyik=="💌Yuboriladigon xabarni kiriting. Xabar turi markdown🔽"){ $idss=file_get_contents("azo.dat");
      $idszs=explode("\n",$idss);
      foreach($idszs as $idlat){
      $hamma=bot('sendMessage',[
      'chat_id'=>$idlat,
      'parse_mode'=>'markdown',
      'text'=>$text,
      ]);
      }
    }
if($hamma){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"👫 Hammaga habar yetkazildi✅",

]);
//Mualliflik huquqi : @Clay_haker ga tegishli
//Kod : 2017-04-21 sanada yozilgan
//Ushbu kod katta arxivdan olingan
}
//Bu kod @Buyuk_Coder ga tegishli

if(mb_stripos($text,"@")!==false){  
$text = str_replace("@","",$text); 
  bot('sendmessage',[  
'chat_id'=>"$chat_id",  
'text'=>"$text",  
'parse_mode'=>'markdown',  
 'disable_web_page_preview'=>true 
]);  
}
//Mualliflik huquqi : @Clay_haker ga tegishli
//Kod : 2017-04-21 sanada yozilgan
//Ushbu kod katta arxivdan olingan
?>
© 2021 GitHub, Inc.
