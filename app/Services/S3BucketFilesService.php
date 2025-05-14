<?php

namespace App\Services;

use Aws\Exception\AwsException;
use Aws\S3\S3Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class S3BucketFilesService
{
    protected string $productionS3Url = 'https://wom-academy.s3.ap-south-1.amazonaws.com/';

    public function __construct()
    {
        //
    }

    /**
     * List all files in the S3 bucket
     *
     * @param string $bucket
     * @return string
     */
    public function listFilesInS3Bucket(string $bucket): string
    {
        dd(Storage::disk($bucket)->allFiles());
    }

    /**
     * List all files in the S3 bucket
     *
     * @param string $bucket
     * @param string $directory
     * @return string
     */
    public function deleteDirectory(string $bucket, string $directory): string
    {
        return Storage::disk($bucket)->deleteDirectory($directory);
    }

    /**
     * Upload local files to S3 bucket
     *
     * @return string
     * @throws AwsException
     */
    public function uploadLocalFilesToS3(): string
    {
        $localPath = public_path('assets/blogs');
        $files     = File::allFiles($localPath);

        foreach ($files as $file) {
            $filePath = $file->getRelativePathname();
            $s3Path   = 'nepalpost/' . $filePath;

            Storage::disk('s3')->put($s3Path, file_get_contents($file->getRealPath()));
        }

        return 'Files uploaded to S3 bucket successfully!';
    }

    /**
     * Move files from staging S3 bucket to production S3 bucket
     *
     * @return string
     * @throws AwsException
     */
    public function moveFilesFromStagingS3ToProductionS3(): string
    {
        $stagingDisk    = Storage::disk('s3_staging');
        $productionDisk = Storage::disk('s3');

        $stagingBucket    = config('filesystems.disks.s3_staging.bucket');
        $productionBucket = config('filesystems.disks.s3.bucket');

        $s3Client = new S3Client([
            'version'     => 'latest',
            'region'      => config('filesystems.disks.s3_staging.region'),
            'credentials' => [
                'key'    => config('filesystems.disks.s3_staging.key'),
                'secret' => config('filesystems.disks.s3_staging.secret'),
            ],
        ]);

        $files = $stagingDisk->allFiles();

//        dd($files);

        foreach ($files as $file) {
            // Copy file to production bucket
            $s3Client->copyObject([
                'Bucket'     => $productionBucket,
                'Key'        => $file,
                'CopySource' => "$stagingBucket/$file",
            ]);

            // Optionally, delete file from staging after copying
            // $stagingDisk->delete($file);
        }
        return 'Files moved from staging S3 bucket to production S3 bucket successfully!';
    }

    /**
     * Copy files within the same bucket
     *
     * @param string $sourceFolder
     * @param string $destinationFolder
     * @return string
     * @throws AwsException
     */
    public function copyFilesWithinBucket(string $sourceFolder, string $destinationFolder): string
    {
        $bucket = config('filesystems.disks.s3.bucket');
        $disk = Storage::disk('s3');

        $s3Client = new S3Client([
            'version' => 'latest',
            'region' => config('filesystems.disks.s3.region'),
            'credentials' => [
                'key' => config('filesystems.disks.s3.key'),
                'secret' => config('filesystems.disks.s3.secret'),
            ],
        ]);

        $files = $disk->allFiles($sourceFolder);

        foreach ($files as $file) {
            try {
                $newPath = $destinationFolder . '/' . basename($file);

                // Copy file within the same bucket
                $s3Client->copyObject([
                    'Bucket' => $bucket,
                    'Key' => $newPath,
                    'CopySource' => "$bucket/$file",
                ]);
            } catch (AwsException $e) {
                // Check if the exception is due to a missing key
                if ($e->getAwsErrorCode() === 'NoSuchKey') {

                    Log::warning("Skipped copying file due to missing key: $file");
                    continue;
                }
                throw $e;
            }
        }

        return 'Files copied within the bucket successfully!';
    }
}
