<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Symfony\Component\HttpFoundation\Response;

class XSSProtectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->isMethod('post') || $request->isMethod('put') || $request->isMethod('patch')) {
            $input = $request->except('_token');

            $html_event_attributes = [
                'onload','onunload','onclick','ondblclick','onmousedown','onmouseup',
                'onmouseover','onmousemove','onmouseout','onkeypress','onkeydown',
                'onkeyup','onfocus','onblur','onsubmit','onreset','onchange',
                'onselect','oninput','oncontextmenu'
            ];

            array_walk_recursive($input, function (&$value) use ($html_event_attributes) {
                $value = strip_tags(
                    str_replace(['&lt;', '&gt;'], '', $value),
                    '<span><p><a><b><i><u><strong><br><hr><table><tr><th><td><ul><ol><li>'
                    .'<h1><h2><h3><h4><h5><h6><del><ins><sup><sub><pre><address>'
                    .'<img><figure><embed><iframe><video><style>'
                );

                foreach ($html_event_attributes as $attribute) {
                    $value = preg_replace('/\s*' . $attribute . '\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]*)/i', '', $value);
                }

                $value = Purifier::clean($value, 'default');
            });


            $request->merge($input);
        }

        return $next($request);
    }
}
