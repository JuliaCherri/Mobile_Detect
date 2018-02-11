# Mobile_Detect
Snippet for Evolution. Detect mobile and switch returned chunks. Based on Mobile-Detect by Şerban Ghiţă

#### Install
* Copy folder Mobile_Detect in path assets/snippets
* Create new snippet and paste code from snippet.Mobile_Detect.php
* Save it.
* Done!

#### Parameters
```
fullTpl
```
String, name of chunk, empty by default. This chunk is returned case of desktop. If it is empty then empty string will returned.
```
phoneTpl
```
String, name of chunk, is equal mobileTpl by default. This chunk is returned case of phone but not tablet. If it is empty then chunk called in mobileTpl will returned.
```
tabletTpl
```
String, name of chunk, is equal mobileTpl by default. This chunk is returned case of tablet but not phone. If it is empty then chunk called in mobileTpl will returned.
```
mobileTpl
```
String, name of chunk, empty by default. This chunk is returned case of mobile device and if tabletTpl or mobileTpl are empty. If it is empty then empty string will returned.

#### POST-parameter
It get parameter in $_POST['user_agent'] for change device agent. You can send values: full, phone, tablet and mobile (is equal phone). If it is different with real type of device, user agent will switched.

#### Example
You can switch chunks for desktop and mobile device.
```
[[Mobile_Detect? &fullTpl=`chunk_for_desctop` &mobileTpl=`chunk_for_mobile`]]
```
You can use special chunks for mobile and tablet only. For desktop it will be empty.
```
[[Mobile_Detect? &phoneTpl=`chunk_for_phone` &tabletTpl=`chunk_for_tablet`]]
```