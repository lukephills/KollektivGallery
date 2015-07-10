<?
/*
 * Get all the manual block illustrations
 */
?>

<? $letter = strtolower(get_field('letter')); ?>

<?if (strlen($letter) === 1):?>
    <div id="manual-image-<?=$letter;?>" class="manual-image manual-image-<?=$letter;?> manual-id-<?=$letter;?>">
        <? get_template_part("assets/images/manual-blocks/".get_field('letter'), 'block.svg' ) ?>
    </div>
<?endif;?>
