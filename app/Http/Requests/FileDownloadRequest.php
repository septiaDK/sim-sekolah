<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileDownloadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'path_link' => 'required|mimes:csv,txt,xlx,xls,pdf,docx,doc',
            'judul' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'path_link.required' => 'File harus di isi.',
        ];
    }
}
