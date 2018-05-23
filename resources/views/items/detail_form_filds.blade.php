<div class="form-group">
	<label class="control-label">Дата</label>
	<input type="date" name="DATE" class="form-control" placeholder="dd/mm/yyyy">
</div>


<div class="form-group">
	<label>Категория</label>
	<select class="form-control">
    <?/*foreach($menu as $item){?>
	    <option><?=$item['NAME']?></option>
        <?if(!empty($item['CHILD'])){?>
            <?foreach($item['CHILD'] as $child){?>
                <option><?=$child['NAME']?></option>
            <?}?>
        <?}?>
    <?}*/?>
	</select>
</div>

<div class="form-group">
	<input type="text" name="PRICE" class="form-control" placeholder="Сумма">
</div>

<div class="form-group">
	<label>Комментарий</label>
	<textarea class="form-control" name="COMMENTS" rows="5"></textarea>
</div>

<div class="form-actions">
	<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Сохранить</button>
	<a href=""><button type="button" class="btn btn-inverse">Отмена</button></a>
</div>
