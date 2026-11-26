<template>
    <div>
        <div class="body-admin-users-head">
            <table class="table-admin-users">
                <thead class="text-center">
                    <td>Id</td>
                    <td>Pseudo</td>
                    <td>Email</td>
                    <td>Niveau</td>
                    <td>Parties</td>
                    <td>Statut</td>
                    <td></td>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in users" v-bind:index="index">
                        <td><p v-text="user.id"></p></td>
                        <td><p v-text="user.name"></p></td>
                        <td><p v-text="user.email"></p></td>
                        <td><p v-text="user.experience"></p></td>
                        <td><p v-text="user.games_played"></p></td>
                        <td style="width: 160px !important;">
                            <select class="custom-select" id="inputGroupSelect01">
                                <option :selected="user.admin === 0" @click="updateStatus(user.id, 0)" value="0">Utilisateur</option>
                                <option :selected="user.admin === 1" @click="updateStatus(user.id, 1)" value="1">Administrateur</option>
                            </select>
                        </td>
                        <td style="width: 60px !important;">
                            <button @click.prevent="DeleteUser(user.id, index)" class="btn-table-delete-admin"><i class="fas fa-user-times"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="body-admin-users-foot">
            <div class="nav-user-footer">
                <form method="post" @submit.prevent="searchUser(search)">
                    <div class="d-flex">
                        <div class="mr-auto"><p class="table-text">Rechercher un utilisateur</p></div>
                        <div class="input-group input-search-user">
                            <input type="text" class="form-control" placeholder="Nom d'utilisateur ou email" aria-label="Recipient's username" aria-describedby="button-addon2" v-model="search">
                            <div class="input-group-append">
                                <button class="btn btn-search-user" type="submit" id="button-addon2">GO</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <table class="table-admin-users" style="margin-top: 49px;">
                <thead class="text-center">
                    <td>Id</td>
                    <td>Pseudo</td>
                    <td>Email</td>
                    <td>Niveau</td>
                    <td>Parties</td>
                    <td>Statut</td>
                    <td></td>
                </thead>
                <tbody>
                    <tr v-for="(user, index2) in search_users" v-bind:index2="index2">
                        <td><p v-text="user.id"></p></td>
                        <td><p v-text="user.name"></p></td>
                        <td><p v-text="user.email"></p></td>
                        <td><p v-text="user.experience"></p></td>
                        <td><p v-text="user.games_played"></p></td>
                        <td style="width: 160px !important;">
                            <select class="custom-select" id="inputGroupSelect02">
                                <option :selected="user.admin === 0" @click="updateStatus(user.id, 0)" value="0">Utilisateur</option>
                                <option :selected="user.admin === 1" @click="updateStatus(user.id, 1)" value="1">Administrateur</option>
                            </select>
                        </td>
                        <td style="width: 60px !important;">
                            <button @click.prevent="DeleteSearchUser(user.id, index2)" class="btn-table-delete-admin"><i class="fas fa-user-times"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    name: "Users",
    props: ['admin'],
    data() {
        return {
            users: [],
            errors: [],
            search: "",
            search_users: [],
        }
    },
    mounted() {
        this.Users();
        this.findOne(1);
    },
    computed : {
        loadUsers: function () {
            this.admin.req.post('users/loadall').then(response => {
                this.users = response.data;
                //console.log(this.users);
                return true;
            }).catch(error => {
                this.errors.push(error.response.data.error);
                return false;
            });
        }
    },
    methods :
    {
        Users() {
            return this.loadUsers;
        },
        DeleteUser: function (id, index) {
            this.users.splice(index, 1);
            this.admin.req.delete('users/userdelete/' + id).then(response => {
                console.log(response.data);
            });
            console.log("[Suppression de l'utilisateur avec l'id " + id + "] => Index dans le tableau : " + index);
        },
        searchUser : function (search) {
            if(search !== "" && search !== null){
                this.admin.req.post('users/searchuser/' + search).then(response => {
                    this.search_users = response.data;
                    console.log(response.data);

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            } else
            {
                console.log(search);
            }

        },
        DeleteSearchUser: function (id, index2) {
            this.search_users.splice(index2, 1);
            this.admin.req.delete('users/userdelete/' + id).then(response => {
                console.log(response.data);
            });
            console.log("[Suppression de l'utilisateur avec l'id " + id + "] => Index dans le tableau : " + index);
        },
        findOne(id) {
            const data = {
                id: id,
            };
            this.admin.req.post("users/findone", data).then(response => {
                console.log(response.data);

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        updateStatus: function (id, status) {
            const data = {
                id: id,
                admin: status
            }
            this.admin.req.post("users/updatestatus", data).then(response => {
                console.log(response.data);

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        }
    },

    // post(url, requête, header)
    // si on envoie un seul paramètre : +, si on envoie un tableau : , || Envoyer des tableaux de préférences
}
</script>
