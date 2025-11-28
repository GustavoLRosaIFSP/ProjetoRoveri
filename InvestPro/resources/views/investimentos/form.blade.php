<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div>
        <label class="text-purple-200">Valor Aplicado</label>
        <input type="number" name="valorAplicado"
               value="{{ old('valorAplicado', $investimento->valorAplicado ?? '') }}"
               class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">
    </div>

    <div>
        <label class="text-purple-200">Data de Início</label>
        <input type="date" name="dataInicio"
               value="{{ old('dataInicio', $investimento->dataInicio ?? '') }}"
               class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">
    </div>

    <div>
        <label class="text-purple-200">Data Final</label>
        <input type="date" name="dataFim"
               value="{{ old('dataFim', $investimento->dataFim ?? '') }}"
               class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">
    </div>

    <div>
        <label class="text-purple-200">Retorno Percentual</label>
        <input type="number" step="0.01" name="retornoPercentual"
               value="{{ old('retornoPercentual', $investimento->retornoPercentual ?? '') }}"
               class="w-full mt-1 bg-black border border-purple-700 text-purple-200 rounded-lg p-2">
    </div>

    <div>
        <label class="text-purple-200">Ativo</label>
        <select name="ativo_id" class="w-full bg-black text-purple-200 border border-purple-700 rounded-lg p-2">
            <option value="">Selecione um ativo</option>
            @foreach($ativos as $ativo)
                <option value="{{ $ativo->id }}"
                    @selected(old('ativo_id', $investimento->ativo_id ?? '') == $ativo->id)>
                    {{ $ativo->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit"
        class="bg-purple-600 hover:bg-purple-500 transition text-white px-5 py-2 rounded-lg shadow-lg shadow-purple-900/40 mt-4">
        {{ $buttonText }}
    </button>
</form>
