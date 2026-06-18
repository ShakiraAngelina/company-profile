<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us — Arkonin Engineering MP</title>
  <base href="/">
 <link rel="icon" type="image/png" href="assets/images/logo.jpg" />
 <link rel="stylesheet" href="assets/CSS/style.css" />
  <link rel="stylesheet" href="assets/CSS/contact.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('partials.nav')

  <section class="contact-section" style="padding-top: 90px;">
    <div class="contact-container flex flex-col lg:flex-row items-center gap-8 max-w-screen-xl mx-auto px-4 md:px-6 lg:px-8">
      <div class="contact-form w-full lg:w-1/2 max-w-lg" data-aos="fade-up" data-aos-delay="60">
        <h1 data-en="Contact Us" data-id="Kontak Kami">Contact Us</h1>
        <p class="contact-sub" data-en="We’ll respond within 24–48 hours." data-id="Kami akan merespons dalam 24–48 jam.">We’ll respond within 24–48 hours.</p>
        @if(session('success'))
          <div class="mb-3 rounded-lg bg-green-50 text-green-700 border border-green-200 px-3 py-2 text-sm">
            {{ session('success') }}
          </div>
        @endif
        @if(session('error'))
          <div class="mb-3 rounded-lg bg-red-50 text-red-700 border border-red-200 px-3 py-2 text-sm">
            {{ session('error') }}
          </div>
        @endif
        @if($errors->any())
          <div class="mb-3 rounded-lg bg-red-50 text-red-700 border border-red-200 px-3 py-2 text-sm">
            <ul class="list-disc pl-4">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="POST" action="/contact">
          @csrf
          <div class="form-group">
            <label for="name" data-en="Full Name" data-id="Nama Lengkap">Nama Lengkap</label>
            <input class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-[#A9252B]" type="text" id="name" name="name" required placeholder="Nama lengkap" data-ph-en="Your full name" data-ph-id="Nama lengkap" />
          </div>
          <div class="form-group">
            <label for="email" data-en="Email" data-id="Email">Email</label>
            <input class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-[#A9252B]" type="email" id="email" name="email" required placeholder="nama@perusahaan.com" data-ph-en="name@company.com" data-ph-id="nama@perusahaan.com" />
          </div>
          <div class="form-group">
            <label for="subject" data-en="Subject" data-id="Subjek">Subjek</label>
            <input class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-[#A9252B]" type="text" id="subject" name="subject" required placeholder="Ringkas tujuan pesan" data-ph-en="Briefly state your message" data-ph-id="Ringkas tujuan pesan" />
          </div>
          <div class="form-group">
            <label for="message" data-en="Message / Question" data-id="Pesan / Pertanyaan">Pesan / Pertanyaan</label>
            <textarea class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-[#A9252B]" id="message" name="message" rows="5" required placeholder="Tuliskan pesan Anda" data-ph-en="Write your message" data-ph-id="Tuliskan pesan Anda"></textarea>
          </div>
          <button type="submit" class="btn-submit w-full md:w-auto" data-en="Send Message" data-id="Kirim Pesan">Send Message</button>
        </form>
      </div>
      <div class="contact-visual hidden lg:block w-1/2" data-aos="fade-up" data-aos-delay="120">
        <div class="image-overlay"></div>
        <img class="w-full h-auto object-cover" src="https://images.unsplash.com/photo-1509395176047-4a66953fd231?auto=format&fit=crop&w=1600&q=60" alt="Engineering project preview" />
      </div>
    </div>
  </section>

  @include('partials.footer')
  <script src="assets/js/script.js"></script>
</body>
</html>