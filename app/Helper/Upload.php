<?php
/**
 * Created by PhpStorm.
 * User: thanhtai
 * Date: 11/04/2019
 * Time: 10:33
 */

namespace App\Helper;

use Aws\Laravel\AwsFacade as AWS;

/**
 * Class Upload to AWS S3
 *
 * //<!--Basic YWRwaWE6dG9pZGljb2RlLmNvbQ==-->
 *
 * @package App\Helper
 */
class Upload
{


    /**
     * Update document to S3
     *
     * @param      $filePath
     * @param null $filename
     * @return mixed
     */
    public static function uploadToS3($filePath, $filename = null)
    {
        $s3 = AWS::createClient('s3');
        $upload = $s3->putObject([
            'Bucket'     => env('AWS_BUCKET'),
            'Key'        => $filename,
            'SourceFile' => $filePath,
        ]);
        return htmlspecialchars($upload->get('ObjectURL'));
    }

    /**
     * get MimeType
     *
     * @param $filename
     * @return mixed
     */
    public static function getMimeType($filename)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $filename);
        finfo_close($finfo);

        return $mime;
    }

}
