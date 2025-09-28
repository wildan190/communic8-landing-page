<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = $request->fullUrl();
        $sessionId = $request->session()->getId();
        $today = now()->toDateString();

        // Coba cari model Blog berdasarkan slug dari route
        $blog = $request->route('blog');

        // Cek apakah sudah ada view untuk sesi dan URL ini hari ini
        $existingView = PageView::where('session_id', $sessionId)
            ->where('url', $url)
            ->where('visited_at', $today)
            ->first();

        if (!$existingView) {
            $data = [
                'url' => $url,
                'session_id' => $sessionId,
                'visited_at' => $today,
            ];

            if ($blog instanceof \App\Models\Blog) {
                $data['visitable_id'] = $blog->id;
                $data['visitable_type'] = \App\Models\Blog::class;
            }

            PageView::create($data);
        }

        return $next($request);
    }
}