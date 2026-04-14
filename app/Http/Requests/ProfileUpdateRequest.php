<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'so_dien_thoai' => ['required', 'string', 'max:13']
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max ký tự',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Tên',
            'so_dien_thoai' => 'Số điện thoại'
        ];
    }
}
