@extends('layouts.landing')

@section('title', 'Best URL Shortener for TikTok Bio')
@section('description', 'Optimize your TikTok bio link. Create clean, trackable, and branded links for your TikTok profile for free.')

@section('content')
    @verbatim
        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "SoftwareApplication",
              "name": "PureLnk TikTok Link Optimizer",
              "operatingSystem": "All",
              "applicationCategory": "UtilitiesApplication",
              "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.8",
                "ratingCount": "215"
              },
              "offers": {
                "@type": "Offer",
                "price": "0",
                "priceCurrency": "USD"
              }
            }
        </script>

        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "FAQPage",
              "mainEntity": [{
                "@type": "Question",
                "name": "How do I add a clickable link to my TikTok bio?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "To add a clickable link to your TikTok bio, you typically need a Business Account or at least 1,000 followers. Once eligible, shorten your URL with PureLnk, go to 'Edit Profile' on TikTok, and paste it into the Website field."
                }
              }, {
                "@type": "Question",
                "name": "Is PureLnk safe for TikTok creators?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "Yes, PureLnk is 100% safe. We use high-reputation, secure domains that are fully compliant with TikTok's community guidelines, ensuring your account and followers are protected."
                }
              }, {
                "@type": "Question",
                "name": "Can I track how many people click my TikTok bio link?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "Absolutely! PureLnk provides real-time analytics for your TikTok links, showing you total clicks, geographic location of your audience, and device types."
                }
              }]
            }
        </script>

        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "BreadcrumbList",
              "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "PureLnk",
                "item": "https://purelnk.com"
              },{
                "@type": "ListItem",
                "position": 2,
                "name": "Tools",
                "item": "https://purelnk.com/tools"
              },{
                "@type": "ListItem",
                "position": 3,
                "name": "TikTok Bio Shortener",
                "item": "https://purelnk.com/tiktok-link-shortener"
              }]
            }
        </script>

    @endverbatim

    <section class="py-20 md:py-32 px-6 text-center bg-slate-900 text-white">
        <h1 class="text-5xl font-extrabold mb-6">Level Up Your <span class="text-cyan-400">TikTok Bio</span> Link</h1>
        <p class="text-xl text-slate-300 mb-10 max-w-2xl mx-auto">
            Stop losing followers with messy URLs. Use PureLnk to create professional, branded links that drive more traffic from your videos.
        </p>
        <div class="mb-12">
            <a href="/register" class="inline-block text-xl bg-cyan-500 text-white px-8 py-4 rounded-full font-bold hover:bg-cyan-600 transition shadow-lg">
                Create Your TikTok Link
            </a>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6 prose prose-slate lg:prose-xl">
            <h2 class="text-3xl font-bold mb-8 text-center text-slate-900">Why TikTok Creators Choose PureLnk</h2>
            <p>
                TikTok is all about speed and engagement. When a viewer visits your profile, you only have seconds to convert them. A <b>branded short link</b> builds instant trust.
            </p>

            <div class="grid md:grid-cols-2 gap-8 my-12 not-prose">
                <div class="p-6 border border-slate-100 rounded-xl bg-slate-50">
                    <h4 class="font-bold mb-2">Mobile Optimized</h4>
                    <p class="text-sm text-slate-600">Our links load instantly, ensuring you don't lose mobile traffic from the TikTok app.</p>
                </div>
                <div class="p-6 border border-slate-100 rounded-xl bg-slate-50">
                    <h4 class="font-bold mb-2">Viral Analytics</h4>
                    <p class="text-sm text-slate-600">Track which video caused a spike in clicks with real-time reporting.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-6 prose prose-slate lg:prose-xl">
            <h2 class="text-3xl font-bold mb-6">How to Add a Short Link to Your TikTok Bio (Step-by-Step)</h2>
            <p>
                Many creators struggle with the "link in bio" feature. To add your PureLnk URL, you typically need a Business Account or at least 1,000 followers. Here is how to optimize your profile:
            </p>
            <ol>
                <li><b>Create your link:</b> Shorten your destination URL using the PureLnk dashboard.</li>
                <li><b>Copy the alias:</b> Use something catchy like <i>purelnk.com/join-me</i>.</li>
                <li><b>Edit Profile:</b> Open TikTok, go to "Edit Profile", and paste the URL into the "Website" field.</li>
            </ol>

            <h3 class="text-2xl font-bold mt-12 mb-6">The Importance of Branded URLs for Influencers</h3>
            <p>
                In the world of viral trends, <b>brand consistency</b> is everything. Using a generic link shortener makes your profile look like a bot. A custom PureLnk alias helps in several ways:
            </p>
            <ul>
                <li><b>Trust Factor:</b> Users are 3x more likely to click a link that looks safe and professional.</li>
                <li><b>Memory:</b> If a user sees your link in a video caption, a short branded URL is easier to remember and type manually.</li>
                <li><b>Analytics:</b> Unlike TikTok's native stats, PureLnk gives you granular data on <i>who</i> clicked and <i>from where</i>.</li>
            </ul>

            <div class="bg-blue-50 p-8 rounded-2xl my-10 not-prose">
                <h4 class="text-xl font-bold text-blue-900 mb-4">Pro Tip for Viral Creators</h4>
                <p class="text-blue-800">
                    Always use a unique link for each campaign. If you have a video going viral today, create a specific alias like <i>purelnk.com/friday-sale</i> to track exactly how much revenue that single video generated.
                </p>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-12 text-center">TikTok Link FAQ</h2>
            <div class="space-y-8">
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h4 class="font-bold text-lg mb-2">Why can't I click my link in TikTok bio?</h4>
                    <p class="text-slate-600">TikTok requires some accounts to have 1,000 followers or a registered Business Account to enable clickable links. If your link isn't clickable, try switching to a Business Account in settings.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h4 class="font-bold text-lg mb-2">Is PureLnk safe for my TikTok account?</h4>
                    <p class="text-slate-600">Absolutely. We use secure HTTPS encryption and our domains are white-listed by major social platforms, ensuring your account remains in good standing.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h4 class="font-bold text-lg mb-2">Can I track clicks from different countries?</h4>
                    <p class="text-slate-600">Yes! Our real-time dashboard shows you exactly which countries your fans are coming from, helping you time your posts for maximum reach.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-900 text-white text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-4xl font-extrabold mb-6">Ready to go viral?</h2>
            <p class="text-xl text-slate-300 mb-10">
                Join thousands of TikTok creators who trust PureLnk to manage their bio links and track their growth. It takes less than 2 minutes.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="/register" class="w-full sm:w-auto text-xl bg-cyan-500 text-white px-10 py-4 rounded-full font-bold hover:bg-cyan-600 transition shadow-xl transform hover:scale-105">
                    Get Started for Free
                </a>
                <a href="/login" class="text-slate-400 hover:text-white transition font-medium">
                    Already have an account? Log in
                </a>
            </div>
            <p class="mt-8 text-sm text-slate-500">
                No credit card required. Instant setup.
            </p>
        </div>
    </section>
@endsection
