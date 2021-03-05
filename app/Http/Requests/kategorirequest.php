<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kategorirequest extends FormRequest
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
        //Yamaha
        //Honda
        //Suzuki

        $parentId =(int) $this->get('parent_id');
        $id= (int) $this->get('id');

        if($this->method()== 'PUT'){
            if ($parentId > 0){
                $name = 'required|unique:kategoris,name,'.$id.',id,parent_id,'.$parentId;
            } else {
                  $name = 'required|unique:kategoris,name,'.$id;
            }

            $slug = 'unique:kategoris,slug,'.$id;
        } else{
            $name = 'required|unique:kategoris,name,NULL,id,parent_id,'.$parentId;
            $slug = 'unique:kategoris,slug';
        }
        return [
            'name' => $name,
            'slug' => $slug,
        ];
    }
}
