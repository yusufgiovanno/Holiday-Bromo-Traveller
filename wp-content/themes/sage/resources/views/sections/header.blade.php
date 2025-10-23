<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<a href="https://wa.me/628819859543" class="float flex items-center justify-center" target="_blank">
    <i class="bi bi-whatsapp"></i>
</a>

<nav class="sticky top-0 z-50 bg-white shadow-md">
    <div class="max-w-[1440px] mx-auto flex justify-between items-center px-4 py-4">
        <a href="/" class="brand-title">
            <img 
                src="{{ asset('assets/logo_transparent-g68EGczP.png') }}" 
                alt="Bromo Travel Agency Logo" 
                class="h-16 md:h-20"
            />
        </a>
        
        <button id="menuBtn" class="lg:hidden text-3xl text-gray-700 hover:text-[#4E8D7C] transition-colors z-50 relative">
            <i id="menuIcon" class="bi bi-list"></i>
        </button>
        
        <ul class="hidden lg:flex gap-8 items-center font-medium">
            <li><a href="/blog" class="hover:text-[#4E8D7C] transition-colors">Blog</a></li>
            <li><a href="/about-us" class="hover:text-[#4E8D7C] transition-colors">About Us</a></li>
            <li><a href="/contact-us" class="hover:text-[#4E8D7C] transition-colors">Contact Us</a></li>
            <li>
                <a href="#planner" class="bg-[#4E8D7C] hover:bg-[#3D7465] text-white px-6 py-2.5 rounded-lg text-sm font-semibold transition-all shadow-md hover:shadow-lg">
                    Book a Trip
                </a>
            </li>
        </ul>
    </div>
    
    <div id="mobileMenu" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden">
        <div id="mobileMenuPanel" class="absolute right-0 top-0 h-full w-80 max-w-[85vw] bg-white shadow-2xl transform translate-x-full transition-transform duration-300">
            <div class="flex flex-col h-full">
                <div class="p-6 border-b border-gray-100">
                    <img 
                        src="{{ asset('assets/logo_transparent-g68EGczP.png') }}" 
                        alt="Bromo Travel Agency Logo" 
                        class="h-16 mx-auto"
                    />
                </div>
                
                <div class="flex-1 overflow-y-auto py-6">
                    <ul class="space-y-2 px-4">
                        <li>
                            <a href="/" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors group">
                                <i class="bi bi-house-door text-xl text-gray-600 group-hover:text-[#4E8D7C] transition-colors"></i>
                                <span class="font-medium text-gray-700 group-hover:text-[#4E8D7C] transition-colors">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="/blog" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors group">
                                <i class="bi bi-journal-text text-xl text-gray-600 group-hover:text-[#4E8D7C] transition-colors"></i>
                                <span class="font-medium text-gray-700 group-hover:text-[#4E8D7C] transition-colors">Blog</span>
                            </a>
                        </li>
                        <li>
                            <a href="/about-us" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors group">
                                <i class="bi bi-info-circle text-xl text-gray-600 group-hover:text-[#4E8D7C] transition-colors"></i>
                                <span class="font-medium text-gray-700 group-hover:text-[#4E8D7C] transition-colors">About Us</span>
                            </a>
                        </li>
                        <li>
                            <a href="/contact-us" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors group">
                                <i class="bi bi-telephone text-xl text-gray-600 group-hover:text-[#4E8D7C] transition-colors"></i>
                                <span class="font-medium text-gray-700 group-hover:text-[#4E8D7C] transition-colors">Contact Us</span>
                            </a>
                        </li>
                    </ul>
                    
                    <div class="mt-6 px-4">
                        <a href="#planner" class="block w-full bg-[#4E8D7C] hover:bg-[#3D7465] text-white px-6 py-4 rounded-lg text-center font-semibold transition-all shadow-lg hover:shadow-xl">
                            <i class="bi bi-calendar-check mr-2"></i>
                            Book a Trip
                        </a>
                    </div>
                    
                    <div class="mt-8 px-4">
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 border border-gray-100">
                            <p class="text-sm font-semibold text-gray-700 mb-4">Contact Us</p>
                            <div class="space-y-3">
                                <a href="https://wa.me/628819859543" class="flex items-center gap-3 text-sm text-gray-600 hover:text-[#4E8D7C] transition-colors">
                                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                        <i class="bi bi-whatsapp text-green-600 text-lg"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">WhatsApp</p>
                                        <p class="text-xs">+62 881-985-9543</p>
                                    </div>
                                </a>
                                <button onclick="openWeChatModal(); closeMobileMenu();" class="flex items-center gap-3 text-sm text-gray-600 hover:text-[#4E8D7C] transition-colors w-full">
                                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M8.691 2.188C3.891 2.188 0 5.476 0 9.53c0 2.212 1.17 4.203 3.002 5.55a.59.59 0 0 1 .213.665l-.39 1.48c-.019.07-.048.141-.048.213 0 .163.13.295.29.295a.326.326 0 0 0 .167-.054l1.903-1.114a.864.864 0 0 1 .717-.098 10.16 10.16 0 0 0 2.837.403c.276 0 .543-.027.811-.05-.857-2.578.157-4.972 1.932-6.446 1.703-1.415 3.882-1.98 5.853-1.838-.576-3.583-4.196-6.348-8.596-6.348zM5.785 5.991c.642 0 1.162.529 1.162 1.18a1.17 1.17 0 0 1-1.162 1.178A1.17 1.17 0 0 1 4.623 7.17c0-.651.52-1.18 1.162-1.18zm5.813 0c.642 0 1.162.529 1.162 1.18a1.17 1.17 0 0 1-1.162 1.178 1.17 1.17 0 0 1-1.162-1.178c0-.651.52-1.18 1.162-1.18zm5.34 2.867c-1.797-.052-3.746.512-5.28 1.786-1.72 1.428-2.687 3.72-1.78 6.22.942 2.453 3.666 4.229 6.884 4.229.826 0 1.622-.12 2.361-.336a.722.722 0 0 1 .598.082l1.584.926a.272.272 0 0 0 .14.047c.134 0 .24-.111.24-.247 0-.06-.023-.12-.038-.177l-.327-1.233a.582.582 0 0 1-.023-.156.49.49 0 0 1 .201-.398C23.024 18.48 24 16.82 24 14.98c0-3.21-2.931-5.837-6.656-6.088V8.89c-.135-.01-.27-.027-.405-.032zm-2.53 3.274c.535 0 .969.44.969.982a.976.976 0 0 1-.969.983.976.976 0 0 1-.969-.983c0-.542.434-.982.969-.982zm4.844 0c.535 0 .969.44.969.982a.976.976 0 0 1-.969.983.976.976 0 0 1-.969-.983c0-.542.434-.982.969-.982z"/>
                                        </svg>
                                    </div>
                                    <div class="text-left">
                                        <p class="font-medium text-gray-800">WeChat</p>
                                        <p class="text-xs">Scan QR Code</p>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 border-t border-gray-100 bg-gray-50">
                    <p class="text-xs text-gray-500 text-center">
                        © 2025 Bromo Travel Agency<br>
                        Available 24/7 for your convenience
                    </p>
                </div>
            </div>
        </div>
    </div>
</nav>
<div id="wechatModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4" onclick="closeWeChatModal(event)">
        <div class="bg-white rounded-2xl shadow-2xl max-w-sm w-full p-8 transform transition-all" onclick="event.stopPropagation()">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Scan to Add WeChat</h3>
                <button onclick="closeWeChatModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div class="bg-gradient-to-br from-gray-50 to-white p-6 rounded-xl mb-6">
                <div class="bg-white p-4 rounded-lg shadow-inner mb-4">
                    <!-- <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=weixin://dl/chat?BromoTourOperator" 
                         alt="WeChat QR Code" 
                         class="w-full h-auto"> -->
                         <img src="{{ asset('assets/wechat.png') }}" alt="Wechat" class="w-full h-auto">
                </div>
                <p class="text-center text-gray-600 text-sm">
                    Open WeChat and scan this QR code to add us
                </p>
            </div>
            
            <div class="space-y-3">
                <div class="flex items-center gap-3 text-sm text-gray-600">
                    <div class="w-8 h-8 rounded-full bg-[#4E8D7C]/10 flex items-center justify-center flex-shrink-0">
                        <span class="text-[#4E8D7C] font-bold">1</span>
                    </div>
                    <p>Open WeChat app on your phone</p>
                </div>
                <div class="flex items-center gap-3 text-sm text-gray-600">
                    <div class="w-8 h-8 rounded-full bg-[#4E8D7C]/10 flex items-center justify-center flex-shrink-0">
                        <span class="text-[#4E8D7C] font-bold">2</span>
                    </div>
                    <p>Tap "+" and select "Scan QR Code"</p>
                </div>
                <div class="flex items-center gap-3 text-sm text-gray-600">
                    <div class="w-8 h-8 rounded-full bg-[#4E8D7C]/10 flex items-center justify-center flex-shrink-0">
                        <span class="text-[#4E8D7C] font-bold">3</span>
                    </div>
                    <p>Scan this code to start chatting</p>
                </div>
            </div>
            
            <button onclick="closeWeChatModal()" 
                class="w-full mt-6 bg-[#4E8D7C] hover:bg-[#3D7465] text-white py-3 rounded-lg font-semibold transition-all">
                Got It
            </button>
        </div>
    </div>
<style>
body.menu-open {
    overflow: hidden;
}
</style>

<script>
    function openWeChatModal() {
            document.getElementById('wechatModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeWeChatModal(event) {
            if (!event || event.target.id === 'wechatModal' || event.type === 'click') {
                document.getElementById('wechatModal').classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }

document.addEventListener('DOMContentLoaded', function () {
    const menuBtn = document.getElementById('menuBtn');
    const menuIcon = document.getElementById('menuIcon');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuPanel = document.getElementById('mobileMenuPanel');
    
    function openMobileMenu() {
        mobileMenu.classList.remove('pointer-events-none', 'opacity-0');
        mobileMenu.classList.add('pointer-events-auto', 'opacity-100');
        mobileMenuPanel.classList.remove('translate-x-full');
        mobileMenuPanel.classList.add('translate-x-0');
        menuIcon.classList.remove('bi-list');
        menuIcon.classList.add('bi-x');
        document.body.classList.add('menu-open');
    }
    
    function closeMobileMenu() {
        mobileMenu.classList.add('pointer-events-none', 'opacity-0');
        mobileMenu.classList.remove('pointer-events-auto', 'opacity-100');
        mobileMenuPanel.classList.add('translate-x-full');
        mobileMenuPanel.classList.remove('translate-x-0');
        menuIcon.classList.add('bi-list');
        menuIcon.classList.remove('bi-x');
        document.body.classList.remove('menu-open');
    }
    
    window.closeMobileMenu = closeMobileMenu;
    
    if (menuBtn) {
        menuBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (mobileMenu.classList.contains('pointer-events-none')) {
                openMobileMenu();
            } else {
                closeMobileMenu();
            }
        });
    }
    
    if (mobileMenu) {
        mobileMenu.addEventListener('click', function(e) {
            if (e.target === mobileMenu) {
                closeMobileMenu();
            }
        });
    }
    
    const mobileMenuLinks = document.querySelectorAll('#mobileMenuPanel a[href^="/"], #mobileMenuPanel a[href^="#"]');
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', function() {
            setTimeout(closeMobileMenu, 300);
        });
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !mobileMenu.classList.contains('pointer-events-none')) {
            closeMobileMenu();
        }
    });
});
</script>