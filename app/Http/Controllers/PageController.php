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
            'skills' => Skill::all(),
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

        Skill::create([
            'name' => $request->name,
        ]);

        return redirect('/about');
    }

        public function deleteSkill(Skill $skill)
    {
        $skill->delete();

        return redirect('/about');
    }

        public function editSkill(Skill $skill)
    {
        return view('edit-skill', [
            'skill' => $skill,
        ]);
    }

    public function updateSkill(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|max:50',
        ]);

        $skill->update([
            'name' => $request->name,
        ]);

        return redirect('/about');
    }
}