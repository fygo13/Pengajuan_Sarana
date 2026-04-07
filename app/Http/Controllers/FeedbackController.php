<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request, $id)
    {
        Feedback::updateOrCreate(
            ['aspirasi_id' => $id],
            ['isi_feedback' => $request->isi_feedback]
        );

        Aspirasi::find($id)->update([
            'status' => $request->status
        ]);

        return back();
    }
}
