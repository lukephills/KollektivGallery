<?
/*
 * Get all the manual block illustrations
 */
?>

<? $letter = strtolower(get_field('letter')); ?>

<?if ($letter !== 'end'):?>
    <div id="manual-image-<?=$letter;?>" class="manual-image manual-image-<?=$letter;?> manual-id-<?=$letter;?>">
        <? get_template_part("assets/images/manual-blocks/".get_field('letter'), 'block.svg' ) ?>
    </div>
<? elseif($letter === 'end'): ?>
	<div id="manual-image-<?=$letter;?>" class="manual-image manual-image-<?=$letter;?> manual-id-<?=$letter;?>">
		<img src="<?=get_template_directory_uri();?>/assets/images/manual-blocks/End.gif" style="width:184px;">
	</div>
<? else: ?>
<?endif;?>

