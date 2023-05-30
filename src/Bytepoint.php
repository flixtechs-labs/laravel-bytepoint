<?php

namespace FlixtechsLabs\Bytepoint;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class Bytepoint
{
    /**
     * Send image to bytepoint and retrieve optimized image
     *
     * @param string $source
     * @param string $destination
     * @param string $fileName
     * @param array $options
     * @return void
     */
    public function optimize(string $source, string $destination, string $fileName = '', array $options = []): void
    {
        $options = array_merge([
            'type' => 'jpeg'
        ], $options);

        $response = Http::attach('image', file_get_contents($source), $fileName ?: 'image')
            ->withToken(config('bytepoint.token'))
            ->acceptJson()
            ->post(config('bytepoint.url'), [
                'type' => $options['type']
            ]);

        if ($response->successful()) {
            Http::withToken(config('bytepoint.token'))
                ->sink($destination)
                ->acceptJson()
                ->get($response->json()['retrieveUrl']);
        }
    }

    /**
     * Optimize uploaded file
     *
     * @param UploadedFile $file
     * @param array $options
     * @return void
     */
    public function optimizeUploadedFile(UploadedFile $file, array $options = []): void
    {
        $this->optimize($file->getRealPath(), $file->getRealPath(), $file->getClientOriginalName(), $options);
    }
}
