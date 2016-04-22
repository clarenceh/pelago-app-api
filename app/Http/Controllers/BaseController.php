<?php
/**
 * Created by PhpStorm.
 * User: clarence
 * Date: 22/4/2016
 * Time: 10:08
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Log;

class BaseController extends Controller
{
    public function callAction($method, $params)
    {
        // Treat all request as Ajax
        $ajax = true;
        try {
            return parent::callAction($method, $params);
        } catch(ValidationException $exception) {
            Log::debug('BaseController - validation exception catched');
            return $this->handleValidationException($exception, $ajax);
        } catch(AuthException $exception) {
            return $this->handleAuthException($exception, $ajax);
        } catch(ModelNotFoundException $exception) {
            return $this->modelNotFoundException($exception, $ajax);
        }
    }

    protected function handleValidationException(ValidationException $exception, $ajax = false)
    {
        return response()->json(array('errors' => $exception->validator->errors()), 422);
    }

    protected function handleAuthException(AuthException $exception, $ajax = false)
    {
        return response()->json($exception->getMessage(), 403);
    }

    protected function modelNotFoundException(ModelNotFoundException $exception, $ajax = false)
    {
        return response()->json(array('message' => "Resource not found"), 404);
    }
}