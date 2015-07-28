# Flat file blogging platform

 > If you can't find something that suits your needs - do it yourself
 
 I was looking for simple and semi-lightweight blogging system with Markdown and Yaml files only. However existing ones was overloaded with plugins and functionality. So this is what I came out with.
 
 Requirements
 -------------

 Get the latest PHP and composer to install dependencies.
 
 Installation
 -------------
 
 Clone this repo, cd into it and install via composer:
 
 ```
 composer install
 ```
 
 Make sure the cache folder has 755 or 777 chmods
 
 ```
 sudo chmod -R 777 cache
 ```
 
 Your virtual host should point to **public** directory.
 
 Customization
 -------------
 
 You can edit application views to customize the template. Put your assets into public/assets directory.
