<template>
    <div>
        <div>
            <div class="card-tools">
                <button class="btn btn-success" @click="newModal">Add New Post <i class="fa fa-edit white"></i></button>
            </div>
        </div>
        <table  class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <!--<th>Дата</th>-->
                <th>Картинка</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>

            <tr v-for="post in posts">

                <td>{{ post.id }}</td>
                <td>{{ post.title }}</td>
                <!--<td>{{ post.date }}</td>-->
                <td>
                    <img :src="`/uploads/${post.image}`" v-if="post.image" style="width: 120spx; height: 75px;">
                </td>
                <td>

                    <a href="#" @click="editModal(post)">
                        <i class="fa fa-edit blue"></i>
                    </a>
                    /
                    <a href="#" @click="deletePost(post.id)">
                        <i class="fa fa-trash red"></i>
                    </a>
                </td>
            </tr>

            </tbody>
            <tfoot></tfoot>
        </table>
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update {{this.form.title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updatePost() : createPost()">
                        <div class="modal-body  col-md-12">
                            <div class="form-group">
                                <input v-model="form.title" type="text" name="title"
                                       placeholder="Title for New post"
                                       class="form-control" v-validate="'required|min:3|max:255'" :class="{'input': true, 'is-danger': errors.has('title') }">
                                <i v-show="errors.has('title')" class="fa fa-warning"></i>
                                <span v-show="errors.has('title')" class="help is-danger">{{ errors.first('title') }}</span>
                            </div>

                            <label class="control-label text-center">Image for new post</label>

                            <div class="text-center" v-model="form.image">
                                <output id="list" class="img-thumbnail"></output>
                                <input @change="selectFile"
                                    type="file" name="image" class="form-input"
                                    v-validate="'image'">
                                <i v-show="errors.has('image')" class="fa fa-warning"></i>
                                <span v-show="errors.has('image')" class="help is-danger">{{ errors.first('image') }}</span>
                            </div>
                            <div class='row'>
                                <div class='col-lg-8 col-lg-offset-2'>
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label class="typo__label">Теги</label>
                                    <multiselect
                                            v-model="form.tags"
                                            tag-placeholder="Add this as new tag"
                                            label="title"
                                            track-by="id"
                                            :options="tags"
                                            :multiple="true"
                                            :taggable="true"
                                            :internal-search="false"
                                            :close-on-select="false"
                                            :options-limit="300"
                                            :limit="4" :limit-text="limitText"
                                            :max-height="600"
                                            :show-no-results="false"
                                            @tag="addTag">
                                    </multiselect>
                                    <template slot="tag" slot-scope="{ value, remove }">
                                        <span class="custom__tag">
                                        <span>{{ form.tags }}</span>
                                        <span class="custom__remove" @click="remove(tag)">❌</span></span>
                                    </template>
                                </div>
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label>Дата:</label>
                                <div class="input-group date form-control">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <datepicker
                                            v-model="form.date"
                                            :format="customFormatter"
                                            name="date"
                                            v-validate="'required'">
                                    </datepicker>
                                    <i v-show="errors.has('date')" class="fa fa-warning"></i>
                                    <span v-show="errors.has('date')" class="help is-danger">{{ errors.first('date') }}</span>
                                </div>
                                <i v-show="errors.has('date')" class="fa fa-warning"></i>
                                <span v-show="errors.has('date')" class="help is-danger">{{ errors.first('date') }}</span>
                                <!-- /.input group -->
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label text-center">Описание</label>
                                    <textarea v-model="form.description" type="text" name="description"
                                              placeholder="Short description for New post"
                                              class="form-control"
                                              v-validate="'required|min:3|max:500'"
                                              :class="{'input': true, 'is-danger': errors.has('description') }" cols="30" rows="10"></textarea>
                                    <i v-show="errors.has('description')" class="fa fa-warning"></i>
                                    <span v-show="errors.has('description')" class="help is-danger">{{ errors.first('description') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label text-center">Полный текст</label>
                                    <div>
                                    <vue-ckeditor
                                            v-model="form.content"
                                            :config="config"
                                            @blur="onBlur($event)"
                                            @focus="onFocus($event)"
                                            @contentDom="onContentDom($event)"
                                            @dialogDefinition="onDialogDefinition($event)"
                                            @fileUploadRequest="onFileUploadRequest($event)"
                                            @fileUploadResponse="onFileUploadResponse($event)"/>
                                    </div>
                                    <!--&lt;!&ndash;<textarea v-model="content" type="text" name="content"&ndash;&gt;-->
                                              <!--&lt;!&ndash;placeholder="New post"&ndash;&gt;-->
                                              <!--&lt;!&ndash;class="form-control"&ndash;&gt;-->
                                              <!--&lt;!&ndash;v-validate="'required'"&ndash;&gt;-->
                                              <!--&lt;!&ndash;:class="{'input': true, 'is-danger': errors.has('content') }" cols="30" rows="10">&ndash;&gt;-->
                                    <!--&lt;!&ndash;</textarea>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<i v-show="errors.has('content')" class="fa fa-warning"></i>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<span v-show="errors.has('content')" class="help is-danger">{{ errors.first('content') }}</span>&ndash;&gt;-->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                                <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>


    import axios from 'axios';
    import Multiselect from 'vue-multiselect';
    import Datepicker from 'vuejs-datepicker';
    var moment = require('moment');
    import VueCkeditor from 'vue-ckeditor2';

    export default {
        components: {
            Multiselect,
            Datepicker,
            VueCkeditor
        },
        data() {


            return {
                posts: [],
                tags: [],
                value: [],
                editmode: false,
                hasError: true,
                hasUpdated: true,
                hasDeleted: true,
                showModal: false,
                selectedFile: null,
                selected: null,
                selectedTags: null,
                content: '',
                config: {
                    toolbar: [
                        ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript']
                    ],
                    height: 300
                },
                isLoading: false,
                form: new Form ({
                    id: '',
                    title: '',
                    tags:[],
                    image: null,
                    content: '',
                    description: '',
                    date: ''
                }),
                editor: {
                    toolbar: [
                        ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'Image']
                    ],
                    height: 400
                }
            }

        },

        created() {
            this.error = this.users = null;
            this.fetchPosts();
            this.fetchTags();
            //this.option = this.fetchTags;
            //console.log(this.options);
        },

        computed: {
            tagsArray(){
                return _.map(this.tags, function (num, key) {
                    return num.title
                })
            }
        },

        methods: {

            fetchPosts: function () {
                axios
                    .get('/api/posts')
                    .then(response => {
                        this.posts = response.data.posts;
                        console.log(this.posts);

                    })
                    .catch(error => {
                        console.log(error)
                    });
            },

            fetchTags: function () {
                axios
                    .get('/api/tags')
                    .then(response => {
                        this.tags = response.data.tags;
                        console.log(this.tags)
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },

            updateSelected (newSelected) {
                this.selected = newSelected
            },

            deletePost(id) {

                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    // Send request to the server
                    if (result.value) {
                        this.form.delete('/api/posts/' + id)
                            .then(()=>{
                                swal(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                this.fetchPosts();
                                //
                            }).catch(()=> {
                            swal("Failed!", "There was something wronge.", "warning");
                        });
                    }
                })
            },

            updatePost(){
                this.$Progress.start();
                this.validateBeforeSubmit();
                let df = new FormData();

                df.append('image', this.selectedFile);
                df.append('title', this.form.title);
                df.append('tags', this.form.tags[0].id);
                df.append('description', this.form.description);
                df.append('content', this.form.content);
                df.append('date', this.selectedDate);
                console.log(this.form);

                axios
                    .post('/api/posts/' + this.form.id, df, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(() => {
                        $('#addNew').modal('hide');
                        swal(
                            'Updated!',
                            'Information has been updated.',
                            'success',
                        )
                        this.$Progress.finish();
                        this.fetchPosts();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },

            editModal(post){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(post);
            },

            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },

            selectFile (event) {
                this.selectedFile = event.target.files[0];
                let mainImg = event.target.files[0];
                let reader = new FileReader();

                let limit = 1024 * 1024 * 2;
                if(mainImg['size'] > limit){
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'You are uploading a large file',
                    })
                    return false;
                }
                reader.onload = (function(mainImg) {
                    return function(event) {
                        let span = document.createElement('span');
                        span.innerHTML = ['<img class="thumb" src="', event.target.result,
                            '" title="', escape(mainImg.name), '"/>'].join('');
                        document.getElementById('list').insertBefore(span, null);
                    };
                })(mainImg);

                reader.readAsDataURL(mainImg);
            },

            createPost(){
                this.$Progress.start();
                this.validateBeforeSubmit();
                console.log(this.form);
                let fd = new FormData();

                console.log(this.form.tags[0].id);
                fd.append('image', this.selectedFile);
                fd.append('title', this.form.title);
                fd.append('tags', this.form.tags[0].id);
                fd.append('description', this.form.description);
                fd.append('content', this.form.content);
                fd.append('date', this.selectedDate);

                axios
                    .post('/api/posts', fd, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(() => {
                        $('#addNew').modal('hide')
                        toast({
                            type: 'success',
                            title: 'Post Created in successfully'

                        })
                        this.$Progress.finish();
                        this.fetchPosts();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    })
            },

            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        return;
                    }
                });
            },

            addTag (newTag) {
                const tag = {
                    title: newTag,
                    id: newTag
                }
                this.options.push(tag)
                this.value.push(tag)
            },

            customFormatter(date) {
                this.selectedDate = moment(date).format('YYYY-MM-DD');
                console.log (this.selectedDate);
                return this.selectedDate;
            },


            limitText (count) {
                return `and ${count} other tags`
            },

            clearAll () {
                this.selectedTags = []
            },

            onBlur(evt) {
                console.log(evt);
            },
            onFocus(evt) {
                console.log(evt);
            },
            onContentDom(evt) {
                console.log(evt);
            },
            onDialogDefinition(evt) {
                console.log(evt);
            },
            onFileUploadRequest(evt) {
                console.log(evt);
            },
            onFileUploadResponse(evt) {
                console.log(evt);
            }

        }
    }
</script>