<template>
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
                        <option value="0">Utilisateur</option>
                        <option value="1">Administrateur</option>
                    </select>
                </td>
                <td style="width: 60px !important;">
                    <button @click.prevent="DeleteUser(user.id, index)" class="btn-table-delete-admin"><i class="fas fa-user-times"></i></button>
                </td>
                <!--
                <td style="width: 60px !important;">
                    <form method="POST" action="/users.userDelete">
                        <input type="hidden" value="user.id" name="id">
                        <button type="submit"></button>
                    </form>
                </td>-->
            </tr>
        </tbody>
    </table>
</template>
<script>
export default {
    name: "Users",
    props: ['admin'],
    data() {
        return {
            users: [],
            errors: [],
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
        findOne(id) {
            const data = {
                id: id,
            }
            this.admin.req.post("users/findone", data).then(response => {
                console.log(response.data);

            }).catch(error => {
                this.errors.push(error.response.data.error);
            })
        }
    },

    // post(url, requête, header)
    // si on envoie un seul paramètre : +, si on envoie un tableau : , || Envoyer des tableaux de préférences
}
</script>
