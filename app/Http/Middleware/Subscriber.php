<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Closure;

class Subscriber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $id=$request->route('id');
        $paid=Blog::find($id);

        if(intval($paid->paid_content)===1)
        {
            if (!$user = Auth::user())
            {
                return redirect("/article-permissions/$id");
            }
            else
            {
                if($user->hasRole('subscriber'))
                {
                    return $next($request);
                }
                else
                    return redirect("/article-permissions/$id");
            }
        }

        return $next($request);
    }
}