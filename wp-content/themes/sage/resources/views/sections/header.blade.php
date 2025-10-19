<!-- Navbar -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<a href="https://example.com" class="float flex items-center justify-center" target="_blank">
    <i class="bi bi-whatsapp "></i>
</a>
<nav class="sticky top-0 z-50 bg-white shadow-sm">
    <div class="max-w-[1440px] mx-auto flex justify-between items-center px-4 py-4">
        <a href="/" class="brand-title">
            <img 
            src="{{ asset('assets/logo_transparent-g68EGczP.png') }}" 
            alt="Bromo Travel Agency Logo" 
            class="h-20"
        />
        </a>
        <button id="menuBtn" class="lg:hidden text-2xl">
            <i class="bi bi-list"></i>
        </button>
        <ul id="menu" class="hidden lg:flex gap-8 items-center font-medium">
            <li><a href="/blog" class="hover:text-green-700 transition">Blog</a></li>
            <li><a href="/about-us" class="hover:text-green-700 transition">About Us</a></li>
            <li><a href="/contact-us" class="hover:text-green-700 transition">Contact Us</a></li>
            <li>
                <button class="bg-[#4E8D7C] hover:bg-[#3D7465] text-white px-4 py-2 rounded-md text-sm font-semibold">Book a Trip</button>
            </li>
        </ul>
    </div>
</nav>
