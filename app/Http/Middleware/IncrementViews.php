<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class IncrementViews
{
    const VIEWS_COUNT_COLUMN = 'views_count';

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, $model, $identifier, $type = 'id')
    {
        $response = $next($request);

        // Get the model class from the string
        $modelClass = 'App\\Models\\' . ucfirst($model);

        if (class_exists($modelClass)) {
            // Get the model instance based on the type of the identifier
            $modelInstance = $type === 'id' ? $modelClass::find($identifier) : $modelClass::where('slug', $identifier)->first();

            // Check if the model instance exists and has been viewed by the user during this session
            if ($modelInstance && !Session::has('viewed_' . $model . '.' . $identifier)) {
                $modelInstance->increment(self::VIEWS_COUNT_COLUMN);

                // Add the model instance to the session
                Session::push('viewed_' . $model . '.' . $identifier, true);
            }
        }

        return $response;
    }
}
