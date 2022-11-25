<?php
###########################################
#-----------Users login system------------#
###########################################
/*=========================================\
Author      :  Mohammed Ahmed(M@@king)    \\
Version     :  1.1                        \\
Date Created:  Aug 20  2005               \\
----------------------------              \\
Last Update:    18-SEP-2006               \\
----------------------------              \\
Country    :   Palestine                  \\
City       :   Gaza                       \\
E-mail     :   m@maaking.com              \\
WWW        :   http://www.maaking.com     \\
Mobile/SMS :   00972-599-622235           \\
                                          \\
===========================================\
------------------------------------------*/
//ISO-8859-1
define("_CHARSET","windows-1256");
define("_LTR_RTL","rtl");
define("_HOME","ַבֶׁם׃םֹ");
define("_REGISTER","Ê׃ּםב");
define("_LOGIN","Ê׃ּםב ֿ־זב");
define("_LOGOUT","־ׁזּ");
define("_USERNAME","ַ׃ד ַבד׃Ê־ֿד");
define("_PASSWORD","ßבדֹ ַבדׁזׁ");
define("_WELCOME","ֳובַ");
define("_GOHOME","[ <a href=\"index.php\">ַבױÝֹֽ ַבֶׁם׃םֹ</a> ]");
define("_GOBACK","[ <a href=\"javascript:history.go(-1)\">ּׁזÚ ֵבל ַב־בÝ</a> ]");
define("_EDIT","ÊÚֿםב");
define("_DELETE","ֽ׀Ý");
define("_SEARCH","ָֻֽ");
define("_EMAIL","ַבָׁםֿ ַבַבßÊׁזהם");
define("_HELLO","דַָֽׁ");
define("_REDIRECTING"," ַּׁם ֵÚַֹֿ ַבÊזּםו ... ");
define("_CLICK_HERE_BROWSER_REDIRECT","ַײÛ״ והַ ַ׀ַ בד םהÞבß ַבדÊױÝֽ ÊבÞֶַםַ.");

//users.php
define("_NOT_YET","בד ם׃ּב ָÚֿ!");
define("_LAST_LOGIN","ֲ־ׁ ׂםַֹׁ בß ßַהÊ");
define("_FROM","דה");
define("_ON","Ýם");
define("_MY_ACCOUNT","ֽ׃ַָם");
define("_CHANGE_MY_INFO","ÊÚֿםב ָםַהַÊם");
define("_CHANGE_MY_PASSWORD","ÊÛםםׁ ßבדֹ ַבדׁזׁ");
define("_ERROR_INVALID_EMAIL","־״ֳ: ַבָׁםֿ ַבַבßÊׁזהם Ûםׁ ױֽםֽ.");
define("","");
define("","");
define("","");

# -------------------- #
#  Login Form  + function
# -------------------- #
define("_PLEASE_ENTER_YOUR_USER","ַבֱַּׁ Þד ַָֿ־ַב ַ׃דß זßבדֹ ַבדׁזׁ דה ֳּב ַבֿ־זב.");
define("_REMEBER_ME","Ê׀ßׁהם בדֹֿ ֳ׃ָזÚםה");
define("_FORGOT_PASSWORD","ה׃םÊ ßבדֹ ַבדׁזׁ¿");
define("_REQUIRED","ד״בזָ!");
define("_LOGIN_SUCCESS","Êד Ê׃ּםב ַבֿ־זב ָהַּֽ ¡ ַבֱַּׁ ַבַהÊÙַׁ ...");
define("_LOGIN_ERROR","־״ֳ: ַבֱַּׁ ÊֽÞÞ דה ַ׃ד ַבד׃Ê־ֿד זßבדֹ ַבדׁזׁ.");

# -------------------- #
#  Registration Form  + function
# -------------------- #
define("_REG_FORM","הדז׀ּ ַבÊ׃ּםב");
define("_FILED_STAR_REQUIRED","ַבֽÞזב ׀ַÊ ַבÚבַדֹ * ום ֽÞזב ד״בזָֹ.");
define("_RETYPE_PASSWORD","ֳÚֿ ßÊַָֹ ßבדֹ ַבדׁזׁ");
define("_FULLNAME","ַ׃דß ßַדבַ");
define("_ERROR_PLEASE_FILL_FIELDS","־״ֳ: ַבֱַּׁ Þד ָÊÚֶָֹ ßַÝֹ ַבֽÞזב.");
define("_ERROR_PASSWORD_DOESNT_MATCH","־״ֳ: ßבדֹ ַבדׁזׁ Ûםׁ דÊ״ַָÞֹ.");
define("_ALREADY_TAKEN","(ד׃ÊÚדב דה Þָב!)");
//Email register
define("_WELCOME_TO","ֳובַ ָß Ýם");
define("_PLZ_KEEP_THIS_EMAIL","ַבֱַּׁ ַבַֽÊÝַÙ ָו׀ַ ַבָׁםֿ בßם Ê׃Ê״םÚ ַבֿ־זב ַבל דזÞÚהַ בַֽÞַ. דÚבזדַÊß בֿםהַ ום ßַבÊַבם:");
define("_YOUR_ACCOUNT_IS_CURRENTLY_ACTIVE","ֽ׃ַָ״ בֿםהַ ַבֲה ÝÚַב. ַָדßַהß ַבֿ־זב ַבםו דה ־בַב ַבַָׁ״ ַבÊַבם:");
define("_PLZ_DONT_FORGOT_PWD","ַבֱַּׁ ַֽזב ֳה ÊÊ׀ßׁ ßבדֹ ַבדׁזׁ¡ בַההַ בַ ה׃Ê״םÚ ֳה הׁ׃בוַ בß Úָׁ ַבָׁםֿ ַבַבßÊׁזהם בַהוַ ד־ׂהֹ ָװßב דװÝׁ Ýם ÞַÚֹֿ ַבָםַהַÊ. זַ׀ַ ֻֽֿ זַה ה׃םÊ ßבדֹ ַבדׁזׁ ַָדßַהß ׂםַֹׁ דזÞÚהַ זַב׀וַָ ַבל ה׃םÊ ßבדֹ ַב׃ׁ¡ ֽםֻ ׃םÊד Úדב ßבדֹ דׁזׁ ּֿםֹֿ בß זַׁ׃ַבוַ בß ָזַ׃״ֹ ַבָׁםֿ ַבַבßÊׁזהם.");
define("_THANKS_FOR_REGISTERING","װßַׁ בß Úבל Ê׃ּםבß.");
define("_THIS_EMAIL_AUTO_GENERATED","Êד ַׁ׃ַב ו׀ַ ַבָׁםֿ ÊבÞֶַםַ.");
define("_DONT_RESPOND_WILL_IGNORED","ַבֱַּׁ בַ ÊÞד ַָבֿׁ Úבל ו׀ַ ַבָׁםֿ בַההַ ׃זÝ הÊַּוב ׁ׃ַבÊß.");
//end email
define("_EMAIL_DIE","ֻֽֿ ־״ֳ ֳֻהֱַ ֵׁ׃ַב ַבָׁםֿ ַבֵבßÊׁזהם¡ ַבֱַּׁ ÊָבםÛ ֵַֹֿׁ ַבדזÞÚ ($site_email)");
define("_REG_SUCCESS","ÊדÊ Úדבםֹ ַבÊ׃ּםב ָהַּֽ¡ ַָדßַהß ַבֲה ַבֿ־זב ֵבל ֽ׃ַָß");

# -------------------- #
#  Forgot password Form  + function
# -------------------- #
define("_SEND_NEW_PASSWORD","ֵׁ׃ַב ßבדֹ דׁזׁ ּֿםֹֿ");
define("_SEND_PASSWORD","ֳׁ׃ב ַבֲה");
define("_YOUR_INFO_AT","דÚבזדַÊß Ýם");
define("_NEW_PASSWORD","ßבדֹ דׁזׁ ּֿםֹֿ");
define("_NEW_PWD_SENT_TO_YOUR_EMAIL","Êד ֵׁ׃ַב ßבדֹ דׁזׁ ּֿםֹֿ ֵבל ָׁםֿß ַבַבßÊׁזהם.");
//sed forgot email
define("_YOU_ARE_RECEIVING_EMAIL","ֳהÊ Ê׃Êבד ו׀ַ ַבָׁםֿ בֳהß (ֳז װ־ױ םÊÙַוׁ ֳָהו ֳהÊ) Þֿ ״בָÊ ֵÚַֹֿ ÊÚםםה בßבדֹ ַבדׁזׁ");
define("_HERE_ISIT_BELOW","זום ßַבÊַבם:");
define("_YOU_MAY_LOGIN_BELOW","ַָדßַהß ַבֿ־זב דה ־בַב:");
define("_YOU_CAN_OFCOURSE_CHANGE_PWS","ַָדßַהß ÊÛםםׁ ßבדֹ ַבדׁזׁ דה ־בַב ַבֿ־זב ַבל ֽ׃ַָß זדה ֻד ַ־Êׁ ÊÛםםׁ ßבדֹ ַבדׁזׁ¡ זַ׀ַ זַּוÊ דװßבֹ ַבֱַּׁ ַÊױב ַָבַַֹֿׁ");
define("_THANKS","װßַׁנ");
//end email
# -------------------- #
#  Change Password
# -------------------- #
define("_CHANGE_MY_PWD","ÊÛםםׁ ßבדֹ ַבדׁזׁ!");
define("_ONCE_CHANGED_LOGOUT","ָדּֿׁ ÊÛםםׁ ßבדֹ ַבדׁזׁ ׃םÊד ַב־ׁזּ דה ֽ׃ַָß");
define("_OLD_PWD","ßבדֹ ַבדׁזׁ ַבÞֿםדֹ");
define("_NEW_PWD","ßבדֹ ַבדׁזׁ ַבּֿםֹֿ");
define("_CONFIRM_NEW_PWD","Êֳßםֿ ַבßבדֹ ַבּֿםֹֿ");
define("_CHANGE_PWD","ÊÛםםׁ ßבדֹ ַבדׁזׁ");
define("_NOT_AUTHORIZED","<h3> ־״ֳ: בם׃ דה ױבַֽםַÊß ַבזױזב ֵבל ו׀ו ַבױÝֹֽ");
define("_OLD_PWD_DONT_MATCH","־״ֳ: ßבדֹ ַבדׁזׁ ַבÞֿםדֹ Ûםׁ דÊ״ַָÞֹ דÚ ַבßבדֹ ַבדזּזֹֿ Ýם ÞַÚֹֿ ַבָםַהַÊ.");
define("_ERROR_NEW_PWD_DOESNT_MATCH","־״ֳ: ßבדֹ ַבדׁזׁ ַבּֿםֹֿ Ûםׁ דÊ״ַָÞֹ.");
define("_WRONG_USEREMAIL","־״ֳ: ַבֱַּׁ ַבÊֽÞÞ דה ַ׃ד ַבד׃Ê־ֿד זַבָׁםֿ ַבַבßÊׁזהם.");
define("_SUCCESS_PWD_CHANGED","Êד ÊÛםםׁ ßבדֹ ַבדׁזׁ ָהַּֽ¡ ַבֱַּׁ ַבַהÊÙַׁ");
define("_PLZ_REMEBER_NEW_PWS","Úבםß ָÊ׀ßׁ ßבדֹ ַבדׁזׁ ַבּֿםֹֿ ָÚהַםֹ.");
define("_PLZ_WAIT","ַבֱַּׁ ַבַהÊÙַׁ ... ");

# -------------------- #
#  Change My Info
# -------------------- #
define("_CHANGE_MY_INFORMATION","ÊÚֿםב ָםַהַÊם");
define("_WEBSITE","דזÞÚ ַבßÊׁזהם");
define("_COUNTRY","ַבֿזבֹ");
define("_CITY","ַבדֿםהֹ");
define("_TEL_MOBILE","וַÊÝ/ּזַב");
define("_PROFILE","הָ׀ֹ Úהß");
define("_SAVE_CHANGES","ֽÝÙ ַבÊÛםםַׁÊ");
define("_THE_EMAIL","The email");
define("_EG","דֻב ");
define("_YOUR_INFO_HAS_BEEN_CHANGES","בÞֿ Êד ÊÚֿםב ָםַהַÊß ָהַּֽ¡ ַבֱַּׁ ַבַהÊÙַׁ ... ");


?>
