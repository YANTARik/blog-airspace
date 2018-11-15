<template>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить пользователя
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем пользователя</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <form v-on:submit="saveForm()">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Фамилия</label>
                                <input type="text" class="form-control" name="lastname" id="exampleInputEmail1" placeholder="" v-model="user.lastname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Имя</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="" v-model="user.name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="" v-model="user.email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Пароль</label>
                                <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Аватар</label>
                                <input type="file" name="avatar" id="exampleInputFile" v-model="user.avatar">
                            </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
            </div>
        </section>
    </div>

</template>