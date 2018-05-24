<div class="form-group col-md-4 m-t-20">
    <label class="control-label">Дата</label>
    <input type="date" name="DATE" class="form-control" placeholder="{{ date('d.m.Y') }}">
</div>


<div class="form-group col-md-4 m-t-20">
    <label>Категория</label>
    <select name="CATEGORY_ID" class="form-control">
    <?foreach($menu['MENU'] as $item){?>
        <option value="<?=$item['ID']?>"><?=$item['NAME']?></option>
        <?if(!empty($item['CHILD'])){?>
            <?foreach($item['CHILD'] as $child){?>
                <option value="<?=$child['ID']?>" name="CATEGORY_ID"><?=$child['NAME']?></option>
            <?}?>
        <?}?>
    <?}?>
    </select>
</div>

<div class="form-group col-md-4 m-t-20">
    <input type="number" style="line-height: 55px; overflow-y: hidden;" name="PRICE" class="form-control form-control-line" placeholder="Сумма">
</div>

<div class="form-group col-md-12 m-t-20">
    <label>Комментарий</label>
    <textarea class="form-control" name="COMMENTS" rows="5"></textarea>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Сохранить</button>
    <a href="{{ URL::previous() }}"><button type="button" class="btn btn-inverse">Отмена</button></a>
</div>
