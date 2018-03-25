<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
            'band_id' => 'required|exists:bands,id|integer',
            'name' => 'required|max:255|string',
            'recorded_date' => 'nullable|string',
            'release_date' => 'nullable|string',
            'number_of_tracks' => 'nullable|integer',
            'label' => 'nullable|max:255',
            'producer' => 'nullable|max:255',
            'genre' => 'nullable|max:255'
        ];
    }
}
