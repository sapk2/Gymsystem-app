<section id="contact" class=" mt-6 bg-gray-100 text-black py-16">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row justify-between items-center space-y-12 lg:space-y-0 lg:space-x-12">

            <!-- Contact Form -->
            <div class="w-full lg:w-1/2 bg-gray-100 p-8 rounded-lg shadow-lg" data-aos="fade-up-right" data-aos-delay="200">
                <h2 class="text-2xl font-semibold mb-6 text-black">Feel free to ask anything</h2>

                <form action="{{ route('contact.store') }}" method="post" class="space-y-4">
                    @csrf
                    <input type="text" name="name" placeholder="Name" 
                        class="w-full p-3 bg-gray-100 text-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
                
                    <input type="email" name="email" placeholder="Email" 
                        class="w-full p-3 bg-gray-100 text-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
                
                    <textarea name="message" rows="5" placeholder="Message" 
                        class="w-full p-3 bg-gray-100 text-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400"></textarea>
                
                    <button type="submit" class="w-full bg-black hover:bg-orange-600 text-white font-semibold py-3 rounded-lg transition">
                        Send Message
                    </button>
                </form>
                
            </div>

            <!-- Map & Location -->
            <div class="w-full lg:w-1/2 text-center " data-aos="fade-up-right" data-aos-delay="600">
                <h2 class="text-2xl font-semibold mb-4 text-red-400">{{$footer->map_heading}}</h2>
                
                <p class="mb-4 text-gray-600"><i class="fas fa-map-marker-alt text-red-400 mr-2"></i> 
                    120-240 Rio de Janeiro, State of Rio de Janeiro, Brazil</p>

                <div class="w-full h-64 mt-6 rounded-lg overflow-hidden shadow-lg">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1375702.547008216!2d82.35488555993022!3d27.75045874262187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sgym!5e1!3m2!1sen!2snp!4v1738747791809!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>
