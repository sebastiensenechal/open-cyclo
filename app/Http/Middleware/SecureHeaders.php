<?php

namespace App\Http\Middleware;

use Closure;

class SecureHeaders
{

    // Enumerate headers which you do not want in your application's responses.
    // Great starting point would be to go check out @Scott_Helme's:
    // https://securityheaders.com/
    private $unwantedHeaderList = [
        'X-Powered-By',
        'Server',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->removeUnwantedHeaders($this->unwantedHeaderList);
        $response = $next($request);
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
        // $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Frame-Options', 'sameorigin');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        // $response->headers->set('Content-Security-Policy', "style-src https://fonts.googleapis.com/ https://fonts.gstatic.com https://unpkg.com/leaflet@1.3.1/ https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/ script-src 'self' https://apis.google.com https://unpkg.com/leaflet@1.3.1/ https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/ https://oss.maxcdn.com/

// "); // Clearly, you will be more elaborate here.
        return $response;
    }

    private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header)
            header_remove($header);
    }
}
