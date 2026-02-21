<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Project;
use App\Models\Service;
use App\Models\Message;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $skills = Skill::all();
        $projects = Project::all();
        $experiences = Experience::all();
        $educations = Education::all();
        $services = Service::all();
        $messages = Message::latest()->get();

        return view('dashboard', compact('profile', 'skills', 'projects', 'experiences', 'educations', 'services', 'messages'));
    }

    public function updateProfile(Request $request)
    {
        $profile = Profile::first();
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('profile', 'public');
        }

        $profile->update($data);
        return back()->with('status', 'profile-updated');
    }

    public function addSkill(Request $request)
    {
        Skill::create($request->all());
        return back()->with('status', 'skill-added');
    }

    public function deleteSkill(Skill $skill)
    {
        $skill->delete();
        return back()->with('status', 'skill-deleted');
    }

    public function addProject(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }
        Project::create($data);
        return back()->with('status', 'project-added');
    }

    public function deleteProject(Project $project)
    {
        $project->delete();
        return back()->with('status', 'project-deleted');
    }

    public function addExperience(Request $request)
    {
        Experience::create($request->all());
        return back()->with('status', 'experience-added');
    }

    public function deleteExperience(Experience $experience)
    {
        $experience->delete();
        return back()->with('status', 'experience-deleted');
    }

    public function addEducation(Request $request)
    {
        Education::create($request->all());
        return back()->with('status', 'education-added');
    }

    public function deleteEducation(Education $education)
    {
        $education->delete();
        return back()->with('status', 'education-deleted');
    }

    public function markMessageAsRead(Message $message)
    {
        $message->update(['is_read' => true]);
        return back();
    }
}
