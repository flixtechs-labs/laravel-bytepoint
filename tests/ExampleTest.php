<?php

use FlixtechsLabs\Bytepoint\Bytepoint;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


it('can test', function () {
    expect(true)->toBeTrue();
});

it('can optimize uploaded file', function () {
   $file = new UploadedFile(__DIR__ . '/test.jpg', 'test.jpg', null, null, true);

   $size = $file->getSize();
   $type = $file->getMimeType();

   $file = $file->bytepoint(['type' => 'webp']);

   dd($size, $type, $file->getSize(), $file->getMimeType());
});
