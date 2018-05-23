<div class="form-group">
	<label class="control-label">Дата</label>
	<input type="date" class="form-control" placeholder="dd/mm/yyyy">
</div>

<div class="form-group">
	<input name="group4" type="radio" id="radio_7" class="radio-col-cyan" checked="">
	<label for="radio_7">Приход</label>
	<input name="group4" type="radio" id="radio_8" class="radio-col-cyan">
	<label for="radio_8">Расход</label>
</div>

<div class="form-group">
	<label>Категория</label>
	<select class="form-control">
    <?foreach($menu as $item){?>
	    <option><?=$item['NAME']?></option>
        <?if(!empty($item['CHILD'])){?>
            <?foreach($item['CHILD'] as $child){?>
                <option><?=$child['NAME']?></option>
            <?}?>
        <?}?>
    <?}?>
	</select>
</div>

<div class="form-group">
	<input type="text" class="form-control" placeholder="Сумма">
</div>

<div class="form-group">
	<label>Комментарий</label>
	<textarea class="form-control" rows="5"></textarea>
</div>

<div class="form-actions">
	<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Сохранить</button>
	<a href=""><button type="button" class="btn btn-inverse">Отмена</button></a>
</div>
