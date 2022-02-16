<?php

namespace App\Http\Requests;

class ChartRequest extends BaseRequest
{
    const DATE_FORMAT = 'Ymd';
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
            'start_date' => 'required|not_empty|date_format:' . self::DATE_FORMAT ,
            'end_date' => 'required|not_empty|date_format:' . self::DATE_FORMAT . '|after_or_equal:start_date',
        ];
    }

    /**
     * Messages if validation false.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'start_date.required' => __('custom_validation.required', [
                'attribute' => __('attribute.start_date')
            ]),
            'start_date.not_empty' => __('custom_validation.not_empty', [
                'attribute' => __('attribute.start_date')
            ]),
            'end_date.required' => __('custom_validation.required', [
                'attribute' => __('attribute.end_date')
            ]),
            'end_date.not_empty' => __('custom_validation.not_empty', [
                'attribute' => __('attribute.end_date')
            ]),
            'start_date.date_format' => __('custom_validation.date_format', [
                'attribute' => __('attribute.start_date'),
                'format' => self::DATE_FORMAT
            ]),
            'end_date.date_format' => __('custom_validation.date_format', [
                'attribute' => __('attribute.end_date'),
                'format' => self::DATE_FORMAT
            ]),
            'end_date.after_or_equal' => __('custom_validation.after_or_equal', [
                'start' => __('attribute.start_date'),
                'end' => __('attribute.end_date')
            ]),
        ];
    }
}
