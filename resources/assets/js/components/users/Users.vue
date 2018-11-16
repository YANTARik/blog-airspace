<template>
    <div class="form-group">
        <router-link to="/users/create" class="btn btn-success">Добавить</router-link>
    </div>

    <table  class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>E-mail</th>
                <th>Avatar</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.lastname }}</td>
                <td>{{ user.email }}</td>
                <td >
                    <img :src="`/uploads/${user.avatar}`" v-if="user.avatar" style="width: 75px;
                                            height: 75px;">
                </td>
                <td>
                    <router-link :to="`/users/${user.id}/edit`" class="btn btn-primary">
                        Edit
                    </router-link>
                    <button class="btn btn__danger" @click="remove" :disabled="isRemoving">Delete</button>
                </td>
            </tr>
            </tbody>
            <tfoot></tfoot>
    </table>
</template>
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                users: [],
            };
        },
        created() {
            this.error = this.users = null;
            this.loading = true;
            axios
                .get('/api/admin/users')
                .then(response => {
                    this.users = response.data.users;
                })

        }
    }
</script>