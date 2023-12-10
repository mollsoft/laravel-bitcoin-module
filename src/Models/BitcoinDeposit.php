<?php

namespace Mollsoft\LaravelBitcoinModule\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BitcoinDeposit extends Model
{
    protected $fillable = [
        'wallet_id',
        'address_id',
        'txid',
        'amount',
        'block_height',
        'confirmations',
        'time_at',
    ];

    protected $casts = [
        'time_at' => 'timestamp',
    ];

    public function wallet(): BelongsTo
    {
        /** @var class-string<BitcoinWallet> $model */
        $model = config('bitcoin.models.wallet');

        return $this->belongsTo($model, 'wallet_id');
    }

    public function address(): BelongsTo
    {
        /** @var class-string<BitcoinAddress> $model */
        $model = config('bitcoin.models.address');

        return $this->belongsTo($model, 'address_id');
    }
}
