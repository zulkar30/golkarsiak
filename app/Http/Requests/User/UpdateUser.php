<?php

namespace App\Http\Requests\User;

// Library
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Middleware
use Gate;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'paket_id' => [
                'nullable'
            ],
            'kecamatan_id' => [
                'nullable'
            ],
            'desa_id' => [
                'nullable'
            ],
            'tps_id' => [
                'nullable'
            ],
            'name' => [
                'nullable', 'string', 'max:255'
            ],
            'email' => [
                'nullable', 'email', 'max:255', Rule::unique('users')->ignore($this->user)
            ],
            'password' => [
                'min:8', 'string', 'max:255', 'mixedCase'
            ],
            'foto' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000'
            ],
        ];
    }
}
