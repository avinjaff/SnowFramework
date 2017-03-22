<?php
	if (htmlspecialchars($_GET["Name"]) == 'test-12345' && htmlspecialchars($_GET["Code"]) == '123456789' && htmlspecialchars($_GET["B"]) == '33ab86a7-a3ef-4923-928e-9979e8f56fcd' && htmlspecialchars($_GET["C"]) == '8b0665cd-f955-4e98-a5c8-751c4fca67fc' && htmlspecialchars($_GET["I"]) == '97d62fba-10a0-41a2-a6d6-9aecad7e55f2' && htmlspecialchars($_GET["U"]) == 'nRy/sK5Z7ENvGsSwfcmLzw==')
	{
		print('OUTPUT:True;');
	}
	else{
		print('OUTPUT:False;');
	}
?>