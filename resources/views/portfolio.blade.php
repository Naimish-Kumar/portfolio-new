<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->name }} — Flutter Developer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav>
        <div class="logo">NAIMISH<span class="text-emerald">KUMAR</span></div>
        <ul class="nav-links">
            <li><a href="#work">Work</a></li>
            <li><a href="#packages">Tools</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="{{ asset($profile->resume_link) }}" target="_blank" class="text-emerald" style="font-weight: 800;">Resume</a></li>
        </ul>
    </nav>

    <main>
        <!-- Premium Hero Section -->
        <section class="hero container">
            <div class="hero-content reveal">
                <span class="tag"><i class="fas fa-terminal"></i> Flutter Developer</span>
                <h1>Crafting <br><span class="text-emerald">Seamless</span> <br>Digital Journeys.</h1>
                <p>I specialize in engineering high-fidelity mobile applications with a relentless focus on performance,
                    security, and the "human" element of code.</p>
                <div style="display: flex; gap: 1.5rem; margin-top: 1rem;">
                    <a href="#work" class="btn-minimal">Selected Work</a>
                    <a href="{{ asset($profile->resume_link) }}" target="_blank" class="btn-minimal">Download CV <i class="fas fa-file-pdf"></i></a>
                    <a href="#contact" class="btn-minimal">Connect</a>
                </div>
            </div>

            <div class="profile-container reveal" style="transition-delay: 0.2s;">
                <div class="hero-backdrop-text">FLUTTER</div>
                <img src="{{ asset($profile->image ?? 'images/profile.png') }}" alt="{{ $profile->name }}"
                    class="profile-full-img">
            </div>
        </section>

        <!-- Engineering Philosophy -->
        <section id="philosophy"
            style="background: var(--surface); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);">
            <div class="container">
                <div style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 6rem; align-items: center;">
                    <div class="reveal">
                        <span class="tag">Philosophy</span>
                        <h2 style="font-size: 2.5rem; font-weight: 800; letter-spacing: -1.5px;">Code as a<br><span
                                class="text-emerald">Craft.</span></h2>
                    </div>
                    <div class="reveal" style="transition-delay: 0.1s;">
                        <p style="font-size: 1.25rem; color: var(--text-dim); line-height: 1.8; margin-bottom: 2rem;">
                            I believe that architectural integrity is not just about writing code—it's about building a
                            foundation that scales with the speed of thought.
                        </p>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem;">
                            <div>
                                <h4 style="font-weight: 800; margin-bottom: 0.5rem;">Performance First</h4>
                                <p style="font-size: 0.9rem; color: var(--text-dim);">Optimization is not an
                                    afterthought. It's built into every frame and every byte.</p>
                            </div>
                            <div>
                                <h4 style="font-weight: 800; margin-bottom: 0.5rem;">User Centricity</h4>
                                <p style="font-size: 0.9rem; color: var(--text-dim);">Complexity should remain under the
                                    hood. The user only sees simplicity.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dynamic Carousel Work -->
        <section id="work" style="padding-bottom: 5rem;">
            <div class="container"
                style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 3rem;">
                <div style="flex: 1;">
                    <h2
                        style="font-size: 0.8rem; font-weight: 800; color: var(--text-dim); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1rem;">
                        Selected Applications</h2>
                    <h3 style="font-size: 2.5rem; font-weight: 800; letter-spacing: -1px;">Production Grade Work</h3>
                </div>
                <div class="carousel-controls reveal" style="margin-top: 0;">
                    <button class="carousel-btn" onclick="slideCarousel(-1)"><i
                            class="fas fa-chevron-left"></i></button>
                    <button class="carousel-btn" onclick="slideCarousel(1)"><i
                            class="fas fa-chevron-right"></i></button>
                </div>
            </div>

            <!-- (Carousel content unchanged) -->
            <div class="carousel-wrapper">
                <div class="carousel-track" id="carouselTrack" style="padding-left: 2rem;">
                    @foreach($projects as $project)
                        @if(!str_contains(strtolower($project->tags), 'package') && !str_contains(strtolower($project->tags), 'cli'))
                            <div class="carousel-slide reveal">
                                <span class="tag">{{ strtoupper(str_replace(',', ' • ', $project->tags)) }}</span>
                                <h3 style="font-size: 1.4rem; font-weight: 850; margin-bottom: 1rem;">{{ $project->title }}</h3>
                                <p
                                    style="color: var(--text-dim); margin-bottom: 2rem; font-size: 0.85rem; min-height: 4.5rem; line-height: 1.8;">
                                    {{ $project->description }}</p>
                                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                                    @if($project->github_link && $project->github_link != '#')
                                        <a href="{{ $project->github_link }}" target="_blank" class="btn-minimal"
                                            style="font-size: 0.7rem;">Code <i class="fab fa-github"></i></a>
                                    @endif
                                    @if($project->link && $project->link != '#')
                                        <a href="{{ $project->link }}" target="_blank" class="btn-minimal"
                                            style="font-size: 0.7rem;">Demo <i class="fas fa-external-link-alt"></i></a>
                                    @endif
                                    @if($project->play_store_link && $project->play_store_link != '#')
                                        <a href="{{ $project->play_store_link }}" target="_blank" class="btn-minimal"
                                            style="font-size: 0.7rem;">Play Store <i class="fab fa-google-play"></i></a>
                                    @endif
                                    @if($project->app_store_link && $project->app_store_link != '#')
                                        <a href="{{ $project->app_store_link }}" target="_blank" class="btn-minimal"
                                            style="font-size: 0.7rem;">App Store <i class="fab fa-apple"></i></a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Services Section (New Content) -->
        <section id="services" style="background: var(--surface);">
            <div class="container">
                <div style="text-align: center; margin-bottom: 5rem;" class="reveal">
                    <span class="tag">How I Help</span>
                    <h2 style="font-size: 3rem; font-weight: 800; letter-spacing: -1.5px;">Strategic App Engineering
                    </h2>
                    <p
                        style="color: var(--text-dim); margin-top: 1rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                        Providing end-to-end technical leadership and high-end Flutter development for innovators.</p>
                </div>

                <div class="service-grid">
                    @foreach($services as $service)
                        <div class="service-card reveal">
                            <div
                                style="width: 50px; height: 50px; background: var(--accent-emerald-dim); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
                                <i class="{{ $service->icon ?? 'fas fa-rocket' }} text-emerald"
                                    style="font-size: 1.5rem;"></i>
                            </div>
                            <h4 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 1rem;">{{ $service->title }}
                            </h4>
                            <p style="color: var(--text-dim); font-size: 0.9rem; line-height: 1.7;">
                                {{ $service->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Tools Grid -->
        <section id="packages">
            <div class="container">
                <div style="margin-bottom: 4rem;" class="reveal">
                    <h2
                        style="font-size: 0.8rem; font-weight: 800; color: var(--text-dim); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1rem;">
                        Developer Tooling</h2>
                    <h3 style="font-size: 2.5rem; font-weight: 800; letter-spacing: -1px;">Open Source Ecosystem</h3>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                    @foreach($projects as $project)
                        @if(str_contains(strtolower($project->tags), 'package') || str_contains(strtolower($project->tags), 'cli'))
                            <div class="package-card reveal">
                                <div
                                    style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.5rem;">
                                    <div
                                        style="padding: 0.8rem; background: var(--surface-accent); border-radius: 12px; border: 1px solid var(--border);">
                                        <i class="fas fa-code text-emerald" style="font-size: 1.2rem;"></i>
                                    </div>
                                    <div style="display: flex; gap: 1rem;">
                                        @if($project->github_link && $project->github_link != '#')<a href="{{ $project->github_link }}" target="_blank"
                                        style="color: var(--text-dim);"><i class="fab fa-github"></i></a>@endif
                                        @if($project->link && $project->link != '#')<a href="{{ $project->link }}" target="_blank"
                                        style="color: var(--text-dim);"><i class="fas fa-external-link-alt"></i></a>@endif
                                        @if($project->play_store_link && $project->play_store_link != '#')<a href="{{ $project->play_store_link }}" target="_blank"
                                            style="color: var(--text-dim);"><i class="fab fa-google-play"></i></a>@endif
                                        @if($project->app_store_link && $project->app_store_link != '#')<a href="{{ $project->app_store_link }}" target="_blank"
                                            style="color: var(--text-dim);"><i class="fab fa-apple"></i></a>@endif
                                    </div>
                                </div>
                                <h4 style="font-size: 1.1rem; font-weight: 750; margin-bottom: 0.8rem;">{{ $project->title }}
                                </h4>
                                <p style="color: var(--text-dim); font-size: 0.85rem; margin-bottom: 1.5rem; line-height: 1.8;">
                                    {{ $project->description }}</p>
                                <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                                    @foreach(explode(',', $project->tags) as $tag)
                                        <span
                                            style="font-size: 0.6rem; font-weight: 800; border: 1px solid var(--border); padding: 0.2rem 0.5rem; border-radius: 4px; color: var(--text-dim);">{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Social Connect Bar -->
        <section style="padding: 4rem 0; background: var(--surface); border-top: 1px solid var(--border);">
            <div class="container"
                style="display: flex; justify-content: space-around; align-items: center; flex-wrap: wrap; gap: 4rem;">
                <div class="reveal" style="text-align: center;">
                    <i class="fab fa-github" style="font-size: 2rem; margin-bottom: 1rem; color: var(--text-dim);"></i>
                    <h5 style="font-weight: 800;">50+ Projects</h5>
                    <p style="font-size: 0.7rem; text-transform: uppercase; color: var(--text-dim);">Open Source</p>
                </div>
                <div class="reveal" style="text-align: center; transition-delay: 0.1s;">
                    <i class="fab fa-linkedin"
                        style="font-size: 2rem; margin-bottom: 1rem; color: var(--text-dim);"></i>
                    <h5 style="font-weight: 800;">2k+ Network</h5>
                    <p style="font-size: 0.7rem; text-transform: uppercase; color: var(--text-dim);">Industry
                        Connections</p>
                </div>
                <div class="reveal" style="text-align: center; transition-delay: 0.2s;">
                    <i class="fas fa-code-branch"
                        style="font-size: 2rem; margin-bottom: 1rem; color: var(--text-dim);"></i>
                    <h5 style="font-weight: 800;">10+ Packages</h5>
                    <p style="font-size: 0.7rem; text-transform: uppercase; color: var(--text-dim);">Pub.dev Ecosystem
                    </p>
                </div>
            </div>
        </section>

        <!-- Detailed About Section -->
        <section id="about" class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6rem; align-items: start;">
                <div class="reveal">
                    <h2
                        style="font-size: 0.8rem; font-weight: 800; color: var(--text-dim); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1.5rem;">
                        The Architecture</h2>
                    <h3 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 2rem; letter-spacing: -1px;">Driven
                        by Performance.</h3>
                    <p style="font-size: 1.05rem; color: var(--text-dim); line-height: 1.9; margin-bottom: 2rem;">
                        {{ $profile->bio }}</p>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                        @foreach($experiences as $exp)
                            <div style="border-left: 2px solid var(--accent-emerald); padding-left: 1.5rem;">
                                <h4 style="font-size: 1.1rem; font-weight: 800;">{{ $exp->position }}</h4>
                                <p style="font-size: 0.8rem; color: var(--text-emerald); margin-bottom: 0.5rem;">
                                    {{ $exp->company }} — {{ $exp->duration }}</p>
                                <p style="font-size: 0.85rem; color: var(--text-dim); line-height: 1.6;">
                                    {{ $exp->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="reveal">
                    <h2
                        style="font-size: 0.8rem; font-weight: 800; color: var(--text-dim); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1.5rem;">
                        Tech Stack Mastery</h2>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-top: 2rem;">
                        @foreach($skills as $skill)
                            <div
                                style="padding: 1.5rem; background: var(--surface); border: 1px solid var(--border); border-radius: 12px; transition: 0.3s; position: relative; overflow: hidden;">
                                <div
                                    style="position: absolute; top:0; left:0; height: 100%; width: 2px; background: var(--accent-emerald);">
                                </div>
                                <span
                                    style="font-size: 0.9rem; font-weight: 800; display: block; margin-bottom: 0.5rem;">{{ $skill->name }}</span>
                                <span
                                    style="font-size: 1.2rem; font-weight: 900; color: var(--text-dim); opacity: 0.3;">{{ $skill->level }}%</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Final CTA -->
        <section id="contact"
            style="background: var(--surface); position: relative; overflow: hidden; padding: 10rem 0;">
            <div
                style="position: absolute; top: 0; right: 0; width: 50vw; height: 100%; background: radial-gradient(circle at 100% 0%, var(--accent-emerald-dim) 0%, transparent 70%);">
            </div>
            <div class="container reveal" style="text-align: center; position: relative; z-index: 2;">
                <span class="tag">Elevate your product</span>
                <h2
                    style="font-size: clamp(2rem, 5vw, 4rem); font-weight: 900; margin-bottom: 2rem; letter-spacing: -2px;">
                    Defining the <span class="text-emerald">Standard</span> <br>of Excellence.</h2>
                <a href="mailto:{{ $profile->email }}" class="btn-minimal"
                    style="font-size: 1.8rem; border-bottom-width: 4px;">{{ $profile->email }}</a>
            </div>
        </section>
    </main>

    <footer
        style="padding: 6rem 2rem; background: #000; display: flex; flex-direction: column; align-items: center; gap: 2rem; border-top: 1px solid var(--border);">
        <div style="display: flex; gap: 2rem;">
            @if($profile->linkedin_link)<a href="{{ $profile->linkedin_link }}" target="_blank"
            style="color: var(--text-dim);"><i class="fab fa-linkedin fa-lg"></i></a>@endif
            <a href="#" style="color: var(--text-dim);"><i class="fab fa-github fa-lg"></i></a>
        </div>
        <p
            style="font-size: 0.65rem; color: var(--text-dim); font-weight: 800; text-transform: uppercase; letter-spacing: 4px;">
            © NAIMISH KUMAR VERMA — FLUTTER DEVELOPER — {{ date('Y') }}
        </p>
    </footer>

    <script>
        // Reveal Engine
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    // Stagger sibling elements if needed
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        // Carousel Slider Engine
        let currentSlide = 0;
        const track = document.getElementById('carouselTrack');

        function slideCarousel(dir) {
            const slides = document.querySelectorAll('.carousel-slide');
            const slideWidth = 380 + 24; // Width + Gap
            const visibleCount = Math.floor(window.innerWidth / slideWidth);
            const maxSlides = Math.max(0, slides.length - visibleCount);

            currentSlide += dir;
            if (currentSlide < 0) currentSlide = 0;
            if (currentSlide > maxSlides) currentSlide = maxSlides;

            track.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
        }

        // Auto-pause carousel on hover
        track.addEventListener('mouseenter', () => track.style.cursor = 'grab');
    </script>
</body>

</html>