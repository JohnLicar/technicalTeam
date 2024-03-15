<?php

namespace App\Http\Middleware;

use App\Enums\ApprovalStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isApprove
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->hasRole('admin')) {

            if (!(auth()->user()->is_approve == ApprovalStatus::APPROVED->value)) {
                auth()->logout();
                return redirect()->back()->with('message', 'Your account needs Admin Approval');
            }
        }
        return $next($request);
    }
}
