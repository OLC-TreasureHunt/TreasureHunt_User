<?php

if ( !defined('API_HOST') ) {
    define('API_HOST', 'https://admin.eternal-dreams.net/api/?1_0_0');
    define('API_HOST2', 'https://admin.eternal-dreams.net/api/?2_0_0');
    define('API_HOST3', 'https://admin.eternal-dreams.net/api/?3_0_0');
    
    define('API_RETRY_COUNT', 5);
    
    define('ETH_GAS_LIMIT', '21000');
    define('GAS_UNIT', '1000000000');
    
    define('COIN_TEST_NET', 'TESTNET');
    define('COIN_REAL_NET', 'REALNET');
    define('COIN_NET', (env('APP_ENV') == 'local' ? COIN_TEST_NET : COIN_REAL_NET));
    
    define('HTTP_METHOD_GET', 'GET');
    define('HTTP_METHOD_POST', 'POST');
    define('HTTP_METHOD_PUT', 'PUT');
    define('HTTP_METHOD_DELETE', 'DELETE');
    
    define('QR_GENERATE_URL', 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=');
    
    define('BTC_CONFIRM_URL', (COIN_NET == COIN_REAL_NET ? 'https://live.blockcypher.com/btc/tx/' : 'https://live.blockcypher.com/btc-testnet/tx/'));
    define('LTC_CONFIRM_URL', (COIN_NET == COIN_REAL_NET ? 'https://live.blockcypher.com/ltc/tx/' : 'https://live.blockcypher.com/ltc-testnet/tx/'));
    define('XRP_CONFIRM_URL', (COIN_NET == COIN_REAL_NET ? 'https://blockchair.com/ripple/transaction/' : 'https://blockchair.com/ripple/transaction/'));
    define('BCH_CONFIRM_URL', (COIN_NET == COIN_REAL_NET ? 'https://explorer.bitcoin.com/bch/tx/' : 'https://explorer.bitcoin.com/bch/tx/'));
    define('ETH_CONFIRM_URL', (COIN_NET == COIN_REAL_NET ? 'https://etherscan.io/tx/' : 'https://ropsten.etherscan.io/tx/'));
    define('BNB_CONFIRM_URL', (COIN_NET == COIN_REAL_NET ? 'https://bscscan.com/tx/' : 'https://bscscan.com/tx/'));
    define('TRX_CONFIRM_URL', (COIN_NET == COIN_REAL_NET ? 'https://tronscan.org/#/transaction/' : 'https://shasta.tronscan.org/#/transaction/'));
    
    define('BTC_FEE_API_URL', 'https://bitcoinfees.earn.com/api/v1/fees/recommended');
    define('ETH_FEE_API_URL1', 'https://etherscan.io/gastracker');
    define('ETH_FEE_API_URL2', 'https://ethgasstation.info/json/ethgasAPI.json');
    define('LTC_FEE_API_URL', 'https://api.cryptoapis.io/v1/bc/ltc/testnet/txs/fee');
    
    define('LTC_API_KEY', 'cfb86b4b5a9806cc9f44d699bea9a6b1203a90e6');
    
    define('STATUS_BANNED', 0);
    define('STATUS_ACTIVE', 1);
    define('STATUS_FAIL', 2);
    define('STATUS_ALREADY', 10);
    
    define('ORDER_STATUS_PENDING', 0);
    define('ORDER_STATUS_SETTLED', 1);
    define('ORDER_STATUS_SUB_SETTLED', 2);
    define('ORDER_STATUS_CANCELLED', 3);
    define('ORDER_STATUS_CANCELLING', 4);
    
    define('SIGNAL_TYPE_SELL', 1);
    define('SIGNAL_TYPE_BUY', 2);
    
    define('KYC_STATUS_ACTIVE', 1);
    
    define('WALLET_TYPE_COLD', 1);
    define('WALLET_TYPE_DEPOSIT', 2);
    define('WALLET_TYPE_WITHDRAW', 3);
    define('WALLET_TYPE_GASTANK', 4);
    
    define('WALLET_SPECIFIED_NONE', 0);
    define('WALLET_SPECIFIED_DEPOSIT', 1);
    define('WALLET_SPECIFIED_WITHDRAW', 2);
    define('WALLET_SPECIFIED_GASTANK', 3);
    
    define('BLOCKCHAIN_FEE_MODE_MANUAL', 0);
    define('BLOCKCHAIN_FEE_MODE_FAST', 1);
    define('BLOCKCHAIN_FEE_MODE_STANDARD', 2);
    define('BLOCKCHAIN_FEE_MODE_SAFELOW', 3);
    
    define('SYSTEM_PROFIT_TYPE_DEPOSIT', 1);
    define('SYSTEM_PROFIT_TYPE_WITHDRAW', 2);
    define('SYSTEM_PROFIT_TYPE_TRADE_FEE', 3);
    
    define('WITHDRAW_STATUS_REQUESTED', 0);
    define('WITHDRAW_STATUS_FINISHED', 1);
    define('WITHDRAW_STATUS_PENDING', 2);
    define('WITHDRAW_STATUS_FAILED', 3);
    define('WITHDRAW_STATUS_CANCELLED', 4);
    
    define('SYSTEM_BALANCE_TYPE_EXCHANGE', 1);
    define('SYSTEM_BALANCE_TYPE_SHOP', 2);
    
    define('SYSTEM_USER_ID', 1);
    
    define('X_DEFI_TEST_CHECK_URL', 'https://api.stg.choja.org/api/external/check_user_exist');
    define('X_DEFI_REAL_CHECK_URL', 'https://api.choja.org/api/external/check_user_exist');
    define('X_DEFI_SEPARATOR', 'wl-x-defi');
    define('BKOFFICE_URL', 'https://x-defi-bkoff.adam-bit.net');
    
    define('PROJECT_BEGIN_TIMESTAMP', 1633017600);
    define('INFINITE', 2000000000);
    
    define('RECENT_NEWS_COUNT', 5);
    define('PURCHASE_VALID_TIME', 30);  // unit = minutes
    define('PURCHASE_DEFAULT_AMOUNT', 100);
    define('MAIN_CURRENCY', 'USDT');
    
    define('PRODUCT_STATUS_BANNED',         0);
    define('PRODUCT_STATUS_SALE',			1);
    define('PRODUCT_STATUS_EXPIRED',        2);
    
    # Purchase Status
    define('PURCHASE_STATUS_PENDING', 0);
    define('PURCHASE_STATUS_FINISHED', 1);
    define('PURCHASE_STATUS_CANCELLED', 2);
    
    define('SETTLE_STATUS_PREPARE', 0);
    
    define('LOCK_PERIOD_TYPE_MONTH',    1);
    define('LOCK_PERIOD_TYPE_DAY',      2);
    
    define('PRODUCT_STOCK_LOCK',            0);
    define('PRODUCT_STOCK_ACTIVE',          1);
    define('PRODUCT_STOCK_COMPLETED',       2);
    
    $StockType = array(
        PRODUCT_STOCK_LOCK              => ['product.label.lock'],
        PRODUCT_STOCK_ACTIVE            => ['product.label.active'],
        PRODUCT_STOCK_COMPLETED         => ['product.label.completed'],
    );
    
    define('PURCHASE_ERROR_TERMS',		-100);
    define('PURCHASE_ERROR_EXIST',		-99);
    define('PURCHASE_ERROR_SALE',		-98);
    define('PURCHASE_ERROR_STOCK',		-97);
    define('PURCHASE_ERROR_BALANCE',	-80);
    define('PURCHASE_ERROR_RATE',	    -70);
    define('PURCHASE_ERROR_NONE',		0);
    
    define('PURCHASE_HISTORY_LIMIT',    13);
    
    define('HISTORY_TYPE_DIVIDEND',     1);
    define('HISTORY_TYPE_PURCHASE',     2);
    
    define('ALLOW_PRODUCT_PURCHASE', 'ALLOW_PRODUCT_PURCHASE');
    define('DIVIDEND_COUNTDOWN_DAYS', 'DIVIDEND_COUNTDOWN_DAYS');
    
    define('SETTLE_TYPE_AUTO',      1);
    define('SETTLE_STATUS_REQUEST', 0);
    
    define('USDT_COINS', array(
        'USDT-E', 'USDT-B', 'USDT-T'
    ));
    
    define('MACHINE_POOL_STATUS_ACTIVE', 1);
    
    define('CARD_OPEN_STATUS_BANNED', 0);
    define('CARD_OPEN_STATUS_ACTIVE', 1);
    
    define('CARD_STATUS_SALE',              0);
    define('CARD_STATUS_OWN',               1);
    define('CARD_STATUS_EXCHANGE_REQ',      2);
    define('CARD_STATUS_EXCHANGE_OK',       3);
    
    define('MACHINE_POOL_STATUS_BANNED',       0);
    define('MACHINE_POOL_STATUS_SALE',          1);
    define('MACHINE_POOL_STATUS_SOLD',       2);
    define('MACHINE_POOL_STATUS_CAST',       3);
    define('MACHINE_POOL_STATUS_CAST_REQ',       4);
    define('MACHINE_POOL_STATUS_CAST_PENDING',       5);
    
    //////////////////////////////////////////////////////////////
    /////////////////      API Constants      ////////////////////
    //////////////////////////////////////////////////////////////
    
    define('API_KEY_HEADER', 'X-CTEX-API-KEY');
    define('API_NONCE_HEADER', 'X-CTEX-API-NONCE');
    define('API_SIGNATURE_HEADER', 'X-CTEX-SIGNATURE');
    
    define('API_FAILURE', 0);
    define('API_SUCCESS', 1);
    
    define('API_NO_ERROR',              200);
    define('API_AUTH_FAILED',           201);
    define('API_PARAM_ERROR',           300);
    define('API_OPERATION_FAILED',      400);
    
    define('API_WITHDRAW_GREATE',       501);
    define('API_WITHDRAW_SMALL',        502);
    define('API_INVALID_DAILY_LIMIT', 20008);
    define('API_INVALID_START_DATE', 40022);
    define('API_INVALID_COUNT', 40006);
    define('API_ORDER_NOT_EXIST', 50009);
    define('API_ORDER_CANNOT_CANCEL', 50010);
    define('API_ORDER_ALREADY_CANCELLED', 50012);
    define('API_NO_DEPOSIT', 80001);
    define('API_INVALID_WITHDRAW_ADDRESS', 80002);
    define('API_INVALID_WITHDRAW_AMOUNT', 80003);
    define('API_NOT_ENOUGH_BALANCE', 80004);
    define('API_CRYPTO_SEND_FAILED', 80005);
    
    define('API_MESSAGE_SUCCESS', 'API Call Success!');
    define('API_MESSAGE_PARAM_ERROR', 'Parameter error.');
    define('API_MESSAGE_FAILED', 'API call failed.');
    define('API_MESSAGE_AUTH_FAILED', 'Unauthenticated user.');
    define('API_MESSAGE_CONFIRM_PASS', 'Password and Confirm password is not same.');
    define('API_MESSAGE_OLD_PASSWORD', 'Old password is incorrect.');
    
    
    define('X_DEFI_IP1', '13.113.9.12');
    define('X_DEFI_IP2', '54.150.114.50');
    define('VALID_TOKEN_PERIOD', '3 days');
    define('NFT_MARKET_SITE', env('APP_ENV') == 'local' ? 'http://localhost:9000' : 'https://market.tnc-hk.co/api/login');
    define('DEPOSIT_QUEUE_STATUS_INIT', 1);
    
    define('MOBILE_LOGIN',      1);
    define('MOBILE_LOGOUT',     0);
    
    define('CRYPTO_COIN', 1);
    define('CRYPTO_TOKEN', 2);
    define('CRYPTO_CASH', 3);
    define('CRYPTO_NFT', 4);

    $PRNGPrimeKeys = [
        999683, 999727, 999763, 999863, 999883, 999907, 999931, 999959, 999979, 999983
    ];
    define('PRNGPrimeKeys', $PRNGPrimeKeys);

    //////////////////////////////////////////////////////////////
    
    return [
        'reg_type' => [
            'BO' => 1,
            'CTEX' => 2,
        ],
    
        'user_status' => [
            'invalid' => 0,
            'valid' => 1,
        ],
    
        'balance_status' => [
            'invalid' => 0,
            'valid' => 1,
        ],
    
        'crypto_setting_status' => [
            'invalid' => 0,
            'valid' => 1,
        ],
    
        'currency_status' => [
            'invalid' => 0,
            'valid' => 1,
        ],
    
        'device' => [
            'Mobile' => 1,
            'Tablet' => 2,
            'Desktop' => 3,
            'Unknown' => 4,
        ],
    
        'gender_list' => [
            ['id' => 0, 'gender' => 'male'],
            ['id' => 1, 'gender' => 'female'],
        ],
    
        'language_list' => [
            ['code' => 'en', 'name' => 'English'],
            ['code' => 'jp', 'name' => '日本語'],
            ['code' => 'zh', 'name' => '中文'],
        ],
    
        'disposable_status' => [
            'invalid' => 0,
            'valid' => 1,
        ],
    
        'deposit_status' => [
            'confirmed' => 0,
            'completed' => 1,
            'processing' => 2,
            'failed' => 3,
        ],
    
        'withdraw_type' => [
            'crypto' => 1,
            'transfer' => 2,
        ],
    
        'withdraw_status' => [
            'requested' => 0,
            'completed' => 1,
            'processing' => 2,
            'failed' => 3,
            'canceled' => 4,
        ],
    
        'trade_type' => [
            'exchange' => 1,
            'dealer' => 2,
        ],
    
        'order_type' => [
            'sell' => 1,
            'buy' => 2,
        ],
    
        'order_type2' => [
            'market' => 1,
            'limit' => 2,
        ],
    
        'order_status' => [
            'pending' => 0,
            'settled' => 1,
            'settlement' => 2,
            'canceled' => 3,
            'canceling' => 4,
        ],
    
        'trade_status' => [
            'settled' => 1,
            'canceled' => 2,
        ],
    
        'trade_remark' => [
            'not_enough_balance' => 'not_enough_balance',
            'market_order_cancel' => 'market_order_cancel',
        ],
    
        'news_status' => [
            'invalid' => 0,
            'valid' => 1,
        ],
    
        'notifications_status' => [
            'unread' => 0,
            'read' => 1,
        ],
    
        'faq_status' => [
            'invalid' => 0,
            'valid' => 1,
        ],
    
        'contact_status' => [
            'requested' => 0,
            'replied' => 1,
            'pending' => 2,
        ],
    
        'kyc_status' => [
            'not_verified' => 0,
            'verified' => 1,
            'review' => 2,
            'failed' => 3
        ],
    
        'step_auth_status' => [
            'no_use' => 0,
            'use' => 1,
        ],
    
        'data_status' => [
            'invalid' => 0,
            'valid' => 1,
        ],
    
        'daily_fluct' => [
            'YESTERDAY_CLOSING_PRICE' => 'YESTERDAY_CLOSING_PRICE',
            'TODAY_CURRENT_PRICE' => 'TODAY_CURRENT_PRICE',
            'TODAY_TOTAL_AMOUNTS' => 'TODAY_TOTAL_AMOUNTS',
            'TODAY_CHANGE_PERCENT' => 'TODAY_CHANGE_PERCENT',
        ],
    
        'rate_timeline_list' => [
            'm1' => 'm1',
            'm5' => 'm5',
            'm15' => 'm15',
            'm30' => 'm30',
            'm60' => 'm60',
            'm240' => 'm240',
            'm1440' => 'm1440',
        ],
    
        'use_deposit' => [
            'disable' => 0,
            'enable' => 1,
        ],
    
        'use_withdraw' => [
            'disable' => 0,
            'enable' => 1,
        ],
    
    
        'bonus_status' => [
            'ranking' => 1,
            'same' => 2,
            'genre' => 3,
            'all' => 4,
            'gap' => 5,
            'affi' => 6,
        ],
    
        'purchase_status' => [
            'requested' => 0,
            'completed' => 1,
            'cancelled' => 2,
        ],
    
    
        'order_book_count' => 14,
        'trade_list_count' => 25,
    
        'page_num' => 10,
        'last_news_count' => 4,
        'last_notification_count' => 4,
    ];
}

