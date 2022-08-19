<?php

namespace App\Rules;

use App\Helpers\ModelHelper;
use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\DB;

class UniqueName implements InvokableRule
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
        $query = DB::table($this->table)->whereRaw('LOWER(name) = ?', [str($value)->lower()]);

        if ($this->ignoreID) $query->where('id', '!=', $this->ignoreID);

        if ($query->exists()) $fail('The name has already been taken');
    }
}
