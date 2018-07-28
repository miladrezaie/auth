<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginWithlaravelweb()
    {
        $query=http_build_query([
           'client_id'=>3,
           'redirect_uri'=>"http://localhost:7000/callback",
            'response_type'=>'code',
            'scope'=>''
        ]);
        return redirect("http://localhost:8000/oauth/authorize?".$query);
    }

    public function loginCallback(Request $request)
    {
        $http = new Client();

        $response = $http->post('http://localhost:8000/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '3',
                'client_secret' => 'x63YzQOcflvIA6XxOK2Y6XNtC0lmFDRjDikEROhT',
                'redirect_uri' => 'http://localhost:7000/callback',
                'code' => $request->code,
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
