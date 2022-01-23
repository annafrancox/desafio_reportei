
<div class="row">
    <div class="form-group col-12 col-md-12">
        <label for="title" class="required">Título: </label>
        <input type="text" name="title" autofocus id="title" class="form-control" required value="{{ old('title', $contentbox->title) }}">
    </div>
    <div class="form-group col-12 col-md-12">
        <label for="attachment" class="required">Arquivos: </label>
        <input type="file" name="attachment[]" id="attachment" class="form-control" multiple>
    </div>

</div>


