<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Profile
        $profile = \App\Models\Profile::create([
            'name' => 'Naimish Kumar Verma',
            'title' => 'Flutter Developer',
            'email' => 'vnaimishkumar@gmail.com',
            'phone' => '+919536824061',
            'address' => 'Noida, Uttar Pradesh, India',
            'bio' => 'Results-driven Flutter Developer with 2+ years of experience building scalable cross-platform mobile applications for Android and iOS using Flutter and Dart. Strong expertise in Firebase integration, REST APIs, real-time communication (Socket.IO), payment gateway integration, and performance optimization. Proven track record of delivering production-ready applications published on Google Play Store and Apple App Store.',
            'linkedin_link' => 'https://linkedin.com/in/naimish-kumar-verma',
            'github_link' => 'https://github.com/Naimish-Kumar',
            'portfolio_link' => 'https://acrocoder.com',
            'resume_link' => 'resume.pdf',
            'image' => 'images/profile.png',
        ]);

        // Skills
        $skills = [
            ['name' => 'Flutter & Dart', 'level' => 95, 'category' => 'Mobile', 'icon' => 'flutter'],
            ['name' => 'Firebase / Socket.IO', 'level' => 90, 'category' => 'Backend', 'icon' => 'database'],
            ['name' => 'Node.js / REST APIs', 'level' => 85, 'category' => 'Backend', 'icon' => 'server'],
            ['name' => 'Clean Architecture / BLoC', 'level' => 90, 'category' => 'Architecture', 'icon' => 'architecture'],
            ['name' => 'Kotlin / Android', 'level' => 80, 'category' => 'Platform', 'icon' => 'android'],
            ['name' => 'iOS / Swift', 'level' => 75, 'category' => 'Platform', 'icon' => 'apple'],
        ];

        foreach ($skills as $skill) {
            \App\Models\Skill::create($skill);
        }

        // Experience
        \App\Models\Experience::create([
            'company' => 'Spirehub Software Pvt Ltd',
            'position' => 'Flutter Developer',
            'start_date' => 'Oct 2023',
            'end_date' => 'Present',
            'description' => 'Developed multiple cross-platform mobile apps. Integrated Firebase (Auth/Push), implemented real-time features with Socket.IO, and integrated PayPal/Authorize.net payment gateways. Optimized UI performance and overall app responsiveness.',
        ]);

        \App\Models\Experience::create([
            'company' => 'SmartInternz',
            'position' => 'Android Developer Intern',
            'start_date' => 'May 2021',
            'end_date' => 'Aug 2021',
            'description' => 'Built Android applications using Kotlin and Material Design. Integrated REST APIs and conducted debugging and rigorous testing.',
        ]);

        // Education
        \App\Models\Education::create([
            'institution' => 'Galgotias University',
            'degree' => 'Bachelor of Science in Computer Science',
            'start_date' => '2019',
            'end_date' => '2025',
            'description' => 'Specializing in software engineering and mobile system architecture.',
        ]);

        // Published Applications (From Resume)
        $resumeApps = [
            [
                'title' => 'Healthosyst',
                'description' => 'A comprehensive healthcare management system live on both Play Store and App Store.',
                'tags' => 'Healthcare,Flutter,Firebase',
                'github_link' => '#',
                'play_store_link' => 'https://play.google.com/store/apps/details?id=com.healthosyst.app',
                'app_store_link' => 'https://apps.apple.com/in/app/healthosyst/id6702022061',
            ],
            [
                'title' => 'Coach-By-App',
                'description' => 'Professional coaching and fitness management platform.',
                'tags' => 'Fitness,Flutter,Socket.IO',
                'github_link' => '#',
                'play_store_link' => 'https://play.google.com/store/apps/details?id=com.coachbyapp.app',
                'app_store_link' => 'https://apps.apple.com/in/app/coach-by-app/id6467117400',
            ],
            [
                'title' => 'Smyline',
                'description' => 'High-performance social networking application with real-time interactions.',
                'tags' => 'iOS,Android,Flutter,Realtime',
                'github_link' => '#',
                'play_store_link' => 'https://play.google.com/store/apps/details?id=com.smyline.company',
                'app_store_link' => 'https://apps.apple.com/in/app/smyline/id6478959574',
            ],
            [
                'title' => 'Ancient Mystic Music',
                'description' => 'Niche streaming platform for spiritual and traditional music.',
                'tags' => 'Streaming,Flutter,Cloudinary',
                'github_link' => '#',
                'play_store_link' => 'https://play.google.com/store/apps/details?id=com.ancientmysticmusic.app',
                'app_store_link' => 'https://apps.apple.com/in/app/ancient-mystic-music/id6467042001',
            ],
        ];

        // User requested websites (DoodleJoy, Green Streak, eLawyerX)
        $requestedWebsites = [
            [
                'title' => 'DoodleJoy',
                'description' => 'Creative drawing application for kids with magic brushes and secure social sharing.',
                'tags' => 'Live,Web,Kids,Flutter',
                'github_link' => 'https://github.com/Naimish-Kumar/DoodleJoy',
                'link' => 'https://doodlejoy.fun/',
            ],
            [
                'title' => 'Green Streak',
                'description' => 'Fitness and sustainability platform rewarding users for eco-friendly habits.',
                'tags' => 'Live,Sustainability,Fitness',
                'github_link' => '#',
                'link' => 'https://greenstreak.in/',
            ],
            [
                'title' => 'eLawyerX',
                'description' => 'Comprehensive legal management platform with secure consultation rooms.',
                'tags' => 'Live,LegalTech,Secure',
                'github_link' => '#',
                'link' => 'https://elawyerx.com/',
            ],
        ];

        foreach (array_merge($requestedWebsites, $resumeApps) as $project) {
            \App\Models\Project::create($project);
        }

        // Flutter Packages (Open Source)
        $packages = [
            [
                'title' => 'chat_secure_guard',
                'description' => 'Security layer implementing Double Ratchet encryption for high-security messaging.',
                'tags' => 'Package,Security,Encryption',
                'github_link' => 'https://github.com/Naimish-Kumar/chat_secure_guard',
                'link' => 'https://pub.dev/packages/chat_secure_guard',
            ],
            [
                'title' => 'flutter_performance_optimizer',
                'description' => 'Performance profiling suite with AI-driven suggestions and heatmap analysis.',
                'tags' => 'Package,Performance,AI',
                'github_link' => 'https://github.com/Naimish-Kumar/flutter_performance_optimizer',
                'link' => 'https://pub.dev/packages/flutter_performance_optimizer',
            ],
            [
                'title' => 'flutter_architecture_generator',
                'description' => 'CLI tool to scaffold clean architecture patterns and modular structures instantly.',
                'tags' => 'Package,Architecture,CLI',
                'github_link' => 'https://github.com/Naimish-Kumar/flutter_architecture_generator',
                'link' => 'https://pub.dev/packages/flutter_architecture_generator',
            ],
        ];

        foreach ($packages as $pkg) {
            \App\Models\Project::create($pkg);
        }

        // Services
        $services = [
            ['title' => 'Enterprise App Design', 'description' => 'Architecting scalable Flutter solutions with complex state management (BLoC/Riverpod).', 'icon' => 'fas fa-drafting-compass'],
            ['title' => 'Security Hardening', 'description' => 'Implementing Double Ratchet encryption and biometric gates for high-stakes apps.', 'icon' => 'fas fa-shield-alt'],
            ['title' => 'Performance Tuning', 'description' => 'Eliminating frame drops and memory issues with advanced profiling tools.', 'icon' => 'fas fa-bolt'],
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }
    }
}
