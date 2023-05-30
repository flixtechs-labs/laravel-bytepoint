<?php

use Illuminate\Http\UploadedFile;

it('can test', function () {
    expect(true)->toBeTrue();
});

it('can optimize uploaded file', function () {
    $file = new UploadedFile(__DIR__.'/test.jpg', 'test.jpg', null, null, true);

    $size = $file->getSize();
    $type = $file->getMimeType();

    $file = $file->bytepoint(['type' => 'webp']);

    dd($size, $type, $file->getSize(), $file->getMimeType());
});
