<footer class="text-white text-center py-4 mt-5">
    <div class="container">
        <p class="mb-0">&copy; {{ date('Y') }} {{ \App\Models\WebsiteSetting::getValue('footer_copyright', 'LittleStar Studio. All rights reserved.') }}</p>
        <div class="mt-2">
            <a href="#" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white mx-2"><i class="fab fa-behance"></i></a>
            <a href="#" class="text-white mx-2"><i class="fab fa-dribbble"></i></a>
        </div>
    </div>
</footer>