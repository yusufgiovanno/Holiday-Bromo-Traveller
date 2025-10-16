{{--
  Template Name: Home Page
  Template Post Type: page
--}}

@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <section class="max-w-[1440px] mx-auto py-16">
        <div class="relative overflow-hidden rounded-xl">
            <div 
            class="absolute inset-0 bg-cover bg-center opacity-40 z-0" 
            style="background-image: url('{{ asset('assets/mount-CoiR9lrY.png') }}');">
            </div>

            <div class="relative bg-green-900/40 backdrop-blur-sm rounded-xl p-6 md:p-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                
                <header class="text-center md:text-left text-white space-y-4">
                <h1 class="text-4xl font-bold leading-tight">Sunrise at Mount Bromo — Yours, personalized</h1>
                <h6 class="text-lg font-light">
                    Choose the pace, activities, and comforts. Local guides, private jeeps, and unforgettable sunrise moments.
                </h6>
                <div class="flex flex-col sm:flex-row gap-3 mt-6 justify-center md:justify-start">
                    <button class="bg-[#4E8D7C] hover:bg-[#3D7465] text-white px-6 py-3 rounded-md w-full sm:w-auto transition">Book Your Trip</button>
                    <button class="bg-gray-700 hover:bg-gray-600 text-white px-6 py-3 rounded-md w-full sm:w-auto transition">View Gallery</button>
                </div>
                <p class="text-sm text-gray-200">Popular: 1-day sunrise • 2-day trekking • Photography tours</p>
                </header>

                <form id="planner-form" class="bg-white rounded-2xl p-6 shadow-lg space-y-4">
                <div>
                    <h5 class="font-semibold mb-1">Build your trip — quick planner</h5>
                    <p class="font-light text-gray-500 text-sm mb-4">
                    Tell us what you like and we'll suggest a tailored plan.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-2">
                    <label class="block mb-1 text-sm font-medium">Travel Date</label>
                    <input type="date" class="w-full rounded-md border border-gray-300 p-2 text-sm focus:ring-[#4E8D7C]" />
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
                        <option>Small Group (3–6)</option>
                        <option>Private Group (7+)</option>
                    </select>
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-1 text-sm font-medium">WhatsApp Number</label>
                        <div class="flex rounded-md border border-gray-300 focus-within:ring-1 focus-within:ring-[#4E8D7C] overflow-hidden">
                        <span class="bg-gray-100 text-gray-600 text-sm px-3 flex items-center">+62</span>
                        <input
                            type="tel"
                            placeholder="812-3456-7890"
                            class="w-full p-2 text-sm focus:outline-none"
                        />
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Start with your country code (e.g., +62 for Indonesia)</p>
                    </div>
                    <div class="col-span-2">
                    <label class="block mb-1 text-sm font-medium">E-mail Address</label>
                    <input type="email" placeholder="Your e-mail address here..."
                        class="w-full rounded-md border border-gray-300 p-2 text-sm focus:ring-[#4E8D7C]" />
                    <button type="submit"
                        class="bg-[#4E8D7C] hover:bg-[#3D7465] text-white rounded-md px-4 py-2 mt-3 float-right text-sm transition">
                        See My Plan
                    </button>
                    </div>
                </div>

                <p class="mt-3 text-gray-500 text-sm font-light">
                    No commitment — we'll send a custom plan and price.
                </p>
                </form>

            </div>
            </div>
        </div>
    </section>

    <section class="max-w-[1440px] mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 py-16">
        <div class="bg-gradient-to-br from-[#4E8D7C]/5 to-[#4E8D7C]/10 border-l-4 border-[#4E8D7C] rounded-lg p-6 shadow-md hover:shadow-xl transition-shadow">
            <div class="w-12 h-12 rounded-full bg-[#4E8D7C] flex items-center justify-center mb-4">
                <i class="bi bi-people text-white text-2xl"></i>
            </div>
            <h6 class="font-bold mb-3 text-lg text-gray-800">Local Guides</h6>
            <p class="font-light text-gray-600 leading-relaxed">Certified guides who know the best sunrise spots and photo angles.</p>
        </div>
        <div class="bg-gradient-to-br from-[#4E8D7C]/5 to-[#4E8D7C]/10 border-l-4 border-[#4E8D7C] rounded-lg p-6 shadow-md hover:shadow-xl transition-shadow">
            <div class="w-12 h-12 rounded-full bg-[#4E8D7C] flex items-center justify-center mb-4">
                <i class="bi bi-truck text-white text-2xl"></i>
            </div>
            <h6 class="font-bold mb-3 text-lg text-gray-800">Private Jeeps</h6>
            <p class="font-light text-gray-600 leading-relaxed">Comfort and safety with experienced drivers, door-to-door pickup.</p>
        </div>
        <div class="bg-gradient-to-br from-[#4E8D7C]/5 to-[#4E8D7C]/10 border-l-4 border-[#4E8D7C] rounded-lg p-6 shadow-md hover:shadow-xl transition-shadow">
            <div class="w-12 h-12 rounded-full bg-[#4E8D7C] flex items-center justify-center mb-4">
                <i class="bi bi-calendar-check text-white text-2xl"></i>
            </div>
            <h6 class="font-bold mb-3 text-lg text-gray-800">Flexible Plans</h6>
            <p class="font-light text-gray-600 leading-relaxed">Change activities, pace, or add extras like horseback rides or photoshoots.</p>
        </div>
    </section>

    <section class="max-w-[1440px] mx-auto py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-8">
                <h4 class="font-bold text-2xl mb-6 text-gray-800">How It Works</h4>
                <div class="space-y-6">
                    <div class="flex items-start group">
                        <div class="w-12 h-12 rounded-full bg-[#4E8D7C] text-white flex items-center justify-center font-bold mr-4 group-hover:scale-110 transition-transform flex-shrink-0">
                            1
                        </div>
                        <div>
                            <div class="font-semibold text-lg text-gray-800 mb-1">Tell us your preferences</div>
                            <div class="text-gray-600">Dates, activity level, interests, budget.</div>
                        </div>
                    </div>
                    <div class="flex items-start group">
                        <div class="w-12 h-12 rounded-full bg-[#4E8D7C] text-white flex items-center justify-center font-bold mr-4 group-hover:scale-110 transition-transform flex-shrink-0">
                            2
                        </div>
                        <div>
                            <div class="font-semibold text-lg text-gray-800 mb-1">Receive a tailored plan</div>
                            <div class="text-gray-600">Itinerary, vehicles, guide, and transparent pricing.</div>
                        </div>
                    </div>
                    <div class="flex items-start group">
                        <div class="w-12 h-12 rounded-full bg-[#4E8D7C] text-white flex items-center justify-center font-bold mr-4 group-hover:scale-110 transition-transform flex-shrink-0">
                            3
                        </div>
                        <div>
                            <div class="font-semibold text-lg text-gray-800 mb-1">Confirm & enjoy</div>
                            <div class="text-gray-600">Pay deposit, we handle the rest — focus on the view.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] rounded-xl p-8 shadow-lg text-white">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <i class="bi bi-headset text-4xl text-black"></i>
                    </div>

                    <h6 class="font-bold text-xl mb-2 text-center text-gray-800">Need Help?</h6>
                    <p class="font-light text-sm mb-6 text-center text-gray-800">Chat with our customer service and get a personalized plan</p>
                    <a href="https://wa.me/628819859543"
                        class="bg-white hover:bg-gray-100 text-[#4E8D7C] w-full py-3 rounded-lg flex justify-center items-center gap-2 font-semibold transition shadow-md">
                        <i class="bi bi-whatsapp text-xl"></i> WhatsApp Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-b from-gray-50 to-white py-16">
        <div class="max-w-[1440px] mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">What Travelers Say</h2>
                <p class="text-gray-600">Real experiences from our guests</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white border-2 border-gray-100 rounded-xl p-6 shadow-md hover:shadow-xl transition-all hover:-translate-y-1 flex flex-col h-full">
                    <div class="flex mb-3">
                        <i class="bi bi-star-fill text-yellow-400"></i>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                    </div>
                    <p class="font-medium text-gray-700 mb-4 flex-grow">"Absolutely breathtaking sunrise. The guide took us to a quieter viewpoint and we had the best photos."</p>
                    <div class="flex items-center pt-4 border-t">
                        <div class="w-10 h-10 rounded-full bg-[#4E8D7C]/20 flex items-center justify-center mr-3">
                            <span class="font-bold text-[#4E8D7C]">V</span>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-800">Vanno</p>
                            <p class="text-xs text-gray-500">Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border-2 border-gray-100 rounded-xl p-6 shadow-md hover:shadow-xl transition-all hover:-translate-y-1 flex flex-col h-full">
                    <div class="flex mb-3">
                        <i class="bi bi-star-fill text-yellow-400"></i>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                    </div>
                    <p class="font-medium text-gray-700 mb-4 flex-grow">"Private jeep made everything easy. Highly recommended for photographers."</p>
                    <div class="flex items-center pt-4 border-t">
                        <div class="w-10 h-10 rounded-full bg-[#4E8D7C]/20 flex items-center justify-center mr-3">
                            <span class="font-bold text-[#4E8D7C]">J</span>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-800">John Doe</p>
                            <p class="text-xs text-gray-500">Canada</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border-2 border-gray-100 rounded-xl p-6 shadow-md hover:shadow-xl transition-all hover:-translate-y-1 flex flex-col h-full">
                    <div class="flex mb-3">
                        <i class="bi bi-star-fill text-yellow-400"></i>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                    </div>
                    <p class="font-medium text-gray-700 mb-4 flex-grow">"Flexible plan, great local food, and a very knowledgeable guide."</p>
                    <div class="flex items-center pt-4 border-t">
                        <div class="w-10 h-10 rounded-full bg-[#4E8D7C]/20 flex items-center justify-center mr-3">
                            <span class="font-bold text-[#4E8D7C]">J</span>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-800">Jane Doe</p>
                            <p class="text-xs text-gray-500">Belgium</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-[1440px] mx-auto py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-3">Gallery</h2>
            <p class="text-gray-600">Captured moments from Mount Bromo</p>
        </div>

        <div class="columns-2 md:columns-3 lg:columns-4 [column-gap:1rem]">
            <a href="https://picsum.photos/1200/800" class="glightbox block mb-4" data-gallery="gallery">
                <img src="https://picsum.photos/400/500" alt="Gallery 1"
                    class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            </a>
            <a href="https://picsum.photos/1200/700" class="glightbox block mb-4" data-gallery="gallery">
                <img src="https://picsum.photos/400/300" alt="Gallery 2"
                    class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            </a>
            <a href="https://picsum.photos/1200/900" class="glightbox block mb-4" data-gallery="gallery">
                <img src="https://picsum.photos/400/600" alt="Gallery 3"
                    class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            </a>
            <a href="https://picsum.photos/1200/750" class="glightbox block mb-4" data-gallery="gallery">
                <img src="https://picsum.photos/400/400" alt="Gallery 4"
                    class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            </a>
            <a href="https://picsum.photos/1200/850" class="glightbox block mb-4" data-gallery="gallery">
                <img src="https://picsum.photos/400/550" alt="Gallery 5"
                    class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            </a>
            <a href="https://picsum.photos/1200/820" class="glightbox block mb-4" data-gallery="gallery">
                <img src="https://picsum.photos/400/450" alt="Gallery 6"
                    class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            </a>
            <a href="https://picsum.photos/1200/880" class="glightbox block mb-4" data-gallery="gallery">
                <img src="https://picsum.photos/400/350" alt="Gallery 7"
                    class="w-full rounded-lg shadow-md hover:scale-105 transition-transform duration-300 object-cover">
            </a>
        </div>
    </section>


    <section class="bg-gray-50 py-16">
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">Latest News</h2>
                <p class="text-gray-600">Updates and stories from Mount Bromo</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                $latest_posts = get_posts([
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                ]);
                @endphp

                @foreach ($latest_posts as $post)
                @php setup_postdata($post); @endphp

                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow flex flex-col">
                    @if (has_post_thumbnail($post->ID))
                    <div class="overflow-hidden">
                        {!! get_the_post_thumbnail($post->ID, 'medium_large', ['class' => 'h-48 w-full object-cover hover:scale-110 transition-transform duration-500']) !!}
                    </div>
                    @else
                    <img src="{{ asset('images/placeholder.jpg') }}" class="h-48 w-full object-cover" alt="Placeholder">
                    @endif

                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="font-bold text-lg mb-2 text-gray-800">{{ get_the_title($post->ID) }}</h3>
                        <p class="text-sm text-gray-600 flex-grow leading-relaxed mb-4">
                            {{ get_the_excerpt($post->ID) }}
                        </p>
                        <div class="pt-4 border-t">
                            <a href="{{ get_permalink($post->ID) }}" class="text-[#4E8D7C] hover:text-[#3D7465] font-semibold text-sm inline-flex items-center group">
                                Read more 
                                <i class="bi bi-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

                @php wp_reset_postdata(); @endphp
            </div>
        </div>
    </section>

    <script>
        const menuBtn = document.getElementById('menuBtn');
        const menu = document.getElementById('menu');
        menuBtn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
        document.addEventListener("DOMContentLoaded", () => {
        const lightbox = GLightbox({ selector: '.glightbox' });
        });
    </script>
    
@endsection