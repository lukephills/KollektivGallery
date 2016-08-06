jQuery(document).ready(function($) {

    // media query event handler
    if (matchMedia) {
        var mq = window.matchMedia("(min-width: 1026px)");
        mq.addListener(WidthChange);
        WidthChange(mq);
    }

    // media query change
    function WidthChange(mq) {

        if (mq.matches) {
            $('.manual-image').insertBefore( $('#nav-manual') );
        }
        else {
            // window width is less than 500px
            console.log('small');
        }

    }

    /**
     * Load the manual block
     * @param manualId
     */
    var loadBlock = function(manualId){

        // get the letter from the manual ID
        var letter = manualId.slice(10);

        // show the block svg
        animateBlock(letter);

    };

    /**
     * Animate Block
     * Perform bespoke animations using gsap and js
     * @param letter
     */
    animateBlock = function(letter){
        console.log('show ' + letter + ' animation');

        // for the special besoke animations
        switch(letter) {
            case 'a':
                /**
                 * Light bulb on
                 */
                var $lightBulb = $('#manual-image-a svg #lightBulb path');
                TweenLite.to($lightBulb, 0.01, {fill:"#EEE"});
                setTimeout(function() {
                    TweenLite.to($lightBulb, 0.4, {fill:"#EAE421"});
                }, 500);

                break;

            case 'b':
                /**
                 * Shake magnifying glass
                 */
                var $lightBulb = $('#manual-image-b svg #magnifyingGlass');
                TweenLite.to($lightBulb, 0.01, {transform:"rotate(0deg)"});
                setTimeout(function() {
                    TweenMax.to($lightBulb, 1, {
                        transform: "rotate(10deg) translate(50px, 10px) scale(1.1)",
                        repeat:1,
                        yoyo:true
                    });
                }, 500);

                break;

            case 'd':
                /**
                 * Count up to 140 quickly
                 */
                var tweetChars = document.getElementById('tweetChars');
                tweetChars.textContent = "0";
                var number = parseInt(tweetChars.textContent);

                for (var i=0; i<70; i++){
                    setTimeout(function () {
                        number = number + 2;
                        tweetChars.textContent = number;
                    }, 10*i);
                }

                break;

            case 'e':
                /**
                 * Megaphone
                 * Flashing sound lines
                 */
                var separater = 300;
                var soundFlashes = 2;
                for (var i=1; i<=soundFlashes; i++){
                    setTimeout(function(){
                        $('#manual-image-e svg g.lines').hide();
                    }, 700*i);
                    setTimeout(function(){
                        $('#manual-image-e svg g.lines').show();
                    }, (700*i)+separater);
                }
                break;


            case 'g':
                /**
                 * Move painters arm and show text
                 */
                var $arm = $('#manual-image-g svg #redPaintersArm');

                TweenLite.to($arm, 0.01, {transform:"scale(1)"});
                setTimeout(function() {
                    TweenMax.to($arm, 0.7, {
                        transform:"scale(1.1) rotate(-35deg) translate(2px, 5px) ",
                        repeat:1,
                        yoyo:true
                    });
                }, 500);

                break;

            case 'i':
                /**
                 * Movie snap
                 */
                var $movieSnap = $('#manual-image-i svg #movieSnap');
                TweenLite.to($movieSnap, 0.01, {transform:"rotate(0deg)"});
                setTimeout(function() {
                    TweenLite.to($movieSnap, 0.4, {transform:"rotate(17deg)", ease: Strong.easeIn});
                }, 800);

                break;

            case 'j':
                /**
                 * Countdown from 5
                 */
                var $countDown = document.getElementById('countDown');
                $countDown.textContent = "5";
                var number = parseInt($countDown.textContent);

                for (var i=1; i<6; i++){
                    setTimeout(function () {
                        number--;
                        $countDown.textContent = number;
                    }, 1000*i);
                }

                break;

            case 'l':
                /**
                 * Red Chart line goes up
                 */
                var lineLength = "420";
                var $line = $('#manual-image-l svg #redLineGoesUp');
                TweenLite.to($line, 0.01, {
                    strokeDasharray: lineLength+" "+lineLength,
                    strokeDashoffset: lineLength
                });
                setTimeout(function() {
                    TweenLite.to($line, 2, {strokeDashoffset:"0", ease: Power1.easeIn});
                }, 500);

                break;

            case 'm':
                /**
                 * Slide out ladder and open black square
                 */
                var $ladder = $('#manual-image-m svg #ladder');
                TweenLite.to($ladder, 0.01, {transform:"translateX(-100px)"});
                setTimeout(function() {
                    TweenLite.to($ladder, 1.3, {transform:"translateX(0)"});
                }, 500);


                break;

            //case 'n':
            //    /**
            //     * rotate binocular reflection
            //     */
            //
            //    var $binoCircleLeft = $('#manual-image-n svg #binoCircleLeft');
            //    var $binoCircleRight = $('#manual-image-n svg #binoCircleRight');
            //    var lineLength = 20;
            //    TweenLite.to($binoCircleRight, 0.01, {
            //        strokeDasharray: lineLength+" "+lineLength,
            //        strokeDashoffset: lineLength
            //    });
            //    setTimeout(function() {
            //        TweenLite.to($binoCircleRight, 0.2, {strokeDashoffset:"0"});
            //    }, 500);
            //
            //    TweenLite.to($binoCircleLeft, 0.01, {
            //        strokeDasharray: lineLength+" "+lineLength,
            //        strokeDashoffset: lineLength
            //    });
            //    setTimeout(function() {
            //        TweenLite.to($binoCircleLeft, 0.2, {strokeDashoffset:"0"});
            //    }, 550);
            //
            //    break;

            case 'o':
                /**
                 * Slide out the tape
                 */
                var $tape = $('#manual-image-o svg #tape');
                TweenLite.to($tape, 0.01, {transform:"translateX(-80px)"});
                setTimeout(function() {
                    TweenLite.to($tape, 0.8, {transform:"translateX(0)", ease: Strong.easeOut});
                }, 500);
                break;

            case 'q':
                /**
                 * Open hole and dangle hook
                 */
                var $dangleHook = $('#manual-image-q svg #dangleHook');
                var $blackHole = $('#manual-image-q svg #blackHole');

                TweenLite.to($blackHole, 0.01, {transform:"scale(0)"});
                setTimeout(function() {
                    TweenLite.to($blackHole, 1.2, {transform:"scale(1)", ease: Strong.easeOut});
                }, 500);

                TweenLite.to($dangleHook, 0.01, {transform:"translateY(-100px)"});
                setTimeout(function() {
                    TweenLite.to($dangleHook, 0.8, {transform:"translateY(0)", ease: Strong.easeOut});
                }, 1500);
                break;

            case 'r':
                /**
                 * Move painters arm and show text
                 */
                var $arm = $('#manual-image-r svg #paintersArm');

                $('#manual-image-r svg #artP').hide();
                $('#manual-image-r svg #artL').hide();
                $('#manual-image-r svg #artA').hide();
                $('#manual-image-r svg #artN').hide();

                TweenLite.to($arm, 0.01, {transform:"scale(1)"});
                setTimeout(function() {
                    TweenMax.to($arm, 0.2, {
                        transform:"scale(1.1) rotate(-35deg) translate(2px, 3px) ",
                        repeat:7,
                        yoyo:true
                    });
                }, 500);

                // Show P
                setTimeout(function(){
                    $('#manual-image-r svg #artP').show();
                }, 700);

                // Show L
                setTimeout(function(){
                    $('#manual-image-r svg #artL').show();
                }, 1100);

                // Show A
                setTimeout(function(){
                    $('#manual-image-r svg #artA').show();
                }, 1400);

                // Show N
                setTimeout(function(){
                    $('#manual-image-r svg #artN').show();
                }, 1800);

                break;

            case 'u':
                /**
                 * Combine coloured blocks with center block
                 */
                var $Btop = $('#manual-image-u svg #curateTop');
                var $Bleft = $('#manual-image-u svg #curateRight');
                var $Bbottom = $('#manual-image-u svg #curateBottom');
                var $Bright = $('#manual-image-u svg #curateLeft');
                var distance = "50px";

                // Move top block down
                TweenLite.to($Btop, 0.01, {transform:"translateY(-"+distance+")"});
                setTimeout(function() {
                    TweenLite.to($Btop, 1.5, {transform:"translateY(0)", ease: Strong.easeOut});
                }, 100);

                // Move right block left
                TweenLite.to($Bleft, 0.01, {transform:"translateX("+distance+")"});
                setTimeout(function() {
                    TweenLite.to($Bleft, 1.5, {transform:"translateX(0)", ease: Strong.easeOut});
                }, 100);

                // Move bottom block up
                TweenLite.to($Bbottom, 0.01, {transform:"translateY("+distance+")"});
                setTimeout(function() {
                    TweenLite.to($Bbottom, 1.5, {transform:"translateY(0)", ease: Strong.easeOut});
                }, 100);

                // Move left block right
                TweenLite.to($Bright, 0.01, {transform:"translateX(-"+distance+")"});
                setTimeout(function() {
                    TweenLite.to($Bright, 1.5, {transform:"translateX(0)", ease: Strong.easeOut});
                }, 100);
                break;

            case 'w':
                /**
                 * Cut the red tape
                 */
                var $redTapeLeft = $('#manual-image-w svg #redTapeLeft');
                var $redTapeRight = $('#manual-image-w svg #redTapeRight');
                var $scissorsTop = $('#manual-image-w svg #scissorsTop');
                var $scissorsBottom = $('#manual-image-w svg #scissorsBottom');

                //Rotate scissorsTop
                TweenLite.to($scissorsTop, 0.01, {transform:"rotate(-5deg)"});
                setTimeout(function() {
                    TweenLite.to($scissorsTop, 0.5, {transform:"rotate(0deg)", ease: Strong.easeOut});
                }, 500);

                //Rotate scissorsBottom
                TweenLite.to($scissorsBottom, 0.01, {transform:"rotate(5deg)"});
                setTimeout(function() {
                    TweenLite.to($scissorsBottom, 0.5, {transform:"rotate(0deg)", ease: Strong.easeOut});
                }, 500);

                // Move red tape Left
                TweenLite.to($redTapeLeft, 0.01, {transform:"translateX(30px)"});
                setTimeout(function() {
                    TweenLite.to($redTapeLeft, 1, {transform:"translateX(0)", ease: Strong.easeOut});
                }, 500);

                // Move Red tape right
                TweenLite.to($redTapeRight, 0.01, {transform:"translateX(-40px)"});
                setTimeout(function() {
                    TweenLite.to($redTapeRight, 1, {transform:"translateX(0)", ease: Strong.easeOut});
                }, 500);

                break;

            case 'x':
                /**
                 *  Till
                 *  Open cash register drawer and light-up buttons
                 */

                    // Hide draw and lights
                $('#manual-image-x svg g#Drawer').hide();
                $('#manual-image-x svg g#Till .orange').css('opacity', '0.3');
                $('#manual-image-x svg g#Till .blue').css('opacity', '0.3');
                $('#manual-image-x svg g#Till .red').css('opacity', '0.3');

                // Show drawer
                setTimeout(function(){
                    $('#manual-image-x svg g#Drawer').show();
                }, 700);

                // Show lights
                setTimeout(function(){
                    $('#manual-image-x svg g#Till .orange').css('opacity', '1');
                }, 1200);
                setTimeout(function(){
                    $('#manual-image-x svg g#Till .blue').css('opacity', '1');
                }, 1500);
                setTimeout(function(){
                    $('#manual-image-x svg g#Till .red').css('opacity', '1');
                }, 1800);
                break;

            case 'y':
                /**
                 * Combine coloured blocks with center block
                 */
                var $Btop = $('#manual-image-y svg #blockYellow');
                var $Bleft = $('#manual-image-y svg #blockRed');
                var $Bbottom = $('#manual-image-y svg #blockBlue');
                var $Bright = $('#manual-image-y svg #blockGreen');
                var distance = "250px";

                // Move top block down
                TweenLite.to($Btop, 0.01, {transform:"translateY(-"+distance+")"});
                setTimeout(function() {
                    TweenLite.to($Btop, 2, {transform:"translateY(0)", ease: Strong.easeOut});
                }, 100);

                // Move right block left
                TweenLite.to($Bleft, 0.01, {transform:"translateX("+distance+")"});
                setTimeout(function() {
                    TweenLite.to($Bleft, 2, {transform:"translateX(0)", ease: Strong.easeOut});
                }, 100);

                // Move bottom block up
                TweenLite.to($Bbottom, 0.01, {transform:"translateY("+distance+")"});
                setTimeout(function() {
                    TweenLite.to($Bbottom, 2, {transform:"translateY(0)", ease: Strong.easeOut});
                }, 100);

                // Move left block right
                TweenLite.to($Bright, 0.01, {transform:"translateX(-"+distance+")"});
                setTimeout(function() {
                    TweenLite.to($Bright, 2, {transform:"translateX(0)", ease: Strong.easeOut});
                }, 100);
                break;

            case 'z':
                /**
                 * Tick the evaluation report
                 */
                $('#manual-image-z svg #evaluate1').hide();
                $('#manual-image-z svg #evaluate2').hide();
                $('#manual-image-z svg #evaluate3').hide();
                $('#manual-image-z svg #evaluate4').hide();
                $('#manual-image-z svg #evaluate5').hide();
                // Show Ticks
                setTimeout(function(){
                    $('#manual-image-z svg #evaluate1').show();
                }, 700);
                setTimeout(function(){
                    $('#manual-image-z svg #evaluate2').show();
                }, 1100);
                setTimeout(function(){
                    $('#manual-image-z svg #evaluate3').show();
                }, 1500);
                setTimeout(function(){
                    $('#manual-image-z svg #evaluate4').show();
                }, 1750);
                setTimeout(function(){
                    $('#manual-image-z svg #evaluate5').show();
                }, 2100);
                break;

            case 'intro':
                TweenLite.to($('circle#Amber, circle#Green'), 0.01, {fill:"#9E9E9E"});
                TweenLite.to($('circle#Red'), 0.01, {fill:"#F70D1E"});
                setTimeout(function() {
                    TweenLite.to($('circle#Red'), 0.3, {fill:"#9E9E9E", ease: Strong.easeOut});
                    TweenLite.to($('circle#Amber'), 0.3, {fill:"#F4E637"});
                }, 1000);
                setTimeout(function() {
                    TweenLite.to($('circle#Amber'), 0.3, {fill:"#9E9E9E", ease: Strong.easeOut});
                    TweenLite.to($('circle#Green'), 0.3, {fill:"#65C427"});
                }, 2000);


                break;
        }

    };


    var Animate404 = function() {
        var lineLength = "420";
        var $line = $('#manual-image-l svg #redLineGoesUp');
        TweenLite.to($line, 0.01, {
            strokeDasharray: lineLength + " " + lineLength,
            strokeDashoffset: lineLength
        });
        setTimeout(function () {
            TweenLite.to($line, 2, {strokeDashoffset: "0", ease: Power1.easeIn});
        }, 500);

    };





    /**
     * Toggle the main menu
     */
    var toggleMenu = function() {
        $("#main-menu-wrap").toggleClass('open');
        $('#main-menu-button').toggleClass('is-open');
        $('#main-menu-button').toggleClass('is-closed');
        $("#search-container").toggleClass('menu-slide-open');
        $(".logo").toggleClass('menu-slide-open');
    };

    $('#main-menu-button').click(function() {
        toggleMenu();
    });

    /**
     * Toggle the sidebar menu
     */
    $('#entries-sidebar-button').click(function() {
        $("#entries-sidebar, #entries-sidebar-button").toggleClass('open');
    });


    /**
     * Open the Search field
     */
    $('#search-container').click(function(e){
        if ($(this).hasClass('open')){
            if(!$('#search-field').is(e.target)){
                $(this).toggleClass('open');
                toggleMenu();
            }
        } else {
            $(this).toggleClass('open');
        }
    });


    /**
     * Waypoints for Manual page
     */
    $('.manual-item').waypoint({
        handler: function(direction) {
            var $current = $(this);
            if (direction == "up"){
                $current = $current.prev().prev();
            }
            $('.manual-image').removeClass('selected');
            $('.nav-manual a').removeClass('selected');
            $('.'+$current.attr('id')).addClass('selected');

            loadBlock($current.attr('id'));
        },
        offset : '40%'
    });


    /**
     * Scroll to positon
     */
    $('a').click( function(e) {
        $.scrollTo(
            $(this).attr("href"),
            {
                duration: 700,
                offset: { 'left':0, 'top':-80 }
            }
        );
        e.preventDefault();
    });


    /**
     * Manual Navigation scroll
     */
    var scrolled = 0;
    $(".arrow-up").on("click", function() {
        scrolled = scrolled-300;
        $(".nav-manual ul").animate({"scrollTop": scrolled}, 300);
    });
    $(".arrow-down").on("click", function() {
        scrolled=scrolled+300;
        $(".nav-manual ul").animate({"scrollTop": scrolled}, 300);
    });


    /**
     * Video Autoplay & Overlay mask
     */
    var toggleVideo = function(){
        $('.overlay-video, .video-container').toggleClass('show');
    };

    $('.video-placeholder').on('click', function(e) {
        toggleVideo();
        var youtubeURL = $(this).data('url');
        var embedURL = youtubeURL.replace("watch?v=","embed/");
        var youtubeIframe = '<iframe src="'+embedURL+'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
        $('.flex-video').append(youtubeIframe);
    });

    $('.overlay-video').on('click', function(e) {
        toggleVideo();
        $('.flex-video').empty();
    });

    // Inject youtube iframes
    var $youtubeInlineEmbed = $('.video-inline-embed')
    var youtubeURL = $youtubeInlineEmbed.data('url');
    var embedURL = youtubeURL.replace("watch?v=","embed/");
    var youtubeIframe = '<div class="video-embed"><iframe src="'+embedURL+'?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe></div>';
    $youtubeInlineEmbed.prepend(youtubeIframe);



    //
    //var $scrollSection = $('.slide');
    //var $scrollTrigger = $('.trigger-scroll');
    //
    //$scrollSection.waypoint({
    //    handler: function(direction) {
    //        var $current = $(this);
    //        if (direction === "up"){
    //            $current = $current.prev();
    //        }
    //        $scrollSection.removeClass('selected');
    //        $($current).addClass('selected');
    //    },
    //    offset : '40%'
    //});


    //
    //$scrollTrigger.on('click', function(e) {
    //
    //    // only scroll down if next element is a scrollSection
    //    if ($('.selected').next().hasClass('slide')){
    //        $.scrollTo(
    //            $('.selected').next(),
    //            {
    //                duration: 700
    //            }
    //        );
    //    } else {
    //        // last element so scroll to the first
    //        $.scrollTo(
    //            $scrollSection[0],
    //            {
    //                duration: 700
    //            }
    //        );
    //    }
    //    e.preventDefault();
    //});



    // SHARE ON TEXT SELECTION
    //var savedText = null; // Variable to save the text
    //
    //function saveSelection() {
    //    if (window.getSelection) {
    //        var sel = window.getSelection();
    //        if (sel.getRangeAt && sel.rangeCount) {
    //            return sel.getRangeAt(0);
    //        }
    //    } else if (document.selection && document.selection.createRange) {
    //        return document.selection.createRange();
    //    }
    //    return null;
    //}
    //
    //function restoreSelection(range) {
    //    if (range) {
    //        if (window.getSelection) {
    //            var sel = window.getSelection();
    //            sel.removeAllRanges();
    //            sel.addRange(range);
    //        } else if (ddocument.selection && range.select) {
    //            range.select();
    //        }
    //    }
    //}
    //
    //var btnWrap = document.getElementById('selection-share-post'),
    //    btnShare = btnWrap.children[0];
    //
    //document.onmouseup = function(e) {
    //
    //    savedText = saveSelection(); // Save selection on mouse-up
    //
    //    setTimeout(function() {
    //
    //        var isEmpty = savedText.toString().length === 0; // Check selection text length
    //
    //        // set sharing button position
    //        btnWrap.style.top = (isEmpty ? -9999 : e.pageY) + 'px';
    //        btnWrap.style.left = (isEmpty ? -9999 : e.pageX) + 'px';
    //
    //    }, 10);
    //
    //};
    //
    //btnShare.onmousedown = function(e) {
    //
    //    if (!savedText) return;
    //
    //    window.open('https://twitter.com/intent/tweet?text=' + savedText, 'shareWindow', 'width=300,height=150,top=50,left=50'); // Insert the selected text into sharing URL
    //    restoreSelection(savedText); // select back the old selected text
    //
    //    // hide if we are done
    //    setTimeout(function() {
    //        btnWrap.style.top = '-9999px';
    //        btnWrap.style.left = '-9999px';
    //    }, 1000);
    //
    //    return false;
    //
    //};


    /**
     * Facebook share
     */
    //window.fbAsyncInit = function() {
    //    FB.init({
    //        appId      : '778903348871703',
    //        xfbml      : true,
    //        version    : 'v2.3'
    //    });
    //};

    //(function(d, s, id){
    //    var js, fjs = d.getElementsByTagName(s)[0];
    //    if (d.getElementById(id)) {return;}
    //    js = d.createElement(s); js.id = id;
    //    js.src = "//connect.facebook.net/en_US/sdk.js";
    //    fjs.parentNode.insertBefore(js, fjs);
    //}(document, 'script', 'facebook-jssdk'));
    //
    //function postToFeed(title, desc, url, image) {
    //    var obj = {method: 'feed',link: url, picture: image,name: title,description: desc};
    //    function callback(response) {}
    //    FB.ui(obj, callback);
    //}
    //
    //var fbShareBtn = document.querySelector('.fb_share');
    //// If there is a share button on the page do stuff
    //if (fbShareBtn){
    //
    //    //TODO: change to jquery click to catch touches
    //    fbShareBtn.addEventListener('click', function(e) {
    //        e.preventDefault();
    //        var title = fbShareBtn.getAttribute('data-title'),
    //            desc = fbShareBtn.getAttribute('data-desc'),
    //            url = fbShareBtn.getAttribute('href'),
    //            image = fbShareBtn.getAttribute('data-image');
    //        postToFeed(title, desc, url, image);
    //
    //        return false;
    //    });
    //}
});
