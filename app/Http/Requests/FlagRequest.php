<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlagRequest extends FormRequest
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
			'name'      => 'required|max:60',
			'latitude' => ['nullable','required_with:longitude','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/','max:15'],
			'longitude' => ['nullable','required_with:latitude','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/','max:15']
		];
	}
}
