<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate($this->PAGINATION_SIZE);

        return inertia()->render('Dashboard/tags/index', [
            'tags' => $tags,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        Tag::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Tag created successfully',
        ]);

        return redirect()->route('tags.index');
    }

    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);
        
        $tag->update($data);
        
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'tag updated successfully',
        ]);

        return redirect()->back();
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        session()->flash('toast', [
            'type' => 'error',
            'message' => 'tag deleted successfully',
        ]);

        return redirect()->back();
    }
}
