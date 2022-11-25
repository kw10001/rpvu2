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
define("_HOME","��������");
define("_REGISTER","�����");
define("_LOGIN","����� ����");
define("_LOGOUT","����");
define("_USERNAME","��� ��������");
define("_PASSWORD","���� ������");
define("_WELCOME","����");
define("_GOHOME","[ <a href=\"index.php\">������ ��������</a> ]");
define("_GOBACK","[ <a href=\"javascript:history.go(-1)\">���� ��� �����</a> ]");
define("_EDIT","�����");
define("_DELETE","���");
define("_SEARCH","���");
define("_EMAIL","������ ����������");
define("_HELLO","�����");
define("_REDIRECTING"," ���� ����� ������� ... ");
define("_CLICK_HERE_BROWSER_REDIRECT","���� ��� ��� �� ����� ������� �������.");

//users.php
define("_NOT_YET","�� ���� ���!");
define("_LAST_LOGIN","��� ����� �� ����");
define("_FROM","��");
define("_ON","��");
define("_MY_ACCOUNT","�����");
define("_CHANGE_MY_INFO","����� �������");
define("_CHANGE_MY_PASSWORD","����� ���� ������");
define("_ERROR_INVALID_EMAIL","���: ������ ���������� ��� ����.");
define("","");
define("","");
define("","");

# -------------------- #
#  Login Form  + function
# -------------------- #
define("_PLEASE_ENTER_YOUR_USER","������ �� ������ ���� ����� ������ �� ��� ������.");
define("_REMEBER_ME","������ ���� �������");
define("_FORGOT_PASSWORD","���� ���� �����ѿ");
define("_REQUIRED","�����!");
define("_LOGIN_SUCCESS","�� ����� ������ ����� � ������ �������� ...");
define("_LOGIN_ERROR","���: ������ ���� �� ��� �������� ����� ������.");

# -------------------- #
#  Registration Form  + function
# -------------------- #
define("_REG_FORM","����� �������");
define("_FILED_STAR_REQUIRED","������ ��� ������� * �� ���� ������.");
define("_RETYPE_PASSWORD","��� ����� ���� ������");
define("_FULLNAME","���� �����");
define("_ERROR_PLEASE_FILL_FIELDS","���: ������ �� ������ ���� ������.");
define("_ERROR_PASSWORD_DOESNT_MATCH","���: ���� ������ ��� �������.");
define("_ALREADY_TAKEN","(������ �� ���!)");
//Email register
define("_WELCOME_TO","���� �� ��");
define("_PLZ_KEEP_THIS_EMAIL","������ �������� ���� ������ ��� ������ ������ ��� ������ �����. �������� ����� �� �������:");
define("_YOUR_ACCOUNT_IS_CURRENTLY_ACTIVE","����� ����� ���� ����. ������� ������ ���� �� ���� ������ ������:");
define("_PLZ_DONT_FORGOT_PWD","������ ���� �� ����� ���� �����ѡ ����� �� ������ �� ������ �� ��� ������ ���������� ����� ����� ���� ���� �� ����� ��������. ���� ��� ��� ���� ���� ������ ������� ����� ������ ������� ��� ���� ���� ���ѡ ��� ���� ��� ���� ���� ����� �� �������� �� ������ ������ ����������.");
define("_THANKS_FOR_REGISTERING","���� �� ��� ������.");
define("_THIS_EMAIL_AUTO_GENERATED","�� ����� ��� ������ �������.");
define("_DONT_RESPOND_WILL_IGNORED","������ �� ��� ����� ��� ��� ������ ����� ��� ������ ������.");
//end email
define("_EMAIL_DIE","��� ��� ����� ����� ������ ���������� ������ ����� ����� ������ ($site_email)");
define("_REG_SUCCESS","��� ����� ������� ����͡ ������� ���� ������ ��� �����");

# -------------------- #
#  Forgot password Form  + function
# -------------------- #
define("_SEND_NEW_PASSWORD","����� ���� ���� �����");
define("_SEND_PASSWORD","���� ����");
define("_YOUR_INFO_AT","�������� ��");
define("_NEW_PASSWORD","���� ���� �����");
define("_NEW_PWD_SENT_TO_YOUR_EMAIL","�� ����� ���� ���� ����� ��� ����� ����������.");
//sed forgot email
define("_YOU_ARE_RECEIVING_EMAIL","��� ����� ��� ������ ���� (�� ��� ������ ���� ���) �� ���� ����� ����� ����� ������");
define("_HERE_ISIT_BELOW","��� �������:");
define("_YOU_MAY_LOGIN_BELOW","������� ������ �� ����:");
define("_YOU_CAN_OFCOURSE_CHANGE_PWS","������� ����� ���� ������ �� ���� ������ ��� ����� ��� �� ���� ����� ���� �����ѡ ���� ����� ����� ������ ���� ��������");
define("_THANKS","�����");
//end email
# -------------------- #
#  Change Password
# -------------------- #
define("_CHANGE_MY_PWD","����� ���� ������!");
define("_ONCE_CHANGED_LOGOUT","����� ����� ���� ������ ���� ������ �� �����");
define("_OLD_PWD","���� ������ �������");
define("_NEW_PWD","���� ������ �������");
define("_CONFIRM_NEW_PWD","����� ������ �������");
define("_CHANGE_PWD","����� ���� ������");
define("_NOT_AUTHORIZED","<h3> ���: ��� �� �������� ������ ��� ��� ������");
define("_OLD_PWD_DONT_MATCH","���: ���� ������ ������� ��� ������� �� ������ �������� �� ����� ��������.");
define("_ERROR_NEW_PWD_DOESNT_MATCH","���: ���� ������ ������� ��� �������.");
define("_WRONG_USEREMAIL","���: ������ ������ �� ��� �������� ������� ����������.");
define("_SUCCESS_PWD_CHANGED","�� ����� ���� ������ ����͡ ������ ��������");
define("_PLZ_REMEBER_NEW_PWS","���� ����� ���� ������ ������� ������.");
define("_PLZ_WAIT","������ �������� ... ");

# -------------------- #
#  Change My Info
# -------------------- #
define("_CHANGE_MY_INFORMATION","����� �������");
define("_WEBSITE","���� ��������");
define("_COUNTRY","������");
define("_CITY","�������");
define("_TEL_MOBILE","����/����");
define("_PROFILE","���� ���");
define("_SAVE_CHANGES","��� ���������");
define("_THE_EMAIL","The email");
define("_EG","��� ");
define("_YOUR_INFO_HAS_BEEN_CHANGES","��� �� ����� ������� ����͡ ������ �������� ... ");


?>
