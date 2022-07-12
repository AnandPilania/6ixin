<?php

return [
    'name'    => 'Account',
    'models'  => [
        'login'         => Modules\Account\Entities\Login::class,
        'address'       => Modules\Account\Entities\Address::class,
        'wallet'        => Modules\Account\Entities\Wallet::class,
        'transaction'   => Modules\Account\Entities\Transaction::class,
        //
        // 'comment'       => Modules\Account\Entities\Comment::class,
        // 'link'          => Modules\Account\Entities\Link::class,
        // 'contact'       => Modules\Account\Entities\Contact::class,
        // 'story'         => Modules\Account\Entities\Story::class,
        'user'          => Modules\Account\Entities\BaseUser::class,
    ],
    'table_names'       => [
        'logins'        => 'account_logins',
        'addresses'     => 'account_addresses',
        'wallets'       => 'account_wallets',
        'transactions'  => 'account_transactions',
        'comments'      => 'account_comments',
        'threads'       => 'account_threads',
        'threadsx'      => 'account_threadsx',
        'events'        => 'account_events',
        'links'         => 'account_links',
        'contacts'      => 'account_contacts',
        'stories'       => 'account_stories',
        'users'         => 'users',

    ],
    'column_names' => [
      'model_morph_key'  => 'owner_id',
      'model_morph_type' => 'owner_type',
    ],
    'create_wallet_default' => false,
    'cache' => [
        'expiration_time' => \DateInterval::createFromDateString('24 hours'),
        'key' => 'spatie.permission.cache',
        'model_key' => 'name',
        'store' => 'default',
    ],
];
