<?php
namespace App\Repositories\FoldersAndFiles;

interface FoldersAndFilesInterface {
    public function getRootFolder();
    public function getMediaFolders($folderId);
    public function getFoldersAndFiles($folderId);
}