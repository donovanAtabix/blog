<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests\DocumentRequest;
use App\Repositories\DocumentRepository;
use Illuminate\View\View;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        $documents = Document::orderBy('updated_at', 'desc')->get();

        return view('documents.index')->with([
            'documents' => $documents,
            'document'  => Document::class,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DocumentRequest $request
     *
     * @return view
     */
    public function store(DocumentRequest $request)
    {
        $documentRequest = new DocumentRepository();

        $documentRequest->store($request);

        return redirect()->route('documents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $document
     *
     * @return view
     */
    public function show(Document $document)
    {
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $document
     *
     * @return View
     */
    public function edit(Document $document)
    {
        return view('documents.edit')->with([
            'document'  => $document,
            //'mediumUrl' => $mediumUrl,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DocumentRequest $request
     * @param \App\Document   $document
     *
     * @return view
     */
    public function update(DocumentRequest $request, Document $document)
    {
        $documentRepository = new DocumentRepository();

        $documentRepository->update($document, $request);

        return redirect()->route('documents.edit', $document);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     *
     * @return view
     */
    public function destroy(Document $document)
    {
        $documentRepository = new DocumentRepository();

        $documentRepository->destroy($document);

        return redirect()->route('documents.index');
    }
}
