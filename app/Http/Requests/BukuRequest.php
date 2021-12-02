<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'is_edit' => 'sometimes|required|boolean',
            'judul' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required|integer|numeric',
            'sinopsis' => 'required',
            'cover' => 'exclude_if:is_edit,true|required|file|image',
            'publisher_id' => 'required|exists:publishers,id',
            'book_category_id' => 'required|exists:book_categories,id',
            'tags' => 'sometimes|required|array|exists:tags,id'
        ];
    }
}
