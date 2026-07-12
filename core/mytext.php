<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Real Time Unicode Converter</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   
    <style type="text/css">
        @font-face {
            font-family: Potha;
            src: url(POTHA0.eot);
        }
        .english{
            color: purple;
        }
        .sinhala{
            font-family: Iskoola Pota;
            color: navy;
        }
        .title{
            font-familiy:Arial;
            font-weight:bold;
            color:navy;
        }
        .title2{
            font-familiy:Arial;
            font-weight:bold;
        }
        .link{
            font-weight: bold;
            color: green;
            border-width: 1px;
            border-style:solid;
            border-color: green;
            cursor:hand;
        }
    </style>

    <script language="JavaScript" type="text/javascript">
<!-- Begin
var text;
var nVowels;
var consonants= new Array()
var consonantsUni= new Array()
var vowels= new Array()
var vowelsUni= new Array()
var vowelModifiersUni= new Array()
var specialConsonants= new Array()
var specialConsonantsUni= new Array()
var specialCharUni= new Array()
var specialChar= new Array()


    vowelsUni[0]='ඌ';    vowels[0]='oo';    vowelModifiersUni[0]='ූ';
    vowelsUni[1]='ඕ';    vowels[1]='o\\)';    vowelModifiersUni[1]='ෝ';
    vowelsUni[2]='ඕ';    vowels[2]='oe';    vowelModifiersUni[2]='ෝ';
    vowelsUni[3]='ආ';    vowels[3]='aa';    vowelModifiersUni[3]='ා';
    vowelsUni[4]='ආ';    vowels[4]='a\\)';    vowelModifiersUni[4]='ා';
    vowelsUni[5]='ඈ';    vowels[5]='Aa';    vowelModifiersUni[5]='ෑ';
    vowelsUni[6]='ඈ';    vowels[6]='A\\)';    vowelModifiersUni[6]='ෑ';
    vowelsUni[7]='ඈ';    vowels[7]='ae';    vowelModifiersUni[7]='ෑ';
    vowelsUni[8]='ඊ';    vowels[8]='ii';    vowelModifiersUni[8]='ී';
    vowelsUni[9]='ඊ';    vowels[9]='i\\)';    vowelModifiersUni[9]='ී';
    vowelsUni[10]='ඊ';    vowels[10]='ie';    vowelModifiersUni[10]='ී';
    vowelsUni[11]='ඊ';    vowels[11]='ee';    vowelModifiersUni[11]='ී';
    vowelsUni[12]='ඒ';    vowels[12]='ea';    vowelModifiersUni[12]='ේ';
    vowelsUni[13]='ඒ';    vowels[13]='e\\)';    vowelModifiersUni[13]='ේ';
    vowelsUni[14]='ඒ';    vowels[14]='ei';    vowelModifiersUni[14]='ේ';
    vowelsUni[15]='ඌ';    vowels[15]='uu';    vowelModifiersUni[15]='ූ';
    vowelsUni[16]='ඌ';    vowels[16]='u\\)';    vowelModifiersUni[16]='ූ';
    vowelsUni[17]='ඖ';    vowels[17]='au';    vowelModifiersUni[17]='ෞ';
    vowelsUni[18]='ඇ';    vowels[18]='/\a';    vowelModifiersUni[18]='ැ';
    
    vowelsUni[19]='අ';    vowels[19]='a';    vowelModifiersUni[19]='';
    vowelsUni[20]='ඇ';    vowels[20]='A';    vowelModifiersUni[20]='ැ';
    vowelsUni[21]='ඉ';    vowels[21]='i';    vowelModifiersUni[21]='ි';
    vowelsUni[22]='එ';    vowels[22]='e';    vowelModifiersUni[22]='ෙ';
    vowelsUni[23]='උ';    vowels[23]='u';    vowelModifiersUni[23]='ු';
    vowelsUni[24]='ඔ';    vowels[24]='o';    vowelModifiersUni[24]='ො';
    vowelsUni[25]='ඓ';    vowels[25]='I';    vowelModifiersUni[25]='ෛ';
    nVowels=26;

    specialConsonantsUni[0]='ං'; specialConsonants[0]=/\\n/g;
    specialConsonantsUni[1]='ඃ'; specialConsonants[1]=/\\h/g;
    specialConsonantsUni[2]='ඞ'; specialConsonants[2]=/\\N/g;
    specialConsonantsUni[3]='ඍ'; specialConsonants[3]=/\\R/g;
    //special characher Repaya
    specialConsonantsUni[4]='ර්'+'\u200D'; specialConsonants[4]=/R/g;
    specialConsonantsUni[5]='ර්'+'\u200D'; specialConsonants[5]=/\\r/g;
    
    consonantsUni[0]='ඬ'; consonants[0]='nnd';
    consonantsUni[1]='ඳ'; consonants[1]='nndh';
    consonantsUni[2]='ඟ'; consonants[2]='nng';
    consonantsUni[3]='ථ'; consonants[3]='Th';
    consonantsUni[4]='ධ'; consonants[4]='Dh';
    consonantsUni[5]='ඝ'; consonants[5]='gh';
    consonantsUni[6]='ඡ'; consonants[6]='Ch';
    consonantsUni[7]='ඵ'; consonants[7]='ph';
    consonantsUni[8]='භ'; consonants[8]='bh';
    consonantsUni[9]='ශ'; consonants[9]='sh';
    consonantsUni[10]='ෂ'; consonants[10]='Sh';
    consonantsUni[11]='ඥ'; consonants[11]='GN';
    consonantsUni[12]='ඤ'; consonants[12]='KN';
    consonantsUni[13]='ළු'; consonants[13]='Lu';
    consonantsUni[14]='ද'; consonants[14]='dh';
    consonantsUni[15]='ච'; consonants[15]='ch';
    consonantsUni[16]='ඛ'; consonants[16]='kh';
    consonantsUni[17]='ත'; consonants[17]='th';
    
    consonantsUni[18]='ට'; consonants[18]='t';
    consonantsUni[19]='ක'; consonants[19]='k';    
    consonantsUni[20]='ඩ'; consonants[20]='d';
    consonantsUni[21]='න'; consonants[21]='n';
    consonantsUni[22]='ප'; consonants[22]='p';
    consonantsUni[23]='බ'; consonants[23]='b';
    consonantsUni[24]='ම'; consonants[24]='m';   
    consonantsUni[25]='‍ය'; consonants[25]='\\u005C' + 'y';
    consonantsUni[26]='‍ය'; consonants[26]='Y';
    consonantsUni[27]='ය'; consonants[27]='y';
    consonantsUni[28]='ජ'; consonants[28]='j';
    consonantsUni[29]='ල'; consonants[29]='l';
    consonantsUni[30]='ව'; consonants[30]='v';
    consonantsUni[31]='ව'; consonants[31]='w';
    consonantsUni[32]='ස'; consonants[32]='s';
    consonantsUni[33]='හ'; consonants[33]='h';
    consonantsUni[34]='ණ'; consonants[34]='N';
    consonantsUni[35]='ළ'; consonants[35]='L';
    consonantsUni[36]='ඛ'; consonants[36]='K';
    consonantsUni[37]='ඝ'; consonants[37]='G';
    consonantsUni[38]='ඨ'; consonants[38]='T';
    consonantsUni[39]='ඪ'; consonants[39]='D';
    consonantsUni[40]='ඵ'; consonants[40]='P';
    consonantsUni[41]='ඹ'; consonants[41]='B';
    consonantsUni[42]='ෆ'; consonants[42]='f';
    consonantsUni[43]='ඣ'; consonants[43]='q';
    consonantsUni[44]='ග'; consonants[44]='g';
    //last because we need to ommit this in dealing with Rakaransha
    consonantsUni[45]='ර'; consonants[45]='r';

    specialCharUni[0]='ෲ'; specialChar[0]='ruu';
    specialCharUni[1]='ෘ'; specialChar[1]='ru';
    //specialCharUni[2]='්‍ර'; specialChar[2]='ra';
    

function startText() {
    var s,r,v;
    text = document.txtBox.box1.value;  
    //special consonents
    for (var i=0; i<specialConsonants.length; i++){
        text = text.replace(specialConsonants[i], specialConsonantsUni[i]);
    }
    //consonents + special Chars
    for (var i=0; i<specialCharUni.length; i++){
        for (var j=0;j<consonants.length;j++){
            s = consonants[j] + specialChar[i];
            v = consonantsUni[j] + specialCharUni[i];
            r = new RegExp(s, "g");
            text = text.replace(r, v);
        }
    }
    //consonants + Rakaransha + vowel modifiers
    for (var j=0;j<consonants.length;j++){
        for (var i=0;i<vowels.length;i++){
            s = consonants[j] + "r" + vowels[i];
            v = consonantsUni[j] + "්‍ර" + vowelModifiersUni[i];
            r = new RegExp(s, "g");
            text = text.replace(r, v);
        }
        s = consonants[j] + "r";
        v = consonantsUni[j] + "්‍ර";
        r = new RegExp(s, "g");
        text = text.replace(r, v);
    }
    //consonents + vowel modifiers
    for (var i=0;i<consonants.length;i++){
        for (var j=0;j<nVowels;j++){ 
            s = consonants[i]+vowels[j];
            v = consonantsUni[i] + vowelModifiersUni[j];
            r = new RegExp(s, "g");
            text = text.replace(r, v);
        }
    }

    //consonents + HAL
    for (var i=0; i<consonants.length; i++){
        r = new RegExp(consonants[i], "g");
        text = text.replace(r, consonantsUni[i]+"්");
    }
        
    //vowels
    for (var i=0; i<vowels.length; i++){
        r = new RegExp(vowels[i], "g");
        text = text.replace(r, vowelsUni[i]);
    }

    document.txtBox.box2.value=text;
}

function copyit(theField) {
    var tempval=eval("document."+theField);
    tempval.focus();
    tempval.select();
    therange=tempval.createTextRange();
    therange.execCommand("Copy")
}

var schemeVisible = 0;
function changeVisibility(){
    if (schemeVisible){
        document.getElementById('scheme').style.visibility='hidden';
        document.getElementById('link').innerHTML="&nbsp;Show Transliteration Scheme&nbsp;";
        schemeVisible=0;
    }
    else{
        document.getElementById('scheme').style.visibility='visible';
        document.getElementById('link').innerHTML="&nbsp;&nbsp;Hide Transliteration Scheme&nbsp;";
        schemeVisible=1;
    }
}
//  End -->

    </script>

</head>
<body onload="javascript:txtBox.box1.focus();">
    <center>
        <table width="600px">
            <tr>
                <td>
                    <form name="txtBox" id="txtBox">
                        <img src="ui3RT.jpg" alt="Real Time Font Converter" /><br />
                        <br />
                        <span class="TableText">Transliterated ( SinGlish Scheme)</span> &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a><span id="link" class ="link" align="right" onclick="changeVisibility()">
                            &nbsp;Show Transliteration Scheme&nbsp;</span></a>
                        <br />
                        <textarea onkeyup="startText();" onselect="startText();" onclick="startText();" style="font-size: 12pt;
                            width: 600px;" name="box1" rows="7"></textarea>
                        <input type="reset" value="Reset" style="position: relative; left: 500px; width: 100px;" />
                        <br />
                        <span class="TableText">Unicode (යුනිකෝඩ්)</span><br />
                        <textarea style="font-size: 14pt; font-family: Potha, Malithi Web , Arial Unicode MS;
                            width: 600px;" name="box2" rows="7"></textarea>
                        <input onclick="copyit('txtBox.box2')" type="button" value="Copy" style="position: relative;
                            left: 500px; width: 100px;" />
                    </form>
                    <br />
                    <hr />
                    <center>
                        <span class="p">© 2006 Language Technology Research Laboratory - University of Colombo
                            School of Computing</span><br />
                        <span class="p" style="color: Red;">Best viewed with Internet Explorer 5.x or higher
                            in 1024 x 768 resolution.</span>
                    </center>
                </td>
            </tr>
        </table>
    </center>
    <div id="scheme" style="visibility: hidden; position: absolute; top: 239px; border: green 1px solid;
        background-color: white;">
                    <table border="0" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                    <td rowspan="5" style="width:10px;"></td>
                    <td></td><td></td><td></td><td></td><td></td>
                    <td rowspan="5" style="width:10px;"></td>
                    </tr>
                    <tr><td colspan="5" style="height:5px;"></td></tr>
                        <tr>
                            <td style="width: 216px" valign="top" align="center">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td colspan="9" bgcolor="#EBEBEB">
                                            <p align="center">
                                                <span class="title">Vowel Sounds</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" >
                                            <p align="center">
                                                <span class="title2">Short</span></p>
                                        </td>
                                        <td style="width: 15px;"></td>
                                        <td colspan="5">
                                            <p align="center">
                                                <span class="title2">Long</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#EBDDB1" style="width: 45px">
                                            <p>
                                                <span class="sinhala">&#3461;</span></p>
                                        </td>
                                        <td bgcolor="#EBDDB1" style="width: 30px">
                                            <p>
                                                <span class="english">a</span></p>
                                        </td>
                                        <td bgcolor="#EBDDB1" style="width: 30px">
                                        </td>
                                        <td >
                                        </td>
                                        <td bgcolor="#E0E2AF" style="width: 45px">
                                            <p>
                                                <span class="sinhala">&#3462;</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF" style="width: 30px">
                                            <p>
                                                <span class="english">aa</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF" style="width: 30px">
                                            <p>
                                                <span class="english">a)</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF" style="width: 30px">
                                            &nbsp;
                                        </td>
                                        <td width="30" bgcolor="#E0E2AF">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#F7F0DD">
                                            <p>
                                                <span class="sinhala">&#3463;</span></p>
                                        </td>
                                        <td bgcolor="#F7F0DD">
                                            <p>
                                                <span class="english">A</span></p>
                                        </td>
                                        <td bgcolor="#F7F0DD" >
                                            <p>
                                                <span class="english">\a</span></p>
                                        </td>
                                        <td >
                                            &nbsp;
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="sinhala">&#3464;</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="english">Aa</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="english">A)</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="english">ae</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#EBDDB1" >
                                            <p>
                                                <span class="sinhala">&#3465;</span></p>
                                        </td>
                                        <td bgcolor="#EBDDB1" >
                                            <p>
                                                <span class="english">i</span></p>
                                        </td>
                                        <td bgcolor="#EBDDB1">
                                        </td>
                                        <td >
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="sinhala">&#3466;</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="english">ii</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF" >
                                            <p>
                                                <span class="english">i)</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="english">ie</span></p>
                                        </td>
                                        <td width="24" bgcolor="#E0E2AF">
                                            <p>
                                                <span class="english">ee</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#F7F0DD">
                                            <p>
                                                <span class="sinhala">&#3473;</span></p>
                                        </td>
                                        <td bgcolor="#F7F0DD">
                                            <p>
                                                <span class="english">e</span></p>
                                        </td>
                                        <td bgcolor="#F7F0DD">
                                            &nbsp;
                                        </td>
                                        <td >
                                            &nbsp;
                                        </td>
                                        <td bgcolor="#F0F1DA" >
                                            <p>
                                                <span class="sinhala">&#3474;</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="english">ea</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA" >
                                            <p>
                                                <span class="english">e)</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="english">ei</span></p>
                                        </td>
                                        <td  bgcolor="#F0F1DA">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#EBDDB1" >
                                            <p>
                                                <span class="sinhala">&#3476;</span></p>
                                        </td>
                                        <td bgcolor="#EBDDB1">
                                            <p>
                                                <span class="english">o</span></p>
                                        </td>
                                        <td bgcolor="#EBDDB1">
                                            &nbsp;
                                        </td>
                                        <td >
                                            &nbsp;
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="sinhala">&#3477;</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="english">oe</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="english">o)</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            &nbsp;
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#F7F0DD">
                                            <p>
                                                <span class="sinhala">&#3467;</span></p>
                                        </td>
                                        <td bgcolor="#F7F0DD">
                                            <p>
                                                <span class="english">u</span></p>
                                        </td>
                                        <td bgcolor="#F7F0DD">
                                            &nbsp;
                                        </td>
                                        <td>
                                            &nbsp;
                                        </td>
                                        <td bgcolor="#F0F1DA" >
                                            <p>
                                                <span class="sinhala">&#3468;</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA" >
                                            <p>
                                                <span class="english">uu</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="english">u)</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="english">oo</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                        </td>
                                        <td >
                                        </td>
                                        <td >
                                        </td>
                                        <td ></td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="sinhala">&#3478;</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="english">au</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF"></td>
                                        <td bgcolor="#E0E2AF"></td>
                                        <td bgcolor="#E0E2AF"></td>
                                    </tr>
                                </table>
                                </td>
                            <td style="width: 20px"></td>
                            <td style="width: 248px" valign="top" align="center">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td colspan="4" bgcolor="#EBEBEB">
                                            <p align="center">
                                                <span class="title">Auxiliaries</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <p align="center">
                                                <span class="title2">Special Auxiliaries</span></p>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#E8F4D0">
                                        <td style="width: 40px">
                                            <p>
                                                <span class="sinhala">&#3515;&#3530;</span></p>
                                        </td>
                                        <td style="width: 40px">
                                            <p>
                                                <span style='font-family: "Iskoola Pota"'>&#3512;&#3515;&#3530;&#8205;</span></p>
                                        </td>
                                        <td style="width: 70px">
                                            <p>
                                                <span class="english">\r</span><i>&lt;letter&gt;</i></p>
                                        </td>
                                        <td style="width: 70px">
                                            <p>
                                                <span class="english">R</span><i>&lt;letter&gt;</i></p>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#F5FBEC">
                                        <td >
                                            <p>
                                                <span class="sinhala">&#3530;&#8205;&#3514;</span></p>
                                        </td>
                                        <td>
                                            <p>
                                                <span style='font-family: "Iskoola Pota"'>&#3504;&#3530;&#8205;&#3514;</span>&#8205;</p>
                                        </td>
                                        <td >
                                            <p>
                                                <i>&lt;letter&gt;</i><span class="english">Y</span></p>
                                        </td>
                                        <td >
                                            <p>
                                                <i>&lt;letter&gt;</i><span class="english">\y</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <p align="center">
                                                <span class="title2">Vowel Sound Auxiliaries</span></p>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#E8F4D0">
                                        <td >
                                            <p>
                                                <span class="sinhala">&#3544;</span></p>
                                        </td>
                                        <td >
                                            <p>
                                                <span style='font-family: "Iskoola Pota"'>&#3482;&#3544;</span></p>
                                        </td>
                                        <td >
                                            <p>
                                                <i>&lt;letter&gt;</i><span class="english">ru</span></p>
                                        </td>
                                        <td >
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr bgcolor="#F5FBEC">
                                        <td >
                                            <p>
                                                <span class="sinhala">&#3551;</span></p>
                                        </td>
                                        <td >
                                            <p>
                                                <span style='font-family: "Iskoola Pota"'>&#3488;&#3550;</span></p>
                                        </td>
                                        <td>
                                            <p>
                                                <i>&lt;letter&gt;</i><span class="english">au</span></p>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr bgcolor="#E8F4D0">
                                        <td><p>
                                                <span class="sinhala">ෛ</span> </p>
                                        </td>
                                        <td>
                                            <p>
                                                <span style='font-family: "Iskoola Pota"'>&#3512;&#3547;</span></p>
                                        </td>
                                        <td>
                                            <p>
                                                <i>&lt;letter&gt;</i><span class="english">I</span></p>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <p align="center">
                                                <span class="title2">Nasal Sound Auxiliaries</span></p>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#F5FBEC">
                                        <td>
                                            <p>
                                                <span class="sinhala">&#3500;</span></p>
                                        </td>
                                        <td>
                                            <p>
                                                <span style='font-family: "Iskoola Pota"'>&#3524;&#3500;</span></p>
                                        </td>
                                        <td>
                                            <p>
                                                <span class="english"><b>nn</b>da</span></p>
                                        </td>
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr bgcolor="#E8F4D0">
                                        <td>
                                            <p>
                                                <span class="sinhala">&#3507;</span></p>
                                        </td>
                                        <td>
                                            <p>
                                                <span style='font-family: "Iskoola Pota"'>&#3524;&#3507;</span></p>
                                        </td>
                                        <td>
                                            <p>
                                                <span class="english"><b>nn</b>dha</span></p>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#F5FBEC">
                                        <td >
                                            <p>
                                                <span class="sinhala">&#3487;</span></p>
                                        </td>
                                        <td>
                                            <p>
                                                <span style='font-family: "Iskoola Pota"'>&#3484;&#3487;</span></p>
                                        </td>
                                        <td>
                                            <p>
                                                <span class="english"><b>nn</b>ga</span></p>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="width: 20px"></td>
                            <td style="width: 370px" valign="top" align="center">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td colspan="15" bgcolor="#EBEBEB">
                                            <p align="center">
                                                <span class="title">Consonants</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <p align="center">
                                                <span class="title2">Common</span></p>
                                        </td>
                                        <td colspan="3">
                                            <p align="center">
                                                <span class="title2">Aspirated</span></p>
                                        </td>
                                        <td></td>
                                        <td colspan="2">
                                            <p align="center">
                                                <span class="title2">Special</span></p>
                                        </td>
                                        <td></td>
                                        <td colspan="2">
                                            <p align="center">
                                                <span class="title2">Standalone</span></p>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E8F4D0" style="width:35px">
                                            <p>
                                                <span class="sinhala">&#3482;</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0" style="width:40px">
                                            <p>
                                                <span class="english">k</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0" style="width:35px">
                                            <p>
                                                <span class="sinhala">&#3510;</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0" style="width:45px">
                                            <p>
                                                <span class="english">b</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0" style="width:45px"></td>
                                        <td style="width:20px"></td>
                                        <td bgcolor="#DBFB9F" style="width:35px">
                                            <p>
                                                <span class="sinhala">&#3483;</span></p>
                                        </td>
                                        <td bgcolor="#DBFB9F" style="width:45px">
                                            <p>
                                                <span class="english">kh</span></p>
                                        </td>
                                        <td bgcolor="#DBFB9F" style="width:45px">
                                            <p>
                                                <span class="english">K</span></p>
                                        </td>
                                        <td style="width:20px"></td> 
                                        <td bgcolor="#E0E2AF" style="width:30px">
                                            <p>
                                                <span class="sinhala">&#3513;</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF" style="width:45px">
                                            <p>
                                                <span class="english">B</span></p>
                                        </td>
                                        <td style="width:20px"></td>
                                        <td bgcolor="#EBDDB1" style="width:30px">
                                            <p>
                                                <span class="sinhala">&#3458;</span></p>
                                        </td>
                                        <td bgcolor="#EBDDB1" style="width:45px">
                                            <p>
                                                <span class="english">\n</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="sinhala">&#3484;</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="english">g</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="sinhala">&#3512;</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="english">m</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            &nbsp;</td>
                                        <td>
                                            &nbsp;
                                        </td>
                                        <td bgcolor="#F4FEE2">
                                            <p>
                                                <span class="sinhala">&#3485;</span></p>
                                        </td>
                                        <td bgcolor="#F4FEE2">
                                            <p>
                                                <span class="english">gh</span></p>
                                        </td>
                                        <td bgcolor="#F4FEE2" >
                                            <p>
                                                <span class="english">G</span></p>
                                        </td>
                                        <td>
                                            &nbsp;</td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="sinhala">&#3521;</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="english">sh</span></p>
                                        </td>
                                        <td>
                                            &nbsp;</td>
                                        <td bgcolor="#F7F0DD">
                                            <p>
                                                <span class="sinhala">&#3459;</span></p>
                                        </td>
                                        <td bgcolor="#F7F0DD">
                                            <p>
                                                <span class="english">\h</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="19" bgcolor="#E8F4D0">
                                            <p>
                                                <span class="sinhala">&#3488;</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="english">ch</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="sinhala">&#3514;</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="english">y</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            &nbsp;</td>
                                        <td>
                                            &nbsp;
                                        </td>
                                        <td bgcolor="#DBFB9F">
                                            <p>
                                                <span class="sinhala">&#3489;</span></p>
                                        </td>
                                        <td bgcolor="#DBFB9F">
                                            <p>
                                                <span class="english">Ch</span></p>
                                        </td>
                                        <td bgcolor="#DBFB9F">
                                            &nbsp;
                                        </td>
                                        <td style="width: 16px">
                                            &nbsp;</td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="sinhala">&#3522;</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="english">Sh</span></p>
                                        </td>
                                        <td>
                                            &nbsp;</td>
                                        <td bgcolor="#EBDDB1">
                                            <p>
                                                <span class="sinhala">&#3500;</span></p>
                                        </td>
                                        <td bgcolor="#EBDDB1">
                                            <p>
                                                <span class="english">\N</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="19" bgcolor="#F5FBEC">
                                            <p>
                                                <span class="sinhala">&#3490;</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="english">j</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="sinhala">&#3515;</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="english">r</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC" style="width: 17px">
                                            &nbsp;</td>
                                        <td>
                                            &nbsp;
                                        </td>
                                        <td bgcolor="#F4FEE2">
                                            <p>
                                                <span class="sinhala">&#3496;</span></p>
                                        </td>
                                        <td bgcolor="#F4FEE2">
                                            &nbsp;
                                        </td>
                                        <td bgcolor="#F4FEE2">
                                            <p>
                                                <span class="english">T</span></p>
                                        </td>
                                        <td></td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="sinhala">&#3526;</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="english">f</span></p>
                                        </td>
                                        <td>
                                            &nbsp;</td>
                                        <td bgcolor="#F7F0DD">
                                            <p>
                                                <span class="sinhala">&#3469;</span></p>
                                        </td>
                                        <td bgcolor="#F7F0DD">
                                            <p>
                                                <span class="english">\R</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="sinhala">&#3495;</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="english">t</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="sinhala">&#3517;</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="english">l</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            &nbsp;</td>
                                        <td>
                                            &nbsp;
                                        </td>
                                        <td bgcolor="#DBFB9F">
                                            <p>
                                                <span class="sinhala">&#3498;</span></p>
                                        </td>
                                        <td bgcolor="#DBFB9F">
                                            &nbsp;
                                        </td>
                                        <td bgcolor="#DBFB9F">
                                            <p>
                                                <span class="english">D</span></p>
                                        </td>
                                        <td style="width: 16px">
                                            &nbsp;</td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="sinhala">&#3493;</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="english">GN</span></p>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="sinhala">&#3497;</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="english">d</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="sinhala">&#3520;</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="english">w</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <span class="english">v</span></td>
                                        <td></td>
                                        <td bgcolor="#F4FEE2">
                                            <p>
                                                <span class="sinhala">&#3502;</span></p>
                                        </td>
                                        <td bgcolor="#F4FEE2">
                                            <p>
                                                <span class="english">Th</span></p>
                                        </td>
                                        <td bgcolor="#F4FEE2"></td>
                                        <td>
                                            &nbsp;</td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="sinhala">&#3492;</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="english">KN</span></p>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="sinhala">&#3501;</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="english">th</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="sinhala">&#3523;</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="english">s</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            &nbsp;</td>
                                        <td>
                                            &nbsp;
                                        </td>
                                        <td bgcolor="#DBFB9F">
                                            <p>
                                                <span class="sinhala">&#3504;</span></p>
                                        </td>
                                        <td bgcolor="#DBFB9F">
                                            <p>
                                                <span class="english">Dh</span></p>
                                        </td>
                                        <td bgcolor="#DBFB9F">
                                            &nbsp;
                                        </td>
                                        <td></td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="sinhala">&#3491;</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="english">q</span></p>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="sinhala">&#3503;</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="english">dh</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="sinhala">&#3524;</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="english">h</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC"></td>
                                        <td></td>
                                        <td bgcolor="#F4FEE2">
                                            <p>
                                                <span class="sinhala">&#3509;</span></p>
                                        </td>
                                        <td bgcolor="#F4FEE2">
                                            <p>
                                                <span class="english">ph</span></p>
                                        </td>
                                        <td bgcolor="#F4FEE2">
                                            <p>
                                                <span class="english">P</span></p>
                                        </td>
                                        <td></td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="sinhala">&#3525;&#3540;</span></p>
                                        </td>
                                        <td bgcolor="#F0F1DA">
                                            <p>
                                                <span class="english">Lu</span></p>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="sinhala">&#3505;</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="english">n</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="sinhala">&#3499;</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0">
                                            <p>
                                                <span class="english">N</span></p>
                                        </td>
                                        <td bgcolor="#E8F4D0"></td>
                                        <td ></td>
                                        <td bgcolor="#DBFB9F">
                                            <p>
                                                <span class="sinhala">&#3511;</span></p>
                                        </td>
                                        <td bgcolor="#DBFB9F">
                                            <p>
                                                <span class="english">bh</span></p>
                                        </td>
                                        <td bgcolor="#DBFB9F" ></td>
                                        <td ></td>
                                        <td bgcolor="#E0E2AF" style="height: 19px">
                                            <p>
                                                <span class="sinhala">&#3525;&#3542;</span></p>
                                        </td>
                                        <td bgcolor="#E0E2AF">
                                            <p>
                                                <span class="english">Luu</span></p>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="sinhala">&#3508;</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="english">p</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="sinhala">&#3525;</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC">
                                            <p>
                                                <span class="english">L</span></p>
                                        </td>
                                        <td bgcolor="#F5FBEC"></td>
                                        <td></td>
                                        <td ></td>
                                        <td ></td>
                                        <td></td>
                                        <td></td>
                                        <td ></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td colspan="5" style="height:10px;"></td></tr>
                        <tr>
                            <td colspan="5">
                                <center>
                                    <table cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td colspan="13" bgcolor="#EBEBEB">
                                                <p align="center">
                                                    <span style="color: navy; font-family: Arial"><strong>Deriving Consonants</strong></span></p>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#FCFFB7">
                                            <td style="width: 62px;">
                                                <p>
                                                    <span class="sinhala">&#3482;&#3530;</span></p>
                                            </td>
                                            <td style="width: 62px;">
                                                <p>
                                                    <span class="sinhala">&#3482;</span></p>
                                            </td>
                                            <td style="width: 62px;">
                                                <p>
                                                    <span class="sinhala">&#3482;&#3535;</span></p>
                                            </td>
                                            <td style="width: 62px;">
                                                <p>
                                                    <span class="sinhala">&#3482;&#3536;</span></p>
                                            </td>
                                            <td style="width: 62px;">
                                                <p>
                                                    <span class="sinhala">&#3482;&#3537;</span></p>
                                            </td>
                                            <td style="width: 62px;">
                                                <p>
                                                    <span class="sinhala">&#3482;&#3538;</span></p>
                                            </td>
                                            <td style="width: 62px;">
                                                <p>
                                                    <span class="sinhala">&#3482;&#3539;</span></p>
                                            </td>
                                            <td style="width: 62px;">
                                                <p>
                                                    <span class="sinhala">&#3482;&#3540;</span></p>
                                            </td>
                                            <td style="width: 62px;">
                                                <p>
                                                    <span class="sinhala">&#3482;&#3542;</span></p>
                                            </td>
                                            <td style="width: 62px;">
                                                <p>
                                                    <span class="sinhala">&#3482;&#3545;</span></p>
                                            </td>
                                            <td style="width:62px">
                                                <p>
                                                    <span class="sinhala">&#3482;&#3546;</span></p>
                                            </td>
                                            <td style="width:62px;">
                                                <p>
                                                    <span class="sinhala">&#3482;&#3548;</span></p>
                                            </td>
                                            <td style="width: 62px;">
                                                <p>
                                                    <span class="sinhala">&#3482;&#3549;</span></p>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#FEFFDF">
                                            <td>
                                                <p>
                                                    <span class="english">k</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">ka</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kaa</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kA</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kAa</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">ki</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kie</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">ku</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kuu</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">ke</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kei</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">ko</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">koe</span></p>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#FCFFB7">
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3550;</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3530;&#8205;&#3515;</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3530;&#8205;&#3515;&#3535;</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3530;&#8205;&#3515;&#3536;</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3530;&#8205;&#3515;&#3537;</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3530;&#8205;&#3515;&#3538;</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3530;&#8205;&#3515;&#3539;</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3544;</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3570;</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3530;&#8205;&#3515;&#3545;</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3530;&#8205;&#3515;&#3546;</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3530;&#8205;&#3515;&#3548;</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="sinhala">&#3482;&#3530;&#8205;&#3515;&#3549;</span></p>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#FEFFDF">
                                            <td>
                                                <p>
                                                    <span class="english">kau</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kra</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kraa</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">krA</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">krAa</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kri</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">krie</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kru</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kruu</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kre</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">krei</span></p>
                                            </td>
                                            <td >
                                                <p>
                                                    <span class="english">kro</span></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="english">kroe</span></p>
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                        </tr>
                        <tr><td colspan="5" style="height:10px;"></td></tr>
                    </table>
    </div>
</body>
</html>
