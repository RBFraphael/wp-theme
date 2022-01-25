<?php

class Callbacks_RestAPI
{
    public function example_get(WP_REST_Request $request)
    {
        return [
            'error' => false,
            'method' => "GET",
            'data' => $request->get_params()
        ];
    }

    public function example_post(WP_REST_Request $request)
    {
        return [
            'error' => false,
            'method' => "POST",
            'data' => $request->get_params()
        ];
    }

    public function example_multiple(WP_REST_Request $request)
    {
        return [
            'error' => false,
            'method' => $request->get_method(),
            'data' => $request->get_params()
        ];
    }

    public function example_error(WP_REST_Request $request)
    {
        $params = $request->get_params();
        return new WP_Error('awesome_server_error', "Your awesome server error", [
            'status' => isset($params['status']) ? $params['status'] : 500
        ]);
    }
}