# myMVC

A small example of a very slim mvc framework

Thing you must do before before you can start:

1. On your apache httpd.conf file, make sure to remvoe the '#' sign before the following line:
<code>
Include conf/extra/httpd-vhosts.conf
</code>
2. Set a virtual host to your public folder, allow apache access to your root folder.
<code>
<Directory C:/your/root/folder>
Order Deny,Allow   
Allow from all 
</Directory>
</code>

<code>
<VirtualHost *:80>   
DocumentRoot "C:/your/root/folder/public" 
ServerName your.app.url
</VirtualHost>
</code>
3. If you are using virtual hosts add your site to the hosts file like this:
127.0.0.1		your.app.url

Remember, it can also be 127.0.0.2 or 3 or 4 .. you get the point.