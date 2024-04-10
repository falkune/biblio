<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmaiVerifyLinkExpiration{ # debut class

    public function handle(Request $request, Closure $next): Response {

        if (!$request->hasValidSignature()) {
            return redirect()
                ->route('link.expire')
                ->with('invalide', "Le lien d'activation est invalide ou expiré, veillez renseigner votre email pour en obtenir un nouveau.");
        }

        return $next($request);
    }

} # fin classe
