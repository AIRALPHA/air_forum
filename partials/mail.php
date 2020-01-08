<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>ACTIVATION DE COMPTE</title>
    <style>
        #Table1
        {
            border: 0px solid #C0C0C0;
            background-color: #07FFC3;
            background-image: none;
            border-collapse: separate;
            border-spacing: 1px;
            margin: 0;
        }
        #Table1 td
        {
            padding: 0;
        }
        #Table1 td div
        {
            white-space: nowrap;
        }
        #Table1 .cell0
        {
            background-color: transparent;
            background-image: none;
            text-align: center;
            vertical-align: middle;
            height: 56px;
        }
        #Image1
        {
            border: 0px solid transparent;
            border-radius: 65px;
            padding: 0;
            margin: 0;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
        }
        #Shape1
        {
            border-width: 0;
            vertical-align: top;
        }
        #Button1
        {
            border: 1px solid #2E6DA4;
            border-radius: 4px;
            background-color: #3370B7;
            background-image: none;
            color: #FFFFFF;
            font-family: Arial;
            font-weight: normal;
            font-size: 13px;
            box-shadow: 0px 0px 5px #000000;
            margin: 0;
        }

        input:focus, textarea:focus, select:focus
        {
            outline: none;
        }

        a
        {
            text-decoration: none;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
<a href=""><img src="builtwithwwb14.png" alt="WYSIWYG Web Builder" style="position:absolute;left:441px;top:967px;margin: 0;border-width:0;z-index:250"></a>
<div id="welcome" style="position:relative;text-align:center;width:100%;height:100%;float:left;display:block;z-index:7;">
    <div id="welcome_Container" style="width:724px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">

        <table style="position:absolute;left:0px;top:0px;width:726px;height:58px;z-index:1;" id="Table1">
            <tr>
                <td class="cell0"><span style="color:#000000;font-family:Arial;font-size:20px;line-height:23px;"><?= WEBSITE_NAME; ?> ACTIVATION DE COMPTE</span></td>
            </tr>
        </table>
        <div id="wb_Image1" style="position:absolute;left:286px;top:89px;width:122px;height:116px;z-index:2;">
            <img src="me.jpg" id="Image1" alt="">
        </div>
        <div id="wb_Shape1" style="position:absolute;left:109px;top:231px;width:507px;height:204px;z-index:3;">
            <img src="img/img0001.png" id="Shape1" alt="messa" style="width:507px;height:204px;">
        </div>
        <button type="submit" id="Button1" name="activation" style="position:absolute;left:247px;top:352px;width:200px;height:46px;z-index:4;"><a href="<?php echo $smtp.'/activation.php?p='.$pseudo.'&amp;tk='.$token; ?>">ACTIVER LE COMPTE</a></button>
        <img src="img/img0002.jpg" id="Banner1" alt="Copyright 2018 AIR FORUM" style="border-width:0;position:absolute;left:0px;top:450px;width:724px;height:50px;z-index:5;">
    </div>
</div>
</body>
</html>