<select>
<?$options = [ 10,20,30,40,50,60];
foreach($options as $value => $label) { ?>
<option value="<?=$value?>"><?=$label?></option>
<? } ?>
</select>   