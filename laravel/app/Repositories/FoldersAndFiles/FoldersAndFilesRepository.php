<?php
namespace App\Repositories\FoldersAndFiles;


use App\Repositories\FoldersAndFiles\FoldersAndFilesInterface as FoldersAndFilesInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Folder;

class FoldersAndFilesRepository implements FoldersAndFilesInterface{

    public function getRootFolder(){
        return Folder::whereNull('folder_id')->first();
    }

    public function getMediaFolders($folderId){
        return Folder::where('folder_id', '=', $folderId)->get();
    }

    public function getFoldersAndFiles($folderId){
        if($folderId === null){
            $rootFolder = Folder::whereNull('folder_id')->first();
            $result = response()->json(array(
                'medias' => $rootFolder->getMedia(),
                'mediaFolders' =>  Folder::where('folder_id', '=', $rootFolder->id)->get(),
                'thisFolder' => $rootFolder->id,
                'parentFolder' => 'disable'
            ));
        }else{
            $thisFolder = Folder::where('id', '=', $folderId)->first();
            if($thisFolder->folder_id == null){
                $result = response()->json(array(
                    'medias' => $thisFolder->getMedia(),
                    'mediaFolders' =>  Folder::where('folder_id', '=', $thisFolder->id)->get(),
                    'thisFolder' => $thisFolder->id,
                    'parentFolder' => 'disable'
                ));
            }else{
                $result = response()->json(array(
                    'medias' => $thisFolder->getMedia(),
                    'mediaFolders' =>  Folder::where('folder_id', '=', $folderId)->get(),
                    'thisFolder' => $folderId,
                    'parentFolder' => $thisFolder['folder_id']
                ));
            }
        }
        return $result;
    }
}