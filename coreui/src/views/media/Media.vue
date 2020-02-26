<template>
  <CRow>
    <CCol col="12" xl="6">
      <transition name="slide">
        <CCard>
          <CCardBody>
            <h4>Media</h4>

            <CButton v-if="parentFolder != 'disable'" color="primary" @click="returnFolder()">
                <CIcon :content="$options.levelUpIcon"/>
                Return
            </CButton>

            <CButton color="primary" @click="addFolder()">
                <CIcon :content="$options.plusIcon"/>
                <CIcon :content="$options.folderIcon"/>
                New folder
            </CButton>

            <CIcon :content="$options.plusIcon"/>
            <CIcon :content="$options.fileIcon"/>
            <CInputFile
                type="file"
                v-on:change="handleFileUpload"
                placeholder="New file"
            />

              <CDataTable
                hover
                :items="items"
                :fields="fields"
              >
                <template #name="{item}">
                  <td v-if="item.type == 'folder'" v-on:click="clickOnElement(item.id, item.type)" class="click-file">
                    <CIcon :content="$options.folderIcon"/>
                    {{ item.name }}
                  </td>
                  <td v-else v-on:click="clickOnElement(item.id, item.type)" class="click-file">
                    <CIcon :content="$options.fileIcon"/>
                    {{ item.name }}
                  </td>
                </template>
                <template #actions="{item}">
                  <td>
                    <CButton color="primary" @click="renameOpenForm(item.id, item.type)">
                        Rename
                    </CButton>
                  </td>
                  <td>
                    <CButton color="primary" @click="moveOpenForm(item.id, item.type, item.name)">
                        Move
                    </CButton>
                  </td>
                  <td v-if="item.type == 'file'">
                    <CButton color="primary" @click="copyFile(item.id)">
                        Copy
                    </CButton>
                  </td>
                  <td v-else>

                  </td>
                  <td v-if="item.type == 'file'">
                    <CButton color="primary" @click="downloadFile(item.id, item.name)">
                        Download
                    </CButton>
                  </td>
                  <td v-else>

                  </td>
                  <td v-if="item.type == 'file'">
                    <CButton v-if="item.mime.includes('image/')" color="success" @click="openCroppFileModal(item.id)">
                        Cropp
                    </CButton>
                  </td>
                  <td v-else>

                  </td>
                  <td>
                    <CButton color="danger" @click="openDeleteDialog(item.id, item.type, item.name)">
                        Delete
                    </CButton>
                  </td>
                </template>
              </CDataTable>

          </CCardBody>  
        </CCard>
      </transition>
    </CCol>
    <CCol col="12" xl="6">
      <transition name="slide">
        <CCard v-if="rightCard == 'fileInfo'">
          <CCardBody>
              <CDataTable
                :items="fileInfo"
                :fields="fileInfoHeader"
              >

              </CDataTable>
          </CCardBody>  
        </CCard>
        <CCard v-if="rightCard == 'renameFolder'">
          <CCardBody>
            <CInput 
                type="text"
                label="New name"
                placeholder="Folder name"
                v-model="name"
            />
            <CButton color="primary" @click="renameFolder()">
                Save
            </CButton>
            <CButton color="primary" @click="rightCard = 'fileInfo'">
                Cancel
            </CButton> 
          </CCardBody> 
        </CCard>
        <CCard v-if="rightCard == 'renameFile'">
          <CCardBody>
            <CInput 
                :type="text"
                label="New name"
                placeholder="Folder name"
                v-model="name"
            />
            <CButton color="primary" @click="renameFile()">
                Save
            </CButton>
            <CButton color="primary" @click="rightCard = 'fileInfo'">
                Cancel
            </CButton> 
          </CCardBody>  
        </CCard>
        <CCard v-if="rightCard == 'moveFolder'">
          <CCardBody>
            <h4>Move folder "{{ moveObjectName }}"</h4>
            <CInputRadio
                v-if="parentFolder != 'disable'"
                label="Move Up"
                type="radio"
                name="selectFolderForFolder"
                @update:checked="selectFolderRadioInput('moveUp')"
            />
            <CInputRadio
                v-for="item in selectFolderArray"
                :key="item.id"
                :label="item.name"
                type="radio"
                name="selectFolderForFolder"
                @update:checked="selectFolderRadioInput(item.id)"
            />
            <CButton color="primary" @click="moveFolder()" class="mt-4">
                Save
            </CButton>
            <CButton color="primary" @click="rightCard = 'fileInfo'" class="mt-4">
                Cancel
            </CButton> 
          </CCardBody>  
        </CCard>
        <CCard v-if="rightCard == 'moveFile'">
          <CCardBody>
            <h4>Move file "{{ moveObjectName }}"</h4>
            <CInputRadio
                v-if="parentFolder != 'disable'"
                label="Move Up"
                type="radio"
                name="selectFolderForFolder"
                @update:checked="selectFolderRadioInput('moveUp')"
            />
            <CInputRadio
                v-for="item in mediaFolders"
                :key="item.id"
                :label="item.name"
                type="radio"
                name="selectFolderForFolder"
                @update:checked="selectFolderRadioInput(item.id)"
            />
            <CButton color="primary" @click="moveFile()" class="mt-4">
                Save
            </CButton>
            <CButton color="primary" @click="rightCard = 'fileInfo'" class="mt-4">
                Cancel
            </CButton> 
          </CCardBody>  
        </CCard>
      </transition>
    </CCol>
    <CModal
      :show.sync="deleteFolderModal"
      :centered="true"
      title="Delete folder"
    >
        Are you sure to delete a folder named "{{moveObjectName}}"?
      <template #footer>
        <CButton @click="deleteFolderModal = false" color="primary">Cancel</CButton>
        <CButton @click="deleteFolder" color="danger">Delete</CButton>
      </template>
    </CModal>
    <CModal
      :show.sync="deleteFileModal"
      :centered="true"
      title="Delete file"
    >
        Are you sure to delete a file named "{{moveObjectName}}"?
      <template #footer>
        <CButton @click="deleteFileModal = false" color="primary">Cancel</CButton>
        <CButton @click="deleteFile" color="danger">Delete</CButton>
      </template>
    </CModal>

    <CModal
      :show.sync="croppModal"
      :centered="true"
      title="Cropp image"
      size="lg"
    >
        <img id="cropp-img-img"/>
      <template #footer>
        <CButton @click="croppModal = false" color="primary">Cancel</CButton>
        <CButton @click="croppImage" color="primary">Cropp</CButton>
      </template>
    </CModal>
  </CRow>
</template>
<script>
import axios from 'axios'
import Cropper from 'cropperjs';
import 'cropperjs/dist/cropper.css';
import { cilPlus, cilFolder, cilFile, cilLevelUp } from '@coreui/icons'
export default {
  plusIcon: cilPlus,
  folderIcon: cilFolder,
  fileIcon: cilFile,
  levelUpIcon: cilLevelUp,
  name: 'Media',
  data () {
    return {
        rightCard: 'fileInfo',
        elementId: null,
        thisFolder: null,
        name: null,
        medias: [],
        mediaFolders: [],
        parentFolder: 'disable',
        fields: ['name', 'actions'],
        items: [],
        returnFolderId: null,
        fileInfoHeader: ['name', 'data'],
        fileInfo: [],
        selectFolder: null,
        moveObjectName: '',
        deleteFolderModal: false,
        deleteFileModal: false,
        downloadFileName: '',
        changePort: ':8000',
        croppModal: false,
        cropper: null,
        croppUrl: '',
    }
  },
  computed: {
    selectFolderArray: function() {
        let self = this
        return this.mediaFolders.filter(function(u) {
            return u.id != self.elementId
        })
    },
  },
  methods: {
    croppImage(){
        let self = this
        self.cropper.getCroppedCanvas().toBlob((blob) => {
            const formData = new FormData()
            formData.append('file', blob )
            formData.append('thisFolder', self.thisFolder )
            formData.append('id', self.elementId )
            formData.append('token', localStorage.getItem("api_token") )
            axios.post(   '/api/media/file/cropp', formData )
            .then(function (response) {
                self.croppModal = false
                self.getFoldersAndFiles(self.thisFolder)
            })
            .catch(function (error) {
                console.log(error)
            })
        }/*, 'image/png' */);
    },
    openCroppFileModal(id){
        let self = this
        axios.get(   '/api/media/file?id=' + id + '&thisFolder=' + self.thisFolder + '&token=' + localStorage.getItem("api_token"))
        .then(function (response) {
            self.elementId = response.data.id
            self.croppUrl = response.data.url
            self.croppUrl = self.croppUrl.replace( 'localhost', 'localhost' + self.changePort )
            document.getElementById('cropp-img-img').setAttribute('src', self.croppUrl)
            self.croppModal = true


            self.$nextTick(function(){
                if(self.cropper !== null){
                    self.cropper.replace( self.croppUrl )
                }else{
                    self.cropper = new Cropper(document.getElementById('cropp-img-img'), {
                        minContainerWidth: 600,
                        minContainerHeight: 600
                    });
                }
            })

        })
        .catch(function (error) {
            console.log(error)
        })
    },


    downloadFile(id, name){
        let self = this
        this.downloadFileName = name
        axios({
            method: 'get',
            url: '/api/media/file/download?thisFolder=' + self.thisFolder + '&id=' + id + '&token=' + localStorage.getItem("api_token"),
            responseType: 'arraybuffer'
        })
        .then(function(response){
            const url = window.URL.createObjectURL(new Blob([response.data]))
            const link = document.createElement('a')
            link.href = url
            link.setAttribute('download', self.downloadFileName)
            document.body.appendChild(link)
            link.click()
        })
        .catch(function(error){
            console.log(error)
            self.$router.push({ path: '/login' })
        });


    },
    openDeleteDialog(id, type, name){
        this.moveObjectName = name
        this.elementId = id
        if(type == 'folder'){
            this.deleteFolderModal = true
        }else{
            this.deleteFileModal = true
        }
    },
    deleteFolder(){
        let self = this
        axios.post(   '/api/media/folder/delete?thisFolder=' + self.thisFolder + '&id=' + self.elementId + '&token=' + localStorage.getItem("api_token")
        ).then(function(response){
            self.getFoldersAndFiles(self.thisFolder)
            self.rightCard = 'fileInfo'
            self.deleteFolderModal = false
        })
        .catch(function(error){
            console.log(error)
            self.$router.push({ path: '/login' })
        });
    },
    deleteFile(){
        let self = this
        axios.post(   '/api/media/file/delete?thisFolder=' + self.thisFolder + '&id=' + self.elementId + '&token=' + localStorage.getItem("api_token")
        ).then(function(response){
            self.getFoldersAndFiles(self.thisFolder)
            self.rightCard = 'fileInfo'
            self.deleteFileModal = false
        })
        .catch(function(error){
            console.log(error)
            self.$router.push({ path: '/login' })
        });
    },
    selectFolderRadioInput(data){
        this.selectFolder = data
    },
    returnFolder(){
        if(this.returnFolderId != null){
            this.getFoldersAndFiles(this.returnFolderId)
        }
    },
    clickOnElement(id, type){
        if(type == 'folder'){
            this.returnFolderId = this.thisFolder
            this.getFoldersAndFiles(id)
        }else{
            this.getFileInfo(id)
        }
    },
    renameOpenForm(id, type){
        this.elementId = id
        let self = this
        if(type == 'folder'){
            axios.get(   '/api/media/folder?id=' + id + '&token=' + localStorage.getItem("api_token")
            ).then(function(response){
                self.name = response.data.name
                self.rightCard = 'renameFolder'
            })
            .catch(function(error){
                console.log(error)
                self.$router.push({ path: '/login' })
            });
        }else{
            axios.get(   '/api/media/file?thisFolder=' + self.thisFolder + '&id=' + id + '&token=' + localStorage.getItem("api_token")
            ).then(function(response){
                self.name = response.data.name
                self.rightCard = 'renameFile'
            })
            .catch(function(error){
                console.log(error)
                self.$router.push({ path: '/login' })
            });
        }
    },
    moveOpenForm(id, type, objectName){
        this.elementId = id
        this.moveObjectName = objectName
        if(type == 'folder'){
            this.rightCard = 'moveFolder'
        }else{
            this.rightCard = 'moveFile'
        }
    },
    moveFolder(){
        if(this.selectFolder != null){
            let self = this;
            axios.post(   '/api/media/folder/move',
            {
                id: this.elementId,
                folder: this.selectFolder,
                token: localStorage.getItem("api_token"),
            }
            ).then(function(response){
                self.getFoldersAndFiles(self.thisFolder)
                self.rightCard = 'fileInfo'
                self.selectFolder = null;
            })
            .catch(function(error){
                console.log(error) 
                self.$router.push({ path: '/login' })
            });
        }
    },
    moveFile(){
        if(this.selectFolder != null){
            let self = this;
            axios.post(   '/api/media/file/move',
            {
                id: this.elementId,
                folder: this.selectFolder,
                thisFolder: this.thisFolder,
                token: localStorage.getItem("api_token"),
            }
            ).then(function(response){
                self.getFoldersAndFiles(self.thisFolder)
                self.rightCard = 'fileInfo'
                self.selectFolder = null;
            })
            .catch(function(error){
                console.log(error) 
                self.$router.push({ path: '/login' })
            });
        }
    },
    copyFile(id){
        let self = this
        axios.get(   '/api/media/file/copy?thisFolder=' + self.thisFolder + '&id=' + id + '&token=' + localStorage.getItem("api_token")
        ).then(function(response){
            self.getFoldersAndFiles(self.thisFolder)
            self.rightCard = 'fileInfo'
        })
        .catch(function(error){
            console.log(error)
            self.$router.push({ path: '/login' })
        });
    },
    renameFolder(){
        let self = this;
        axios.post(   '/api/media/folder/update',
        {
            name: this.name,
            id: this.elementId,
            token: localStorage.getItem("api_token"),
        }
        ).then(function(response){
            self.getFoldersAndFiles(self.thisFolder)
            self.rightCard = 'fileInfo'
        })
        .catch(function(error){
            console.log(error)
            self.$router.push({ path: '/login' })
        });
    },
    renameFile(){
        let self = this;
        axios.post(   '/api/media/file/update',
        {
            name: this.name,
            id: this.elementId,
            token: localStorage.getItem("api_token"),
            thisFolder: this.thisFolder,
        }
        ).then(function(response){
            self.getFoldersAndFiles(self.thisFolder)
            self.rightCard = 'fileInfo'
        })
        .catch(function(error){
            console.log(error)
            self.$router.push({ path: '/login' })
        });
    },
    getFileInfo(id){
        let self = this;
        axios.get(   '/api/media/file?thisFolder=' + self.thisFolder + '&id=' + id + '&token=' + localStorage.getItem("api_token")
        ).then(function(response){
            self.fileInfo = [];
            self.fileInfo.push({name: 'Name'        , data: response.data['name']});
            self.fileInfo.push({name: 'Real name'   , data: response.data['realName']});
            self.fileInfo.push({name: 'URL'         , data: response.data['url']});
            self.fileInfo.push({name: 'Mime Type'   , data: response.data['mimeType']});
            self.fileInfo.push({name: 'Size'        , data: response.data['size']});
            self.fileInfo.push({name: 'Created At'  , data: response.data['createdAt']});
            self.fileInfo.push({name: 'Updated At'  , data: response.data['updatedAt']});
        })
        .catch(function(error){
            console.log(error)
            self.$router.push({ path: '/login' })
        });
    },
    handleFileUpload(files, event){
        let self = this;
        let formData = new FormData();
        formData.append('file', files[0]);
        axios.post(   '/api/media/file/store?thisFolder=' + self.thisFolder + '&token=' + localStorage.getItem("api_token"),
            formData,
            { headers: {
                'Content-Type': 'multipart/form-data'
            }}
        ).then(function(){
            self.getFoldersAndFiles(self.thisFolder)
        })
        .catch(function(error){
            console.log(error)
            self.$router.push({ path: '/login' })
        });
    },
    addFolder(){
        let self = this;
        axios.get(  '/api/media/folder/store?thisFolder=' + self.thisFolder + '&token=' + localStorage.getItem("api_token"))
        .then(function (response) {
            self.getFoldersAndFiles(self.thisFolder)
        }).catch(function (error) {
            console.log(error)
            self.$router.push({ path: '/login' })
        });
    },
    buildItems(){
        this.items = [];
        for(var i=0; i<this.mediaFolders.length; i++){
            this.items.push({
                type: 'folder',
                name: this.mediaFolders[i].name,
                id: this.mediaFolders[i].id
            })
        }
        for(var i=0; i<this.medias.length; i++){
            this.items.push({
                type: 'file',
                name: this.medias[i].name,
                id: this.medias[i].id,
                url: this.medias[i].url,
                mime: this.medias[i].mime_type
            })
        }
    },
    getFoldersAndFiles(folderId){
        let self = this;
        axios.get(  '/api/media?id=' + folderId + '&token=' + localStorage.getItem("api_token"))
        .then(function (response) {
            self.medias         = response.data.medias
            self.mediaFolders   = response.data.mediaFolders
            self.thisFolder     = response.data.thisFolder
            self.parentFolder   = response.data.parentFolder
            self.buildItems()
            self.rightCard = 'fileInfo'
        }).catch(function (error) {
            console.log(error)
            self.$router.push({ path: '/login' })
        });
    }
  },
  mounted () {
    this.getFoldersAndFiles('')
    document.getElementById('cropp-img-img').addEventListener('load', this.updateCroppImage );
  }
}
</script>
