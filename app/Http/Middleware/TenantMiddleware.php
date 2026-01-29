<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the subdomain from the host
        $host = $request->getHost();
        $subdomain = $this->getSubdomainFromHost($host);

        if ($subdomain) {
            // Find the tenant by subdomain
            $tenant = Tenant::where('subdomain', $subdomain)->first();
            
            if ($tenant) {
                // Store the tenant in the session or request
                Session::put('current_tenant', $tenant->id);
                $request->attributes->set('current_tenant', $tenant);
                
                // Set the tenant context globally if needed
                app()->bind('current_tenant', function () use ($tenant) {
                    return $tenant;
                });
            } else {
                // If tenant doesn't exist, return 404 or redirect to main site
                abort(404, 'Tenant not found');
            }
        }

        return $next($request);
    }

    /**
     * Extract subdomain from host
     */
    private function getSubdomainFromHost(string $host): ?string
    {
        $mainDomain = parse_url(config('app.url'), PHP_URL_HOST);
        
        if ($host === $mainDomain || $host === 'localhost') {
            return null; // No subdomain
        }

        // Extract subdomain
        $hostParts = explode('.', $host);
        $mainDomainParts = explode('.', $mainDomain);
        
        // If main domain has 2 parts (e.g., example.com), subdomain is the first part
        // If main domain has 3 parts (e.g., www.example.com), subdomain is the first part
        $mainDomainLength = count($mainDomainParts);
        
        if (count($hostParts) > $mainDomainLength) {
            return $hostParts[0];
        }

        return null;
    }
}
