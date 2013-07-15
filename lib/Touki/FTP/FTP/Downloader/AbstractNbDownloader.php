<?php

namespace Touki\FTP\FTP\Downloader;

use Touki\FTP\FTPWrapper;

/**
 * Base class for non blocking downloaders
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
abstract class AbstractNbDownloader extends AbstractDownloader
{
    /**
     * Callback
     * @var callable
     */
    protected $callback;

    /**
     * Constructor
     *
     * @param FTPWrapper $ftp      A FTP Wrapper instance
     * @param callable   $callback A callback to be called during download
     * @param integer    $mode     Transfer mode
     * @param integer    $startPos The position in the remote file to start downloading to
     */
    public function __construct(FTPWrapper $ftp, $callback, $mode, $startPos)
    {
        $this->ftp      = $ftp;
        $this->callback = $callback;
        $this->mode     = $mode;
        $this->startPos = $startPos;
    }

    /**
     * Get Callback
     *
     * @return callable Callback
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * Set Callback
     *
     * @param callable $callback Callback
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;
    }
}