<?php

namespace Touki\FTP\Exception;

use RuntimeException;

/**
 * Exception thrown when the download failed
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class DownloadFailedException extends DownloadException implements FTPException
{
}