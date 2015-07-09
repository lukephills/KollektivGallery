<?php
/**
 * Special 404 animation
 */
?>

<div id="404-image">
    <? get_template_part("assets/images/404/404", 'image.svg' ) ?>
</div>
<script>

    jQuery(document).ready(function($) {

        var $path1 = $('#404Path1');
        var $path2 = $('#404Path2');
        var $path3 = $('#404Path3');
        var $path4 = $('#404Path4');
        var $path5 = $('#404Path5');
        var $path6 = $('#404Path6');
        var $path7 = $('#404Path7');
        var $path8 = $('#404Path8');
        var $path9 = $('#404Path9');
        var $path10 = $('#404Path10');

        var $path1Get = $path1.get(0);
        var $path2Get = $path2.get(0);
        var $path3Get = $path3.get(0);
        var $path4Get = $path4.get(0);
        var $path5Get = $path5.get(0);
        var $path6Get = $path6.get(0);
        var $path7Get = $path7.get(0);
        var $path8Get = $path8.get(0);
        var $path9Get = $path9.get(0);
        var $path10Get = $path10.get(0);

        var lineLength1 = $path1Get.getTotalLength();
        var lineLength2 = $path2Get.getTotalLength();
        var lineLength3 = $path3Get.getTotalLength();
        var lineLength4 = $path4Get.getTotalLength();
        var lineLength5 = $path5Get.getTotalLength();
        var lineLength6 = $path6Get.getTotalLength();
        var lineLength7 = $path7Get.getTotalLength();
        var lineLength8 = $path8Get.getTotalLength();
        var lineLength9 = $path9Get.getTotalLength();
        var lineLength10 = $path10Get.getTotalLength();


        var hidePath = function(e, lineLength){
            TweenLite.to(e, 0.1, {
                strokeDasharray: lineLength + " " + lineLength,
                strokeDashoffset: lineLength
            });
        };

        hidePath($path1, lineLength1);
        hidePath($path2, lineLength2);
        hidePath($path3, lineLength3);
        hidePath($path4, lineLength4);
        hidePath($path5, lineLength5);
        hidePath($path6, lineLength6);
        hidePath($path7, lineLength7);
        hidePath($path8, lineLength8);
        hidePath($path9, lineLength9);
        hidePath($path10, lineLength10);


        setTimeout(function () {
            TweenLite.to($path1, 2, {strokeDashoffset: lineLength1/2});
        }, 1000);
        setTimeout(function () {
            TweenLite.to($path2, 2, {strokeDashoffset: lineLength2/2});
        }, 3000);
        setTimeout(function () {
            TweenLite.to($path3, 2, {strokeDashoffset: lineLength3/2});
        }, 7000);
        setTimeout(function () {
            TweenLite.to($path4, 2, {strokeDashoffset: lineLength4/2});
        }, 9000);
        setTimeout(function () {
            TweenLite.to($path5, 2, {strokeDashoffset: lineLength5/2});
        }, 11000);
        setTimeout(function () {
            TweenLite.to($path6, 2, {strokeDashoffset: lineLength6/2});
        }, 13000);
        setTimeout(function () {
            TweenLite.to($path7, 2, {strokeDashoffset: lineLength7/2});
        }, 15000);
        setTimeout(function () {
            TweenLite.to($path8, 2, {strokeDashoffset: lineLength8/2});
        }, 17000);
        setTimeout(function () {
            TweenLite.to($path9, 2, {strokeDashoffset: lineLength9/2});
        }, 19000);
        setTimeout(function () {
            TweenLite.to($path10, 2, {strokeDashoffset: lineLength10/2});
        }, 21000);

        setTimeout(function () {
            $('#404Illustration').css('opacity', '1');
        }, 500);

    });

</script>