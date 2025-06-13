<?php

namespace Modules\RH\Http\Requests\DocumentoColaborador;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentoColaboradorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'colaborador_id' => 'required|exists:colaboradors,id',
            'tipo_documento' => 'required|string|max:50',
            'numero' => 'required|string|max:100',
            'data_emissao' => 'nullable|date',
            'orgao_emissor' => 'nullable|string|max:100',
            'uf_emissor' => 'nullable|string|size:2',
            'validade' => 'nullable|date',
            'arquivo' => 'nullable|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
