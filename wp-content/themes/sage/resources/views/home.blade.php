{{--
  Template Name: Home Page
  Template Post Type: page
--}}

@php
use MI\DB;

$reviews = DB::table('wp_posts p')
            ->select('p.post_title as name', 'c.meta_value as country', 'i.meta_value as impression')
            ->leftjoin('wp_postmeta c', 'p.ID = c.post_id', ' AND ', 'c.meta_key = "_review_country"')
            ->leftjoin('wp_postmeta i', 'p.ID = i.post_id', ' AND ', 'i.meta_key = "_review_impressions"')
            ->where('p.post_type',   '=', 'review')
            ->where('p.post_status', '=', 'publish')
            ->limit('10')
            ->orderBy('p.ID', 'DESC')
            ->get();

$galleries = get_option('gallery_images', []);
$galleries = DB::table('wp_posts')
            ->select('guid as src')
            ->whereIn('ID', $galleries)
            ->col();
@endphp

@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <section class="relative h-[600px] md:h-[700px] overflow-hidden">
        <div 
            class="absolute inset-0 bg-cover bg-center" 
            style="background-image: url('{{ asset('assets/mount-CoiR9lrY.png') }}');">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 via-gray-900/60 to-transparent"></div>
        
        <div class="relative max-w-[1440px] mx-auto px-4 h-full flex items-center">
            <div class="max-w-2xl text-white space-y-6">
                <div class="inline-block bg-[#4E8D7C]/20 backdrop-blur-sm px-4 py-2 rounded-full border border-[#4E8D7C]/30 mb-4">
                    <span class="text-sm font-semibold">✨ Award Winning Tour Operator Since 2015</span>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold leading-tight">
                    Sunrise at Mount Bromo — <span class="text-[#4E8D7C]">Yours, personalized</span>
                </h1>
                <p class="text-xl text-gray-200 leading-relaxed">
                    Choose the pace, activities, and comforts. Local guides, private jeeps, and unforgettable sunrise moments tailored just for you.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="#planner" class="bg-[#4E8D7C] hover:bg-[#3D7465] text-white px-8 py-4 rounded-lg font-semibold transition-all shadow-lg hover:shadow-xl text-center">
                        Plan Your Adventure
                    </a>
                    <a href="/about#gallery" class="bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white px-8 py-4 rounded-lg font-semibold transition-all border-2 border-white/30 text-center">
                        View Gallery
                    </a>
                </div>
                <div class="flex flex-wrap gap-3 pt-2">
                    <span class="text-sm bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full">🌅 1-day sunrise</span>
                    <span class="text-sm bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full">🥾 2-day trekking</span>
                    <span class="text-sm bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full">📸 Photography tours</span>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-[1440px] mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 py-16 px-4  relative z-10">
        <div class="bg-white rounded-xl p-8 shadow-xl hover:shadow-2xl transition-all group border-t-4 border-[#4E8D7C]">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                <i class="bi bi-people text-3xl text-[#4e8d7c]"></i>
            </div>
            <h3 class="font-bold mb-3 text-xl text-gray-800">Expert Local Guides</h3>
            <p class="text-gray-600 leading-relaxed">Certified guides who know the best sunrise spots, hidden viewpoints, and perfect photo angles.</p>
        </div>
        <div class="bg-white rounded-xl p-8 shadow-xl hover:shadow-2xl transition-all group border-t-4 border-[#4E8D7C]">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                <i class="bi bi-truck text-3xl text-[#4e8d7c]"></i>
            </div>
            <h3 class="font-bold mb-3 text-xl text-gray-800">Private Jeep Fleet</h3>
            <p class="text-gray-600 leading-relaxed">Comfort and safety with experienced drivers, door-to-door pickup, and well-maintained vehicles.</p>
        </div>
        <div class="bg-white rounded-xl p-8 shadow-xl hover:shadow-2xl transition-all group border-t-4 border-[#4E8D7C]">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                <i class="bi bi-calendar-check text-3xl text-[#4e8d7c]"></i>
            </div>
            <h3 class="font-bold mb-3 text-xl text-gray-800">Fully Customizable</h3>
            <p class="text-gray-600 leading-relaxed">Flexible plans that adapt to you. Change activities, pace, or add extras like horseback rides.</p>
        </div>
    </section>

    <section id="planner" class="bg-gradient-to-b from-gray-50 to-white py-16">
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-3">
                    Build Your <span class="text-[#4E8D7C]">Perfect Trip</span>
                </h2>
                <p class="text-gray-600">Tell us what you like and we'll suggest a tailored plan</p>
            </div>

            <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl p-8 md:p-10">
                <form id="planner-form" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Travel Date</label>
                            <input type="date" class="w-full rounded-lg border-2 border-gray-200 p-3 text-sm focus:ring-2 focus:ring-[#4E8D7C] focus:border-[#4E8D7C] transition" />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Duration</label>
                            <select class="w-full rounded-lg border-2 border-gray-200 p-3 text-sm focus:ring-2 focus:ring-[#4E8D7C] focus:border-[#4E8D7C] transition">
                                <option>1 Day</option>
                                <option>2 Days</option>
                                <option>3+ Days</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Group Size</label>
                            <select class="w-full rounded-lg border-2 border-gray-200 p-3 text-sm focus:ring-2 focus:ring-[#4E8D7C] focus:border-[#4E8D7C] transition">
                                <option>Solo Traveler</option>
                                <option>Couple (2 people)</option>
                                <option>Small Group (3–6)</option>
                                <option>Private Group (7+)</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">WhatsApp Number</label>
                            <div class="flex rounded-lg border-2 border-gray-200 focus-within:ring-2 focus-within:ring-[#4E8D7C] focus-within:border-[#4E8D7C] overflow-hidden transition">
                                <!-- <span class="bg-gray-100 text-gray-700 text-sm px-4 flex items-center font-medium">+62</span> -->
                                <input
                                    type="tel"
                                    placeholder="62 812-3456-7890"
                                    class="w-full p-3 text-sm focus:outline-none"
                                />
                            </div>
                            <p class="text-xs text-gray-500 mt-2">We'll send your custom itinerary via WhatsApp</p>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Email Address (Optional)</label>
                            <input type="email" placeholder="your.email@example.com"
                                class="w-full rounded-lg border-2 border-gray-200 p-3 text-sm focus:ring-2 focus:ring-[#4E8D7C] focus:border-[#4E8D7C] transition" />
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-[#4E8D7C] hover:bg-[#3D7465] text-white rounded-lg px-6 py-4 font-semibold text-lg transition-all shadow-lg hover:shadow-xl">
                            Get My Custom Plan
                        </button>
                        <p class="text-center mt-4 text-gray-500 text-sm">
                            No commitment required — we'll send a personalized plan with transparent pricing
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="max-w-[1440px] mx-auto py-16 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-xl p-8 md:p-10">
                <h2 class="font-bold text-3xl mb-8 text-gray-800">How It Works</h2>
                <div class="space-y-8">
                    <div class="flex items-start group">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] text-white flex items-center justify-center font-bold text-xl mr-6 group-hover:scale-110 transition-transform flex-shrink-0 shadow-lg" style="background: linear-gradient(to bottom right, #4E8D7C, #3D7465);">
                            1
                        </div>
                        <div>
                            <h3 class="font-bold text-xl text-gray-800 mb-2">Tell Us Your Preferences</h3>
                            <p class="text-gray-600 leading-relaxed">Share your travel dates, activity level, interests, and budget. The more we know, the better we can tailor your experience.</p>
                        </div>
                    </div>
                    <div class="flex items-start group">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] text-white flex items-center justify-center font-bold text-xl mr-6 group-hover:scale-110 transition-transform flex-shrink-0 shadow-lg" style="background: linear-gradient(to bottom right, #4E8D7C, #3D7465);">
                            2
                        </div>
                        <div>
                            <h3 class="font-bold text-xl text-gray-800 mb-2">Receive Your Tailored Plan</h3>
                            <p class="text-gray-600 leading-relaxed">Get a complete itinerary with vehicle details, guide assignment, activity options, and transparent pricing breakdown.</p>
                        </div>
                    </div>
                    <div class="flex items-start group">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] text-white flex items-center justify-center font-bold text-xl mr-6 group-hover:scale-110 transition-transform flex-shrink-0 shadow-lg" style="background: linear-gradient(to bottom right, #4E8D7C, #3D7465);">
                            3
                        </div>
                        <div>
                            <h3 class="font-bold text-xl text-gray-800 mb-2">Confirm & Enjoy the Journey</h3>
                            <p class="text-gray-600 leading-relaxed">Secure your spot with a simple deposit. We handle all the logistics while you focus on the breathtaking views.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] rounded-2xl p-8 shadow-xl text-white h-full flex flex-col justify-center"  style="background: linear-gradient(to bottom right, #4E8D7C, #3D7465);">
                    <div class="w-20 h-20 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center mb-6 mx-auto">
                        <i class="bi bi-headset text-5xl text-white"></i>
                    </div>
                    <h3 class="font-bold text-2xl mb-3 text-center">Need Help Planning?</h3>
                    <p class="text-white/90 mb-8 text-center leading-relaxed">
                        Chat with our friendly customer service team and get expert advice for your perfect Mount Bromo adventure.
                    </p>
                    <a href="https://wa.me/628819859543"
                        class="bg-white hover:bg-gray-100 text-[#4E8D7C] w-full py-4 rounded-lg flex justify-center items-center gap-3 font-bold transition-all shadow-lg hover:shadow-xl">
                        <i class="bi bi-whatsapp text-2xl"></i> 
                        <span>Chat on WhatsApp</span>
                    </a>
                    <p class="text-white/70 text-sm text-center mt-4">Available 24/7 for your convenience</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-b from-gray-50 to-white py-16">
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-3">
                    What <span class="text-[#4E8D7C]">Travelers Say</span>
                </h2>
                <p class="text-gray-600">Real experiences from our happy guests around the world</p>
            </div>

            <div class="swiper testimonialSwiper pb-12">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all flex flex-col" style="min-height: 360px;">
                            <div class="flex mb-4">
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                            </div>
                            <div class="mb-6 flex-grow">
                                <p class="text-gray-700 leading-relaxed text-lg testimonial-text line-clamp-4 transition-all duration-300">"Absolutely breathtaking sunrise experience! The guide took us to a quieter viewpoint away from the crowds, and we captured the most amazing photos. Professional service from start to finish."</p>
                                <button class="text-[#4E8D7C] hover:text-[#3D7465] text-sm font-semibold mt-2 read-more-btn transition-colors hidden">
                                    Read More
                                </button>
                            </div>
                            <div class="flex items-center pt-6 border-t border-gray-100">
                                <div class="w-14 h-14 rounded-full flex items-center justify-center mr-4" style="background: linear-gradient(to bottom right, #4E8D7C, #3D7465);">
                                    <span class="font-bold text-white text-xl">V</span>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800">Vanno</p>
                                    <p class="text-sm text-gray-500">🇮🇩 Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all flex flex-col" style="min-height: 360px;">
                            <div class="flex mb-4">
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                            </div>
                            <div class="mb-6 flex-grow">
                                <p class="text-gray-700 leading-relaxed text-lg testimonial-text line-clamp-4 transition-all duration-300">"The private jeep made everything so comfortable and easy. Our driver was knowledgeable and patient. Highly recommended for photographers who want to take their time!"</p>
                                <button class="text-[#4E8D7C] hover:text-[#3D7465] text-sm font-semibold mt-2 read-more-btn transition-colors">
                                    Read More
                                </button>
                            </div>
                            <div class="flex items-center pt-6 border-t border-gray-100">
                                <div class="w-14 h-14 rounded-full flex items-center justify-center mr-4" style="background: linear-gradient(to bottom right, #4E8D7C, #3D7465);">
                                    <span class="font-bold text-white text-xl">J</span>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800">John Doe</p>
                                    <p class="text-sm text-gray-500">🇨🇦 Canada</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all flex flex-col" style="min-height: 360px;">
                            <div class="flex mb-4">
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                            </div>
                            <div class="mb-6 flex-grow">
                                <p class="text-gray-700 leading-relaxed text-lg testimonial-text line-clamp-4 transition-all duration-300">"Flexible plan that adapted to our needs perfectly. Amazing local food recommendations and a very knowledgeable guide who shared fascinating stories about the region."</p>
                                <button class="text-[#4E8D7C] hover:text-[#3D7465] text-sm font-semibold mt-2 read-more-btn transition-colors">
                                    Read More
                                </button>
                            </div>
                            <div class="flex items-center pt-6 border-t border-gray-100">
                                <div class="w-14 h-14 rounded-full flex items-center justify-center mr-4" style="background: linear-gradient(to bottom right, #4E8D7C, #3D7465);">
                                    <span class="font-bold text-white text-xl">J</span>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800">Jane Smith</p>
                                    <p class="text-sm text-gray-500">🇧🇪 Belgium</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all flex flex-col" style="min-height: 360px;">
                            <div class="flex mb-4">
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                                <i class="bi bi-star-fill text-yellow-400 text-xl"></i>
                            </div>
                            <div class="mb-6 flex-grow">
                                <p class="text-gray-700 leading-relaxed text-lg testimonial-text line-clamp-4 transition-all duration-300">"Best decision for our honeymoon! The team organized everything perfectly. The sunrise at Mount Bromo was magical, and the whole experience exceeded our expectations."</p>
                                <button class="text-[#4E8D7C] hover:text-[#3D7465] text-sm font-semibold mt-2 read-more-btn transition-colors">
                                    Read More
                                </button>
                            </div>
                            <div class="flex items-center pt-6 border-t border-gray-100">
                                <div class="w-14 h-14 rounded-full flex items-center justify-center mr-4" style="background: linear-gradient(to bottom right, #4E8D7C, #3D7465);">
                                    <span class="font-bold text-white text-xl">S</span>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800">Sarah & Mike</p>
                                    <p class="text-sm text-gray-500">🇦🇺 Australia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="swiper-pagination !bottom-0"></div>
            </div>
        </div>
    </section>

    <section class="py-16" style="background: linear-gradient(to bottom right, #4E8D7C, #3D7465);">
        <div class="max-w-[1440px] mx-auto px-4 text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready for Your Mount Bromo Adventure?</h2>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                Join thousands of happy travelers who've experienced the magic of Mount Bromo with us
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#planner" class="bg-white hover:bg-gray-100 text-[#4E8D7C] flex justify-center p-4 items-center rounded-lg font-bold transition-all shadow-lg hover:shadow-xl">
                    Start Planning Now
                </a>
                <a href="https://wa.me/628819859543" class="bg-white/10 hover:bg-white/20 backdrop-blur-sm p-4 text-white rounded-lg font-bold transition-all border-2 border-white/30 flex items-center justify-center gap-2">
                    <i class="bi bi-whatsapp text-xl"></i>
                    Chat With Us
                </a>
            </div>
        </div>
    </section>

    <script>
       

        document.addEventListener("DOMContentLoaded", () => {
            const readMoreBtns = document.querySelectorAll('.read-more-btn');

            setTimeout(() => {
                readMoreBtns.forEach(btn => {
                    const testimonialText = btn.previousElementSibling;
                    
                    testimonialText.classList.remove('line-clamp-4');
                    const fullHeight = testimonialText.scrollHeight;
                    testimonialText.classList.add('line-clamp-4');
                    const clampedHeight = testimonialText.clientHeight;
                    
                    if (fullHeight > clampedHeight + 5) {
                        btn.classList.remove('hidden');
                        
                        btn.addEventListener('click', function(e) {
                            e.preventDefault();
                            
                            if (testimonialText.classList.contains('line-clamp-4')) {
                                testimonialText.classList.remove('line-clamp-4');
                                this.textContent = 'Show Less';
                            } else {
                                testimonialText.classList.add('line-clamp-4');
                                this.textContent = 'Read More';
                            }
                        });
                    } else {
                        btn.remove();
                    }
                });
            }, 150);
            const testimonialSwiper = new Swiper('.testimonialSwiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 24,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 32,
                    },
                },
            });
        });
    </script>

@endsection
