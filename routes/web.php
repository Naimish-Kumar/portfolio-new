<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Project;
use App\Models\Service;
use App\Models\Message;
use Illuminate\Http\Request;

Route::get('/', function () {
    $profile = Profile::first();
    $skills = Skill::all();
    $experiences = Experience::orderBy('start_date', 'desc')->get();
    $educations = Education::orderBy('start_date', 'desc')->get();
    $projects = Project::all();
    $services = Service::all();

    return view('portfolio', compact('profile', 'skills', 'experiences', 'educations', 'projects', 'services'));
});

Route::post('/contact', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'content' => 'required',
    ]);

    Message::create($request->all());

    return back()->with('success', 'Thank you for your message! I will get back to you soon.');
});

Route::get('/dashboard', [PortfolioController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Portfolio Management
    Route::post('/dashboard/profile', [PortfolioController::class, 'updateProfile'])->name('dashboard.profile.update');
    Route::post('/dashboard/skills', [PortfolioController::class, 'addSkill'])->name('dashboard.skills.add');
    Route::delete('/dashboard/skills/{skill}', [PortfolioController::class, 'deleteSkill'])->name('dashboard.skills.delete');
    Route::post('/dashboard/projects', [PortfolioController::class, 'addProject'])->name('dashboard.projects.add');
    Route::delete('/dashboard/projects/{project}', [PortfolioController::class, 'deleteProject'])->name('dashboard.projects.delete');
    Route::post('/dashboard/experience', [PortfolioController::class, 'addExperience'])->name('dashboard.experience.add');
    Route::delete('/dashboard/experience/{experience}', [PortfolioController::class, 'deleteExperience'])->name('dashboard.experience.delete');
    Route::post('/dashboard/education', [PortfolioController::class, 'addEducation'])->name('dashboard.education.add');
    Route::delete('/dashboard/education/{education}', [PortfolioController::class, 'deleteEducation'])->name('dashboard.education.delete');
    Route::post('/dashboard/messages/{message}/read', [PortfolioController::class, 'markMessageAsRead'])->name('dashboard.messages.read');
});

require __DIR__ . '/auth.php';
