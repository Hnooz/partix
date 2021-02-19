<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Part;
use App\TagPart;
use Illuminate\Http\Request;

class PartTagsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        $tag = Tag::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
        ]);
        
        TagPart::create([
            'tag_id' => $tag->id,
            'part_id' => $request->id,
        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Tag created successfully',
        ]);

        return redirect()->back();
    }

    public function show(Part $part)
    {
    }
}
