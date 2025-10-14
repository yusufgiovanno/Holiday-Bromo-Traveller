{{--
  Template Name: Home Page
  Template Post Type: page
--}}

@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="max-w-[1440px] mx-auto px-4 mt-8">
        <div class="bg-green-900/25 rounded-lg p-6 md:p-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex items-center justify-center">
                    <div>
                        <h1 class="text-4xl font-bold text-white leading-tight">Sunrise at Mount Bromo — Yours, personalized
                        </h1>
                        <h6 class="mt-4 text-white text-lg">Choose the pace, activities, and comforts. Local guides, private
                            jeeps, and unforgettable sunrise moments.</h6>
                        <div class="flex flex-col sm:flex-row gap-3 mt-8 mb-6">
                            <button class="bg-[#A67C52] text-white px-5 py-3 rounded-md w-full sm:w-auto">Book Your
                                Trip</button>
                            <button class="bg-gray-600 text-white px-5 py-3 rounded-md w-full sm:w-auto">View
                                Gallery</button>
                        </div>
                        <div class="text-sm text-gray-200">Popular: 1-day sunrise • 2-day trekking • Photography tours</div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6">
                    <h5 class="font-semibold mb-1">Build your trip — quick planner</h5>
                    <p class="font-light text-gray-500 text-sm mb-4">Tell us what you like and we'll suggest a tailored
                        plan.</p>
                    <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block mb-1 text-sm font-medium">Travel Date</label>
                            <input type="date" class="w-full rounded-md border border-gray-300 p-2 text-sm" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium">Duration</label>
                            <select class="w-full rounded-md border border-gray-300 p-2 text-sm">
                                <option>1 Day</option>
                                <option>2 Days</option>
                                <option>2+ Days</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium">Group Size</label>
                            <select class="w-full rounded-md border border-gray-300 p-2 text-sm">
                                <option>Solo</option>
                                <option>Couple</option>
                                <option>Small Group (3-6)</option>
                                <option>Private Group (7+)</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-1 text-sm font-medium">E-mail Address</label>
                            <input type="email" placeholder="Your e-mail address here..."
                                class="w-full rounded-md border border-gray-300 p-2 text-sm" />
                            <button type="button"
                                class="bg-[#4E8D7C] text-white rounded-md px-4 py-2 mt-3 float-right text-sm">Get
                                Offer</button>
                        </div>
                    </form>
                    <p class="mt-3 text-gray-500 text-sm font-light">No commitment — we’ll send a custom plan and price.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Cards -->
    <section class="max-w-[1440px] mx-auto px-4 mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="border rounded-lg p-4 shadow-sm">
            <h6 class="font-bold mb-2"><i class="bi bi-tree"></i> Local guides</h6>
            <p class="font-light text-gray-600">Certified guides who know the best sunrise spots and photo angles.</p>
        </div>
        <div class="border rounded-lg p-4 shadow-sm">
            <h6 class="font-bold mb-2"><i class="bi bi-tree"></i> Private jeeps</h6>
            <p class="font-light text-gray-600">Comfort and safety with experienced drivers, door-to-door pickup.</p>
        </div>
        <div class="border rounded-lg p-4 shadow-sm">
            <h6 class="font-bold mb-2"><i class="bi bi-tree"></i> Flexible Plans</h6>
            <p class="font-light text-gray-600">Change activities, pace, or add extras like horseback rides or photoshoots.
            </p>
        </div>
    </section>

    <!-- News Section -->
    <section class="max-w-[1440px] mx-auto px-4 mt-12">
        <h4 class="font-bold mb-4">Latest News</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @php
            $latest_posts = get_posts([
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ]);
            @endphp

            @foreach ($latest_posts as $post)
            @php setup_postdata($post); @endphp

            <div class="border rounded-lg overflow-hidden flex flex-col">
                @if (has_post_thumbnail($post->ID))
                {!! get_the_post_thumbnail($post->ID, 'medium_large', ['class' => 'h-40 w-full object-cover']) !!}
                @else
                <img src="{{ asset('images/placeholder.jpg') }}" class="h-40 w-full object-cover" alt="Placeholder">
                @endif

                <div class="p-4 flex flex-col flex-grow">
                <p class="font-bold">{{ get_the_title($post->ID) }}</p>
                <p class="text-sm text-gray-600 flex-grow">
                    {{ get_the_excerpt($post->ID) }}
                </p>
                <div class="text-right mt-2">
                    <a href="{{ get_permalink($post->ID) }}" class="text-[#4E8D7C] hover:underline text-sm">
                    Read more
                    </a>
                </div>
                </div>
            </div>
            @endforeach

            @php wp_reset_postdata(); @endphp
        </div>
    </section>


    <!-- How it Works -->
    <section class="max-w-[1440px] mx-auto px-4 mt-12 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <h4 class="font-bold mb-4">How It Works</h4>
            <div class="space-y-4">
                <div class="flex">
                    <div
                        class="w-10 h-10 rounded-full bg-[#4E8D7C] text-white flex items-center justify-center font-bold mr-3">
                        1</div>
                    <div>
                        <div class="font-semibold">Tell us your preferences</div>
                        <div class="text-gray-500 text-sm">Dates, activity level, interests, budget.</div>
                    </div>
                </div>
                <div class="flex">
                    <div
                        class="w-10 h-10 rounded-full bg-[#4E8D7C] text-white flex items-center justify-center font-bold mr-3">
                        2</div>
                    <div>
                        <div class="font-semibold">Receive a tailored plan</div>
                        <div class="text-gray-500 text-sm">Itinerary, vehicles, guide, and transparent pricing.</div>
                    </div>
                </div>
                <div class="flex">
                    <div
                        class="w-10 h-10 rounded-full bg-[#4E8D7C] text-white flex items-center justify-center font-bold mr-3">
                        3</div>
                    <div>
                        <div class="font-semibold">Confirm & enjoy</div>
                        <div class="text-gray-500 text-sm">Pay deposit, we handle the rest — focus on the view.</div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="border rounded-lg p-4 shadow-sm">
                <h6 class="font-bold mb-1">Need a help?</h6>
                <p class="font-light text-gray-600 text-sm mb-4">Chat with our customer service and get a personalized
                    plan:</p>
                <a href="https://wa.me/628819859543"
                    class="bg-green-600 hover:bg-green-700 text-white w-full py-2 rounded-md flex justify-center items-center gap-2">
                    <i class="bi bi-whatsapp text-lg"></i> WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="max-w-[1440px] mx-auto px-4 mt-12">
        <h4 class="font-bold mb-4">What travelers say</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="border rounded-lg p-4 flex flex-col justify-between h-full">
                <p class="font-semibold">"Absolutely breathtaking sunrise. The guide took us to a quieter viewpoint and we
                    had the best photos."</p>
                <p class="text-gray-500 text-sm text-right mt-4">— Vanno, Indonesia</p>
            </div>
            <div class="border rounded-lg p-4 flex flex-col justify-between h-full">
                <p class="font-semibold">"Private jeep made everything easy. Highly recommended for photographers."</p>
                <p class="text-gray-500 text-sm text-right mt-4">— John Doe, Canada</p>
            </div>
            <div class="border rounded-lg p-4 flex flex-col justify-between h-full">
                <p class="font-semibold">"Flexible plan, great local food, and a very knowledgeable guide."</p>
                <p class="text-gray-500 text-sm text-right mt-4">— Jane Doe, Belgium</p>
            </div>
        </div>
    </section>

  
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const menu = document.getElementById('menu');
        menuBtn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
@endsection
