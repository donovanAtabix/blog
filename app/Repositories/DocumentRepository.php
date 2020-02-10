<?php

namespace App\Repositories;

use App\Document;
use App\Http\Requests\DocumentRequest;

class DocumentRepository
{
    /**
     * @param DocumentRequest $request
     */
    public function store(DocumentRequest $request)
    {
        $document = new Document();

        $document->addMedia($request->file('document'))
            ->toMediaCollection('documents');

        $document->name = $request->name;
        $document->user_id = auth()->user()->id;

        $document->save();
    }

    /**
     * @param Document        $document
     * @param DocumentRequest $request
     */
    public function update(Document $document, DocumentRequest $request)
    {
        if (! empty($request->file('document'))) {
            $document->clearMediaCollection('documents');

            $document->addMedia($request->file('document'))
                ->toMediaCollection('documents');
        }

        $document->name = $request->name;
        $document->user()->associate(auth()->user()->id);

        $document->save();
    }

    /**
     * @param Document $document
     */
    public function destroy(Document $document)
    {
        $medium = $document->getFirstMedia('documents');

        $medium->delete();

        $document->delete();
    }
}
