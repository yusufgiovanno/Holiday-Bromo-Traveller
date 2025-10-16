{{--
  Template Name: About Us Page
  Template Post Type: page
--}}

@extends('layouts.app')

@section('content')

    <section class="bg-gradient-to-br from-gray-50 to-gray-100 py-16">
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="text-center mb-8">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2">About Us</h1>
                <p class="text-gray-600"><a href="/">Home</a> / <span class="text-[#4E8D7C]">About</span></p>
            </div>
        </div>
    </section>

    <section class="max-w-[1440px] mx-auto px-4 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-4">
                    <img src="https://picsum.photos/300/400" alt="Mount Bromo Tour" class="w-full rounded-xl shadow-lg object-cover h-64">
                    <img src="https://picsum.photos/300/300" alt="Jeep Tour" class="w-full rounded-xl shadow-lg object-cover h-64">
                </div>
                <div class="space-y-4">
                    <img src="https://picsum.photos/300/350" alt="Sunrise View" class="w-full rounded-xl shadow-lg object-cover h-64">
                    <img src="https://picsum.photos/300/350" alt="Sunrise View" class="w-full rounded-xl shadow-lg object-cover h-64">
                    <!-- <div class="bg-[#4E8D7C] rounded-xl p-6 text-white shadow-lg">
                        <h3 class="text-3xl font-bold mb-1">Award Winning</h3>
                        <p class="text-lg">Tour Operator Since 2015</p>
                    </div> -->
                </div>
            </div>

            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    <span class="text-[#4E8D7C]">HISTORY</span> of Our Creation
                </h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Founded with a passion for Indonesia's natural wonders, we started our journey to share the magnificence of Mount Bromo with travelers worldwide. From humble beginnings with a single jeep, we've grown into a trusted tour operator known for personalized experiences.
                </p>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Every sunrise we witness is a reminder of why we do what we do. Our commitment is to create unforgettable memories while respecting the local culture and preserving the natural beauty of Mount Bromo for generations to come.
                </p>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="flex items-center">
                        <i class="bi bi-check-circle-fill text-[#4E8D7C] text-xl mr-3"></i>
                        <span class="text-gray-700">Award Winning</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-check-circle-fill text-[#4E8D7C] text-xl mr-3"></i>
                        <span class="text-gray-700">24/7 Support</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-check-circle-fill text-[#4E8D7C] text-xl mr-3"></i>
                        <span class="text-gray-700">Professional Staff</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-check-circle-fill text-[#4E8D7C] text-xl mr-3"></i>
                        <span class="text-gray-700">Fair Prices</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <!-- <a href="#" class="bg-[#4E8D7C] hover:bg-[#3D7465] text-white px-6 py-3 rounded-lg font-semibold transition">
                        Read More
                    </a> -->
                    <a href="#" class="w-10 h-10 border-2 border-gray-300 hover:border-[#4E8D7C] rounded-lg flex items-center justify-center transition">
                        <i class="bi bi-facebook text-gray-600 hover:text-[#4E8D7C]"></i>
                    </a>
                    <a href="#" class="w-10 h-10 border-2 border-gray-300 hover:border-[#4E8D7C] rounded-lg flex items-center justify-center transition">
                        <i class="bi bi-twitter text-gray-600 hover:text-[#4E8D7C]"></i>
                    </a>
                    <a href="#" class="w-10 h-10 border-2 border-gray-300 hover:border-[#4E8D7C] rounded-lg flex items-center justify-center transition">
                        <i class="bi bi-instagram text-gray-600 hover:text-[#4E8D7C]"></i>
                    </a>
                    <a href="#" class="w-10 h-10 border-2 border-gray-300 hover:border-[#4E8D7C] rounded-lg flex items-center justify-center transition">
                        <i class="bi bi-linkedin text-gray-600 hover:text-[#4E8D7C]"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-b from-gray-50 to-white py-16">
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-3">
                    Our Professional <span class="text-[#4E8D7C]">GUIDES</span>
                </h2>
                <p class="text-gray-600">Meet the experienced team behind your adventure</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all">
                    <img src="https://picsum.photos/300/400?random=1" alt="Guide" class="w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#4E8D7C]/95 via-[#4E8D7C]/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-6 group-hover:translate-y-0 transition-transform">
                        <span class="text-xs font-semibold uppercase tracking-wider bg-white/20 px-3 py-1 rounded-full inline-block mb-2">Expert Guide</span>
                        <h3 class="text-xl font-bold mb-2">Yusuf Vanno</h3>
                        <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity delay-100">
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-facebook text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-twitter text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-instagram text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-linkedin text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all">
                    <img src="https://picsum.photos/300/400?random=2" alt="Guide" class="w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#4E8D7C]/95 via-[#4E8D7C]/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-6 group-hover:translate-y-0 transition-transform">
                        <span class="text-xs font-semibold uppercase tracking-wider bg-white/20 px-3 py-1 rounded-full inline-block mb-2">Expert Guide</span>
                        <h3 class="text-xl font-bold mb-2">Siti Rahayu</h3>
                        <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity delay-100">
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-facebook text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-twitter text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-instagram text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-linkedin text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all">
                    <img src="https://picsum.photos/300/400?random=3" alt="Guide" class="w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#4E8D7C]/95 via-[#4E8D7C]/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-6 group-hover:translate-y-0 transition-transform">
                        <span class="text-xs font-semibold uppercase tracking-wider bg-white/20 px-3 py-1 rounded-full inline-block mb-2">Expert Guide</span>
                        <h3 class="text-xl font-bold mb-2">Ahmad Fauzi</h3>
                        <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity delay-100">
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-facebook text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-twitter text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-instagram text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-linkedin text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all">
                    <img src="https://picsum.photos/300/400?random=4" alt="Guide" class="w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#4E8D7C]/95 via-[#4E8D7C]/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-6 group-hover:translate-y-0 transition-transform">
                        <span class="text-xs font-semibold uppercase tracking-wider bg-white/20 px-3 py-1 rounded-full inline-block mb-2">Expert Guide</span>
                        <h3 class="text-xl font-bold mb-2">Dewi Kartika</h3>
                        <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity delay-100">
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-facebook text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-twitter text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-instagram text-sm"></i>
                            </a>
                            <a href="#" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center transition">
                                <i class="bi bi-linkedin text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-3">
                    Why People <span class="text-[#4E8D7C]">CHOOSE US</span>
                </h2>
                <p class="text-gray-600">Discover what makes us the preferred Mount Bromo tour operator</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center group">
                <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-6 transition-all shadow-lg">
                  <i class="fa-solid fa-calendar-check text-[#4e8d7c] text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">10+ Years Experience</h3>
                <p class="text-gray-600 leading-relaxed">A decade of guiding travelers to witness the most spectacular sunrises at Mount Bromo with expertise and care.</p>
            </div>

            <div class="text-center group">
                <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-6 transition-all shadow-lg">
                    <i class="fa-solid fa-award text-[#4e8d7c] text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Best Tour Experience</h3>
                <p class="text-gray-600 leading-relaxed">Award-winning service recognized for delivering unforgettable adventures tailored to your preferences.</p>
            </div>

            <div class="text-center group">
                <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-6 transition-all shadow-lg">
                    <i class="fa-solid fa-lightbulb text-[#4e8d7c] text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Innovative Itineraries</h3>
                <p class="text-gray-600 leading-relaxed">Creative tour packages that blend adventure with comfort, featuring hidden gems and unique experiences.</p>
            </div>

            <div class="text-center group">
                <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-6 transition-all shadow-lg">
                    <i class="fa-solid fa-face-smile text-[#4e8d7c] text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Customer Satisfaction</h3>
                <p class="text-gray-600 leading-relaxed">Thousands of happy travelers with 5-star reviews, reflecting our commitment to exceptional service quality.</p>
            </div>

            <div class="text-center group">
                <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-6 transition-all shadow-lg">
                    <i class="fa-solid fa-coins text-[#4e8d7c] text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Budget Friendly</h3>
                <p class="text-gray-600 leading-relaxed">Transparent pricing with no hidden costs, offering the best value without compromising on quality or safety.</p>
            </div>

            <div class="text-center group">
                <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-[#4E8D7C] to-[#3D7465] flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-6 transition-all shadow-lg">
                    <i class="fa-solid fa-leaf text-[#4e8d7c] text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Sustainable Tourism</h3>
                <p class="text-gray-600 leading-relaxed">Eco-friendly practices that protect Mount Bromo's natural beauty while supporting local communities.</p>
            </div>
        </div>

        </div>
    </section>
    <section class="py-16">
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-3">
                    Our beautiful <span class="text-[#4E8D7C]">GALLERY</span>
                </h2>
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
        </div>

        </div>
    </section>
@endsection