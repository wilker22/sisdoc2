@include('admin.includes.alerts')

<div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" class="form-control" placeholder="Nome:" value="{{ $municipio->nome ?? old('nome') }}">
</div>


<div class="form-group">
    <label for="descricao">Descrição:</label>
    <textarea cols="30" rows="5" name="descricao" class="form-control">
        {{ $municipio->descricao ?? old('descricao') }}
    </textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
