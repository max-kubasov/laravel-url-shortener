@extends('layouts.landing')

@section('title', 'URL Shortener for Instagram Bio')
@section('description', 'Create beautiful branded links for your Instagram profile with PureLnk. Track every click for free.')

@section('content')
    @verbatim
        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "SoftwareApplication",
              "name": "PureLnk URL Shortener",
              "operatingSystem": "All",
              "applicationCategory": "UtilitiesApplication",
              "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.9",
                "ratingCount": "184"
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
                "name": "Can I use PureLnk for free for my Instagram bio?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "Yes, PureLnk offers a robust free tier that allows you to create branded short links for Instagram and track your analytics at no cost."
                }
              }, {
                "@type": "Question",
                "name": "Will Instagram block my PureLnk links?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "No. PureLnk uses high-reputation domains that are fully compliant with Instagram’s community guidelines."
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
                "name": "Instagram Bio Link",
                "item": "https://purelnk.com/instagram-bio-link"
              }]
            }
        </script>
    @endverbatim

    <section class="py-20 md:py-32 px-6 text-center bg-gradient-to-b from-white to-slate-50">
        <h1 class="text-5xl font-extrabold mb-6">The Best URL Shortener for <span class="text-pink-600">Instagram Bio</span></h1>
        <p class="text-xl text-slate-600 mb-10 max-w-2xl mx-auto">
            Don't let long, ugly links ruin your Instagram aesthetic. Use PureLnk to create clean, branded links that followers want to click.
        </p>
        <div class="mb-12">
            <a href="/register" class="inline-block text-xl bg-blue-600 text-white px-8 py-4 rounded-full font-bold hover:bg-blue-700 transition shadow-lg">
                Create Your Instagram Link
            </a>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6 prose prose-slate lg:prose-xl">
            <h2 class="text-3xl font-bold mb-8 text-center">Master Your Instagram Marketing with Branded Links</h2>
            <p>
                Instagram only gives you <b>one single link</b> in your bio. That’s why every character counts. Using a generic URL shortener might save space, but it lacks the trust and branding that <b>PureLnk</b> provides.
            </p>

            <h3>Boost Your Click-Through Rate (CTR)</h3>
            <p>
                Studies show that branded links—URLs that include your brand name—can increase click-through rates by up to <b>34%</b>. When your followers see <i>purelnk.com/your-brand</i> instead of a mess of random letters, they feel secure and more likely to engage with your content.
            </p>

            <ul class="space-y-4">
                <li><b>Custom Aliases:</b> Total control over your link appearance.</li>
                <li><b>Real-time Analytics:</b> Track location, device type, and referral data for every click.</li>
                <li><b>No Link Rot:</b> Update the destination URL anytime without changing your Instagram bio.</li>
            </ul>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-12 text-center">Frequently Asked Questions</h2>
            <div class="grid gap-8 md:grid-cols-2">
                <div>
                    <h4 class="font-bold text-lg mb-2">Can I use PureLnk for free?</h4>
                    <p class="text-slate-600">Yes! PureLnk offers a robust free tier that allows you to shorten links and track basic analytics.</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-2">Will Instagram ban my links?</h4>
                    <p class="text-slate-600">No. PureLnk uses high-reputation domains that are compliant with Instagram’s community guidelines.</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-2">How do I change my bio link?</h4>
                    <p class="text-slate-600">Simply go to your PureLnk dashboard, edit the destination URL, and it updates instantly everywhere.</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-2">Are the links permanent?</h4>
                    <p class="text-slate-600">As long as your account is active, your links will stay live and redirecting.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 text-center">
        <h2 class="text-3xl font-bold mb-6">Ready to upgrade your Bio Link?</h2>
        <a href="/register" class="text-blue-600 font-bold hover:underline text-xl">Get started with PureLnk for free &rarr;</a>
    </section>
@endsection
