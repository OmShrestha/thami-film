<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Model\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NewsletterPublicationController extends Controller
{
    public function index(Request $request)
    {
        $data['publications'] = Publication::orderBy('id', 'DESC')->get();
        return view('admin.newsletter.index', $data);
    }

    public function edit($id)
    {
        $data['publication'] = Publication::findOrFail($id);
        return view('admin.newsletter.edit', $data);
    }


    public function store(Request $request)
    {
        $pdf = $request->pdf;
        $allowedExtsPDF = array('pdf');
        $extPdf = pathinfo($pdf, PATHINFO_EXTENSION);

        // store image
        $imageAc = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg');
        $extImage = pathinfo($imageAc, PATHINFO_EXTENSION);

        $rules = [
            'pdf' => 'required',
            'title' => 'required|max:255',
            'serial_number' => 'required|integer',
        ];

        if ($request->filled('pdf')) {
            $rules['pdf'] = [
                function ($attribute, $value, $fail) use ($extPdf, $allowedExtsPDF) {
                    if (!in_array($extPdf, $allowedExtsPDF)) {
                        return $fail("Only pdf file is allowed");
                    }
                }
            ];
        }

        if ($request->filled('image')) {
            $rules['image'] = [
                function ($attribute, $value, $fail) use ($extImage, $allowedExts) {
                    if (!in_array($extImage, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg, svg image is allowed");
                    }
                }
            ];
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $publication = new Publication();
        $publication->title = $request->title;
        $publication->is_published = 1;


        if ($request->filled('pdf')) {
            $filename = uniqid() . '.' . $extPdf;
            @copy($pdf, 'assets/frontend/newsletters/' . $filename);
            $publication->filename = $filename;
        }

        if ($request->filled('image')) {
            $image = uniqid() . '.' . $extImage;
            @copy($imageAc, 'assets/frontend/newsletters/images/' . $image);
            $publication->image = $image;
        }

        $publication->save();

        Session::flash('success', 'Newsletter added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $pdf = $request->pdf;
        $allowedExtsPDF = array('pdf');
        $extPdf = pathinfo($pdf, PATHINFO_EXTENSION);

        $imageAc = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg');
        $extImage = pathinfo($imageAc, PATHINFO_EXTENSION);

        $rules = [
            // 'pdf' => 'required',
            'title' => 'required|max:255',
            'serial_number' => 'required|integer',
        ];

        if ($request->filled('pdf')) {
            $rules['pdf'] = [
                function ($attribute, $value, $fail) use ($extPdf, $allowedExtsPDF) {
                    if (!in_array($extPdf, $allowedExtsPDF)) {
                        return $fail("Only pdf file is allowed");
                    }
                }
            ];
        }

        // dd($request->all());

        if ($request->filled('image')) {
            $rules['image'] = [
                function ($attribute, $value, $fail) use ($extImage, $allowedExts) {
                    if (!in_array($extImage, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg, svg image is allowed");
                    }
                }
            ];
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $publication = Publication::findOrFail($request->publication_id);
        $publication->title = $request->title;
        $publication->is_published = 1;

        if ($request->filled('pdf')) {
            @unlink('assets/frontend/newsletters/' . $publication->pdf);
            $filename = uniqid() . '.' . $extPdf;
            @copy($pdf, 'assets/frontend/newsletters/' . $filename);
            $publication->filename = $filename;
        }

        if ($request->filled('image')) {
            @unlink('assets/frontend/newsletters/images/' . $publication->image);
            $image = uniqid() . '.' . $extImage;
            @copy($imageAc, 'assets/frontend/newsletters/images/' . $image);
            $publication->image = $image;
        }

        $publication->save();

        Session::flash('success', 'Newsletter updated successfully!');
        return "success";
    }

    public function delete(Request $request)
    {

        $publication = Publication::findOrFail($request->publication_id);
        @unlink('assets/frontend/newsletters/' . $publication->pdf);
        $publication->delete();

        Session::flash('success', 'Newsletter deleted successfully!');
        return back();
    }
}
