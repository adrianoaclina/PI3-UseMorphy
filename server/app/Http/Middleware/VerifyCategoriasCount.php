<?php

namespace App\Http\Middleware;

use Closure;

class VerifyCategoriasCount
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
        if(Category::all()->count() == 0){
            session()->flash('error', 'Você precisa criar uma categoria antes de criar um produto.');
            return redirect(route('categories.create'));
        }
        return $next($request);
    }
}
