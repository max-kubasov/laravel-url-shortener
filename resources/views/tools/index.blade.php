@extends('layouts.landing')

@section('title', 'Marketing Tools & URL Shortener Solutions | PureLnk')
@section('description', 'Explore our specialized tools for Instagram, TikTok, WhatsApp, and more. Optimize your links for every platform.')

@section('content')
    <section class="py-20 bg-slate-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-slate-900">Digital Marketing <span class="text-blue-600">Power Tools</span></h1>
                <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                    Everything you need to manage, track, and optimize your links across the entire digital landscape.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <a href="/instagram-bio-link" class="group bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 bg-pink-100 text-pink-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-pink-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900">Instagram Bio Link</h3>
                    <p class="text-slate-600 mb-4">Branded short links optimized for your Instagram profile to boost your CTR by 34%.</p>
                    <span class="text-blue-600 font-semibold group-hover:underline">Explore Solution &rarr;</span>
                </a>

                <a href="/tiktok-link-shortener" class="group bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 bg-slate-100 text-slate-900 rounded-lg flex items-center justify-center mb-6 group-hover:bg-slate-900 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.17-2.89-.6-4.13-1.47V13.3c0 1.93-.32 3.93-1.5 5.45-1.22 1.58-3.23 2.45-5.22 2.3-2.02-.15-3.95-1.34-4.85-3.15-.96-1.92-.72-4.39.6-6.07 1.12-1.42 2.96-2.18 4.75-1.95v4.03c-.93-.11-1.93.18-2.58.87-.61.64-.81 1.6-.5 2.46.3.83 1.18 1.4 2.06 1.34.88-.06 1.68-.73 1.83-1.6.04-.26.04-12.65.04-12.65z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900">TikTok Optimizer</h3>
                    <p class="text-slate-600 mb-4">Clean, professional links for creators. Track viral growth with real-time mobile analytics.</p>
                    <span class="text-blue-600 font-semibold group-hover:underline">Explore Solution &rarr;</span>
                </a>

                <a href="/whatsapp-link-generator" class="group bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition duration-300 opacity-75 grayscale hover:grayscale-0 transition">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-green-600 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.67-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900">WhatsApp Marketing</h3>
                    <p class="text-slate-600 mb-4">Create direct chat links with pre-filled messages to convert leads instantly on mobile.</p>
                    <span class="text-blue-600 font-semibold group-hover:underline text-sm uppercase tracking-wider">Coming Soon</span>
                </a>

            </div>
        </div>
    </section>
@endsection
