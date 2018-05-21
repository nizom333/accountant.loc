
<div class="form-group">
	<label class="control-label">Дата</label>
	<input type="date" class="form-control" placeholder="dd/mm/yyyy">
</div>

<select class="form-control" name="published">
  @if (isset($category->id))
    <option value="0" @if ($category->published == 0) selected="" @endif>Не опубликовано</option>
    <option value="1" @if ($category->published == 1) selected="" @endif>Опубликовано</option>
  @else
    <option value="0">Не опубликовано</option>
    <option value="1">Опубликовано</option>
  @endif
</select>

<div class="form-group">
	<label>Категория</label>
	<select class="form-control" name="published">
	    <option value="0">-- без родительской категории --</option>)
		@include('admin.categories.category_op', ['categories' => $categories])
	</select>
</div>

<div class="form-group">
	<input type="text" class="form-control" placeholder="Сумма">
</div>



<div class="form-group">
	<label for="">Наименование</label>
	<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{$category->name or ""}}" required>
</div>


<div class="form-group">
	<label for="">Slug</label>
	<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="{{$category->slug or ""}}" readonly="">
</div>

<div class="form-group">

	<input name="group4" type="radio" id="radio_7" class="radio-col-cyan" checked="">
	<label for="radio_7">Приход</label>
	<input name="group4" type="radio" id="radio_8" class="radio-col-cyan">
	<label for="radio_8">Расход</label>
</div>

<div class="form-group">
	<label>Комментарий</label>
	<textarea class="form-control" rows="5"></textarea>
</div>

<div class="form-actions">
	<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Сохранить</button>
	<a href="{{route('admin.category.index')}}"><button type="button" class="btn btn-inverse">Отмена</button></a>
</div>


