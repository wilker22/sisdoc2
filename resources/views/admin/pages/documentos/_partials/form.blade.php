@include('admin.includes.alerts')

<div class="form-group">
    <label for="nome">Tipo:</label>
    <select  class="form-control" name="tipo">
        <option value="#">Selecione um tipo:</option>
        <option value="{{ $documento->tipo }}"></option>
    </select>
</div>

<div class="form-group">
    <label for="nome">Natureza:</label>
    <select  class="form-control" name="tipo">
        <option value="#">Selecione uma Natureza:</option>
        <option value="{{ $documento->natureza }}"></option>
    </select>
</div>

<div class="form-group">
    <label>Município:</label>
    <select  class="form-control" name="tipo">
        <option value="#">Selecione um Município:</option>
        <option value="{{ $documento->municipio->nome }}"></option>
    </select>
</div>

<div class="form-group">
    <label>Número:</label>
    <input type="text" class="form-control" name="numero" placeholder="Número do Documento" value="{{ $documento->numero ?? old('numero') }}">
</div>

<div class="form-group">
    <label for="origem">Nome:</label>
    <input type="text" name="origem" class="form-control" placeholder="Origem" value="{{ $municipio->nome ?? old('nome') }}">
</div>

<div class="form-group">
    <label>Data da Entrada:</label>
    <input type="date" name="data_entrada" class="form-control" value="{{ $municipio->data_entrada ?? old('data_entrada') }}">
</div>

<div class="form-group">
    <label>Assunto:</label>
    <input type="text" name="assunto" class="form-control" placeholder="Assunto" value="{{ $municipio->assunto ?? old('assunto') }}">
</div>

<div class="form-group">
    <label>Encaminhado para (Gerência/Unidade):</label>
    <select  class="form-control" name="tipo">
        <option value="#">Selecione um Setor:</option>
        <option value="{{ $documento->setor->sigla }}"></option>
    </select>
</div>

<div class="form-group">
    <label>Data do Encaminhamento:</label>
    <input type="date" name="data_encaminhamento" class="form-control" value="{{ $municipio->data_encaminhamento ?? old('data_encaminhamento') }}">
</div>

<div class="form-group">
    <label>Providência:</label>
    <textarea cols="30" rows="5" name="providencia" class="form-control">
        {{ $documento->providencia ?? old('providencia') }}
    </textarea>
</div>

<div class="form-group">
    <label>Data da Providência:</label>
    <input type="date" name="data_providencia" class="form-control" value="{{ $documento->data_providencia ?? old('data_providencia') }}">
</div>

<div class="form-group">
    <label>Imagem do Documento</label>
    <input type="file" name="imagem" class="form-control" value="{{ $documento->imagem ?? old('imagem') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
