<?php //Developed by Freelance developer. If you finding any trouble please visit http://www.freestudentprojects.com/phpscript/web-vehicle-agent-system/ for support page. 
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "http://api.mVaayoo.com/mvaayooapi/MessageCompose?user=nirmalautocosulants:1234567891&senderID=nirmalauto&receipientno=919849558211&msgtxt=SMS API&state=4");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$sender
ID&receipientno=$receipientno&cid=$cid&msgtxt=$msgtxt");
$buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{ echo $buffer; } 
curl_close($ch);
echo "Message sent successfully..";
?>