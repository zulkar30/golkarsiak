<?php

namespace App\Http\Requests\Kegiatan;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

// Middleware
use Gate;

class UpdateKegiatan extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('kegiatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'caleg_id' => [
                'nullable'
            ],
            'kecamatan_id' => [
                'nullable'
            ],
            'desa_id' => [
                'nullable'
            ],
            'user_id' => [
                'nullable'
            ],
            'nama_kegiatan' => [
                'nullable', 'string', 'max:255'
            ],
            'tanggal' => [
                'nullable', 'string'
            ],
            'waktu' => [
                'nullable', 'string'
            ],
            'lokasi' => [
                'nullable', 'string'
            ],
            'keterangan1' => [
                'nullable', 'string'
            ],
            'keterangan2' => [
                'nullable', 'string'
            ],
            'status' => [
                'nullable', 'string'
            ],
        ];
    }
}
