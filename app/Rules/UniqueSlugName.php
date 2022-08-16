<?php

namespace App\Rules;

use App\Helpers\ModelHelper;
use Illuminate\Contracts\Validation\InvokableRule;

class UniqueSlugName implements InvokableRule
{
    public $table;
    public $ignoreID;

    public function __construct(string $table, ?string $ignoreID = null)
    {
        $this->table = $table;
        $this->ignoreID = $ignoreID;
    }

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (ModelHelper::isAttributeTaken($this->table, 'slug', str($value)->slug(), $this->ignoreID)) {
            $fail('The name has already been taken');
        }
    }
}
