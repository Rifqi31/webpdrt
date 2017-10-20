# PDRT WEB APPLICATION 
SISTEM INFORMASI PENGELOLAAN PERMOHONAN DAN PENGENDALIAN PENGESAHAN DOKUMEN RANCANGAN TEKNIS (PDRT)

## Sebelum Instalasi
Sebelum anda menggunakan web aplikasi ini, baik untuk keperluan kantor ataupun pembelajaran, pastikan
anda telah menginstall aplikasi ini pada server anda atau pc/desktop/laptop anda :

* PHP 7
* Mysql/MariaDB

atau mungkin yang lebih simpel, anda bisa menggunakan aplikasi paket server seperti :

* [WAMP](http://www.wampserver.com/en/)
* [XAMPP](https://www.apachefriends.org/index.html)
* atau paket server yang sama atau sejenis

### Tahap instalasi
* Buatlah database dengan nama 
```
praktek_lapang
```
* lalu import file sql yang telah ada
* pindahkan folder webpdrt ke folder server
* akan tetapi jika server anda menggunakan server wamp, simpan di folder www
* jika anda menggunakan server xampp, simpan di folder htdocs
* lalu jalankan server

### Attention
* dalam aplikasi ini anda mempunyai 3 akses yaitu dengan username :
* admin_permo , admin_kendali dan admin
* dengan password sama yaitu admin
* web aplikasi ini menggunakan framework php [Codeigniter](https://codeigniter.com/)
* untuk akses web app nya anda cukup mengetik seperti dibawah ini :

```
https://127.0.0.1/webpdrt
```
atau 
```
https://localhost/webpdrt
```



