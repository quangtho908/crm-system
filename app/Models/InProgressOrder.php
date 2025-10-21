<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class InProgressOrder extends Model
{
  protected $table = 'in_progress_orders';

  protected $fillable = [
    'order_id',
    'email',
    "full_name",
    "phone",
    "address",
    "country_name",
    "state_name",
    "district_name",
    "ward_name",
    "date_of_birth",
    "school",
    "grade",
    "class",
    "parents_name",
    "achievement",
    "product_name",
    "price",
    "total",
    "note",
  ];

  protected $casts = [
    'price' => 'decimal:2',
    'total' => 'decimal:2',
  ];

  public $skipValidation = false;

  protected static array $rules = [
    'order_id'      => 'required|string',
    'email'         => 'nullable|email|max:100',
    'full_name'     => 'nullable|string|max:255',
    'phone'         => 'nullable|string|max:20',
    'address'       => 'nullable|string',
    'country_name'  => 'nullable|string|max:100',
    'state_name'    => 'nullable|string|max:100',
    'district_name' => 'nullable|string|max:100',
    'ward_name'     => 'nullable|string|max:100',
    'date_of_birth' => 'nullable|string',
    'school'        => 'nullable|string',
    'grade'         => 'nullable|string|max:20',
    'class'         => 'nullable|string|max:20',
    'parents_name'  => 'nullable|string|max:255',
    'achievement'   => 'nullable|string',
    'product_name'  => 'nullable|string',
    'price'         => 'required|numeric|min:0',
    'total'         => 'required|numeric|min:0',
    'note'          => 'nullable|string',
  ];

  protected static array $messages = [
    'email.email'         => 'Email không hợp lệ.',
    'price.required'      => 'Giá sản phẩm là bắt buộc.',
    'total.required'      => 'Tổng tiền là bắt buộc.',
    'price.numeric'       => 'Giá sản phẩm phải là số.',
    'total.numeric'       => 'Tổng tiền phải là số.',
  ];

  /**
   * Boot: tự động validate khi creating/updating
   */
  protected static function booted(): void
  {
    static::creating(function (InProgressOrder $model) {
      if (!$model->skipValidation) {
        $model->validateModel();
      }
    });

    static::updating(function (InProgressOrder $model) {
      if (!$model->skipValidation) {
        $model->validateModel();
      }
    });
  }

  /**
   * Validate static data array (trước khi create)
   */
  public static function validate(array $data): array
  {
    $validator = Validator::make($data, static::$rules, static::$messages);

    if ($validator->fails()) {
      throw new ValidationException($validator);
    }

    return $validator->validated();
  }

  /**
   * Validate instance attributes (auto khi save)
   */
  public function validateModel(): array
  {
    $validator = Validator::make(
      $this->only($this->fillable),
      static::$rules,
      static::$messages
    );

    if ($validator->fails()) {
      throw new ValidationException($validator);
    }

    return $validator->validated();
  }
}
