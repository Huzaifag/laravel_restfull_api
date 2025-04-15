<?php

namespace App\Filters\V1;
use App\Filters\ApiFilter;

class InvoiceFilter extends ApiFilter
{
    protected $safeParams = [
        'customer_id' => ['eq'],
        'amount' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'status' => ['eq', 'ne'],
        'billed_date' => ['eq'],
        'paid_date' => ['eq'],
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
        'ne' => '!=',
    ];
}
