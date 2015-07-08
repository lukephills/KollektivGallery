# Kollektiv Gallery Wordpress Theme

### Installation

You need Grunt installed globally:

```sh
$ npm install -g grunt-cli
```

```sh
$ git clone https://github.com/lukephills/Kollektiv.git
$ cd Kollektiv
$ npm install
$ bower install
```

### Development


Kollektiv website uses Grunt for fast developing. This command will watch your sass and js files and run scripts accordingly.

####Using grunt:
```sh
$ grunt serve
```
 - **Change a sass** file and the sass will compile to a single minified and autoprefixed css file. It will also add the theme information that Wordpress needs to the top.
 - **Change a javascript** file or add a framework to `js/vendor` and it will minify, GZIP and join all the scripts to one single app.min.js.

```sh
$ grunt build
```
 - This will create a *production ready* folder, `.dist/` containing:
  - all the `.php` files
  - minified `.css` file
  - minified `.js` file
  - everything else in `assets/`



### Todo's

 - Fix facebook share
 - Properly enqueue gsap script
 - Use minified scripts

License
---

**Code**: MIT

**Images**: Copyright to Kollektiv Gallery (Trademark)

### Version
1.0.1

### Contributors
Developed by Luke Phillips  

Designed by Sarah Todd
