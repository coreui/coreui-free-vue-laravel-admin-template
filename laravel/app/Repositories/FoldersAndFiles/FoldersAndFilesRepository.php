<?php
namespace App\Repositories\FoldersAndFiles;


use App\Repositories\FoldersAndFiles\FoldersAndFilesInterface as FoldersAndFilesInterface;
use Illuminate\Support\Facades\DB;
use App\Folder;

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

    /*
    public function get( $sorter, $tableFilter, $columnFilter, $itemsLimit ){
        $db = DB::table('notes')
        ->join('users', 'users.id', '=', 'notes.users_id')
        ->join('status', 'status.id', '=', 'notes.status_id')
        ->select('notes.*', 'users.name as author', 'status.name as status', 'status.class as status_class');
        if( isset($columnFilter['author']) ){
            $db->where('users.name', 'like', '%' . $columnFilter['author'] . '%');
        }
        if( isset($columnFilter['title']) ){
            $db->where('notes.title', 'like', '%' . $columnFilter['title'] . '%');
        }
        if( isset($columnFilter['content']) ){
            $db->where('notes.content', 'like', '%' . $columnFilter['content'] . '%');
        }
        if( isset($columnFilter['applies_to_date']) ){
            $db->where('notes.applies_to_date', 'like', '%' . $columnFilter['applies_to_date'] . '%');
        }
        if( isset($columnFilter['status']) ){
            $db->where('status.name', 'like', '%' . $columnFilter['status'] . '%');
        }
        if( isset($columnFilter['note_type']) ){
            $db->where('notes.note_type', 'like', '%' . $columnFilter['note_type'] . '%');
        }
        if( strlen($tableFilter) > 0 ){
            $db->where(function ($query) use ($tableFilter) {
                $query->where('users.name', 'like',                 '%' . $tableFilter . '%')
                      ->orWhere('notes.title', 'like',              '%' . $tableFilter . '%')
                      ->orWhere('notes.content', 'like',            '%' . $tableFilter . '%')
                      ->orWhere('notes.applies_to_date', 'like',    '%' . $tableFilter . '%')
                      ->orWhere('status.name', 'like',              '%' . $tableFilter . '%')
                      ->orWhere('notes.note_type', 'like',          '%' . $tableFilter . '%');
            });
        }
        if( !empty($sorter) ){
            if($sorter['asc'] === false){
                $sortCase = 'desc';
            }else{
                $sortCase = 'asc';
            }
            switch($sorter['column']){
                case 'author':
                    $db->orderBy('users.name',              $sortCase);
                break;
                case 'title':
                    $db->orderBy('notes.title',             $sortCase);
                break;
                case 'content':
                    $db->orderBy('notes.content',           $sortCase);
                break;
                case 'applies_to_date':
                    $db->orderBy('notes.applies_to_date',   $sortCase);
                break;
                case 'status':
                    $db->orderBy('status.name',             $sortCase);
                break;
                case 'note_type':
                    $db->orderBy('notes.note_type',         $sortCase);
                break;
            }
        }
        return $db->paginate($itemsLimit);
    }
    */
}