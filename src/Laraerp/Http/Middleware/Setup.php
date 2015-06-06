<?php namespace Laraerp\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Http\Request;
use Laraerp\Contracts\Repositories\EmpresaRepository;

class Setup implements Middleware {

    function __construct(EmpresaRepository $empresaRepository)
    {
        $this->empresaRepository = $empresaRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $empresa = $this->empresaRepository->getEmpresa();

        if(is_null($empresa))
            return redirect(route('setup.index'));

        return $next($request);
    }
}
