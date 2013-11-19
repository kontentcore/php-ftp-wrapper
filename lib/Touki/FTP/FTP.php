<?php

/**
 * This file is a part of the FTP Wrapper package
 *
 * For the full informations, please read the README file
 * distributed with this source code
 *
 * @package FTP Wrapper
 * @version 1.1.1
 * @author  Touki <g.vincendon@vithemis.com>
 */

namespace Touki\FTP;

use Touki\FTP\Model\Filesystem;
use Touki\FTP\Model\Directory;
use Touki\FTP\Model\File;
use Touki\FTP\Manager\FTPFilesystemManager;
use Touki\FTP\Exception\DirectoryException;

/**
 * FTP Class which implements standard behaviours of FTP
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class FTP implements FTPInterface
{
    /**
     * Filesystem fetcher
     * @var FilesystemFetcher
     */
    protected $fetcher;

    /**
     * FTP Wrapper
     * @var FTPWrapper
     */
    protected $wrapper;

    /**
     * Constructor
     *
     * @param FTPFilesystemManager $fetcher Directory manager
     */
    public function __construct(FTPWrapper $wrapper, FilesystemFetcher $fetcher)
    {
        $this->wrapper = $wrapper;
        $this->fetcher = $fetcher;
    }

    /**
     * {@inheritDoc}
     */
    public function findFilesystems(Directory $directory)
    {
        return $this->fetcher->findAll($directory);
    }

    /**
     * {@inheritDoc}
     */
    public function findFiles(Directory $directory)
    {
        return $this->fetcher->findFiles($directory);
    }

    /**
     * {@inheritDoc}
     */
    public function findDirectories(Directory $directory)
    {
        return $this->fetcher->findDirectories($directory);
    }

    /**
     * {@inheritDoc}
     */
    public function filesystemExists(Filesystem $filesystem)
    {
        try {
            return null !== $this->fetcher->findFilesystemByFilesystem($filesystem);
        } catch (DirectoryException $e) {
            return false;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function fileExists(File $file)
    {
        try {
            return null !== $this->fetcher->findFileByFile($file);
        } catch (DirectoryException $e) {
            return false;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function directoryExists(Directory $directory)
    {
        try {
            return null !== $this->fetcher->findDirectoryByDirectory($directory);
        } catch (DirectoryException $e) {
            return false;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function findFilesystemByName($filename, Directory $inDirectory = null)
    {
        return $this->fetcher->findFilesystemByName($filename, $inDirectory);
    }

    /**
     * {@inheritDoc}
     */
    public function findFileByName($filename, Directory $inDirectory = null)
    {
        return $this->fetcher->findFileByName($filename, $inDirectory);
    }

    /**
     * {@inheritDoc}
     */
    public function findDirectoryByName($directory, Directory $inDirectory = null)
    {
        return $this->fetcher->findDirectoryByName($directory, $inDirectory);
    }

    /**
     * {@inheritDoc}
     */
    public function getCwd()
    {
        return $this->fetcher->getCwd();
    }
}
