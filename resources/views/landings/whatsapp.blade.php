@extends('layouts.landing')

@section('title', 'WhatsApp Link Generator | Create Direct Chat Links | PureLnk')
@section('description', 'Generate free WhatsApp click-to-chat links with custom messages. Perfect for business, ads, and Instagram bio.')

@section('content')
    @verbatim
        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "SoftwareApplication",
              "name": "PureLnk WhatsApp Link Generator",
              "operatingSystem": "All",
              "applicationCategory": "UtilitiesApplication",
              "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.9",
                "ratingCount": "312"
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
                "name": "Is the WhatsApp link generator free?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "Yes, PureLnk provides a completely free WhatsApp link generator. You can create unlimited chat links with custom messages without any hidden fees."
                }
              }, {
                "@type": "Question",
                "name": "How do I create a WhatsApp link with a pre-filled message?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "Simply enter your phone number in international format, type your desired message in the text field, and click 'Generate'. Our tool will create a custom wa.me link for you."
                }
              }, {
                "@type": "Question",
                "name": "Can I track how many people clicked my WhatsApp link?",
                "acceptedAnswer": {
                  "@type": "Answer",
                  "text": "By default, standard wa.me links don't show analytics. However, if you shorten your generated link using PureLnk, you will get detailed click statistics and geographic data."
                }
              }]
            }
        </script>
    @endverbatim

    <section class="py-20 bg-green-50">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-6">
                WhatsApp <span class="text-green-600">Link Generator</span>
            </h1>
            <p class="text-lg text-slate-600 mb-12">
                Create a free link so your customers can message you instantly without saving your number.
            </p>

            <div class="bg-white p-8 rounded-3xl shadow-xl border border-green-100 text-left">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Your Phone Number (with country code)</label>
                        <input type="text" id="wa-phone" placeholder="e.g. 1234567890"
                               class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-green-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Custom Welcome Message (Optional)</label>
                        <textarea id="wa-message" rows="3" placeholder="Hi! I'm interested in your services..."
                                  class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-green-500 outline-none transition"></textarea>
                    </div>
                    <button onclick="generateWALink()" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-xl transition shadow-lg shadow-green-200">
                        Generate My WhatsApp Link
                    </button>
                </div>

                <div id="wa-result" class="mt-8 pt-8 border-t border-slate-100 hidden">
                    <p class="text-sm font-bold text-slate-500 mb-3 uppercase">Your WhatsApp Link:</p>
                    <div class="flex items-center bg-slate-50 p-3 rounded-xl border border-slate-200">
                        <input type="text" id="wa-url" readonly class="bg-transparent text-green-700 font-mono text-sm w-full outline-none">
                        <button onclick="copyWA()" class="ml-4 text-green-600 font-bold text-sm hover:text-green-800">Copy</button>
                    </div>
                    <p class="mt-4 text-xs text-slate-400 text-center italic">Tip: Now shorten this link with PureLnk to track clicks!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-12 text-slate-900">3 Steps to start chatting</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="relative">
                    <div class="text-5xl font-black text-green-100 absolute -top-8 left-1/2 -translate-x-1/2">01</div>
                    <h4 class="font-bold text-xl mb-2 relative">Enter Number</h4>
                    <p class="text-slate-500 text-sm">Add your phone with country code (e.g. 1541...)</p>
                </div>
                <div class="relative">
                    <div class="text-5xl font-black text-green-100 absolute -top-8 left-1/2 -translate-x-1/2">02</div>
                    <h4 class="font-bold text-xl mb-2 relative">Write Message</h4>
                    <p class="text-slate-500 text-sm">Type a greeting text for your customers.</p>
                </div>
                <div class="relative">
                    <div class="text-5xl font-black text-green-100 absolute -top-8 left-1/2 -translate-x-1/2">03</div>
                    <h4 class="font-bold text-xl mb-2 relative">Shorten & Share</h4>
                    <p class="text-slate-500 text-sm">Shorten it with PureLnk to get stats and a clean look.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-slate-900 mb-12">Who is this for?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100 hover:border-green-300 transition-colors">
                    <div class="text-3xl mb-4">🛒</div>
                    <h4 class="font-bold text-xl mb-3 text-slate-900">For E-commerce</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">Let customers ask about product availability or shipping details in one click directly from your product pages.</p>
                </div>
                <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100 hover:border-green-300 transition-colors">
                    <div class="text-3xl mb-4">🧠</div>
                    <h4 class="font-bold text-xl mb-3 text-slate-900">For Coaches & Experts</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">Book consultation calls and answer student questions directly through WhatsApp to build high-ticket trust.</p>
                </div>
                <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100 hover:border-green-300 transition-colors">
                    <div class="text-3xl mb-4">🚀</div>
                    <h4 class="font-bold text-xl mb-3 text-slate-900">For Digital Ads</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">Use these links in Facebook or Instagram Ads to start direct sales conversations with a warm audience.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-900 text-white overflow-hidden">
        <div class="max-w-4xl mx-auto px-6">
            <div class="flex justify-center mb-8">
                <div class="inline-flex items-center bg-slate-800 px-4 py-2 rounded-full border border-slate-700">
                <span class="flex -space-x-2 mr-3">
                    <div class="w-6 h-6 rounded-full bg-green-500 border-2 border-slate-800"></div>
                    <div class="w-6 h-6 rounded-full bg-blue-500 border-2 border-slate-800"></div>
                    <div class="w-6 h-6 rounded-full bg-purple-500 border-2 border-slate-800"></div>
                </span>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-300">Join 5,000+ businesses using PureLnk</span>
                </div>
            </div>

            <h2 class="text-3xl font-bold text-center mb-12">Standard link vs <span class="text-green-400">PureLnk</span></h2>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="border-b border-slate-800">
                        <th class="py-4 px-6 text-slate-400 font-medium">Feature</th>
                        <th class="py-4 px-6 text-slate-400 font-medium">Standard wa.me</th>
                        <th class="py-4 px-6 text-green-400 font-bold">PureLnk WhatsApp</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                    <tr>
                        <td class="py-5 px-6 font-medium text-slate-300">Link Look</td>
                        <td class="py-5 px-6 text-slate-500">Long & Ugly</td>
                        <td class="py-5 px-6 text-white font-semibold">Branded & Short</td>
                    </tr>
                    <tr>
                        <td class="py-5 px-6 font-medium text-slate-300">Analytics</td>
                        <td class="py-5 px-6 text-slate-500">None</td>
                        <td class="py-5 px-6 text-white font-semibold">Real-time Clicks</td>
                    </tr>
                    <tr>
                        <td class="py-5 px-6 font-medium text-slate-300">Editing</td>
                        <td class="py-5 px-6 text-slate-500">Can't change</td>
                        <td class="py-5 px-6 text-white font-semibold">Update anytime</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-12 text-center">
                <a href="/register" class="inline-block bg-green-500 hover:bg-green-400 text-slate-900 font-extrabold px-10 py-4 rounded-2xl transition-all transform hover:scale-105">
                    Get Started for Free
                </a>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-slate-900 mb-8 text-center">Why use WhatsApp Links?</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="p-6 bg-slate-50 rounded-2xl">
                    <h3 class="font-bold text-lg mb-2">Boost Conversions</h3>
                    <p class="text-slate-600 text-sm">Remove friction. Customers don't need to save your number; they just click and chat.</p>
                </div>
                <div class="p-6 bg-slate-50 rounded-2xl">
                    <h3 class="font-bold text-lg mb-2">Pre-filled Messages</h3>
                    <p class="text-slate-600 text-sm">Know exactly what the customer wants by setting a default message for them.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-slate-50">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-slate-900 mb-8 text-center">Frequently Asked Questions</h2>
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h3 class="font-bold text-lg text-slate-900 mb-2">Why should I use a WhatsApp link instead of just a phone number?</h3>
                    <p class="text-slate-600">A link is clickable. Instead of forcing a customer to manually save your number and search for you in WhatsApp, they can start a conversation with one tap. This significantly reduces friction and increases your conversion rate.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h3 class="font-bold text-lg text-slate-900 mb-2">What is the correct phone number format?</h3>
                    <p class="text-slate-600">You should use the full international format without any plus signs, zeros, or brackets. For example, use 1234567890 instead of +1 (234) 567-890.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h3 class="font-bold text-lg text-slate-900 mb-2">Can I use these links on Instagram and TikTok?</h3>
                    <p class="text-slate-600">Absolutely! These links are perfect for your "Link in Bio". To make them look more professional and branded, we recommend shortening them with PureLnk after generation.</p>
                </div>
            </div>
        </div>
    </section>

    @verbatim
        <script>
            function generateWALink() {
                const phone = document.getElementById('wa-phone').value.replace(/\D/g,'');
                const message = encodeURIComponent(document.getElementById('wa-message').value);

                if(!phone) { alert('Please enter a phone number'); return; }

                const url = `https://wa.me/${phone}${message ? '?text=' + message : ''}`;
                document.getElementById('wa-url').value = url;
                document.getElementById('wa-result').classList.remove('hidden');
            }

            function copyWA() {
                const copyText = document.getElementById("wa-url");
                copyText.select();
                document.execCommand("copy");
                alert("Link copied!");
            }
        </script>
    @endverbatim
@endsection
