SGCUnivRadiosWebUI
==================

[![Join the chat at https://gitter.im/DjazzLab/SGCUnivRadiosWebUI](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/DjazzLab/SGCUnivRadiosWebUI?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Just a web UI to manage and listen audio streams from icecast

The WebUI is not currently fully functionnal, but it will soon !

<h3>Install :</h3>
1. Copy all the files into the document root of your virtual host
2. Create a database with mysql and a specific mysql user
3. Create a user in the users table (the password should ciphered with the MD5 MySQL function)
3. Edit the file application/config/database.php with your connection information
4. Make sure that Icecast log playlist and current tracks into a log file (usually: /var/log/icecast2/playlist)
5. Edit the file application/config/config.php and change the log file path if needed
