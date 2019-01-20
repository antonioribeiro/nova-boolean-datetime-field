<?php

namespace Clearitie\BooleanDatetime;

use Exception;
use DateTimeInterface;
use Laravel\Nova\Fields\Field;

class BooleanDatetime extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'boolean-datetime';

    /**
     * Show a badge instead of a colored dot.
     *
     * @var boolean
     */
    public $badge = false;

    /**
     * Label for true.
     *
     * @var string
     */
    public $labelTrue = 'Yes';

    /**
     * Label for false.
     *
     * @var string
     */
    public $labelFalse = 'No';

    /**
     * Color for true.
     *
     * @var string
     */
    public $colorTrue = 'bg-success text-white';

    /**
     * Color for false.
     *
     * @var string
     */
    public $colorFalse = 'bg-danger text-white';

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|null  $attribute
     * @param  mixed|null  $resolveCallback
     * @return void
     */
    public function __construct(
        $name,
        $attribute = null,
        $resolveCallback = null
    ) {
        parent::__construct(
            $name,
            $attribute,
            $resolveCallback ??
                function ($value) {
                    if (!$value instanceof DateTimeInterface) {
                        throw new Exception(
                            "DateTime field must cast to 'datetime' in Eloquent model."
                        );
                    }

                    return $value->format('Y-m-d H:i:s');
                }
        );
    }

    /**
     * Define the callback that should be used to resolve the field's value.
     *
     * @param string $true
     * @param string $false
     * @return $this
     */
    public function badge($true = 'Yes', $false = 'No')
    {
        $this->badge = true;

        $this->labelTrue = $true;

        $this->labelFalse = $false;

        return $this;
    }

    /**
     * Define the callback that should be used to resolve the field's value.
     *
     * @param string $true
     * @param string $false
     * @return $this
     */
    public function colors(string $true, string $false)
    {
        $this->colorTrue = $true;

        $this->colorFalse = $false;

        return $this;
    }

    /**
     * Generate meta for all component properties.
     *
     * @return array
     */
    public function meta()
    {
        return [
            'showBadge' => $this->badge,
            'labelTrue' => $this->labelTrue,
            'labelFalse' => $this->labelFalse,
            'colorTrue' => $this->colorTrue,
            'colorFalse' => $this->colorFalse,
        ];
    }

    /**
     * Set the first day of the week.
     *
     * @param  int  $day
     * @return $this
     */
    public function firstDayOfWeek($day)
    {
        return $this->withMeta([__FUNCTION__ => $day]);
    }

    /**
     * Set the date format (Moment.js) that should be used to display the date.
     *
     * @param  string  $format
     * @return $this
     */
    public function format($format)
    {
        return $this->withMeta([__FUNCTION__ => $format]);
    }

    /**
     * Indicate that the date field is nullable.
     *
     * @return $this
     */
    public function nullable()
    {
        return $this->withMeta([__FUNCTION__ => true]);
    }
}
