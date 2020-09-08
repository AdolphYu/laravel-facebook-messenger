<?php
return [
    'debug' => env('APP_DEBUG', true),
    'verify_token' => env('MESSENGER_VERIFY_TOKEN'),
    'app_token' => env('MESSENGER_APP_TOKEN'),
    'app_secret' => env('MESSENGER_APP_SECRET'),
    'custom_url' => '/fb_webhook',
    'webhook'=>[
        'messages'=>true,
        'message_deliveries'=>true,
        'message_echoes'=>true,
        'message_reads'=>true,
        'messaging_account_linking'=>true,
        'messaging_game_plays'=>true,
        'messaging_handovers'=>true,
        'messaging_optins'=>true,
        'messaging_policy_enforcement'=>true,
        'messaging_postbacks'=>true,
        'messaging_referrals'=>true,
        'standby'=>true,
        'message_reactions'=>true,
    ]
];
