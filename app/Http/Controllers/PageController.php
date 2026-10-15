<?php

namespace App\Http\Controllers;
use App\Models\Skill;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('about', [
            'name' => 'Serdg',
            'skills' => Skill::with('user')->latest()->get(),
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'name' => 'Serdg',
        ]);
    }

    public function storeSkill(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
        ]);

        $request->user()->skills()->create([
            'name' => $request->name,
        ]);

        return redirect('/about');
    }

    public function deleteSkill(Skill $skill)
    {
        if ($skill->user_id != auth()->id()) {
            abort(403);
        }
        $skill->delete();

        return redirect('/about');
    }

    public function editSkill(Skill $skill)
    {
        if ($skill->user_id != auth()->id()) {
            abort(403);
        }
        return view('edit-skill', [
            'skill' => $skill,
        ]);
    }

    public function updateSkill(Request $request, Skill $skill)
    {
        if ($skill->user_id != auth()->id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|max:50',
        ]);

        $skill->update([
            'name' => $request->name,
        ]);

        return redirect('/about');
    }
}