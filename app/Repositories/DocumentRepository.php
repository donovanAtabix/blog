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
        $document->name = $request->name;
        $document->user_id = auth()->user()->id;

        $document->addMedia($request->file('document'))
        ->toMediaCollection();

        $document->save();

    }

    public function update()
    {
        //
    }
}
