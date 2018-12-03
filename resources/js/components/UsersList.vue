<template>
    <div class="">
        <div class="row mb-3">
            <div class="col-12">
                <form class="d-flex justify-content-around" @s>
                    <div class="filter">
                        <input type="text" class="form-control" placeholder="Name" v-model="name">
                    </div>

                    <div class="filter">
                        <select v-model="gender" class="form-control">
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>

                    <div class="filter">
                        <div class="form-check">
                            <input v-model="is_active" class="form-check-input" type="checkbox" id="is-active">
                            <label class="form-check-label" for="is-active">Is Active</label>
                        </div>
                    </div>

                    <div class="filter">
                        <input v-model="birthday" type="text" class="form-control" placeholder="Birthday">
                    </div>

                    <div class="submit">
                        <button class="btn btn-primary" @click.prevent="fetch" :disabled="buzy">
                            <i v-if="buzy" class="fa fa-spin fa-spinner"></i>
                            Filter!
                        </button>
                    </div>

                    <div class="submit">
                        <button class="btn btn-danger" @click.prevent="reset" :disabled="buzy">
                            Reset!
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Is Active</th>
                            <th>Birthday</th>
                        </tr>
                        <tr v-for="user in users">
                            <td>{{ user.name }}</td>
                            <td>{{ user.gender == '1' ? 'male' : 'female' }}</td>
                            <td>{{ user.is_active ? 'Yes' : 'No' }}</td>
                            <td>{{ user.info.birthday }}</td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UsersList",
        props: [''],
        data() {
            return {
                users: [],
                name: null,
                gender: null,
                is_active: null,
                birthday: null,
                buzy: false,
            }
        },

        methods: {
            reset(){
                this.name = null;
                this.is_active= null;
                this.birthday = null;
                this.gender= null;
                this.fetch();
            },

            fetch() {
                this.buzy = true;
                axios.get(`/users`, {
                    params: {
                        name: this.name,
                        birthday: this.birthday,
                        is_active: this.is_active,
                        gender: this.gender,
                    }
                })
                    .then(response => {
                        this.users = response.data;
                        this.buzy= false;
                    })
            }
        },

        mounted() {
            this.fetch();
        }

    }
</script>

<style scoped>

</style>
