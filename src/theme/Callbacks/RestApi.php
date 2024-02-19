<?php
namespace WpTheme\Callbacks;

use Illuminate\Database\Migrations\Migrator;
use Phinx\Console\PhinxApplication;
use Phinx\Wrapper\TextWrapper;
use WP_REST_Request;
use WP_Error;

class RestApi
{
    static function Example(WP_REST_Request $request)
    {
        $data = $request->get_params();
        $response = [
            'status' => 'success',
            'message' => 'Data received',
            'data' => $data
        ];
        return rest_ensure_response($response);
    }
    
}
